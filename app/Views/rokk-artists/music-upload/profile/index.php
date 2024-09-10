
  
<style>

section {
    padding: 50px 0;
    overflow: hidden;
}
.section-header {
    text-align: left;
    padding-bottom: 40px;
}
.section-header p {
    font-size: 13px;
    letter-spacing: 1px;
    font-weight: 500;
    margin: 0;
    color: #fff;
    text-transform: uppercase;
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
    .section-header p, .discover-section-header p {
    font-size: 28px;
    line-height: 32px;
    }
}

.top-artist-header-section {
    margin-top: 37px;
    margin-bottom: -36px;
    padding-top: 220px;
    margin-left: -120px;
    padding-bottom: 74px;
    margin-right: -333px;
    background: #282828;
    padding-left: 121px;
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

#mu-content-placeholder {
    width: 100%;
    background: linear-gradient(to right, #282828 47.82%, rgba(17, 17, 17, 0) 100%);
    background-size: 100% 100%, 100% 100%, contain;
    background-position: right center;
    border-radius: 15px;
    color: #FFFFFFCC;
    margin: -47px 0 0 -60px;
    padding: 0;
    transition: background .3s ease, transform .3s ease;
    border: none !important;
    position: relative;
    overflow: hidden;
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

.mu-animated-background {
    animation-duration: 2s;
    animation-fill-mode: forwards;
    animation-iteration-count: infinite;
    animation-name: placeHolderShimmer;
    animation-timing-function: linear;
    background: linear-gradient(to right, #111 47.82%, rgba(17, 17, 17, 0) 100%);
    background-size: 100% 100%, 100% 100%, contain;
    background-position: right center;
    height: 932px;
    border: none !important;
    position: relative;
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

.section-divider {
    margin: 22px -7px -25px;
    border-top: 2px solid rgba(255, 255, 255, .1);
}

/*artist login style*/

.top-artist-header-section {
    margin-top: 37px;
    margin-bottom: -36px;
    padding-top: 220px;
    margin-left: -220px !important;
    padding-bottom: 74px;
    margin-right: -256px !important;
    background: #282828;
    padding-left: 211px;
}

.top-20-artists-section {
    overflow: hidden !important;
    max-height: 1002px !important;
    padding: 10px 0px 0px 8px !important;
    margin-bottom: 46px !important;
}

.track-divider {
    border-bottom: 1px solid #ffd3d32b !important;
    padding: 20px 0px 20px 0px !important;
}

.add-info-btn {
    text-align: left;
    padding-left: 16px !important;
}

.add-info-btn:hover {
    text-align: left;
    padding-left: 16px;
    color:rgba(255,131,3,.6) !important;
}

#ajax-save-track-popup {
    display: none;
    position: fixed;
    top: 40% !important;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #181818;
    box-shadow: 0px 10px 50px 10px rgba(0, 0, 0, 0.5) !important;
    width: 800px;
    height: 322px;
    z-index: 1005;
    border: 4px solid #353535;
    padding: 50px 50px 50px 50px;
    border-radius: 15px;
}

#header-track-popup {
    position: sticky;
    margin-bottom: 35px;
}
#closeTrackBtn {
    position: absolute;
    top: -14px;
    right: 12px;
    color: rgba(255,131,3,.6);
    font-size: 45px;
    cursor: pointer;
} 

#closeTrackBtn:hover {
 color:#fff;
}

#header-track-popup {
    position: sticky;
    margin-bottom: -30px;
}
#closeTrackBtn {
    position: absolute;
    top: -14px;
    right: 12px;
    color: rgba(255,131,3,.6);
    font-size: 45px;
    cursor: pointer;
} 

#closeTrackBtn:hover {
 color:#fff;
}

.artist-popup-left-sidebar {
    position: sticky !important;
    margin-top: 52px !important;
    height: 100%;
    overflow-y: auto !important;
    z-index: 99 !important;
    background: #282828;
    padding-left: 48px;
}

/*artist login style*/

.top-artist-header-section {
    margin-top: 37px;
    margin-bottom: -36px;
    padding-top: 220px;
    margin-left: -220px !important;
    padding-bottom: 74px;
    margin-right: -256px !important;
    background: #282828;
    padding-left: 211px;
}

.mu-nav-container {
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
    width: 160px;
}

.navbar-item:hover{
    background-color: rgba(255,131,3,.6);
    color: #fff !important;
}

