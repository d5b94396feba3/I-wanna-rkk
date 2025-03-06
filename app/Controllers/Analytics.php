<?php

namespace App\Controllers;

use App\Models\AccountModel;
use CodeIgniter\Controller;

class Analytics extends BaseController
{

    protected $account_model;

    public function __construct()
    {
        $this->account_model = model('AccountModel');
        $this->session = session();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data['active_nav'] = 'analytics';
        
        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }

        return view('rokk-artists/layout/header', $data)
            . view('rokk-artists/analytics/index', $data)
            . view('rokk-artists/layout/footer');
    }


    public function ajax_artist_stats_data_onPageLoad()
    {
        if (session('userid')) { 
            $userid = session('userid');
            $result = $this->extract_artist_stats_data();
            echo $result;
        }
    }


     public function extract_artist_stats_data()
    {

        $html = "<p>After the first few months of our service, all your analytics such as the number of plays, <br>the distribution of your plays across the individual territories etc. <br>will be displayed here.</p>";

        $response = [
            'html' => $html
        ];

        return $html;
    }


}
