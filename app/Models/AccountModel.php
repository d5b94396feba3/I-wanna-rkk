<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model
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




   public function get_registered_artist_data()
    {
        $query = $this->db->table('artist_registration')
                         ->select('*')
                         ->get();

        if ($query->getResult()) {
            return $query->getResultArray();
        } else {
            return false;
        }
    }


    public function getArtistDataByID($id)
    {
        try {
            $query = $this->db->table('artist_registration')
                             ->select('*')
                             ->where(['artist_id' => $id])
                             ->get();
            
            if ($query->resultID->num_rows > 0) {
                return $query->getRow();
            } else {
                return false;
            }
        } catch (Exception $e) {
            // Log the error or do something else with it
            log_message('error', 'Error in getArtistDataByID: ' . $e->getMessage());
            return false;
        }
    }



    public function get_artist_user_junc_data($main_artist_id)
    {
        try {
            $query = $this->db->table('artist_user_junc')
                             ->select('*')
                             ->where(['main_artist_id' => $main_artist_id])
                             ->get();
            
            if ($query->getResult()) {
                return $query->getResultArray();
            } else {
                return false;
            }
        } catch (Exception $e) {
            // Log the error or do something else with it
            log_message('error', 'Error in getArtistDataByID: ' . $e->getMessage());
            return false;
        }
    }


    public function delete_artist_account_data_by_id($postData)
    {
        try {
            $id = trim($postData["registered_id"]);

            $query = $this->db->table('artist_registration')
                ->where(['artist_id' => $id])
                ->delete();

            // Check if any rows were affected
            if ($this->db->affectedRows() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            // Log the error or do something else with it
            log_message('error', 'Error in delete_artist_account_data_by_id: ' . $e->getMessage());
            return false;
        }
    }


    public function update_artist_account_data_by_id($postData)
    {


        try {
            $id = trim($postData["registered_id"]);
            $artist_type = trim($postData["artist_type"]);
            $artist_name = trim($postData["artist_name"]);
            $artist_country = trim($postData["artist_country"]);
            $email_management = trim($postData["email_management"]);
            $official_contact_email = trim($postData["official_contact_email"]);
            $preferred_rokk_address = trim($postData["preferred_rokk_address"]);
            $referral = trim($postData["referral"]);
            $password = trim($postData["password"]);
            $confirm_password = trim($postData["confirm_password"]);
            $facebook = trim($postData["facebook"]);
            $instagram = trim($postData["instagram"]);
            $twitter = trim($postData["twitter"]);
            $spotify = trim($postData["spotify"]);
            $metal_archives = trim($postData["metal_archives"]);
            $website = trim($postData["website"]);
            $discogs = trim($postData["discogs"]);
            $label = trim($postData["label"]);
            $distributor_and_aggregator = trim($postData["distributor_and_aggregator"]);
            $receive_newsletter = trim($postData["receive_newsletter"]);

            $data = [
                'artist_type' => $artist_type,
                'artist_name' => $artist_name,
                'artist_country' => $artist_country,
                'email_management' => $email_management,
                'official_contact_email' => $official_contact_email,
                'preferred_rokk_address' => $preferred_rokk_address,
                'referral' => $referral,
                'password' => $password,
                'confirm_password' => $confirm_password,
                'facebook' => $facebook,
                'instagram' => $instagram,
                'twitter' => $twitter,
                'spotify' => $spotify,
                'metal_archives' => $metal_archives,
                'website' => $website,
                'discogs' => $discogs,
                'label' => $label,
                'distributor_and_aggregator' => $distributor_and_aggregator,
                'receive_newsletter' => $receive_newsletter,
            ];

            $query = $this->db->table('artist_registration')
                ->set($data)
                ->where(['artist_id' => $id])
                ->update();

            if ($query) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            // Log the error or do something else with it
            log_message('error', 'Error in update_artist_data_by_id: ' . $e->getMessage());
            return false;
        }


    }


    public function update_artist_password_by_id($postData)
    {


        try {
            $id = trim($postData["registered_id"]);
           
            $password = trim($postData["password"]);
            $confirm_password = trim($postData["confirm_password"]);

            $data = [
                'password' => $password,
                'confirm_password' => $confirm_password,
            ];

            $query = $this->db->table('artist_registration')
                ->set($data)
                ->where(['artist_id' => $id])
                ->update();

            if ($query) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            // Log the error or do something else with it
            log_message('error', 'Error in update_artist_data_by_id: ' . $e->getMessage());
            return false;
        }


    }


}
