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
    margin: 10px 0 0 -60px;
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
    height: 765px;
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
    height: 100% !important;
    padding: 6px 0px 0px 8px !important;
    margin-bottom: 40px !important;
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
    overflow-y: hidden !important;
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
#uploadProgressBar {
    position: relative;
    height: 20px;
    background-color: #f0f0f0 !important;
    border-radius: 25px;
    width: 95.6%;
    padding: 0px 0px;
    display: none;
    text-align: center;
    margin:-12px 0px 79px 2px !important;
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
    color: rgb(255 131 3 / 79%);
}

.main-container {
    padding: 0px 49px 0px 41px;
}

.mu-container {
    padding-top: 40px;
}

.add-track-section{
    display: none;
}


.next-btn, .next-btn:focus{
    background: rgba(255, 131, 3, .6);
    padding: 8px 20px;
    margin-right: 40px !important;
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

.cr-btn{
   margin-right: 40px !important;
}
.next-btn:hover{
    background: rgba(255, 255, 255, .8) !important;
    color: #282822 !important;
}


.prev-btn, .prev-btn:focus{
    background: lightgray;
    padding: 8px 20px;
    margin-right: 40px !important;
    border-radius: 50px;
    color: #282822;
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

.prev-btn:hover{
    background: rgba(255, 131, 3, .6); !important;
    color: #fff !important;
}

.release-form-bottom {
  display: flex !important;
  justify-content: space-between !important;
}

.form-next-sec {
  display: flex !important;
  justify-content: flex-start !important;
}


.step-label-block {
  display: block;
  font-weight: bold;
  margin-bottom: 10px;
}

.first-step::before {
  content: "1";
  display: inline-block;
  width: 20px;
  height: 20px;
  margin-right: 10px;
  border-radius: 50%;
  background-color: #ccc;
  color: white;
  text-align: center;
  line-height: 20px;
}

.second-step::before {
  content: "2";
  display: inline-block;
  width: 20px;
  height: 20px;
  margin-right: 10px;
  border-radius: 50%;
  background-color: #ccc;
  color: white;
  text-align: center;
  line-height: 20px;
}

.first-step.active::before {
  background-color: rgb(255 131 3 / 79%);
}

.second-step.active::before {
  background-color: rgb(255 131 3 / 79%);
}

.steps-container {
    display: flex;
    justify-content: space-evenly;
}

#stepsProgressBar {
    position: relative;
    height: 15px;
    background-color: #f0f0f0;
    border-radius: 25px;
    width: 95%;
    margin: 25px 0px 25px 12px;
    padding: 0px 0px;
}

#stepsProgressBar .progress-bar-inner {
    height: 100%;
    width: 0;
    background-color:rgb(255 131 3 / 79%);
    border-radius: 25px;
    padding:0px 0px;
    margin:0px 0px;
}

.error-input-msg {
    text-align: left;
    color: #FF0000;
    margin: -33px 0px 23px 0px;
    font-size: 13px;
    background: #c5bfbf;
    padding: 10px 10px;
    font-weight: 600;
}

.error-border{
  color: red !important;
}

.file-error-border{
    border: 2px solid red !important;
}

