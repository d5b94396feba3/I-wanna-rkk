
let currentTrackSubmitrequest; // Stores current AJAX request for track form
let currentSubmitrequest; // Stores current AJAX request for submit form
let currentTrackInfoSubmitrequest; // Stores current AJAX request for track info form

$(document).ready(function() {

    $(document).on('click', '.img-update-btn', function(e) {
        // e.preventDefault();

        var fileInput = $('#image_link')[0];

        if (fileInput.files.length === 0) {
            Swal.fire({
                title: '<h2>No Image Uploaded</h2>',
                html: '<p>Please upload an image before updating.</p>',
                icon: 'warning',
                confirmButtonText: 'OK',
                customClass: {
                    popup: 'custom-popup',
                    title: 'custom-title',
                    htmlContainer: 'custom-html-container',
                    icon: 'custom-icon',
                    confirmButton: 'custom-confirm-button'
                },
                buttonsStyling: false
            });
            return;
        }
    });

    $(document).on('submit', '.updateCoverImageForm, #updateReleaseDetail, .updateTrackTitle', function(e) {
        e.preventDefault();
        const $form = $(this);
        const title = $form.hasClass('updateCoverImageForm') ? 'UPDATE COVER IMAGE' :
                      $form.attr('id') === 'updateReleaseDetail' ? 'UPDATE RELEASE INFO' : 'UPDATE TRACK TITLE';
        const html = `Are you sure you want to update the ${title.toLowerCase()}?`;
        
        showSwalConfirmation(title, html, $form);
    });

    $(document).on('submit', '.updateTrackInfo', function(e) {
        e.preventDefault();
        const $form = $(this);
        const id = $form.data("trackform-id");
        
        if(check_popup_input_fields(id)){
            showSwalConfirmationForTrackUpload('UPDATE TRACK INFO', 'Are you sure you want to update the info?', () => {
                submitTrackInfoFormWithAjax($form[0],id);
            });
        }
    });

    $(document).on('click', '.audio-upload-icon', function(e){
        e.preventDefault();
        $(`#track_file_${$(this).data("popup_id")}`).click();
    });

    $(document).on('click', '.audio-upload-btn', function(e){
        e.preventDefault();
        const id = $(this).data("track_btn_id");
        const fileInput = $(`#track_file_${id}`)[0];
        
        if (fileInput.files.length === 0) {
            Swal.fire({
                title: '<h2>No Audio File Selected</h2>',
                html: '<p>Please select an audio file before updating.</p>',
                icon: 'warning',
                confirmButtonText: 'OK',
                customClass: {
                    popup: 'custom-popup',
                    title: 'custom-title',
                    htmlContainer: 'custom-html-container',
                    icon: 'custom-icon',
                    confirmButton: 'custom-confirm-button'
                },
                buttonsStyling: false
            });
        } else {
            showSwalConfirmationForTrackUpload('Update Audio File', 'Are you sure you want to update this audio file?', () => {
                $(`#audioUploadPopup-${id}`).hide();
                submitTrackFileFormWithAjax(id);
            });
        }
    });

     // update track info confirm popup
    window.submitTrackFileFormWithAjax = function (id) {
        
            var form = $('#updateTrackAudioFile-'+id)[0];
            var formData = new FormData(form);
            var result='';

            // Abort any existing request
            if (currentTrackSubmitrequest && currentTrackSubmitrequest.state() === 'pending') {
                currentTrackSubmitrequest.abort();
            }
            // Store the new request
            currentTrackSubmitrequest = $.ajax({
                url: form.action,
                type: 'POST',
                data:formData,
                processData: false,
                contentType: false,
                beforeSend: function (jqXHR) {
                    show_uploading_release_loader();
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

                    if (response.csrf_hash) {
                        $('input[name="csrf_ar"]').val(response.csrf_hash); // Update form with new token
                    }

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

    window.submitFormWithAjax = function (formID) {
        var form = formID;
        var formData = new FormData(form);
        var result='';

        // Abort any existing request
        if (currentSubmitrequest && currentSubmitrequest.state() === 'pending') {
            currentSubmitrequest.abort();
        }
        // Store the new request
        currentSubmitrequest = $.ajax({
            url: form.action,
            type: 'POST',
            data:formData,
            processData: false,
            contentType: false,
            beforeSend: function (jqXHR) {
                show_sweet2alert_loader("Processing...")
            },
            success: function (response) {

                if (response.csrf_hash) {
                    $('input[name="csrf_ar"]').val(response.csrf_hash); // Update form with new token
                }

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


    window.submitTrackInfoFormWithAjax = function (formID,ID) {
        var form = formID;
        var formData = new FormData(form);
        var result='';

        // Abort any existing request
        if (currentTrackInfoSubmitrequest && currentTrackInfoSubmitrequest.state() === 'pending') {
            currentTrackInfoSubmitrequest.abort();
        }
        // Store the new request
        currentTrackInfoSubmitrequest = $.ajax({
            url: form.action,
            type: 'POST',
            data:formData,
            processData: false,
            contentType: false,
            timeout:20000, // 20 seconds
            beforeSend: function (jqXHR) {
                show_sweet2alert_loader("Processing...")
            },
            success: function (response) {

                if (response.csrf_hash) {
                    $('input[name="csrf_ar"]').val(response.csrf_hash); // Update form with new token
                }

                if (response.success !== undefined && response.message !== undefined) {

                        if (response.success) {
                            result=response.message
                            show_success_msg(result);
                            update_track_title(ID);
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
