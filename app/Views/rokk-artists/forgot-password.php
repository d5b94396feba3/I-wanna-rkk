<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?php echo base_url('assets/images/rokk-ico.png') ?>">
    <title>Rokk Artist - Forgot Password</title>
    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url("assets/src/css/fonts.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/src/vendor/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap">
    <link rel="stylesheet" href="<?php echo base_url('assets/src/css/style-login.css') ?>"> 
    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!--Google Recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js"></script>

<style>
:root {
  --primary-color: #ff8302;
  --primary-hover: #e66a00;
  --text-color: #dfdfdf;
  --bg-dark: #181818;
  --font-family: "Poppins", Arimo;
}

body {
  font-family: var(--font-family);
  background-color: #000 !important;
  color: #fff !important;
}

input, textarea, button {
  font-family: var(--font-family) !important;
}

.alert {
  font-size: 14px;
  margin-top: 37px !important;
}

.alert-success {
    padding: 1.00rem 1.25rem !important;
    color: #155724 !important;
    background-color: #d4edda !important;
    border-color: #c3e6cb !important;
}

h1 {
  font-size: 24px;
  font-weight: 700;
  margin-bottom: 20px;
}

.container {
  background-color: #000 !important;
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 0 10px;
}


.rokk_charts_form {
  width: 622px;
  margin: 100px auto 0;
  padding: 60px 60px 90px;
  border-radius: 15px;
}

.form-group {
  margin-bottom: 20px;
}

input {
  width: 100%;
  height: 47px;
  border-radius: 25px !important;
  font-size: 15px !important;
  padding-left: 25px;
  margin: 4px 0 0 -7px;
  background-color: #000 !important;
  color: var(--text-color) !important;
  border: 1px solid transparent !important;
}

input:focus {
  outline: none;
  border-color: var(--primary-color) !important;
}

button {
  width: 100%;
  height: 40px;
  background-color: var(--primary-color);
  color: #fff;
  font-size: 14px;
  font-weight: 700;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: var(--primary-hover);
}

.password-form {
  background-color: var(--bg-dark) !important;
  box-shadow: 1px 11px 131px -48px rgb(18 18 18 / 75%);
}

#rokk-logo-indx {
  width: 235px;
  display: block;
  margin: 0 auto 20px;
}

.g-recaptcha {
  margin: 10px 0;
}

.alert-close-icon {
  position: absolute;
  top: 7px;
  right: 15px;
  font-size: 25px;
  color: #155724;
  cursor: pointer;
}

.alert-close-icon:hover {
  color: #282828;
}

.logo-text-right{
    color: #FF8303;
    margin-bottom: 0px !important;
    font-size: 14px !important;
    font-weight: 700 !important;
    font-family: 'Poppins', sans-serif;
    letter-spacing: 0.2em;
    font-stretch: condensed;
}
.logo-box {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    margin-bottom: 42px;
}
.forgot-password {
    text-align: right;
    margin: 15px 0;
}
.forgot-password-link {
    color: var(--text-color);
    font-size: 14px;
    text-decoration: none;
    transition: color 0.3s ease;
}
.forgot-password-link:hover {
    color: var(--primary-color);
    text-decoration: none;
}

</style>

</head>
<body>
  <div class="container mt-5">
    <form action="<?= base_url('forgot-password') ?>" class="rokk_charts_form password-form" method="post" enctype="multipart/form-data">
      <?= csrf_field() ?>
      
      <div class="logo-box">
        <a href="<?php echo base_url(); ?>/" class="logo d-flex align-items-center">
            <img src="<?php echo base_url("assets/images/rokk-logo-white.png"); ?>" alt="Rokk logo" id="rokk-logo-indx">
        </a>
        <span class='logo-text-right'>ARTISTS</span>
      </div>

      <div class="form-group mt-4">
        <p>Enter your email address and we'll send your new password.</p>
        <input type="email" id="email" name="email" placeholder="Official email address" required>
      </div>

      <div class="g-recaptcha mt-4 mb-3" data-sitekey="<?= $recaptcha_site_key ?>"></div>

      <button type="submit" class="btn btn-primary">Send New Password</button>

      <?php $successMsg = session()->getFlashdata('successMsg'); ?>
      <?php if (!empty($successMsg)): ?>
          <div class="alert alert-success mt-4">
              <?= $successMsg ?>
              <span class="alert-close-icon">&times;</span>
          </div>
      <?php endif; ?>

      <?php $errorMsg = session()->getFlashdata('errorMsg'); ?>
      <?php if (!empty($errorMsg)): ?>
          <div class="alert alert-danger">
              <?= $errorMsg ?>
              <span class="alert-close-icon">&times;</span>
          </div>
      <?php endif; ?>
    </form>
  </div>

<script>
var closeIcon = document.querySelector(".alert-close-icon");

closeIcon.addEventListener("click", function() {
    var parentElement = this.parentElement;
    parentElement.style.display = "none";
});
</script>
