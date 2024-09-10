<?php

namespace App\Controllers;

use App\Models\HomeModel;
use App\Models\ProfileModel;
use App\Models\AccountModel;
use App\Models\DirectArtistSupportModel;
use CodeIgniter\Controller;
use App\Libraries\Ajax_pagination;

class Account extends BaseController
{
    protected $home;
    protected $chart;
    protected $direct_artist_support_model;
    protected $account_model;
    protected $session;
    protected $validation;
    protected $perPage = 35;
    protected $ajaxPagination;

    public function __construct()
    {
        $this->home = model("HomeModel");
        $this->chart = model("ProfileModel");
        $this->account_model = model("AccountModel");
        $this->direct_artist_support_model = model("DirectArtistSupportModel");
        $this->session = session();
        $this->validation = \Config\Services::validation();
        $this->ajaxPagination = new Ajax_pagination();
    }

    public function index()
    {
        $data["active"] = "account";

        if (!session("logged_in")) {
            return redirect()
                ->to("/")
                ->with(
                    "error-msg",
                    "Access denied! Please login to your account first."
                );
        }

        return view("rokk-artists/layout/header", $data) .
            view("rokk-artists/account/index", $data) .
            view("rokk-artists/layout/footer");
    }

    public function change_password_index()
    {
        $data["active"] = "accountPassword";
        $data["dropdownActive"] = "account";

        if (!session("logged_in")) {
            return redirect()
                ->to("/")
                ->with(
                    "error-msg",
                    "Access denied! Please login to your account first."
                );
        }

        return view("rokk-artists/layout/header", $data) .
            view("rokk-artists/account/account_password", $data) .
            view("rokk-artists/layout/footer");
    }

    public function connected_account_index()
    {
        $data["active"] = "connectedAccount";
        $data["dropdownActive"] = "account";

        if (!session("logged_in")) {
            return redirect()
                ->to("/")
                ->with(
                    "error-msg",
                    "Access denied! Please login to your account first."
                );
        }

        return view("rokk-artists/layout/header", $data) .
            view("rokk-artists/account/connected-account/index", $data) .
            view("rokk-artists/layout/footer");
    }

    public function delete_account_index()
    {
        $data["active"] = "deleteAccount";
        $data["dropdownActive"] = "account";

        if (!session("logged_in")) {
            return redirect()
                ->to("/")
                ->with(
                    "error-msg",
                    "Access denied! Please login to your account first."
                );
        }

        return view("rokk-artists/layout/header", $data) .
            view("rokk-artists/account/account_delete", $data) .
            view("rokk-artists/layout/footer");
    }

