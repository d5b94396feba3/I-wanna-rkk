<?php

namespace App\Controllers;

use App\Models\HomeModel;
use App\Models\MusicUploadModel;
use App\Models\MusicUploadModel_mainDB;
use App\Models\ProfileModel;
use CodeIgniter\Controller;

use App\Libraries\Ajax_pagination; 

class MusicUpload extends BaseController
{
    protected $home;
    protected $profile;
    protected $music_upload_model;
    protected $music_upload_model_mainDB;
    protected $session;
    protected $validation;
    protected $perPage = 35;
    protected $ajaxPagination;
    private $db1;
    private $db2;

    public function __construct()
    {
        $this->home = model('HomeModel');
        $this->profile = model('ProfileModel');
        $this->music_upload_model = model('MusicUploadModel');
        $this->music_upload_model_mainDB = model('MusicUploadModel_mainDB');
        $this->session = session();
        $this->validation = \Config\Services::validation();
        $this->ajaxPagination = new Ajax_pagination();
    }


    public function index()
    {
        $data['active'] = 'mu_profile';
        $data['dropdownActive'] = 'profile';
        $this->session->setFlashdata("menu_active", "mu_profile");

        if (!session('logged_in')) {
            return redirect()->to('/')->with('error-msg', "Access denied! Please login to your account first.");
        }

        return view('rokk-artists/layout/header', $data)
            . view('rokk-artists/music-upload/profile/index', $data)
            . view('rokk-artists/layout/footer');
    }

    public function release_index()
    {
        $data['active'] = 'mu_release';
        $data['dropdownActive'] = 'profile';

        $this->session->setFlashdata("menu_active", "mu_profile");

        if (!session('logged_in')) {
            return redirect()->to('/')->with('error-msg', "Access denied! Please login to your account first.");
        }

        return view('rokk-artists/layout/header', $data)
            . view('rokk-artists/music-upload/release/index', $data)
            . view('rokk-artists/layout/footer');
    }

    public function track_index()
    {
        $data['active'] = 'mu_track';
        $data['dropdownActive'] = 'profile';

        $this->session->setFlashdata("menu_active", "mu_track");

        if (!session('logged_in')) {
            return redirect()->to('/')->with('error-msg', "Access denied! Please login to your account first.");
        }

        return view('rokk-artists/layout/header', $data)
            . view('rokk-artists/music-upload/track/index', $data)
            . view('rokk-artists/layout/footer');
    }


    public function ajax_music_upload_data_onPageLoad()
    {
        if (session('artist_id')) { 

            $artist_id = session('artist_id');
            $artist = $this->music_upload_model->get_artist_data_from_artist_info_by_id($artist_id);
            $profile_data = $this->extract_artist_profile_data($artist);
            echo $profile_data;
        }
    }

    
    public function ajax_create_release_data()
    {
        if (session('artist_id')) { 

            $artist_id = session('artist_id');
            $artist = $this->music_upload_model->get_artist_data_from_artist_info_by_id($artist_id);
            $release_data_html = $this->extract_create_release_data($artist);
            echo $release_data_html;
        }
    }


