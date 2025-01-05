<?php

namespace App\Models;

use CodeIgniter\Model;

class MusicUploadModel_mainDB extends Model
{
    protected $dbGroup          = 'maindb';
    protected $table            = 'genre';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['*'];

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


    public function __construct()
    {
        parent::__construct();

        // Explicitly connect to the 'maindb' database
        $this->db = db_connect('maindb');
    }

    public function getGenreDataFromMainDB() 
    {
        $query = $this->db->table('genre') 
            ->select('*')
            ->get();

        return $query->getNumRows() > 0 ? $query->getResultArray() : false;
    }

    public function getGenreDataFromMainDBById($id)
    {
        try {
            $query = $this->db->table('genre') 
                ->select('*')
                ->where(['id' => $id])
                ->get();

            return $query->getNumRows() > 0 ? $query->getRow() : false;
        } catch (\Exception $e) {
            // Log the error
            log_message('error', 'Error in getGenreDataFromMainDBById: ' . $e->getMessage());
            return false;
        }
    }
  




}