    public function buildHtmlFromArtists($artists)
    {
        $html = "";

        $index = 1;

        if (!empty($artists)) {
            $html .= '<table class="gc-page-tb gc-page-tb2-dis table-responsive ra-table">
                <thead>
                <tr>
                <th class="gc-tb-tle">No.</th>
                <th class="gc-tb-tle">Artist Type</th>
                <th class="gc-tb-tle">Artist Name</th>
                <th class="gc-tb-tle">Artist Country</th>
                <th class="gc-tb-tle">Email Management</th>
                <th class="gc-tb-tle">Email Artist Official Contact</th>
                <th class="gc-tb-tle">Preferred Rokk Address</th>
                <th class="gc-tb-tle">label</th>
                <th class="gc-tb-tle">Distributor and Aggregator</th>
                <th class="gc-tb-tle">Receive Newsletter</th>
                <th class="gc-tb-tle">Join date</th>
                <th class="gc-tb-tle">Status</th>
                </tr>
                </thead>
                <tbody>';

            foreach ($artists as $record) {
                $artist_id = trim($record["artist_id"]);
                $artist_type = trim($record["artist_type"]);
                $artist_name = trim($record["artist_name"]);
                $artist_country = trim($record["artist_country"]);
                $email_management = trim($record["email_management"]);
                $official_contact_email = trim(
                    $record["official_contact_email"]
                );
                $preferred_rokk_address = trim(
                    $record["preferred_rokk_address"]
                );
                $referral = trim($record["referral"]);
                $password = trim($record["password"]);
                $confirm_password = trim($record["confirm_password"]);
                $facebook = trim($record["facebook"]);
                $instagram = trim($record["instagram"]);
                $twitter = trim($record["twitter"]);
                $spotify = trim($record["spotify"]);
                $metal_archives = trim($record["metal_archives"]);
                $website = trim($record["website"]);
                $discogs = trim($record["discogs"]);
                $label = trim($record["label"]);
                $distributor_and_aggregator = trim(
                    $record["distributor_and_aggregator"]
                );
                $ReceiveArtistNewsletter = trim(
                    $record["ReceiveArtistNewsletter"]
                );
                $join_date = trim($record["join_date"]);
                $status = trim($record["status"]);

                if (empty($email_management)) {
                    $email_management = "n/a";
                }
                if (empty($facebook)) {
                    $facebook = "n/a";
                }
                if (empty($instagram)) {
                    $instagram = "n/a";
                }
                if (empty($twitter)) {
                    $twitter = "n/a";
                }
                if (empty($spotify)) {
                    $spotify = "n/a";
                }
                if (empty($metal_archives)) {
                    $metal_archives = "n/a";
                }
                if (empty($website)) {
                    $website = "n/a";
                }
                if (empty($discogs)) {
                    $discogs = "n/a";
                }
                if (empty($label)) {
                    $label = "n/a";
                }
                if (empty($referral)) {
                    $referral = "n/a";
                }
                if (empty($preferred_rokk_address)) {
                    $preferred_rokk_address = "n/a";
                } else {
                    $preferred_rokk_address = preg_replace(
                        "/\s+/",
                        "",
                        $preferred_rokk_address
                    );
                    $preferred_rokk_address =
                        $preferred_rokk_address . ".rokk.app";
                }
                if (empty($distributor_and_aggregator)) {
                    $distributor_and_aggregator = "n/a";
                }
                if (empty($ReceiveArtistNewsletter)) {
                    $ReceiveArtistNewsletter = "n/a";
                }

                $status_tag = "";

                if ($status == "requested") {
                    $status_tag = "status-requested";
                } elseif ($status == "partner-request") {
                    $status_tag = "status-partner-request";
                } elseif ($status == "partner") {
                    $status_tag = "status-partner";
                } else {
                    $status_tag = "status-active";
                }

                if (!empty($artist_name)) {
                    $html .=
                        '

                    <tr class="data-searchbar-country-list-dis artist-popup" data-id="' .
                        $artist_id .
                        '" data-name="' .
                        $artist_name .
                        '" data-type="' .
                        $artist_type .
                        '">

                        <td>' .
                        $index .
                        '. </td>
                        <td>' .
                        $artist_type .
                        '</td>
                        <td>' .
                        $artist_name .
                        '</td>
                        <td>' .
                        $artist_country .
                        '</td>
                        <td>' .
                        $email_management .
                        '</td>
                        <td>' .
                        $official_contact_email .
                        '</td>
                        <td>' .
                        $preferred_rokk_address .
                        '</td>
                        <td>' .
                        $label .
                        '</td>
                        <td>' .
                        $distributor_and_aggregator .
                        '</td>
                        <td>' .
                        $ReceiveArtistNewsletter .
                        '</td>
                        <td>' .
                        $join_date .
                        '</td>
                        <td class="' .
                        $status_tag .
                        '">' .
                        $status .
                        '</td>

                   </tr>';

                    $index++;
                }
            }

            $html .= "</tbody></table>";
        }

        return $html;
    }