    public function ajax_add_track_data()
    {
        if (session('artist_id')) { 

            $artist_id = session('artist_id');
            $artist = $this->music_upload_model->get_artist_data_from_artist_info_by_id($artist_id);
            $track_data_html = $this->extract_add_track_data($artist);
            echo $track_data_html;
        }
    }



public function add_track_data()
{
    $data['active'] = 'music-upload';
    $this->session->setFlashdata("menu_active", "track");
    // max execution time 1H.
    set_time_limit(3600);

    $validation = \Config\Services::validation();

    if (!session('logged_in')) {
        return redirect()->to('/')->with('error-msg', "Access denied! Please Sign In first.");
    } elseif ($this->request->getMethod() === 'post') {

        $num_of_track = $this->request->getPost('num_of_track');
        $artist_id = session('artist_id');

        for ($id = 1; $id <= $num_of_track; $id++) {
            $track_title_ = 'track_title_' . $id;
            $features_ = 'features_' . $id;
            $composer_ = 'composer_' . $id;
            $lyricist_ = 'lyricist_' . $id;
            $isrc_code_ = 'isrc_code_' . $id;
            $explicit_ = 'explicit_' . $id;
            $track_file_ = 'track_file_' . $id; 
            $artist_name = 'artist_name_' . $id;

            $validation->setRules([
                $track_title_ => 'required|max_length[250]',
                $features_ => 'max_length[150]',
                $composer_ => 'required|max_length[100]',
                $lyricist_ => 'required|max_length[100]',
                $isrc_code_ => 'required|max_length[100]',
                $track_file_ => [
                    'label' => 'Track File',
                    'rules' => [
                        'uploaded[' . $track_file_ . ']',
                        'max_size[' . $track_file_ . ',102400]',
                        'audioFile[' . $track_file_ . ']',
                    ],
                    'errors' => [
                        'uploaded' => 'The {field} field must contain a valid file.',
                        'max_size' => 'The {field} field exceeds the maximum file size.',
                        'audioFile' => 'The {field} field must be a valid audio file (MP3, WAV, FLAC, AAC, OGG).',
                    ],
                ],
                $explicit_ => 'required',
            ]);

        
        if ($validation->withRequest($this->request)->run()) {


            $track_file_ = $this->request->getFile($track_file_);
            // Get the original file name
            $originalName = $track_file_->getName();
            // Generate a new file name with artist_id
            $track_file_newName = $artist_id . '_' . $originalName;

            // server upload path
            // if (!($track_file_->move(ROOTPATH . '/uploads/tracks', $track_file_newName))) {

            //local upload path
            if (!($track_file_->move(ROOTPATH . 'public/uploads/tracks', $track_file_newName))) {

                 return $this->response->setJSON(['success'=>false, 'message'=>"File upload failed for ".$originalName.". Please try again."]);
            }

            $track_link = base_url('uploads/tracks/' . $track_file_newName);

            $track_title_=$this->request->getPost($track_title_);
            $artist_name=$this->request->getPost($artist_name);
            $features_=$this->request->getPost($features_);
            $composer_=$this->request->getPost($composer_);
            $lyricist_=$this->request->getPost($lyricist_);
            $isrc_code_=$this->request->getPost($isrc_code_);
            $explicit_=$this->request->getPost($explicit_);

            $track_inserted = $this->music_upload_model->upload_track_data($artist_id,$artist_name,$track_title_,$features_,$composer_,$lyricist_,$isrc_code_,$explicit_,$track_file_newName,$track_link); 

            if (!$track_inserted) {
                // return redirect()->to(base_url('music-upload'));
                 return $this->response->setJSON(['success'=>false, 'message'=>'Failed to upload data.']);
            }

        } else {

            $errors = $validation->getErrors();
            $errorString = implode(' ', $errors);  
            return $this->response->setJSON(['success'=>false, 'message'=>'Form validation failed.'. $errorString]);

        }

      }

      if($track_inserted){
        return $this->response->setJSON(['success'=>true, 'message'=>'Tracks data has been uploaded.']);
      }


    }
}


    public function update_music_upload_profile_data()
    {
        $data['active'] = 'music-upload';


        $validation = \Config\Services::validation();

        $validation->setRules([
            'artist_type' => 'required',
            'artist_name' => 'required|max_length[150]',
            'first_name' => 'required|max_length[100]',
            'last_name' => 'required|max_length[100]',
            'email' => 'required|max_length[100]|valid_email',
            'phone' => [
                'label' => 'Phone',
                'rules' => 'required|max_length[20]|regex_match[/^[0-9()+\- ]*$/]',
                'errors' => [
                    'regex_match' => 'The {field} field may only contain digits, plus sign (+), parentheses, hyphens, and spaces.',
                ],
            ],
            'website' => 'permit_empty|valid_url|max_length[255]',
            'country' => 'required|max_length[50]',
            'street_and_number' => 'required|max_length[250]',
            'zip' => 'required|max_length[20]',
            'city' => 'required|max_length[50]',
            'vat' => 'required|in_list[yes,no]',
        ]);



        if (!session('logged_in')) {
            return redirect()->to('/')->with('error-msg', "Access denied! Please Sign In first.");
        }
        else if ($this->request->getMethod() === 'post' && $validation->withRequest($this->request)->run()){

            $result = $this->music_upload_model->update_music_upload_profile_data_by_id($this->request->getPost()); 

            if ($result) {
                $artist_id=$this->request->getPost('hidden_artist_id');
                return $this->response->setJSON(['success'=>true, 'message'=>'Profile data has been updated.']);

            } else {
                return $this->response->setJSON(['success'=>false, 'message'=>'Failed to update data.']);
            }
        }else{
            // Validation failed
            $errors = $validation->getErrors();
            $errorString = implode(' ', $errors); 
            return $this->response->setJSON(['success'=>false, 'message'=>"Form validation failed. $errorString"]);
        }

    }



