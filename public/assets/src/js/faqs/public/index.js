$(document).ready(function () {
    // Show the loader initially

    // Creating an array of promises for each AJAX request
    const promises = [
        window.load_faq_questions_data(2, 7)
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
        }, 3000);
});



window.load_faq_questions_data = function (main_navid, sec_navid) {

    var url = window.location.origin + '/Faqs/ajax_faq_question_index_data';
    $.ajax({
        url: url,
        type: 'get',
        data:{
            main_navid:main_navid,
            sec_navid:sec_navid
        },
        beforeSend: function (jqXHR) {
            $('.faq-container').empty();
            $('#faq-content-placeholder').show();
        },
        success: function(response){
            var questions_data = response.questions_data;
            var faq_sections = response.faq_sections;
            $('#faq-content-placeholder').hide();
            $('.faq-container').html(questions_data);
        },
        error: function(xhr, status, error) {
            // Handle AJAX errors
            $('#faq-content-placeholder').hide();
            window.errorMsg('An error occurred while processing your request. Please refresh and try again.');
            console.error('Error submitting form:', error);
        },
        dataType: 'json'
    });
}