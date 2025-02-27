let currentNotificationRequest; // Stores current AJAX request for notification data
let currentNBRequest; // Stores current AJAX request for notification dashboard data

/**
 * Submits the notification form data via AJAX
 * @param {string} url - The endpoint URL to submit the form to
 */
window.submitNotificationFormViaAjax = function (url){
    // Get form element and create FormData object
    var form = $('#NotifcationForm')[0];
    var formData = new FormData(form);

    // Abort any existing request
    if (currentNotificationRequest && currentNotificationRequest.state() === 'pending') {
        currentNotificationRequest.abort();
    }
    // Store the new request
    currentNotificationRequest = $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        processData: false, 
        contentType: false,
        timeout: 20000, // 20 seconds
        beforeSend: function() {
            // Show loading indicator while request is processing
            show_sweet2alert_loader("Processing...");
        },
        success: function(response) {
            // Update CSRF token if provided in response
            if (response.csrf_hash) {
                $('input[name="csrf_ar"]').val(response.csrf_hash);
            }

            // Handle success/error response
            if (response.success) {
                // Show success message and close drawer
                window.successMsg(response.message);
                $('.notification-details-drawer').removeClass('open');
                load_notification_on_page_load();
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
        dataType:'json', // Expect JSON response
    });
}


/**
 * Loads notification dashboard data via AJAX
 * Makes a GET request to fetch notification data and updates the table content
 */
window.load_notification_dashboard_data = function() {
    // Construct the URL for the AJAX request
    const url = `${baseLocation}/Notification/ajax_notification_dashboard_data`;

    // Abort any existing request
    if (currentNBRequest && currentNBRequest.state() === 'pending') {
        currentNBRequest.abort();
    }
    // Store the new request
    currentNBRequest = $.ajax({
        url: url,
        type: 'get',
        timeout:20000, // 10 seconds
        beforeSend: function (jqXHR) {
            // Clear existing table content and show loading placeholder
            $('.notification-table-content').empty();
            $('#notification-table-container-placeholder').show();
        },
        success: function(response){
            // Update table with new notification data
            var html = response;
            $('#notification-table-container-placeholder').hide();
            $('.notification-table-content').html(html);
        },
        error: function(xhr, status, error) {
            $('#notification-table-container-placeholder').hide();
            window.errorMsg('An error occurred while processing your request. Please refresh and try again.');
            console.log('Error submitting form:', error);
        },
        dataType: 'html'  
    });
}


window.fetchNotificationDashboardData = function (pageUrl){

    // Abort any existing request
    if (currentRequest && currentRequest.state() === 'pending') {
        currentRequest.abort();
    }
    var filter_by=$('#filter_by').val();
    var search = $('#search').val();
    // Store the new request
    currentRequest = $.ajax({
        url: pageUrl,
        data: {
            search: search,
            filter_by: filter_by,
        },
        type: 'Get',
        timeout: 20000, // 20 second timeout
        beforeSend: function(jqXHR) {
            // Clear current content and show loading placeholder
            $('.notification-table-content').empty();
            $('#notification-table-container-placeholder').show();
        },
        success: function(html) {
            // Hide loader and update table content
            $('#notification-table-container-placeholder').hide();
            $('.notification-table-content').html(html);
        },
        error: function(xhr, status, error) {
            $('#notification-table-container-placeholder').hide();
            window.errorMsg('An error occurred while processing your request. Please refresh and try again.');
            console.log('Error submitting form:', error);
        },
        dataType: 'html'
    });

}