.track-save-btn{
    background: rgba(255,131,3,.6);
    padding: 8px 20px;
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

.track-save-btn:hover{
    background: rgba(255, 255, 255, .8) !important;
    color: #282822 !important;
}

.no-fillout-track-btn {
    background: transparent;
    margin-left: 18px;
    border-radius: 50px;
    color: #d3d3d3;
    font-family: Poppins;
    font-size: 14px;
    font-weight: 500;
    line-height: 21px;
    letter-spacing: -.02em;
    text-align: left;
    border: none;
    margin-top: 24px;
    margin-bottom: 52px;
    border: 2px solid #d3d3d3;
    padding: 6px 26px 6px 26px;
}

.no-fillout-track-btn:hover{
    background: rgba(255, 255, 255, .8) !important;
    color: #282822 !important;
}


</style>



<script type="text/javascript">

        // global variables
        var hiddenArtistId = '';
        var artistName = "<?php echo $_SESSION["username"]; ?>";
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
            load_artist_release_data_OnPageLoad(),
        ];

        // Wait for all AJAX requests to complete before hiding the loader
        Promise.all(promises)
            .then(() => {
                $("#ajax_loader").fadeOut("slow");

                 // update release active step
                $('.first-step').addClass('active');

                 // update progress bar to 50%
                 updateStepsProgressBar(50);
                 showProgressBar('#releaseForm');

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

    function load_artist_release_data_OnPageLoad() {
        load_release_data();
    }


    function load_release_data() {

        var url = '<?= base_url("MusicUpload/ajax_create_release_data") ?>';

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
                    $("#ajax_loader").show();
                    $('#mu-content-placeholder').show();

                    $('.profile-details-btn').removeClass('menu-active');
                    $('.add-track-btn').removeClass('menu-active');

                    $('.create-release-btn').addClass('menu-active');
                    $('.mu-selected-menu-container').empty();
                },
                success: function(response){
                    add_track_html = response;
                    $('#ajax_loader').fadeOut("slow");
                    $('#mu-content-placeholder').hide();
                    $('.mu-selected-menu-container').html(add_track_html);
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


    $(document).on('click', '.create-release-btn', function(event){


        if(add_track_html!=''){

            $('.profile-details-btn').removeClass('menu-active');
            $('.add-track-btn').removeClass('menu-active');

            $('.create-release-btn').addClass('menu-active');
            $('.mu-selected-menu-container').html(add_track_html);

        }else{
            load_release_data();
        }


    });


function resetReleaseInputFields() {
    // resetting values to all popup input fields
    $("#image_link").val('');
    $("#preview").empty();
    $("#release_title").val('');
    $("#genre").val('');
    $("#release_date").val('');
    $("#copyright").val('');
    $("#copyright_desc").val('');

    // update form active step
    $('.first-step').addClass('active');
    $('.second-step').removeClass('active');
    $('.add-release-section').show();
    $('.add-track-section').hide();
    updateStepsProgressBar(50);

    // reset Track fields
    resetTrackInputFields();

}


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

// popup no fill out button
$(document).on('click', '.no-fillout-track-btn', function (event) {
    event.preventDefault();
     $("#ajax-save-track-popup").hide();
      enableBodyScroll();

});



function showProgressBar(formID) {
    $('#uploadProgressBar').show();
}

function updateProgressBar(percentComplete) {
    // Update the width of the progress bar inner div
    $('#uploadProgressBar .progress-bar-inner').css('width', percentComplete + '%');
    $('#uploadProgressBar .progress-bar-inner').html(parseInt(percentComplete)+ '%');
}

function resetProgressBar() {
    // reset the progress bar from the form
    updateProgressBar(0);
    $('#uploadProgressBar').hide();

}


</script>


<script>
        function previewFile() {
            const fileInput = $('#image_link')[0];
            const preview = $('#preview');
            const file = fileInput.files[0];
            const reader = new FileReader();

            reader.onloadend = function () {
                const img = $('<img>').attr('src', reader.result);
                preview.empty().append(img);
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.html('No file selected');
            }
        }

        function handleDrop(event) {
            event.preventDefault();

            const fileInput = $('#image_link')[0];
            const files = event.originalEvent.dataTransfer.files;

            // Simulate file input change with dropped files
            fileInput.files = files;

            // Trigger file preview
            previewFile();
        }

        function handleDragOver(event) {
            event.preventDefault();
        }

        // Add drag and drop event listeners using jQuery
        const fileInputContainer = $('#fileInputContainer');
        fileInputContainer.on('dragover', handleDragOver);
        fileInputContainer.on('drop', handleDrop);

        function updateStepsProgressBar(percentComplete) {
            $('#stepsProgressBar .progress-bar-inner').css('width', percentComplete + '%');
        }

</script>


<script>

    $(document).ready(function () {


        $(document).on('submit', '#releaseForm', function (event) {
            event.preventDefault();

            if (confirm('Are you sure you want to submit?')) {
                showProgressBar('#releaseForm');
                submitReleaseFormWithAjax();
            }

            return false;
        });


        function submitReleaseFormWithAjax() {
            console.log('submittingReleaseFormWithAjax');
            var form = $('#releaseForm')[0];
            var formData = new FormData(form);
            var result='';
            var form_id='#releaseForm';

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
                    resetProgressBar();
                    console.log(response)
                    if (response.success !== undefined && response.message !== undefined) {

                            if (response.success) {
                                result=response.message
                                showSuccessMsg(form_id,result);
                            } else {
                                result=response.message
                                showErrorMsg(form_id,result);
                            }

                        } else {
                            console.error('Invalid JSON response format:', response);
                        }

                    // location.reload(true);
                },
                complete: function () {
                    resetReleaseInputFields();
                    resetFormButtonText(form_id)
                    $("#ajax_loader").hide();
                },
                error: function (xhr, status, error) {
                    console.error(error);
                    console.error(xhr.responseText);
                    showErrorMsg(form_id,error);
                    resetProgressBar();
                },
                dataType:'json'
            });
        }

    });



    $(document).on('click', '.next-btn', function(event){


       if(!check_release_input_fields()){

            $('.add-release-section').hide();
            $('.add-track-section').show();

            // updating the active class
            $('.first-step').removeClass('active');
            $('.second-step').addClass('active');

            // update progress bar to 100%
            updateStepsProgressBar(100);

       }


    });

    $(document).on('click', '.prev-btn', function(event){

       $('.add-release-section').show();
       $('.add-track-section').hide();

        // updating the active class
        $('.first-step').addClass('active');
        $('.second-step').removeClass('active');

       // update progress bar to 50%
       updateStepsProgressBar(50);


    });