.navbar-item:hover > .navbar-item-link{
    color: #fff !important;
}

.menu-active{
     background-color: rgba(255,131,3,.6);
     color: #fff;
     font-weight: 500;
}

form.artist-uform.update-password-form {
    margin-top: 60px !important;
    width: 100% !important;
}

.dynamic-track-container {
    overflow-x: hidden;
}

.mu-right-sidebar {
    overflow-y: auto;
    background: linear-gradient(0deg, #111 100%, rgba(0, 0, 0, 0) 27.82%), linear-gradient(0deg, #0b0b0b, #282828);
    margin-top: 53px;
    padding: 10px 48px 30px 80px;
    height: 1000px !important;
    overflow-x: hidden;
}

#ui-datepicker-div{
    position: absolute;
    top: 918.5px;
    left: 842.391px;
    z-index: 99 !important;
    display: block;
}

.num_track{
    padding: 10px !important;
}


.progress-bar {
    position: relative;
    height: 20px;
    background-color: #f0f0f0;
    border-radius: 4px;
    margin-top: 0px;
    width: 96.3%;
}

.progress-bar-inner {
    height: 100%;
    width: 0;
    background-color: #4caf50; 
    border-radius: 4px;
}

.track-container {
    height: 805px;
    overflow-y: auto;
}

.top-artist-header-section {
    margin-top: 37px;
    margin-bottom: -36px;
    padding-top: 220px;
    margin-left: -607px !important;
    padding-bottom: 74px;
    margin-right: -600px !important;
    background: #282828;
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


#fileInputContainer {
    position: relative;
    display: block;
    cursor: pointer;
    width: 97%;
    border: 2px dashed #ffffff24;
    padding: 14px;
    text-align: center;
    margin-top: 20px; 
    margin-bottom: 10px;
}
#fileInputContainer p{
    color: #ffffff87;
    padding-top: 5px;
}
#image_link {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    cursor: pointer;
}

#preview {
    padding: 4px 0px 8px 0px;
}

#preview img{
    width: 100px !important;
}

/*Track section*/

#fileInputTrackContainer {
    position: relative;
    display: block;
    cursor: pointer;
    width: 67%;
    border: 2px dashed #ffffff24;
    padding: 14px;
    text-align: center;
    margin-top: 24px; 
    margin-bottom: 10px;
}

#fileInputTrackContainer p {
    color: #ffffff87;
    padding-top: 0px;
}

#fileInputTrackContainer input{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    cursor: pointer;
}
#fileInputTrackContainer:hover {
    opacity: 0.7;
}

.popup-about-container {
    padding-top: 32px;
}

div#popup-save-track-content {
    padding-top: 50px;
}
.pre-info {
    padding-top: 0px !important;
    margin-bottom: 8px;
}

p.supported-file {
    margin-bottom: 8px;
    font-size: 11px;
    color: #ffffffb0 !important;
    margin-top: -8px;
}

img#upload-file {
    opacity: 0.6;
    margin: 6px 0px 12px 0px;
}

label.label-block.track-rank {
    font-weight: 800;
    margin: 10px 0px 30px 0px;
}

.main-container {
    padding: 0px 49px 0px 41px;
}

.mu-container {
    padding-top: 40px;
}

</style>



