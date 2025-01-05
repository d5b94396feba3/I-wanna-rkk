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
        $query = $this->db->table('rokk_artist')
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
            $query = $this->db->table('rokk_artist')
                             ->select('*')
                             ->where(['artist_id' => $id])
                             ->get();
            
            if ($query->resultID->num_rows > 0) {
                return $query->getRow();
            } else {
                return false;
            }
        } catch (Exception $e) {
            // Log the error 
            log_message('error', 'Error in getArtistDataByID: ' . $e->getMessage());
            return false;
        }
    }

    public function get_artist_detail($id)
    {
        try {
            $query = $this->db->table('artist_details')
                             ->select('*')
                             ->where(['artist_id' => $id])
                             ->get();
            
            if ($query->resultID->num_rows > 0) {
                return $query->getRow();
            } else {
                return false;
            }
        } catch (Exception $e) {
            // Log the error 
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
            // Log the error 
            log_message('error', 'Error in getArtistDataByID: ' . $e->getMessage());
            return false;
        }
    }

    // on delete cascade, needs to be added...
    public function delete_artist_account_data_by_id($postData)
    {
        try {
            $id = trim($postData["registered_id"]);

            $query = $this->db->table('rokk_artist')
                ->where(['artist_id' => $id])
                ->delete();

            return $this->db->affectedRows() > 0;
        } catch (\Exception $e) {
            // Log the error 
            log_message('error', 'Error in delete_artist_account_data_by_id: ' . $e->getMessage());
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
                'password_hash' => password_hash($password, PASSWORD_DEFAULT),
            ];

            $query = $this->db->table('artist_auth')
            ->set($data)
            ->where(['artist_id' => $id])
            ->update();

            return $query ? true : false;

        } catch (\Exception $e) {
            // Log the error 
            log_message('error', 'Error in update_artist_data_by_id: ' . $e->getMessage());
            return false;
        }

    }


}
