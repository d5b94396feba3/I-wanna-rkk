let currentArtistRequest; // Stores current AJAX request for artist data
let currentNBRequest; // Stores current AJAX request for artist dashboard data

/**
 * Submits the artist form data via AJAX
 * @param {string} url - The endpoint URL to submit the form to
 */
window.submitArtistFormViaAjax = function (url){
    // Get form element and create FormData object
    var form = $('#ArtistForm')[0];
    var formData = new FormData(form);

    // Abort any existing request
    if (currentArtistRequest && currentArtistRequest.state() === 'pending') {
        currentArtistRequest.abort();
    }
    // Store the new request
    currentArtistRequest = $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        processData: false, // Don't process the data
        contentType: false, // Don't set content type (browser will set it)
        timeout: 20000, // 10 seconds
        beforeSend: function() {
            // Show loading indicator while request is processing
            show_sweet2alert_loader("Processing...");
        },
        success: function(response) {
            // Update CSRF token if provided in response
            if (response.csrf_hash) {
                $('input[name="csrf_ar"]').val(response.csrf_hash);
            }

            // Handle success/error response
            if (response.success) {
                // Show success message and close drawer
                window.successMsg(response.message);
                $('.registered-artist-details-drawer').removeClass('open');
            } else {
                // Show error message
                window.errorMsg(response.message);
            }
        },
        error: function(xhr, status, error) {
            // Handle AJAX errors
            window.errorMsg('An error occurred while processing your request. Please refresh and try again.');
            console.log('Error submitting form:', error);
        },
        dataType:'json', // Expect JSON response
    });
}




window.fetchArtistDashboardData = function (pageUrl){

    var filter_by=$('#filter_by').val();
    var search = $('#search').val();
    // Abort any existing request
    if (currentRequest && currentRequest.state() === 'pending') {
        currentRequest.abort();
    }
    // Store the new request
    currentRequest = $.ajax({
        url: pageUrl,
        data:{
            search: search,
            filter_by: filter_by,
        },
        type: 'Get',
        timeout: 20000, // 20 second timeout
        beforeSend: function(jqXHR) {
            // Clear current content and show loading placeholder
            $('.registered-artist-table-content').empty();
            $('#registered-artist-table-container-placeholder').show();
        },
        success: function(html) {
            // Hide loader and update table content
            $('#registered-artist-table-container-placeholder').hide();
            $('.registered-artist-table-content').html(html);
        },
        error: function(xhr, status, error) {
            $('#registered-artist-table-container-placeholder').hide();
            window.errorMsg('An error occurred while processing your request. Please refresh and try again.');
            console.log('Error submitting form:', error);
        },
        dataType: 'html'
    });

}

