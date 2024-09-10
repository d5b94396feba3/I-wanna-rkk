<?php

namespace App\Controllers;

use App\Models\HomeModel;
use CodeIgniter\Controller;

class Home extends BaseController
{

    protected $home;
    protected $session;
    protected $validation;

    public function __construct()
    {
        $this->home = model('HomeModel');
        $this->session = session();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data['active'] = 'home';
        $data['recaptcha_site_key'] = '6Lf6G4YpAAAAAKh_Yw8DMg8KCdhbk3pVP2STP4yz'; 

        if (!session('logged_in')) {
            return view('rokk-artists/login', $data);
            
        } else {
            // load the view
            return view('rokk-artists/layout/header', $data)
            . view('rokk-artists/home', $data)
            . view('rokk-artists/layout/footer');
        }

    }


    public function login()
    {
        $validation = \Config\Services::validation();
        // recaptcha site key
        $data['recaptcha_site_key'] = '6Lf6G4YpAAAAAKh_Yw8DMg8KCdhbk3pVP2STP4yz'; 
        
        $data['successMsg']='';
        $data['errorMsg']='';

        $validation->setRules([
            'email' => 'required|min_length[8]|max_length[50]',
            'password' => 'required|min_length[5]|max_length[50]', 
        ]);


        if ($this->request->getMethod() === 'post') {

            // Handle missing reCAPTCHA response
            $recaptchaResponse = $this->request->getPost('g-recaptcha-response');
            $this->session->setFlashdata("error-msg", "reCAPTCHA validation failed! Please try again.");
            $secret = '6Lf6G4YpAAAAALyrCBDbSglvrdMO1r7-b3Z7YGJ9';
            $verifyUrl = 'https://www.google.com/recaptcha/api/siteverify?';
            $verifyResponse = file_get_contents($verifyUrl.'secret='.$secret.'&response='.$recaptchaResponse);
            $responseData = json_decode($verifyResponse);

            if (!$responseData->success) {
                $this->session->setFlashdata("error-msg", "reCAPTCHA validation failed! Please try again.");

            } elseif ($this->request->getMethod() === 'post' && $validation->withRequest($this->request)->run()) {

                $user = $this->home->artist_login($this->request->getPost()); 

                if ($user) {

                    $artist_name = trim($user->artist_name);
                    $artist_id = trim($user->artist_id);

                    $this->session->set('logged_in', true);
                    $this->session->set('username', $artist_name);
                    // $this->session->set('id', $artist_id);
                    $this->session->set('artist_id', $artist_id);
                    return redirect()->to(base_url('/'));
                } else {
                    $this->session->setFlashdata("error-msg", "Username or Password not correct. Please contact us for support.");
                }
            }

        }

        $data['successMsg'] = $this->session->getFlashdata('success-msg');
        $data['errorMsg'] = $this->session->getFlashdata('error-msg');

        return view('rokk-artists/login', $data);
    }



    public function logout()
    {

        // $this->session->remove('logged_in');

        $successMsg = $this->session->getFlashdata('success-msg');

        $this->session->remove('logged_in');

        $this->session->setFlashdata('success-msg', $successMsg);

        return redirect()->to(base_url('/')); 
    }



}
