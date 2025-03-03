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
    <div class="notification-wrapper">
        <div class="notification-icon" id="notificationToggleMobile">
            <i class="ri-notification-3-line"></i>
            <span class="notification-count">0</span>
        </div>
        <div class="notification-dropdown">
            <i class="fas fa-chevron-down dropdown-indicator"></i>
            <div class="notification-header">
            <h3><span class="header-notification-count">0</span> New Notifications</h3>
                <a href="<?php echo base_url("notification"); ?>" class="view-more">
                 View more <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            <div class="desktop-notifications-items">
            </div>
        </div>
    </div>
</div>