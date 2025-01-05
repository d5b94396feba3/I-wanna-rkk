$(document).ready(function() {

    // Handle clicks on secondary navigation items
    $('.secondary-nav-item').on('click', function(e) {
        e.preventDefault();

        // Update active state of nav items
        $('.secondary-nav-item').removeClass('active');
        $(this).addClass('active');

        // Clear search fields for FAQ sections
        window.clear_sec_search_fields();
        // Clear search fields for FAQ questions 
        window.clear_faq_search_fields();
        // Get the selected section ID
        var sec_navid=$(this).data("sec-navid");
        // Load appropriate data based on section
        const isSectionView = sec_navid === 1;
        $('.sec-wrapper').toggle(isSectionView);
        $('.faq-wrapper').toggle(!isSectionView);
        isSectionView ? window.load_faq_section_data() : window.load_faq_question_data();

    });

});