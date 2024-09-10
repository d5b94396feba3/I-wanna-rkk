<style>

#footer {
/*    background: #111;*/
    background: linear-gradient(0deg, #111 100%, rgba(0, 0, 0, 0) 27.82%), linear-gradient(0deg, #0b0b0b, #282828);
    color: rgba(255, 255, 255, .7);
    font-size: 14px;
    bottom: 0;
    margin-left: 322px;
}
#footer .footer-top {
    position: relative;
    z-index: 2;
    text-align: center;
    padding: 46px 0;
    padding-top: 45px !important;
}
.footer-top-divider {
    border-top: 1px solid rgba(255, 255, 255, .1);
}
#footer .footer-top h3 {
    font-size: 36px;
    font-weight: 700;
    color: #5f687b;
    position: relative;
    font-family: "Poppins", sans-serif;
    padding-bottom: 0;
    margin-bottom: 0;
}
#footer .hline {
    border-bottom: 1px solid rgba(255, 255, 255, .1);
}
#footer .footer-top p {
    margin: 0;
    padding: 0;
    line-height: 28.8px;
    font-size: 15px !important;
    text-align: justify;
    color: rgb(255 255 255 / 57%);
    font-weight: 300;
    line-height: 29px;
    letter-spacing: -.02em;
    text-align: left;
}
#footer .footer-top span {
    font-weight: 500;
}
#footer .footer-logo {
    margin-left: 0;
    padding-left: 33px;
}
#footer .footer-logo img {
    float: left;
    margin-left: 10px;
    padding-left: 0;
    width: 124px;
}
#footer .footer-top .social-links {
    margin-top: 0;
    float: right !important;
    padding-right: 27px;
}

#footer .footer-top .social-links a {
    font-size: 16px;
    display: inline-block;
    background: rgba(255, 255, 255, .1);
    color: rgba(255, 131, 3, 1);
    line-height: 1;
    padding: 10px 8px;
    margin-right: 12px;
    border-radius: 25px;
    text-align: center;
    width: 36px;
    height: 36px;
    transition: .3s;
}
#footer .footer-top .social-links a:nth-child(4) {
    margin-right: 3px;
}
#footer .footer-top .social-links a:hover {
    background: rgba(255, 131, 3, 1);
    color: #fff;
    text-decoration: none;
}
#footer .footer-bottom {
    border-top: 1px solid rgba(255, 255, 255, .1);
    z-index: 2;
    position: relative;
    padding-top: 20px;
    padding-bottom: 22px;
}
#footer .copyright {
    float: left;
    color: rgb(255 255 255 / 57%);
    font-size: 15px;
}
#footer .footer-right-link {
    float: right;
    font-size: 15px;
    color: rgb(255 255 255 / 57%);
}
#footer .footer-right-link a {
    color: rgb(255 255 255 / 57%);
    margin-right: 45px;
}
#footer .footer-right-link a:hover {
    color: rgba(255, 255, 255, .9);
}
#footer a.right-link-end {
    margin-right: 0;
}
#footer .footer-left-link {
    float: left;
    font-size: 15px;
    color: rgba(255, 255, 255, .7);
}
#footer .footer-left-link a {
    color: rgba(255, 255, 255, .7);
    margin-right: 45px;
    font-size: 15px;
}
#footer .footer-left-link a:hover {
    color: rgba(255, 255, 255, .9);
}
#footer a.right-left-end {
    margin-right: 0;
}
@media (max-width:992px) {
    #footer .copyright, #footer .footer-right-link {
    float: left;
    text-align: left;
    margin-left: 0;
    padding-left: 0;
    line-height: 38px;
}
#footer .footer-right-link {
    margin-right: 5px;
}
#footer .footer-top .social-links {
    margin-top: -3px !important;
}
#footer .footer-right-link {
    margin-right: 21px;
    float: right !important;
}
}@media (max-width:891px) {
    #footer .footer-logo img {
    margin-left: 10px;
    width: 90px;
}
#footer .footer-left-link a {
    margin-right: 21px;
}
#footer .footer-right-link a {
    margin-right: 21px;
}
#footer .footer-right-link {
    margin-right: 21px;
    float: left !important;
}

}


#ajax_loader {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 96%;
    height: 100%;
    opacity: 1;
    z-index: 999999;
    background: #08080838;
}

#ajax_loader .svg-inline--fa.fa-w-16 {
    width: 79em;
    color: #fff;
    height: 25px;
    margin-top: 13%;
    display: flex;
    margin: 13% auto;
}

