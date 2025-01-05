
// Get the base URL of the current page (e.g., "https://example.com")
const baseLocation = window.location.origin;

let currentNRequest; // Stores current AJAX request for notification data
let currentNDelRequest; // Stores current AJAX request for notification deletion
let currentUDTRequest; // Stores current AJAX request for notification update

$(document).ready(function () {
    // Show the loader initially

    // Creating an array of promises for each AJAX request
    const promises = [
        window.load_artist_notifications_on_page_load()
    ];

    // Wait for all AJAX requests to complete before hiding the loader
    Promise.all(promises)
        .then(() => {
            $("#ajax_loader").fadeOut("slow");
        })
        .catch((error) => {
            console.log("Error:", error);
        });

});

/**
 * Loads artist notifications via AJAX when page loads
 * Makes a GET request to fetch notification data and updates the notification container
 * @returns {Promise} jQuery AJAX promise
 */
window.load_artist_notifications_on_page_load = function () {
    // Construct the URL for the AJAX request
    const url = `${baseLocation}/Notification/ajax_artist_notification_index`;

    // Abort any existing request
    if (currentNRequest && currentNRequest.state() === 'pending') {
        currentNRequest.abort();
    }
    // Store the new request
    currentNRequest = $.ajax({
        url: url,
        type: 'get',
        beforeSend: function (jqXHR) {
            // Clear existing notifications and show loading placeholder
            $('.notification-container').empty();
            $('#notification-content-placeholder').show();
        },
        success: function(response){
            // Update container with new notification data
            var html = response;
            $('#notification-content-placeholder').hide();
            $('.notification-container').html(html);
        },
        error: function (error) {
            // Handle AJAX errors
            $('#notification-content-placeholder').hide();
            window.errorMsg('An error occurred while processing your request. Please refresh and try again.');
            console.log('Error submitting form:', error);
        },
        dataType: 'html'  
    });
}

/**
 * Updates the drawer action button text and icon based on notification read status
 * @param {string} read_status - '0' for unread/active, '1' for read
 * Toggles between "Mark as Read" and "Mark as Unread" with corresponding icons
 */
window.update_drawer_action_mark_btn_and_icon = function (read_status){
    var mark_btn_text = "MARK AS READ";
    var $markBtn = $('.drawer-actions .mark-btn');

    if(read_status == 0) {
        // For unread notifications - show "Mark as Read" with eye icon
        mark_btn_text = "MARK AS READ";
        $markBtn.html(`
            <i class="ri-eye-line"></i>
            <i class="ri-eye-off-line" style="display: none;"></i>
            ${mark_btn_text}
            `);
    } else {
        // For read notifications - show "Mark as Unread" with crossed eye icon
        mark_btn_text = "MARK AS UNREAD";
        $markBtn.html(`
            <i class="ri-eye-line" style="display: none;"></i>
            <i class="ri-eye-off-line"></i>
            ${mark_btn_text}
            `);
    }
}

/**
 * Deletes a notification via AJAX
 * @param {string|number} notification_id - ID of notification to delete
 * Makes POST request to delete endpoint with CSRF protection
 * Shows loading indicator during request
 * Displays success/error message via SweetAlert2
 */
window.delete_selected_notification = function (notification_id) {
    // Construct delete endpoint URL
    const url = `${baseLocation}/delete_notification`;

    // Get CSRF token values for security
    var csrfName ="<?= csrf_token() ?>";
    var csrfValue ="<?= csrf_hash() ?>";

    // Abort any existing request
    if (currentNDelRequest && currentNDelRequest.state() === 'pending') {
        currentNDelRequest.abort();
    }
    // Store the new request
    currentNDelRequest = $.ajax({
        url: url,
        type: 'post',
        data:{
            [csrfName]:csrfValue,
            id:notification_id,
        },
        timeout:20000, // 10 seconds timeout
        beforeSend: function (jqXHR) {
            // Show loading indicator while request processes
            const message = "Processing...";
            window.show_sweet2alert_loader(message);
        },
        success: function(response){
            // Update CSRF token if provided in response
            if (response.csrf_hash) {
                $('input[name="csrf_ar"]').val(response.csrf_hash);
            }
            // Show success/error message based on response
            if (response.success) {
                window.successMsg(response.message);
            }else{
                window.errorMsg(response.message);
            }
        },
        error: function (error) {
            // Handle AJAX errors
            window.errorMsg('An error occurred while processing your request. Please refresh and try again.');
            console.log('Error submitting form:', error);
        },
        dataType: 'json'
    });
}
