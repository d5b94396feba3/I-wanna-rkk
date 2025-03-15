$(document).ready(function() {
    const $dropdownSelectedStatus = $('#dropdown-selected-status');
    const $dropdownOptionsStatus = $('#dropdown-options-status');
    const $statusInput = $('#status');
    const $dropdownToggleIconStatus = $('#dropdown-toggle-icon-status');

    // Toggle dropdown options on click
    $dropdownSelectedStatus.add($dropdownToggleIconStatus).on('click', function(e) {
        e.stopPropagation();
        $dropdownOptionsStatus.slideToggle(200);
        $dropdownToggleIconStatus.toggleClass('open');
        
        // Close other dropdown if open
        $('#dropdown-options-link-status').hide();
        $('#dropdown-toggle-icon-link-status').removeClass('open');
    });

    // Update selected value and hide options on option click
    $('.dropdown-option-status').on('click', function(e) {
        e.stopPropagation();
        const selectedText = $(this).text();
        const selectedValue = $(this).data('value');

        $dropdownSelectedStatus.text(selectedText);
        $statusInput.val(selectedValue);
        $dropdownOptionsStatus.slideUp(200);
        $dropdownToggleIconStatus.removeClass('open');
    });

    // Close dropdown if clicked outside
    $(document).on('click', function() {
        $dropdownOptionsStatus.slideUp(200);
        $dropdownToggleIconStatus.removeClass('open');
    });
});