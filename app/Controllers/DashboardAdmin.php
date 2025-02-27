<?php

namespace App\Controllers;

use App\Models\RegisteredArtistModel;
use CodeIgniter\Controller;
use CodeIgniter\Email\Email;
use App\Models\RegisteredArtistPagiModel;

class DashboardAdmin extends BaseController
{
    protected $registered_artist_model;
    protected $faquestion_model;
    protected $session;
    protected $validation;
    protected $perPage = 8;

    public function __construct()
    {
        $this->registered_artist_model = model("RegisteredArtistModel");
        $this->arist_pagination_model = model("RegisteredArtistPagiModel");
        $this->session = session();
        $this->validation = \Config\Services::validation();

    }

    public function artist_dashboard()
    {
        $data["active_nav"] = "dashbaord";

        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }

        return view("rokk-artists/layout/header", $data) .
            view("rokk-artists/dashboard/user_index", $data) .
            view("rokk-artists/layout/footer");
    }

    
    public function ajax_count_registered_artists_data()
    {
        $data["active_nav"] = "dashboard";

        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }

        $table = "artist_registration";
        $total_artist = $this->registered_artist_model->get_total_count_by_table_name($table);

        $fieldName = "status";
        $fieldValue = "requested";
        $artist_request = $this->registered_artist_model->get_total_count_by_field_name($fieldName,$fieldValue);
        $fieldValue = "active";
        $artist_active = $this->registered_artist_model->get_total_count_by_field_name($fieldName,$fieldValue);
        $fieldValue = "inactive";
        $artist_inactive = $this->registered_artist_model->get_total_count_by_field_name($fieldName,$fieldValue);

        $response = [
            'total_artist' => $total_artist,
            'artist_request' => $artist_request,
            'artist_active' => $artist_active,
            'artist_inactive' => $artist_inactive,
        ];
        return $this->response->setJSON($response);
    }

    public function ajax_count_link_status_data()
    {
        $data["active_nav"] = "dashboard";

        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }

        $table = "artist_registration";
        
        $fieldName = "artist_link_status";
        $fieldValue = "requested";
        $total_link_request = $this->registered_artist_model->get_total_count_by_field_name($fieldName,$fieldValue);
        $fieldValue = "empty";
        $total_link_empty = $this->registered_artist_model->get_total_count_by_field_name($fieldName,$fieldValue);
        $fieldValue = "confirmed";
        $total_link_confirmed = $this->registered_artist_model->get_total_count_by_field_name($fieldName,$fieldValue);

        $response = [
            'total_link_request' => $total_link_request,
            'total_link_empty' => $total_link_empty,
            'total_link_confirm' => $total_link_confirmed,
        ];

        return $this->response->setJSON($response);
    }

    // admin notification dashboard's paginated data
    function ajax_registered_artists_data(){

        if (!$this->authenticated()) {
            return $this->handleUnauthorizedViaAjax();
        }
        
        $search='';
        $filter_by='';
        $per_page=$this->perPage;
         // Get the current page number from the query string
         $page = $this->request->getGet("page") ?? 1;
         $search = trim($this->request->getGet("search"));
         $filter_by = trim($this->request->getGet("filter_by"));
 
         $sort_column = $this->request->getGet("sort_column") ?? "join_date";
         $order = $this->request->getGet("order") ?? "desc";
         
         // Get the artist data
         $artist_data = $this->arist_pagination_model->arist_paginated_data($search,$filter_by,$per_page,$sort_column,$order);
 
         $data["sort_column"] = $sort_column;
         $data["order"] = $order;
         $data['artist_data'] = $artist_data;
 
         $total_records = $this->arist_pagination_model->pager->getTotal();
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

        return view("rokk-artists/dashboard/layout/ad_dashboard", $data);
    }


    public function update_artist()
    {
        $validation = \Config\Services::validation();

        $route = "artist_dashboard";
        $success_msg = "Artist details updated successfully.";
        $error_msg = "Failed to update artist details, please try again.";

        $validation->setRules([
            "artist_type" => "required|max_length[35]",
            "artist_name" => "required|max_length[200]",
            "artist_country" => "required|max_length[150]",
            "official_contact_email" => "required|valid_email|max_length[100]",
        ]);

        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }
        // Check if user has permission to manage content
        elseif ($this->isAdmin() && !$this->hasPermission('manage_content')) {    
            return $this->handleResponse(false,
                "You do not have permission to update content."
            );
        }
        elseif (
            $this->request->getMethod() === "post" &&
            $validation->withRequest($this->request)->run() && $this->isAdmin()
        ) {
            $result = $this->registered_artist_model->update_artist(
                $this->request->getPost()
            );

            if ($result) {
                return $this->handleResponse(true, $success_msg);
            } else {
                return $this->handleResponse(false, $error_msg);
            }
        } else {
            // Log validation errors
            $errors = $validation->getErrors();
            $errorString = implode(" ", $errors);
            return $this->handleResponse(false, $errorString);
        }
    }

    /**
     * Custom validation rule for URLs that can be empty
     */
    public function valid_url_or_empty($str)
    {
        if (empty($str)) {
            return true;
        }
        return filter_var($str, FILTER_VALIDATE_URL) !== false;
    }


    public function submit_notification()
    {

        $validation = \Config\Services::validation();

        $route="notification_dashboard";
        $hidden_type = $this->request->getPost("request-type");
        $request_type="add";
        $success_msg="";
        if($hidden_type==$request_type){
            $success_msg = "Notification has been added successfully.";
        }else{
            $success_msg = "Notification has been updated successfully.";
        }
        $error_msg="Failed to submit the form, try again.";

        $validation->setRules([
            "title" => "required|max_length[255]",
            "imgUrl" => "max_length[255]",
            "content" => "required|max_length[1000]",
            "types" => "required|max_length[15]",
            "status" => "required|max_length[15]"
        ]);

        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        } elseif (
            $this->request->getMethod() === "post" &&
            $validation->withRequest($this->request)->run() && $this->isAdmin()
        ) {

            $result = $this->registered_artist_model->submit_notification(
                $this->request->getPost()
            );

            if ($result) {
                return redirect()
                ->to($route)
                ->with("success-msg", $success_msg);
                
            } else {
                return redirect()
                    ->to($route)
                    ->with("error-msg", $error_msg);
            }

        } else {
                // Log validation errors
                $errors = $validation->getErrors();
                $errorString = implode(" ", $errors);
                return redirect()
                    ->to($route)
                    ->with("error-msg", "Form validation failed, try again." . $errorString);
        }
    }

    function ajax_selected_artist_data(){
        
        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }elseif (
            $this->request->getMethod() === "get"
        ) {
            $id = $this->request->getGet('id');
            $result = $this->registered_artist_model->get_selected_artist_data($id);
            if ($result) {
                $response = [
                    'data' => $result,
                ];
                return $this->response->setJSON($response);
            } else {
                return $this->response->setJSON(['error' => 'No notification data found']);
            }
        }
    }


    // delete notification as admin and artist
    public function delete_notification()
    {
        $route="notification_dashboard";
        $success_msg = "Notification has been deleted successfully.";
        $error_msg = "Failed to delete Notification.";

        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }

      // allowed role(s) for this action
      $allowed_roles = ['admin'];
      $user_role = session("userrole");
      $userid = $this->userID();

      if ($this->request->getMethod() === "post") {

            $result = $this->registered_artist_model->delete_notification(
                $this->request->getPost(),
                $allowed_roles,
                $user_role,
                $userid
            );

            if ($result) {
                return $this->handleResponse(true, $success_msg);
            } else {
                return $this->handleResponse(false, $error_msg);
            }
        }

        return $this->handleResponse(false, 'Invalid request method.');
    }

}