function check_release_input_fields(){


     image_link = $("#image_link").val();
     release_title = $("#release_title").val();
     genre = $("#genre").val();
     release_date = $("#release_date").val();
     copyright = $("#copyright").val();

    if (image_link === '') {
        show_release_fields_error_message('.add-release-section','#fileInputContainer','Image');
        return 1;
    }else{
        clear_release_error_msg('#fileInputContainer');
    }
    if (release_title === '') {
        show_release_fields_error_message('.add-release-section','#release_block .label-block','Release Title');
        return 1;
    }else{
        clear_release_error_msg('#release_block .label-block');
    }

    if (genre === null) {
        show_release_fields_error_message('.add-release-section','#genre_block .label-block','Genre');
        return 1;
    }else{
        clear_release_error_msg('#genre_block .label-block');
    }

    if (release_date === '') {
        show_release_fields_error_message('.add-release-section','#rel_date_block .label-block','Release Date');
        return 1;
    }else{
        clear_release_error_msg('#rel_date_block .label-block');
    }

    if (copyright === null) {
        show_release_fields_error_message('.add-release-section','#copyright_block .label-block','Copyright');
        return 1;
    }else{
        clear_release_error_msg('#copyright_block .label-block');
    }


}

function show_release_fields_error_message(sectionID,fieldID,field){

     $(".error-input-msg").remove();
     $(sectionID).append(`<p class="error-input-msg">${field} field is required.</p>`);

     if(field==='Image'){
       $(fieldID).addClass('file-error-border');
     }
     else{
       $(fieldID).addClass('error-border');
     }
}

function clear_release_error_msg(fieldID) {
    $(fieldID).removeClass('error-border file-error-border');
}

</script>


<!-- add track js starts -->


