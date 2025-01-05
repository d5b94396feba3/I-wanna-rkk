<style>
#dashboard-footer {
    margin: 0px 55px 0px 111px !important;
}
.password-toggle {
    position: relative;
    margin-left: 0px;
}

.del-form-group.password-toggle.password-section {
    margin-top: -18px;
    margin-bottom: 20px !important;
    font-weight: 700;
    font-size: 20px;
}


.change-password:hover, .connected-accounts:hover{
    color:#fff;
}

.form-group.ca-heading {
    font-size: 20px;
    font-weight: 700;
    margin-top: -18px;
}

.password-input {
    width: 373px !important;
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

.password-toggle {
    position: relative;
  }

.password-toggle .eye-icon {
    position: relative;
    right: 44px;
    top: 29px;
    transform: translateY(-50%);
    cursor: pointer;
    opacity: 0.5;
}

.delete-label {
    margin: 0px 0px 22px 0px;
    padding: 0px 0px 0px 0px;
    color: #ff8303;
}

.pass-label{
    display: block;
    margin-top: 20px;
    width: 125px !important;
    font-size: 15px;
}

.artist-uform .delete-btn{
    margin-top: 30px !important;
}

.account-header-section {
    margin-top: -3px !important;
    margin-bottom: 8px !important;
    font-weight: 700;
    font-size: 20px;
}

#accountDelForm .pass-btn {
    padding: 8px 25px;
    border: none;
    border-radius: 25px;
    font-weight: 700;
    cursor: pointer;
    background-color: #ff8303;
    color: #000;
    border: 2px solid #333;
    letter-spacing: 0.12em;
    margin-top: 14px !important;
    font-size: 12px;
}

#accountDelForm .pass-btn:hover {
  background-color: #FF8303;
  color: #000;
}

/* mobile responsiveness */

@media (max-width: 868px){

    #del-password {
        width: 244px !important;
    }
   
    #accountDelForm #eye-icon-password {
        right: -202px;
        top: -34px;
    }
    #accountDelForm .delete-label {
        margin: 8px 0px 10px 0px !important;
    }
    #accountDelForm .pass-btn {
        margin-top: 12px !important;
        margin-bottom: 21px !important;
    }
    .password-input {
        padding-top: 10px !important;
        padding-bottom: 6px;
    }
    #dashboard-footer {
        margin: 0px 0px 0px 0px !important;
    }
   
}

</style>
<!-- <script src="<?= base_url('assets/src/js/account/alert.js') ?>"></script> -->
<!-- <script src="<?= base_url('assets/src/js/account/password.js') ?>"></script> -->
<!-- <script src="<?= base_url('assets/src/js/account/form.js') ?>"></script> -->

<?php
    $userid = session('userid');
    $password = '';
    $confirm_password = '';
?>

<form action="<?= base_url('delete_artist_account') ?>" id="accountDelForm" class="artist-uform det-form" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <input type="hidden" name="registered_id" id="registered_id" value="<?= $userid ?>">
    <input type="hidden" name="hidden_password" id="hidden_password" value="<?= $confirm_password ?>">

    <div class="form-group del-form-group account-header-section">
        <label for="password" class="label-block act-label-heading">Delete Account</label>
    </div>

    <label for="delete" class="delete-label">To remove account permanently, please enter your password.</label>

    <div class="form-group del-form-group password-toggle">
        <label for="password" class="label-block pass-label">Password: </label>
        <input type="password" class="password-input form-control input-field pass-input-field" name="password" id="del-password" value="" placeholder="***********" required>
        <i id="del-icon-password" class="eye-icon fas fa-eye-slash" onclick="togglePass('del-password', 'del-icon-password')"></i>
    </div>

    <div class="form-group del-form-group">
        <button type="submit" class="pass-btn delete-btn">Delete Account</button>
    </div>
</form>
