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
    <div class="notification-wrapper">
        <div class="notification-icon" id="notificationToggle">
            <i class="ri-notification-3-line"></i>
            <span class="notification-count">0</span>
        </div>
        <div class="notification-dropdown">
            <i class="fas fa-chevron-down dropdown-indicator"></i>
            <div class="notification-header">
                <h3>Notifications</h3>
            </div>
            <div class="desktop-notifications-items">
            </div>
        </div>
    </div>
</div>