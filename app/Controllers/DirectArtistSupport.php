<?php

namespace App\Controllers;

use App\Models\HomeModel;
use App\Models\ProfileModel;
use App\Models\DirectArtistSupportModel;
use CodeIgniter\Controller;
use App\Libraries\Ajax_pagination; 

class DirectArtistSupport extends BaseController
{

    protected $home;
    protected $chart;
    protected $direct_artist_support_model;
    protected $session;
    protected $validation;
    protected $perPage = 35;
    protected $ajaxPagination;
    protected $security;

    public function __construct()
    {
        $this->home = model('HomeModel');
        $this->chart = model('ProfileModel');
        $this->direct_artist_support_model = model('DirectArtistSupportModel');
        $this->session = session();
        $this->validation = \Config\Services::validation();
        $this->security = \Config\Services::security();

    }

    public function index()
    {
        $data['active'] = 'direct-artist-support';


        if (!session('logged_in')) {
            return redirect()->to('/')->with('error-msg', "Access denied! Please login to your account first.");
        }

        return view('rokk-artists/layout/header', $data)
            . view('rokk-artists/direct-artist-support/index', $data)
            . view('rokk-artists/layout/footer');
    }


    public function buildHtmlFromArtists($artists) {

            $html = '';

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
                <th class="gc-tb-tle">distributor_and_aggregator</th>
                <th class="gc-tb-tle">Receive Newsletter</th>
                <th class="gc-tb-tle">Date</th>
                <th class="gc-tb-tle">Status</th>
                </tr>
                </thead>
                <tbody>';


            foreach ($artists as $record) {


                $artist_id = trim($record['artist_id']);
                $artist_type = trim($record['artist_type']);
                $artist_name = trim($record['artist_name']);
                $artist_country = trim($record['artist_country']);
                $email_management = trim($record['email_management']);
                $official_contact_email = trim($record['official_contact_email']);
                $preferred_rokk_address = trim($record['preferred_rokk_address']);
                $referral = trim($record['referral']);
                $password = trim($record['password']);
                $confirm_password = trim($record['confirm_password']);
                $facebook = trim($record['facebook']);
                $instagram = trim($record['instagram']);
                $twitter = trim($record['twitter']);
                $spotify = trim($record['spotify']);
                $metal_archives = trim($record['metal_archives']);
                $website = trim($record['website']);
                $discogs = trim($record['discogs']);
                $label = trim($record['label']);
                $distributor_and_aggregator = trim($record['distributor_and_aggregator']);
                $receive_newsletter = trim($record['receive_newsletter']);
                $join_date = trim($record['join_date']);
                $status = trim($record['status']);


                if(empty($email_management)){
                    $email_management="n/a";
                }
                if(empty($facebook)){
                    $facebook="n/a";
                }
                if(empty($instagram)){
                    $instagram="n/a";
                }   
                if(empty($twitter)){
                    $twitter="n/a";
                }
                if(empty($spotify)){
                    $spotify="n/a";
                }   
                if(empty($metal_archives)){
                    $metal_archives="n/a";
                }   
                if(empty($website)){
                    $website="n/a";
                }
                if(empty($discogs)){
                    $discogs="n/a";
                }  
                if(empty($label)){
                    $label="n/a";
                }  
                if(empty($referral)){
                    $referral="n/a";
                }
                if(empty($preferred_rokk_address)){
                    $preferred_rokk_address="n/a";
                }else{
                    $preferred_rokk_address = preg_replace('/\s+/', '', $preferred_rokk_address);
                    $preferred_rokk_address=$preferred_rokk_address.".rokk.app";
                } 
                if(empty($distributor_and_aggregator)){
                    $distributor_and_aggregator="n/a";
                }
                if(empty($receive_newsletter)){
                    $receive_newsletter="n/a";
                }

                $status_tag="";

                if($status=='requested'){
                    $status_tag="status-requested";
                }
                else if($status=='partner-request'){
                    $status_tag="status-partner-request";
                }
                else if($status=='partner'){
                    $status_tag="status-partner";
                }else{
                    $status_tag="status-active";
                }

                if (!empty($artist_name)) {

                    $html .= '

                    <tr class="data-searchbar-country-list-dis artist-popup" data-id="' . $id . '" data-name="' . $artist_name . '" data-type="' . $artist_type . '">

                        <td>' . $index . '. </td>
                        <td>' . $artist_type . '</td>                   
                        <td>' . $artist_name . '</td>                   
                        <td>' . $artist_country . '</td>                   
                        <td>' . $email_management . '</td>                   
                        <td>' . $official_contact_email . '</td>                   
                        <td>' . $preferred_rokk_address . '</td>                   
                        <td>' . $label . '</td>                   
                        <td>' . $distributor_and_aggregator . '</td>                   
                        <td>' . $receive_newsletter . '</td>                   
                        <td>' . $join_date . '</td>                   
                        <td class="'.$status_tag.'">' . $status . '</td>                   

                   </tr>';

                    $index++;
                }
            }

            $html .= '</tbody></table>';

            }

