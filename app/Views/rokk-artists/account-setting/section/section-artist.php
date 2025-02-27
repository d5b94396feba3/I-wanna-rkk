<div class="artist-container">
    <div class="cover-upload-container">
        <form action="<?= base_url('update_artist_logo_image') ?>" class="updateCoverImageForm" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="userid" id="userid" value="<?= session('userid'); ?>">
            <input type="hidden" name="asset_type" id="asset_type" value="logo">
            <input type="hidden" name="old_image_link" id="old_image_link" value="<?= isset($artist_data->file_link) ? $artist_data->file_link : ''; ?>">
            <div class="cover-upload-box" id="fileInputContainer">
                <div class="image-placeholder" id="preview">
                    <?php if (!empty($artist_data->file_link)): ?>
                        <img src="<?= $artist_data->file_link; ?>" alt="Artist logo">
                    <?php else: ?>
                        <img src="<?php echo base_url('assets/images/image-cover.png');?>" alt="Upload icon">
                    <?php endif; ?>
                </div>
                <div class="upload-content">
                    <button class="img-upload-btn logo-img-upload-btn">Upload Logo Image</button>
                    <input type="file" name="image_link" id="image_link" value="<?= isset($artist_data->file_link) ? $artist_data->file_link : ''; ?>" accept="image/*" style="display: none;" onchange="previewFile()">
                    <p class="upload-instructions">
                        At least 800 x 800px recommended. PNG or JPG is allowed.<br>
                        Drag and Drop the image.
                    </p>
                </div>
            </div>
            <button type="submit" class="img-update">Update</button>
        </form>
    </div>
    <div class="separator"></div>
    
    <form action="<?= base_url('update_artist_setting_info') ?>" id="updateArtistDetail" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <input type="hidden" name="userid" id="userid" value="<?= session('userid'); ?>">
    
        <div class="upload-form-row">
            <div class="upload-popup-form-group">
                <label for="artist_type">Artist Name *</label>
                <input type="text" name="artist_name" id="artist_name" value="<?= isset($artist_data->artist_name) ? $artist_data->artist_name : ''; ?>" placeholder="Mentalist">
            </div>

            <div class="upload-popup-form-group">
                <label for="artist_type">Type *</label>
                <select name="artist_type" id="artist_type">
                    <?php
                    $artist_types = ['Solo Artist', 'Band', 'Influencer'];
                    $current_type = $artist_data->artist_type ?? '';
                    
                    foreach ($artist_types as $type) {
                        $selected = ($type === $current_type) ? ' selected' : '';
                        echo '<option value="' . esc($type) . '"' . $selected . '>' . esc($type) . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="upload-popup-form-group">
                <label for="official_contact_email">Official Contact Mail *</label>
                <input type="email" name="official_contact_email" id="official_contact_email" value="<?= isset($artist_data->official_contact_email) ? $artist_data->official_contact_email : ''; ?>" placeholder="gmail.com">
            </div>
        </div>
        
        <div class="upload-form-row">
            <div class="upload-popup-form-group">
                <label for="country">Country * </label>
                <div class="countries-select-container">
                    <div class="search-input-wrapper">
                        <div class="selected-flag-container" style="display: none;"></div>
                        <input type="text" id="artistCountrySearch" class="countrySearch" placeholder="Select country" readonly>
                        <span class="clear-selection" style="display: none;">×</span>
                        <span class="dropdown-icon">
                            <i class="fas fa-caret-down"></i>
                        </span>
                    </div>

                    <?php include __DIR__.'/country-select.php'; ?>
                    
                    <input type="hidden" name="country" id="artistCountry" value="<?= isset($artist_data->country) ? esc($artist_data->country) : '' ?>" required>
                </div>
            </div>
            <div class="upload-popup-form-group">
                <label for="label">Label *</label>
                <input type="text" name="label" id="label" value="<?= isset($artist_data->label) && $artist_data->label != 'n/a' ? $artist_data->label : ''; ?>" placeholder="e.g. Warner Music">
            </div>
            <div class="upload-popup-form-group">
                <label for="distributor_and_aggregator">Distributor / Aggregator </label>
                <input type="text" name="distributor_and_aggregator" id="distributor_and_aggregator" value="<?= isset($artist_data->distributor) && $artist_data->distributor != 'n/a' ? $artist_data->distributor : ''; ?>" placeholder="e.g. Distrokid">
            </div>
        </div>

        <div class="upload-form-row">
            <div class="upload-popup-form-group">
                <label for="genre">Genre *</label>
                <div class="genries-select-container">
                <div class="selected-genries" id="selectedGenries"></div>
                <input type="text" id="genreSearch" value="<?= isset($artist_data->genre) ? $artist_data->genre : ''; ?>" placeholder="Search genre...">
                
                <div class="genries-dropdown" id="genriesDropdown" style="display: none;">
                    <?php foreach($genres as $genre): ?>
                        <div class="genre-option" data-value="<?= $genre['genre'] ?>">
                            <?= $genre['genre'] ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <input type="hidden" name="genre" id="genre" value="">
            </div>
        </div>
            
        </div>

        <button type="submit" class="update-artist-btn btn-space">Update</button>
    </form>
    
    <div class="form-actions">
        <button type="submit" class="btn-next form-btn-next">
            Next
            <svg class="right-arrow" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M20 11H7.83L13.42 5.41L12 4L4 12L12 20L13.41 18.59L7.83 13H20V11Z" fill="currentColor"/>
            </svg>
        </button>
    </div>
</div>