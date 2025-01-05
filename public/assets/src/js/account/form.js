$(document).ready(function() {


    let currentSubmitRequest; // Stores current AJAX request for submit form

    $(document).on('click', '.img-update-btn', function(e) {
        var file = $('#person_image_link')[0];
        if (!file) {
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
        // Check file type
        if (!file.type.match('image.*')) {
            Swal.fire({
                title: '<h2>Invalid File Type</h2>',
                html: '<p>Please upload only image files (JPG, PNG).</p>',
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

    $(document).on('submit', '.updatePersonImageForm', function(e) {
        e.preventDefault();
        var $form = $(this);
        console.log("$form: "+$form)
        Swal.fire({
            title: '<h2>UPDATE IMAGE</h2>',
            html: '<p>Are you sure you want to update the image?</p>',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, I want to update',
            cancelButtonText: 'Cancel',
            customClass: {
                popup: 'custom-popup',
                title: 'custom-title',
                htmlContainer: 'custom-html-container',
                icon: 'custom-icon',
                confirmButton: 'custom-confirm-button',
                cancelButton: 'custom-cancel-button'
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                submitFormWithAjax('.updatePersonImageForm')
            }
        });
    });

    // update person detail confirm popup
    $('#updatePersonDetail').on('submit', function(e) {
        e.preventDefault(); 
        Swal.fire({
            title: '<h2>UPDATE ADMIN INFO</h2>',
            html: '<p>Are you sure you want to update the admin information?</p>',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, I want to update',
            cancelButtonText: 'Cancel',
            customClass: {
                popup: 'custom-popup',
                title: 'custom-title',
                htmlContainer: 'custom-html-container',
                icon: 'custom-icon',
                confirmButton: 'custom-confirm-button',
                cancelButton: 'custom-cancel-button'
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                submitFormWithAjax('#updatePersonDetail')
            }
        });
    });

    // update account password confirm popup
    $('#accountPasswordForm').on('submit', function(e) {
        e.preventDefault(); 
        Swal.fire({
            title: '<h2>UPDATE ACCOUNT PASSWORD</h2>',
            html: '<p>Are you sure you want to update the password?</p>',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, I want to update',
            cancelButtonText: 'Cancel',
            customClass: {
                popup: 'custom-popup',
                title: 'custom-title',
                htmlContainer: 'custom-html-container',
                icon: 'custom-icon',
                confirmButton: 'custom-confirm-button',
                cancelButton: 'custom-cancel-button'
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                submitFormWithAjax('#accountPasswordForm')
            }
        });
    });

    // update account password confirm popup
    $('#accountDelForm').on('submit', function(e) {
        e.preventDefault();
            Swal.fire({
                title: '<h2>DELETE ACCOUNT</h2>',
                html: '<p>Are you sure you want to delete account?</p>',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, I want to delete',
                cancelButtonText: 'Cancel',
                customClass: {
                    popup: 'custom-popup',
                    title: 'custom-title',
                    htmlContainer: 'custom-html-container',
                    icon: 'custom-icon',
                    confirmButton: 'custom-confirm-button',
                    cancelButton: 'custom-cancel-button'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    submitFormWithAjax('#accountDelForm')
                }
            });
    });


    function submitFormWithAjax(formID) {
        var form = $(formID)[0];
        var formData = new FormData(form);
        var result='';

        // Abort any existing request
        if (currentSubmitRequest && currentSubmitRequest.state() === 'pending') {
            currentSubmitRequest.abort();
        }
        
        // Store the new request
        currentSubmitRequest = $.ajax({
            url: form.action,
            type: 'POST',
            data:formData,
            processData: false,
            contentType: false,
            timeout:20000, // 20 seconds
            beforeSend: function (jqXHR) {
                const message = formID === "#accountDelForm" ? "Deleting Account..." : "Processing...";
                show_sweet2alert_loader(message);
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


});