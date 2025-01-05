let currentRequest; // Stores current AJAX request for notification data

// Reload notification dashboard data when clicking secondary navigation items
$(document).on('click', '.secondary-nav-item', function(e) {
    e.preventDefault();
    window.load_notification_dashboard_data();
});

// Handle pagination clicks in the notification table
$(document).on('click', '.notification-table-a', function(e) {
    e.preventDefault();
    var pageUrl = $(this).attr('href');    

    window.fetchNotificationDashboardData(pageUrl);
});

// Handle pagination clicks in the notification table
$(document).on('click', '.pagination a', function(e) {
    e.preventDefault();
    var pageUrl = $(this).attr('href');    

    window.fetchNotificationDashboardData(pageUrl);
});

// Open drawer to add new notification
$(document).on('click', '.add-notificaton-btn', function(event) {
    event.preventDefault();
    // Set click type to 'add' for new notification
    var click_btn = 'add';
    
    // Set ID to 0 since this is a new notification
    var id = 0;
    
    // Update the drawer fields with empty values for new notification
    window.update_notification_drawer_fields(click_btn, id);
    
    // Update drawer action buttons to show submit button instead of update
    window.update_drawer_action_mark_btn_and_icon(click_btn);
    
    // Open the notification details drawer
    $('.notification-details-drawer').addClass('open');
});

// Open drawer to edit existing notification
$(document).on('click', '.edit-notificaton-btn', function(event) {
    event.preventDefault();
    // Get the notification ID from the clicked button's data attribute
    var id = $(this).data("id");
    // Set click type to 'update' for editing existing notification
    var click_btn = 'update';

    // Update drawer fields and buttons for edit mode
    window.update_notification_drawer_fields(click_btn, id);
    // Update the drawer action button and icon to show update mode
    window.update_drawer_action_mark_btn_and_icon(click_btn);
    // Store the notification ID as a data attribute on the drawer
    $('.notification-details-drawer').attr('data-notificaton-id', id);
    // Open the notification details drawer
    $('.notification-details-drawer').addClass('open');
});

// Close drawer when clicking close button or icon
$(document).on('click', '.close-drawer', function() {
    $('.notification-details-drawer').removeClass('open');
});

$(document).on('click', '.close-drawer-btn', function() {
    $('.notification-details-drawer').removeClass('open');
});

// Close notification and FAQ popups
$(document).on('click', '.close-btn', function() {
    $('#NotifcationPOPUP').hide();
    $('#fAQSecPopup').hide();
});

// Handle delete notification from drawer
$(document).on('click', '.drawer-delete-btn', function(event) {
    event.preventDefault();
    var notification_id = $('.notification-details-drawer').attr('data-notificaton-id');

    // Show confirmation dialog before deleting
    Swal.fire({
        title: '<h2>DELETE NOTIFICATION</h2>',
        html: '<p>Are you sure you want to delete this notification?</p>',
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
            window.delete_selected_notification(notification_id);
        }
    });
});

// Handle submission of new notification
$(document).on('click', '.drawer-actions-submit-btn', function(event) {
    event.preventDefault();

    // Validate form before submission
    if (!window.validateNotificationForm()) {
        return false;
    }

    var url = window.location.origin + '/add_notification';

    // Show confirmation dialog before adding
    Swal.fire({
        title: '<h2>ADD NOTIFICATION</h2>',
        html: '<p>Are you sure you want to add this notification?</p>',
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
            window.submitNotificationFormViaAjax(url);
        }
    });
});

// Handle updating existing notification
$(document).on('click', '.drawer-actions-update-btn', function(event) {
    event.preventDefault();

    // Validate form before update
    if (!window.validateNotificationForm()) {
        return false;
    }

    var url = window.location.origin + '/update_notification';

    // Show confirmation dialog before updating
    Swal.fire({
        title: '<h2>UPDATE NOTIFICATION</h2>',
        html: '<p>Are you sure you want to update this notification?</p>',
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
            window.submitNotificationFormViaAjax(url);
        }
    });
});