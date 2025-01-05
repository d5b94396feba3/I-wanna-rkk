
let currentAccountDataRequest; // Stores current AJAX request for submit form

$(document).ready(function () {

    // Creating an array of promises for each AJAX request
    const promises = [
        window.load_artist_direct_artist_support_data_OnPageLoad(),
        window.generate_users_charts_on_page_load(),
        window.generate_income_charts_on_page_load()
    ];

    // Wait for all AJAX requests to complete before hiding the loader
    Promise.all(promises)
        .then(() => {
            // $("#ajax_loader").fadeOut("slow");
        })
        .catch((error) => {
            console.log("Error:", error);
        });
});

window.load_artist_direct_artist_support_data_OnPageLoad = function() {

    var url = window.location.origin + '/DirectArtistSupport/ajax_direct_artist_support_onPageLoad';

    // Abort any existing request
    if (currentAccountDataRequest && currentAccountDataRequest.state() === 'pending') {
        currentAccountDataRequest.abort();
    }
    // Store the new request
    currentAccountDataRequest = $.ajax({
        url: url,
        type: 'GET',
        timeout:20000, // 20 seconds
        beforeSend: function (jqXHR) {
            // $('#ajax_loader').show();
        },
        success: function(response){
            $('#ajax_loader').fadeOut("slow");
            $('#das-container-placeholder').hide(); 
            $('#das-container').html(response);                
        },
        error: function(xhr, status, error) {
            // Handle AJAX errors
            $('#das-container-placeholder').hide();
            window.show_error_msg('An error occurred while processing your request. Please refresh and try again.');
            console.log('Error submitting form:', error);
        },
        dataType: 'html'  
    });
}

