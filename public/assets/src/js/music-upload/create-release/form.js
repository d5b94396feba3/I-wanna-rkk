$(document).ready(function () {

    let currentSubmitequest; // Stores current AJAX request for submit form

    // Show popup when CREATE RELEASE button is clicked
    $('.create-release-form-btn').on('click', function(e) {
        e.preventDefault();
        // Perform any necessary validations here
        $('#submitReleasePopup').show();
    });

    // Handle SUBMIT button click in the popup
    $(document).on('click', '.create-release-popup-submit-btn', function(e) {
        e.preventDefault();
        $('#submitReleasePopup').hide();
        submitReleaseFormWithAjax();
    });

    //form submit handler to prevent default submission
    $('#releaseForm').on('submit', function(e) {
        e.preventDefault(); 
    });


    function submitReleaseFormWithAjax() {
        var form = $('#releaseForm')[0];
        var formData = new FormData(form);
        var result='';

        // Abort any existing request
        if (currentSubmitequest && currentSubmitequest.state() === 'pending') {
            currentSubmitequest.abort();
        }
        // Store the new request
        currentSubmitequest = $.ajax({
            url: form.action,
            type: 'POST',
            data:formData,
            processData: false,
            contentType: false,
            timeout: 1200000, // 20 mins 
            beforeSend: function (jqXHR) {
                window.show_uploading_release_loader();
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
                if (response.success !== undefined && response.message !== undefined) {

                        if (response.success) {
                            result=response.message
                            show_success_msg(result);
                        } else {
                            result=response.message
                            show_error_msg(result);
                        }

                    } else {
                        console.log('Invalid JSON response format:', response);
                    }
            },
            error: function(xhr, status, error) {
                // Handle AJAX errors
                window.show_error_msg('An error occurred while processing your request. Please refresh and try again.');
                console.log('Error submitting form:', error);
            },
            dataType:'json',
        });
    }

});
