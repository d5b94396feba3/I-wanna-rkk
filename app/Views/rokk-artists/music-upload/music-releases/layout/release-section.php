<div class="release-container form-section" data-step="0">
        <div class="step-container">
            <h2>Release Information</h2>
            <p>Shows the cover image and release information below</p>
        </div>
        <div class="cover-upload-container">
            <form action="<?= base_url('update_music_release_cover_image') ?>" class="updateCoverImageForm" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="release_id" id="release_id" value="<?= esc($release_detail->release_id); ?>">
                <input type="hidden" name="old_cover_image_link" id="old_cover_image_link" value="<?= $release_detail->artwork_link; ?>">
                <div class="cover-upload-box" id="imageFileContainer">
                    <div class="image-placeholder" id="preview">
                        <?php if (!empty($release_detail->artwork_link)): ?>
                            <img src="<?= $release_detail->artwork_link; ?>" alt="Release cover">
                        <?php else: ?>
                            <img src="<?php echo base_url('assets/images/image-cover.png');?>" alt="Upload icon">
                        <?php endif; ?>
                    </div>
                    <div class="upload-content">
                        <button class="img-upload-button">Upload Cover Image</button>
                        <input type="file" name="image_link" id="image_link" value="<?= $release_detail->artwork_link; ?>" accept="image/*" style="display: none;" onchange="previewFile()" required>
                        <p class="upload-instructions">
                            At least 800 x 800px recommended. PNG or JPG is allowed.<br>
                            Drag and Drop the image.
                        </p>
                    </div>
                </div>
                <button type="submit" class="img-update-btn">Update</button>
            </form>    
        </div>
        <div class="separator"></div>
        
        <form action="<?= base_url('update_music_release_detail') ?>" id="updateReleaseDetail" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="release_id" id="release_id" value="<?= esc($release_detail->release_id); ?>">
        
            <div class="upload-form-row">
                <div class="upload-popup-form-group">
                    <label for="label">Release Title *</label>
                    <input type="text" name="release_title" id="release_title" value="<?= $release_detail->release_title; ?>" placeholder="Faith no more">
                </div>
            </div>

            <div class="upload-form-row">
                <div class="upload-popup-form-group">
                    <label for="release_icpn">Release ICPN *</label>
                    <input type="text" name="release_icpn" id="release_icpn" value="<?= $release_detail->release_icpn; ?>" placeholder="e.g. 1234567890123">
                </div>

                <div class="upload-popup-form-group">
                    <label for="genre">Genre *</label>
                    <select name="genre" id="genre">
                        <option value="<?= $release_detail->genre; ?>" selected><?= $release_detail->genre; ?></option>
                    </select>
                </div>
            </div>


            <div class="upload-form-row">
                <div class="upload-popup-form-group">
                    <label for="release_date">Release Date *</label>
                    <input type="date" name="release_date" id="release_date" value="<?= date('Y-m-d', strtotime($release_detail->release_date)); ?>">
                </div>
                <div class="upload-popup-form-group">
                    <label for="copyright">Copyright *</label>
                    <div class="custom-select">
                        <?php
                            date_default_timezone_set("UTC");
                            $current_year = date("Y");
                            $years = range(1964, $current_year);
                        ?>
                        <select name="copyright" id="copyright">
                            <?php foreach($years as $year): ?>
                                <option value="<?= $year ?>"><?= $year ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="upload-popup-form-group">
                    <label for="language">Language *</label>
                    <?php
                    $languages = array(
                        'ar' => 'Arabic',
                        'yue-Hant' => 'Cantonese', 
                        'ca' => 'Catalan',
                        'cmn-Hans' => 'Chinese (Simplified)',
                        'cmn-Hant' => 'Chinese (Traditional)',
                        'hr' => 'Croatian',
                        'cs' => 'Czech',
                        'da' => 'Danish',
                        'de-DE' => 'Deutsch',
                        'nl' => 'Dutch',
                        'en-GB' => 'English',
                        'et' => 'Estonian',
                        'fi' => 'Finnish',
                        'fr-FR' => 'French',
                        'el' => 'Greek',
                        'he' => 'Hebrew',
                        'hu' => 'Hungarian',
                        'is' => 'Icelandic',
                        'id' => 'Indonesian',
                        'it-IT' => 'Italian',
                        'ja' => 'Japanese',
                        'ko' => 'Korean',
                        'lo' => 'Lao',
                        'lv' => 'Latvian',
                        'li' => 'Lithuanian',
                        'ms' => 'Malay',
                        'no' => 'Norwegian',
                        'pl' => 'Polish',
                        'pt' => 'Portuguese',
                        'ro' => 'Romanian',
                        'ru' => 'Russian',
                        'sk' => 'Slovak',
                        'es' => 'Spanish',
                        'sv' => 'Swedish',
                        'de-CH' => 'Schweizerdeutsch',
                        'tl' => 'Tagalog',
                        'th' => 'Thai',
                        'tr' => 'Turkish',
                        'uk' => 'Ukrainian',
                        'vi' => 'Vietnamese'
                    );
                    ?>
                    <select name="language" id="language">
                        <option value="<?= $release_detail->language; ?>" selected><?= $languages[$release_detail->language]; ?></option>
                        <?php foreach ($languages as $code => $name): ?>
                            <option value="<?= $code ?>"><?= $name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="upload-form-row">
                <div class="upload-popup-form-group">
                    <label for="release_available_markets">Release Available Markets *</label>
                    <div class="markets-select-container">
                        <div class="selected-markets" id="selectedMarkets"></div>
                        <input type="text" id="marketSearch" value="<?= $release_detail->release_available_markets; ?>" placeholder="Search countries...">
                        <?php 
                        // Include the country selection dropdown component
                        // This file contains the HTML for displaying country flags and names
                        // Used for selecting available markets for the release
                        include __DIR__ . '/../../section/country-select.php'; 
                        ?>
                        <input type="hidden" name="release_available_markets" id="release_available_markets" value="test">
                    </div>
                </div>
            </div>

            <div class="upload-form-row">
                <div class="upload-popup-form-group">
                    <label for="copyright_desc">Additional Copyright Information</label>
                    <input type="text" id="copyright_desc" name="copyright_desc" value="<?= $release_detail->copyright_desc; ?>" placeholder="e.g. ℗ 2024 Artist Name. All rights reserved.">
                </div>
            </div>

            <button type="submit" class="release-info-update-btn">Update</button>  
        </form>
        <div class="separator"></div>

        <?php 
            // Include the release status selection dropdown component
            include __DIR__ . '/release-status-section.php';
        ?>

        <div class="form-actions">
            <button onclick="window.location.href='<?= get_previous_url(base_url('music_releases')) ?>'" class="btn-back form-btn-back2">
                <svg class="back-arrow" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 11H7.83L13.42 5.41L12 4L4 12L12 20L13.41 18.59L7.83 13H20V11Z" fill="currentColor"/>
                </svg>
                BACK
            </button>
            
            <button type="submit" class="btn-next form-btn-next">
                NEXT
                <svg class="right-arrow" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 11H7.83L13.42 5.41L12 4L4 12L12 20L13.41 18.59L7.83 13H20V11Z" fill="currentColor"/>
                </svg>
            </button>
        </div>
    </div>