<script>

        function handleTrackDrop(event, trackNumber) {
            event.preventDefault();

            var fileInput = $(`#track_file_${trackNumber}`)[0];
            var previewDiv = $(`#preview${trackNumber}`);

            // Check if files were dropped
            if (event.originalEvent.dataTransfer.files.length > 0) {
                var file = event.originalEvent.dataTransfer.files[0];
                displayFileInformation(file, previewDiv);
            }
        }

        function handleFileInputChange(trackNumber) {
            var fileInput = $(`#track_file_${trackNumber}`)[0];
            var previewDiv = $(`#preview${trackNumber}`);

            // Check if files were selected
            if (fileInput.files.length > 0) {
                var file = fileInput.files[0];
                displayFileInformation(file, previewDiv);
            }
        }

        function displayFileInformation(file, previewDiv) {
            var reader = new FileReader();

            // Read file data
            reader.onload = function (e) {
                previewDiv.html(`<img src="<?php echo base_url(
                    "assets/images/audio-file.png"
                ); ?>" alt="upload file" id="upload-file">
                                <p class="pre-info">${file.name}</p>
                                `);
            };

            // Trigger the reading process
            reader.readAsDataURL(file);
        }

        // Prevent default behavior for dragover and dragenter events
        $(document).on('dragover', function (event) {
            event.preventDefault();
        });

        $(document).on('dragenter', function (event) {
            event.preventDefault();
        });


    // Function to disable body scrolling
    function disableBodyScroll() {
        $('body').css('overflow', 'hidden');
    }

    // Function to enable body scrolling
    function enableBodyScroll() {
        $('body').css('overflow', 'auto');
    }

     $(document).on('click', '.add-track-btn', function(event){


            if(create_release_html!=''){

                $('.profile-details-btn').removeClass('menu-active');
                $('.create-release-btn').removeClass('menu-active');

                $('.add-track-btn').addClass('menu-active');

                $('.mu-selected-menu-container').html(create_release_html);

            }else{
                   load_track_data();
            }


        });


       $(document).on('click', '.add-info-btn', function(event){
            event.preventDefault();
            $('#ajax_loader').show();

            id = $(this).data("popup_id");

            trackTitle = $("#track_title_"+id).val();
            popup_track_title_ = $("#popup_track_title_"+id).val();

            $("#popup_artist_name_"+id).val(artistName);


            if(trackTitle!==''){
                $("#popup_track_title_"+id).val(trackTitle);
            }


            // CSS for .track-next-btn
            $('.save-track-btn-'+id).css({
                'background': 'rgba(255,131,3,.6)',
                'padding': '8px 20px',
                'border-radius': '50px',
                'color': '#fff',
                'font-family': 'Poppins',
                'font-size': '14px',
                'font-weight': '500',
                'line-height': '21px',
                'letter-spacing': '-.02em',
                'text-align': 'left',
                'border': 'none',
                'margin-top': '24px',
                'margin-bottom': '52px',
                'width': '115px',
                'cursor': 'pointer'
            });

            // Add hover effect for .track-next-btn
            $('.track-next-btn').hover(function() {
                $(this).css({
                'background': 'rgba(255, 255, 255, .8)',
                'color': '#282822'
                });
            }, function() {
            $(this).css({
                'background': 'rgba(255,131,3,.6)',
                'color': '#fff'
                });
            });


            $('#closeTrackBtn-'+id).css({
              'position': 'absolute',
              'top': '-26px',
              'right': '-12px',
              'color': 'rgba(255, 131, 3, 0.6)',
              'font-size': '45px',
              'cursor': 'pointer',
              'overflow': 'hidden'
            });

            // Hover effect
            $('#closeTrackBtn-'+id).hover(function() {
              $(this).css('color', '#fff');
            }, function() {
              $(this).css('color', 'rgba(255, 131, 3, 0.6)');
            });


            $('#ajax_loader').fadeOut("slow");

            $('#ajax-add-track-popup-'+id).show();

            $("#closeTrackBtn-"+id).click(function() {
              $('#ajax-add-track-popup-'+id).hide();
            });

        });


  function genre_track_upload_fields(){


    num_of_track=$('#num_of_track').val();

    if (isNaN(num_of_track)) {
        alert('Please enter a valid number for the number of tracks.');
        return;
    }

    var html='';

    for (var i = 1; i <= num_of_track; i++) {

        html+=`
        <div class="row track-divider">

        <div class="form-group">
            <label for="File" class="label-block track-rank">Track Info ${i}</label>
        </div>

        <div class="form-group">

            <label for="File" class="label-block">File * </label>

            <div id="fileInputTrackContainer">
                    <div id="preview${i}"></div>
                    <input type="file" name="track_file_${i}" id="track_file_${i}" id="image_link" accept="audio/*" onchange="handleFileInputChange(${i})" ondrop="handleTrackDrop(event,${i})" required>
                    <p>Click or drag and drop a file</p>
                    <p class="supported-file">Supported audio file (MP3, WAV, FLAC, AAC, OGG)</p>
            </div>


        </div>

        <div class="form-group">

            <label for="Title" class="label-block">Title * </label>
            <input type="text" class="artist-popup-input form-control input-field" name="track_title_${i}" id="track_title_${i}" placeholder=" Track Title" required>
        </div>

        <div class="form-group">
            <label for="info" class="label-block">Info * </label>
            <input type="button" class="artist-popup-input form-control input-field add-info-btn" name="add-info-btn_${i}" id="add-info-btn_${i}" value="Add Track Info" data-popup_id=${i}>

        </div>

        </div>

        <div id="ajax-add-track-popup-${i}" style="display: none; position: fixed;top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #181818; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); width: 800px; height: 975px; z-index: 1000; border: 4px solid #353535; padding: 50px 50px 50px 50px; border-radius: 5px;">

        <div id="header-track-popup">
        <h2>Track Info ${i}</h2>
        <span id="closeTrackBtn-${i}">&times;</span>
        </div>

        <div id="popup-track-content">

        <div class="row popup-desc-divider-draft">

        <div class="col-md-12 col-lg-12 col-sm-12 artist-popup-left-sidebar track-left-sidebar">

        <div class="popup-about-container">


          <input type="hidden" class="artist-popup-input track-popup-input" name="hidden_artist_id" id="hidden_artist_id" value="">

          <p class="band-detail-popup-desc">Artist *


            <input type="text" class="artist-popup-input track-popup-input" name="artist_name_${i}" id="popup_artist_name_${i}" value="">


          </p>
          <p class="band-detail-popup-desc">Title *

            <input type="text" class="artist-popup-input track-popup-input" name="track_title_${i}" id="popup_track_title_${i}" value="">

          </p>

          <p class="band-detail-popup-desc">

          Features

          <input type="text" class="artist-popup-input track-popup-input" name="features_${i}" id="features_${i}" value="">

          </p>

          <p class="band-detail-popup-desc">Composer *

          <input type="text" class="artist-popup-input track-popup-input" name="composer_${i}" id="composer_${i}" value="">

          </p>

          <p class="band-detail-popup-desc">

          Lyricist *
          <input type="text" class="artist-popup-input track-popup-input" name="lyricist_${i}" id="lyricist_${i}" value="">
          </p>

          <p class="band-detail-popup-desc">
          ISRC Code *
          <input type="text" class="artist-popup-input track-popup-input" name="isrc_code_${i}" id="isrc_code_${i}" value="">
          </p>


            <p class="band-detail-popup-desc">Explicit *</p>

            <select name="explicit_${i}" class="artist-popup-selectbox track-select" id="explicit_${i}">
                <option value="" selected disabled>Please select (yes/no)</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>

          <p class="save-track-btn-${i} form-btn" onclick="check_popup_input_fields(${i})" data-btn_id="${i}">Save Track</p>


        </div>
        </div>

        </div>

        </div>
        </div>
        `;
    }

    $('.dynamic-track-container').html(html);


  }



