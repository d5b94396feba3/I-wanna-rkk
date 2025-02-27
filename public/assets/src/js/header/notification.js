$(document).ready(function() {
    // Cache DOM selectors
    const $notificationDropdown = $('.notification-dropdown');
    const $notificationCount = $('.notification-count');
    const $headerNotificationCount = $('.header-notification-count');
    const $desktopNotifications = $('.desktop-notifications-items');
    const $mobileNotifications = $('.mobile-notifications-items');
    const $ajaxLoader = $('#ajax_loader');
    let currentNotificationRequest; // Stores current AJAX request for notification data
    let updateNotificationRequest;

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

    // Event delegation for button click
    $(document).on('click', '.mark-all-as-read-btn', function(e) {
        e.preventDefault(); // Prevent the default button action

        const form = $(this).closest('form'); // Get the closest form
        const url = form.attr('action'); // Get the action URL from the form

        // Abort any existing request
        if (updateNotificationRequest && updateNotificationRequest.state() === 'pending') {
            updateNotificationRequest.abort();
        }

        // Store the new request
        updateNotificationRequest = $.ajax({
            url: url,
            type: 'post',
            data: form.serialize(), // Serialize the form data, including CSRF token
            dataType: 'json',
            timeout: 20000, // 20 seconds
            beforeSend: function() {
                // Show loading indicator while request is processing
                show_inline_notification_loader();
            },
            success: function(response) {

                // Update CSRF token if provided in response
                if (response.csrf_hash) {
                    $('input[name="csrf_ar"]').val(response.csrf_hash);
                }
                // Handle success/error response
                if (response.success) {
                    load_notification_on_page_load();
                } else {
                    // Show error message
                    errorMsg(response.message);
                }
            },
            error: function(error) {
                console.log('Error loading notifications:', error);
            },
        });
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
            timeout: 20000, // 20 seconds
            success: function(response) {
                $notificationCount.html(response.total_notifications);
                $headerNotificationCount.html(response.total_notifications);
                $desktopNotifications.html(response.notifications);
                $mobileNotifications.html(response.notifications);
            },
            complete: function(e){
                $notificationDropdown.slideUp(200);
            },
            error: function(error) {
                console.log('Error loading notifications:', error);
                $desktopNotifications.html('Error loading notifications, please refresh.');
                $mobileNotifications.html('Error loading notifications, please refresh.');
            },
        });
    };

    window.show_inline_notification_loader = function(){
        $(".notification-read-icon").hide();
        $(".notification-read-loader-icon").show();
        $(".mark-all-as-read-btn span").html("Processing...");
    }


});