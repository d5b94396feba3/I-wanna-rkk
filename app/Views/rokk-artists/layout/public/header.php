<!DOCTYPE html>
<html lang="en">
<head>
 <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ROKK Artist | <?php echo ucfirst(str_replace(['_','-'], ' ', $active_nav)); ?> </title>
  <!-- Favicon  -->
  <link rel="icon" href="<?php echo base_url("assets/images/rokk-ico.png"); ?>">
  <link href="<?php echo base_url("assets/src/css/fonts.css"); ?>" rel="stylesheet">
  <link href="<?php echo base_url("assets/src/vendor/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet">
  <div id="css-loader"></div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script async defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
  <script src="<?php echo base_url("assets/src/vendor/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
  <!-- jQuery & JQuery UI-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="<?php echo base_url( "assets/src/css/layout/header.css"); ?>" rel="stylesheet">
  <link href="<?php echo base_url( "assets/src/css/layout/sidebar.css"); ?>" rel="stylesheet">
  <link href="<?php echo base_url( "assets/src/css/layout/footer.css"); ?>" rel="stylesheet">
  <link href="<?php echo base_url( "assets/src/css/layout/compact-sidebar.css"); ?>" rel="stylesheet">
  <link href="<?php echo base_url("assets/src/css/layout/notification.css"); ?>" rel="stylesheet">
  <script src="<?= base_url('assets/src/js/header/header.js') ?>"></script>
  <script src="<?= base_url('assets/src/js/header/notification.js') ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    // Set shouldBeOpen flag to true if current page is music releases or create release
    window.shouldBeOpen = <?php echo isset($active_nav) && ($active_nav == "music_releases" || $active_nav == "create_release") ? 'true' : 'false'; ?>;
    
    // Set the notification URL for AJAX requests
    window.notificationUrl = '<?= base_url('Notification/notification_header') ?>';

    $(document).ready(function () {
        // Creating an array of promises for each AJAX request
        const promises = [
            load_notification_on_page_load(),
        ];

        // Wait for all AJAX requests to complete before hiding the loader
        Promise.all(promises)
            .then(() => {
                $("#ajax_loader").fadeOut("slow");
            })
            .catch((error) => {
                console.log("Error:", error);
            });
    });
</script>

</head>

    <div id="sidebar" class="pb-sidebar">
        <div class="d-flex justify-content-between align-items-center">
            <a href="<?php echo base_url(); ?>/" class="logo d-flex align-items-center">
                <img src="<?php echo base_url("assets/images/rokk-logo-white.png"); ?>" alt="Rokk logo" id="rokk-logo">
                <span class='logo-text-right'>ARTISTS</span>
            </a>
            <div class="sidebar-toggle">
                <i class="ri-skip-left-line left-toggle-arrow-icon"></i>
            </div>
        </div>
        <div class="seperator"></div>

        <div class="account-info-box pb-account-info-box">
            <a href="<?php echo base_url("login"); ?>" id="artistNameTab" class="d-flex align-items-center">

            <i class="ri-logout-circle-r-line"></i>

                <div class="artist-info">
                    <?php if (session('userrole')): ?>
                        <span class="artist-name"><?= ucfirst(session('profile_role')) ?></span>
                    <?php else: ?>
                        <span class="artist-name">Account</span>
                    <?php endif; ?>
                    <span class="artist-genre d-block">Sign in</span>
                </div>
                <i class="fas fa-chevron-right"></i>
            </a>
        </div>


        <?php if(session()->get('userrole') == "admin"): ?>
        <a href="<?php echo base_url("faqs_dashboard"); ?>" class="<?php echo isset($active_nav) && $active_nav == "frequently-asked-questions" ? "active" : ""; ?>">
            <!-- <i class="ri-information-line <?php echo isset($active_nav) && $active_nav == "frequently-asked-questions" ? "active" : ""; ?>"></i> -->
            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.5007 22.9168C6.74768 22.9168 2.08398 18.2531 2.08398 12.5002C2.08398 6.74719 6.74768 2.0835 12.5007 2.0835C18.2536 2.0835 22.9173 6.74719 22.9173 12.5002C22.9173 18.2531 18.2536 22.9168 12.5007 22.9168ZM12.5007 20.8335C17.103 20.8335 20.834 17.1026 20.834 12.5002C20.834 7.89779 17.103 4.16683 12.5007 4.16683C7.89828 4.16683 4.16732 7.89779 4.16732 12.5002C4.16732 17.1026 7.89828 20.8335 12.5007 20.8335ZM13.5423 10.9377V15.6252H14.584V17.7085H10.4173V15.6252H11.459V13.021H10.4173V10.9377H13.5423ZM14.0632 8.3335C14.0632 9.19644 13.3636 9.896 12.5007 9.896C11.6377 9.896 10.9382 9.19644 10.9382 8.3335C10.9382 7.47055 11.6377 6.771 12.5007 6.771C13.3636 6.771 14.0632 7.47055 14.0632 8.3335Z" />
            </svg>
             FAQs 
        </a>
        <?php else: ?>
            <a href="<?php echo base_url("faqs"); ?>" class="<?php echo isset($active_nav) && $active_nav == "frequently-asked-questions" ? "active" : ""; ?>">
            <!-- <i class="ri-information-line <?php echo isset($active_nav) && $active_nav == "frequently-asked-questions" ? "active" : ""; ?>"></i> -->
            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.5007 22.9168C6.74768 22.9168 2.08398 18.2531 2.08398 12.5002C2.08398 6.74719 6.74768 2.0835 12.5007 2.0835C18.2536 2.0835 22.9173 6.74719 22.9173 12.5002C22.9173 18.2531 18.2536 22.9168 12.5007 22.9168ZM12.5007 20.8335C17.103 20.8335 20.834 17.1026 20.834 12.5002C20.834 7.89779 17.103 4.16683 12.5007 4.16683C7.89828 4.16683 4.16732 7.89779 4.16732 12.5002C4.16732 17.1026 7.89828 20.8335 12.5007 20.8335ZM13.5423 10.9377V15.6252H14.584V17.7085H10.4173V15.6252H11.459V13.021H10.4173V10.9377H13.5423ZM14.0632 8.3335C14.0632 9.19644 13.3636 9.896 12.5007 9.896C11.6377 9.896 10.9382 9.19644 10.9382 8.3335C10.9382 7.47055 11.6377 6.771 12.5007 6.771C13.3636 6.771 14.0632 7.47055 14.0632 8.3335Z" />
            </svg>
             FAQs
        </a>
        <?php endif; ?>
    </div>




