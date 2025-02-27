
window.search_filter = function(){

    const searchValue = $('#search').val();
    const filterByValue = $('#filter_by').val();

    if (searchValue.length >= 4 || filterByValue) {
        ajax_search_filter(); 
    } else if (searchValue.length == 0){
        window.load_registered_artist_dashboard_data();
    }

}

window.ajax_search_filter = function() {

    var filter_by=$('#filter_by').val();
    var search = $('#search').val();

    const url = `${baseLocation}/DashboardAdmin/ajax_registered_artists_data`;

    // Abort any existing request
    if (searchNAjax && searchNAjax.state() === 'pending') {
        searchNAjax.abort();
    }

    searchNAjax =$.ajax({
        url: url,
        data: {
            search: search,
            filter_by: filter_by,
        },
        type: 'GET',
        timeout:20000, // 20 seconds
        beforeSend: function (jqXHR) {
            // Clear existing table content and show loading placeholder
            $('.registered-artist-table-content').empty();
            $('#registered-artist-table-container-placeholder').show();
        },
        success: function(response){
            // Check if response is JSON (session expired) or HTML (normal response)
            if (typeof response === 'object' && response.redirect) {
                show_session_alert(response);
            } else {
                var html = response;
                $('#registered-artist-table-container-placeholder').hide();
                $('.registered-artist-table-content').html(html);
            }
        },
        error: function(xhr, status, error) {
            if (status != 'abort') {
                $('#registered-artist-table-container-placeholder').hide();
                window.errorMsg('An error occurred while processing your request. Please wait and try again.');
            }
        },
        // dataType: 'html'
    });

 }

 window.clear_search_fields = function() {
    $('#search').val('');
    $('#orderBy').val('');    
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