    public function update_music_release_data()
    {
        $data['active'] = 'music-upload';


        $validation = \Config\Services::validation();


        $validation->setRules([
            'artist_name' => 'required|max_length[150]',
            'release_title' => 'required|max_length[200]',
            'genre' => 'required|max_length[100]',
            'language' => 'required',
            'image_link' => [
                'label' => 'Release Image',
                'rules' => 'max_size[image_link,10240]|is_image[image_link]',
                'errors' => [
                    'max_size' => 'The {field} field exceeds the maximum file size.',
                    'is_image' => 'The {field} field must contain a valid image file.',
                ],
            ],
            'release_date' => 'required',
            'copyright' => 'required',
            'copyright_desc' => 'max_length[255]',
        ]);


        if (!session('logged_in')) {
            return redirect()->to('/')->with('error-msg', "Access denied! Please Sign In first.");
        }
        else if ($this->request->getMethod() === 'post' && $validation->withRequest($this->request)->run()){

            $artist_id=$this->request->getPost('hidden_artist_id');
            $file = $this->request->getFile('image_link');

            // Generate a unique name for the file
            // $image_newName = $file->getRandomName();

            // Get the original file name
            $originalName = $file->getName();

            // Generate a new file name with artist_id
            $image_newName = $artist_id . '_' . $originalName;

            // Move the file to the uploads directory
            if (!($file->move(ROOTPATH . '/public/uploads/release', $image_newName))) {
                // $this->session->setFlashdata("success-msg", "File has been uploaded.");
                return $this->response->setJSON(['success'=>false, 'message'=>'File upload failed.']);
            } 

            $image_link = base_url('uploads/release/' . $image_newName);

            $result = $this->music_upload_model->upload_release_data($this->request->getPost(),$image_link); 

            if ($result) {
                return $this->response->setJSON(['success'=>true, 'message'=>'Release data has been created.']);
            } else {
                return $this->response->setJSON(['success'=>false, 'message'=>'Failed to create data. Please refresh page and try again.']);
            }
        }else{
            // Validation failed
            $errors = $validation->getErrors();
            $errorString = implode(' ', $errors);  // Convert array of errors to a string
            return $this->response->setJSON(['success'=>false, 'message'=>"Form validation failed. $errorString"]);
        }

    }



public function extract_add_track_data($record)
    {

        $html = "";
        $profile_details_html = "";
        $create_release_html = "";
        $add_track_html = "";

        $add_track_html=$this->extract_music_upload_add_track($record);

        $html .= '<div class="row">
        
            <div class="col-md-12 col-lg-12 col-sm-12">
                '.$add_track_html.'
          </div>
        </div>       
            ';

        return $html;
    }


    public function extract_create_release_data($record)
    {

        $html = "";
        $profile_details_html = "";
        $create_release_html = "";
        $add_track_html = "";

        $create_release_html=$this->extract_music_upload_create_release($record);

        $html .= '<div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                '.$create_release_html.'
           </div>
        </div>       
            ';

        return $html;
    }


    public function extract_artist_profile_data($record)
    {

        $html = "";
        $profile_details_html = "";
        $create_release_html = "";
        $add_track_html = "";

        $profile_details_html=$this->extract_music_upload_profile_detail($record);

        $html .= '<div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                '.$profile_details_html.'
           </div>
        </div>       
            ';

        return $html;
    }


