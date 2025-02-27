$(document).ready(function() {

    let currentSubmitRequest; // Stores current AJAX request for submit form

    // update cover image confirm popup
    $(document).on('click', '.img-update', function(e) {

        var coverImgfileInput = $('#image_link')[0];
        var personImgfileInput = $('#person_image_link')[0];

        if (coverImgfileInput.files.length === 0 || personImgfileInput.files.length === 0) {
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

    $(document).on('submit', '.updateCoverImageForm', function(e) {
        e.preventDefault();
        var $form = $(this);
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
                submitFormWithAjax('.updateCoverImageForm')
            }
        });
    });

    $(document).on('submit', '.updatePersonImageForm', function(e) {
        e.preventDefault();
        var $form = $(this);
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

     // update Artist Detail
    $('#updateArtistDetail').on('submit', function(e) {
        e.preventDefault(); 

        if(validateArtistFields()){

            Swal.fire({
                title: '<h2>UPDATE ARTIST INFO</h2>',
                html: '<p>Are you sure you want to update the artist information?</p>',
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
                    submitFormWithAjax('#updateArtistDetail')
                }
            });
        }

    });

      // update Person Detail 
    $('#updatePersonDetail').on('submit', function(e) {
        e.preventDefault(); 

        if(validatePersonFields()){

            Swal.fire({
                title: '<h2>UPDATE PERSON INFO</h2>',
                html: '<p>Are you sure you want to update the person information?</p>',
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
        }

    });

       // update release detail confirm popup
    $('#updateSocialMediaForm').on('submit', function(e) {
        e.preventDefault(); 
        Swal.fire({
            title: '<h2>UPDATE SOCIAL MEDIA INFO</h2>',
            html: '<p>Are you sure you want to update the social media information?</p>',
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
                submitFormWithAjax('#updateSocialMediaForm')
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
                show_sweet2alert_loader("Processing...");
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
