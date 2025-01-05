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
