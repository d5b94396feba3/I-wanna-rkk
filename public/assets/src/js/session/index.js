function checkSession() {
    $.ajax({
        url: '/check-session', // The endpoint to check session validity
        method: 'GET',
        cache: false,  // Prevent caching of the request
        timeout: 5000, // timeout of 5 seconds
        success: function(response) {
            if (!response.sessionValid) {
                Swal.fire({
                    title: 'Session Expired',
                    text: 'Session expired. Please login again.',
                    icon: 'warning',
                    showCancelButton: false,
                    confirmButtonText: 'OK',
                    timer: 120000, // 2 minute delay
                    timerProgressBar: true, // Shows a progress bar
                    customClass: {
                        popup: 'custom-popup',
                        title: 'custom-title', 
                        htmlContainer: 'custom-html-container',
                        icon: 'custom-icon',
                        confirmButton: 'custom-confirm-button'
                    },
                    buttonsStyling: false
                }).then((result) => {
                    if (result.isConfirmed || result.dismiss === Swal.DismissReason.timer) {
                        window.location.href = response.url || '/login';
                        console.log('Session expired. Redirecting to login page.');
                    }
                });
            }
        },
        error: function(error) {
            console.log('Error checking session status.',error);
        }
    });
}

// Self-executing function for better scoping
(function() {
    try {
        let sessionCheckInterval;
        // Check if authStatus exists and cookie exists
        if (window.authStatus && window.authStatus.authenticated && window.authStatus.cookieStatus) {
            // Check session every 1 day (86400000 milliseconds) 
            sessionCheckInterval = 86400000;
        } else if (window.authStatus && window.authStatus.authenticated) {
            // Check session every 2 hours (7200000 milliseconds)
            sessionCheckInterval = 7200000;
        } else {
            // If not logged in or authStatus undefined, don't set up interval
            return;
        }

        if (sessionCheckInterval) {
            // Set up periodic checks only if interval was set
            setInterval(checkSession, sessionCheckInterval);
        }
    } catch (error) {
        console.error('Session check initialization failed:', error);
    }
})();
