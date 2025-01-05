<?php

namespace App\Models;

use CodeIgniter\Model;

class FAQPaginationModel extends Model
{
    protected $table            = 'faq_question';
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
   


    public function get_faq_question_dashboard_data($search='', $per_page=10, $sort_column = 'id', $order = 'asc'){

        try {
   
            $query = $this->select("*");

            if (!empty($search)) {
                $query->like('question', $search, 'after');
            }

            // Validate and apply sorting
            $allowedColumns = ['id', 'question', 'answer', 'prio', 'updated_by'];
            $sort_column = in_array($sort_column, $allowedColumns) ? $sort_column : 'id';
            $order = strtolower($order) === 'desc' ? 'DESC' : 'ASC';

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
            log_message('error', 'Error in get_faq_question_dashboard_data: ' . $e->getMessage());
            return false;
        }

    }



}