function check_popup_input_fields(id){

     hiddenArtistId = $("#hidden_artist_id").val();
     artistName = $("#popup_artist_name_"+id).val();
     trackTitle = $("#popup_track_title_"+id).val();
     features = $("#features_"+id).val();
     composer = $("#composer_"+id).val();
     lyricist = $("#lyricist_"+id).val();
     isrcCode = $("#isrc_code_"+id).val();
     explicit = $("#explicit_"+id).val();

    if (artistName === '') {
        alert("Please enter Artist");
        $("save-track-btn-"+id+"#artist_name_"+id).css({'border': '1px solid #FF0000 !important'});
        return;
    }

    if (trackTitle === '') {
        alert("Please enter Track Title");
        $("#track_title_"+id).css({'border': '1px solid #FF0000'});
        return;
    }

    if (composer === '') {
        alert("Please enter Composer");
        $("#composer_"+id).css({'border': '1px solid #FF0000'});
        return;
    }

    if (lyricist === '') {
        alert("Please enter Lyricist");
        $("#lyricist_"+id).css({'border': '1px solid #FF0000'});
        return;
    }

    if (isrcCode === '') {
        alert("Please enter ISRC Code");
        $("#isrc_code_"+id).css({'border': '1px solid #FF0000'});
        return;
    }

    if (explicit === '') {
        alert("Please select Explicit");
        $("#explicit_"+id).css({'border': '1px solid #FF0000'});
        return;
    }


    $("#ajax-add-track-popup-"+id).hide();

    num_of_track=$('#num_of_track').val();

    if(num_of_track>1){
      $('#ajax-save-track-popup').show();
    }

}


