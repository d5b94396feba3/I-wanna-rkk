<style type="text/css">
#main-footer {
    margin: 0px 55px 0px 111px !important;
}
.separator {
    width: 100%;
    height: 1px;
    background-color: #333333ab;
    margin: 0px 0px 25px 0px;
}

.account-header {
    background-color: rgba(255,255,255,0.08);
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 26px;
    margin-top: -4px;
}

.account-header h2 {
    margin: 0 0 10px 0;
    font-size: 17px;
    text-transform: uppercase;
    letter-spacing: 0.08em;
}

.account-header p {
    margin: 0;
    color: #FF8303;
    font-size: 13px;
}

.upload-form-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

.upload-popup-form-group {
    flex: 1;
    margin-right: 20px;
} 

.upload-popup-form-group:last-child {
    margin-right: 0;
}

.highlight {
    border-color: #FF8303;
    background-color: rgba(255, 131, 3, 0.1);
}

label {
    display: block;
    margin-bottom: 5px;
    color: rgba(255,255,255,0.35);
    font-size: 14px;
}

input {
    width: 100%;
    padding: 10px;
    background-color: rgba(255,255,255,0.12);
    border: none;
    border-radius: 55px !important;
    color: #ffffff;
    padding-left: 20px;
    margin-top: 4px;
}

input::placeholder {
    color: #555;
}

select {
    width: 100%;
    padding: 10px;
    background-color: #333 !important;
    border: none;
    border-radius: 55px !important;
    color: #ffffff !important;
    padding-left: 20px;
    margin-top: 4px;
    appearance: none;
    background-image: url('data:image/svg+xml;utf8,<svg fill="%23ffffff" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>');
    background-repeat: no-repeat;
    background-position: right 10px center;
}
.custom-select select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-color: #333 !important;
    border: none;
    border-radius: 55px !important;
    color: #ffffff !important;
    padding-left: 20px;
    margin-top: 4px;
    cursor: pointer;
}

.img-update-btn, .account-update-btn {
    padding: 8px 25px;
    border: none;
    border-radius: 25px;
    font-weight: 500;
    cursor: pointer;
    background-color: #ff8303;
    color: #000;
    border: 2px solid #333;
    letter-spacing: 0.12em;
    margin-top: 17px;
    font-size: 12px;
}

.img-update-btn:hover, .account-update-btn:hover{
    background-color: #333;
    color: #ffffff;
    transition: all 0.3s ease;
    box-shadow: 0 0 10px rgba(51, 51, 51, 0.5);
}

.img-update-btn:active, .account-update-btn:active {
    background-color: #222;
    transform: scale(0.98);
}

.form-actions {
    border-top: 1px solid #333333ab;
    padding-top: 25px;
    margin-top:0px;
}

