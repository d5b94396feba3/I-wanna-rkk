$(document).ready(function () {

$(document).on('click', '.img-upload-button', function(e){
        e.preventDefault();
        $('#image_link').click();
    });

$(document).on('click', '.audio-upload-icon', function(e){
        e.preventDefault();
        id = $(this).data("popup_id");
        $('#track_file_'+id).click();
    });

$(document).on('click', '.audio-upload-btn', function(e){
        e.preventDefault();
       
        var id = $(this).data("track_btn_id");
        
        if (validateTrackInputField(id)) {
            $(".track-audio-not-uploaded-" + id).hide();
            $(".track-audio-uploaded-" + id).show();
            $('#audioUploadPopup-'+id).hide();
        } else {
            $(".track-audio-not-uploaded-" + id).show();
            $(".track-audio-uploaded-" + id).hide();
        }
        
    });


$(document).on('click', '.add-track-info-btn', function(event){
        event.preventDefault();
        $('#ajax_loader').show();

        id = $(this).data("popup_id");

        trackTitle = $("#track_title_"+id).val();
        popup_track_title_ = $("#popup_track_title_"+id).val();

        // Retrieve the artist name from the global config object
        artistName = window.config.artistName;

        $("#popup_artist_name_"+id).val(artistName);

        if(trackTitle!==''){
            $("#popup_track_title_"+id).val(trackTitle);
        }

        $('.close-btn-'+id).css({
            background: 'none',
            border: 'none',
            color: '#FFFFFF',
            fontSize: '24px',
            cursor: 'pointer'
        });

        // Hover effect
        $('.close-btn-'+id).hover(function() {
          $(this).css('color', '#FF9933');
        }, function() {
          $(this).css('color', '#FFFFFF');
        });


        $('#ajax_loader').fadeOut("slow");

        $('#trackPopup-'+id).show();

        $(".close-btn-"+id).click(function() {
          $('#trackPopup-'+id).hide();
        });

});

$(document).on('click', '.upload-audio-btn', function(event){
        event.preventDefault();
        $('#ajax_loader').show();

        id = $(this).data("popup_id");

        trackTitle = $("#track_title_"+id).val();
        popup_track_title_ = $("#popup_track_title_"+id).val();

        // Retrieve the artist name from the global config object
        artistName = window.config.artistName;

        $("#popup_artist_name_"+id).val(artistName);

        if(trackTitle!==''){
            $("#popup_track_title_"+id).val(trackTitle);
        }
        // CSS for .track-next-btn
        $('.audio-upload-btn-'+id).css({
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
        $('.audio-upload-btn-'+id).hover(function() {
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


        $('.close-btn-'+id).css({
            background: 'none',
            border: 'none',
            color: '#FFFFFF',
            fontSize: '24px',
            cursor: 'pointer'
        });

        // Hover effect
        $('.close-btn-'+id).hover(function() {
          $(this).css('color', '#FF9933');
        }, function() {
          $(this).css('color', '#FFFFFF');
        });


        $('#ajax_loader').fadeOut("slow");

        $('#audioUploadPopup-'+id).show();

        $(".close-btn-"+id).click(function() {
          $('#audioUploadPopup-'+id).hide();
        });
});



$(document).on('click', '.save-track-popup-submit-btn', function (event) {
    event.preventDefault();

    $('#saveTrackDataInPopup').hide();

     hiddenArtistId = $("#hidden_artist_id").val();
     trackTitle = $("#track_title_"+id).val();
     features = $("#features_"+id).val();
     composer = $("#composer_"+id).val();
     lyricist = $("#lyricist_"+id).val();
     isrcCode = $("#isrc_code_"+id).val();
     explicit = $("#explicit_"+id).val();

     // Retrieve the artist name from the global config object
     artistName = window.config.artistName;

      // asigning values to all popup input fields
     for (var i = num_of_track; i > 0; i--) {
          $("#popup_artist_name_"+i).val(artistName);
          $("#popup_track_title_"+i).val(trackTitle);
          $("#features_"+i).val(features);
          $("#composer_"+i).val(composer);
          $("#lyricist_"+i).val(lyricist);
          $("#isrc_code_"+i).val(isrcCode);
          $("#explicit_"+i).val(explicit);
     }

});

$(document).on('click', '.btn-reset', function (event) {
    event.preventDefault();
    resetTrackInputFields();
});

$(document).on('click', '.more-details-btn', function(event) {
    event.preventDefault();
    let btn_id = $(this).data("mdbtn-id");
    btn_id = '.tlmi-id-'+btn_id;
    $(btn_id).toggle();
});

// Hide popup when CANCEL button is clicked
$('.create-release-popup-cancel-btn').on('click', function() {
    $('#submitReleasePopup').hide();
});

// saveTrackDataInPopup no button
$('.save-track-popup-cancel-btn').on('click', function() {
    $('#saveTrackDataInPopup').hide();
});

// saveTrackDataInPopup yes button
$(document).on('click', '.save-track-btn', function(event) {
    var id=$(this).data("btn_id");
    var fieldsChecked=check_popup_input_fields(id)

    if(fieldsChecked){
        // toggle track info icons
        $('.track-info-save-'+id).show();
        $('.track-info-unsave-'+id).hide();
        
        // hide current track popup
        $("#trackPopup-"+id).hide();

        num_of_track=$('#num_of_track').val();

        if(num_of_track>1){
            $('#saveTrackDataInPopup').show();
        }
    }
});


});