            return $html;
    }


    public function ajax_direct_artist_support_onPageLoad()
    {

        
        if (session('artist_id')) { 

            $artist_id = session('artist_id');
            $artist = $this->chart->getArtistDataByID($artist_id);
            $artist_link_status = trim($artist->artist_link_status);
            $profile_data="";
            $artist_link_status_heading="";

            if($artist_link_status=="empty"){
                $artist_link_status_heading="<span class='status-inactive'>You haven't submitted your ROKK Preferred address yet.</span>";
                $profile_data = $this->extract_artist_inactive_rokk_address($artist);
            }
            else if($artist_link_status=="requested"){
                $artist_link_status_heading="<span class='status-requested'>You can still change your preferred ROKK address.</span>";
                $profile_data = $this->extract_artist_inactive_rokk_address($artist);
            }
            else if($artist_link_status=="confirmed"){
                $artist_link_status_heading="<span class='status-active'>Congratulations! The ROKK address you requested has been confirmed.</span>";
                $profile_data = $this->extract_artist_active_rokk_address($artist);
            }

            $results = [
                'html' => $profile_data,
                'artist_link_status_heading' => $artist_link_status_heading,
            ];

            // Send the JSON response
            return $this->response->setJSON($results);

        }
    }



    public function update_direct_artist_support()
    {
        $data['active'] = 'direct-artist-support';

        $validation = \Config\Services::validation();

         $validation->setRules([
                'preferred_rokk_address' => 'required|min_length[3]|max_length[25]|regex_match[/^[a-zA-Z0-9-]{3,}$/]',
        ]);


        if (!session('logged_in')) {
            return redirect()->to('/')->with('error-msg', "Access denied! Please login to your account first.");
        }
        else if ($this->request->getMethod() === 'post' && $validation->withRequest($this->request)->run()){

            $artist_link_status="requested";

            $result = $this->direct_artist_support_model->update_direct_artist_support_by_id($this->request->getPost(),$artist_link_status); 
            if ($result) {
                $this->session->setFlashdata("success-msg", "We will notify you when your requested ROKK address has been confirmed.");
            } else {
                $this->session->setFlashdata("error-msg", "Failed to submit data.");
            }
            // return redirect()->to(base_url('direct-artist-support'));
        }else{
            $this->session->setFlashdata("error-msg", "Please enter a valid Preferred Rokk Address.");
        }
        
        return redirect()->to(base_url('direct-artist-support'));

    }


    public function extract_artist_inactive_rokk_address($record)
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


        if(empty($email_management)){
            $email_management="n/a";
        }
        if(empty($facebook)){
            $facebook="n/a";
        }
        if(empty($instagram)){
            $instagram="n/a";
        }   
        if(empty($twitter)){
            $twitter="n/a";
        }
        if(empty($spotify)){
            $spotify="n/a";
        }   
        if(empty($metal_archives)){
            $metal_archives="n/a";
        }   
        if(empty($website)){
            $website="n/a";
        }
        if(empty($discogs)){
            $discogs="n/a";
        }  
        if(empty($label)){
            $label="n/a";
        }  
        if(empty($referral)){
            $referral="n/a";
        }
        if(empty($distributor_and_aggregator)){
            $distributor_and_aggregator="n/a";
        }
        if(empty($receive_newsletter)){
            $receive_newsletter="n/a";
        }

        $html .= '<div class="row">
        

            <div class="col-md-12 col-lg-12 col-sm-12">

             <form action="'.base_url('update_direct_artist_support').'" class="artist-uform" method="post" enctype="multipart/form-data" onsubmit="return confirm(\'Are you sure you want to submit?\')">
             '.csrf_field().'
            <input type="hidden" class="das-input" name="registered_id" id="registered_id" value="' . $artist_id . '">

             <p class="band-detail-popup-desc">Please enter your preferred ROKK address *</p>

              <input type="type" class="das-input" name="preferred_rokk_address" id="preferred_rokk_address" value="' . $preferred_rokk_address . '" placeholder="YourBandName" required> rokk.app
              <p class="pass-valid-text"> Allowed: letters, digits and -, at least 3 letters</p>
             
                <section id="termsofsevice" class="termsofsevice-txtarea">
                <p>Affiliate Agreement<br>
                concerning the cooperation in order to acquire users<br>
                for the ROKK music streaming service
                </p>
                <p>between
                </p>
                <p>FAIRMUSIC GmbH<br>
                In der Dumpf 12<br>
                D-66130 Saarbrücken<br>
                – hereinafter also referred to as “FAIRMUSIC” or the “COMPANY” –
                </p>
                <p>and
                </p>
                <p>ARTIST/Manager<br>
                – hereinafter also referred to as “ARTIST” –<br>
                readonly:readonly
                </p>
                <p>– COMPANY and ARTIST combined hereinafter also referred to as the “Parties” –
                </p>
                <p>Preamble:
                </p>
                <p>FAIRMUSIC operates a music streaming service aimed at improving ARTIST’s remuneration. This goal is to be reached via a higher payout per stream in combination with direct payments to ARTIST. FAIRMUSIC wishes to achieve direct payments to ARTIST by involving ARTIST in the marketing and promotion of the www.rokk.app fair streaming service, with the mutually beneficial aim of acquiring as many users as possible for the streaming service. In return, FAIRMUSIC will pay ARTIST a share of monthly sales generated via such acquired customers during an agreed term.
                </p>
                <p>This being said, the Parties agree on the following:
                </p>
                <p>§ 1 Subject matter:
                </p>
                <p>(1) ARTIST will act as a cooperation partner of the COMPANY, marketing an Affiliate Link to be provided to ARTIST by the COMPANY.
                </p>
                <p>§ 2 ARTIST’s obligations:
                </p>
                <p>(1) ARTIST will, taking into account the Parties’ mutual interests, promote the Affiliate Link to the best of their ability. On the ARTIST side, this could be, for example, sharing the affiliate link regularly on social media, mentioning it in interviews or providing certain materials for promo purposes. Such materials could be video messages, guitar pages or drum skins or even certain contingents of free tickets for concerts that COMPANY can raffle off among users.
                </p>
                <p>(2) According to the prevailing understanding, the Parties agree that such representation is carried out on an avocational basis. ARTIST will ensure that such vocational activities do not conflict with their other interests (in the case of ARTISTS based in Germany, in particular regarding any existing entitlement to benefits from the German Artists Social Security Fund aka Künstlersozialkasse)
                </p>
                <p>§ 3 COMPANY’s obligations:
                </p>
                <p>(1) The COMPANY will make their best efforts to support ARTIST in carrying out their activities, always providing ARTIST with the required details and information.
                </p>
                <p>(2) The COMPANY will provide login-protected reports containing details on users acquired by ARTIST and registered as users by the COMPANY. The COMPANY will provide settlement information at least semi-annually. Payouts are made automatically once a payable amount of EUR 50.00 (in words: fifty Euros) or more has been reached. Extra payouts can be agreed on individually.
                </p>
                <p>(3) ARTIST will acquire users via the Affiliate Link. If such new users register with and make actual payments for music streams to the COMPANY, ARTIST will be entitled to receive commission payments by the COMPANY. The Parties agree that the decision whether a subscription qualifies in the meaning of below § 4 of this Agreement lies exclusively with the User and the COMPANY.
                </p>
                <p>(4) The COMPANY undertakes to activate (and keep active over the entire contractual term to the best of their abilities) the Affiliate Link for the ARTIST. This being said, ARTIST has no claims towards the COMPANY regarding uninterrupted access to an active Affiliate Link.
                </p>
                <p>§ 4 Commissionable transactions:
                </p>
                <p>(1) ARTIST is entitled to receive commission payments for every new User brokered to the COMPANY via the Affiliate Link as soon as such new User closes a chargeable transaction with the COMPANY concerning the use of the streaming service. The COMPANY will not make advance payments.
                </p>
                <p>§ 5 Commission:
                </p>
                <p>(1) In the first two (2) years of the term of this Agreement, the commission due to ARTIST for all commissionable transactions in the meaning of above § 4 amounts to 10% of the net revenue generated by the User for the COMPANY via the streaming service. In the 3rd year, the commission amounts to 5% of the net revenue generated for the COMPANY via the streaming service. Commission payments are subject to statutory VAT, which will be owed as well.
                </p>
                <p>(2) Commission payments will be calculated based on full revenues excluding VAT according to the respective applicable price list, which will be attached to this Agreement as Appendix 5.2.
                </p>
                <p>(3) The commission amounts and calculation methods specified above can only be modified via written contractual agreements.
                </p>
                <p>§ 6 Loss of entitlement to commission:
                </p>
                <p>(1) The entitlement to commission payments ends if – for any possible reason – the subscription is not valid anymore. It also ends if the User terminates their subscription or does not pay due subscription fees.
                </p>
                <p>§ 7 Commission settlement:
                </p>
                <p>(1) The COMPANY will provide ARTIST with information on due commission payments in the login area within thirty (30) business days after the realization of revenues.
                </p>
                <p>(2) Provision settlements will be created automatically at the end of an accounting month if a minimum amount of EUR 50.00 is due. VAT on payable commission payments will be stated separately.
                </p>
                <p>§ 8 ARTIST’s costs:
                </p>
                <p>ARTIST is not entitled to the reimbursement of costs related to the acquisition of users.
                </p>
                <p>§ 9 Contractual term:
                </p>
                <p>This Agreement enters into effect with its signature or with its conclusion via the COMPANY’s website. Its initial term is one (1) year. The Agreement is automatically renewed for another year unless terminated three (3) months in advance to the end of a term. Both Parties’ right to extraordinary termination in accordance with the relevant statutory provisions remains unaffected. In addition, the COMPANY has the right to terminate this Agreement for substantial reasons.
                </p>
                <p>§ 10 Confidentiality:
                </p>
                <p>(1) Both Parties will treat all trade secrets, including the content of this Agreement as well as other information of the respective other Party labelled as confidential (hereinafter also referred to as “Confidential Information”) confidential, and both Parties accept the non-disclosure agreement linked during the registration process.
                </p>
                <p>§ 11 Applicable law, court of venue:
                </p>
                <p>(1) This Agreement shall be subject to the Laws of the Federal Republic of Germany. UN Sales Law (CISG) shall be excluded.
                </p>
                <p>(2) Any and all disputes arising from or in connection with this Agreement (including such disputes concerning the validity of this Agreement) shall be brought to the courts at the COMPANY’s business domicile.
                </p>
                <p>§ 12 Data protection:
                </p>
                <p>(1) Both Parties will observe all data protection related laws and regulations applicable to them.
                </p>
                <p>(2) If and to the extent the COMPANY engages in order data processing (Auftragsdatenverarbeitung) concerning personal data of ARTIST’s employees during the performance of this Agreement, the Parties will enter into a corresponding data processing agreement in the meaning of Art. 28 DSGVO (GDPR) prior to the beginning of such data processing activities.
                </p>
                <p>§ 13 Final provisions:
                </p>
                <p>(1) Any assignment of rights granted under this Agreement is subject to the prior written consent of the respective other Party.
                </p>
                <p>(2) Any modifications or amendments to this agreement must be in writing in order to be effective, except for when statutory provisions require a stricter form. This provisions also covers changes to this very requirement of writing.
                </p>
                <p>(3) If any of the provisions of this Agreement should be or become partially or entirely invalid or unenforceable, then this shall not affect the validity of the remaining provisions. The Parties undertake to replace any invalid or unenforceable provision with a valid and effective one matching as closely as possible the legal and economic purpose of the original provision in a way they would have done from the beginning had they realized the invalidity or unenforceability of the respective provision. The same holds in the event of gaps in this Agreement.
                </p>
            </section>

             <p class="checkbox">
             <input type="checkbox" id="tfs-checkbox1" name="tfs-checkbox1" required> I have read and agreed to the <a href="#" class="checkbox-link">"terms of service"</a>.</p>

            <p class="checkbox">
              <input type="checkbox" id="tfs-checkbox2" name="tfs-checkbox2" required> I have the right to act on behalf of the above-mentioned artist in business matters.
            </p>
              <div class="form-group">
                <button type="submit" class="signup-btn">Submit</button>
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



    public function extract_artist_active_rokk_address($record)
    {

        $html = "";
        $id = trim($record->artist_id);
        $preferred_rokk_address = trim($record->preferred_rokk_address);
        $preferred_rokk_address = strtolower($record->preferred_rokk_address).'.rokk.app';

        $html .= '
            <div class="das-container das-active-address">

              <p class="band-detail-popup-desc das-info">Copy and paste it to your social networks and start <br>earning Direct Artist Support!</p>

              <input type="type" class="das-input das-preferred-address" name="preferred_rokk_address" id="preferred_rokk_address" value="' . $preferred_rokk_address . '" placeholder="YourBandName" readonly> <span class="copy-preferred-address">Copy</span>
             
          </div>          
            ';


        $response = [
            'html' => $html
        ];


        return $html;
    }




}
