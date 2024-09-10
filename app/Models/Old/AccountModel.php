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
                             ->where(['id' => $id])
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
                ->where(['id' => $id])
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
            $TypeofArtist = trim($postData["TypeofArtist"]);
            $BandArtistName = trim($postData["BandArtistName"]);
            $BandArtistCountry = trim($postData["BandArtistCountry"]);
            $EmailManagement = trim($postData["EmailManagement"]);
            $EmailArtistBandofficialcontact = trim($postData["EmailArtistBandofficialcontact"]);
            $PreferredRokkAddress = trim($postData["PreferredRokkAddress"]);
            $Referral = trim($postData["Referral"]);
            $Password = trim($postData["Password"]);
            $ConfirmPassword = trim($postData["ConfirmPassword"]);
            $Facebook = trim($postData["Facebook"]);
            $Instagram = trim($postData["Instagram"]);
            $Twitter = trim($postData["Twitter"]);
            $Spotify = trim($postData["Spotify"]);
            $MetalArchives = trim($postData["MetalArchives"]);
            $Website = trim($postData["Website"]);
            $Discogs = trim($postData["Discogs"]);
            $Label = trim($postData["Label"]);
            $DistributorAndAggregator = trim($postData["DistributorAndAggregator"]);
            $ReceiveArtistNewsletter = trim($postData["ReceiveArtistNewsletter"]);

            $data = [
                'TypeofArtist' => $TypeofArtist,
                'BandArtistName' => $BandArtistName,
                'BandArtistCountry' => $BandArtistCountry,
                'EmailManagement' => $EmailManagement,
                'EmailArtistBandofficialcontact' => $EmailArtistBandofficialcontact,
                'PreferredRokkAddress' => $PreferredRokkAddress,
                'Referral' => $Referral,
                'Password' => $Password,
                'ConfirmPassword' => $ConfirmPassword,
                'Facebook' => $Facebook,
                'Instagram' => $Instagram,
                'Twitter' => $Twitter,
                'Spotify' => $Spotify,
                'MetalArchives' => $MetalArchives,
                'Website' => $Website,
                'Discogs' => $Discogs,
                'Label' => $Label,
                'DistributorAndAggregator' => $DistributorAndAggregator,
                'ReceiveArtistNewsletter' => $ReceiveArtistNewsletter,
            ];

            $query = $this->db->table('artist_registration')
                ->set($data)
                ->where(['id' => $id])
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
           
            $Password = trim($postData["Password"]);
            $ConfirmPassword = trim($postData["ConfirmPassword"]);

            $data = [
                'Password' => $Password,
                'ConfirmPassword' => $ConfirmPassword,
            ];

            $query = $this->db->table('artist_registration')
                ->set($data)
                ->where(['id' => $id])
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
