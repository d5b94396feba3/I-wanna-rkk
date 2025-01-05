<?php

namespace App\Controllers;

use App\Models\HomeModel;
use App\Models\MusicUploadModel_mainDB;
use App\Models\AccountSettingModel;
use App\Models\ContactUsModel;
use CodeIgniter\Controller;
use CodeIgniter\Email\Email;


class ContactUs extends BaseController
{
    protected $account_setting_model;
    protected $session;
    protected $validation;
    protected $perPage = 8;
    private $db1;
    private $db2;

    public function __construct()
    {
        $this->home = model("HomeModel");
        $this->contact_us_model = model("ContactUsModel");
        $this->account_setting_model = model("AccountSettingModel");
        $this->session = session();
        $this->validation = \Config\Services::validation();

    }

    public function index()
    {
        $data["active_nav"] = "contact";

        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }

        $userid = session("userid");
        $person_data = $this->account_setting_model->get_person_data_from_rokk_person_by_id($userid);

        $data['person_data'] = $person_data;

        return view("rokk-artists/layout/header", $data) .
            view("rokk-artists/contact-us/index", $data) .
            view("rokk-artists/layout/footer");
    }


    public function send_artist_contact_us_form()
    {
        $validation = \Config\Services::validation();

        $person_id = $this->request->getPost("person_id");

        log_message('debug', 'person_id: ' . $person_id);


        $validation->setRules([
            'full_name' => 'required|max_length[200]',
            'email' => 'required|valid_email|max_length[200]',
            'subject' => 'required|max_length[200]',
            'message' => 'required|max_length[1000]',
        ]);

        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        } elseif (
            $this->request->getMethod() === "post" &&
            $validation->withRequest($this->request)->run()
        ) {
            $result = $this->send_email(
                $this->request->getPost(),
                $person_id,
            );

            if ($result) {
                return redirect()
                ->to("contact")
                ->with("success-msg", "Thank you for your message. We will get back to you as soon as possible.");
            } else {
                return redirect()
                    ->to("contact")
                    ->with("error-msg", "Failed to send the message. Please refresh and try again.");
            }
        } else {
            // Validation failed
            $errors = $validation->getErrors();
            $errorString = implode(" ", $errors);
            return redirect()
                ->to("contact")
                ->with("error-msg", "Fail to send the message, please try again. " . $errorString);
        }
    }

    private function send_email($post_data, $person_id)
    {
        $email = \Config\Services::email();

        $email->setFrom($post_data['email'], $post_data['full_name']);
        $email->setTo('artists@rokk.app'); 

        $email->setSubject('ROKK Artist Contact Form Submission: ' . $post_data['subject']);

        $message = "Name: " . $post_data['full_name'] . "\n";
        $message .= "Email: " . $post_data['email'] . "\n";
        $message .= "Person ID: " . $person_id . "\n\n";
        $message .= "Message:\n" . $post_data['message'];

        $email->setMessage($message);

        if ($email->send()) {
            return true;
        } else {
            log_message('error', 'Email sending failed: ' . $email->printDebugger(['headers']));
            return false;
        }
    }



}
