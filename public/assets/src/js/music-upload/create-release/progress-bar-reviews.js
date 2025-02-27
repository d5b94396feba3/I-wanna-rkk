$(document).ready(function () {

    // const $form = $('#uploadForm');
    const $progressSteps = $('.progress-step');
    let currentStep = 0;
    // Use event delegation for dynamically added elements
    $(document).on('click', '.form-btn-next', function(event) {
        event.preventDefault();
        if (validateStep(currentStep)) {
            if (currentStep < $progressSteps.length - 1) {
                // Move to next step
                $progressSteps.eq(currentStep).removeClass('active')
                    .find('.step-number').removeClass('active');
                currentStep++;
                $progressSteps.eq(currentStep).addClass('active')
                    .find('.step-number').addClass('active');

                // Show/hide relevant form sections
                showCurrentSection(currentStep);
                // update checked steps
                updateCheckedSteps(currentStep-1)

                // Update button text on last step
                if (currentStep === $progressSteps.length - 1) {
                    showReviewSectionData();
                }
            }
        }
    });

    $(document).on('click', '.form-btn-cancel', function(event) {
        event.preventDefault();
        if (currentStep > 0) {
            // Move to previous stepsa
            $progressSteps.eq(currentStep).removeClass('active')
                .find('.step-number').removeClass('active');
            currentStep--;
            $progressSteps.eq(currentStep).addClass('active')
                .find('.step-number').addClass('active');

            // Show/hide relevant form sections
            showCurrentSection(currentStep);
            // update checked steps
            updateCheckedSteps(currentStep-1)
        } 
    });

    function validateStep(step){

        if(step == 0){
            let distributor = $("#distributor").val();
            let artist_name = $("#artist_name").val();
            let label = $("#label").val();
            let isValid=true;
            
            if (artist_name === '') {
                showRequiredFieldErrorMsg("#artist_name");
                isValid=false;
            } else {
                removeRequiredFieldErrorMsg("#artist_name");
            }

            if (label === '') {
                showRequiredFieldErrorMsg("#label");
                isValid=false;
            } else {
                removeRequiredFieldErrorMsg("#label");
            }

            return isValid;
        }

        if(step==1){

            let release_date = $("#release_date").val();
            let cover_upload_container = $(".cover-upload-container");
            let image_link = $("#image_link").val();
            let release_icpn = $("#release_icpn").val();
            let release_available_markets = $("#release_available_markets").val();
            let isValid=true;
            
            if (release_date === '') {
                showRequiredFieldErrorMsg("#release_date");
                isValid=false;
            } else {
                removeRequiredFieldErrorMsg("#release_date");
            }

            if (release_icpn === '') {
                showRequiredFieldErrorMsg("#release_icpn");
                isValid=false;
            } else {
                removeRequiredFieldErrorMsg("#release_icpn");
            }

            if (release_available_markets === '') {
                showRequiredFieldErrorMsg(".markets-select-container");
                isValid=false;
            } else {
                removeRequiredFieldErrorMsg(".markets-select-container");
            }

            if (image_link === '') {
                showRequiredFieldErrorMsg(cover_upload_container);
                isValid=false;
            } else {
                removeRequiredFieldErrorMsg(cover_upload_container);
            }

            return isValid;
        }

        if(step==2){

            let num_of_track = $("#num_of_track").val();
            let id=num_of_track;           
            let isValid=true;

            if (num_of_track === '') {
                showRequiredFieldErrorMsg("#num_of_track");
                isValid=false;
            } else {
                removeRequiredFieldErrorMsg("#num_of_track");
                isValid=validateDynamicTrackFields(id);
            }

            if(!validateDynamicTrackFields(num_of_track)){
                isValid=false;
            }

            return isValid;
        }

    }

    function showReviewSectionData(){
        let albumName = $('#release_title').val();
        let artistName = $('#artist_name').val();
        let copyright = $('#copyright').val();
        let releaseDate = $('#release_date').val();
        let language = $('#language').val();
        let genre = $('#genre').val();       
        let image_src = $('#preview img').attr('src');

        $('.review-album-cover').attr('src',image_src);
        $('.review-artist_name').text(artistName);
        $('.review-album-name').text(albumName);
        $('.review-copyright').text(copyright);
        $('.review-release_date').text(releaseDate);
        $('.review-language').text(language);
        $('.review-genre').text(genre);
        
        showReviewTrackData();
    }

    function showReviewTrackData(){
        let totalTrack = $('#num_of_track').val();
        $('.review-total-track').text(totalTrack);

        let image_src = $('#preview img').attr('src');

        if (isNaN(num_of_track)) {
            alert('Please enter a valid number for the number of tracks.');
            return;
        }

        var html='';
        let label=$("#label").val();
        let distributor=$("#distributor").val();
        let website=$("#website").val();
        let copyright_desc=$("#copyright_desc").val();
        let file_name=window.uploaded_audio_file_name;
        let file_size=window.uploaded_audio_file_size;

        for (var i = 1; i <= num_of_track; i++) {

        let popup_track_title_i=$("#popup_track_title_" + i).val();
        let features_i=$("#features_" + i).val();
        let composer_i=$("#composer_" + i).val();
        let lyricist_i=$("#lyricist_" + i).val();
        let isrc_code_i=$("#isrc_code_" + i).val();
        let explicit_i=$("#explicit_" + i).val();
        html+=`
        <div class="track-item">
            <img src="${image_src}" alt="Track Cover" class="track-cover">
            <div class="details-grid">
                <div class="detail-item">
                    <span class="detail-label">Track Title</span>
                    <span class="detail-value">${popup_track_title_i}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Size</span>
                    <span class="detail-value">${file_size} bytes</span>
                </div>
                <div class="detail-item">
                    <button class="more-details-btn" data-mdbtn-id="${i}">More Details <i class="ri-arrow-down-s-line track-list-icon-1"></i></button>
                </div>
            </div>
        </div>
        <div class="tracks-list track-list-more-info tlmi-id-${i}" style="display: none;">
            <h2 class="section-title track-title more-info-title">More Details</h2>
            <div class="track-item">
                <div class="details-grid">
                    <div class="detail-item">
                        <span class="detail-label">Label</span>
                        <span class="detail-value">${label}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Distributor And Aggregator</span>
                        <span class="detail-value">${distributor}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Features</span>
                        <span class="detail-value">${features_i}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Composer</span>
                        <span class="detail-value">${composer_i}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Lyricist</span>
                        <span class="detail-value">${lyricist_i}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Explicit</span>
                        <span class="detail-value">${explicit_i}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Audio File Name</span>
                        <span class="detail-value">${file_name}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">ISRC Code</span>
                        <span class="detail-value">${isrc_code_i}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Website</span>
                        <span class="detail-value">${website}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Additional Copyright Information</span>
                        <span class="detail-value">${copyright_desc}</span>
                    </div>
                </div>
            </div>
        </div>`;
        }

        $('.dynamic-review-track-content').html(html);
    }
    

    function showCurrentSection(step) {
        // Hide all sections
        $('.form-section').hide();
        // Show current section
        $(`.form-section[data-step="${step}"]`).show();
    }
    function updateCheckedSteps(step) {
        // Hide all sections
        $(`.default[data-step="${step}"]`).hide();
        $(`.check[data-step="${step}"]`).show();
    }

    window.updateProgressBar = function(percentComplete) {
        $('.progress-bar').css('width', percentComplete + '%');
        $('.progress-percentage').text(parseInt(percentComplete)+ '%');
    }

    window.resetProgressBar = function() {
        // reset the progress bar from the form
        updateProgressBar(0);
        $('#uploadProgressBar').hide();
    }


});