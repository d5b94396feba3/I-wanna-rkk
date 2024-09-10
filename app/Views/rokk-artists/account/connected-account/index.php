<style>

section {
    padding: 50px 0;
    overflow: hidden;
}
.section-header {
    text-align: left;
    padding-bottom: 40px;
}
.section-header h2 {
    margin: -154px 0 0;
    color: rgba(255, 255, 255, .8);
    margin-bottom: 25px;
    font-size: 64px !important;
    font-weight: 500;
    line-height: 77px;
    letter-spacing: .03em;
    text-align: left;
}

@media (max-width:768px) {
    .section-header p{
    font-size: 28px;
    line-height: 32px;
}
}

@media (max-width:968px) {
    .top-artist-header-section {
    height: 295px !important;
}
.top-artist-header-section h2 {
    margin-left: 8px;
    font-size: 50px !important;
}
}

#main {
    background: #111;
    background: linear-gradient(0deg, #111 100%, rgba(0, 0, 0, 0) 27.82%), linear-gradient(0deg, #0b0b0b, #080808);
    width: 94% !important;
    display: block;
    margin: 0 auto;
    z-index: 99999;
    padding-left: 0 !important;
    padding-right: 0 !important;
}

#act-content-placeholder {
    width: 100%;
    height: 100%;
    background: linear-gradient(to right, #282828 47.82%, rgba(17, 17, 17, 0) 100%);
    background-size: 100% 100%, 100% 100%, contain;
    background-position: right center;
    border-radius: 15px;
    color: #FFFFFFCC;
    margin-top: -41px;
    padding: 0;
    margin-bottom: 20px;
    margin-left: -14px;
    transition: background .3s ease, transform .3s ease;
    border: none;
    position: relative;
    overflow: hidden;
    margin-right: 0;
}

