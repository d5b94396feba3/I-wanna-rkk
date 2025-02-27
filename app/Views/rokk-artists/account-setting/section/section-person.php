<div class="cover-upload-container">
    <form action="<?= base_url('update_person_profile_image') ?>" class="updatePersonImageForm" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <input type="hidden" name="person_id" id="person_id" value="<?= isset($person_data->person_id) ? esc($person_data->person_id) : ''; ?>">
        <input type="hidden" name="old_image_link" id="old_image_link" value="<?= isset($person_data->person_img_link) ? esc($person_data->person_img_link) : ''; ?>">
        <input type="hidden" name="page" id="page" value="account-setting">
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
                <input type="file" name="person_image_link" id="person_image_link" value="<?= isset($person_data->person_img_link) ? esc($person_data->person_img_link) : ''; ?>" accept="image/*" style="display: none;" onchange="personPreviewFile()">
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

<form action="<?= base_url('update_person_setting_info') ?>" id="updatePersonDetail" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <input type="hidden" name="userid" id="userid" value="<?= session('userid'); ?>">
    <input type="hidden" name="page" id="page" value="account-setting">
   
    <div class="upload-form-row">
      
      <div class="upload-popup-form-group">
          <label for="role">Your Role *</label>
          <?php if(!empty($person_data) && isset($person_data->role)): ?>
            <select name="role" id="role">
                <?php
                $currentRole = strtolower($person_data->role);
                $currentRole = str_replace("_", " ", $currentRole);
                // Current role as first option
                $currentRoleValue = strtolower(str_replace(" ", "_", $currentRole));
                echo "<option value='" . $currentRoleValue . "'>" 
                    . ucwords($currentRole) . "</option>";
                // Add other roles from $roles array if they don't match the current role
                foreach($roles as $role) {
                    $roleValue = strtolower(str_replace(" ", "_", $role));
                    if($roleValue !== $currentRoleValue) {
                        echo "<option value='$roleValue'>$role</option>";
                    }
                }
                ?>
            </select>
            <input type="hidden" name="person_data" id="person_data" value="yes">
          <?php else: ?>
            <select name="role" id="role">
                <?php
                foreach($roles as $role) {
                    echo "<option value='$role'>$role</option>";
                }
                ?>
            </select>
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
            <input type="email" name="email" id="email" value="<?= esc($person_data->email); ?>"placeholder="e.g. john.smith@gmail.com">
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
            <?php include __DIR__.'/country-select.php'; ?>
            <input type="hidden" name="country" id="personCountry" value="<?= $selected_country ?>" required>
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
            <input type="text" name="city" id="city" value="<?= esc($person_data->city); ?>"placeholder="e.g. New York City">
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

    <button type="submit" class="update-person-btn btn-space">Update</button>  
</form>
    
<div class="form-actions">
    <button type="button" class="btn-cancel form-btn-cancel">
    <svg class="back-arrow" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M20 11H7.83L13.42 5.41L12 4L4 12L12 20L13.41 18.59L7.83 13H20V11Z" fill="currentColor"/>
    </svg>
    Back
    </button>
    <button type="button" class="btn-next form-btn-next">
    Next
    <svg class="right-arrow" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M20 11H7.83L13.42 5.41L12 4L4 12L12 20L13.41 18.59L7.83 13H20V11Z" fill="currentColor"/>
    </svg>
    </button>
</div>