.au_junc_table {
    margin-top: 28px;
    background: #1d1d1d;
    border-radius: 14px;
    margin-left: 0;
    width: 100% !important;
    overflow-x: auto !important;
}
.au_junc_table tbody{
    padding-bottom: 20px;
}

.au_junc_table thead tr {
    position: sticky !important;
    top: 0 !important;
    z-index: 99 !important;
}
.au_junc_table thead tr {
    background: #181818;
}
.au_junc_table::-webkit-scrollbar{
    height: 4px !important;
    width: 14px !important;
    cursor: pointer !important;
}

.au_junc_table thead tr .gc-tb-tle {
    padding: 10px 10px 10px 32px;
    font-size: 13px !important;
    font-weight: 400;
    color: #ffffffb0;
}
.au_junc_table tbody tr td {
    padding: 7px 15px 7px 32px;
    font-size: 15px !important;
}
.gc-tb-title-header {
    margin-bottom: 9px !important;
}
.au_junc_table a {
    color: rgba(255, 255, 255, .7) !important;
    text-decoration: none;
}
.au_junc_table a:hover {
    color: #fff !important;
    text-decoration: none;
}
.au_junc_table tbody tr:hover{
    background: #333333;
    transition: background .3s ease, transform .3s ease;
}
.au_junc_table tbody tr:hover>td{
  color:#fff;
}
.au_junc_table tbody tr:hover a {
  color: #fff !important;
}
.data-chart-genre .genre-selected a {
  color: #E66A00 !important;
}


/*global scrollbar style*/
::-webkit-scrollbar {
    height: 8px !important;
    width: 10px !important;
    cursor: pointer !important;
}
::-webkit-scrollbar-thumb:hover {
    background: #868383  !important;
}
::-webkit-scrollbar-track {
    background: #0c090a !important;
}
::-webkit-scrollbar-thumb {
    background: #555 !important;
    border-radius: 10px !important;
}

/*global countries and genres page*/

@media (max-width:991px) {

    .section-header p, .discover-section-header p {
        font-size: 28px;
        line-height: 35px !important;
        padding-left: 12px;
        padding-right: 300px;
    }
    .row.mt-5.cg-hsec{
        overflow-x: auto !important;
        overflow-y: hidden !important;
    }
    #top-20-artists-container {
        width: 460px !important;
        overflow-x: auto !important;
    }

}

.hero-sign-out {
    height: 100% !important;
    padding-top: 132px;
    margin-bottom: 32px;
}

/*artist login style*/

.table-responsive {
    width: 100% !important;
    overflow: scroll !important;
    max-width: 1200px !important;
}

.au_junc_table {
    width: 100% !important;
}

.gc-tb-tle {
    max-width: 120px !important;
    overflow: hidden !important;
    text-overflow: ellipsis !important;
    white-space: nowrap !important;
}

 .gc-page-tb thead th {
    position: sticky !important;
    top: 0 !important;
    z-index: 999999 !important;
}

.gc-page-tb thead tr th{
 padding-left: 10px !important;
text-align: left !important;
width: 100% !important;
}

.gc-page-tb tbody tr td{
 padding-left: 10px !important;
text-align: left !important;
width: 100% !important;

}

.gc-page-tb thead tr th:nth-child(1){
    padding-left: 40px !important;
    text-align: left !important;
}

.gc-page-tb tbody tr td:nth-child(1){
    padding-left: 40px !important;
    text-align: left !important;
}


.gc-page-tb thead tr th:nth-child(3) {
    padding-left: 0px !important;
    text-align: left !important;
}

.gc-page-tb tbody tr td:nth-child(3) {
    padding-left: 0px !important;
    text-align: left !important;
}

#popup-content {
    padding: 43px 43px !important;
}

.gc-page-tb tbody tr td {
    padding: 7px 15px 7px 32px;
    font-size: 13px !important;
}

.artist-popup-input {
    width: 67% !important;
    margin-left: 0px;
    padding-left: 8px;
    background: #282828 !important;
    color: #fff !important;
    border: none !important;
    padding-top: 10px !important;
    padding-bottom: 10px;
    margin-top: 10px;
    margin-bottom: 10px;
}

.artist-popup-selectbox {
    width: 100% !important;
    margin-left: 0px;
    padding-left: 8px;
    background: #282828 !important;
    color: #fff;
    border: none !important;
    padding-top: 10px !important;
    padding-bottom: 10px;
    margin-top: 10px;
    margin-bottom: 10px;
    cursor: pointer;
}

#band-popup-wrapper .popup-about-container {
    background: rgb(255 255 255/4%);
    padding: 46px 155px 46px !important;
    border-radius: 15px;
}

