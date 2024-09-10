<?php

namespace App\Models;

use CodeIgniter\Model;

class DirectArtistSupportModel extends Model
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



    public function update_direct_artist_support_by_id($postData,$artist_link_status)
    {


        try {
            $id = trim($postData["registered_id"]);
            
            $PreferredRokkAddress = trim($postData["PreferredRokkAddress"]);
            // $Password = trim($postData["Password"]);
            // $ConfirmPassword = trim($postData["ConfirmPassword"]);

            $data = [
                'PreferredRokkAddress' => $PreferredRokkAddress,
                'artist_link_status' => $artist_link_status,
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
