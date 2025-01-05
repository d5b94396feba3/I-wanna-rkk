$(document).ready(function() {

    $(document).on('click', '.img-upload-button', function(e) {
        e.preventDefault();
        $('#image_link').click();
    });

    $(document).on('click', '.add-info-popup-btn', function(event) {
        event.preventDefault();
        $('#ajax_loader').show();

        let id = $(this).data("popup_id");
        let trackTitle = $("#track_title_" + id).val();

        // Retrieve the artist name from the global config object
        artistName = window.config.artistName;
        
        $("#popup_artist_name_" + id).val(artistName);

        if (trackTitle !== '') {
            $("#popup_track_title_" + id).val(trackTitle);
        }

        $('.close-btn-' + id).css({
            background: 'none',
            border: 'none',
            color: '#FFFFFF',
            fontSize: '24px',
            cursor: 'pointer'
        });

        // Hover effect
        $('.close-btn-' + id).hover(function() {
            $(this).css('color', '#FF9933');
        }, function() {
            $(this).css('color', '#FFFFFF');
        });

        $('#ajax_loader').fadeOut("slow");
        $('#trackPopup-' + id).show();

        $(".close-btn-" + id).click(function() {
            $('#trackPopup-' + id).hide();
        });
    });

    $(document).on('click', '.upload-audio-btn', function(event) {
        event.preventDefault();
        $('#ajax_loader').show();

        let id = $(this).data("popup_id");
        let trackTitle = $("#track_title_" + id).val();

        // Retrieve the artist name from the global config object
        artistName = window.config.artistName;

        $("#popup_artist_name_" + id).val(artistName);

        if (trackTitle !== '') {
            $("#popup_track_title_" + id).val(trackTitle);
        }

        // CSS for .track-next-btn
        $('.audio-upload-btn-' + id).css({
            padding: '10px 40px',
            border: 'none',
            borderRadius: '25px',
            fontWeight: '600',
            cursor: 'pointer',
            backgroundColor: '#FF8303',
            color: '#000000',
            letterSpacing: '0.12em',
            width: '100%'
        });

        // Add hover effect for .track-next-btn
        $('.audio-upload-btn-' + id).hover(function() {
            $(this).css({
                'background-color': '#FF9933',
                'color': '#FFFFFF',
                'transition': 'all 0.3s ease',
                'box-shadow': '0 0 10px rgba(255, 131, 3, 0.5)'
            });
        }, function() {
            $(this).css({
                'background-color': '#FF8303',
                'color': '#000000',
                'transition': 'all 0.3s ease',
                'box-shadow': 'none'
            });
        });

        $('.close-btn-' + id).css({
            background: 'none',
            border: 'none',
            color: '#FFFFFF',
            fontSize: '24px',
            cursor: 'pointer'
        });

        // Hover effect
        $('.close-btn-' + id).hover(function() {
            $(this).css('color', '#FF9933');
        }, function() {
            $(this).css('color', '#FFFFFF');
        });

        $('#ajax_loader').fadeOut("slow");
        $('#audioUploadPopup-' + id).show();

        $(".close-btn-" + id).click(function() {
            $('#audioUploadPopup-' + id).hide();
        });
    });

    $(document).on('click', '.close-btn', function(event) {
        event.preventDefault();
        $('#trackPopup').hide();
        $('#audioUploadPopup').hide();
    });

    $('.audio-upload-btn').on('click', function() {
        $('.track-audio-not-uploaded').hide();
        $('.track-audio-uploaded').show();
        $('#audioUploadPopup').hide();
    });

});