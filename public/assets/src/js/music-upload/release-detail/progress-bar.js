$(document).ready(function () {

    // const $form = $('#uploadForm');
    const $progressSteps = $('.progress-step');
    let currentStep = 0;

    $('.track-row:last').css('border-bottom-color', 'transparent');

    // event delegation for dynamically added elements
    $(document).on('click', '.form-btn-next', function(event) {
        // alert("form-btn-next")
        event.preventDefault();
        if (currentStep < $progressSteps.length - 1) {
            // Move to next step
            $progressSteps.eq(currentStep).removeClass('active')
                .find('.step-number').removeClass('active');
            currentStep++;
            $progressSteps.eq(currentStep).addClass('active')
                .find('.step-number').addClass('active');

            // Show/hide relevant form sections
            showCurrentSection(currentStep);
            // update checked steps
            updateCheckedSteps(currentStep-1)
        }
        
    });

    $(document).on('click', '.form-btn-back', function(event) {
        event.preventDefault();
        if (currentStep > 0) {
            // Move to previous stepsa
            $progressSteps.eq(currentStep).removeClass('active')
                .find('.step-number').removeClass('active');
            currentStep--;
            $progressSteps.eq(currentStep).addClass('active')
                .find('.step-number').addClass('active');
            // Show/hide relevant form sections
            showCurrentSection(currentStep);
            // update checked steps
            updateCheckedSteps(currentStep-1)

        }
    });

    function showCurrentSection(step) {
        // Hide all sections
        $('.form-section').hide();

        // Show current section
        $(`.form-section[data-step="${step}"]`).show();
    }
    function updateCheckedSteps(step) {
        // Hide all sections
        $(`.default[data-step="${step}"]`).hide();
        $(`.check[data-step="${step}"]`).show();
    }

    window.updateProgressBar = function(percentComplete) {
        $('.progress-bar').css('width', percentComplete + '%');
        $('.progress-percentage').text(parseInt(percentComplete)+ '%');
    }

    window.resetProgressBar = function() {
        // reset the progress bar from the form
        updateProgressBar(0);
        $('#uploadProgressBar').hide();
    }

});