.cover-upload-container {
  margin: 20px 0;
  padding: 20px;
  border: 2px solid transparent;
  border-radius: 10px;
  background-image: 
    repeating-linear-gradient(to right, #444 0, #444 10px, transparent 10px, transparent 20px),
    repeating-linear-gradient(to bottom, #444 0, #444 10px, transparent 10px, transparent 20px),
    repeating-linear-gradient(to left, #444 0, #444 10px, transparent 10px, transparent 20px),
    repeating-linear-gradient(to top, #444 0, #444 10px, transparent 10px, transparent 20px);
  background-position: top, right, bottom, left;
  background-repeat: repeat-x, repeat-y;
  background-size: 20px 2px, 2px 20px;
  background-clip: padding-box;
}
.cover-upload-box {
  display: flex;
  align-items: center;
}

.image-placeholder {
  width: 100px;
  height: 100px;
  background-color: #333;
  border-radius: 10px;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-right: 20px;
}

.image-placeholder img {
    width: 94px;
    height: 94px;
}

.upload-content {
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.img-upload-btn {
  background-color: transparent;
  color: #fff;
  border: 1px solid #FF8303;
  border-radius: 20px;
  padding: 8px 20px;
  font-size: 14px;
  font-weight: 500;
  cursor: pointer;
  transition: all 0.3s ease;
  margin-bottom: 10px;
  width: 225px;
}

.img-upload-btn:hover {
  background-color: #FF8303;
  color: #000;
}

.upload-instructions {
    color: rgba(255,255,255,0.3);
    font-size: 13px;
    line-height: 1.5;
    margin: 0;
    text-align: left;
}

.btn-space {
    margin-bottom: 28px;
    margin-top: 0px;
}

.account-selected-menu-container{
    padding: 0px 35px 70px 0px !important;
}

.countries-select-container {
    position: relative;
    background-color: rgba(255, 255, 255, 0.12);
    border-radius: 55px;
    padding: 6px 16px;
    margin-top: 9px;
    width: 100%;
    cursor: pointer;
}

.search-input-wrapper {
    position: relative;
    display: flex;
    align-items: center;
    border: none;
}

.selected-flag-container {
    display: flex;
    align-items: center;
    margin-right: 0px;
}

.selected-flag-container .flag-icon {
    width: 20px;
    height: 20px;
    object-fit: cover;
    border-radius: 2px;
}

.countrySearch {
    background: transparent;
    border: none;
    color: #ffffff;
    width: 100%;
    padding: 5px;
    margin: 0;
    cursor: pointer;
}

.countrySearch::placeholder {
    color: rgba(255, 255, 255, 0.5);
}

.countrySearch:focus {
    outline: none;
}

.dropdown-icon {
    position: absolute;
    right: 10px;
    color: rgba(255, 255, 255, 0.8);
    pointer-events: none;
}

.dropdown-icon i {
    font-size: 12px;
}

.clear-selection {
    position: absolute;
    right: 30px;
    color: rgba(255, 255, 255, 0.5);
    cursor: pointer;
    font-size: 18px;
}

.countries-dropdown {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background-color: #1E1E1E;
    border: 1px solid #333;
    border-radius: 10px;
    max-height: 232px;
    overflow-y: auto;
    z-index: 1000;
    margin-top: 5px;
}

.country-option {
    display: flex;
    align-items: center;
    padding: 8px 12px;
    cursor: pointer;
    color: #FFFFFF;
}

.country-option:hover {
    background-color: rgba(255, 131, 3, 0.1);
}

.country-option.selected {
    background-color: rgba(255, 131, 3, 0.1);
}

.flag-icon {
    width: 20px;
    height: 20px;
    margin-right: 10px;
    border-radius: 2px;
    object-fit: cover;
}

/* Scrollbar styling */
.countries-dropdown::-webkit-scrollbar {
    width: 8px;
}

.countries-dropdown::-webkit-scrollbar-track {
    background: #1E1E1E;
}

.countries-dropdown::-webkit-scrollbar-thumb {
    background: #333;
    border-radius: 4px;
}

.countries-dropdown::-webkit-scrollbar-thumb:hover {
    background: #444;
}

.country-search-wrapper {
    padding: 8px;
    position: sticky;
    top: 0;
    background: #1E1E1E;
    z-index: 1;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.country-search-wrapper .cs-icon{
  left:3px;
}
.country-search-input {
    width: 100%;
    padding: 8px 12px;
    border-radius: 4px;
    background: rgba(255, 255, 255, 0.01);
    color: #fff;
    font-size: 14px;
    margin:0px 0px 0px 15px;
}

.country-search-input:focus {
    outline: none;
    border-color: #FF8303;
}

.country-search-input::placeholder {
    color: rgba(255, 255, 255, 0.5);
}


/* mobile responsiveness */

@media (max-width: 868px){

   .upload-form-row {
        display: block;
        justify-content: space-between;
        width: 100% !important;
    }
    input, select {
        width: 228px !important;
    }
    .cover-upload-box {
        display: block !important;
    }
    .img-upload-btn {
        padding: 5px 24px;
        font-size: 11px;
        width: 179px;
        margin:15px 0px 13px 0px;
    }
    #updatePersonDetail label {
        display: block;
        margin-bottom: 0px;
        color: rgba(255,255,255,0.35);
        font-size: 14px;
        margin-top: 10px !important;
    }
    #main-footer {
    margin: 0px 0px 0px 0px !important;
  }
}

</style>

<!-- <script src="<?= base_url('assets/src/js/account/alert.js') ?>"></script>
<script src="<?= base_url('assets/src/js/account/file-upload.js') ?>"></script>
<script src="<?= base_url('assets/src/js/account/form.js') ?>"></script> -->

    <div class="acccount-header">
        <h2 class="acccount-header-title">Administrator</h2>
        <p>Shows the artist administrator's personal information below</p>
    </div>

    <div class="cover-upload-container">
        <form action="<?= base_url('update_person_profile_image') ?>" class="updatePersonImageForm" method="post" enctype="multipart/form-data">
           <?= csrf_field() ?>
            <input type="hidden" name="person_id" id="person_id" value="<?= isset($person_data->person_id) ? esc($person_data->person_id) : ''; ?>">
            <input type="hidden" name="old_image_link" id="old_image_link" value="<?= isset($person_data->person_img_link) ? $person_data->person_img_link : ''; ?>">
            <input type="hidden" name="page" id="page1" value="account-administrator">
            <div class="cover-upload-box" id="personFileInputContainer">
                <div class="image-placeholder" id="personPreview">
                    <?php if (!empty($person_data->person_img_link)): ?>
                        <img src="<?= $person_data->person_img_link; ?>" alt="Person Image">
                    <?php else: ?>
                        <img src="<?php echo base_url('assets/images/image-cover.png');?>" alt="Upload icon">
                    <?php endif; ?>
                </div>
                <div class="upload-content">
                    <button class="img-upload-btn person-img-upload-btn">Upload Profile Image</button>
                    <input type="file" name="person_image_link" id="person_image_link" value="<?= isset($person_data->person_img_link) ? $person_data->person_img_link : ''; ?>" accept="image/*" style="display: none;" onchange="personPreviewFile()">
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

    <form action="<?= base_url('update_person_setting_info') ?>" id="updatePersonDetail" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <input type="hidden" name="page" id="page" value="account-administrator">
        <input type="hidden" name="userid" id="userid" value="<?= session('userid'); ?>">
        <div class="upload-form-row">
            <div class="upload-popup-form-group">
                <label for="role">Your Role *</label>
               <?php if(!empty($person_data)): ?>
                <div class="custom-select">
                    <select name="role" id="role"> 
                        <?php
                        
                        $currentRole = strtolower($person_data->role);
                        $currentRole = str_replace("_", " ", $currentRole);
                        // Current role as first option
                        $currentRoleValue = strtolower(str_replace(" ", "_", $currentRole));
                        printf("<option value='%s'>%s</option>", 
                            $currentRoleValue, ucwords($currentRole));
                        // other roles from $roles array if they don't match the current role
                        foreach($roles as $role) {
                            $roleValue = strtolower(str_replace(" ", "_", $role));
                            if($roleValue !== $currentRoleValue) {
                                printf("<option value='%s'>%s</option>", $roleValue, $role);
                            }
                        }
                        ?>
                    </select>
                </div>
                <input type="hidden" name="person_data" id="person_data" value="yes">
              <?php else: ?>
                <div class="custom-select">
                    <select name="role" id="role">
                        <?php
                        foreach($roles as $role) {
                            $roleValue = strtolower(str_replace(" ", "_", $role));
                            printf("<option value='%s'>%s</option>", 
                                $roleValue, ucwords($role));
                        }
                        ?>
                    </select>
                </div>
                <input type="hidden" name="person_data" id="person_data" value="no">
              <?php endif; ?>
            </div>

            <div class="upload-popup-form-group">
                <label for="Firstname">First Name *</label>
                <?php if(!empty($person_data) && isset($person_data->first_name)): ?>
                    <input type="text" name="firstname" id="firstname" value="<?= esc($person_data->first_name); ?>" placeholder="e.g. John">
                <?php else: ?>
                    <input type="text" name="firstname" id="firstname" placeholder="e.g. John">
                <?php endif; ?>
            </div>

            <div class="upload-popup-form-group">
                <label for="Lastname">Last Name *</label>
                <?php if(!empty($person_data) && isset($person_data->last_name)): ?>
                    <input type="text" name="lastname" id="lastname" value="<?= esc($person_data->last_name); ?>" placeholder="e.g. Smith">
                <?php else: ?>
                    <input type="text" name="lastname" id="lastname" placeholder="e.g. Smith">
                <?php endif; ?>
            </div>
        </div>

        <div class="upload-form-row">
            <div class="upload-popup-form-group">
                <label for="Email">Email *</label>
                <?php if(!empty($person_data) && isset($person_data->email)): ?>
                    <input type="email" name="email" id="email" value="<?= esc($person_data->email); ?>" placeholder="e.g. john.smith@gmail.com">
                <?php else: ?>
                    <input type="email" name="email" id="email" placeholder="e.g. john.smith@gmail.com">
                <?php endif; ?>
            </div>

            <div class="upload-popup-form-group">
                <label for="Phone">Phone </label>
                <?php if(!empty($person_data) && isset($person_data->phone)): ?>
                    <input type="tel" name="phone" id="phone" value="<?= esc($person_data->phone); ?>" placeholder="e.g. +1 (555) 123-4567">
                <?php else: ?>
                    <input type="tel" name="phone" id="phone" placeholder="e.g. +1 (555) 123-4567">
                <?php endif; ?>
            </div>

            <div class="upload-popup-form-group">
            <label for="label">Country *</label>
            <?php 
              $selected_country = '';
              if (!empty($person_data) && isset($person_data->country)) {
                  $selected_country = $person_data->country;
              } elseif (isset($artist_data) && isset($artist_data->country)) {
                  $selected_country = $artist_data->country;
              }
            ?>
             <!-- For Person Country -->
             <div class="countries-select-container">
                <div class="search-input-wrapper">
                    <div class="selected-flag-container" style="display: none;"></div>
                    <input type="text" class="countrySearch" id="personCountrySearch" placeholder="Select country" readonly>
                    <span class="clear-selection" style="display: none;">×</span>
                    <span class="dropdown-icon">
                        <i class="fas fa-caret-down"></i>
                    </span>
                </div>
                <?php include __DIR__.'/section/country-select.php'; ?>
                <input type="hidden" name="country" id="personCountry" value="<?= $selected_country ?>">
            </div>
        </div>
        </div>

        <div class="upload-form-row">
            <div class="upload-popup-form-group">
                <label for="Address">Address </label>
                <?php if(!empty($person_data) && isset($person_data->address)): ?>
                    <input type="text" name="address" id="address" value="<?= esc($person_data->address); ?>" placeholder="e.g. 123 Main St, Apt 4B">
                <?php else: ?>
                    <input type="text" name="address" id="address" placeholder="e.g. 123 Main St, Apt 4B">
                <?php endif; ?>
            </div>

            <div class="upload-popup-form-group">
                <label for="city">City </label>
                <?php if(!empty($person_data) && isset($person_data->city)): ?>
                    <input type="text" name="city" id="city" value="<?= esc($person_data->city); ?>" placeholder="e.g. New York City">
                <?php else: ?>
                    <input type="text" name="city" id="city" value="" placeholder="e.g. New York City">
                <?php endif; ?>
            </div>

            <div class="upload-popup-form-group">
                <label for="zip">Zip </label>
                <?php if(!empty($person_data) && isset($person_data->zip)): ?>
                    <input type="text" name="zip" id="zip" value="<?= esc($person_data->zip); ?>" placeholder="50123">
                <?php else: ?>
                    <input type="text" name="zip" id="zip" value="" placeholder="e.g. 90210">
                <?php endif; ?>
            </div>
        </div>

        <button type="submit" class="account-update-btn btn-space">Update</button>  
    </form>

    <script src="<?= base_url('assets/src/js/account/file-upload.js') ?>"></script>
    <script src="<?= base_url('assets/src/js/account-setting/country-select.js') ?>"></script>
