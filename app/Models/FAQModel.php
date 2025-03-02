<?php

namespace App\Models;

use CodeIgniter\Model;

class FAQModel extends Model
{
    protected $table            = 'faq_section';
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


    public function get_faq_paginated_data($search='', $per_page=10, $sort_column = 'id', $order = 'asc')
    {

        $query = $this->select("*")
                ->orderBy($sort_column, $order);        
        
        // Get the paginated results
        $result = $query->paginate($per_page);

        // Check if records were found
        if ($query->countAllResults() === 0) {
            return false;
        }

        return $result;
    }


    public function get_faq_questions_data($main_navid, $sec_navid){

        try {
            $query = $this->db->table('faq_question')
                             ->select('*')
                             ->where(['faq_section_id' => $main_navid, 'faq_section_id' => $sec_navid])
                             ->get();

            return $query->getNumRows() > 0 ? $query->getResultArray() : false;
        } catch (Exception $e) {
            // Log the error 
            log_message('error', 'Error in get_faq_questions_data: ' . $e->getMessage());
            return false;     
        }
    }


    public function get_total_count_by_table_name($table)
    {
        try {

            $query = $this->db
                ->table($table)
                ->countAllResults();

            return $query;
        } catch (Exception $e) {
            // Log the error 
            log_message(
                "error",
                "Error in get_total_count_from_faq_table: " . $e->getMessage()
            );
            return false;
        }
    }

    public function get_all_faq_section(){

        try {
            $query = $this->db->table('faq_section')
                             ->select('*')
                             ->get();

            return $query->getNumRows() > 0 ? $query->getResultArray() : false;
        } catch (Exception $e) {
            // Log the error 
            log_message('error', 'Error in get_all_faq_section: ' . $e->getMessage());
            return false;     
        }
    }

    public function get_top_faq_section($limit){

        try {
            $query = $this->db->table('faq_section')
                             ->select('*')
                             ->orderBy('prio', 'DESC')
                             ->limit($limit)
                             ->get();

            return $query->getNumRows() > 0 ? $query->getResultArray() : false;
        } catch (Exception $e) {
            // Log the error 
            log_message('error', 'Error in get_all_faq_section: ' . $e->getMessage());
            return false;     
        }
    }


    function get_selected_faq_sec_dashboard_data($id){

        try {
            $query = $this->db->table('faq_section')
                             ->select('*')
                             ->where(['id' => $id])
                             ->get();

            return $query->getNumRows() > 0 ? $query->getRowArray() : false;
        } catch (Exception $e) {
            // Log the error 
            log_message('error', 'Error in get_selected_faq_sec_dashboard_data: ' . $e->getMessage());
            return false;     
        }

    }


    function get_selected_faq_question_dashboard_data($id){

        try {
            $query = $this->db->table('faq_question')
                             ->select('*')
                             ->where(['id' => $id])
                             ->get();

            return $query->getNumRows() > 0 ? $query->getRowArray() : false;
        } catch (Exception $e) {
            // Log the error 
            log_message('error', 'Error in get_selected_faq_question_dashboard_data: ' . $e->getMessage());
            return false;     
        }

    }


}
