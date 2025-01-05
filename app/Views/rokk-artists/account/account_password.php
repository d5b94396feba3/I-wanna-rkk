<style>
#dashboard-footer {
    margin: 0px 55px 0px 111px !important;
}
.password-toggle-icon {
    position: relative;
    margin-left: 0px;
}

.pass-form-group.password-toggle-icon.password-section {
    margin-top: -18px;
    margin-bottom: 20px !important;
    font-weight: 700;
    font-size: 20px;
}

.change-password, .connected-accounts{
    cursor: pointer;
}

.change-password:hover, .connected-accounts:hover{
    color:#fff;
}

.pass-form-group.ca-heading {
    font-size: 20px;
    font-weight: 700;
    margin-top: -18px;
}

label.label-block.act-label-heading {
    font-size: 16px;
    font-weight: 700;
    width: 100%;
    color: rgba(255,255,255,0.7);
    margin: 0px 0px 20px 0px;
    padding: 0px 0px 20px 0px;
    border-bottom: 1px solid #322b2b;
}

.section-header h2 {
    margin: -154px 0 0;
    color: rgba(255, 255, 255, .8);
    margin-bottom: 25px;
    font-size: 64px !important;
    font-weight: 500;
    line-height: 77px;
    letter-spacing: .03em;
    text-align: left;
    margin-left: 391px;
}
.section-header p {
    font-size: 13px;
    letter-spacing: 1px;
    font-weight: 500;
    margin: 0;
    color: #fff;
    text-transform: uppercase;
    margin-left: 391px;
}

.account-password-input {
    width: 427px !important;
    margin-left: 0px;
    padding-left: 25px !important;
    background: #282828 !important;
    color: #fff !important;
    border: none !important;
    padding-top: 10px !important;
    padding-bottom: 10px;
    margin-top: 10px;
    margin-bottom: 10px;
}

.password-toggle-icon {
    position: relative;
}

.password-toggle-icon .eye-icon {
    position: relative;
    right: 44px;
    top: 29px;
    transform: translateY(-50%);
    cursor: pointer;
    opacity: 0.5;
}

.pass-valid-txt {
    color: #818181 !important;
    font-size: 11px !important;
    margin-left: 227px;
    margin-top: 5px !important;
}

.account-pass-label {
    display: block;
    margin-top: 20px;
    width: 220px !important;
    font-size: 15px;
}


#accountPasswordForm .pass-btn {
    padding: 8px 25px;
    border: none;
    border-radius: 25px;
    font-weight: 500;
    cursor: pointer;
    background-color: #ff8303;
    color: #000;
    border: 2px solid #333;
    letter-spacing: 0.12em;
    margin-top: -10px;
    font-size: 12px;
}

#accountPasswordForm .pass-btn:hover {
  background-color: #FF8303;
  color: #000;
}

/* mobile responsiveness */

@media (max-width: 868px){
    .pass-valid-txt {
        color: #818181 !important;
        font-size: 11px !important;
        margin:-17px 0px 25px 0px !important;
        line-height: 1.1rem !important;
    }
    .account-password-input {
        width: 244px !important;
    }
    #accountPasswordForm .form-group {
        margin-bottom: 0px !important;
        display: block !important;
    }
    .password-toggle-icon .eye-icon {
        position: relative;
        right: -202px;
        top: -34px;
        transform: translateY(-50%);
        cursor: pointer;
        opacity: 0.5;
    }
    #accountPasswordForm .new-pass{
        margin-bottom: -41px !important;
    }
    #dashboard-footer {
        margin: 0px 0px 0px 0px !important;
    }
}

</style>

<script src="<?= base_url('assets/src/js/account/alert.js') ?>"></script>
<script src="<?= base_url('assets/src/js/account/password.js') ?>"></script>
<script src="<?= base_url('assets/src/js/account/form.js') ?>"></script>

<?php
    $userid = session('userid');
    $password = '';
    $confirm_password = '';
?>

<form action="<?= base_url("update_artist_password") ?>" id="accountPasswordForm" class="artist-uform update-password-form" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <input type="hidden" class="account-password-input" name="registered_id" id="registered_id" value="<?= esc($userid) ?>">

    <div class="form-group del-form-group account-header-section">
        <label for="password" class="label-block act-label-heading">Change Password</label>
    </div>

    <div class="form-group pass-form-group password-toggle-icon new-pass">
        <label for="password" class="label-block account-pass-label">New Password:</label>
        <input type="password" class="account-password-input form-control input-field pass-input-field" name="password" id="password" value="<?= esc($password) ?>" placeholder="***********" required>
        <i id="eye-icon-password" class="eye-icon fas fa-eye-slash" onclick="togglePass('password', 'eye-icon-password')"></i>
    </div>

    <div class="form-group password-toggle-icon">
        <label for="confirm_password" class="label-block account-pass-label">Confirm password: </label>
        <input type="password" class="account-password-input form-control input-field pass-input-field" name="confirm_password" id="confirm_password" value="<?= esc($confirm_password) ?>" placeholder="***********" required>
        <i id="eye-icon-confirm" class="eye-icon fas fa-eye-slash" onclick="togglePass('confirm_password', 'eye-icon-confirm')"></i>
    </div>
    <p class="pass-valid-txt">At least 8 digits, Include upper and lower case letters, numbers, and marks</p>
    <div class="form-group">
        <button type="submit" class="pass-btn">Update</button>
    </div>
</form>

