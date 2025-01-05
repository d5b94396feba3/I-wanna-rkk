<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Errors extends BaseController
{
    public function show404()
    {
        $data["active_nav"] = "page-not-found";

        if (!$this->authenticated()) {
            return view('rokk-artists/layout/public/header', $data)
            . view('errors/404')
            . view('rokk-artists/layout/public/footer');
            
        } else {
            // load the view
            return view("rokk-artists/layout/header", $data) .
            view('errors/404') .
            view("rokk-artists/layout/footer");
        }
    }
}