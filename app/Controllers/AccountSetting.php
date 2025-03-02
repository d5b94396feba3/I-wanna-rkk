<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\AccountSettingModel;
use CodeIgniter\Controller;
use App\Traits\InputValidationTrait;
use App\Traits\FileUploadTrait;
use App\Models\MusicUploadModel_mainDB;


class AccountSetting extends BaseController
{

    protected $auth_model;
    protected $account_setting_model;
    protected $music_upload_model_mainDB;
    protected $session;
    protected $validation;
    use FileUploadTrait;
    use InputValidationTrait;

    public function __construct()
    {
        $this->auth_model = model("AuthModel");
        $this->account_setting_model = model("AccountSettingModel");
        $this->music_upload_model_mainDB = model("MusicUploadModel_mainDB");
        $this->session = session();
        $this->validation = \Config\Services::validation();

    }

    public function index()
    {
        $data["active_nav"] = "account-setting";

        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }

        $userid = $this->userID();
        $artist_data = $this->account_setting_model->get_artist_data_from_rokk_artist_by_id($userid);
        $person_data = $this->account_setting_model->get_person_data_from_rokk_person_by_id($userid);
        $social_media_data = $this->account_setting_model->get_social_media_data_from_artist_link_by_id($userid);

        $genres = $this->music_upload_model_mainDB->getGenreDataFromMainDB();
        // Prepare data for the view
        $data['roles'] = $this->isAdmin() ?
            ['Super Admin', 'Admin', 'Manager'] : 
            ['Artist', 'Manager'];
        $data['artist_data'] = $artist_data;
        $data['person_data'] = $person_data;
        $data['social_media_data'] = $social_media_data;
        $data['genres'] = $genres;

        return view("rokk-artists/layout/header", $data) .
            view("rokk-artists/account-setting/index", $data) .
            view("rokk-artists/layout/footer");
    }

    public function ajax_account_setting_artist_data_onPageLoad(){
        $userid =$this->userID();
        $artist_data = $this->account_setting_model->get_artist_data_from_rokk_artist_by_id($userid);
        return $artist_data;
    }


    public function update_person_profile_image()
    {
        // Early returns for authentication and validation
        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }

        if ($this->request->getMethod() !== "post" || !$this->validatePersonProfileImg($this->request)) {
            return $this->handleResponse(false, 'File upload failed. Please refresh and try again.');
        }

        // Get request data
        $old_image_link = $this->request->getPost("old_image_link");
        $file = $this->request->getFile("person_image_link");
        
        // Generate new filename and handle upload
        $image_newName = $this->generateFileName($this->userID(), str_replace('-', '_', $file->getName()));

        if (!$this->handlePersonImageFileUpload($file, $image_newName)) {
            return $this->handleResponse(false, "Image update failed. Please refresh and try again.");
        }

        // Delete old image and update database
        $this->delete_old_image_from_the_folder($old_image_link);
        $image_link = base_url("/public/uploads/images/" . $image_newName);
        
        $result = $this->account_setting_model->update_person_profile_image(
            $this->request->getPost(),
            $image_link
        );

        if (!$result) {
            return $this->handleResponse(false, "Failed to update profile image. Please refresh and try again.");
        }

        // Update session and return success
        $this->session->set('profileimage', $image_link);
        return $this->handleResponse(true, 
            "Profile image updated successfully. Please refresh the page to see changes across the website."
        );
    }

    public function update_artist_logo_image()
    {
        // Early returns for authentication and validation
        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }


        if ($this->request->getMethod() !== "post" || !$this->validateArtistLogoImg($this->request)) {
            return $this->handleResponse(false, 'File upload failed. Please refresh and try again.');
        }

        // Get request data
        $userid = $this->request->getPost("userid");
        $old_image_link = $this->request->getPost("old_image_link");
        $file = $this->request->getFile("image_link");
        
        // Generate new filename and handle upload
        $image_newName = $this->generateFileName($userid, str_replace('-', '_', $file->getName()));

        if (!$this->handleArtistLogoFileUpload($file, $image_newName)) {
            return $this->handleResponse(false, "Image update failed. Please refresh and try again.");
        }

        // Delete old image and update database
        $this->delete_old_image_from_the_folder($old_image_link);
        $image_link = base_url("/public/uploads/images/" . $image_newName);
        
        $result = $this->account_setting_model->update_artist_logo_image(
            $this->request->getPost(),
            $image_link,
            $image_newName,
        );

        if (!$result) {
            return $this->handleResponse(false, "Failed to update logo. Please refresh and try again.");
        }

        return $this->handleResponse(true, "Logo image has been successfully updated.");
    }

    public function update_artist_setting_info()
    {
        // Early returns for authentication and validation
        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }
    
        if ($this->request->getMethod() !== "post" || !$this->validateArtistSettingFields($this->request)) {
            return $this->handleResponse(false,
                "Failed to update. Please enter valid data in all required fields and try again."
            );
        }
    
        // Update database
        $result = $this->account_setting_model->update_artist_setting_info(
            $this->request->getPost()
        );
    
        if (!$result) {
            return $this->handleResponse(false,
                "Failed to update. Please check your input and try again."
            );
        }
    
        return $this->handleResponse(true, "Artist information updated successfully.");
    }

    public function update_person_setting_info()
    {
        // Early returns for authentication and validation
        if (!$this->authenticated()) {  
            return $this->handleUnauthorized();
        }

        $role = $this->request->getPost("role");
        
        // Check role assignment permissions
        if (!$this->canAssignRole($role)) { 
            return $this->handleResponse(false,
                "Access denied! You can only assign roles with lower privileges than your own."
            );
        }

        if ($this->request->getMethod() !== "post" || !$this->validatePersonSettingFields($this->request)) {
            return $this->handleResponse(false,
                "Failed to update. Please enter valid data in all required fields and try again."
            );
        }

        // Update database
        $result = $this->account_setting_model->update_person_setting_info(
            $this->request->getPost()
        );

        if (!$result) {
            return $this->handleResponse(false,
                "Failed to update. Please check your input and try again."
            );
        }

        // Update session account role
        $this->session->set('accoount_role', $role);
        return $this->handleResponse(true,
            "Your account information has been successfully updated."
        );
    }

    public function update_socail_media_setting_info()
    {
        // Early returns for authentication and validation
        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }

        if ($this->request->getMethod() !== "post" || !$this->validateSocialMediaFields($this->request)) {
            return $this->handleResponse(false,
                "Failed to update. Please enter valid URLs for social media links and try again."
            );
        }

        // Update database
        $result = $this->account_setting_model->update_socail_media_setting_info(
            $this->request->getPost()
        );
    
        if (!$result) {
            return $this->handleResponse(false,
                "Failed to update. Please check your input and try again."
            );
        }
    
        return $this->handleResponse(true,
            "Your social media information has been successfully updated."
        );
    }

    public function delete_old_image_from_the_folder($old_image_link) {
        // Split the image URL into parts using "/" as delimiter
        $pathParts = explode("/", $old_image_link);
        
        // Get the filename from the last part of the URL
        $fileName = end($pathParts);
        
        // Construct the full file path by combining ROOTPATH with uploads directory and filename
        $filePath = ROOTPATH . "public/uploads/images/". $fileName; 
        if (file_exists($filePath) && is_file($filePath)) {
            try {
                unlink($filePath);
                return true;
            } catch (Exception $e) {
                log_message('error', 'Failed to delete file: ' . $e->getMessage());
                return false;
            }
        }
        
        return false;
    }

}
