<style>
.sg-container {
    display: flex;
    width: 40%;
    gap:20px;
}

.sg-container select {
    height: 43px;
    margin-right: 15px;
}

.sg-container .release-info-update-btn{
    margin-top: 7px;
}

.custom-dropdown {
    position: relative;
    width: 100%;
}

.dropdown-selected {
    padding: 10px 20px 10px 20px;
    background-color: rgba(255, 255, 255, 0.1);
    border: none;
    border-radius: 55px;
    color: #ffffff;
    cursor: pointer;
    font-size: 15px;
    margin: 5px 0px 0px 0px;
}

.dropdown-toggle-icon {
    color: #ffffff;
    cursor: pointer;
    float:right;
    font-size: 15px;
    margin: -31px 15px 0px 0px;
    transition: transform 0.3s ease;
}

.dropdown-toggle-icon.open {
    transform: rotate(180deg);
}

.dropdown-options {
    display: none;
    position: absolute;
    background-color: #333;
    border-radius: 5px;
    width: 100%;
    z-index: 1000;
    font-size: 14px;
    padding: 10px 10px 10px 10px;
    margin: 5px 0px 0px 0px;
    border: 1px solid #635f5f;
}

.dropdown-option-status,
.dropdown-option-link-status {
    padding: 6px;
    color: #fff;
    cursor: pointer;
}

.dropdown-option-status:hover,
.dropdown-option-link-status:hover
 {
    background-color: rgba(255, 255, 255, 0.2);
}

</style>

<form action="<?= base_url('update_music_release_status') ?>" id="updateReleaseStatus" method="post" enctype="multipart/form-data">
<?= csrf_field() ?>
<input type="hidden" name="release_id" id="release_id" value="<?= esc($release_detail->release_id); ?>">
<div class="upload-popup-form-group status-group">
    <label for="status">Release Status</label>
    <div class="sg-container">
        <div class="custom-dropdown">
            <div class="dropdown-selected" id="dropdown-selected-status"><?= $release_detail->status; ?></div>
            <div class="dropdown-toggle-icon" id="dropdown-toggle-icon-status">
                <i class="fas fa-caret-down"></i>
            </div>
            <div class="dropdown-options" id="dropdown-options-status">
                <?php
                $statuses = ['Draft', 'Pending', 'Published'];
                // Move current status to front of array
                $currentStatus = $release_detail->status;
                $statuses = array_diff($statuses, [$currentStatus]);
                array_unshift($statuses, $currentStatus);
                
                foreach ($statuses as $status) {

                    $selected = $release_detail->status === $status ? 'selected' : '';
                    $status_val=$status_text=$status;
    
                    if($status==="Published"){
                        $status_text="Publish";
                        $status_val="Published";
                    }

                    echo sprintf('<div class="dropdown-option-status" data-value="%s">%s</div>', 
                        esc($status_val, 'attr'),
                        esc($status_text, 'html')
                    );
                }
                ?>
            </div>
            <input type="hidden" name="status" id="status" value="<?= esc($release_detail->status) ?>" required>
        </div>

        <button type="submit" class="release-info-update-btn">Update</button>  
    </div>
</div>



</form>