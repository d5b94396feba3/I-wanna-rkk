<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\AccountSettingModel;
use CodeIgniter\Controller;
use App\Traits\InputFieldsValidationTrait;

class Auth extends BaseController
{

    protected $auth_model;
    protected $session;
    protected $validation;
    protected $account_setting_model;
    protected $throttler;

    use InputFieldsValidationTrait;


    public function __construct()
    {
        $this->auth_model = model("AuthModel");
        $this->session = session();
        $this->validation = \Config\Services::validation();
        $this->account_setting_model = model("AccountSettingModel");
        $this->throttler = service('throttler');
    }

    public function index()
    {
        $data['active_nav'] = 'dashbaord';
        // get recaptcha site key from env
        $data['recaptcha_site_key'] = getenv('RECAPTCHA_SITE_KEY');

        if (!$this->authenticated()) {
            return view('rokk-artists/login', $data);
            
        } else {
            // load the view
            return view('rokk-artists/layout/header', $data)
            . view('rokk-artists/dashboard/index', $data)
            . view('rokk-artists/layout/footer');
        }

    }

    public function login()
    {
        try {
            if ($this->authenticated()) {
                return redirect()->to('/');
            }

            if ($this->request->getMethod() !== 'post') {
                return view('rokk-artists/login', [
                    'recaptcha_site_key' => getenv('RECAPTCHA_SITE_KEY')
                ]);            
            }

            $recaptchaResponse = $this->request->getPost('g-recaptcha-response');

            // For POST requests with validation errors or other issues
            if (!$this->validateAuthLoginFields($this->request)) {
                return redirect()->to('/login')
                    ->with('errorMsg', 'Invalid email or password. Please try again.');
            }

            // Other validation checks (recaptcha, throttle, etc.)
            if (!$this->verify_throttle()) {
                return redirect()->to('/login')
                    ->with('errorMsg', 'Too many attempts. Please wait 60 seconds.');
            }

            if (!$this->verify_recaptcha($recaptchaResponse)) {
                return redirect()->to('/login')
                    ->with('errorMsg', 'reCAPTCHA validation failed! Please try again.');
            }

            $user = $this->auth_model->account_login($this->request->getPost());

            if (!$user) {
                return redirect()->to('/login')
                ->with('errorMsg', 'Invalid email or password. Please try again.');
            }
            // Set the user's session data
            $session = $this->setUserSession($user);

            if (!$session) {
                return redirect()->to('/login')
                ->with('errorMsg', 'Something went wrong, please refresh and try again.');
            }
            // If "Remember me" was checked, set encrypted cookie
            if ($this->request->getPost('remember')) {
                $this->set_encrypted_remember_me_cookie($user);
            }

            return redirect()->to('/');

        } catch (\Exception $e) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Session expired. Please log in again.',
                    'url' => base_url('login'),
                    'redirect' => true
                ]);
            }
            
            return redirect()->to(base_url('login'))
                ->with('errorMsg', 'Something went wrong, please refresh and try again.');
        }
    }
    protected function verify_throttle()
    {
        try {
            // Get IP address and create throttle key
            $ipAddress = $this->request->getIPAddress();
            if (empty($ipAddress)) {
                throw new \RuntimeException('Could not determine IP address');
            }
            
            $throttleKey = md5($ipAddress);

            // Check throttle limit (5 attempts per minute)
            return $this->throttler->check($throttleKey, 5, MINUTE);

        } catch (\Exception $e) {
            // Log error for debugging
            log_message('error', 'Throttle verification failed: ' . $e->getMessage());
            return false;
        }
    }
    protected function verify_recaptcha($recaptchaResponse)
    {
        try {
            // Get recaptcha configuration from env
            $secret = getenv('RECAPTCHA_SECRET_KEY');
            $verifyUrl = getenv('RECAPTCHA_VERIFY_URL');

            // Validate required config exists
            if (empty($secret) || empty($verifyUrl)) {
                throw new \RuntimeException('Missing reCAPTCHA configuration');
            }

            // Make HTTP request with error handling
            $verifyResponse = @file_get_contents($verifyUrl.'secret='.$secret.'&response='.$recaptchaResponse);
            
            if ($verifyResponse === false) {
                throw new \RuntimeException('Failed to verify reCAPTCHA');
            }

            $responseData = json_decode($verifyResponse);
            
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \RuntimeException('Invalid reCAPTCHA response format');
            }

            return $responseData->success ?? false;

        } catch (\Exception $e) {
            // Log error for debugging
            log_message('error', 'reCAPTCHA verification failed: ' . $e->getMessage());
            return false;
        }
    }

    public function logout()
    {
        // First delete cookies before destroying session
        if ($this->getCookie('remember_me')) {
            $this->response->deleteCookie('remember_me', '', [
                'path' => '/',
                'domain' => '',
                'secure' => true,
                'httponly' => true
            ]);
        }
        
        // Destroy the session (this removes all session data)
        $this->session->destroy();
    
        return redirect()->to('login')->with('successMsg', 'You have been successfully logged out.');
    }

    public function checkSession()
    {
        if (!$this->authenticated()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Session expired. Please log in again.',
                'url' => '/login',
                'sessionValid' => false
            ]);
        }
        return $this->response->setJSON(['sessionValid' => true]);
    }

    public function ForgotPassword()
    {
        // get recaptcha site key from env
        $data['recaptcha_site_key'] = getenv('RECAPTCHA_SITE_KEY');

        if ($this->request->getMethod() == 'post') {

            // For POST requests with validation errors or other issues
            if (!$this->validateForgotPasswordField($this->request)) {
                return redirect()->to('/forgot-password')
                ->with('errorMsg', 'Invalid email. Please enter correct email and try again.');
            }
            
            $recaptchaResponse = $this->request->getPost('g-recaptcha-response');

            if (!$this->verify_recaptcha($recaptchaResponse)) {
                return redirect()->to('/forgot-password')
                    ->with('errorMsg', 'reCAPTCHA validation failed! Please try again.');
            }

            $email=$this->request->getPost('email');
            // check in database
            $result = $this->auth_model->find_user_by_email($email);

            if (!$result) {
                return redirect()->to('/forgot-password')
                ->with('errorMsg', 'Email address not found. Please check your email and try again.');
            }

            $newPassword=$this->generatePassword(); // Generate new password
            // Update database
            $result = $this->auth_model->update_artist_password($email,$newPassword);

            if (!$result) {
                return redirect()->to('/forgot-password')
                ->with('errorMsg', 'Failed to update password. Please refresh and try again.');
            }

            $result=$this->sendPasswordToUser($email, $newPassword);

            if (!$result) {
                return redirect()->to('/forgot-password')
                ->with('errorMsg', 'Something went wrong. Please refresh and try again.');
            }

            return redirect()->to('/forgot-password')->with('successMsg', 'Your password has been reset. Please check your email.');

        }

        return view('rokk-artists/forgot-password', $data);
    }

    public function generatePassword($length=12)
    {
       return substr(md5(uniqid(rand(), true)),0,$length);
    }

    protected function sendPasswordToUser($userEmail, $password)
    {
        $email = \Config\Services::email();
    
        $email->setFrom('info@coldstorageservice.com', "ROKK ARTIST"); 
        $email->setTo($userEmail); 
    
        $email->setSubject('NEW PASSWORD FOR YOUR ROKK ACCOUNT');
    
        $message = sprintf(
            "Hello,<br><br>
            You have requested a new password for your ROKK account.<br><br>
            Your temporary password is: <b>%s</b><br><br>
            Please login and change your password immediately for security purposes.<br><br>
            Best regards,<br>
            ROKK Team",
            $password
        );
    
        $email->setMessage($message);
    
        if ($email->send()) {
            return true;
        } else {
            log_message('error', 'Email sending failed for ' . $userEmail . ': ' . $email->printDebugger(['headers']));
            return false;
        }
    }

}
