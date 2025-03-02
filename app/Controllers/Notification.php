<?php

namespace App\Controllers;

use App\Models\NotificationModel;
use CodeIgniter\Controller;
use CodeIgniter\Email\Email;
use App\Models\NotificationPaginationModel;

class Notification extends BaseController
{
    protected $notification_model;
    protected $faquestion_model;
    protected $session;
    protected $validation;
    protected $perPage = 8;

    public function __construct()
    {
        $this->notification_model = model("NotificationModel");
        $this->notification_pagi_model = model("NotificationPaginationModel");
        $this->session = session();
        $this->validation = \Config\Services::validation();

    }

    public function index()
    {
        $data["active_nav"] = "notification";

        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }

        return view("rokk-artists/layout/header", $data) .
            view("rokk-artists/notifications/index", $data) .
            view("rokk-artists/layout/footer");
    }

    // artist notification page
    function ajax_artist_notification_index(){

        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }

        $userid = $this->userID();
        $onlyUnread=true;

        $notifications = $this->notification_model->get_notifications($userid, $onlyUnread);
       
        $data['notifications'] = $notifications;
        return view("rokk-artists/notifications/layout/notification-index", $data);
    }

    function notification_header(){

        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }
        
        $data["active_nav"] = "notification";

        $userid = $this->userID();
        $notifications = $this->notification_model->get_header_notifications($userid);
       
        $data['notifications'] = $notifications;
        $data['total_notifications'] = !empty($notifications) ? count($notifications) : 0;

        $response=[
            'total_notifications'=>$data['total_notifications'],
            'notifications'=>view("rokk-artists/notifications/layout/notification-header", $data)
        ];
        return $this->response->setJSON($response);
    }

    // admin notification dashboard.
    public function notification_dashboard()
    {
        $data["active_nav"] = "notification";

        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }

        $table="notification";
        $total_notification = $this->notification_model-> get_total_count_by_table_name($table);

        $data['total_notification'] = $total_notification;

        return view("rokk-artists/layout/header", $data) .
            view("rokk-artists/notifications/dashboard", $data) .
            view("rokk-artists/layout/footer");
    }

    // admin notification dashboard's paginated data
    function ajax_notification_dashboard_data(){

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
 
         $sort_column = $this->request->getGet("sort_column") ?? "id";
         $order = $this->request->getGet("order") ?? "asc";
         
          // Get the artist data
         $notification_data = $this->notification_pagi_model->get_notification_paginated_data($search,$filter_by,$per_page,$sort_column,$order);
 
         $data["sort_column"] = $sort_column;
         $data["order"] = $order;
         $data['notification_data'] = $notification_data;
 
         $total_records = $this->notification_pagi_model->pager->getTotal();
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

        return view("rokk-artists/notifications/layout/notification-dashboard", $data);
    }

    function ajax_selected_notification_data(){
        
        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }elseif (
            $this->request->getMethod() === "get"
        ) {
            $id = $this->request->getGet('id');
            $result = $this->notification_model->get_selected_notification_data($id);
            if ($result) {

                $title = trim($result["title"]);
                $content = trim($result["content"]);
                $imgUrl = trim($result["imgUrl"]);
                $status = trim($result["status"]);
                $types = trim($result["types"]);
                $createdAt = trim($result["createdAt"]);
                $updatedAt = trim($result["updatedAt"]);

                $response = [
                    'title' => $title,
                    'content' => $content,
                    'imgUrl' => $imgUrl,
                    'status' => $status,
                    'types' => $types,
                    'createdAt' => $createdAt,
                    'updatedAt' => $updatedAt,
                ];
                return $this->response->setJSON($response);
            } else {
                return $this->response->setJSON(['error' => 'No notification data found']);
            }
        }
    }

    function ajax_update_artist_notification_status(){
        

        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }
        elseif (
            $this->request->getMethod() === "post"
        ) {
            $notificationId = $this->request->getPost('notification_id');
            $read_status = $this->request->getPost('read_status');
            $userid = $this->userID();
            $result = $this->notification_model->update_artist_notification_status($notificationId,$read_status,$userid);

            $success_msg = "Notification status updated successfully.";
            $error_msg = "Failed to update Notification, please try again later.";

            if ($result) {
                return $this->handleResponse(true, $success_msg);
            } else {
                return $this->handleResponse(false, $error_msg);
            }
        }
    }


    function ajax_update_artist_all_notifications_status(){
        
        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }
        elseif (
            $this->request->getMethod() === "post"
        ) {
            $userid = $this->userID();
            $result = $this->notification_model->update_artist_all_notification_status($userid);

            $success_msg = "All notifications marked as read successfully.";
            $error_msg = "Failed to update Notification, please try again later.";

            if ($result) {
                return $this->handleResponse(true, $success_msg);
            } else {
                return $this->handleResponse(false, $error_msg);
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

            $result = $this->notification_model->delete_notification(
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
