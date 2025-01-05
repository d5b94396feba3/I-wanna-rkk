$(document).ready(function() {

    window.successMsg=function(msg,sec){
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
            // Reload the page after the user clicks "OK"
            if (result.isConfirmed) {
                // location.reload();
                // Determine which load function to call based on section type
                // If sec is 'faq-sec', use load_faq_section_data, otherwise use load_faq_question_data
                const loadFunction = sec === 'faq-sec' ? window.load_faq_section_data : window.load_faq_question_data;
                // Call the selected load function to refresh the data
                loadFunction();
            }
        });
    }
    /**
     * Displays an error message using SweetAlert2
     * @param {string} msg - The error message to display
     * @global
     */
    window.errorMsg=function(msg){
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

    /**
     * Displays a loading spinner with a custom title using SweetAlert2
     * Used to indicate background processes or loading states
     * @param {string} title - The title to display above the loading spinner
     * @global
     */
    window.show_sweet2alert_loader = function(title) {
        Swal.fire({
            title: title,
            // Custom classes for styling the loader components
            customClass: {
                popup: 'custom-popup',          // Styles the loader container
                title: 'custom-title',          // Styles the loader title
                htmlContainer: 'custom-html-container', // Styles the content container
                icon: 'custom-icon',            // Styles the icon
                confirmButton: 'custom-confirm-button' // Styles the confirm button
            },
            allowOutsideClick: false,  // Prevent closing by clicking outside
            allowEscapeKey: false,     // Prevent closing with Escape key
            showConfirmButton: false,  // Hide the confirm button
            didOpen: () => {
                Swal.showLoading();    // Show the loading spinner when alert opens
            }
        });
    }


});