<?php

namespace App\Models;

use CodeIgniter\Model;

class RegisteredArtistModel extends Model
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


    public function get_total_count_by_table_name($table)
    {
        try {
            $query = $this->db
                ->table($table)
                ->countAllResults();

            return $query;
        } catch (Exception $e) {
            // Log the error 
            log_message(
                "error",
                "Error in get_total_count_by_table_name: " . $e->getMessage()
            );
            return false;
        }
    }

    public function get_total_count_by_field_name($fieldName,$fieldValue)
    {
        try {
            $query = $this->db
                ->table("artist_registration")
                ->where($fieldName, $fieldValue)
                ->countAllResults();

            return $query;
        } catch (Exception $e) {
            // Log the error 
            log_message(
                "error", 
                "Error in get_total_count_by_field_name: " . $e->getMessage()
            );
            return false;
        }
    }


    public function update_artist($postData)
    {
        // Start transaction
        $this->db->transStart();

        try {
            // Trim all input data
            $data = [
                "artist_type" => trim($postData["artist_type"]),
                "artist_name" => trim($postData["artist_name"]),
                "artist_country" => trim($postData["artist_country"]),
                "email_management" => trim($postData["email_management"]),
                "official_contact_email" => trim($postData["official_contact_email"]),
                "preferred_rokk_address" => trim($postData["preferred_rokk_address"]),
                "referral" => trim($postData["referral"]),
                "facebook" => trim($postData["facebook"]),
                "instagram" => trim($postData["instagram"]),
                "twitter" => trim($postData["twitter"]),
                "spotify" => trim($postData["spotify"]),
                "metal_archives" => trim($postData["metal_archives"]),
                "website" => trim($postData["website"]),
                "discogs" => trim($postData["discogs"]),
                "label" => trim($postData["label"]),
                "distributor_and_aggregator" => trim($postData["distributor_and_aggregator"]),
                "artist_link_status" => trim($postData["artist_link_status"]),
                "status" => trim($postData["status"])
            ];

            $artist_id = trim($postData["artist_id"]);
            $status = trim($postData["status"]);
        
            // Set the timezone explicitly before using strtotime and date functions
            date_default_timezone_set("UTC");
            $currentDateTime = date("Y-m-d H:i:s");

            // Update timestamp
            $data["updated_at"] = $currentDateTime;

            $result = $this->db
                ->table("artist_registration")
                ->where("artist_id", $artist_id)
                ->update($data);

            if ($this->db->affectedRows() > 0) {
                if ($status == 'active' && !$this->is_artist_exists_in_rokk_artist($artist_id)) {
                    
                    $result = $this->activate_artist($artist_id);
                    // Check if all insert operations were successful
                    if (!$result) {
                        $this->db->transRollback(); // Rollback if any insert fails
                        return false;
                    }
                }
                // Complete transaction
                $this->db->transComplete();
                // Returns true if transaction was successful
                return $this->db->transStatus();
            }

            // If no rows were affected but no error occurred, 
            // it might mean no changes were made
            return $result;

        } catch (\Exception $e) {
            // Rollback transaction if an error occurs
            $this->db->transRollback();
            log_message(
                "error",
                "Error in update_artist: " . $e->getMessage()
            );
            return false;
        }
    }

    public function is_artist_exists_in_rokk_artist($userid)
    {
        try {
            $query = $this->db
                ->table('rokk_artist')
                ->where('artist_id', $userid)
                ->get();

            return $query->getNumRows() > 0;
        } catch (\Exception $e) {
            log_message('error', 'Error in is_artist_exists_in_rokk_artist: ' . $e->getMessage());
            return false;
        }
    }


    function activate_artist($artist_id)
    {
        // Temporarily increase execution time limit
        set_time_limit(2000); // 5 minutes
        try {
            // First, get the artist with their current data
            $query = $this->db->table('artist_registration')
                ->select('*')
                ->where('artist_id', $artist_id)
                ->get();
            
            $artist = $query->getRow(); // Fetch a single artist record
            
            if (empty($artist)) {
                return false;
            }

            // Start transaction for bulk update
            $this->db->transStart();

            // Pass the artist object to the insert methods
            $result0 = $this->insert_data_into_rokk_artist($artist);
            $result1 = $this->insert_data_into_artist_auth($artist);
            $result2 = $this->insert_data_into_artist_detail($artist);
            $result3 = $this->insert_data_into_artist_link($artist);

            // Check if all insert operations were successful
            if (!$result0 || !$result1 || !$result2 || !$result3) {
                $this->db->transRollback(); // Rollback if any insert fails
                return false;
            }
            
            // Complete transaction
            $this->db->transComplete();
            
            // Returns true if transaction was successful
            return $this->db->transStatus();

        } catch (\Exception $e) {
            log_message('error', 'Error in update_active_artist_data: ' . $e->getMessage());
            return false;
        }
    }

    public function insert_data_into_rokk_artist($artist)
    {
        try {
            // Ensure the artist object has the required properties
            if (!isset($artist->artist_id) || !isset($artist->artist_type) || !isset($artist->artist_name) || !isset($artist->artist_country) || !isset($artist->official_contact_email)) {
                log_message('error', 'Artist object is missing required properties.');
                return false;
            }
    
            $data = [
                'artist_id' => $artist->artist_id, // Assuming artist_id is provided
                'artist_type' => $artist->artist_type,
                'artist_name' => $artist->artist_name,
                'country' => $artist->artist_country,
                'official_contact_email' => $artist->official_contact_email,
                'join_date' => date("Y-m-d H:i:s"), // Assuming join_date is the current date
                'updated_at' => date("Y-m-d H:i:s"),
                'created_at' => date("Y-m-d H:i:s"),
                'status' => $artist->status ?? 'requested', // Default to 'requested' if not set
            ];
    
            $query = $this->db->table('rokk_artist')
                ->insert($data); // Use insert instead of update
    
            return $query ? true : false;
    
        } catch (\Exception $e) {
            // Log the error 
            log_message('error', 'Error in insert_data_into_rokk_artist: ' . $e->getMessage());
            return false;
        }
    }

    public function insert_data_into_artist_auth($artist)
    {
        try {
            $data = [
                'artist_id' => $artist->artist_id,
                'email' => $artist->official_contact_email,
                'password_hash' => password_hash($artist->password, PASSWORD_DEFAULT),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ];


            $query = $this->db->table('artist_auth')
                ->insert($data); // Use insert instead of update

            return $query ? true : false;

        } catch (\Exception $e) {
            // Log the error 
            log_message('error', 'Error in insert_data_into_artist_auth: ' . $e->getMessage());
            return false;
        }
    }

    public function insert_data_into_artist_detail($artist)
    {
        try {
            $data = [
                'artist_id' => $artist->artist_id,
                'label' => $artist->label,
                'distributor' => $artist->distributor_and_aggregator, 
                'referral' => $artist->referral,
                'genre' => '', 
                'email_management' => $artist->email_management,
                'preferred_rokk_address' => $artist->preferred_rokk_address,
                'artist_link_status' => $artist->artist_link_status,
                'receive_newsletter' => $artist->receive_newsletter,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ];

            $query = $this->db->table('artist_details')
                ->insert($data); // Use insert instead of update

            return $query ? true : false;

        } catch (\Exception $e) {
            // Log the error 
            log_message('error', 'Error in insert_data_into_artist_detail: ' . $e->getMessage());
            return false;
        }
    }

    public function insert_data_into_artist_link($artist)
    {
        try {
            $data = [
                'artist_id' => $artist->artist_id,
                'facebook' => $artist->facebook,
                'twitter' => $artist->twitter,
                'website' => $artist->website,
                'instagram' => $artist->instagram,
                'tiktok' => '', 
                'youtube' => '', 
                'metal_archives' => $artist->metal_archives,
                'discogs' => $artist->discogs,
                'updated' => date("Y-m-d H:i:s"), // Set the current date
            ];
    
            $query = $this->db->table('rokk_artist_link')
                ->insert($data); // Use insert instead of update
    
            return $query ? true : false;
    
        } catch (\Exception $e) {
            // Log the error 
            log_message('error', 'Error in insert_data_into_artist_link: ' . $e->getMessage());
            return false;
        }
    }



    function get_selected_artist_data($artist_id){

        try {
            $query = $this->db->table('artist_registration')
                             ->select('*')
                             ->where(['artist_id' => $artist_id])
                             ->get();

            return $query->getNumRows() > 0 ? $query->getRowArray() : false;
        } catch (Exception $e) {
            // Log the error 
            log_message('error', 'Error in get_selected_artist_data: ' . $e->getMessage());
            return false;     
        }

    }


}
