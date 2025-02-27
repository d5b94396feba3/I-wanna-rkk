$(document).ready(function () {

// Define the function globally
window.removeRequiredFieldErrorMsg = function(fieldSelector) {
        $(fieldSelector).css('border', '');
        $(fieldSelector).siblings('.error-message').remove();
    }
// Define the function globally
window.showRequiredFieldErrorMsg = function(fieldSelector) {
        $(fieldSelector).css({
            'border': '1px solid #FF8303',
            'border-radius': '30px',
            'font-size': '13px'
        });
        // Remove any existing error message
        $(fieldSelector).siblings('.error-message').remove();
        // Check if error message already exists
        if ($(fieldSelector).siblings('.error-message').length === 0) {
            $("<p class='error-message' style='color: #FF8303; margin-top: 5px; font-size: 13px;'>This field is required.</p>").insertAfter(fieldSelector);
        }
    }
// Define the function globally
window.validateDynamicTrackFields = function(num_of_track) {
        let isValid = true;

        for (let i = 1; i <= num_of_track; i++) {
            
            let trackTitle = $("#track_title_"+i).val();
            let popup_artist_name_ = $("#popup_artist_name_"+i).val();
            let popupTrackTitle = $("#popup_track_title_"+i).val(); 
            let features = $("#features_"+i).val(); 
            let composer = $("#composer_"+i).val();
            let lyricist = $("#lyricist_"+i).val();
            let isrcCode = $("#isrc_code_"+i).val();
            let explicit = $("#explicit_"+i).val();
            let track_disc_number = $("#track_disc_number_"+i).val();
            let track_file = $(`#track_file_${i}`).val();

            if (popup_artist_name_ === '') {
                showRequiredFieldErrorMsg("#popup_artist_name_" + i);
                isValid = false;
            } else {
                removeRequiredFieldErrorMsg("#popup_artist_name_" + i);
            }

            if (trackTitle === '') {
                showRequiredFieldErrorMsg("#track_title_" + i);
                isValid = false;
            } else {
                removeRequiredFieldErrorMsg("#track_title_" + i);
            }

            if (popupTrackTitle === '') {
                showRequiredFieldErrorMsg("#popup_track_title_" + i);
                isValid = false;
            } else {
                removeRequiredFieldErrorMsg("#popup_track_title_" + i);
            }

            if (composer === '') {
                showRequiredFieldErrorMsg("#composer_" + i);
                showRequiredFieldErrorMsg(".track-info-box");
                isValid = false;
            } else {
                removeRequiredFieldErrorMsg("#composer_" + i);
                removeRequiredFieldErrorMsg(".track-info-box");
            }
            if (lyricist === '') {
                showRequiredFieldErrorMsg("#lyricist_" + i);
                showRequiredFieldErrorMsg(".track-info-box");
                isValid = false;
            } else {
                removeRequiredFieldErrorMsg("#lyricist_" + i);
                removeRequiredFieldErrorMsg(".track-info-box");
            }
            if (isrcCode === '') {
                showRequiredFieldErrorMsg("#isrc_code_" + i);
                showRequiredFieldErrorMsg(".track-info-box");
                isValid = false;
            } else {
                removeRequiredFieldErrorMsg("#isrc_code_" + i);
                removeRequiredFieldErrorMsg(".track-info-box");
            }
            if (track_disc_number === '') {
                showRequiredFieldErrorMsg("#track_disc_number_"+i);
                showRequiredFieldErrorMsg(".track-info-box");
                isValid = false;
            } else {
                removeRequiredFieldErrorMsg("#track_disc_number_"+i);
                removeRequiredFieldErrorMsg(".track-info-box");
            }
            if (track_file === '') {
                showRequiredFieldErrorMsg("#track_file_"+i);
                showRequiredFieldErrorMsg(".track-upload-box-"+i);
                isValid = false;
            } else {
                removeRequiredFieldErrorMsg("#track_file_"+i);
                removeRequiredFieldErrorMsg(".track-upload-box-"+i);
            }
        }
        return isValid;
}



// Define the function globally
window.validateTrackInputField= function(id) {
    let isValid = true;
        let track_file = $(`#track_file_${id}`).val();
        if (track_file === '') {
            showRequiredFieldErrorMsg("#track_file_"+id);
            isValid = false;
        } else {
            removeRequiredFieldErrorMsg("#track_file_"+id);
        }
        return isValid;
}

// Define the function globally
window.check_popup_input_fields = function(id) {
    const fields = ['popup_artist_name', 'composer', 'lyricist', 'isrc_code', 'track_disc_number','popup_track_title'];
    let isValid = true;

    fields.forEach(field => {
        const value = $(`#${field}_${id}`).val();
        if (value === '') {
            showRequiredFieldErrorMsg(`#${field}_${id}`);
            isValid = false;
        } else {
            if(field=='popup_track_title')
            {
              update_track_title(value, id);
            }
            removeRequiredFieldErrorMsg(`#${field}_${id}`);
        }
    });

    return isValid ? 1 : 0;
}

window.update_track_title = function(value, id) {
    let track_value=$(`#track_title_${id}`).val(value); 
    if(track_value !=''){
        $(`#track_title_${id}`).val(value); 
    }
}


});