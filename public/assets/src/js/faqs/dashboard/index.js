// Get the base URL of the current page (e.g., "https://example.com")
const baseLocation = window.location.origin;
window.currentSubmitFormRequest = null; // Stores current AJAX request for submit form
// Global variables for storing AJAX requests
window.currentFAQRequest = null; // Stores current AJAX request for FAQ data
window.searchSECAjax = null; // Stores current AJAX request for FAQ section search
window.searchFAQAjax = null; // Stores current AJAX request for FAQ question search
window.currentDelRequest = null; // Stores current AJAX request for delete faq
// Global configuration object for delete confirmation dialogs
window.deleteDialogConfig = {};

$(document).ready(function () {
        // Initialize array of AJAX requests to be executed on page load
        // Currently only loading FAQ section data, but can be expanded
        const promises = [
            load_faq_section_data()
        ];

        // Wait for all AJAX requests to complete before hiding loading indicator
        Promise.all(promises)
            .then(() => {
                $("#ajax_loader").fadeOut("slow");
            })
            .catch((error) => {
                console.log("Error:", error);
            });

        // Auto-hide any alert messages after 3 seconds    
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 3000);
});

// Global function to load FAQ section data into the dashboard
// Makes AJAX request to fetch HTML content for FAQ sections table
window.load_faq_section_data = function() {

    // Construct URL for FAQ sections data endpoint
    const url = `${baseLocation}/Faqs/ajax_faq_section_dashboard_data`;

    // Abort any existing request
    if (currentSubmitFormRequest && currentSubmitFormRequest.state() === 'pending') {
        currentSubmitFormRequest.abort();
    }
    // Store the new request
    currentSubmitFormRequest = $.ajax({
        url: url,
        type: 'get',
        beforeSend: function (jqXHR) {
            // Clear existing table content and show loading placeholder
            $('.faq-table-content').empty();
            $('#faq-table-container-placeholder').show();
        },
        success: function(response){
            // Update table with new HTML content
            $('#faq-table-container-placeholder').hide();
            $('.faq-table-content').html(response);
        },
        error: function(xhr, status, error) {
            // Handle AJAX errors
            $('#faq-table-container-placeholder').hide();
            window.errorMsg('An error occurred while processing your request. Please refresh and try again.');
            console.log('Error submitting form:', error);
        },
        dataType: 'html'  
    });
}

// Global function to load FAQ question data into the dashboard
// Makes AJAX request to fetch HTML content for FAQ questions table
window.load_faq_question_data=function() {

    // Construct URL for FAQ questions data endpoint
    const url = `${baseLocation}/Faqs/ajax_faq_question_dashboard_data`;

    // Abort any existing request
    if (currentFAQRequest && currentFAQRequest.state() === 'pending') {
        currentFAQRequest.abort();
    }
    // Store the new request
    currentFAQRequest = $.ajax({
        url: url,
        type: 'get',
        timeout:20000, // 20 seconds
        beforeSend: function (jqXHR) {
            // Clear existing table content and show loading placeholder
            $('.faq-table-content').empty();
            $('#faq-table-container-placeholder').show();
        },
        success: function(response){
            // Update table with new HTML content
            var html = response;
            $('#ajax_loader').fadeOut("slow");
            $('#faq-table-container-placeholder').hide();
            $('.faq-table-content').html(html);
        },
        error: function(xhr, status, error) {
            // Handle AJAX errors
            $('#faq-table-container-placeholder').hide();
            window.errorMsg('An error occurred while processing your request. Please refresh and try again.');
            console.log('Error submitting form:', error);
        },
        dataType: 'html'  
    });
}