.artist-uform .signup-btn, .artist-uform .signup-btn:focus {
    background: rgba(255,131,3,.6);
    padding: 8px 20px;
    /* margin-left: 18px; */
    border-radius: 50px;
    color: #fff;
    font-family: Poppins;
    font-size: 14px;
    font-weight: 500;
    line-height: 21px;
    letter-spacing: -.02em;
    text-align: left;
    border: none;
    margin-top: 24px;
    margin-bottom: 52px;
}

.signup-btn:hover{
    background: rgba(255, 255, 255, .8) !important;
    color: #282822 !important;
}

.artist-uform .signup-btn:hover{
    background: rgba(255, 255, 255, .8) !important;
    color: #282822 !important;
}

.track-next-btn{
    background: rgba(255,131,3,.6);
    padding: 8px 20px;
    /* margin-left: 18px; */
    border-radius: 50px;
    color: #fff;
    font-family: Poppins;
    font-size: 14px;
    font-weight: 500;
    line-height: 21px;
    letter-spacing: -.02em;
    text-align: left;
    border: none;
    margin-top: 24px;
    margin-bottom: 52px;
    cursor: pointer;
}

.track-next-btn:hover{
    background: rgba(255, 255, 255, .8) !important;
    color: #282822 !important;
}

.alert-success {
    width: 40%;
    display: flex;
    margin: 0 auto;
    justify-content: center;
    align-items: center;
    color: #155724 !important;
    background-color: #d4edda;
    border-color: #282828 !important;
    border: 1px solid #c3e6cb;
}
.ajax-alert-success {
    width: 30%;
    position: fixed;
    top: 40% !important;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #155724 !important;
    background-color: #d4edda;
    height: auto;
    z-index: 1005;
    border: 4px solid #c3e6cb;
    border-radius: 5px;
    text-align: center;
}

span.alert-close-icon {
    top: 9px;
    position: absolute;
    right: 20px;
    font-size: 25px;
    color: #155724;
}

span.alert-close-icon:hover {
    color: #282828;
}

span.ajax-alert-close-icon {
    top: 9px;
    position: absolute;
    right: 20px;
    font-size: 25px;
    color: #155724;
}

span.ajax-alert-close-icon:hover {
    color: #282828;
}

.artist-popup-header {
    font-size: 18px !important;
    font-weight: 700 !important;
    text-transform: uppercase;
    color: #e66a00;
    margin-top: -15px;
    margin-bottom: -6px;
}

.popup-top-header span.band-close-icon, .party-close-icon {
    margin-top: 26px;
    margin-right: 62px;
    z-index: 99999999 !important;
}

.status-requested {
    color: #FFA500 !important;
}

.status-active {
    color: #228B22 !important;
}

.status-inactive {
    color: #ADD8E6 !important;
}

.status-partner-request {
    color: #e67e22 !important;
}

.status-partner {
    color: #9b59b6 !important;
}

select{
    color: #fff;
    opacity: 0.95;
}


.navbar .signin-btn, .navbar .signin-btn:focus {
    background: rgba(255,131,3,.6);
    padding: 8px 20px;
    margin-left: 18px;
    border-radius: 50px;
    color: #fff;
    font-family: Poppins;
    font-size: 14px;
    font-weight: 500;
    line-height: 21px;
    letter-spacing: -.02em;
    text-align: left;
    margin-left: 385px !important;
}


.form-group {
    margin-bottom: 0px;
    display: flex !important;
}
.label-block {
    display: block;
    margin-top: 20px;
    width: 30%;
    font-size: 15px;
}
.input-field {
    width: 68%;
    box-sizing: border-box;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 15px;
    color: #fff !important;
}

button.account-btn {
    background: transparent;
    border: none;
    color: #e66a00;
}

button.account-dte-btn{
    background: transparent;
    border: none;
    color: #e66a00;
    margin-top: 22px;
}

button.account-btn:hover, a.account-btn:hover, button.account-dte-btn:hover{
    color: #fff !important;
}

.artist-uform .pass-btn, .artist-uform .pass-btn-btn:focus {
    background: rgba(255,131,3,.6);
    padding: 8px 20px;
    margin-left: 0px;
    border-radius: 50px;
    color: #fff;
    font-family: Poppins;
    font-size: 14px;
    font-weight: 500;
    line-height: 21px;
    letter-spacing: -.02em;
    text-align: left;
    border: none;
    margin-top: 5px;
    margin-bottom: 3px;
}

.artist-uform .pass-btn:hover{
    background: rgba(255, 255, 255, .8) !important;
    color: #282822 !important;
}

