
<style>

/* track popup style  */
.track-popup {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 1000;
  backdrop-filter: blur(5px);
}

.popup-content {
  background-color: #111111;
  border-radius: 10px;
  width: 90%;
  max-width: 600px;
  margin: 90px auto;
  padding: 30px;
  border: 1px solid rgba(255,255,255,0.1);
}

.popup-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
}

.popup-header h2 {
  color: #FF8303;
  font-size: 24px;
  margin: 0;
}

.popup-header .close-btn {
  background: none;
  border: none;
  color: #FFFFFF;
  font-size: 24px;
  cursor: pointer;
}
.close-btn:hover{
    color: #FF9933;
}

.popup-body .form-row {
    display: flex;
    justify-content: space-between;
    margin: 10px 0px 0px 0px;
}

.popup-body .popup-form-group {
  flex: 1;
  margin-right: 20px;
}

.popup-body .popup-form-group:last-child {
  margin-right: 0;
}

.popup-body label {
  display: inline-flex;
  margin-bottom: 5px;
  color: rgba(255, 255, 255, 0.35);
  font-size: 13px;
}

.popup-body input[type="text"],
.popup-body input[type="url"],
.popup-body input[type="email"],
.popup-body input[type="date"] {
  width: 100%;
  padding: 10px;
  background-color: rgba(255, 255, 255, 0.1);
  border: none;
  border-radius: 5px;
  color: #ffffff;
  padding-left: 20px;
  margin-top: 4px;
  font-size: 14px;
}

.popup-body input::placeholder {
  color: #555;
}

.popup-radio-group {
  display: flex;
  align-items: center;
}

.popup-radio-label {
  display: flex;
  align-items: center;
  margin-right: 20px;
  color: #FFFFFF;
}

.popup-radio-label input {
  margin-right: 5px;
}

.popup-radio-label input[type="radio"]:checked {
  accent-color: #FF8303;
}

.popup-radio-label input[type="radio"]:checked::before {
  background-color: #FF8303;
}

.popup-footer {
  display: flex;
  justify-content: center;
  margin-top: 20px;
}
.view-track-detail-btn {
  padding: 10px 40px;
  border: none;
  border-radius: 25px;
  font-weight: 600;
  cursor: pointer;
  background-color: #FF8303;
  color: #000000;
  letter-spacing: 0.12em;
  width: 100%;
  text-align: center;
  transition: background-color 0.3s ease;
}

.view-track-detail-btn:active,
.view-track-detail-btn:focus{
  background-color: #E67300; 
}

.view-track-detail-btn:hover{
  background-color: #FF9933;
  color: #FFFFFF;
  transition: all 0.3s ease;
  box-shadow: 0 0 10px rgba(255, 131, 3, 0.5);
}

</style>

<div class="row">
        <div class="col-md-12 mb-15">
                <div class="card-box1 height-100-p  mb-15">
                    <h2 class="weight-500 font-14"><i class="fas fa-music" style="color: #FF8303;"></i> TOP TRACKS <a href="#"><i class="ri-arrow-right-up-line rt-link-icon"></i></a></h2>
                    <div class="top-list">
                        <?php
                        if(!empty($topTracks)){ 
                            foreach ($topTracks as $topTrack) {
                                echo '<a href="#" class="list-item-link top-track-detail-btn" data-track-id="' . $topTrack['track_id'] . '" data-release-id="' . $topTrack['release_id'] . '"><div class="list-item">
                                    <img src="' . $topTrack['artwork_link'] . '" alt="' . $topTrack['release_title'] . '" class="item-image">
                                    <div class="item-info">
                                        <div class="item-title">' . $topTrack['track_title'] . '</div>
                                        <div class="item-subtitle">' . $topTrack['release_title'] . '</div>
                                    </div>
                                </div></a>';
                            }
                        } else {
                            echo '<div class="list-item">
                                <div class="item-info">
                                    <div class="item-title">No Track found</div>
                                    <div class="item-subtitle">Upload some tracks to see them here</div>
                                </div>
                            </div>';
                        }
                        ?>
                    </div>
                </div>
        </div>
</div>



