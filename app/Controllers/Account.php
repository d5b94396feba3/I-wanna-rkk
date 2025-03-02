<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\AccountModel;
use CodeIgniter\Controller;
use App\Models\AccountSettingModel;
use App\Models\CAPaginationModel;
use App\Traits\InputValidationTrait;

class Account extends BaseController
{
    protected $auth_model;
    protected $account_model;
    protected $validation;
    protected $perPage = 5;
    protected $account_setting_model;
    protected $capagination_model;
    use InputValidationTrait;


    public function __construct()
    {
        $this->auth_model = model("AuthModel");
        $this->account_model = model("AccountModel");
        $this->account_setting_model = model("AccountSettingModel");
        $this->capagination_model = model("CAPaginationModel");
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data["active_nav"] = "account";

        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }

        $userid =$this->userID();

        $person_data = $this->account_setting_model->get_person_data_from_rokk_person_by_id($userid);
    
        // Prepare data for the view
        $data['person_data'] = $person_data;
        // Prepare data for the view
        $data['roles'] = $this->isAdmin() ?
            ['Super Admin', 'Admin', 'Manager'] : 
            ['Artist', 'Manager'];
        // Render views
        $administrator_view = view("rokk-artists/account/adminstrator", $data);

        // Add administrator view to data array
        $data["administrator_data"] = $administrator_view;

        $data["artist_password"] = "artist_password";
        return view("rokk-artists/layout/header", $data) .
            view("rokk-artists/account/index", $data) .
            view("rokk-artists/layout/footer");
    }


    public function ajax_account_administrator_data()
    {
        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }

        $userid =$this->userID();

        $person_data = $this->account_setting_model->get_person_data_from_rokk_person_by_id($userid);
    
        // Prepare data for the view
        $data['person_data'] = $person_data;
        // Prepare data for the view
        $data['roles'] = $this->isAdmin() ?
            ['Super Admin', 'Admin', 'Manager'] : 
            ['Artist', 'Manager'];
        // Render views
        $administrator_view = view("rokk-artists/account/adminstrator", $data);

        // Prepare the response
        $response = [
            'administrator_data' => $administrator_view,
        ];

        // Send the JSON response
        return $this->response->setJSON($response);
    }

    public function ajax_password_deletion_data_onPageLoad()
    {
        $data["active_nav"] = "accountPassword";
        $data["dropdownActive"] = "account";

        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }

        // $userid =$this->userID();
        // $artist_data = $this->account_model->getArtistDataByID($userid);
    
        // Prepare data for the view
        $data['artist_data'] = '';

        // Render views
        $account_password_view = view("rokk-artists/account/account_password", $data);
        $account_delete_view = view("rokk-artists/account/account_delete", $data);

        // Prepare the response
        $response = [
            'account_password_data' => $account_password_view,
            'delete_account_data' => $account_delete_view,
        ];

        // Send the JSON response
        return $this->response->setJSON($response);
    }

    public function ajax_load_all_account_data_onPageLoad_archieve()
    {
        $data["active_nav"] = "accountPassword";
        $data["dropdownActive"] = "account";

        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }

        $userid =$this->userID();
        $artist_data = $this->account_model->getArtistDataByID($userid);
        $person_data = $this->account_setting_model->get_person_data_from_rokk_person_by_id($userid);
    
        // Prepare data for the view
        $data['artist_data'] = $artist_data;
        $data['person_data'] = $person_data;
        $data['isAdmin'] = $this->isAdmin();

        // Render views
        $administrator_view = view("rokk-artists/account/adminstrator", $data);
        $account_password_view = view("rokk-artists/account/account_password", $data);
        $account_delete_view = view("rokk-artists/account/account_delete", $data);

        $connected_accounts_data=$this->ajax_paginated_artist_connected_accounts_data();

        // Prepare the response
        $response = [
            'administrator_data' => $administrator_view,
            'account_password_data' => $account_password_view,
            'delete_account_data' => $account_delete_view,
            'connected_accounts_data' => $connected_accounts_data
        ];

        // Send the JSON response
        return $this->response->setJSON($response);
    }


    public function connected_account_index()
    {
        $data["active_nav"] = "connectedAccount";
        $data["dropdownActive"] = "account";

        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }

        return view("rokk-artists/layout/header", $data) .
            view("rokk-artists/account/connected-account/index", $data) .
            view("rokk-artists/layout/footer");
    }


    public function ajax_paginated_artist_connected_accounts_data()
    {

        $pager = \Config\Services::pager();
        $per_page = $this->perPage;
        $userid=$this->userID();

        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }

        // Get the current page number from the query string
        $page = $this->request->getGet("page") ?? 1;

        // $search = trim($this->request->getGet("search"));
        $search='';

        $sort_column = $this->request->getGet("sort_column") ?? "id";
        $order = $this->request->getGet("order") ?? "asc";
        
         // Get the artist data
        $artist_user = $this->capagination_model->get_ca_data_from_artist_user_junc($userid,$search,$per_page,$sort_column,$order);

        $data["sort_column"] = $sort_column;
        $data["order"] = $order;
        $data['artist_user'] = $artist_user;

        // cl4 built-in pager links
        // $pager_links = $this->capagination_model->pager->links();

        $total_records = $this->capagination_model->pager->getTotal();

        // Calculate pagination details
        $total_pages = ceil($total_records / $per_page);
        $has_previous = $page > 1;
        $has_next = $page < $total_pages;

        $data["total_records"] = $total_records;
        $data["current_page"] = $page;
        $data["per_page"] = $this->perPage;
        $data["total_pages"] = $total_pages;
        $data["has_previous"] = $has_previous;
        $data["has_next"] = $has_next;

        return view("rokk-artists/account/connected-account/index", $data);
    }


    public function update_artist_password()
    {
        // Early returns for authentication and validation
        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }

        if ($this->request->getMethod() !== "post" || !$this->validatePasswordFields($this->request)) {
            return $this->handleResponse(false,
                "Please provide a valid password with at least 8 characters, including uppercase and lowercase letters, numbers, and special characters."
            );
        }

        // Validate matching passwords
        $password = trim($this->request->getPost("password"));
        $confirm_password = trim($this->request->getPost("confirm_password"));

        if ($password !== $confirm_password) {
            return $this->handleResponse(false,
                "The password you entered does not match your current password. Please try again."
            );
        }

        // Update database
        $result = $this->account_model->update_artist_password_by_id(
            $this->request->getPost()
        );

        if (!$result) {
            return $this->handleResponse(false,
                "Failed to update password. Please refresh and try again."
            );
        }

        return $this->handleResponse(true, "Password has been updated successfully.");
    }

    public function delete_artist_account()
    {
        // Early returns for authentication and validation
        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }

        if ($this->request->getMethod() !== "post" || !$this->validateDeleteAccountFields($this->request)) {
            return $this->handleResponse(false,
                "Please provide your current password to delete your account."
            );
        }

        // Verify password against stored hash
        $password = trim($this->request->getPost("password"));
        $userId = $this->userID();
        
        if (!$this->auth_model->verifyPassword($userId, $password)) {
            return $this->handleResponse(false,
                "Incorrect password. Please try again."
            );
        }

        // Delete account
        $result = $this->account_model->delete_artist_account_data_by_id(
            $this->request->getPost()
        );

        if (!$result) {
            return $this->handleResponse(false,
                'An error occurred while deleting your account. Please try again later or contact support if the issue persists.'
            );
        }

        // Redirect with success message
        return redirect()->to("login")
            ->with('successMsg', "Your account has been successfully deleted.");
    }


}
