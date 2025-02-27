// Use event delegation for dynamically loaded content
/**
 * Event handler for clicking on a notification list item
 * Uses event delegation to handle dynamically loaded notifications
 * 
 * When a notification is clicked:
 * 1. Extracts notification details (title, id, read status, date, message)
 * 2. Updates the notification details drawer with this information
 * 3. Stores notification ID and read status as data attributes
 * 4. Updates the drawer action button text/icon based on read status
 * 5. Opens the notification details drawer
 */
$(document).on('click', '.notification-list-item', function() {
    // Cache jQuery selector for performance
    var $notification = $(this);

    // Extract notification details from DOM
    var title = $notification.find('.notification-list-title span').text();
    var id = $notification.find('.notification-checkbox input').attr('id').replace('notification-', '');

    // Prevent body scrolling when drawer is open
    $('body').css('overflow', 'hidden');
    
    // Determine read status - '0' if active/unread, '1' if read
    var read = $(this).hasClass('active') ? '0' : '1';
    
    // Get date and message content
    var date = $notification.find('.notification-list-content p').text();
    var message = $notification.find('.notification-list-message').text();

    // Update notification details drawer content
    $('.notification-details-drawer .notification-title').text(title);
    $('.notification-details-drawer .notification-date').text(date);
    $('.notification-details-drawer .notification-message').text(message);
    
    // Store notification ID and read status as data attributes for later use
    $('.notification-details-drawer')
        .attr('data-current-id', id)
        .attr('data-read-status', read);

    // Update the drawer action button text and icon based on read status
    window.update_drawer_action_mark_btn_and_icon(read);
    
    // Show the notification details drawer
    $('.notification-details-drawer').addClass('open');
});

// Close drawer - also using event delegation
$(document).on('click', '.close-drawer', function() {
    $('.notification-details-drawer').removeClass('open');
    $('body').css('overflow', 'auto');
});

// Handle mark as unread - using event delegation
$(document).on('click', '.mark-btn', function() {
    var $drawer = $('.notification-details-drawer');
    var notification_id = $drawer.attr('data-current-id');
    var read_status = $drawer.attr('data-read-status');
    $('body').css('overflow', 'auto');
    if (notification_id && read_status !== undefined) {
        window.update_artist_notification_status(notification_id, read_status);
    } else {
        console.log('Missing notification data');
    }
});

// Delete handler - already using event delegation, but moved here for consistency
$(document).on('click', '.delete', function(event) {
    event.preventDefault();
    var notification_id = $('.notification-details-drawer').attr('data-current-id');

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
            // Call the global delete function to remove the notification
            // notification_id: The ID of the notification to delete
            // This will make an AJAX call to delete the notification from the database
            // and show a success/error message via SweetAlert2
            window.delete_selected_notification(notification_id);

            $('body').css('overflow', 'auto');

        }
    });
});