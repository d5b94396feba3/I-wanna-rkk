<!DOCTYPE html>
<html lang="en">

<head>
 <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="<?= csrf_token() ?>" content="<?= csrf_hash() ?>">

  <!-- Favicon  -->
  <link rel="icon" href="<?php echo base_url('assets/images/rokk-ico.png') ?>">

  <link href="<?php echo base_url('assets/src/new/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

  <div id="css-loader"></div>

   <!-- Include Chart.js library -->
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- Font Awesome (Loaded asynchronously) -->
  <script async defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

  <!-- jQuery & JQuery UI-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <!-- Main CSS File -->
  <!-- <link href="<?php echo base_url('assets/src/new/css/style.css') ?>" rel="stylesheet"> -->

  <link href="https://db.onlinewebfonts.com/c/4284e9fd3a2c302e86832ee85ad3a7fd?family=TitlingGothicFBComp-Medium" rel="stylesheet">



  <title>ROKK Artist</title>
    <style>
        #sidebar {
            height: 100%;
            width: 320px;
            position: fixed;
            top: 0;
            left: 0;
/*            background-color: #282828;*/
            padding-top: 20px;
            padding-left: 25px;
            background: linear-gradient(0deg, #111 100%, rgba(0, 0, 0, 0) 27.82%), linear-gradient(0deg, #0b0b0b, #282828);
        }
        #sidebar img {
            max-width: 50%;
            margin-bottom: 11px;
        }

        #content {
            margin-left: 322px;
            padding: 0px 0px 20px 0px;
        }

        #sidebar a {
            padding: 12px 10px;
            text-decoration: none;
            font-size: 17px;
            color: #818181;
            display: block;
        }

        #sidebar a.active {
            color: #fff;
        }

        #sidebar a:hover {
            color: #f8f9fa !important;
        }

        #sidebar svg{
            margin-right: 15px;
        }

       .dropdown svg{
            margin-right: 6px;
        }

        /*main style.css starts here*/

        body{
            font-family:"Poppins",sans-serif;
            color:rgba(255,255,255,.81);
            background:linear-gradient(180deg,#000 100%,rgba(0,0,0,0) 100%);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
        .heading {
            padding: 45px 0px 30px 65px;
/*            background: #282828 !important;*/
            background: linear-gradient(0deg, #111 100%, rgba(0, 0, 0, 0) 27.82%), linear-gradient(0deg, #0b0b0b, #282828);
            margin: 0px 37px 0px 36px;
            text-transform: uppercase;
        }

        .heading h2{
            font-weight: 800;
         }

        #header {
            color: #f8f9fa;
            padding: 15px 38px 15px 0px;
            text-align: right;
        }
        #header .dropdown-menu {
            background-color: #383838;
            color: #f8f9fa;
            margin-top: 2px !important;
        }
        #header .dropdown-menu .dropdown-item {
            color: #ffffffb0;
        }

        #header .dropdown-menu .dropdown-item:hover{
            color:#000;
        }
        #dropdownMenuBtn {
            background: rgba(255, 131, 3, .6);
            border: none !important;
            background: linear-gradient(0deg, #282828 100%, rgba(0, 0, 0, 0) 27.82%), linear-gradient(0deg, #0b0b0b, #282828);
            padding: 10px 26px 10px 24px;
            opacity: 0.7;
            color: #fff !important;
        }
        #dropdownMenuBtn:hover{
            opacity: 1;
        }
        #dropdownMenuBtn:focus{
            outline:none !important;
            box-shadow: none !important;
        }
        a{
            text-decoration: none;
        }
        .social-icons {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
            position: absolute;
            bottom: 0;
            padding-left: 37px;
        }

        .social-icons a {
            margin: 0 10px; 
        }

        .list-menu {
            display: none;
            list-style: none;
            padding-left: 21px;
            margin-bottom: 2px;
        }

        .list-menu li {
            padding: 0px 0px 0px 0px;
            line-height: 0px;
            font-size: 17px !important;
        }
        .list-menu .dropdown-item:hover{
            background-color: #1b1a1a;
            color:#fff;
        }

        .dropdown-item.active{
            background-color: #1b1a1a;
        }

        #sidebar #musicUploadDropdownIcon{
            float: right;
            margin-right: 20px;
            transition: transform 0.5s ease; 
        }
        #sidebar #accountDropdownIcon{
            float: right;
            margin-right: 20px;
            transition: transform 0.5s ease; 
        }
        .rotate180 {
            transform: rotate(180deg);
        }

        a{
            color: #FF8C00;
        }
        a:active{
            background-color: rgba(255, 131, 3, .6) !important;
            color: #fff !important;
        }
       

        /*main style.css ends here*/
    </style>


    <script>
         // sidebar music upload dropdown
        $(document).on('click', '#musicUploadDropdown', function(event){
             $('#musicUploadDropdownMenu').toggle('slow');
             $('#musicUploadDropdownIcon').toggleClass('rotate180');
        });

        // sidebar music upload dropdown
        $(document).on('click', '#accountDropdown', function(event){
             $('#accountDropdownMenu').toggle('slow');
             $('#accountDropdownIcon').toggleClass('rotate180');
        });

    </script>


