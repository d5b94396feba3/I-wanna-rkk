<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountSettingModel extends Model
{
    protected $dbGroup = "wp_artist_registration";
    protected $table = "artist_release";
    protected $primaryKey = "id";
    protected $useAutoIncrement = true;
    protected $returnType = "array";
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = "datetime";
    protected $createdField = "created_at";
    protected $updatedField = "updated_at";
    protected $deletedField = "deleted_at";

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];


   
    public function get_artist_data_from_rokk_artist_by_id($userid)
    {
        try {
            $query = $this->db
                ->table('rokk_artist ra')
                ->select('
                    ra.artist_id,
                    ra.artist_type,
                    ra.artist_name,
                    ra.country,
                    ra.official_contact_email,
                    ra.join_date,
                    ra.status,
                    ad.label,
                    ad.distributor,
                    ad.vat,
                    ad.email_management,
                    ad.preferred_rokk_address,
                    ads.file_link,
                    
                ')
                ->join('artist_details ad', 'ra.artist_id = ad.artist_id', 'left')  // Using LEFT JOIN to get data even if details don't exist
                ->join('artist_assets ads', 'ads.artist_id = ad.artist_id', 'left')  // Using LEFT JOIN to get data even if details don't exist
                ->where('ra.artist_id', $userid)
                ->limit(1)
                ->get();
    
                return $query->resultID->num_rows > 0 ? $query->getRow() : false;    
        } catch (\Exception $e) {
            log_message(
                "error",
                "Error in get_artist_data_from_rokk_artist_by_id: " . $e->getMessage()
            );
            return false;
        }
    }

    public function get_person_data_from_rokk_person_by_id($userid)
    {
        try {
            $query = $this->db
                ->table("rokk_person")
                ->select("*")
                ->where(["artist_id" => $userid])
                ->get();

                return $query->resultID->num_rows > 0 ? $query->getRow() : false;

        } catch (Exception $e) {
            // Log the error 
            log_message(
                "error",
                "Error in get_person_data_from_rokk_person_by_id: " . $e->getMessage()
            );
            return false;
        }
    }

    public function get_social_media_data_from_artist_link_by_id($userid)
    {
        try {

            if (!$this->is_artist_exists_in_rokk_artist_link($userid)) {
                return $this->get_social_media_data_from_artist_registration($userid);
            }

            $query = $this->db
            ->table("rokk_artist_link")
            ->select("*")
            ->where(["artist_id" => $userid])
            ->get();

            return $query->resultID->num_rows > 0 ? $query->getRow() : false;
        } catch (Exception $e) {
            log_message(
                "error",
                "Error in get_social_media_data_from_artist_link_by_id: " . $e->getMessage()
            );
            return false;
        }
    }
    
    public function get_social_media_data_from_artist_registration($userid)
    {
        try {
            $query = $this->db
                ->table("artist_registration")
                ->select("*")
                ->where(["artist_id" => $userid])
                ->get();
    
            return $query->resultID->num_rows > 0 ? $query->getRow() : false;
        } catch (Exception $e) {
            log_message(
                "error",
                "Error in get_social_media_data_from_artist_registration: " . $e->getMessage()
            );
            return false;
        }
    }

    public function update_artist_logo_image($postData, $image_link, $file_name)
    {
        try {
            $userid = trim($postData["userid"]);
            $asset_type = trim($postData["asset_type"]);

            // Set the timezone explicitly before using strtotime and date function
            date_default_timezone_set("UTC");
            $updated = date("Y/m/d");

            $data = [
                "asset_type" => $asset_type,
                "file_name" => $file_name,
                "file_link" => $image_link,
                "artist_id" => $userid,
                "updated_at" => $updated,
            ];

            if ($this->is_file_exists_in_artist_assests($userid)) {
                $query = $this->db
                    ->table("artist_assets")
                    ->where("artist_id", $userid)
                    ->update($data);
            } else {
                $query = $this->db
                    ->table("artist_assets")
                    ->insert($data);
            }

            return $this->db->affectedRows() > 0;
        } catch (\Exception $e) {
            // Log the error
            log_message(
                "error",
                "Error in update_artist_logo_image: " .
                    $e->getMessage()
            );
            return false;
        }
    }

    public function update_person_profile_image($postData,$image_link)
    {
        try {
            $person_id = trim($postData["person_id"]);
            $userid=session('userid');

            // Set the timezone explicitly before using strtotime and date function
            date_default_timezone_set("UTC");
            $updated = date("Y/m/d");

            $data = [
                "person_img_link" => $image_link,
                "updated" => $updated,
            ];

            if (!$this->is_artist_exists_in_rokk_person($userid) && !$this->is_artist_exists_in_rokk_artist($userid)) {

                if(!$this->insert_artist_data_from_artist_registration($userid)){
                    log_message('error', 'Failed to insert artist in rokk_artist table: ' . $userid);
                    return false;
                }
            }
            if ($this->is_person_data_exists($userid)) {
                $query = $this->db
                    ->table("rokk_person")
                    ->where("person_id", $person_id)
                    ->update($data);
            } else {
                $query = $this->db
                    ->table("rokk_person")
                    ->insert($data);
            }

            return $this->db->affectedRows() > 0;
        } catch (\Exception $e) {
            // Log the error
            log_message(
                "error",
                "Error in update_person_profile_image: " .
                    $e->getMessage()
            );
            return false;
        }
    }


    public function update_artist_setting_info($postData)
    {
        try {
            $this->db->transBegin(); // Start transaction

            $userid = trim($postData["userid"]);
            $artist_name = trim($postData["artist_name"]);
            $artist_type = trim($postData["artist_type"]);
            $official_contact_email = trim($postData["official_contact_email"]);
            $country = trim($postData["country"]);
            $label = trim($postData["label"]);
            $distributor_and_aggregator = trim($postData["distributor_and_aggregator"]);
            $vat = trim($postData["vat"]);

            // Set the timezone explicitly before using strtotime and date functions
            date_default_timezone_set("UTC");

            // Data for rokk_artist table
            $artist_data = [
                "artist_id" => $userid,
                "artist_name" => $artist_name,
                "artist_type" => $artist_type,
                "official_contact_email" => $official_contact_email,
                "country" => $country
            ];

            // Data for artist_details table
            $details_data = [
                "artist_id" => $userid,
                "label" => $label,
                "distributor" => $distributor_and_aggregator,
                "vat" => $vat
            ];

            // Update or insert rokk_artist
            if ($this->is_artist_exists_in_rokk_artist($userid)) {
                $this->db->table("rokk_artist")
                        ->where("artist_id", $userid)
                        ->update($artist_data);
            } else {
                $this->db->table("rokk_artist")
                        ->insert($artist_data);
            }

            // Update or insert artist_details
            if ($this->is_artist_exists_in_details($userid)) {
                $this->db->table("artist_details")
                        ->where("artist_id", $userid)
                        ->update($details_data);
            } else {
                $this->db->table("artist_details")
                        ->insert($details_data);
            }

            // Commit transaction if all operations successful
            if ($this->db->transStatus() === false) {
                $this->db->transRollback();
                return false;
            }

            $this->db->transCommit();
            return true;

        } catch (\Exception $e) {
            $this->db->transRollback();
            log_message("error", "Error in update_artist_setting_info: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Check if artist exists in artist_details table
     */
    private function is_artist_exists_in_details($userid)
    {
        try {
            $query = $this->db->table('artist_details')
                            ->where('artist_id', $userid)
                            ->get();

            return $query->getNumRows() > 0;
        } catch (\Exception $e) {
            log_message('error', 'Error in is_artist_exists_in_details: ' . $e->getMessage());
            return false;
        }
    }

    public function update_person_setting_info($postData)
    {
        try {
            $userid = trim($postData["userid"]);
            $is_person_data_exist = trim($postData["person_data"]);
            $role = trim($postData["role"]);
            $firstname = trim($postData["firstname"]);
            $lastname = trim($postData["lastname"]);
            $email = trim($postData["email"]);
            $phone = trim($postData["phone"]);
            $country = trim($postData["country"]);
            $city = trim($postData["city"]);
            $zip = trim($postData["zip"]);
            $address = trim($postData["address"]);

            // Set the timezone explicitly before using strtotime and date functions
            date_default_timezone_set("UTC");
            $updated = date("Y/m/d");

            $data = [
                "artist_id" => $userid,
                "role" => $role,
                "first_name" => $firstname,
                "last_name" => $lastname,
                "email" => $email,
                "phone" => $phone,
                "country" => $country,
                "city" => $city,
                "zip" => $zip,
                "address" => $address,
                "updated" => $updated,
            ];

            if (!$this->is_artist_exists_in_rokk_person($userid) && !$this->is_artist_exists_in_rokk_artist($userid)) {

                if(!$this->insert_artist_data_from_artist_registration($userid)){
                    log_message('error', 'Failed to insert artist in rokk_artist table: ' . $userid);
                    return false;
                }
            }
            if ($this->is_person_data_exists($userid)) {
                $query = $this->db
                    ->table("rokk_person")
                    ->where("artist_id", $userid)
                    ->update($data);
            } else {
                $query = $this->db
                    ->table("rokk_person")
                    ->insert($data);
            }

            return $this->db->affectedRows() > 0;
        } catch (\Exception $e) {
            // Log the error
            log_message(
                "error",
                "Error in update_person_setting_info: " . $e->getMessage()
            );
            return false;
        }
    }

    public function insert_artist_data_from_artist_registration($userid)
    {
        try {
            $query = $this->db
                ->table('artist_registration')
                ->where('artist_id', $userid)
                ->get();

            if($query->getNumRows() > 0){
               $artistData=$query->getRow();
               if(!$this->insert_into_rokk_artist($artistData)){
                    return false;
               }
            }
            return true;
        } catch (\Exception $e) {
            log_message('error', 'Error in insert_artist_data_from_artist_registration: ' . $e->getMessage());
            return false;
        }
    }

    public function insert_into_rokk_artist($artistData)
    {
        try {
            // Set the timezone explicitly before using strtotime and date functions
            date_default_timezone_set("UTC");
            $updated = date("Y/m/d");

            $data = [
                "artist_id" => $artistData->artist_id,
                "artist_type" => $artistData->artist_type,
                "artist_name" => $artistData->artist_name,
                "country" => $artistData->artist_country,
                "official_contact_email" => $artistData->official_contact_email,
                "label" => $artistData->label,
                "distributor" => $artistData->distributor_and_aggregator,
                "join_date" => $artistData->join_date,
                "updated" => $updated
            ];

            $query = $this->db
                ->table("rokk_artist")
                ->insert($data);

            return $this->db->affectedRows() > 0;
        } catch (\Exception $e) {
            // Log the error
            log_message(
                "error",
                "Error in insert_into_rokk_artist: " .
                    $e->getMessage()
            );
            return false;
        }
    }

    public function is_person_data_exists($userid)
    {
        try {
            $query = $this->db
                ->table('rokk_person')
                ->where('artist_id', $userid)
                ->get();

            return $query->getNumRows() > 0;
        } catch (\Exception $e) {
            log_message('error', 'Error in is_person_data_exists: ' . $e->getMessage());
            return false;
        }
    }


    public function is_file_exists_in_artist_assests($userid)
    {
        try {
            $query = $this->db
                ->table('artist_assets')
                ->where('artist_id', $userid)
                ->get();

            return $query->getNumRows() > 0;
        } catch (\Exception $e) {
            log_message('error', 'Error in is_file_exists_in_artist_assests: ' . $e->getMessage());
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

    public function is_artist_exists_in_rokk_person($userid)
    {
        try {
            $query = $this->db
                ->table('rokk_person')
                ->where('artist_id', $userid)
                ->get();

            return $query->getNumRows() > 0;
        } catch (\Exception $e) {
            log_message('error', 'Error in is_artist_exists_in_rokk_person: ' . $e->getMessage());
            return false;
        }
    }
    public function is_artist_exists_in_rokk_artist_link($userid)
    {
        try {
            $query = $this->db
                ->table('rokk_artist_link')
                ->where('artist_id', $userid)
                ->get();

            return $query->getNumRows() > 0;
        } catch (\Exception $e) {
            log_message('error', 'Error in is_artist_exists_in_artist_link: ' . $e->getMessage());
            return false;
        }
    }

    public function update_socail_media_setting_info($postData)
    {
        try {
            $userid = trim($postData["userid"]);
            
            // Set the timezone explicitly before using strtotime and date functions
            date_default_timezone_set("UTC");
            $updated = date("Y/m/d");

            $data = [];

            $data = [
                'artist_id' => $userid,
                'website' => $postData['website'],
                'facebook' => $postData['facebook'],
                'instagram' => $postData['instagram'], 
                'twitter' => $postData['twitter'],
                'tiktok' => $postData['tiktok'],
                'youtube' => $postData['youtube'],
                'metal_archives' => $postData['metal-archives'],
                'discogs' => $postData['discogs'],
                'updated' => $updated
            ];

            if (!$this->is_artist_exists_in_rokk_artist_link($userid)) {
                $this->db->table("rokk_artist_link")
                         ->insert($data);  
            } else {
                $this->db->table("rokk_artist_link")
                ->where('artist_id', $userid)
                ->update($data);
            }

            return $this->db->affectedRows() > 0;
        } catch (\Exception $e) {
            // Log the error
            log_message(
                "error",
                "Error in update_socail_media_setting_info: " . $e->getMessage()
            );
            return false;
        }
    }
    


}
