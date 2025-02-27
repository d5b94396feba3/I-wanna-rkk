$(document).ready(function() {

    // Base URL for API endpoints
    const baseLocation = window.location.origin;
    let currentSubmitFormRequest; // Stores current AJAX request for submit form

    // Handle submission of FAQ section form
    $(document).on('click', '.drawer-actions-sec-submit-btn', function(event){
        event.preventDefault();
    
        // Validate form fields before submission
        if (!validateSECForm()) {
            return false;
        }
    
        var form = $('.faq-details-drawer #FAQSecForm')[0];
        var active_section='faq-sec';
        var url = `${baseLocation}/update_faq_section`;

        $('body').css('overflow', 'auto');
    
        // Set confirmation dialog text based on form type (add vs update)
        var form_type = $('#faqsec-hidden').val();
        var title="";
        var html="";
    
        if (form_type == "add") {
             title="<h2>ADD SECTION</h2>";
             html="<p>Are you sure you want to add this section?</p>";
             confirmButtonText="Yes, I want to add";
        }else{
             title="<h2>UPDATE SECTION</h2>";
             html="<p>Are you sure you want to update this section?</p>";
             confirmButtonText="Yes, I want to update";
        }
    
        // Show confirmation dialog using SweetAlert2
        Swal.fire({
                title:title,
                html: html,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, I want to add',
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
                    submitFormViaAjax(active_section, form, url);
                }
            });
        
        });
    
    
    // Handle submission of FAQ question form    
    $(document).on('click', '.drawer-actions-faq-submit-btn', function(event){
        event.preventDefault();
    
        // Validate form fields before submission
        if (!validateFAQForm()) {
            return false;
        }
    
        var form = $('.faq-details-drawer #FAQForm')[0];
        var active_section='faq-question';
        var url = `${baseLocation}/update_faq_question`;
    
        $('body').css('overflow', 'auto');

        // Set confirmation dialog text based on form type (add vs update)
        var form_type = $('#faq-hidden').val();
        var title="";
        var html="";
        var confirmButtonText="";
    
        if (form_type == "add") {
            title="<h2>ADD QUESTION</h2>";
            html="<p>Are you sure you want to add this question?</p>";
            confirmButtonText="Yes, I want to add";
        }else{
            title="<h2>UPDATE QUESTION</h2>";
            html="<p>Are you sure you want to update this question?</p>";
            confirmButtonText="Yes, I want to update";
        }
    
        // Show confirmation dialog using SweetAlert2
        Swal.fire({
                title:title,
                html: html,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: confirmButtonText,
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
                    submitFormViaAjax(active_section,form,url);
                }
            });
        
        });
    
    // Helper function to submit form data via AJAX
    function submitFormViaAjax(active_section,form,url){
        // Create FormData object from form
        var formData = new FormData(form);
        
        // Abort any existing request
        if (currentSubmitFormRequest && currentSubmitFormRequest.state() === 'pending') {
            currentSubmitFormRequest.abort();
        }
        // Store the new request
        currentSubmitFormRequest = $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            timeout:20000, // 20 seconds
            beforeSend: function() {
                // // Show loading indicator
                show_sweet2alert_loader("Processing...");
            },
            success: function(response) {

                if (response.csrf_hash) {
                    $('input[name="csrf_ar"]').val(response.csrf_hash); // Update form with new token
                }

                if (response.success) {
                    // Show success message and close drawer
                    window.successMsg(response.message, active_section);
                    $('.faq-details-drawer').removeClass('open');
                } else {
                    // Show error message
                    window.errorMsg(response.message);
                }
            },
            error: function(xhr, status, error) {
                // Handle AJAX errors
                window.errorMsg('An error occurred while processing your request. Please refresh and try again.');
                console.log('Error submitting form:', error);
            },
            dataType:'json',
        });
    }
    
    
    // Validate FAQ section form fields
    function validateSECForm() {
        var isValid = true;    
        // Define required fields
        var requiredFields = {
            'name': 'Name',
        };
        
        // Check each required field for valid input
        Object.keys(requiredFields).forEach(function(fieldName) {
            var field = $('#FAQSecForm #' + fieldName);
            var value = field.val().trim();
            if (!value) {
                isValid = false;
                // Add error styling and message if invalid
                if(!field.hasClass('is-invalid')){
                    field.addClass('is-invalid');
                    field.after('<span class="text-danger">This field is required</span>');
                }
            } else {
                // Remove error styling if valid
                field.removeClass('is-invalid');
                field.next('.text-danger').remove();
            }
            // Remove error indicators after 3 seconds
            setTimeout(() => {
                field.removeClass('is-invalid');
                field.next('.text-danger').remove();
            }, 3000);
        });
        
        return isValid;
    }
    
    // Validate FAQ question form fields
    function validateFAQForm() {
        var isValid = true;
        
        // Define required fields
        var requiredFields = {
            'question': 'Question',
            'answer': 'Answer',
            'updated_by': 'Updated_By',
        };
        
        // Check each required field for valid input
        Object.keys(requiredFields).forEach(function(fieldName) {
            var field = $('#FAQForm #' + fieldName);
            var value = field.val().trim();
            if (!value) {
                isValid = false;
                // Add error styling and message if invalid
                if(!field.hasClass('is-invalid')){
                    field.addClass('is-invalid');
                    field.after('<span class="text-danger">This field is required</span>');
                }
            } else {
                // Remove error styling if valid
                field.removeClass('is-invalid');
                field.next('.text-danger').remove();
            }
            // Remove error indicators after 3 seconds
            setTimeout(() => {
                field.removeClass('is-invalid');
                field.next('.text-danger').remove();
            }, 3000);
        });
    
        return isValid;
    }
    
    });