$(document).ready(function () {
      // update release detail confirm popup
       $('#ContactForm').on('submit', function(e) {
        e.preventDefault(); 

        Swal.fire({
            title: '<h2>SEND MESSAGE</h2>',
            html: '<p>Are you sure you want to sent the message?</p>',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, I want to send',
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
                this.submit();
            }
        });
    });
});