    public function extract_music_upload_profile_detail($record){

        $html = "";
        $artist_name='';
        $first_name='';
        $last_name='';
        $email='';
        $phone='';
        $website='';
        $country='';
        $street_and_number='';
        $zip='';
        $city='';
        $vat='';
        $is_vat_applicable ='';
        $updated='';

        $artist_id = trim($record->artist_id);

        if(isset($record->first_name))
        $first_name = trim($record->first_name);

        if(isset($record->last_name))
        $last_name = trim($record->last_name);

        if(isset($record->phone))
        $phone = trim($record->phone);

        if(isset($record->phone))
        $phone = trim($record->phone);

        if(isset($record->zip))
        $zip = trim($record->zip);

        if(isset($record->city))
        $city = trim($record->city);

        if(isset($record->city))
        $is_vat_applicable = trim($record->is_vat_applicable);

        if(isset($record->artist_type_from_ai))
        $artist_type = trim($record->artist_type_from_ai);

        if(isset($record->artist_name))
        $artist_name = trim($record->artist_name);

        if(isset($record->artist_country))
        $artist_country = trim($record->artist_country);

        if(isset($record->official_contact_email))
        $official_contact_email = trim($record->official_contact_email);

        if(isset($record->website))
        $website = trim($record->website);

        if(isset($record->artist_type))
        $artist_type = trim($record->artist_type);

        if(isset($record->street_and_number))
        $street_and_number = trim($record->street_and_number);
       
        if(empty($website)){
            $website="n/a";
        }

        // Account type [Selectbox: Artist, Band, Label ]
        $account_type_options = ['Artist', 'Band', 'Label'];
        $selected_option_index = array_search($artist_type, $account_type_options);

        // Moving the selected option to the beginning of the array
        if ($selected_option_index !== false) {
            unset($account_type_options[$selected_option_index]);
            array_unshift($account_type_options, $artist_type);
        }

        $account_type_options_html = implode("\n", array_map(function ($option) {
            return '<option value="' . $option . '">' . $option . '</option>';
        }, $account_type_options));

        $is_selected_yes = ($is_vat_applicable == 'yes') ? 'checked' : '';
        $is_selected_no = ($is_vat_applicable == 'no') ? 'checked' : '';

    

        $html .= '

             <form action="'.base_url('update_music_upload_profile_data').'" id="profileForm" class="artist-uform" method="post" enctype="multipart/form-data">
              '.csrf_field().'
            <input type="hidden" class="artist-popup-input" name="hidden_artist_id" id="hidden_artist_id" value="' . $artist_id . '">

            <div class="form-group artist_type-group">
              <label for="Account type" class="label-block">Account type *</label>
               <select name="artist_type" class="artist-popup-input" id="artist_type" required>
                 '.$account_type_options_html.'
                </select>
            </div>
              
            <div class="form-group">
              <label for="Name" class="label-block">Band/Artist Name *</label>
              <input type="text" class="artist-popup-input form-control input-field" name="artist_name" id="artist_name" value="' . $artist_name . '" placeholder="e.g., Mentalist" required>
            </div>

             <div class="form-group">
              <label for="First Name" class="label-block">First Name *</label>
              <input type="text" class="artist-popup-input form-control input-field" name="first_name" id="first_name" value="' . $first_name . '" placeholder="e.g., John" required>
            </div>

            <div class="form-group">
              <label for="Last Name" class="label-block">Last Name *</label>
              <input type="text" class="artist-popup-input form-control input-field" name="last_name" id="last_name" value="' . $last_name . '" placeholder="e.g., Doe" required>
            </div>

            <div class="form-group">
              <label for="Email Address" class="label-block">Email Address *</label>
              <input type="email" class="artist-popup-input form-control input-field" name="email" id="email" value="' . $official_contact_email . '" placeholder="e.g., name@domain.com" required>
            </div>


            <div class="form-group">
                  <label for="Phone" class="label-block">Phone </label>
                  <input type="text" class="artist-popup-input form-control input-field" name="phone" id="phone" value="' . $phone . '" placeholder="e.g., +1 (123) 456-7890" >
            </div>

            <div class="form-group">
                  <label for="website" class="label-block">Website </label>
                  <input type="link" class="artist-popup-input form-control input-field" name="website" id="website" value="' . $website . '" placeholder="e.g., https://www.example.com" >
            </div>

            <div class="form-group">
              <label for="Countryoforigin" class="label-block">Country *</label>
              <input type="text" class="artist-popup-input form-control input-field" name="country" id="country" value="' . $artist_country . '" placeholder="e.g., United States" required>
            </div>

            <div class="form-group">
                  <label for="Street and number" class="label-block">Street and number </label>
                  <input type="text" class="artist-popup-input form-control input-field" name="street_and_number" id="street_and_number" value="' . $street_and_number . '" placeholder="e.g., 123 Main St">
            </div>


            <div class="form-group">
                <label for="zip" class="label-block">ZIP </label>
                <input type="text" class="artist-popup-input form-control input-field" name="zip" id="zip" value="' . $zip . '" placeholder="e.g., 12345">
            </div>


            <div class="form-group">
                <label for="zip" class="label-block">City </label>
                <input type="text" class="artist-popup-input form-control input-field" name="city" id="city" value="' . $city . '" placeholder="e.g., New York">
            </div>


            <div class="form-group">
              <label for="VAT" class="label-block">VAT Applicable <br>(European Union only)</label>

                    <label class="radio-inline">
                        <input type="radio" name="vat" value="yes" ' . $is_selected_yes . ' required> Yes
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="vat" value="no" ' . $is_selected_no . ' required> No
                    </label>
            </div>
                          
        
              <div class="form-group mt-3">
                <button type="submit" class="signup-btn">Update</button>
            </div>
            </form>       
            ';


        $response = [
            'html' => $html
        ];

        return $html;
    }
   

