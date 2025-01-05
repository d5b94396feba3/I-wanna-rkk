<style type="text/css">
#dashboard-footer {
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

input, select {
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
    appearance: none;
    background-image: url('data:image/svg+xml;utf8,<svg fill="%23ffffff" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>');
    background-repeat: no-repeat;
    background-position: right 10px center;
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
  background-color: #FF8303;
  color: #000;
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
    #dashboard-footer {
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
            <input type="hidden" name="page" id="page" value="account-administrator">
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
                    <input type="text" name="firstname" id="firstname" value="<?= esc($person_data->first_name); ?>" placeholder="e.g. John" required>
                <?php else: ?>
                    <input type="text" name="firstname" id="firstname" placeholder="e.g. John" required>
                <?php endif; ?>
            </div>

            <div class="upload-popup-form-group">
                <label for="Lastname">Last Name *</label>
                <?php if(!empty($person_data) && isset($person_data->last_name)): ?>
                    <input type="text" name="lastname" id="lastname" value="<?= esc($person_data->last_name); ?>" placeholder="e.g. Smith" required>
                <?php else: ?>
                    <input type="text" name="lastname" id="lastname" placeholder="e.g. Smith" required>
                <?php endif; ?>
            </div>
        </div>

        <div class="upload-form-row">
            <div class="upload-popup-form-group">
                <label for="Email">Email *</label>
                <?php if(!empty($person_data) && isset($person_data->email)): ?>
                    <input type="email" name="email" id="email" value="<?= esc($person_data->email); ?>" placeholder="e.g. john.smith@gmail.com" required>
                <?php else: ?>
                    <input type="email" name="email" id="email" placeholder="e.g. john.smith@gmail.com" required>
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
            <select aria-required="true" aria-invalid="false" name="country" id="country" required>
              <?php if(!empty($person_data) && isset($person_data->country)): ?>
                <option value="<?= esc($person_data->country) ?>"><?= esc($person_data->country) ?></option>
              <?php elseif(session()->get('country')): ?>
                <option value="<?= esc(session()->get('country')) ?>"><?= esc(session()->get('country')) ?></option>
              <?php endif; ?>
                <option value="Afghanistan">Afghanistan</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Brazil">Brazil</option>
                <option value="Brunei">Brunei</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cabo Verde">Cabo Verde</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo, Democratic Republic of the">Congo, Democratic Republic of the</option>
                <option value="Congo, Republic of the">Congo, Republic of the</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Côte d'Ivoire">Côte d'Ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="East Timor (Timor-Leste)">East Timor (Timor-Leste)</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Eswatini">Eswatini</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="Gabon">Gabon</option>
                <option value="The Gambia">The Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Greece">Greece</option>
                <option value="Grenada">Grenada</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-Bissau">Guinea-Bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Honduras">Honduras</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran">Iran</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea, North">Korea, North</option>
                <option value="Korea, South">Korea, South</option>
                <option value="Kosovo">Kosovo</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Laos">Laos</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libya">Libya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                <option value="Moldova">Moldova</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar (Burma)">Myanmar (Burma)</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="North Macedonia">North Macedonia</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Qatar">Qatar</option>
                <option value="Romania">Romania</option>
                <option value="Russia">Russia</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Sudan, South">Sudan, South</option>
                <option value="Suriname">Suriname</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syria">Syria</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania">Tanzania</option>
                <option value="Thailand">Thailand</option>
                <option value="Togo">Togo</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Vatican City">Vatican City</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Vietnam">Vietnam</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
            </select>
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
