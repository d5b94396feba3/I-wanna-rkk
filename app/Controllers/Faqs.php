<?php

namespace App\Controllers;

use App\Models\FAQModel;
use CodeIgniter\Controller;
use CodeIgniter\Email\Email;
use App\Models\FAQSecPaginationModel;
use App\Models\FAQPaginationModel;

class Faqs extends BaseController
{
    protected $faq_model;
    protected $faq_sec_model;
    protected $faquestion_model;
    protected $session;
    protected $validation;
    protected $perPage = 8;
    private $db1;
    private $db2;


    public function __construct()
    {
        $this->faq_model = model("FAQModel");
        $this->faq_sec_pagi_model = model("FAQSecPaginationModel");
        $this->faq_pagi_model = model("FAQPaginationModel");
        $this->session = session();
        $this->validation = \Config\Services::validation();

    }

    public function index()
    {
        $data["active_nav"] = "frequently-asked-questions";

        $faq_questions = $this->faq_model->get_all_faq_section();

        $data['faq_questions'] = $faq_questions;

        $limit=6;
        $faq_sections= $this->faq_model->get_top_faq_section($limit);
        $data['faq_sections'] = $faq_sections;
        
        if (!$this->authenticated()) {
            // return $this->handleUnauthorized();
            return view("rokk-artists/layout/public/header", $data) .
            view("rokk-artists/faqs/public/index", $data) .
            view("rokk-artists/layout/public/footer");
        }
        return view("rokk-artists/layout/header", $data) .
            view("rokk-artists/faqs/index", $data) .
            view("rokk-artists/layout/footer");
    }

    public function faqs_dashboard()
    {
        $data["active_nav"] = "frequently-asked-questions";

        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }

        $faq_sections= $this->faq_model->get_all_faq_section();
        $table="faq_question";
        $faq_question_total_count = $this->faq_model-> get_total_count_by_table_name($table);

        $data['faq_sections'] = $faq_sections;
        $data['faq_section_total_count'] = count($faq_sections);
        $data['faq_question_total_count'] = $faq_question_total_count;

        return view("rokk-artists/layout/header", $data) .
            view("rokk-artists/faqs/dashboard", $data) .
            view("rokk-artists/layout/footer");
    }


    function ajax_faq_question_index_data(){


        $userid = $this->userID();

        $main_navid = $this->request->getGet('main_navid');
        $sec_navid = $this->request->getGet('sec_navid');

        $questions_data = $this->faq_model->get_faq_questions_data($main_navid, $sec_navid);

        $data['questions_data'] = $questions_data;
        $data['faq_sections'] = "";

        $response=[
            'questions_data'=>view("rokk-artists/faqs/ajax-data/index-question-list", $data),
            'faq_sections'=>"",
        ];

        return $this->response->setJSON($response);
    }


    function ajax_faq_section_dashboard_data(){

        if (!$this->authenticated()) {
            return $this->handleUnauthorizedViaAjax();
        }

        $per_page=$this->perPage;

         // Get the current page number from the query string
         $page = $this->request->getGet("page") ?? 1;
         $search='';
         $search = trim($this->request->getGet("search"));
 
         $sort_column = $this->request->getGet("sort_column") ?? "id";
         $order = $this->request->getGet("order") ?? "asc";
         
          // Get the artist data
         $faq_section_data = $this->faq_sec_pagi_model->get_faq_section_dashboard_data($search,$per_page,$sort_column,$order);
 
         $data["sort_column"] = $sort_column;
         $data["order"] = $order;
         $data['faq_section_data'] = $faq_section_data;
 
         $total_records = $this->faq_sec_pagi_model->pager->getTotal();
         // Calculate pagination details
         $total_pages = ceil($total_records / $per_page);
         $has_previous = $page > 1;
         $has_next = $page < $total_pages;
 
         $data["total_records"] = $total_records;
         $data["current_page"] = $page;
         $data["per_page"] = $per_page;
         $data["total_pages"] = $total_pages;
         $data["has_previous"] = $has_previous;
         $data["has_next"] = $has_next;

        return view("rokk-artists/faqs/ajax-data/dashboard-section-list", $data);
    }


    function ajax_faq_question_dashboard_data(){

        if (!$this->authenticated()) {
            return $this->handleUnauthorizedViaAjax();
        }

        $per_page=$this->perPage;

         // Get the current page number from the query string
         $page = $this->request->getGet("page") ?? 1;

         $search='';
         $search = trim($this->request->getGet("search"));
 
         $sort_column = $this->request->getGet("sort_column") ?? "id";
         $order = $this->request->getGet("order") ?? "asc";
         
          // Get the artist data
         $faq_question_data = $this->faq_pagi_model->get_faq_question_dashboard_data($search,$per_page,$sort_column,$order);
 
         $data["sort_column"] = $sort_column;
         $data["order"] = $order;
         $data['faq_question_data'] = $faq_question_data;
 
         $total_records = $this->faq_pagi_model->pager->getTotal();
         // Calculate pagination details
         $total_pages = ceil($total_records / $per_page);
         $has_previous = $page > 1;
         $has_next = $page < $total_pages;
 
         $data["total_records"] = $total_records;
         $data["current_page"] = $page;
         $data["per_page"] = $per_page;
         $data["total_pages"] = $total_pages;
         $data["has_previous"] = $has_previous;
         $data["has_next"] = $has_next;

        return view("rokk-artists/faqs/ajax-data/dashboard-question-list", $data);
    }

    function ajax_selected_faq_sec_dashboard_data(){
        
        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }elseif (
            $this->request->getMethod() === "get"
        ) {
            $id = $this->request->getGet('id');
            $result = $this->faq_model->get_selected_faq_sec_dashboard_data($id);
            if ($result) {
                $name = $result['name'];
                $url = $result['url'];
                $prio = $result['prio'];
                $response = [
                    'name' => $name,
                    'url' => $url,
                    'prio' => $prio
                ];
                return $this->response->setJSON($response);
            } else {
                return $this->response->setJSON(['error' => 'No data found']);
            }
        }
    }


    function ajax_selected_faq_question_dashboard_data(){
        
        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }elseif (
            $this->request->getMethod() === "get"
        ) {
            $id = $this->request->getGet('id');
            $result = $this->faq_model->get_selected_faq_question_dashboard_data($id);
            if ($result) {
                $faq_section_id = $result['faq_section_id'];
                $question = $result['question'];
                $answer = $result['answer'];
                $prio = $result['prio'];
                $updated_by = $result['updated_by'];
                $response = [
                    'faq_section_id' => $faq_section_id,
                    'question' => $question,
                    'answer' => $answer,
                    'prio' => $prio,
                    'updated_by' => $updated_by,
                ];
                return $this->response->setJSON($response);
            } else {
                return $this->response->setJSON(['error' => 'No data found']);
            }
        }
    }

}
