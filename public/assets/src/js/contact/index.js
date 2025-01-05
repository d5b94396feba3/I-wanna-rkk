let currentAccountDataRequest; // Stores current AJAX request for submit form

$(document).ready(function () {
    $('#uploadProgressBar').hide();
    $('.contact-form').hide();
    $('#contact-placeholder').show();

    // Creating an array of promises for each AJAX request
    const promises = [
        // load_contact_data_OnPageLoad(),
    ];

    // Wait for all AJAX requests to complete before hiding the loader
    Promise.all(promises)
        .then(() => {
            $('#contact-placeholder').hide();
            $('.contact-form').show();
        })
        .catch((error) => {
            console.log("Error:", error);
        });
});

// archive ajax function to load data dynamically
function load_contact_data_OnPageLoad() {

    var url = '<?= base_url("AccountSetting/ajax_account_setting_artist_data_onPageLoad") ?>';
    
    // Abort any existing request
    if (currentAccountDataRequest && currentAccountDataRequest.state() === 'pending') {
        currentAccountDataRequest.abort();
    }
    // Store the new request
    currentAccountDataRequest = $.ajax({
            url: url,
            type: 'GET',
            beforeSend: function (jqXHR) {
                $('.contact-form').hide();
                $('#contact-placeholder').show();
            },
            success: function(response){
                add_track_html = response;
                $('#contact-placeholder').hide();
                $('.contact-form').show();
            },
            error: function(xhr, status, error) {
                // Handle AJAX errors
                $('#contact-placeholder').hide();
                window.show_error_msg('An error occurred while processing your request. Please refresh and try again.');
                console.log('Error submitting form:', error);
            },
            dataType: 'html'
        });
}