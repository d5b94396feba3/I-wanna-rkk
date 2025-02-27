<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table            = 'artist_registration';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    /**
     * Authenticate user login
     * 
     * @param array $postData Contains email and password
     * @return object|false Returns user object if authenticated, false otherwise
     */
    public function account_login($postData)
    {
        try {
            // Validate input
            if (empty($postData['email']) || empty($postData['password'])) {
                log_message('warning', 'Login attempt with missing credentials');
                return false;
            }

            // Sanitize inputs
            $email = filter_var(trim($postData['email']), FILTER_SANITIZE_EMAIL);
            $password = trim($postData['password']);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                log_message('warning', 'Invalid email format in login attempt');
                return false;
            }
    
            // Get user by email
            $query = $this->db->table('artist_auth')
                             ->select('artist_id, email, password_hash, last_login')
                             ->where('email', $email)
                             ->limit(1)
                             ->get();
    
            $user = $query->getRow();
    
            if ($user && password_verify($password, $user->password_hash) && $this->is_active_account($email)) {
                // Update last login timestamp
                $this->updateLastLogin($user->artist_id);
                
                // Get full user details
                return $this->account_detail($user->artist_id);
            }

            // Log failed attempt
            log_message('warning', 'Failed login attempt for email: ' . $email);
            return false;

        } catch (\Exception $e) {
            log_message('error', 'Login error: ' . $e->getMessage());
            return false;
        }
    }

    public function is_active_account($email){
        try {
            $query = $this->db->table('rokk_artist')
                            ->where('status', 'active')
                            ->where('official_contact_email', $email)
                            ->get();
        
            return $query->getNumRows() > 0;

        } catch (\Exception $e) {
            log_message('error', 'Error in is_active_account: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Get user account details
     * 
     * @param int $artist_id
     * @return object|false Returns user object if found, false otherwise
     */
    public function account_detail($artist_id)
    {
        try {
            if (!is_numeric($artist_id)) {
                throw new \InvalidArgumentException('Invalid artist ID');
            }

            // Get user details with specific fields
            $query = $this->db->table('rokk_artist')
                            ->select([
                                'artist_id',
                                'artist_type',
                                'artist_name',
                                'country',
                                'official_contact_email',
                                'join_date',
                                'status',
                            ])
                            ->where('artist_id', $artist_id)
                            ->where('status !=', 'blocked')  // status check
                            ->limit(1)
                            ->get();
        
            $user = $query->getRow();
            
            if (!$user) {
                log_message('warning', 'User not found for artist ID: ' . $artist_id);
                return false;
            }
        
            return $user;

        } catch (\Exception $e) {
            log_message('error', 'Error fetching account details: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Update user's last login timestamp
     * 
     * @param int $artist_id
     * @return bool
     */
    private function updateLastLogin($artist_id)
    {
        try {
            return $this->db->table('artist_auth')
                           ->where('artist_id', $artist_id)
                           ->update(['last_login' => date('Y-m-d H:i:s')]);
        } catch (\Exception $e) {
            log_message('error', 'Error updating last login: ' . $e->getMessage());
            return false;
        }
    }


    /**
     * Find a user by their ID
     *
     * @param int $userId The ID of the user to find
     * @return object|false Returns user object if found, false otherwise
     */
    public function findUser($userId)
    {
        // Query the artist_registration table
        $query = $this->db->table('rokk_artist')
            ->select('*')  // Select all columns
            ->where('artist_id', $userId) // Filter by user ID
            ->get();

        // Get the result as an object
        $user = $query->getRow();

        // Return the user if found, false otherwise
        if ($user) {
            return $user;
        }

        return false;
    }

    /**
     * Find a user by their email address
     *
     * @param string $email The email of the user to find
     * @return bool Returns true if user found, false otherwise
     */
    public function find_user_by_email($email)
    {
        try {
            // Query the artist_auth table
            $query = $this->db->table('artist_auth')
                ->select('*')
                ->where('email', $email)
                ->get();

            // Return true if user found, false otherwise
            return $query->getRow() ? true : false;

        } catch (\Exception $e) {
            log_message('error', 'Error finding user by email: ' . $e->getMessage());
            return false;
        }
    }

    public function verifyPassword($userId, $password)
    {
        $query = $this->db->table('artist_auth')
        // $query = $this->db->table('rokk_artist')
            ->select('password_hash')
            ->where('artist_id', $userId)
            ->get();
        
        $user = $query->getRow();
        
        if (!$user) {
            return false;
        }
        
        return password_verify($password, $user->password);
    }


    public function update_all_artist_passwords()
    {

        // Temporarily increase execution time limit
        set_time_limit(2000); // 5 minutes
        try {
            // First, get all artists with their current passwords
            $query = $this->db->table('artist_registration')
                ->select('artist_id, password, confirm_password')
                ->get();
            
            $artists = $query->getResult();
            
            if (empty($artists)) {
                return false;
            }
    
            // Start transaction for bulk update
            // $this->db->transStart();
            
            foreach ($artists as $artist) {
                // Only update if password is not already hashed
                if (!$this->isPasswordHashed($artist->password)) {
                    log_message('info', 'Hassing Password as Password is not hashed for artist ID: ' . $artist->artist_id);
                    $data = [
                        'password' => password_hash($artist->password, PASSWORD_DEFAULT),
                        'confirm_password' => password_hash($artist->confirm_password, PASSWORD_DEFAULT)
                    ];
                    $updateSuccess = $this->db->table('artist_registration')
                        ->where('artist_id', $artist->artist_id)
                        ->update($data);
                    
                    if (!$updateSuccess) {
                        log_message('error', 'Failed to update password for artist ID: ' . $artist->artist_id);
                        return false;
                    }
                    log_message('info', 'Password updated for artist ID: ' . $artist->artist_id);

                }else{
                    log_message('info', 'Password already hashed for artist ID: ' . $artist->artist_id);
                }
            }
            
            // Complete transaction
            // $this->db->transComplete();
            
            // Returns true if transaction was successful
            // return $this->db->transStatus();
    
        } catch (\Exception $e) {
            log_message('error', 'Error in update_all_artist_passwords: ' . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Check if a password is already hashed
     */
    private function isPasswordHashed($password)
    {
        // Check if the string starts with $2y$ (bcrypt hash identifier)
        return (strlen($password) == 60 && strpos($password, '$2y$') === 0);
    }

    public function update_artist_password($email,$password)
    {
        try {

            $data = [
                'password_hash' => password_hash($password, PASSWORD_DEFAULT),
            ];

            $query = $this->db->table('artist_auth')
            ->set($data)
            ->where(['email' => $email])
            ->update();

            return $query ? true : false;

        } catch (\Exception $e) {
            // Log the error 
            log_message('error', 'Error in update_artist_password: ' . $e->getMessage());
            return false;
        }

    }

}