$(document).on('click', '.save-track-btn', function (event) {
    event.preventDefault();

     $("#ajax-save-track-popup").hide();

     hiddenArtistId = $("#hidden_artist_id").val();
     trackTitle = $("#track_title_"+id).val();
     features = $("#features_"+id).val();
     composer = $("#composer_"+id).val();
     lyricist = $("#lyricist_"+id).val();
     isrcCode = $("#isrc_code_"+id).val();
     explicit = $("#explicit_"+id).val();


      // asigning values to all popup input fields
     for (var i = num_of_track; i > 0; i--) {

          $("#popup_artist_name_"+i).val(artistName);
          $("#popup_track_title_"+i).val(trackTitle);
          $("#features_"+i).val(features);
          $("#composer_"+i).val(composer);
          $("#lyricist_"+i).val(lyricist);
          $("#isrc_code_"+i).val(isrcCode);
          $("#explicit_"+i).val(explicit);
     }

});



function resetTrackInputFields() {

    // resetting values of all popup input fields
    for (var i = num_of_track; i > 0; i--) {
        $("#track_file_" + i).val('');
        $("#popup_artist_name_" + i).val('');
        $("#popup_track_title_" + i).val('');
        $("#track_title_" + i).val('');
        $("#features_" + i).val('');
        $("#composer_" + i).val('');
        $("#lyricist_" + i).val('');
        $("#isrc_code_" + i).val('');
        $("#explicit_" + i).val('');
        $("#preview" + i).empty();
    }
    $("#num_of_track").val('');
    $('.dynamic-track-container').empty();
}


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

// popup no fill out button
$(document).on('click', '.no-fillout-track-btn', function (event) {
    event.preventDefault();
     $("#ajax-save-track-popup").hide();
      enableBodyScroll();
});


</script>


<!-- add track js ends -->


<div class="heading">
   <h2>Create Release</h2>
   <p class="mb-4">You can create your release via submitting below form.</p>
</div>
<div class="main-container">
   <?php if (isset($_SESSION["success-msg"])) { ?>
   <div class="alert alert-success mt-4">
      <?php
      echo $_SESSION["success-msg"];
      unset($_SESSION["success-msg"]);
      ?>
      <span class="alert-close-icon" style="cursor: pointer;">&times;</span>
   </div>
   <?php } ?>
   <?php if (isset($_SESSION["error-msg"])) { ?>
   <div class="alert alert-danger">
      <?php
      echo $_SESSION["error-msg"];
      unset($_SESSION["error-msg"]);
      ?>
      <span class="alert-close-icon" style="cursor: pointer;">&times;</span>
   </div>
   <?php } ?>
   <div class="row top-20-artists-section">
      <div class="col-md-12 col-lg-12 col-sm-12 artist-popup-right-sidebar-dis mu-right-sidebar">
         <div class="row mu-container">

            <div class="steps-container">

                <div class="form-step">
                    <label for="release-info" class="first-step mu-label-heading">Release Info</label>
                </div>

                <div class="form-step">
                    <label for="track-info" class="second-step mu-label-heading">Track Info</label>
                </div>

            </div>

             <div id="stepsProgressBar"><div class="progress-bar-inner"></div></div>

            <div id="mu-content-placeholder">
               <div class="mu-animated-background">
                  <div class="background-masker"></div>
               </div>
            </div>
            <div class="mu-selected-menu-container">
            </div>
         </div>
      </div>
   </div>
</div>


<div id="ajax-save-track-popup">
   <div id="header-track-popup">
       <h2>Save Track</h2>
   </div>

  <div id="popup-save-track-content">
      <p>
          To save time, you can click here to transfer all details, except the track name, for all other songs. However, you can still change them for each individual song.
      </p>
      <button class="save-track-btn"> Yes, I want to save time</button>

      <button class="no-fillout-track-btn"> I want to fill them out</button>
  </div>
</div>