    public function extract_music_upload_create_release($record){

        $html = "";
        $artist_name='';
        $updated='';

        $artist_id = trim($record->artist_id);

        if(isset($record->artist_type_from_ai))
        $artist_type = trim($record->artist_type_from_ai);

        if(isset($record->artist_name))
        $artist_name = trim($record->artist_name);

        date_default_timezone_set('UTC');
        $current_year=date('Y');
        $copyright_options='';
        for ($copyright_year=1964; $copyright_year <=$current_year; $copyright_year++) { 
           $copyright_options.='<option value="' . $copyright_year . '">' . $copyright_year . '</option>';
        }

        $genres_options = '';
        $genres_options = $this->get_all_genres_from_mainDB();


        $html .= '

             <form action="'.base_url('update_music_release_data').'" id="releaseForm" class="artist-uform" method="post" enctype="multipart/form-data">
            '.csrf_field().'
            <input type="hidden" class="artist-popup-input" name="hidden_artist_id" id="hidden_artist_id" value="' . $artist_id . '">

            <label for="Preview of an Image" class="label-block">Preview of an Image *</label>

             <div id="fileInputContainer">
                    <div id="preview"></div>
                    <input type="file" name="image_link" id="image_link" accept="image/*" onchange="previewFile()" ondrop="handleDrop(event)" required>
                    <p>Click or drag and drop a file</p>
            </div>

            <div class="form-group">
              <label for="Artist" class="label-block">Artist *</label>
              <input type="text" class="artist-popup-input form-control input-field" name="artist_name" id="artist_name" value="' . $artist_name . '" placeholder="e.g., Mentalist" required>
            </div>

             <div class="form-group">
              <label for="Release title" class="label-block">Release title *</label>
              <input type="text" class="artist-popup-input form-control input-field" name="release_title" id="release_title" value="" placeholder="e.g., Let\'s ROKK" required>
            </div>


            <div class="form-group artist_type-group">
              <label for="Genre" class="label-block">Genre * </label>
               <select name="genre" class="artist-popup-input" id="genre" required>
                <option disabled selected value=""></option>
                 '.$genres_options.'
                </select>
            </div>

            <div class="form-group artist_type-group">
              <label for="Languagee" class="label-block">Language * </label>
               <select name="language" class="artist-popup-input" id="language" required>
                 
                    <option value="ar">Arabic</option>
                    <option value="yue-Hant">Cantonese</option>
                    <option value="ca">Catalan</option>
                    <option value="cmn-Hans">Chinese (Simplified)</option>
                    <option value="cmn-Hant">Chinese (Traditional)</option> 
                    <option value="hr">Croatian</option>
                    <option value="cs">Czech</option>
                    <option value="da">Danish</option>
                    <option value="de-DE">Deutsch</option>
                    <option value="nl">Dutch</option>
                    <option selected="selected" value="en-GB">English</option>
                    <option value="et">Estonian</option>
                    <option value="fi">Finnish</option>
                    <option value="fr-FR">French</option>
                    <option value="el">Greek</option>
                    <option value="he">Hebrew</option>
                    <option value="hu">Hungarian</option>
                    <option value="is">Icelandic</option>
                    <option value="id">Indonesian</option>
                    <option value="it-IT">Italian</option>
                    <option value="ja">Japanese</option>
                    <option value="ko">Korean</option>
                    <option value="lo">Lao</option>
                    <option value="lv">Latvian</option>
                    <option value="li">Lithuanian</option>
                    <option value="ms">Malay</option>
                    <option value="no">Norwegian</option>
                    <option value="pl">Polish</option>
                    <option value="pt">Portuguese</option>
                    <option value="ro">Romanian</option>
                    <option value="ru">Russian</option>
                    <option value="sk">Slovak</option>
                    <option value="es">Spanish</option>
                    <option value="sv">Swedish</option>
                    <option value="de-CH">Schweizerdeutsch</option>
                    <option value="tl">Tagalog</option>
                    <option value="th">Thai</option>
                    <option value="tr">Turkish</option>
                    <option value="uk">Ukrainian</option>
                    <option value="vi">Vietnamese</option>

                </select>
            </div>

            <div class="form-group">
              <label for="Release date" class="label-block">Release date *</label>
              <input type="text" class="artist-popup-input form-control input-field" name="release_date" id="release_date" required readonly>
            </div>


            <div class="form-group">
              <label for="Copyright" class="label-block">Copyright * </label>
               <select name="copyright" class="artist-popup-input copyright-select" id="copyright" required>
                 <option disabled selected value=""></option>
               '.$copyright_options.'
                </select><br>

            </div>
             <div class="form-group copyright-textarea">
              <label for="Copyright Details" class="label-block">Additional Copyright<br>Information </label>
             <textarea class="artist-popup-input" placeholder="" rows="4" name="copyright_desc" id="copyright_desc"></textarea>

            </div>
        
              <div class="form-group">
                <button type="submit" class="signup-btn">Create Release</button>
            </div>
            </form>       
            ';


        $response = [
            'html' => $html
        ];

        return $html;
    }



