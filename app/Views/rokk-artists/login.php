<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?php echo base_url('assets/images/rokk-ico.png') ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap">
    <link rel="stylesheet" href="<?php echo base_url('assets/src/new/css/style-login.css') ?>"> 
    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!--Google Recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <title>Rokk Artist - Login</title>


<style>

body {
  font-family: "Poppins", Arimo;
  background-color: #000 !important;
  color: #fff !important;
}
input[type="text"], textarea, input[type="password"], button{

  font-family: "Poppins", Arimo !important;
}
.alert-danger, .alert-success{
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
    font-size: 14px;
    margin-top: 37px !important;
}
.password-toggle {
    position: relative;
}
.password-toggle .eye-icon {
    position: absolute;
    right: 30px;
    top: 71%;
    transform: translateY(-50%);
    cursor: pointer;
    opacity: 0.5;
}

h1 {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 20px;
    font-family: "Poppins";
}
p {
    color: #dfdfdf;
    font-size: 16px;
    line-height: 1.5;
}
.container {
    background-color: #000 !important;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center; 
    align-items: center; 
    padding: 0 10px;
}

footer {
    background-color: #000 !important;
    color: #dfdfdf;
    font-size: 12px;
}
footer p {
    margin: 0;
    font-size: 13px;
    font-family: "Poppins", Arimo !important;
}
.rokk_charts_form {
    width: 622px;
    margin: 0 auto;
    margin-top: 100px;
    padding: 60px 60px 90px 60px;
    border-radius: 15px;
}
.form-group {
    margin-bottom: 20px;
}
label {
    color: #dfdfdf;
    font-weight: 700;
    font-size: 16px;
    font-family: "Poppins";
}
input {
    width: 100%;
    height: 40px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    padding: 0 10px;
}
input:focus {
    outline: none;
    border-color: #ff8302;
}
button {
    width: 100%;
    height: 40px;
    background-color: #ff8302;
    color: #fff;
    font-size: 14px;
    font-weight: 700;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
button:hover {
    background-color: #e66a00;
}
.error {
    color: red;
    font-size: 12px;
    margin-top: 10px;
}
.wrapper {
    width: 650px;
    margin: 0 auto;
}
.page-header h2 {
    margin-top: 0;
}
.edit-title {
    margin-left: 60px;
    margin-bottom: -87px !important;
    font-weight: 700;
}
.btn-default {
    color: #dfdfdf;
    margin-left: -12px;
}
.btn-default:hover {
    color: orange;
}
.btn-primary {
    background-color: #E66A00;
    border: 1px solid #E66A00;
    border-radius: 25px;
    margin-top: 8px;
}
.btn-primary:hover {
    background-color: orange;
    border: 1px solid orange;
}
.btn-primary:focus {
    background-color: orange !important;
    border: 1px solid orange;
    box-shadow: none !important;
}
.btn-light {
    background-color: #0c090a !important;
    color: #dfdfdf;
    font-family: "Poppins";
    border: none !important;
}
.btn-light:hover {
    color: orange;
}

input[type="email"], textarea, input[type="password"] {
    background-color: #000 !important;
    color: #DFDFDF !important;
    border: 1px solid rgb(255 255 255 / 0%) !important;
    font-size: 15px !important;
    border-radius: 25px;
    height: 47px;
    padding-left: 25px;
    margin-left: -7px;
    margin-top: 4px;
}

.login-form {
    background-color: #181818 !important;
    box-shadow: 1px 11px 131px -48px rgba(0,0,0,0.75);
    -webkit-box-shadow: 1px 11px 131px -48px rgb(18 18 18 / 75%);
    -moz-box-shadow: 1px 11px 131px -48px rgba(0,0,0,0.75);
}
p,
.logout {
    font-family: "Poppins";
}
.logout {
    color: orange !important;
}
button:focus {
    outline: none !important;
    border: none !important;
}
img {
    color: #fff !important;
}
img.login-logo {
    width: 85px;
    display: flex;
    margin: 0 auto;
    padding-bottom: 40px;
}  

img#rokk-logo-indx {
    width: 235px;
    display: flex;
    margin: 0 auto;
    margin-bottom: 20px;
}

h1 span {
    font-weight: 500;
    color: #6d6d6d;
}

.heading {
    font-size: 18px;
    text-align: center;
    color: #d3d3d3;
    margin: 10px 10px 40px 10px;
}

.g-recaptcha {
    margin: 10px 0px 10px 0px;
}
span.alert-close-icon {
    top: 6px;
    position: absolute;
    right: 20px;
    font-size: 25px;
    color: #155724;
}

span.alert-close-icon:hover {
    color: #282828;
}

</style>

  </head>
  <body>

    <div class="container mt-5">
     
            <form action="<?= base_url('Home/login') ?>" class="rokk_charts_form login-form" method="post" enctype="multipart/form-data">

             <?= csrf_field() ?> 

            <img src="<?php echo base_url('assets/images/rokk-logo-white.png') ?>" alt="Rokk logo" id="rokk-logo-indx">

            <p class="heading">Sign In to your ROKK Artist account.</p>

            <div class="form-group">
              <label for="username">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Your Registered Official Email" required>
            </div>
            <div class="form-group password-toggle">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Your Registered Password" required>
                <i id="eye-icon" class="eye-icon fas fa-eye-slash" onclick="togglePass()"></i>
            </div>
            <div class="g-recaptcha" data-sitekey="<?php echo $recaptcha_site_key; ?>"></div>

            <button type="submit" class="btn btn-primary">Sign In</button>

            <?php if (isset($successMsg)) : ?>
                <div class="alert alert-success mt-4">
                    <?= $successMsg;?>
                    <span class="alert-close-icon" style="cursor: pointer;">&times;</span>
                </div>
            <?php endif; ?>

            <?php if (isset($errorMsg)) : ?>
                <div class="alert alert-danger">
                    <?= $errorMsg;?>
                    <span class="alert-close-icon" style="cursor: pointer;">&times;</span>
                </div>
            <?php endif; ?>
          </form>

    </div>


  <!-- Vendor JS Files -->
   <script src="<?php echo base_url('assets/src/new/vendor/bootstrap/js/bootstrap.bundle.js') ?>"></script> 
  <!--Main JS File -->
  <script src="<?php echo base_url('assets/src/new/js/main.js') ?>"></script> 

  </body>
</html>

<script>
  function togglePass() {
    var passwordInput = document.getElementById("password");
    var eyeIcon = document.getElementById("eye-icon");

    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      eyeIcon.classList.remove("fa-eye-slash");
      eyeIcon.classList.add("fa-eye");
    } else {
      passwordInput.type = "password";
      eyeIcon.classList.remove("fa-eye");
      eyeIcon.classList.add("fa-eye-slash");      
    }
  }

    var closeIcon = document.querySelector(".alert-close-icon");

    closeIcon.addEventListener("click", function() {
        var parentElement = this.parentElement;
        parentElement.style.display = "none";
    });


</script>

