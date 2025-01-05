let currentGenrerequest; // Stores current AJAX request for genre data

$(document).ready(function () {
    // Show the loader initially
    const promises = [
        window.load_genres_select_data_OnPageLoad(),
    ];

    // Wait for all AJAX requests to complete before hiding the loader
    Promise.all(promises)
        .then(() => {
            $("#ajax_loader").fadeOut("slow");
        })
        .catch((error) => {
            console.log("Error:", error);
        });

        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 2000);
});

window.load_genres_select_data_OnPageLoad = function() {
        var url = window.location.origin + '/MusicUpload/ajax_genres_in_options_onPageLoad';
        // Abort any existing request
        if (currentGenrerequest && currentGenrerequest.state() === 'pending') {
            currentGenrerequest.abort();
        }
        // Store the new request
        currentGenrerequest = $.ajax({
        url: url,
        type: 'GET',
        timeout:20000, // 20 seconds
        beforeSend: function (jqXHR) {
            // $("#ajax_loader").show();
        },
        success: function(response){
            $('#genre').append(response);
        },
        error: function(xhr, status, error) {
            // Handle AJAX errors
            window.show_error_msg('An error occurred while processing your request. Please refresh and try again.');
            console.log('Error submitting form:', error);
        },
        dataType: 'html'
        });
}

window.update_track_title = function (id){
    var trackTitle=$("#popup_track_title_"+id).val();
    $("#track_title_"+id).val(trackTitle);
}