
window.faq_search_filter = function(){

    const searchValue = $('#faq-search').val();
    const orderByValue = $('#faq-orderBy').val();

    if (searchValue.length >= 4 || orderByValue) {
        window.ajax_faq_search_filter(); 
    } else if (searchValue.length == 0){
        window.load_faq_question_data();
    }

}

window.ajax_faq_search_filter = function() {

    var orderBy=$('#faq-orderBy').val();
    var search = $('#faq-search').val();

    const url = `${baseLocation}/Faqs/ajax_faq_question_dashboard_data`;

    // Abort any existing request
    if (searchFAQAjax && searchFAQAjax.state() === 'pending') {
        searchFAQAjax.abort();
    }

    searchFAQAjax =$.ajax({
        url: url,
        data: {
            search: search,
            sort_column: orderBy,
        },
        type: 'GET',
        timeout:20000, // 20 seconds
        beforeSend: function (jqXHR) {
            // Clear existing table content and show loading placeholder
            $('.faq-table-content').empty();
            $('#faq-table-container-placeholder').show();
        },
        success: function(response){
            // Check if response is JSON (session expired) or HTML (normal response)
            if (typeof response === 'object' && response.redirect) {
                show_session_alert(response);
            } else {
                var html = response;
                $('#ajax_loader').fadeOut("slow");
                $('#faq-table-container-placeholder').hide();
                $('.faq-table-content').html(html);
            }
        },
        error: function(xhr, status, error) {
            // Handle AJAX errors
            if (status != 'abort') {
                $('#faq-table-container-placeholder').hide();
                window.errorMsg('An error occurred while processing your request. Please wait and try again.');
            }
        },
        // dataType: 'html'
    });

 }

 window.clear_faq_search_fields = function() {
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