.background-masker {
    background-color: #fff;
    position: absolute;
}
@keyframes placeHolderShimmer {
    0% {
    background-position: -800px 0;
    }
    100% {
    background-position: 800px 0;
    }
}
.act-animated-background {
    animation-duration: 2s;
    animation-fill-mode: forwards;
    animation-iteration-count: infinite;
    animation-name: placeHolderShimmer;
    animation-timing-function: linear;
    background: linear-gradient(to right, #151515 47.82%, rgba(17, 17, 17, 0) 100%);
    background-size: 100% 100%, 100% 100%, contain;
    background-position: right center;
    height: 680px;
    border-radius: 1px;
    position: relative;
}

.band-close-icon:hover {
    background: #ff8303;
    font-weight: 700;
    color: #000;
}
.show-result {
    font-size: 25px !important;
    font-weight: 500;
    color: var(--text-color-show-result);
    text-transform: uppercase;
    font-family: 'TitlingGothicFBComp-Medium', sans-serif;
}
.highlight-result {
    color: #cf6c05;
}
.second-highlight-result {
    color: #888;
}
.show-result-country {
    margin-top: -18px !important;
    margin-bottom: 0 !important;
}

/*artist login style*/

.top-artist-header-section {
    margin-top: 37px;
    margin-bottom: -36px;
    padding-top: 220px;
    margin-left: -220px !important;
    padding-bottom: 74px;
    margin-right: -256px !important;
    background: linear-gradient(to right, #282828 47.82%, rgba(17, 17, 17, 0) 100%);
    padding-left: 211px;
}

.top-20-artists-section {
    overflow: hidden !important;
    max-height: 750px !important;
    padding: 6px 0px 0px 0px !important;
    margin-bottom: 40px !important;
}

.act-nav-container {
    width: 200px;
    margin-top: 34px;
}

.navbar-list {
     list-style-type: disc;
    padding: 0;
}

.navbar-item {
    padding: 6px 0px 6px 10px;
    text-align: left;
    cursor: pointer;
    border-radius: 22px;
    margin-top: 5px;
    font-size: 16px;
    width: 207px;
}

.navbar-item:hover{
    background-color: rgba(255,131,3,.6);
    color: #fff !important;
}

.navbar-item:hover > .navbar-item-link{
    color: #fff !important;
}

.menu-active {
    background-color: rgba(255,131,3,.6);
    color: #fff;
    font-weight: 500;
}

.password-toggle {
    position: relative;
    display: block !important;
    margin-left: 0px;
}

.form-group.password-toggle.password-section {
    margin-top: -18px;
    margin-bottom: 20px !important;
    font-weight: 700;
    font-size: 20px;
}

.change-password, .connected-accounts{
    cursor: pointer;
}

.change-password:hover, .connected-accounts:hover{
    color:#fff;
}

.pass-valid-text {
    color: #DFDFDF !important;
    font-size: 11px !important;
    margin-left: 287px;
    margin-top: 21px !important;
}

.form-group.ca-heading {
    font-size: 20px;
    font-weight: 700;
    margin-top: -18px;
}
.artist-popup-left-sidebar {
    position: sticky !important;
    top: 0 !important;
    height: calc(90vh - 20px);
    overflow-y: auto !important;
    z-index: 99 !important;
    background: linear-gradient(to right, #282828 47.82%, rgba(17, 17, 17, 0) 100%);
    margin-top: 52px;
    padding-left: 48px;
}

.artist-popup-right-sidebar {
    height: 1000px;
    overflow-y: auto !important;
    padding-bottom: 30px !important;
    background: linear-gradient(0deg, #111 100%, rgba(0, 0, 0, 0) 27.82%), linear-gradient(0deg, #0b0b0b, #282828);
    margin-top: 53px;
    padding: 10px 44px 10px 30px;
}
label.label-block.act-label-heading {
    font-size: 19px;
    font-weight: 700;
    margin-bottom: 20px;
    width: 97%;
    padding-bottom: 20px;
    border-bottom: 3px solid #ffffff24;
}

.top-artist-header-section {
    margin-top: 37px;
    margin-bottom: -36px;
    padding-top: 220px;
    margin-left: -607px !important;
    padding-bottom: 74px;
    margin-right: -600px !important;
    background: linear-gradient(to right, #282828 47.82%, rgba(17, 17, 17, 0) 100%);
    padding-left: 211px;
}
.section-header h2 {
    margin: -154px 0 0;
    color: rgba(255, 255, 255, .8);
    margin-bottom: 25px;
    font-size: 64px !important;
    font-weight: 500;
    line-height: 77px;
    letter-spacing: .03em;
    text-align: left;
    margin-left: 391px;
}
.section-header p {
    font-size: 13px;
    letter-spacing: 1px;
    font-weight: 500;
    margin: 0;
    color: #fff;
    text-transform: uppercase;
    margin-left: 391px;
}

.main-container {
    padding: 0px 40px 0px 63px;
}

.act-container {
    padding-top: 40px;
}

.act-selected-menu-container {
     margin-top: 0px; 
    margin-left: 36px;
}

</style>



<script type="text/javascript">
  
    var change_password_html='';
    var connected_account_html='';

    $(document).ready(function () {
        // Show the loader initially
        $("#ajax_loader").show();
        // $('body').css('overflow', 'hidden');

        // Create an array of promises for each AJAX request
        const promises = [
            load_artist_account_data_OnPageLoad(),
            // load_connected_accounts_data_OnPageLoad()
        ];

        // Wait for all AJAX requests to complete before hiding the loader
        Promise.all(promises)
            .then(() => {
                $("#ajax_loader").fadeOut("slow");
            })
            .catch((error) => {
                console.log("Error:", error);
            });
    });


  function togglePass(inputId, eyeIconId) {
      var passwordInput = $("#" + inputId);
      var eyeIcon = $("#" + eyeIconId);

      if (passwordInput.attr("type") === "password") {
        passwordInput.attr("type", "text");
        eyeIcon.removeClass("fa-eye-slash").addClass("fa-eye");
      } else {
        passwordInput.attr("type", "password");
        eyeIcon.removeClass("fa-eye").addClass("fa-eye-slash");
      }
    }


    function load_artist_account_data_OnPageLoad() {

        var url = '<?= base_url('Account/ajax_artist_account_data_onPageLoad') ?>';
        
        // Get CSRF token values
        var csrfName ="<?= csrf_token() ?>";
        var csrfValue ="<?= csrf_hash() ?>";

        $.ajax({
            url: url,
            type: 'POST',
            data:{
                [csrfName]:csrfValue
            },
            beforeSend: function (jqXHR) {
                $('#ajax_loader').show();
                 $('.connected-accounts').addClass('menu-active');
                 $('#act-content-placeholder').show(); 
            },
            success: function(response){
                connected_account_html = response;
                $('#ajax_loader').fadeOut("slow");
                $('#act-content-placeholder').hide(); 
                $('.act-selected-menu-container').html(connected_account_html);
            },
            complete: function(data) {
                $('#ajax_loader').fadeOut("slow");
            },
            error: function (error) {
                console.log('Error:', error);
            },
            dataType: 'html'  
        });
    }



    $(document).on('click', '.change-password', function(event){


            var url = '<?= base_url('Account/ajax_change_password_data') ?>';

            if(change_password_html !=''){

                $('.connected-accounts').removeClass('menu-active');
                $('.change-password').addClass('menu-active');
                $('.act-selected-menu-container').empty();
                $('.act-selected-menu-container').html(change_password_html);

            }else{

                $.ajax({
                    url: url,
                    type: 'POST',
                    beforeSend: function (jqXHR) {
                        $('#ajax_loader').show();
                        // $('#top-20-artists-container').html("");
                       $('#act-content-placeholder').show(); 
                       $('.connected-accounts').removeClass('menu-active');
                       $('.change-password').addClass('menu-active');

                    },
                    success: function(response){
                        
                       change_password_html = response;

                        $('#ajax_loader').fadeOut("slow");
                        $('#act-content-placeholder').hide(); 
                        $('.act-selected-menu-container').html(change_password_html);
                    },
                    complete: function(data) {
                        $('#ajax_loader').fadeOut("slow");
                    },
                    error: function (error) {
                        console.log('Error:', error);
                    },
                    dataType: 'html'  
                });
        }
    

    });


    $(document).on('click', '.connected-accounts', function(event){

         $('.connected-accounts').addClass('menu-active');
         $('.change-password').removeClass('menu-active');
         $('.act-selected-menu-container').empty();
         $('.act-selected-menu-container').html(connected_account_html);

    });



</script>

<div class="heading">
   <h2>Connected Account</h2>
   <p class="mb-4">Your connected accounts information is below.</p>
</div>
<div class="main-container">
   <?php
      if(isset($_SESSION['success-msg']))
      { ?>
   <div class="alert alert-success mt-4">
      <?php echo $_SESSION['success-msg'];
         unset($_SESSION['success-msg']);
         ?>
      <span class="alert-close-icon" style="cursor: pointer;">&times;</span>
   </div>
   <?php   }  ?>
   <?php
      if(isset($_SESSION['error-msg']))
      { ?>
   <div class="alert alert-danger">
      <?php echo $_SESSION['error-msg'];
         unset($_SESSION['error-msg']);
         ?>
      <span class="alert-close-icon" style="cursor: pointer;">&times;</span>
   </div>
   <?php   }  ?>
   <div class="row">
      <div class="row top-20-artists-section">
            <div class="col-md-12 col-lg-12 col-sm-12 artist-popup-right-sidebar">
               <div class="row act-container">
                  <div id="act-content-placeholder">
                     <div class="act-animated-background">
                        <div class="background-masker"></div>
                     </div>
                  </div>
                  <div class="act-selected-menu-container"></div>
               </div>
            </div>
      </div>
   </div>
</div>