$(document).ready(function() {

// Define the function globally
window.check_popup_input_fields = function(id) {
        const fields = ['composer', 'lyricist', 'isrc_code'];
        let isValid = true;
    
        fields.forEach(field => {
            const value = $(`#${field}_${id}`).val().trim();
            if (value === '') {
                showRequiredFieldErrorMsg(`#${field}_${id}`);
                isValid = false;
            } else {
                removeRequiredFieldErrorMsg(`#${field}_${id}`);
            }
        });
    
    return isValid ? 1 : 0;
}
    
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
    const fields = ['composer', 'lyricist', 'isrc_code'];
    let isValid = true;

    fields.forEach(field => {
        const value = $(`#${field}_${id}`).val().trim();
        if (value === '') {
            showRequiredFieldErrorMsg(`#${field}_${id}`);
            isValid = false;
        } else {
            removeRequiredFieldErrorMsg(`#${field}_${id}`);
        }
    });

    return isValid ? 1 : 0;
}


});