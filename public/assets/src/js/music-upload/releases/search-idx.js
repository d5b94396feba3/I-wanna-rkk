var searchAjax;
let currentRRequest; // Stores current AJAX request for relase data
var url = window.location.origin + '/MusicRelease/artist_release_table_data';

window.search_filter = function(){

    const searchValue = $('#search').val();
    const filterByValue = $('#filterBy').val();    
    if (searchValue.length >= 4 || filterByValue) {
        ajax_search_filter(); 
    } else if (searchValue.length == 0 || filterByValue.length == 0){
        load_artist_release_data();
    }

}

window.ajax_search_filter = function() {


    var filterBy=$('#filterBy').val();
    var search = $('#search').val();
    var artist_id = window.release_info.artist_id;
    // Abort any existing request
    if (searchAjax && searchAjax.state() === 'pending') {
        searchAjax.abort();
    }

    searchAjax =$.ajax({
        url: url,
        data: {
            artist_id:artist_id,
            search: search,
            filterBy: filterBy,
        },
        type: 'GET',
        timeout:20000, // 20 seconds
        beforeSend: function (jqXHR) {
            $('.release-table-content').empty();
            $('#release-tbl-container-placeholder').show();
        },
        success: function(response){
            // Check if response is JSON (session expired) or HTML (normal response)
            if (typeof response === 'object' && response.redirect) {
                show_session_alert(response);
            } else {
                var html = response;
                $('#release-tbl-container-placeholder').hide();
                $('.release-table-content').html(html);
            }
        },
        error: function(xhr, status, error) {
            // Handle AJAX errors
            if (status != 'abort') {
                $('#release-tbl-container-placeholder').hide();
                window.show_error_msg('An error occurred while processing your request. Please wait and try again.');
            }
        },
        // dataType: 'html'
    });

 }

 window.load_artist_release_data = function() {

    var filterBy=$('#filterBy').val();
    var search = $('#search').val();
    var artist_id = window.release_info.artist_id;
    // Abort any existing request
    if (currentRRequest && currentRRequest.state() === 'pending') {
        currentRRequest.abort();
    }
    // Store the new request
    currentRRequest = $.ajax({
        url: url,
        data: {
            artist_id:artist_id,
            search: search,
            filterBy: filterBy,
        },
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
            window.show_error_msg('An error occurred while processing search request. Please refresh and try again.');
            console.log('Error submitting form:', error);
        },
        dataType: 'html'
    });
}


function show_session_alert(response){

    Swal.fire({
        title: 'Session Expired',
        text: 'Your session has expired. You will be logged out.',
        icon: 'warning',
        showCancelButton: false,
        confirmButtonText: 'OK',
        customClass: {
            popup: 'custom-popup',
            title: 'custom-title', 
            htmlContainer: 'custom-html-container',
            icon: 'custom-icon',
            confirmButton: 'custom-confirm-button'
        },
        buttonsStyling: false
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = response.url; // Redirect to the login page
            console.log('Session expired. Redirecting to login page.');
        }
    });
}