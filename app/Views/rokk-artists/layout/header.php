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
  <link href="<?php echo base_url("assets/src/css/alert.css"); ?>" rel="stylesheet">
  <script src="<?= base_url('assets/src/js/header/header.js') ?>"></script>
  <script src="<?= base_url('assets/src/js/header/notification.js') ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script type="text/javascript">
        // Set shouldBeOpen flag to true if current page is music releases or create release
        window.shouldBeOpen = <?php echo isset($active_nav) && ($active_nav == "music_releases" || $active_nav == "create_release") ? 'true' : 'false'; ?>;
    
        // Set the notification URL for AJAX requests
        window.notificationUrl = '<?= base_url('Notification/notification_header') ?>';

        // Contains authentication status for use in client-side script
        window.authStatus = <?= json_encode([
            'authenticated' => session()->get('authenticated'), 
            'cookieStatus' => session()->get('cookieStatus'),
        ]) ?>;

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
    <!-- Load session script after loginStatus is defined -->
    <script src="<?= base_url('assets/src/js/session/index.js') ?>" defer></script>

</head>

<div id="sidebar">
    <!-- include sidebar -->
    <?php include(__DIR__."/header-components/sidebar.php")?>
</div>

<!-- compact-sidebar start here -->

<div id="compact-sidebar">
  <!-- include compact-sidebar -->
  <?php include(__DIR__."/header-components/compact-sidebar.php")?>
</div>
<!-- header top menu start here-->
<div id="header">
    <!-- include desktop header content -->
    <?php include(__DIR__."/header-components/desktop-header-content.php")?>
    <!-- include mobile header content: default hidden -->
    <?php include(__DIR__."/header-components/mobile-header-content.php")?>
</div>

<body class="main-body-content">
    <!-- include mobile menu heading: default hidden-->
    <?php include(__DIR__."/header-components/mobile-menu-heading.php")?>