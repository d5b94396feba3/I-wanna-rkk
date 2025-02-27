let currentRequest; // Stores current AJAX request for relase tbl data

$(document).on('click', '.release-tbl-a, .pagination a', function(e) {
    e.preventDefault();
    var pageUrl = $(this).attr('href');
    var orderBy=$('#orderBy').val();
    var search = $('#search').val();
    // Abort any existing request
    if (currentRequest && currentRequest.state() === 'pending') {
        currentRequest.abort();
    }
    // Store the new request
    currentRequest = $.ajax({
        url: pageUrl,
        type: 'Get',
        data: {
            search: search,
            sort_column: orderBy,
        },
        timeout:20000, // 20 seconds
        beforeSend: function(jqXHR) {
            $('.release-table-content').empty();
            $('#release-tbl-container-placeholder').show();
        },
        success: function(data) {
            $('#release-tbl-container-placeholder').hide();
            $('.release-table-content').html(data);
        },
        error: function(xhr, status, error) {
            // Handle AJAX errors
            $('#release-tbl-container-placeholder').hide();
            window.show_error_msg('An error occurred while processing your request. Please refresh and try again.');
            console.error('Error submitting form:', error);
        },
        dataType: 'html'
    });
});