<script type="text/javascript">
  
        // global variables
        var hiddenArtistId = ''; 
        var artistName = "<?php echo $_SESSION['username']?>";
        var menu_active = "";
        var trackTitle = '';
        var features = '';
        var composer = '';
        var lyricist = '';
        var isrcCode = '';
        var explicit = '';
        var num_of_track='';
        var id='';
        var profile_details_html='';
        var create_release_html='';
        var add_track_html='';


    $(document).ready(function () {
        // Show the loader initially
        $("#ajax_loader").show(); 

        // Creating an array of promises for each AJAX request
        const promises = [
            load_artist_profile_data_OnPageLoad(),
        ];

        // Wait for all AJAX requests to complete before hiding the loader
        Promise.all(promises)
            .then(() => {
                $("#ajax_loader").fadeOut("slow");
                $('#bottom-banner .carousel-indicators').show();            
            })
            .catch((error) => {
                console.log("Error:", error);
            });


         // datepicker for the release date

        $(document).on('click', '#release_date', function (event) {

            // Check if the datepicker is already initialized
            if (!$("#release_date").hasClass("datepicker-initialized")) {

                // Initialize the Datepicker
                $("#release_date").datepicker();

                // adding datepicker class
                $("#release_date").addClass("datepicker-initialized");
            }

            // Open the datepicker
            $("#release_date").datepicker("show");
        });

    });


    // Function to disable body scrolling
    function disableBodyScroll() {
        $('body').css('overflow', 'hidden');
    }

    // Function to enable body scrolling
    function enableBodyScroll() {
        $('body').css('overflow', 'auto');
    }

    function load_artist_profile_data_OnPageLoad() {
        load_artist_profile_data();        
    }



    function load_artist_profile_data() {


        var url = '<?= base_url('MusicUpload/ajax_music_upload_data_onPageLoad') ?>';

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
                // $('#ajax_loader').show();
                $("#ajax_loader").show(); 
                $('.profile-details-btn').addClass('menu-active');

            },
            success: function(response){
                
                var html = response;
                profile_details_html=html;
                $('#ajax_loader').fadeOut("slow");
                $('#mu-content-placeholder').hide(); 
                $('.mu-selected-menu-container').html(profile_details_html);

            },
            complete: function(data) {
                $('#ajax_loader').fadeOut("slow");
            },
            error: function (error) {
                console.log('Error:', error);
            },
            dataType: 'text'  
        });
    }




    $(document).on('click', '.profile-details-btn', function(event){

         $('.profile-details-btn').addClass('menu-active');

         $('.create-release-btn').removeClass('menu-active');
         $('.add-track-btn').removeClass('menu-active');

         $('.mu-selected-menu-container').empty();
         $('.mu-selected-menu-container').html(profile_details_html);

    });   



function changeFormButtonText(form_id) {

    var buttonSelector = form_id + ' button';
    var button = $(buttonSelector);

    // Save the original button text
    button.data('original-text', button.text());

    // Change the button text
    button.text("Submitting...");

}


function resetFormButtonText(form_id) {
    var buttonSelector = form_id + ' button';
    var button = $(buttonSelector);

    var originalText = button.data('original-text');

    if (originalText !== undefined && originalText !== null) {
        button.text(originalText);
    } else {
        console.warn('Data attribute "data-original-text" not set on the button.');
    }
}


</script>


<script>
    $(document).ready(function () {


        $(document).on('submit', '#profileForm', function (event) {
            event.preventDefault();
            
            if (confirm('Are you sure you want to update?')) {
                showProgressBar('#profileForm');
                submitProfileFormWithAjax();
            }
            
            return false;
        });


        function submitProfileFormWithAjax() {
            var form = $('#profileForm')[0];
            var formData = new FormData(form);
            var result='';
            var form_id='#profileForm';

            $.ajax({
                url: form.action,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function (jqXHR) {
                    $("#ajax_loader").show(); 
                    changeFormButtonText(form_id)
                },
                xhr: function () {
                    var xhr = new XMLHttpRequest();
                    xhr.upload.addEventListener('progress', function (event) {
                        if (event.lengthComputable) {
                            var percentComplete = (event.loaded / event.total) * 100;
                            updateProgressBar(percentComplete);
                        }
                    }, false);
                    return xhr;
                },
                success: function (response) {
                    hideProgressBar();
                    if (response.success) {
                        result=response.message
                        showSuccessMsg(form_id,result);
                    } else {
                        result=response.message
                        showErrorMsg(form_id,result);
                    }
                    // location.reload(true);
                },
                complete: function () {
                    resetFormButtonText(form_id)
                    $("#ajax_loader").hide(); 
                },
                error: function (xhr, status, error) {
                    console.error(error);
                    showErrorMsg(form_id,error);
                    hideProgressBar();
                },
                dataType:'json'
            });
        }
        
    });
</script>

<div class="heading">
   <h2>Profile</h2>
   <p class="mb-4">Your music profile data showing below</p>
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
   <div class="row top-20-artists-section">
      <div class="col-md-12 col-lg-12 col-sm-12 artist-popup-right-sidebar-dis mu-right-sidebar">
         <div class="row mu-container">
            <div id="mu-content-placeholder">
               <div class="mu-animated-background">
                  <div class="background-masker"></div>
               </div>
            </div>
            <div class="mu-selected-menu-container"></div>
         </div>
      </div>
   </div>
</div>


