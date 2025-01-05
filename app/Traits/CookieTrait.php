<?php

namespace App\Traits;
use App\Models\AuthModel;
use App\Models\AuthSettingModel;
use App\Traits\SessionTrait;
use App\Traits\AuthInitModelTrait;

trait CookieTrait
{
    // Import SessionTrait for managing user sessions
    use SessionTrait;
    // Import AuthInitModelTrait for initializing authentication models
    use AuthInitModelTrait;

    /**
     * Check if user has cookie set
     *
     * @return string|null Returns cookie value if set, null if not
     */
    protected function getCookie($name): ?string 
    {
        return $this->request->getCookie($name);
    }

    /**
     * Checks if user has a valid remember me cookie and logs them in if so
     *
     * @return bool True if user was logged in via cookie, false otherwise
     */
    public function isCookieExist()
    {

        try {
            // Get the encrypted user ID from the remember_me cookie
            $encryptedUserId = $this->getCookie('remember_me');

            if ($encryptedUserId) {
                // Get the encrypter service
                $encrypter = \Config\Services::encrypter();
                $userId='';
                
                try {
                    // Attempt to decrypt the user ID
                    $userId = $encrypter->decrypt($encryptedUserId);
                } catch (\Exception $e) {
                    // Log error and return false if decryption fails
                    log_message('error', 'Decryption failed: ' . $e->getMessage());
                    return false;
                }
                // initialize auth models
                $this->initAuthModels();
                
                if(!empty($userId)){
                    // Look up the user by their ID
                    $user = $this->auth_model->findUser($userId);

                    if($user){
                        // If user found, set their session data and return true
                        $this->setUserSession($user);
                        return true;
                    }
                }

            }
        } catch (\Exception $e) {
            log_message('error', 'Cookie check failed: ' . $e->getMessage());
        }

        // Return false if no cookie or invalid user
        return false;
    }

    /**
     * Sets a "remember me" cookie for persistent user login
     *
     * @param object $user The user object containing artist details
     * @return void
     */

     public function set_encrypted_remember_me_cookie($user) {
        $encrypter = \Config\Services::encrypter();
        
        try {
            $encryptedUserId = $encrypter->encrypt($user->artist_id);
            
            // Set cookie for 30 days
            $this->response->setCookie(
                'remember_me',          
                $encryptedUserId,
                86400,                  // 1 day in seconds
                '/',                    // Explicit path
                '',                     
                true,                  // Set to true only in production with HTTPS
                true                    
            );

            // Set session flag indicating cookie is active for this user
            $this->session->set('cookieStatus', true);
        } catch (\Exception $e) {
            log_message('error', 'Cookie encryption failed: ' . $e->getMessage());
        }
    }

}