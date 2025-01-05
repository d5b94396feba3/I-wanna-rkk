$(document).ready(function() {

    // Handle clicks on FAQ table links
    $(document).on('click', '.ac-table-a', function(e) {
        e.preventDefault();
        var pageUrl = $(this).attr('href');
        $.ajax({
            url: pageUrl,
            type: 'Get',
            timeout:20000, // 20 seconds
            beforeSend: function(jqXHR) {
                // Clear content and show loading placeholder
                $('.faq-table-content').empty();
                $('#faq-table-container-placeholder').show();
            },
            success: function(html) {
                // Hide loader and update content
                $('#faq-table-container-placeholder').hide();
                $('.faq-table-content').html(html);
            },
            error: function(xhr, status, error) {
                // Handle AJAX errors
                $('#faq-table-container-placeholder').hide();
                window.errorMsg('An error occurred while processing your request. Please refresh and try again.');
                console.log('Error submitting form:', error);
            },
            dataType: 'html'
        });
    });

    // Handle clicks on FAQ table and pagination links
    $(document).on('click', '.faq-table-a, .pagination a', function(e) {
        e.preventDefault();
        var pageUrl = $(this).attr('href');

        $.ajax({
            url: pageUrl,
            type: 'Get',
            timeout:20000, // 20 seconds
            beforeSend: function(jqXHR) {
                // Show loading states
                $('.faq-table-content').empty();
                $('#faq-table-container-placeholder').show();
            },
            success: function(data) {
                // Update content on successful load
                $('#faq-table-container-placeholder').hide();
                $('.faq-table-content').html(data);
            },
            error: function(xhr, status, error) {
                // Handle AJAX errors
                $('#faq-table-container-placeholder').hide();
                window.errorMsg('An error occurred while processing your request. Please refresh and try again.');
                console.log('Error submitting form:', error);
            },
            dataType: 'html'
        });
    });

    // Handle clicks on add FAQ button
    $(document).on('click', '.add-faq-btn', function(event){
        event.preventDefault();
        var id = 0;
        var click_btn='add';

        // Update drawer fields and UI elements
        window.update_faq_drawer_fields(click_btn,id);
        // Update drawer action button text and icon
        window.update_drawer_faq_action_mark_btn_and_icon(click_btn)
        // Store FAQ ID in drawer data attribute
        $('.faq-details-drawer').attr('data-faq-id', id);
        $('.faq-drawer').addClass('open');

    });

    $(document).on('click', '.edit-faq-btn', function(event){
            event.preventDefault();
            var id = $(this).data("id");
            var tbl_index = $(this).data("tbl-index");
            var click_btn='update';
            
            window.update_faq_drawer_fields(click_btn,id,tbl_index);
            // update drawer auction btn text and icon
            window.update_drawer_faq_action_mark_btn_and_icon(click_btn)
            // Store both values as data attributes
            $('.faq-details-drawer').attr('data-faq-id', id);
            $('.faq-drawer').addClass('open');
    });

    $(document).on('click', '.edit-faq-sec-btn', function(event){
        event.preventDefault();
        var id = $(this).data("id");
        var index = $(this).data("tbl-index");
        var click_btn='update';

        window.update_sec_drawer_fields(click_btn,id,index);

        window.update_drawer_sec_action_mark_btn_and_icon(click_btn);

        // Store both values as data attributes
        $('.faq-details-drawer').attr('data-sec-id', id);
        
        $('.section-drawer').addClass('open');
});

    // Handle clicks on add section button 
    $(document).on('click', '.add-sec-btn', function(event){
        event.preventDefault();
        var id = 0;
        var click_btn='add';

        // Update section drawer fields and UI
        window.update_sec_drawer_fields(click_btn,id);
        window.update_drawer_sec_action_mark_btn_and_icon(click_btn);

        $('.section-drawer').addClass('open');

    });

    // Handle drawer close button clicks
    $('.close-drawer, .close-drawer-btn').on('click', function() {
        $('.faq-details-drawer').removeClass('open');
        $('html').removeClass('open');
    });

});