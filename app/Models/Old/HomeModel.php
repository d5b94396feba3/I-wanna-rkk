<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    protected $table            = 'homes';
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


    public function login($postData)
    {
        $username = $postData['username'];
        $password = $postData['password'];

        $query = $this->db->table('register_admin')
                         ->select('*')
                         ->where(['username' => $username, 'password' => $password])
                         ->get();

        $user = $query->getRow();

        if ($user) {
            return $user;
        } else {
            return false;
        }
    }


     public function artist_login($postData)
    {
        $email = $postData['email'];
        $password = $postData['password'];

        $query = $this->db->table('artist_registration')
                         ->select('*')
                         ->where(['EmailArtistBandofficialcontact' => $email, 'password' => $password])
                         ->get();

        if ($query->resultID->num_rows > 0) {
            return $query->getRow();
        } else {
            return false;
        }


    }




}
