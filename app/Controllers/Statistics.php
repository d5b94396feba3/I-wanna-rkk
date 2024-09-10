<?php

namespace App\Controllers;

use App\Models\HomeModel;
use App\Models\ProfileModel;
use CodeIgniter\Controller;
use App\Libraries\Ajax_pagination; 

class Statistics extends BaseController
{

    protected $home;
    protected $chart;
    protected $session;
    protected $validation;
    protected $perPage = 35;
    protected $ajaxPagination;


    public function __construct()
    {
        $this->home = model('HomeModel');
        $this->chart = model('ProfileModel');
        $this->session = session();
        $this->validation = \Config\Services::validation();
        $this->ajaxPagination = new Ajax_pagination();
    }

    public function index()
    {
        $data['active'] = 'statistics';

        if (!session('logged_in')) {
            return redirect()->to('/')->with('error-msg', "Access denied! Please login to your account first.");
        }

        return view('rokk-artists/layout/header', $data)
            . view('rokk-artists/statistics/index', $data)
            . view('rokk-artists/layout/footer');
    }


    public function ajax_artist_stats_data_onPageLoad()
    {
        if (session('artist_id')) { 

            $artist_id = session('artist_id');
            $artist='';
            // $artist = $this->chart->getArtistDataByID($artist_id);
            $profile_data = $this->extract_artist_stats_data($artist);
            echo $profile_data;
            // echo $artist_id;
        }
    }


     public function extract_artist_stats_data($record)
    {

        $html = "<p>After the first few months of our service, all your statistics such as the number of plays, <br>the distribution of your plays across the individual territories etc. <br>will be displayed here.</p>";


        $response = [
            'html' => $html
        ];

        return $html;
    }

    // public function extract_artist_stats_data($record)
    // {

    //     $html = "";

    //     $artist_id = trim($record->artist_id);
    //     $artist_type = trim($record->artist_type);
    //     $artist_name = trim($record->artist_name);
    //     $artist_country = trim($record->artist_country);
    //     $email_management = trim($record->email_management);
    //     $official_contact_email = trim($record->official_contact_email);
    //     $preferred_rokk_address = trim($record->preferred_rokk_address);
    //     $referral = trim($record->referral);
    //     $password = trim($record->password);
    //     $confirm_password = trim($record->confirm_password);
    //     $facebook = trim($record->facebook);
    //     $instagram = trim($record->instagram);
    //     $twitter = trim($record->twitter);
    //     $spotify = trim($record->spotify);
    //     $metal_archives = trim($record->metal_archives);
    //     $website = trim($record->website);
    //     $discogs = trim($record->discogs);
    //     $label = trim($record->label);
    //     $distributor_and_aggregator = trim($record->distributor_and_aggregator);
    //     $receive_newsletter = trim($record->receive_newsletter);


    //     if(empty($email_management)){
    //         $email_management="n/a";
    //     }
    //     if(empty($facebook)){
    //         $facebook="n/a";
    //     }
    //     if(empty($instagram)){
    //         $instagram="n/a";
    //     }   
    //     if(empty($twitter)){
    //         $twitter="n/a";
    //     }
    //     if(empty($spotify)){
    //         $spotify="n/a";
    //     }   
    //     if(empty($metal_archives)){
    //         $metal_archives="n/a";
    //     }   
    //     if(empty($website)){
    //         $website="n/a";
    //     }
    //     if(empty($discogs)){
    //         $discogs="n/a";
    //     }  
    //     if(empty($label)){
    //         $label="n/a";
    //     }  
    //     if(empty($referral)){
    //         $referral="n/a";
    //     }
    //     if(empty($distributor_and_aggregator)){
    //         $distributor_and_aggregator="n/a";
    //     }
    //     if(empty($receive_newsletter)){
    //         $receive_newsletter="n/a";
    //     }


    //     $artist_type_options = ['Solo Artist', 'Band', 'Influencer'];
    //     $selected_option_index = array_search($artist_type, $artist_type_options);

    //     // Moving the selected option to the beginning of the array
    //     if ($selected_option_index !== false) {
    //         unset($artist_type_options[$selected_option_index]);
    //         array_unshift($artist_type_options, $artist_type);
    //     }

    //     $artist_type_options_html = implode("\n", array_map(function ($option) {
    //         return '<option value="' . $option . '">' . $option . '</option>';
    //     }, $artist_type_options));

