<style>
#dashboard-footer {
    padding: 15px 38px;
    color: #666666;
    position: static;
    margin-left: 0px;
    border-top: 1px solid #333333;
    transition: margin-left 0.3s ease-in-out;
    margin-bottom: -58px;
}

.footer-content {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.copyright {
  font-size: 14px;
}

.footer-links {
  margin-right: 3px;
}

.footer-links a {
  color: #666666;
  text-decoration: none;
  margin-right: 20px;
  font-size: 14px;
}

.footer-links a:last-child {
  margin-right: 0;
}

.language-selector select {
  background-color: transparent;
  color: #666666;
  border: none;
  font-size: 14px;
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  background-image: url('path-to-your-dropdown-arrow.svg');
  background-repeat: no-repeat;
  background-position: right center;
  padding-right: 20px;
}

.language-selector select option {
  background-color: #111111;
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

/*artist login style*/

.table-responsive {
    width: 100% !important;
    overflow: scroll !important;
    max-width: 1200px !important;
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
    border-radius: 5px;
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
    border-radius: 5px;
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

.data-chart-genre .genre-selected a {
  color: #E66A00 !important;
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

.navbar-item {
    padding: 6px 0px 6px 16px;
    text-align: left;
    cursor: pointer;
    border-radius: 22px;
    margin-top: 5px;
    font-size: 16px;
    width: 270px;
}
.footer-container{
  padding: 1px 45px 0px 45px;
}

.section-header p {
    color: #b6b6b6 !importants;
}

/* mobile responsiveness */

@media (max-width: 768px){
    #dashboard-footer {
        left: 0;
        margin-left: 0px;
        position: absolute;
        bottom: -1372px;
        width: 100%;
    }
    .copyright {
     width: 100%;
     text-align: center;
    }
    .footer-links {
        display: none;
    }
    .main-container{
        margin-top: 43px;
    }
    .main-container {
        padding: 0px 32px 0px 33px !important;
    }
}

</style>


<div class="sidebar-overlay"></div>

  <!-- ======= Footer ======= -->

  <footer id="dashboard-footer">
  <div class="footer-content">
    <div class="copyright">
      © <?php echo date('Y'); ?> ROKK. All Right Reserved.
    </div>
    <div class="footer-links">
      <!-- <a href="#">Legal Disclaimer</a> -->
      <a href="https://rokk-app.com/privacy-policy">Privacy Policy</a>
      <a href="https://rokk-app.com/terms-of-use">Terms of use</a>
    </div>
    <!-- <div class="language-selector">
      <select>
        <option value="de">Germany</option>
      </select>
    </div> -->
  </div>
</footer>


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
  
</div>
</body>
</html>


<script>

//load css and custom select dropdown js


document.addEventListener("DOMContentLoaded", function() {


function loadCSS(e) {
    var t = document.createElement("link");
    (t.type = "text/css"), (t.rel = "stylesheet"), (t.href = e), document.head.appendChild(t);
}
loadCSS("<?php echo base_url("assets/src/vendor/aos/aos.css"); ?>"),
    loadCSS("<?php echo base_url(
        "assets/src/vendor/bootstrap-icons/bootstrap-icons.css"
    ); ?>"),
    loadCSS("<?php echo base_url(
        "assets/src/vendor/remixicon/remixicon.css"
    ); ?>"),
    loadCSS("https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i");
});


</script>
