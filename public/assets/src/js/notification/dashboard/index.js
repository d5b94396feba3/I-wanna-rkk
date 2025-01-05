// Get the base URL of the current page (e.g., "https://example.com")
const baseLocation = window.location.origin;
// Global variable to store the current search AJAX request
// This allows canceling pending searches when a new search is initiated
window.searchNAjax = null;
// When the document is ready, initialize the dashboard
$(document).ready(function () {
    // Create an array of promises for AJAX requests that need to run on page load
    const promises = [
        // Load the initial notification dashboard data
        window.load_notification_dashboard_data()
    ];

    // Wait for all AJAX requests to complete before hiding the loader
    Promise.all(promises)
        .then(() => {
            // Fade out the loading indicator once all requests are done
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
/**
 * Updates the notification drawer fields based on whether adding or editing
 * @param {string} click - The type of action ('add' or 'update')
 * @param {number} id - The notification ID when editing, 0 when adding
 */
window.update_notification_drawer_fields = function (click,id){
    // Define form field selectors       
    const formFields = {
        title: $('.notification-details-drawer #title'),
        content: $('.notification-details-drawer #content'), 
        imgUrl: $('.notification-details-drawer #imgUrl'),
        types: $('.notification-details-drawer #types'),
        status: $('.notification-details-drawer #status'),
        createdAt: $('.notification-details-drawer #createdAt'),
        updatedAt: $('.notification-details-drawer #updatedAt')
    };

    // Default values for adding new notification
    let request_type = 'add';
    let request_title = 'ADD NOTIFICATION';
    let request_btn = 'SUBMIT';

    if(click === 'add') {
        // For new notification, clear all form fields
        Object.values(formFields).forEach(field => field.val(''));
        $('.drawer-additional-fields').hide();

    } else {
        // For editing, populate form with existing notification data
        const values = {
            title: $('.tb-title-' + id).text(),
            content: $('.tb-content-' + id).text(),
            imgUrl: $('.tb-imgurl-' + id).text(),
            types: $('.tb-types-' + id).text(),
            status: $('.tb-status-' + id).text().trim().toLowerCase(),
            createdAt: $('.tb-createdAt-' + id).text(),
            updatedAt: $('.tb-updatedAt-' + id).text(),
        };

        // Set each form field value
        Object.entries(values).forEach(([key, value]) => {
            formFields[key].val(value);
        });

        // Update request info for editing
        request_type = 'update';
        request_title = 'UPDATE NOTIFICATION';
        request_btn = 'UPDATE';

        $('.drawer-additional-fields').show();

        $('#request-type').val(request_type);
        $('#notification-id').val(id);
    }

    // Update drawer header title
    $('.notification-details-drawer .drawer-header h3').text(request_title);
}

/**
 * Updates the drawer action buttons based on add/edit mode
 * @param {string} click_btn - The type of action ('add' or 'update')
 */
window.update_drawer_action_mark_btn_and_icon = function(click_btn) {
    var drawer_actions_add = $('.drawer-actions-add');
    var drawer_actions_update = $('.drawer-actions-update');

    // Show/hide appropriate action buttons
    if (click_btn == 'add') {
        drawer_actions_add.show();
        drawer_actions_update.hide();
    } else {
        drawer_actions_add.hide();
        drawer_actions_update.show();
    }
}

/**
 * Validates the notification form
 * Checks required fields and displays error messages
 * @returns {boolean} True if form is valid, false otherwise
 */
window.validateNotificationForm = function() {
    var isValid = true;

    // Define required fields and their display names
    var requiredFields = {
        'title': 'Title',
        'content': 'Content', 
        'types': 'Types',
        'status': 'Status'
    };

    // Validate each required field
    Object.keys(requiredFields).forEach(function(fieldName) {
        var field = $('#NotifcationForm #' + fieldName);
        var value = field.val().trim();
        
        // Check if field is empty
        if (!value) {
            isValid = false;
            if (!field.hasClass('is-invalid')) {
                // Add error styling and message
                field.addClass('is-invalid');
                field.after('<span class="text-danger">This field is required</span>');
            }
        } else {
            // Clear error styling and message
            field.removeClass('is-invalid');
            field.next('.text-danger').remove();
        }
        
        // Auto-remove error messages after 3 seconds
        setTimeout(() => {
            field.removeClass('is-invalid');
            field.next('.text-danger').remove();
        }, 3000);
    });

    return isValid;
}
