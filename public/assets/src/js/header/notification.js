$(document).ready(function() {
    // Cache DOM selectors
    const $notificationDropdown = $('.notification-dropdown');
    const $notificationCount = $('.notification-count');
    const $desktopNotifications = $('.desktop-notifications-items');
    const $mobileNotifications = $('.mobile-notifications-items');
    const $ajaxLoader = $('#ajax_loader');
    let currentNotificationRequest; // Stores current AJAX request for notification data

    // Event delegation for notification toggles
    $(document).on('click', '#notificationToggle, #notificationToggleMobile, #compact-music-dropdown', function(e) {
        e.stopPropagation();
        $(this).siblings('.notification-dropdown').slideToggle(200);
    });

    // Close dropdown when clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.notification-wrapper').length) {
            $notificationDropdown.slideUp(200);
        }
    });

    // Load notifications function
    window.load_notification_on_page_load = function() {
        const url = window.notificationUrl || window.location.origin + '/Notification/notification_header';
        // Abort any existing request
        if (currentNotificationRequest && currentNotificationRequest.state() === 'pending') {
            currentNotificationRequest.abort();
        }
        // Store the new request
        currentNotificationRequest = $.ajax({
            url: url,
            type: 'get',
            data: {
                url:url
            },
            dataType: 'json',
            success: function(response) {
                $notificationCount.html(response.total_notifications);
                $desktopNotifications.html(response.notifications);
                $mobileNotifications.html(response.notifications);
            },
            error: function(error) {
                console.log('Error loading notifications:', error);
                $desktopNotifications.html('Error loading notifications, please refresh.');
                $mobileNotifications.html('Error loading notifications, please refresh.');
            },
        });
    };
});