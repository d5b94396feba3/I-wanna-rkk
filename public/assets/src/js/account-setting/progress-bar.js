
$(document).ready(function() {
    const $progressSteps = $('.progress-step');
    let currentStep = 0;

    $('.track-row:last').css('border-bottom-color', 'transparent');

    // Use event delegation for dynamically added elements
    $(document).on('click', '.form-btn-next', function(event) {
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
                // Update button text on last step
            }
    });

    $(document).on('click', '.form-btn-cancel', function(event) {
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

});