<div id="trackPopup" class="track-popup">
    <div class="popup-content">
        <div class="popup-header">
            <h2 class="popup-title">TOP TRACK</h2>
            <button class="close-btn">&times;</button>
        </div>
        <div class="popup-body">

            <div class="form-row row-first">
                <div class="popup-form-group">
                    <label for="Album">Album</label>
                    <input type="text" name="album_name" id="popup_album_name" value="" readonly>
                </div>
            </div>
            <div class="form-row row-space">
                <div class="popup-form-group">
                    <label for="Track">Track</label>
                    <input type="text" name=track_name" id="popup_track_name" value="" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="popup-form-group">
                    <label for="Genre">Genre</label>
                    <input type="text" name="genre" id="genre" readonly>
                </div>
                <div class="popup-form-group">
                    <label for="Release">Release</label>
                    <input type="text" name="release" id="release" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="popup-form-group">
                    <label for="features">Features</label>
                    <input type="text" name="features" id="features" readonly>
                </div>
                <div class="popup-form-group">
                    <label for="composer">Composer</label>
                    <input type="text" name="composer" id="composer" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="popup-form-group">
                    <label for="lyricist">Lyricist *</label>
                    <input type="text" name="lyricist" id="lyricist" readonly>
                </div>
                <div class="popup-form-group">
                    <label for="isrc">ISRC Code *</label>
                    <input type="text" name="isrc_code" id="isrc_code" readonly>
                </div>
            </div>
            <div class="form-row row-last">
                <div class="popup-form-group">
                    <label>Explicit *</label>
                    <input type="text" name="explicit" id="explicit" readonly>
                </div>
            </div>
        </div>
        <div class="popup-footer">
            <!-- <button class="view-track-detail-btn" data-btn_id="${i}">View More detail</button> -->
            <a href="#" class="view-track-detail-btn" data-btn_id="${i}">View More detail</a>

        </div>
    </div>
</div>



<script>

$(document).on('click', '.close-btn', function(event){
    $('#trackPopup').hide();
 });

$(document).on('click', '.top-track-detail-btn', function(event){
    event.preventDefault();
    $('#ajax_loader').show();
    var track_id = $(this).data("track-id");
    var release_id = $(this).data("release-id");
    show_selected_top_track_data(track_id,release_id);

 });

 function show_selected_top_track_data(track_id,release_id) {

    var url = '<?= base_url('MusicRelease/ajax_selected_top_track_data') ?>';
    // Get CSRF token values
    var csrfName ="<?= csrf_token() ?>";
    var csrfValue ="<?= csrf_hash() ?>";

    $.ajax({
        url: url,
        type: 'get',
        timeout:20000, // 20 seconds
        data:{
            [csrfName]:csrfValue,
            track_id:track_id,
            release_id:release_id,
        },
        beforeSend: function (jqXHR) {
            $('#ajax_loader').show();
        },
        success: function(response){
            $('#ajax_loader').fadeOut("slow");
            update_track_popup_fields(response);
        },
        error: function (error) {
            console.log('Error:', error);
        },
        dataType: 'json'
    });

}

function update_track_popup_fields(response){

    var track_id = '';
    var artist_id = '';
    var artist_name = '';
    var track_title = '';
    var features = '';
    var composer = '';
    var lyricist = '';
    var isrc_code = '';
    var explicit = '';
    var track_file_name = '';
    var track_file_link = '';
    var uploaded_at = '';
    var updated = '';
    var release_id = '';
    var image_link = '';
    var genre = '';
    var language = '';
    var release_date = '';
    var release_title = '';
    var copyright = '';
    var copyright_desc = '';
    var status = '';
    if (response && response.result) {
        track_id = response.result.track_id;
        artist_id = response.result.artist_id;
        artist_name = response.result.artist_name;
        track_title = response.result.track_title;
        features = response.result.features;
        composer = response.result.composer;
        lyricist = response.result.lyricist;
        isrc_code = response.result.isrc_code;
        explicit = response.result.explicit;
        track_file_name = response.result.track_file_name;
        track_file_link = response.result.track_file_link;
        uploaded_at = response.result.uploaded_at;
        updated = response.result.updated;
        release_id = response.result.release_id;
        image_link = response.result.artwork_link;
        genre = response.result.genre;
        language = response.result.language;
        release_date = response.result.release_date;
        release_title = response.result.release_title;
        copyright = response.result.copyright;
        copyright_desc = response.result.copyright_desc;
        status = response.result.status;
    }
    $('#trackPopup #popup_album_name').val(release_title);
    $('#trackPopup #popup_track_name').val(track_title);
    $('#trackPopup #genre').val(genre);
    $('#trackPopup #release').val(release_date);
    $('#trackPopup #features').val(features);
    $('#trackPopup #composer').val(composer);
    $('#trackPopup #lyricist').val(lyricist);
    $('#trackPopup #isrc_code').val(isrc_code);
    $('#trackPopup #explicit').val(explicit);

    // assiging the link to release detail page
    $('.view-track-detail-btn').attr('href', '<?= base_url('release_detail/') ?>' + release_id);
    $('#trackPopup').show();

}


</script>