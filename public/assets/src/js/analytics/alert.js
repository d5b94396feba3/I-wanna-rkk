    // Define the function globally
    window.show_success_msg = function(msg) {
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
                location.reload();
            }
        });
    }
    // Define the function globally
    window.show_error_msg = function(msg) {
        // Show an error message
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

    };

    // Define the function globally
    window.show_sweet2alert_loader = function(title) {

        Swal.fire({
            title:title,
            customClass: {
                popup: 'custom-popup',
                title: 'custom-title',
                htmlContainer: 'custom-html-container',
                icon: 'custom-icon',
                confirmButton: 'custom-confirm-button'
            },
            allowOutsideClick: false,
            allowEscapeKey: false,
            showConfirmButton: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
    }