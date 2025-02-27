<form action="<?= base_url('update_socail_media_setting_info') ?>" id="updateSocialMediaForm" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <input type="hidden" name="userid" id="userid" value="<?= session('userid'); ?>">
    <div class="upload-form-row">
        <div class="upload-popup-form-group col-4">
            <label for="website">Website</label>
            <input type="url" name="website" id="website" value="<?= !empty($social_media_data) && isset($social_media_data->website) ? esc($social_media_data->website) : ''; ?>" placeholder="https://">
        </div>
        <div class="upload-popup-form-group col-4">
            <label for="facebook">Facebook</label>
            <input type="url" name="facebook" id="facebook" value="<?= !empty($social_media_data) && isset($social_media_data->facebook) ? esc($social_media_data->facebook) : ''; ?>" placeholder="https://">
        </div>
        <div class="upload-popup-form-group col-4">
            <label for="instagram">Instagram</label>
            <input type="url" name="instagram" id="instagram" value="<?= !empty($social_media_data) && isset($social_media_data->instagram) ? esc($social_media_data->instagram) : ''; ?>" placeholder="https://">
        </div>
    </div>
    <div class="upload-form-row">
        <div class="upload-popup-form-group col-4">
            <label for="twitter">Twitter</label>
            <input type="url" name="twitter" id="twitter" value="<?= !empty($social_media_data) && isset($social_media_data->twitter) ? esc($social_media_data->twitter) : ''; ?>" placeholder="https://">
        </div>
        <div class="upload-popup-form-group col-4">
            <label for="tiktok">Tiktok</label>
            <input type="url" name="tiktok" id="tiktok" value="<?= !empty($social_media_data) && isset($social_media_data->tiktok) ? esc($social_media_data->tiktok) : ''; ?>" placeholder="https://">
        </div>
        <div class="upload-popup-form-group col-4">
            <label for="youtube">Youtube</label>
            <input type="url" name="youtube" id="youtube" value="<?= !empty($social_media_data) && isset($social_media_data->youtube) ? esc($social_media_data->youtube) : ''; ?>" placeholder="https://">
        </div>
    </div>
    <div class="upload-form-row">
        <div class="upload-popup-form-group col-4">
            <label for="metal-archives">Metal Archives</label>
            <input type="url" name="metal-archives" id="metal-archives" value="<?= !empty($social_media_data) && isset($social_media_data->{'metal-archives'}) ? esc($social_media_data->{'metal-archives'}) : ''; ?>" placeholder="https://">
        </div>
        <div class="upload-popup-form-group col-4">
            <label for="discogs">Discogs</label>
            <input type="url" name="discogs" id="discogs" value="<?= !empty($social_media_data) && isset($social_media_data->discogs) ? esc($social_media_data->discogs) : ''; ?>" placeholder="https://">
        </div>
        <div class="upload-popup-form-group col-4">
            <!-- Empty div to maintain 3-column layout -->
        </div>
    </div>

    <button type="submit" class="media-update-btn btn-space">Update</button>  
</form>

<div class="form-actions">
    <button type="button" class="btn-cancel form-btn-cancel">
        <svg class="back-arrow" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M20 11H7.83L13.42 5.41L12 4L4 12L12 20L13.41 18.59L7.83 13H20V11Z" fill="currentColor"/>
        </svg>
        Back
    </button>
</div>