<!-- compact-sidebar start here -->

<div id="compact-sidebar">
    <div class="content">
        <div class="main-links">
            <div class="d-flex justify-content-between align-items-center">
                <a href="<?php echo base_url(); ?>/" class="logo d-flex align-items-center">
                    <img src="<?php echo base_url("assets/images/rokk-ico.png"); ?>" alt="Rokk logo" id="rokk-logo">
                    <!-- <span class='logo-text-right'>ARTISTS</span> -->
                </a>
                <div class="sidebar-toggle">
                    <i class="ri-skip-left-line left-toggle-arrow-icon"></i>
                </div>
            </div>
            <div class="seperator"></div>
        </div>

        <!-- <a href="https://rokk-app.com/faq" target="_blank">
            <i class="active ri-information-line"></i>
        </a> -->
    
        <a href="<?php echo base_url("faqs"); ?>" class="<?php echo isset($active_nav) && $active_nav == "frequently-asked-questions" ? "active" : ""; ?>">
            <!-- <i class="ri-information-line <?php echo isset($active_nav) && $active_nav == "frequently-asked-questions" ? "active" : ""; ?>"></i> -->
            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.5007 22.9168C6.74768 22.9168 2.08398 18.2531 2.08398 12.5002C2.08398 6.74719 6.74768 2.0835 12.5007 2.0835C18.2536 2.0835 22.9173 6.74719 22.9173 12.5002C22.9173 18.2531 18.2536 22.9168 12.5007 22.9168ZM12.5007 20.8335C17.103 20.8335 20.834 17.1026 20.834 12.5002C20.834 7.89779 17.103 4.16683 12.5007 4.16683C7.89828 4.16683 4.16732 7.89779 4.16732 12.5002C4.16732 17.1026 7.89828 20.8335 12.5007 20.8335ZM13.5423 10.9377V15.6252H14.584V17.7085H10.4173V15.6252H11.459V13.021H10.4173V10.9377H13.5423ZM14.0632 8.3335C14.0632 9.19644 13.3636 9.896 12.5007 9.896C11.6377 9.896 10.9382 9.19644 10.9382 8.3335C10.9382 7.47055 11.6377 6.771 12.5007 6.771C13.3636 6.771 14.0632 7.47055 14.0632 8.3335Z" />
            </svg>
        </a>

        <div class="sidebar-footer">
            <a href="<?php echo base_url("login"); ?>"><i class="ri-logout-circle-r-line"></i></a>
        </div>
    </div>
</div>


<!-- header top menu start here-->
<div id="header">
    <div class="desktop-header-content">
    <h1>
        <?php if($active_nav=="music_releases"): ?>
            Music Upload<span id='header-active-tilte'>- Your releases</span>
        <?php elseif($active_nav=="create_release"): ?>
            Music Upload<span id='header-active-tilte'>- Create Releases</span>
        <?php else: ?>
            <?= isset($active_nav) ? preg_replace('/-/', ' ', $active_nav) : "Dashboard" ?>
        <?php endif; ?>
    </h1>

    </div>

    <div class="mobile-header-content">
        <div class="d-flex justify-content-between align-items-center">
            <a href="<?php echo base_url(); ?>/" class="logo d-flex align-items-center">
                <img src="<?php echo base_url("assets/images/rokk-ico.png"); ?>" alt="Rokk logo" id="rokk-logo">
                <span class='logo-text-right'>ARTISTS</span>
            </a>
            <div class="sidebar-toggle">
                <i class="ri-skip-left-line left-toggle-arrow-icon"></i>
            </div>
        </div>
       
    </div>

</div>

 <body class="main-body-content">

 <div class="mobile-menu-heading">
    <h1>
        <?php if($active_nav=="music_releases"): ?>
            Music Upload<span id='header-active-tilte'>- Your releases</span>
        <?php elseif($active_nav=="create_release"): ?>
            Music Upload<span id='header-active-tilte'>- Create Releases</span>
        <?php else: ?>
            <?= isset($active_nav) ? preg_replace('/-/', ' ', $active_nav) : "Dashboard" ?>
        <?php endif; ?>
    </h1>
</div>