    //         // <label for="Profile-details" class="label-block profile-label-heading">Update Profile Data</label>


    //     $html .= '<div class="row">
        
    //         <div class="profile-container">

    //         <div class="col-md-12 col-lg-12 col-sm-12">

    //         <form action="'.base_url('update_artist_data').'" class="artist-uform" method="post" enctype="multipart/form-data" onsubmit="return confirm(\'Are you sure you want to update?\')">
    //          '.csrf_field().'

    //         <input type="hidden" class="artist-popup-input" name="registered_id" id="registered_id" value="' . $artist_id . '">

    //         <div class="form-group artist_type-group">
    //           <label for="artist_type" class="label-block">Type of Artist *</label>
    //            <select name="artist_type" class="artist-popup-input" id="artist_type">
    //              '.$artist_type_options_html.'
    //             </select>
    //         </div>
              
    //         <div class="form-group">
    //           <label for="artist_name" class="label-block">Band/Artist Name *</label>
    //           <input type="type" class="artist-popup-input form-control input-field" name="artist_name" id="artist_name" value="' . $artist_name . '">
    //         </div>

    //          <div class="form-group">
    //           <label for="Countryoforigin" class="label-block">Country of origin *</label>
    //           <input type="type" class="artist-popup-input form-control input-field" name="artist_country" id="artist_country" value="' . $artist_country . '">
    //         </div>

    //         <div class="form-group">
    //           <label for="Email Management" class="label-block">Email Management </label>
    //           <input type="type" class="artist-popup-input form-control input-field" name="email_management" id="email_management" value="' . $email_management . '">
    //         </div>

    //         <div class="form-group">
    //           <label for="Official Contact Email" class="label-block">Official Contact Email *</label>
    //           <input type="type" class="artist-popup-input form-control input-field" name="official_contact_email" id="official_contact_email" value="' . $official_contact_email . '">
    //         </div>


    //         <div class="form-group">
    //               <label for="label" class="label-block">Label </label>
    //               <input type="type" class="artist-popup-input form-control input-field" name="label" id="label" value="' . $label . '">
    //         </div>

    //         <div class="form-group">
    //             <label for="Distributor And Aggregator" class="label-block">Distributor And Aggregator </label>
    //             <input type="type" class="artist-popup-input form-control input-field" name="distributor_and_aggregator" id="distributor_and_aggregator" value="' . $distributor_and_aggregator . '">
    //         </div>



    //         <div class="form-group">
    //           <label for="facebook" class="label-block">Facebook </label>
    //           <input type="type" class="artist-popup-input form-control input-field" name="facebook" id="facebook" value="' . $facebook . '">
    //         </div>
                          

    //         <div class="form-group">
    //           <label for="instagram" class="label-block">Instagram </label>
    //           <input type="type" class="artist-popup-input form-control input-field" name="instagram" id="instagram" value="' . $instagram . '">
    //         </div>
                       

    //         <div class="form-group">
    //           <label for="twitter" class="label-block">Twitter </label>
    //           <input type="type" class="artist-popup-input form-control input-field" name="twitter" id="twitter" value="' . $twitter . '">
    //         </div>

    //         <div class="form-group">
    //           <label for="spotify" class="label-block">Spotify </label>
    //           <input type="type" class="artist-popup-input form-control input-field" name="spotify" id="spotify" value="' . $spotify . '">
    //         </div>

    //         <div class="form-group">
    //               <label for="metal_archives" class="label-block">Metal Archives </label>
    //               <input type="type" class="artist-popup-input form-control input-field" name="metal_archives" id="metal_archives" value="' . $metal_archives . '">
    //         </div>

    //         <div class="form-group">
    //               <label for="website" class="label-block">Website </label>
    //               <input type="type" class="artist-popup-input form-control input-field" name="website" id="website" value="' . $website . '">
    //         </div>

    //         <div class="form-group">
    //              <label for="discogs" class="label-block">Discogs </label>
    //               <input type="type" class="artist-popup-input form-control input-field" name="discogs" id="discogs" value="' . $discogs . '">
    //         </div>

        
    //           <div class="form-group mt-3">
    //             <button type="submit" class="signup-btn">Update</button>
    //         </div>
    //         </form>
    //         </div>
    //       </div>

    //     </div>           
    //         ';


    //     $response = [
    //         'html' => $html
    //     ];

    //     return $html;
    // }
   


}
