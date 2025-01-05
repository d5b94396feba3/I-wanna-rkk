$(document).ready(function () {

    // coping preferred address
    var clipboard = new ClipboardJS('.copy-preferred-address, .copy-link-icon', {
        text: function(trigger) {
            var address=$('#preferred_rokk_address').val();
            return address.toLowerCase() + '.rokk-app';
        }
    });

    clipboard.on('success', function(e) {
        // Change text to "Copied"
        $(".rokk-app").text("Copied");
        $(".copy-preferred-address").text("Copied");
        $(".das-input").css('border', '2px solid #e66a00');

        // Change text back to "Copy" after 2 seconds
        setTimeout(function() {
            $(".rokk-app").text(".rokk-app");
            $(".copy-preferred-address").text("Copy");
            $(".das-input").css('border', '2px solid transparent');

        }, 1100);

        e.clearSelection();
    });

    clipboard.on('error', function(e) {
        console.log('Error copying to clipboard:', e.action);
    });

    $(document).on('click', '.checkbox-link', function(event){
        event.preventDefault();
        $(".termsofsevice-txtarea").css('border', '2px solid #e66a00');
    });

});