$(document).ready(function() {

    let currentSubmitRequest; // Stores current AJAX request for submit form

   // update das-form popup
   $('#das-form').on('submit', function(e) {
    e.preventDefault();
        Swal.fire({
            title: '<h2>UPDATE ROKK ADDRESS</h2>',
            html: '<p>Are you sure you want to update ROKK Address?</p>',
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
                submitFormWithAjax();
            }
        });
    });
    
    function submitFormWithAjax() {
        var form = $('#das-form')[0];
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
            beforeSend: function (jqXHR) {
                show_sweet2alert_loader("Processing...");
            },
            success: function (response) {
                if (response.success !== undefined && response.message !== undefined) {

                        if (response.success) {
                            result=response.message
                            window.show_success_msg(result);
                        } else {
                            result=response.message
                            window.show_error_msg(result);
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