
<div class="track-container form-section" data-step="1" style="display: none;">
        <div class="step-container">
            <h2>Tracks</h2>
            <p>Shows the tracks information below </p>
        </div>

        <div class="separator"></div>

        <div class="dynamic-track-container">
            <?php if(!empty($artist_release_track)): ?>
            <?php foreach ($artist_release_track as $index => $track): ?>
                <div class="track-row">
                    <div class="track-header">
                        <h3>TRACKS <?= $index+1; ?></h3>
                    </div>
                    <div class="track-inputs row">
                        <div class="col-md-6 col-sm-12 col-lg-6">
                        <div class="track-input-group">
                            <form action="<?= base_url('update_release_track_title') ?>" class="updateTrackTitle" method="post" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <input type="hidden" name="release_id" id="release_id" value="<?= esc($release_detail->release_id); ?>">
                                <input type="hidden" name="track_id" id="track_id" value="<?= esc($track['track_id']); ?>">
                                <input type="hidden" name="track_index" id="track_index" value="<?= esc($index+1); ?>">
                                <label for="release_title-2">Release Title *</label>
                                <div class="track-update-group">
                                <input type="text" value="<?= $track['track_title']; ?>" name="track_title_<?= $index+1; ?>" id="track_title_<?= $index+1; ?>" placeholder="Title" required>
                                <button type="submit" class="track-update-btn">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-lg-3">
                        <div class="track-input-group">
                            <label for="track-info-2">Track Info (Composer etc.) </label>
                            <div class="input-with-icon">
                                <div class="track-info-save-<?= $index+1; ?>" style="display:none;">
                                    <input type="text" id="track-info-1" value="Added" readonly>
                                    <span class="check-icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12 22ZM11.0026 16L18.0737 8.92893L16.6595 7.51472L11.0026 13.1716L8.17421 10.3431L6.75999 11.7574L11.0026 16Z" fill="#FF8303"/>
                                        </svg>
                                    </span>
                                </div>
                                <div class="track-info-unsave-<?= $index+1; ?>">
                                    <input type="text" id="track-info-2" placeholder="Update details here" readonly>
                                    <span class="add-info-popup-btn" data-popup_id=<?= $index+1; ?>>
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
                                <label for="audio-file-2">Update Audio File</label>
                                <div class="input-with-icon">
                                    <div class="track-audio-uploaded-<?= $index+1; ?>" style="display:none;">
                                        <input type="text" id="audio-file-1" value="Uploaded" readonly>
                                        <span class="check-icon">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM11.0026 16L18.0737 8.92893L16.6595 7.51472L11.0026 13.1716L8.17421 10.3431L6.75999 11.7574L11.0026 16Z" fill="#FF8303"/>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="track-audio-not-uploaded-<?= $index+1; ?>">
                                        <input type="text" id="audio-file-2" placeholder="Update Audio File" readonly>
                                        <span class="upload-audio-btn" data-popup_id=<?= $index+1; ?>>
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
                <div id="uploadProgressBar"><div class="progress-bar-inner"></div></div>
                <div id="trackPopup-<?= $index+1; ?>" class="track-popup" style="display: none;position: fixed;top: 0;left: 0;width: 100%;height: 100%;background-color: rgba(0, 0, 0, 0.5);z-index: 1000; backdrop-filter: blur(5px);">
                    <div class="popup-content">
                        <div class="popup-header">
                            <h2>TRACK <?= $index+1; ?></h2>
                            <button class="close-btn-<?= $index+1; ?>">&times;</button>
                        </div>
                        <div class="popup-body">
                            <form action="<?= base_url('update_release_track_info') ?>" class="updateTrackInfo" data-trackForm-id="<?= $index+1; ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <input type="hidden" name="release_id" id="release_id" value="<?= esc($release_detail->release_id); ?>">
                                <input type="hidden" name="track_id" id="track_id" value="<?= esc($track['track_id']); ?>">
                                <input type="hidden" name="track_index" id="track_index" value="<?= esc($index+1); ?>">

                                <div class="form-row">
                                    <div class="popup-form-group">
                                        <label for="artist">Artist *</label>
                                        <input type="text" value="<?= $track['artist_name']; ?>" name="artist_name_<?= $index+1; ?>" id="popup_artist_name_<?= $index+1; ?>" value="">
                                    </div>
                                    <div class="popup-form-group">
                                        <label for="title">Title *</label>
                                        <input type="text" value="<?= $track['track_title']; ?>" name="track_title_<?= $index+1; ?>" id="popup_track_title_<?= $index+1; ?>" value="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="popup-form-group">
                                        <label for="features">Features</label>
                                        <input type="text" value="<?= $track['features']; ?>" name="features_<?= $index+1; ?>" id="features_<?= $index+1; ?>" value="">
                                    </div>
                                    <div class="popup-form-group">
                                        <label for="composer">Composer *</label>
                                        <input type="text" value="<?= $track['composer']; ?>" name="composer_<?= $index+1; ?>" id="composer_<?= $index+1; ?>" value="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="popup-form-group">
                                        <label for="lyricist">Lyricist</label>
                                        <input type="text" value="<?= $track['lyricist']; ?>" name="lyricist_<?= $index+1; ?>" id="lyricist_<?= $index+1; ?>" value="">
                                    </div>
                                    <div class="popup-form-group">
                                        <label for="isrc">ISRC Code *</label>
                                        <input type="text" value="<?= $track['isrc_code']; ?>" name="isrc_code_<?= $index+1; ?>" id="isrc_code_<?= $index+1; ?>" value="" placeholder="XXXX-XXXX">
                                    </div>
                                    <div class="popup-form-group">
                                     <label for="Disc">Disc Number *</label>
                                     <input type="number" value="<?= $track['track_disc_number']; ?>" name="track_disc_number_<?= $index+1; ?>" id="track_disc_number_<?= $index+1; ?>" placeholder="e.g. 1, 2, 3">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="popup-form-group isrc-radio-container">
                                        <label class="isrc-label">I have an ISRC Code </label>
                                        <div class="popup-radio-group">
                                            <label class="popup-radio-label inline-radio">
                                                <input type="radio" name="explicit_<?= $index+1; ?>" id="explicit_<?= $index+1; ?>" value="yes">
                                                Yes
                                            </label>
                                            <label class="popup-radio-label inline-radio">
                                                <input type="radio" name="explicit_<?= $index+1; ?>" id="explicit_<?= $index+1; ?>" value="no" checked> No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="popup-footer">
                                <button class="save-track-btn" data-btn_id="<?= $index+1; ?>">Update Track</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div id="audioUploadPopup-<?= $index+1; ?>" class="audio-upload-popup" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1000; backdrop-filter: blur(5px);">
                    <div class="popup-content">
                        <div class="popup-header">
                            <h2>TRACK <?= $index+1; ?></h2>
                            <button class="close-btn-<?= $index+1; ?>">&times;</button>
                        </div>
                        <div class="popup-body">
                            <form action="<?= base_url('update_track_audio_file') ?>" id="updateTrackAudioFile-<?= esc($index+1); ?>" class="updateTrackAudioFile" method="post" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <input type="hidden" name="release_id" id="release_id" value="<?= esc($release_detail->release_id); ?>">
                                <input type="hidden" name="track_id" id="track_id" value="<?= esc($track['track_id']); ?>">
                                <input type="hidden" name="track_index" id="track_index" value="<?= esc($index+1); ?>">
                                <input type="hidden" name="old_track_file" id="old_track_file" value="<?= esc($track['track_file_name']); ?>">
                                <div class="track-upload-area" id="fileInputTrackContainer_<?= $index+1; ?>" data-track-upload-area-id="<?= $index+1; ?>">
                                    <div class="audio-upload-icon" data-popup_id="<?= $index+1; ?>">
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M26 5.16291V19.9999C26 23.3137 23.3138 25.9999 20 25.9999C16.6862 25.9999 14 23.3137 14 19.9999C14 16.6861 16.6862 13.9999 20 13.9999C20.7012 13.9999 21.3744 14.1202 22 14.3413V0.0986328C32.1066 1.10207 40 9.62917 40 19.9999C40 31.0457 31.0456 39.9999 20 39.9999C8.9543 39.9999 0 31.0457 0 19.9999C0 9.62917 7.89336 1.10207 18 0.0986328V4.12367C10.1074 5.10785 4 11.8406 4 19.9999C4 28.8365 11.1634 35.9999 20 35.9999C28.8366 35.9999 36 28.8365 36 19.9999C36 13.2851 31.8636 7.53645 26 5.16291Z" fill="white" fill-opacity="0.3"/>
                                        </svg>
                                    </div>
                                    <div class="preview<?= $index+1; ?>" id="preview<?= $index+1; ?>"></div>
                                    <input type="file" name="track_file_<?= $index+1; ?>" id="track_file_<?= $index+1; ?>" value="<?= $track['track_file_link']; ?>" data-track-file-id="<?= $index+1; ?>" accept="audio/*" required style="display:none;">
                                    <p class="uploaded-file-name"><?= $track['track_file_name']; ?></p>
                                    <p class="upload-text">Supported audio file, (MP3, WAV, FLAC, AAC, OGG).</p>
                                    <p class="upload-text">Drag and Drop the file here.</p>
                                </div>
                            </div>
                            <div class="popup-footer">
                                <button class="audio-upload-btn" data-track_btn_id="<?= $index+1; ?>">UPDATE AUDIO FILE</button>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>       
            <?php else: ?>       
            <p>No release information found</p>
            <?php endif; ?>       
        </div>

        <div class="form-actions last-form-actions">
            <button type="button" class="btn-back form-btn-back">
                <svg class="back-arrow" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 11H7.83L13.42 5.41L12 4L4 12L12 20L13.41 18.59L7.83 13H20V11Z" fill="currentColor"/>
                </svg>
                BACK
            </button>
        </div>
    </div>