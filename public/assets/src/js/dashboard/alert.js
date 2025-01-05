    /**
     * Displays an error message using SweetAlert2
     * @param {string} msg - The error message to display
     * @global
     */
    window.show_error_msg=function(msg){
        Swal.fire({
            title: 'Error!',
            text: msg,
            icon: 'error',
            // Custom classes for styling the alert components
            customClass: {
                popup: 'custom-popup',          // Styles the alert container
                title: 'custom-title',          // Styles the alert title
                htmlContainer: 'custom-html-container', // Styles the content container
                icon: 'custom-icon',            // Styles the error icon
                confirmButton: 'custom-confirm-button' // Styles the confirm button
            },
            buttonsStyling: false // Disable default button styles
        });
    }