/**
 * Initialize SweetAlert2 notification functions when document is ready
 * Defines global functions for success, error and loading alerts
 * Uses custom styling classes for consistent UI appearance
 */
$(document).ready(function() {

    /**
     * Display a success message using SweetAlert2
     * @param {string} msg - The success message to display
     * Shows a success popup with custom styling and reloads notification data on confirmation
     */
    window.successMsg = function(msg) {
        Swal.fire({
            title: 'Success!',
            text: msg,
            icon: 'success',
            customClass: {
                popup: 'custom-popup',
                title: 'custom-title', 
                htmlContainer: 'custom-html-container',
                icon: 'custom-icon',
                confirmButton: 'custom-confirm-button'
            },
            buttonsStyling: false
        }).then((result) => {
            // When user confirms, reload notification dashboard data
            if (result.isConfirmed) {
                // Reload the notification dashboard data after successful operation
                // This ensures the UI is updated with the latest notification data
                // Makes an AJAX request to fetch and display fresh notification content
                window.load_notification_dashboard_data();
            }
        });
    }
    
    /**
     * Display an error message using SweetAlert2
     * @param {string} msg - The error message to display
     * Shows an error popup with custom styling
     */
    window.errorMsg = function(msg) {
        Swal.fire({
            title: 'Error!',
            text: msg,
            icon: 'error',
            customClass: {
                popup: 'custom-popup',
                title: 'custom-title',
                htmlContainer: 'custom-html-container',
                icon: 'custom-icon',
                confirmButton: 'custom-confirm-button'
            },
            buttonsStyling: false
        });
    }

    /**
     * Display a loading indicator using SweetAlert2
     * @param {string} title - Optional title to display above loader
     * Shows a loading spinner in a modal that cannot be dismissed
     * Used during AJAX requests to indicate processing
     */
    window.show_sweet2alert_loader = function(title) {
        Swal.fire({
            title: title,
            customClass: {
                popup: 'custom-popup',
                title: 'custom-title',
                htmlContainer: 'custom-html-container',
                icon: 'custom-icon',
                confirmButton: 'custom-confirm-button'
            },
            allowOutsideClick: false, // Prevent closing by clicking outside
            allowEscapeKey: false,    // Prevent closing with Esc key
            showConfirmButton: false, // Hide confirm button
            didOpen: () => {
                Swal.showLoading();   // Show the loading spinner
            }
        });
    }

});