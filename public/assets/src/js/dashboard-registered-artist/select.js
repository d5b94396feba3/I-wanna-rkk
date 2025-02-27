$(document).ready(function() {
    const $dropdownSelected = $('#dropdown-selected');
    const $dropdownOptions = $('#dropdown-options');
    const $statusInput = $('#status');
    const $dropdownToggleIcon = $('#dropdown-toggle-icon');

    // Toggle dropdown options on click
    $dropdownSelected.on('click', function() {
        $dropdownOptions.toggle();
        $dropdownToggleIcon.toggleClass('open');
    });

    // Toggle dropdown options when the icon is clicked
    $dropdownToggleIcon.on('click', function() {
        $dropdownOptions.toggle();
        $dropdownToggleIcon.toggleClass('open');
    });

    // Update selected value and hide options on option click
    $('.dropdown-option').on('click', function() {
        const selectedText = $(this).text();
        const selectedValue = $(this).data('value');

        $dropdownSelected.text(selectedText);
        $statusInput.val(selectedValue);
        $dropdownOptions.hide();
        $dropdownToggleIcon.removeClass('open');
    });

    // Close dropdown if clicked outside
    $(document).on('click', function(event) {
        if (!$dropdownSelected.is(event.target) && !$dropdownOptions.is(event.target) && $dropdownOptions.has(event.target).length === 0) {
            $dropdownOptions.hide();
            $dropdownToggleIcon.removeClass('open');
        }
    });
});