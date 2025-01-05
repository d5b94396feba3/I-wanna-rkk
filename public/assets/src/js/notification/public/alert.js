// Initialize alert functionality when document is ready
$(document).ready(function() {

    /**
     * Display a success message using SweetAlert2
     * @param {string} msg - The success message to display
     * Shows a customized success popup and reloads notifications on confirmation
     */
    window.successMsg = function(msg) {
        Swal.fire({
            title: 'Success!',
            text: msg,
            icon: 'success',
            // Custom classes for styling the alert popup
            customClass: {
                popup: 'custom-popup',
                title: 'custom-title', 
                htmlContainer: 'custom-html-container',
                icon: 'custom-icon',
                confirmButton: 'custom-confirm-button'
            },
            buttonsStyling: false
        }).then((result) => {
            // When user confirms by clicking OK
            if (result.isConfirmed) {
                // Reload notifications instead of full page refresh
                window.load_artist_notifications_on_page_load();
            }
        });
    }
    
    /**
     * Display an error message using SweetAlert2
     * @param {string} msg - The error message to display
     * Shows a customized error popup with the provided message
     */
    window.errorMsg = function(msg) {
        Swal.fire({
            title: 'Error!',
            text: msg,
            icon: 'error',
            // Custom classes for styling the alert popup
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
     * Display a loading spinner using SweetAlert2
     * @param {string} title - Optional title to display above loader
     * Shows a customized loading popup that can't be dismissed
     * Used during AJAX requests to indicate processing
     */
    window.show_sweet2alert_loader = function(title) {
        Swal.fire({
            title: title,
            // Custom classes for styling the loader popup
            customClass: {
                popup: 'custom-popup',
                title: 'custom-title',
                htmlContainer: 'custom-html-container',
                icon: 'custom-icon',
                confirmButton: 'custom-confirm-button'
            },
            allowOutsideClick: false, // Prevent closing by clicking outside
            allowEscapeKey: false, // Prevent closing with Esc key
            showConfirmButton: false, // Hide the confirm button
            didOpen: () => {
                Swal.showLoading(); // Show the loading spinner
            }
        });
    }

});