<?php

namespace App\Models;

use CodeIgniter\Model;

class CAPaginationModel extends Model
{
    protected $table            = 'artist_user_junc';
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


    public function get_ca_data_from_artist_user_junc($artist_id, $search='', $per_page=10, $sort_column = 'id', $order = 'asc')
    {
        $query = $this->select("*")
                ->where('artist_id', $artist_id)
                ->orderBy($sort_column, $order);
        // Get the paginated results
        $result = $query->paginate($per_page);

        // Check if records were found
        if ($query->countAllResults() === 0) {
            return false;
        }

        return $result;
    }





}