    public function extract_music_upload_add_track($record){

        $html = "";
        $artist_id = session('artist_id');

        $html .= '
            <div class="row">

            <label for="track-details" class="label-block mu-label-heading">Track Info</label>
        
            <div class="track-container">

             <form id="addTrackForm" action="'.base_url('add_track_data').'" class="artist-uform" method="post" enctype="multipart/form-data">
             '.csrf_field().'
             <input type="hidden" class="artist-popup-input" name="hidden_artist_id" id="hidden_artist_id" value="' . $artist_id . '">

            <div class="form-group artist_type-group">
                <label for="Number of tracks" class="label-block">Number of tracks: </label>
                <input type="number" class="artist-popup-input form-control input-field num_track" name="num_of_track" id="num_of_track" placeholder="Please enter number of tracks" required onkeyup="genre_track_upload_fields()">
            </div>

            <div class="dynamic-track-container">

            </div>
    
              <div class="form-group">
                <button type="submit" class="signup-btn" >Add Track</button>
            </div>
           
            </form>

            </div>
            </div>
           
            ';


        $response = [
            'html' => $html
        ];

        return $html;
    }


    public function get_all_genres_from_mainDB(){

        $genres = $this->music_upload_model_mainDB->getGenreDataFromMainDB(); 

        $options_html='';

        foreach ($genres as $genre) {

            $genre = trim($genre['genre']);
            $options_html.='<option value="' . $genre . '">' . $genre . '</option>';
        }

        return $options_html;

    }


}
