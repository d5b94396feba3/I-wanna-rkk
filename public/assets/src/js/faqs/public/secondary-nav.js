
$(document).ready(function() {
    $('.secondary-nav-item').on('click', function(e) {
        e.preventDefault();
        $('.secondary-nav-item').removeClass('active');
        $(this).addClass('active');
        var sec_navid=$(this).data("sec-navid");
        var main_navid=$('.main-nav-item.active').data("main-navid");
        // Hide all sections
        window.load_faq_questions_data(main_navid, sec_navid);
    });
});