</head>

<body>

<?php

    if (isset($_SESSION['logged_in'])) { ?>

    <div id="sidebar">
         <a href="<?php echo base_url(); ?>/" class="logo d-flex align-items-center">
      <img src="<?php echo base_url('assets/images/rokk-logo-white.png') ?>" alt="Rokk logo" id="rokk-logo">
        <span>.Artist</span>
      </a>
        <a href="<?php echo base_url('/'); ?>" class="<?php echo (isset($active) && $active == 'home') ? 'active' : ''; ?>">
        <i class="fas fa-home"></i> Dashboard</a>

        <a href="<?php echo base_url('direct-artist-support'); ?>" class="<?php echo (isset($active) && $active == 'direct-artist-support') ? 'active' : ''; ?>">
        <i class="fas fa-hands-helping"></i> Direct Artist Support</a>

        <div class="list-dropdown">

            <a href="#" id="musicUploadDropdown" class="<?php echo (isset($active) && isset($dropdownActive) && $dropdownActive == 'profile') ? 'active' : ''; ?>">
                <i class="fas fa-music"></i> Music Upload <i class="fas fa-caret-down" id="musicUploadDropdownIcon"></i></a>

            <ul class="list-menu" id="musicUploadDropdownMenu">

                <li><a class="dropdown-item <?php echo (isset($active) && $active == 'mu_profile') ? 'active' : ''; ?>" href="<?php echo base_url('mu_profile'); ?>">
                    <i class="fas fa-user"></i> Profile Details</a>
                </li>
                <li><a class="dropdown-item <?php echo (isset($active) && $active == 'mu_release') ? 'active' : ''; ?>" href="<?php echo base_url('mu_release'); ?>">
                    <i class="fas fa-plus-circle"></i> Create Release</a>
                </li>
               <!--  <li><a class="dropdown-item <?php echo (isset($active) && $active == 'mu_track') ? 'active' : ''; ?>" href="<?php echo base_url('mu_track'); ?>">
                    <i class="fas fa-music"></i> Add Track</a>
                </li> -->

            </ul>
        </div>


        <div class="list-dropdown">
            <a href="#" id="accountDropdown" class="<?php echo (isset($active) && isset($dropdownActive) && $dropdownActive == 'account') ? 'active' : ''; ?>">
                <i class="fas fa-cogs"></i> Account <i class="fas fa-caret-down" id="accountDropdownIcon"></i>
            </a>
            <ul class="list-menu" id="accountDropdownMenu">

                <li><a class="dropdown-item <?php echo (isset($active) && $active == 'connectedAccount') ? 'active' : ''; ?>" href="<?php echo base_url('connected_account'); ?>"><i class="fas fa-users"></i> Connected Accounts</a></li>

                <li><a class="dropdown-item <?php echo (isset($active) && $active == 'profile') ? 'active' : ''; ?>" href="<?php echo base_url('profile'); ?>"><i class="fas fa-user"></i> Profile Detail</a></li>

                <li><a class="dropdown-item <?php echo (isset($active) && $active == 'accountPassword') ? 'active' : ''; ?>" href="<?php echo base_url('change_password'); ?>"><i class="fas fa-lock"></i> Change Password</a></li>

                <li><a class="dropdown-item <?php echo (isset($active) && $active == 'deleteAccount') ? 'active' : ''; ?>" href="<?php echo base_url('delete_account'); ?>"><i class="fas fa-trash-alt"></i> Delete Account</a></li>
               
            </ul>
        </div>

        <a href="<?php echo base_url('statistics'); ?>" class="<?php echo (isset($active) && $active == 'statistics') ? 'active' : ''; ?>">
        <i class="fas fa-chart-bar"></i> Statistics</a>

        <a href="https://rokk-app.com/faq" target="_blank">
        <i class="fas fa-question-circle"></i> FAQ's</a>

        <a href="<?php echo base_url('logout'); ?>"><i class="fas fa-sign-out-alt"></i> Sign Out</a>

         <div class="social-icons">
          <a href="https://www.facebook.com/rokkstreamingapp" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="https://www.instagram.com/rokkstreaming/" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="https://www.youtube.com/@ROKKSTREAMING" class="youtube"><i class="bi bi-youtube"></i></a>
        </div>
    </div>
 <div id="content">


<div id="header">
    <div class="dropdown">
        <button class="btn dropdown-toggle" type="button" id="dropdownMenuBtn" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-user"></i>
        <!-- username -->
        <?= session('username'); ?>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuBtn">
            <li><a class="dropdown-item" href="<?php echo base_url('profile'); ?>"><i class="fas fa-user"></i> Profile</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('change_password'); ?>"><i class="fas fa-lock"></i> Change Password</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('logout'); ?>"><i class="fas fa-sign-out-alt"></i> Sign Out</a></li>
        </ul>
    </div>
</div>
    <?php }else {?>

<!-- <div id="header">
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuBtn" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-user"></i>
        Account
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuBtn">
            <li><a class="dropdown-item" href="<?php echo base_url(); ?>Home/login"><i class="fas fa-sign-in"></i> Sign In</a></li>
        </ul>
    </div>
</div> -->

 <?php }?>
