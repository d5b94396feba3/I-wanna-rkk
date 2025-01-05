let currentSubmitRequest; // Stores current AJAX request for submit form

$(document).ready(function () {
    // Show the loader initially
    $('.artist-container').hide();
    $('#artist-info-placeholder').show();
    
    // Creating an array of promises for each AJAX request
    const promises = [
        // load_artist_data_OnPageLoad(),
    ];

    // Wait for all AJAX requests to complete before hiding the loader
    Promise.all(promises)
        .then(() => {
            $('#artist-info-placeholder').hide();
            $('.artist-container').show();
        })
        .catch((error) => {
            console.log("Error:", error);
        });

    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 2000);

});

// archive ajax function to load data dynamically
window.load_artist_data_OnPageLoad = function () {
    var url = '<?= base_url("AccountSetting/ajax_account_setting_artist_data_onPageLoad") ?>';
    // Abort any existing request
    if (currentSubmitRequest && currentSubmitRequest.state() === 'pending') {
        currentSubmitRequest.abort();
    }
    // Store the new request
    currentSubmitRequest = $.ajax({
        url: url,
        type: 'GET',
        timeout:20000, // 20 seconds
        beforeSend: function (jqXHR) {
            $('.artist-container').hide();
            $('#artist-info-placeholder').show();
        },
        success: function(response){
            $('#artist-info-placeholder').hide();
            $('.artist-container').show();
        },
        error: function(xhr, status, error) {
            // Handle AJAX errors
            $('#artist-info-placeholder').hide();
            window.show_error_msg('An error occurred while processing your request. Please refresh and try again.');
            console.log('Error submitting form:', error);
        },
        dataType: 'html'
    });
}