.alert-danger {
    color: #842029;
    background-color: #f8d7da;
    border-color: #f5c2c7;
    width: 50%;
    margin: 0 auto;
    text-align: center;
    margin-bottom: 20px;

}

.ajax-alert-danger {
    width: 30%;
    position: fixed;
    top: 40% !important;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #842029 !important;
    background-color: #f8d7da;
    height: auto;
    z-index: 1005;
    border: 4px solid #f5c2c7;
    border-radius: 5px;
    text-align: center;
}

.au_junc_table {
    margin-top: 28px;
    background: #1d1d1d;
    border-radius: 14px;
    margin-left: 0;
    width: 95% !important;
    overflow-x: auto !important;
    border: 1px solid #ffffff0d;
}
.au_junc_table tbody{
    padding-bottom: 20px;
}

.au_junc_table thead tr {
    position: sticky !important;
    top: 0 !important;
    z-index: 99 !important;
}
.au_junc_table thead tr {
    background: #181818;
}
.au_junc_table::-webkit-scrollbar{
    height: 4px !important;
    width: 14px !important;
}

.au_junc_table thead tr .gc-tb-tle {
    padding: 10px 10px 10px 32px;
    font-size: 13px !important;
    font-weight: 400;
    color: #ffffffb0;
}
.au_junc_table tbody tr td {
    padding: 7px 15px 7px 32px;
    font-size: 13px !important;
}
.gc-tb-title-header {
    margin-bottom: 9px !important;
}
.au_junc_table a {
    color: rgba(255, 255, 255, .7) !important;
    text-decoration: none;
}
.au_junc_table a:hover {
    color: #fff !important;
    text-decoration: none;
}
.au_junc_table tbody tr:hover{
    background: #333333;
    transition: background .3s ease, transform .3s ease;
}
.au_junc_table tbody tr:hover>td{
  color:#fff;
}
.au_junc_table tbody tr:hover a {
  color: #fff !important;
}
.data-chart-genre .genre-selected a {
  color: #E66A00 !important;
}

.au_junc_container {
    width: 100%;
}

p.connected-account-tle {
    font-size: 15px;
    margin: 3px 0px -10px 0px;
}


.pass-input-field {
    width: 70%;
    box-sizing: border-box;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 16px !important;
    color: #fff !important;
}
label.label-block.mu-label-heading {
    font-size: 19px;
    font-weight: 700;
    margin-bottom: 20px;
    /* background: red; */
    width: 97%;
    padding-bottom: 20px;
    border-bottom: 3px solid #ffffff24;
}
label.radio-inline {
    margin-top: 22px;
    margin-right: 16px;
}

input#release_date {
    cursor: pointer;
}

.copyright-select:selected{
  color: #fff !important;
}

.track-popup-input {
    width: 100% !important;
    background: #1b1a1a !important;
}
.track-left-sidebar {
    position: sticky !important;
    top: 0 !important;
    height: 794px !important;
    overflow-y: hidden !important;
    z-index: 19999 !important;
    padding-left: 28px !important;
    padding-right: 28px !important;
}
.track-select {
    width: 100% !important;
    margin-left: 0px;
    padding-left: 8px;
    background: #1b1a1a !important;
    color: #fff;
    border: none !important;
    padding-top: 10px !important;
    padding-bottom: 10px;
    margin-top: 10px;
    margin-bottom: 10px;
    cursor: pointer;
}

.popup-track-content p{
    font-size: 16px !important;
}

