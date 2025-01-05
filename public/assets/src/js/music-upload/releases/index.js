let currentReleaseRequest; // Stores current AJAX request for relase data
let currentReleasePendingRequest; // Stores current AJAX request for relase pending data

$(document).ready(function () {

    // Creating an array of promises for each AJAX request
    const promises = [
        window.load_release_pending_data_OnPageLoad(),
        window.load_artist_release_data_OnPageLoad(),
    ];

    // Wait for all AJAX requests to complete before hiding the loader
    Promise.all(promises)
        .then(() => {
            $("#ajax_loader").fadeOut("slow");
        })
        .catch((error) => {
            console.log("Error:", error);
        });
});

window.load_artist_release_data_OnPageLoad = function() {

    var url = window.location.origin + '/MusicRelease/artist_release_table_data';
    // Abort any existing request
    if (currentReleaseRequest && currentReleaseRequest.state() === 'pending') {
        currentReleaseRequest.abort();
    }
    // Store the new request
    currentReleaseRequest = $.ajax({
        url: url,
        type: 'GET',
        timeout:20000, // 20 seconds
        beforeSend: function (jqXHR) {
            $('.release-table-content').empty();
            $('#release-tbl-container-placeholder').show();
        },
        success: function(data){
            $('#release-tbl-container-placeholder').hide();
            $('.release-table-content').html(data);
        },
        error: function(xhr, status, error) {
            // Handle AJAX errors
            $('#release-tbl-container-placeholder').hide();
            window.show_error_msg('An error occurred while processing your request. Please refresh and try again.');
            console.log('Error submitting form:', error);
        },
        dataType: 'html'
    });
}

window.load_release_pending_data_OnPageLoad = function () {

        var url = window.location.origin + '/MusicRelease/ajax_music_release_pending_data_onPageLoad';
        // Abort any existing request
        if (currentReleasePendingRequest && currentReleasePendingRequest.state() === 'pending') {
            currentReleasePendingRequest.abort();
        }
        // Store the new request
        currentReleasePendingRequest = $.ajax({
            url: url,
            type: 'GET',
            timeout:20000, // 20 seconds
            beforeSend: function (jqXHR) {
                // $("#ajax_loader").show(); 
            },
            success: function(data){
                $('.pending-number').html(data);
            },
            error: function(xhr, status, error) {
                // Handle AJAX errors
                window.show_error_msg('An error occurred while processing your request. Please refresh and try again.');
                console.log('Error submitting form:', error);
            },
            dataType: 'text'  
        });
}