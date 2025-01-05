<?php

namespace App\Models;

use CodeIgniter\Model;

class NotificationPaginationModel extends Model
{
    protected $table            = 'notification';
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
   


    public function get_notification_paginated_data($search='', $filter_by='', $per_page=10, $sort_column = 'id', $order = 'asc'){

        try {

            $types=['welcome','news'];
            $status=['published','preview'];
            // Validate and apply sorting
            $allowedColumns = ['id', 'title', 'content', 'status', 'types'];
            $sort_column = in_array($sort_column, $allowedColumns) ? $sort_column : 'id';
            $order = strtolower($order) === 'desc' ? 'DESC' : 'ASC';

            $query = $this->select("*");
           
            if (!empty($search)) {
                $query->like('title', $search, 'after');
            }

            if (!empty($filter_by)) {
                if (in_array($filter_by, $types)) {
                    $query->where('types', $filter_by);
                } else if (in_array($filter_by, $status)) {
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
            log_message('error', 'Error in get_notification_paginated_data: ' . $e->getMessage());
            return false;
        }

    }



}
