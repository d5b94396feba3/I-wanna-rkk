/**
 * Initialize notification filtering and selection functionality when document is ready
 * Handles toggling between all/unread notifications and bulk selection
 */
$(document).ready(function() {

    /**
     * Event handler for the show unread toggle switch
     * When toggled on: Shows only unread (active) notifications
     * When toggled off: Shows all notifications
     */
    $('#show-unread-toggle').on('change', function() {
        if ($(this).is(':checked')) {
            // Iterate through each notification item when showing only unread
            $('.notification-list-item').each(function() {
                var $notification = $(this);
                // Check if notification has 'active' class (unread status)
                var notification_active = $notification.hasClass('active');
                
                // Show notification if unread (active), hide if read
                if (notification_active) {
                    $notification.show();
                } else {
                    $notification.hide();
                }
            });
        } else {
            // When toggle is off, show all notifications
            $('.notification-list-item').show();
            console.log('Show all notifications');
        }
    });

    /**
     * Event handler for the select all checkbox
     * When checked: Selects all notification checkboxes
     * When unchecked: Deselects all notification checkboxes
     * Used for bulk operations on notifications
     */
    $('#select-all-notifications').on('change', function() {
        // Update all notification checkboxes to match select all checkbox state
        $('.notification-checkbox input[type="checkbox"]').prop('checked', $(this).is(':checked'));
    });
});