<?php

namespace App\Models;

use CodeIgniter\Model;

class RegisteredArtistPagiModel extends Model
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
   

    public function arist_paginated_data($search='', $filter_by='', $per_page=10, $sort_column = 'artist_id', $order = 'asc'){

        try {
            $artist_types = ['Solo Artist', 'Band'];
            $status_types = ['Active', 'Inactive', 'Requested', 'Approved'];

            // Validate and apply sorting
            $allowedColumns = ['artist_id', 'artist_type', 'artist_name', 'artist_country', 'email_management', 
                             'status', 'join_date'];
            $sort_column = in_array($sort_column, $allowedColumns) ? $sort_column : 'artist_id';
            $order = strtolower($order) === 'desc' ? 'DESC' : 'ASC';

            $query = $this->select("*");
           
            if (!empty($search)) {
                $query->groupStart()
                    ->like('artist_name', $search, 'both')
                    ->orLike('email_management', $search, 'both')
                    ->orLike('artist_country', $search, 'both')
                    ->groupEnd();
            }

            if (!empty($filter_by)) {
                if (in_array($filter_by, $artist_types)) {
                    $query->where('artist_type', $filter_by);
                } else if (in_array($filter_by, $status_types)) {
                    $query->where('status', $filter_by);
                } else {
                    log_message('debug', 'Invalid filter value: ' . $filter_by);
                }
            }

            $query->orderBy($sort_column, $order);

            // Get the paginated results 
            $result = $query->paginate($per_page);

            // Check if records were found
            if ($query->countAllResults() === 0) {
                return false;
            }

            return $result;

        } catch (Exception $e) {
            // Log the error 
            log_message('error', 'Error in arist_paginated_data: ' . $e->getMessage());
            return false;
        }
    }



}
