// Wait for DOM to be fully loaded before executing
$(document).ready(function() {
    // Add click handler for main navigation items
    $('.main-nav-item').on('click', function(e) {
        
        // Prevent default link behavior
        e.preventDefault();
        // Show loading placeholder while content loads
        $('#faq-content-placeholder').show();

        // Remove active class from all nav items and add to clicked item
        $('.main-nav-item').removeClass('active');
        $(this).addClass('active');

        // Get the main nav section ID from data attribute
        var main_navid = $(this).data("main-navid");

        // Get currently active secondary nav ID
        var sec_navid = $('.secondary-nav-item.active').data("sec-navid");

        // Load FAQ questions for selected main and secondary nav combination
        window.load_faq_questions_data(main_navid, sec_navid);
        
    });
});