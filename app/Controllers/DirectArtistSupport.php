<?php

namespace App\Controllers;

use App\Models\AccountModel;
use App\Models\DirectArtistSupportModel;
use CodeIgniter\Controller;

class DirectArtistSupport extends BaseController
{
    protected $account_model;
    protected $direct_artist_support_model;
    protected $session;
    protected $validation;
    protected $perPage = 35;
    protected $security;

    public function __construct()
    {
        $this->account_model = model('AccountModel');
        $this->direct_artist_support_model = model('DirectArtistSupportModel');
        $this->session = session();
        $this->validation = \Config\Services::validation();
        $this->security = \Config\Services::security();

    }

    public function index()
    {
        $data['active_nav'] = 'direct-artist-support';


        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }

        return view('rokk-artists/layout/header', $data)
            . view('rokk-artists/direct-artist-support/index', $data)
            . view('rokk-artists/layout/footer');
    }


    public function ajax_direct_artist_support_onPageLoad()
    {
        if (session('userid')) {

            $userid = session('userid');
            $artist_record = $this->account_model->get_artist_detail($userid);
            $artist_link_status = trim($artist_record->artist_link_status);
            $data = [
                'artist_link_status' => $artist_link_status,
                'record' => $artist_record,
            ];
            // Send the JSON response
            return view('rokk-artists/direct-artist-support/layout/form', $data);
        }
    }


    public function update_direct_artist_support()
    {
        $data['active_nav'] = 'direct-artist-support';

        $validation = \Config\Services::validation();

        $success=false;
        $message="";

         $validation->setRules([
                'preferred_rokk_address' => 'required|min_length[3]|max_length[25]|regex_match[/^[a-zA-Z0-9-]{3,}$/]',
        ]);

        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }

        if ($this->request->getMethod() !== 'post' || !$validation->withRequest($this->request)->run()) {
            return $this->handleResponse(false, 
                'Please enter a valid Preferred Rokk Address.'
            );
        }

        $artist_link_status = "requested";
        $result = $this->direct_artist_support_model->update_direct_artist_support_by_id(
            $this->request->getPost(),
            $artist_link_status
        );

        return $this->handleResponse($result,
            $result 
                ? "We will notify you when your requested ROKK address has been confirmed."
                : "Failed to update ROKK address. Please try again."
        );
    }

}