.navbar-list {
    list-style-type: none !important;
    padding: 0;
}
.navbar-item {
    padding: 6px 0px 6px 16px;
    text-align: left;
    cursor: pointer;
    border-radius: 22px;
    margin-top: 5px;
    font-size: 16px;
    width: 270px;
}
.artist-popup-left-sidebar {
    position: sticky !important;
    margin-top: 52px !important;
    height: 100%;
    overflow-y: auto !important;
    z-index: 99 !important;
    background: linear-gradient(0deg, #111 100%, rgba(0, 0, 0, 0) 27.82%), linear-gradient(0deg, #0b0b0b, #080808);
    padding-left: 35px;
}

.menu-active {
    background-color: transparent !important;
    color: #fff !important;
    font-weight: 500 !important;
}

.dasboard {
    padding: 0px 24px 10px 64px;
}


.footer-container{
  padding: 1px 45px 0px 45px;
}

.section-header p {
    color: #b6b6b6 !importants;
}

</style>



<script>


$(document).ready(function() {

    $(".alert-close-icon").on("click", function(){
        $(this).parent().fadeOut();
    });

});


$(document).on('click', '.checkbox-link', function(event){
        event.preventDefault();
        $(".termsofsevice-txtarea").css('border', '2px solid #e66a00');
    });

$(document).on('click', '.ajax-alert-close-icon', function(event){
         $(this).parent().fadeOut();
    });


// function showProgressBar(formID) {
//     console.log('showProgressBar');
//     $(formID).append('<div id="progressBar" class="progress-bar"><div class="progress-bar-inner"></div></div>');
// }

// function updateProgressBar(percentComplete) {
//     // Update the width of the progress bar inner div
//     // console.log('updateProgressBar', percentComplete);
//     $('#progressBar .progress-bar-inner').css('width', percentComplete + '%');
//     $('#progressBar .progress-bar-inner').html(parseInt(percentComplete)+ '%');
// }

function showSuccessMsg(formID,msg) {
    console.log('showSuccessMsg');

    $(formID)
    .append(`<div class="alert ajax-alert-success mt-4" style="display:none;">${msg}
                <span class="ajax-alert-close-icon" style="cursor: pointer;">&times;</span>
             </div>`)
    .find('.alert')
    .fadeIn(500);


    // close after 5 seconds
    setTimeout(function() {
        $('.ajax-alert-success').fadeOut(500, function() {
            $(this).remove();
        });

    }, 4500);

}

function showErrorMsg(formID,msg) {
    console.log('showSuccessMsg');

    $(formID)
    .append(`<div class="alert ajax-alert-danger mt-4">${msg}
    <span class="ajax-alert-close-icon" style="cursor: pointer;">&times;</span>
    </div>`)
    .find('.alert')
    .fadeIn(500);

    // close after 5 seconds
    setTimeout(function() {
         $('.ajax-alert-danger').fadeOut(500, function() {
                $(this).remove();
            });

    }, 4500);

}

// function hideProgressBar() {
//     // Remove the progress bar from the form
//     $('#progressBar').remove();
// }


</script>

</div>


  <!-- ======= Footer ======= -->

  <footer id="footer">

    <div class="footer-top">

      <div class="footer-container">

          <div class="col-lg-12">
          <p>
            <span>Legal disclaimer</span>: The information contained in this website is for general information purposes only. The information is provided by FAIRMUSIC GmbH and while we endeavour to keep the information up to date and correct, we make no representations or warranties of any kind, express or implied, about the completeness, accuracy, reliability, suitability or availability with respect to the website or the information, products, services, or related graphics contained on the website for any purpose. Any reliance you place on such information is therefore strictly at your own risk.
            In no event will we be liable for any loss or damage including without limitation, indirect or consequential loss or damage, or any loss or damage whatsoever arising from loss of data or profits arising out of, or in connection with, the use of this website.
            Through this website you are able to link to other websites which are not under the control of FAIRMUSIC GmbH. We have no control over the nature, content and availability of those sites. The inclusion of any links does not necessarily imply a recommendation or endorse the views expressed within them.
            Every effort is made to keep the website up and running smoothly. However, FAIRMUSIC GmbH takes no responsibility for, and will not be liable for, the website being temporarily unavailable due to technical issues beyond our control.
          </p>
          </div>

      </div>
    </div>

    <div class="footer-container footer-bottom clearfix">
      <div class="copyright order-sm-last">
        &copy; 2024 ROKK. All Rights Reserved.
      </div>
      <div class="footer-right-link order-sm-first">
        <a href="#">Privacy Policy</a>
        <a href="#" class="right-link-end">Terms of use</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <!-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->

  <div id="ajax_loader">
      <i class="fa fa-spinner fa-spin"></i>
  </div>

  <script src="<?php echo base_url(
      "assets/src/new/vendor/aos/aos.js"
  ); ?>"></script>
  <script src="<?php echo base_url(
      "assets/src/new/vendor/bootstrap/js/bootstrap.bundle.min.js"
  ); ?>"></script>
  <script async defer src="<?php echo base_url(
      "assets/src/new/js/main.js"
  ); ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</body>
</html>


<script>

//load css and custom select dropdown js


document.addEventListener("DOMContentLoaded", function() {


function loadCSS(e) {
    var t = document.createElement("link");
    (t.type = "text/css"), (t.rel = "stylesheet"), (t.href = e), document.head.appendChild(t);
}
loadCSS("<?php echo base_url("assets/src/new/vendor/aos/aos.css"); ?>"),
    loadCSS("<?php echo base_url(
        "assets/src/new/vendor/bootstrap-icons/bootstrap-icons.css"
    ); ?>"),
    loadCSS("<?php echo base_url(
        "assets/src/new/vendor/remixicon/remixicon.css"
    ); ?>"),
    loadCSS("https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i");
});


</script>