    public function ajax_artist_account_data_onPageLoad()
    {
        if (!session("logged_in")) {
            return redirect()
                ->to("/")
                ->with(
                    "error-msg",
                    "Access denied! Please login to your account first."
                );
        } else {
            $artist_id = session("artist_id");
            $artists = $this->account_model->get_artist_user_junc_data(
                $artist_id
            );
            $artist_user_data = $this->extract_artist_user_junc_html($artists);
            echo $artist_user_data;
        }
    }

    public function update_artist_data()
    {
        $data["active"] = "account";

        if (!session("logged_in")) {
            return redirect()
                ->to("/")
                ->with(
                    "error-msg",
                    "Access denied! Please login to your account first."
                );
        } elseif ($this->request->getMethod() === "post") {
            $result = $this->account_model->update_artist_account_data_by_id(
                $this->request->getPost()
            );
            if ($result) {
                $this->session->setFlashdata(
                    "success-msg",
                    "Account data has been updated."
                );
                return redirect()->to(base_url("profile"));
            } else {
                $this->session->setFlashdata(
                    "error-msg",
                    "Failed to update data."
                );
                return redirect()->to(base_url("profile"));
            }
        }
    }

    public function update_artist_password()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            "password" =>
                'required|min_length[8]|max_length[25]|regex_match[/[a-z]/]|regex_match[/[A-Z]/]|regex_match[/\d/]|regex_match[/[@$!%*?&]/]',
            "confirm_password" => "required",
        ]);

        if (!session("logged_in")) {
            return redirect()
                ->to("/")
                ->with(
                    "error-msg",
                    "Access denied! Please login to your account first."
                );
        }

        if (
            $this->request->getMethod() === "post" &&
            $validation->withRequest($this->request)->run()
        ) {
            $password = trim($this->request->getPost("password"));
            $confirm_password = trim(
                $this->request->getPost("confirm_password")
            );

            if ($password != $confirm_password) {
                return redirect()
                    ->to("account")
                    ->with(
                        "error-msg",
                        "password mismatch. Please enter same password."
                    );
            }

            $result = $this->account_model->update_artist_password_by_id(
                $this->request->getPost()
            );

            if ($result) {
                $this->session->setFlashdata(
                    "success-msg",
                    "password has been updated."
                );
                return redirect()->to("change_password");
            } else {
                $this->session->setFlashdata(
                    "error-msg",
                    "Failed to update password."
                );
                return redirect()->to("change_password");
            }
        } else {
            return redirect()
                ->to("account")
                ->with(
                    "error-msg",
                    "Please provide a valid password with at least 8 characters, including uppercase and lowercase letters, numbers, and special characters."
                );
        }
    }

    public function delete_artist_account()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            "password" =>
                'required|min_length[8]|max_length[25]|regex_match[/[a-z]/]|regex_match[/[A-Z]/]|regex_match[/\d/]|regex_match[/[@$!%*?&]/]',
        ]);

        if (!session("logged_in")) {
            return redirect()
                ->to("/")
                ->with(
                    "error-msg",
                    "Access denied! Please login to your account first."
                );
        }

        if (
            $this->request->getMethod() === "post" &&
            $validation->withRequest($this->request)->run()
        ) {
            $hidden_password = trim($this->request->getPost("hidden_password"));
            $password = trim($this->request->getPost("password"));

            if ($password != $hidden_password) {
                return redirect()
                    ->to("account")
                    ->with(
                        "error-msg",
                        "Password mismatch! Please enter correct password."
                    );
            }

            $artist_id = session("artist_id");
            $result = $this->account_model->delete_artist_account_data_by_id(
                $artist_id
            );

            if ($result) {
                $this->session->setFlashdata(
                    "success-msg",
                    "Your account data has been deleted.<br>Feel free to contact us if you consartist_ider joining us again."
                );
                return redirect()->to("logout");
            } else {
                return redirect()
                    ->to("account")
                    ->with("error-msg", "Failed to delete account.");
            }
        }
    }

    public function extract_artist_account_data($record)
    {
        $html = "";

        $artist_id = trim($record->artist_id);
        $artist_type = trim($record->artist_type);
        $artist_name = trim($record->artist_name);
        $artist_country = trim($record->artist_country);
        $email_management = trim($record->email_management);
        $official_contact_email = trim($record->official_contact_email);
        $preferred_rokk_address = trim($record->preferred_rokk_address);
        $referral = trim($record->referral);
        $password = trim($record->password);
        $confirm_password = trim($record->confirm_password);
        $facebook = trim($record->facebook);
        $instagram = trim($record->instagram);
        $twitter = trim($record->twitter);
        $spotify = trim($record->spotify);
        $metal_archives = trim($record->metal_archives);
        $website = trim($record->website);
        $discogs = trim($record->discogs);
        $label = trim($record->label);
        $distributor_and_aggregator = trim($record->distributor_and_aggregator);
        $receive_newsletter = trim($record->receive_newsletter);
        $ConnectedAccounts = "n/a";
        $artists = $this->account_model->get_artist_user_junc_data($artist_id);
        $artist_user_data = $this->extract_artist_user_junc_html($artists);

        return $artist_user_data;
    }

    public function ajax_change_password_data()
    {
        if (!session("logged_in")) {
            return redirect()
                ->to("/")
                ->with(
                    "error-msg",
                    "Access denied! Please login to your account first."
                );
        } else {
            $artist_id = session("artist_id");
            $artists = $this->account_model->getArtistDataByID($artist_id);
            $artist_user_data = $this->extract_artist_password_html($artists);
            echo $artist_user_data;
        }
    }

    public function extract_artist_password_html($record)
    {
        $html = "";

        $artist_id = trim($record->artist_id);
        $artist_type = trim($record->artist_type);
        $artist_name = trim($record->artist_name);
        $artist_country = trim($record->artist_country);
        $email_management = trim($record->email_management);
        $official_contact_email = trim($record->official_contact_email);
        $preferred_rokk_address = trim($record->preferred_rokk_address);
        $referral = trim($record->referral);
        $password = trim($record->password);
        $confirm_password = trim($record->confirm_password);
        $facebook = trim($record->facebook);
        $instagram = trim($record->instagram);
        $twitter = trim($record->twitter);
        $spotify = trim($record->spotify);
        $metal_archives = trim($record->metal_archives);
        $website = trim($record->website);
        $discogs = trim($record->discogs);
        $label = trim($record->label);
        $distributor_and_aggregator = trim($record->distributor_and_aggregator);
        $receive_newsletter = trim($record->receive_newsletter);
        $ConnectedAccounts = "n/a";

        $html .=
            '<form action="' .
            base_url("update_artist_password") .
            '" class="artist-uform update-password-form" method="post" enctype="multipart/form-data" onsubmit="return confirm(\'Are you sure you want to update?\')">
                 ' .
            csrf_field() .
            '
                <input type="hidden" class="password-input" name="registered_id" id="registered_id" value="' .
            $artist_id .
            '">

                <div class="form-group password-toggle password-section">
                <label for="password" class="label-block act-label-heading">Change Password</label>
                </div>

                <div class="form-group password-toggle">
                <label for="password" class="label-block pass-label">New Password:</label>
                <input type="password" class="password-input form-control input-field pass-input-field" name="password" id="password" value="' .
            $password .
            '">
                <i id="eye-icon-password" class="eye-icon fas fa-eye-slash" onclick="togglePass(\'password\', \'eye-icon-password\')" required></i>
                </div>

                <div class="form-group password-toggle">
                <label for="confirm_password" class="label-block pass-label">Confirm password: </label>
                <input type="password" class="password-input form-control input-field pass-input-field" name="confirm_password" id="confirm_password" value="' .
            $confirm_password .
            '" required>
                <i id="eye-icon-confirm" class="eye-icon fas fa-eye-slash" onclick="togglePass(\'confirm_password\', \'eye-icon-confirm\')"></i>
                </div>
                <p class="pass-valid-text">At least 8 digits, Include upper and lower case letters, numbers, and marks</p>
                <div class="form-group">
                <button type="submit" class="pass-btn">Update</button>
                </div>
             </form>';

        return $html;

        // echo $html;
    }

    public function ajax_delete_account()
    {
        if (!session("logged_in")) {
            return redirect()
                ->to("/")
                ->with(
                    "error-msg",
                    "Access denied! Please login to your account first."
                );
        } else {
            $artist_id = session("artist_id");
            $artists = $this->account_model->getArtistDataByID($artist_id);
            $artist_user_data = $this->extract_artist_account_deletion_html(
                $artists
            );
            echo $artist_user_data;
        }
    }

    public function extract_artist_account_deletion_html($record)
    {
        $html = "";

        $artist_id = trim($record->artist_id);
        $password = trim($record->password);
        $confirm_password = trim($record->confirm_password);

        $html .=
            '<form action="' .
            base_url("delete_artist_account") .
            '" class="artist-uform det-form" method="post" enctype="multipart/form-data" onsubmit="return confirm(\'Are you sure you want to delete account?\')">
                 ' .
            csrf_field() .
            '
                <input type="hidden" name="registered_id" id="registered_id" value="' .
            $artist_id .
            '">
                <input type="hidden" name="hidden_password" id="hidden_password" value="' .
            $confirm_password .
            '">

                <div class="form-group delete-section">
                <label for="password" class="label-block act-label-heading">Delete Account</label>
                </div>

                <label for="delete" class="delete-label">To remove account permanently, please enter your password.</label>

                <div class="form-group password-toggle">
                <label for="confirm_password" class="label-block pass-label">Password: </label>
                <input type="password" class="password-input form-control input-field pass-input-field" name="password" id="password" value="" placeholder="***********" required>
                <i id="eye-icon-confirm" class="eye-icon fas fa-eye-slash" onclick="togglePass(\'password\', \'eye-icon-password\')"></i>
                </div>

                <div class="form-group">
                <button type="submit" class="pass-btn delete-btn">Delete Account</button>
                </div>
             </form>';

        return $html;
    }

    public function extract_artist_user_junc_html($users)
    {
        $html = '<div class="au_junc_container">
             <div class="form-group ca-heading">
                <label for="Connected Accounts" class="label-block act-label-heading">Accounts Info</label>
                </div>';

        $index = 1;

        if (!empty($users)) {
            $html .=
                '
                <p class="connected-account-tle">Showing all the connected accounts (Total users: ' .
                count($users) .
                '):</p>
                <table class="au_junc_table table-responsive">
                <thead>
                <tr>
                <th class="gc-tb-tle">No.</th>
                <th class="gc-tb-tle">User ID</th>
                <th class="gc-tb-tle">Role</th>
                <th class="gc-tb-tle">Active</th>
                </tr>
                </thead>
                <tbody>';

            foreach ($users as $user) {
                $user_id = trim($user["user_id"]);
                $main_artist_id = trim($user["main_artist_id"]);
                $role = trim($user["role"]);
                $active = trim($user["active"]);

                if (!empty($main_artist_id)) {
                    $html .=
                        '
                            <tr class="artist-popup" data-id="' .
                        $main_artist_id .
                        '">
                                <td>' .
                        $index .
                        '. </td>
                                <td>' .
                        $user_id .
                        '</td>
                                <td>' .
                        $role .
                        '</td>
                                <td>' .
                        $active .
                        '</td>
                            </tr>';

                    $index++;
                }
            }

            $html .= "</tbody></table>";
        } else {
            $html .= "<p>There are no connected accounts found.</p>";
        }

        $html .= "</div>";

        return $html;
    }
}
