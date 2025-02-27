// Define global variables
window.num_of_track = 1;
window.savePopupData = false;

$(document).ready(function () {


    applyLastTrackRowStyles();

    // Update the global variable when value changes
    $('#num_of_track').on('change', function() {
        window.num_of_track = $(this).val();
        window.savePopupData = false;
    });

    // Define the function globally
    window.generate_dynamic_track_fields = function() {

        window.num_of_track=$('#num_of_track').val();
    
        if (isNaN(num_of_track)) {
            alert('Please enter a valid number for the number of tracks.');
            return;
        }
    
        var html='';
    
        for (var i = 1; i <= num_of_track; i++) {
    
            html+=`
                <div class="track-row">
                    <div class="track-header">
                        <h3>TRACKS ${i}</h3>
                        ${i === 1 ? `<button type="button" class="btn-reset">RESET</button>` : ''}
                    </div>
                    <div class="track-inputs row">
                        <div class="col-md-6 col-sm-12 col-lg-6">
                            <div class="track-input-group">
                                <label for="track_title_${i}">Release Title *</label>
                                <input type="text" name="track_title_${i}" class="track-title-input" id="track_title_${i}" placeholder="Title">
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-12 col-lg-3">
                            <div class="track-input-group">
                                <label for="track-info-${i}">Track Info (Composer etc.) *</label>
                                <div class="input-with-icon track-info-box">
                                    <div class="track-info-save-${i}" style="display:none;">
                                        <input type="text" id="track-info-saved-${i}" class="track-info-input" value="Added" readonly>
                                        <span class="check-icon add-track-info-btn" data-popup_id=${i}>
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM11.0026 16L18.0737 8.92893L16.6595 7.51472L11.0026 13.1716L8.17421 10.3431L6.75999 11.7574L11.0026 16Z" fill="#FF8303"/>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="track-info-unsave-${i}">
                                        <input type="text" id="track-info-${i}" class="track-info-input" placeholder="Add details here" readonly>
                                        <span class="add-track-info-btn" data-popup_id=${i}>
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11 11V7H13V11H17V13H13V17H11V13H7V11H11ZM12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20Z" fill="white" fill-opacity="0.3"/>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-12 col-lg-3">
                            <div class="track-input-group">
                                <label for="audio-file-${i}">Upload Audio File *</label>
                                <div class="input-with-icon track-upload-box-${i}">
                                    <div class="track-audio-uploaded-${i}" style="display:none;">
                                        <input type="text" id="audio-file-uploaded-${i}" class="track-audio-input" value="Uploaded" readonly>
                                        <span class="check-icon upload-audio-btn" data-popup_id="${i}">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM11.0026 16L18.0737 8.92893L16.6595 7.51472L11.0026 13.1716L8.17421 10.3431L6.75999 11.7574L11.0026 16Z" fill="#FF8303"/>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="track-audio-not-uploaded-${i}">
                                        <input type="text" id="audio-file-${i}" class="track-audio-input" placeholder="Upload Audio File" readonly>
                                        <span class="upload-audio-btn" data-popup_id="${i}">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 19H20V12H22V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V12H4V19ZM13 9V16H11V9H6L12 3L18 9H13Z" fill="white" fill-opacity="0.3"/>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div id="trackPopup-${i}" class="track-popup" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1000; backdrop-filter: blur(5px);">
                    <div class="popup-content">
                        <div class="popup-header">
                            <h2>TRACK ${i}</h2>
                            <button class="close-btn-${i}">&times;</button>
                        </div>
                        <div class="popup-body">
                            <div class="form-row">
                                <div class="popup-form-group">
                                    <label for="artist">Artist *</label>
                                    <input type="text" name="artist_name_${i}" id="popup_artist_name_${i}" value="">
                                </div>
                                <div class="popup-form-group">
                                    <label for="title">Title *</label>
                                    <input type="text" name="track_title_${i}" id="popup_track_title_${i}" value="">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="popup-form-group">
                                    <label for="features">Features</label>
                                    <input type="text" name="features_${i}" id="features_${i}" value="">
                                </div>
                                <div class="popup-form-group">
                                    <label for="composer">Composer *</label>
                                    <input type="text" name="composer_${i}" id="composer_${i}" value="" >
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="popup-form-group">
                                    <label for="lyricist">Lyricist *</label>
                                    <input type="text" name="lyricist_${i}" id="lyricist_${i}" value="" >
                                </div>
                                <div class="popup-form-group">
                                    <label for="isrc">ISRC Code *</label>
                                    <input type="text" name="isrc_code_${i}" id="isrc_code_${i}" value="" >
                                </div>  
                                 <div class="popup-form-group">
                                     <label for="Disc">Disc Number *</label>
                                    <input type="number" name="track_disc_number_${i}" id="track_disc_number_${i}" value="">
                                </div>
                            </div>
                
                            <div class="form-row">
                                <div class="popup-form-group isrc-radio-container">
                                    <label class="isrc-label">I have an ISRC Code </label>
                                    <div class="popup-radio-group">
                                        <label class="popup-radio-label inline-radio">
                                            <input type="radio" name="explicit_${i}" id="explicit_${i}" value="yes">
                                            Yes
                                        </label>
                                        <label class="popup-radio-label inline-radio">
                                            <input type="radio" name="explicit_${i}" id="explicit_${i}" value="no" checked> No
                                        </label>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        <div class="popup-footer">
                            <button class="save-track-btn" data-btn_id="${i}">SAVE Track</button>
                        </div>
                    </div>
                </div>

                <div id="audioUploadPopup-${i}" class="audio-upload-popup" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1000; backdrop-filter: blur(5px);">
                    <div class="popup-content">
                        <div class="popup-header">
                            <h2>TRACK ${i}</h2>
                            <button class="close-btn-${i}">&times;</button>
                        </div>
                        <div class="popup-body">
                            <div class="track-upload-area" id="fileInputTrackContainer_${i}" data-track-upload-area-id="${i}">
                                <div class="audio-upload-icon" data-popup_id="${i}">
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M26 5.16291V19.9999C26 23.3137 23.3138 25.9999 20 25.9999C16.6862 25.9999 14 23.3137 14 19.9999C14 16.6861 16.6862 13.9999 20 13.9999C20.7012 13.9999 21.3744 14.1202 22 14.3413V0.0986328C32.1066 1.10207 40 9.62917 40 19.9999C40 31.0457 31.0456 39.9999 20 39.9999C8.9543 39.9999 0 31.0457 0 19.9999C0 9.62917 7.89336 1.10207 18 0.0986328V4.12367C10.1074 5.10785 4 11.8406 4 19.9999C4 28.8365 11.1634 35.9999 20 35.9999C28.8366 35.9999 36 28.8365 36 19.9999C36 13.2851 31.8636 7.53645 26 5.16291Z" fill="white" fill-opacity="0.3"/>
                                    </svg>
                                </div>
                                <div class="preview${i}" id="preview${i}"></div>
                                <input type="file" name="track_file_${i}" id="track_file_${i}" data-track-file-id="${i}" accept="audio/*" required style="display:none;">
                                <p class="upload-text">Supported audio file, (MP3, WAV, FLAC, AAC, OGG).</p>
                                <p class="upload-text">Drag and Drop the file here.</p>
                            </div>
                        </div>
                        <div class="popup-footer">
                            <button class="audio-upload-btn" data-track_btn_id="${i}">UPLOAD AUDIO FILE</button>
                        </div>
                    </div>
                </div>
                </div>`;
        }
        $('.dynamic-track-container').show();
        $('.dynamic-track-container').html(html);
        //  remove style from the last row
        applyLastTrackRowStyles();

    }

    function applyLastTrackRowStyles() {

        $('.track-row:last').css({
            'border-bottom-color': 'transparent',
        });
    }

    // Define the function globally
    window.resetTrackInputFields = function() {
        // resetting values of all popup input fields
        for (var i = num_of_track; i > 0; i--) {
            $("#track_file_" + i).val(null);
            $("#popup_artist_name_" + i).val('');
            $("#popup_track_title_" + i).val('');
            $("#track_title_" + i).val('');
            $("#features_" + i).val('');
            $("#composer_" + i).val('');
            $("#lyricist_" + i).val('');
            $("#isrc_code_" + i).val('');
            $("#explicit_" + i).val('');
            $("#preview" + i).empty();
        }
        $("#num_of_track").val('');
        $('.dynamic-track-container').empty();
        $('.dynamic-track-container').hide();
    }

});