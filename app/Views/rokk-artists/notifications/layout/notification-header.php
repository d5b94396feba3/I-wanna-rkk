<style>
    .notification-header {
        position: sticky; 
        top: 0;
        width: 100%;      
        max-width: 100%;
        background: #161515;
        z-index: 1000;  
        border-bottom:1px solid #3838389e;
        padding:0px 2px 7px 10px !important;
    }
    .notification-item {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 0;
        pointer:cursor;
    }
    .notification-item:hover {
        background-color: #2a2c2e;  
    }
    .notification-item:hover .notification-content a,
    .notification-item:hover .notification-content p {
        color: #fff;
    }
    .notification-item:active {
        background-color: #3a3c3e;  
    }
    .notification-content {
        flex: 1;
    }
    .publish-date {
        font-size: 12px;
        color: #6c757d;
        font-style: italic;
        margin: 0;
        padding-top:5px;
    }
    .content {
        font-size: 12px;
        color: #6c757d;
        font-style: italic;
        margin: 0;
        padding-top:5px;
    }
    .notification-dropdown h3{
        margin-top:4px;
    }
   /* Separate selectors for plain CSS */
    .notification-dropdown .desktop-notifications-items::-webkit-scrollbar,
    .notification-dropdown .mobile-notifications-items::-webkit-scrollbar {
        width: 2px !important;
    }
    
    .notification-dropdown .desktop-notifications-items::-webkit-scrollbar-track,
    .notification-dropdown .mobile-notifications-items::-webkit-scrollbar-track {
        background: transparent;
    }
    
    .notification-dropdown .desktop-notifications-items::-webkit-scrollbar-thumb,
    .notification-dropdown .mobile-notifications-items::-webkit-scrollbar-thumb {
        background: #666;
        border-radius: 2px !important;
    }
    
    /* Firefox */
    .notification-dropdown .desktop-notifications-items,
    .notification-dropdown .mobile-notifications-items {
        scrollbar-width: thin;
        scrollbar-color: #302f2f transparent;
    }

    .notification-content.mark-all-as-read {
        display: flex;
        text-align: center;
        align-items: center;
        justify-content: center;
    }
    .notification-dropdown li i.ri-eye-line {
        font-size: 16px;
        color: #FF8303;
        margin: 0px 7px 0px 0px;
    }
    span.no-notification-result {
        text-align: center;
        color: rgba(255, 255, 255, 0.7);
        font-size: 15px;
        padding: 16px 10px;
    }
    .notification-read-loader-icon {
        margin-right: 7px;
    }
</style>
<ul>
<?php if (!empty($notifications)): ?>
    <?php foreach ($notifications as $index => $notification): ?>
        <a href="<?= base_url('notification') ?>">
        <li class="notification-item">
          
            <i class="ri-notification-2-line"></i>
            <div class="notification-content">
               <span><?php echo $notification['title']; ?></span>
               <?php 
                $current_date = new DateTime();
                $published_date = new DateTime($notification['createdAt']);
                $diff = $current_date->diff($published_date);
                $recent_update=false;

                if ($diff->days == 0) {
                    $days_ago = 'Today';
                    $recent_update=true;
                } else if ($diff->days == 1) {
                    $days_ago = 'Yesterday';
                    $recent_update=true;
                } else {
                    $days_ago = $diff->days . ' Days Ago';
                }

                $content=$notification['content'];
                $content = substr($content, 0, 100) . '...';
                
               ?>
                <p class="content"><?= $content; ?> </p>
                <?php if($recent_update): ?>
                    <p class="publish-date"><?= $days_ago ?> </p>
                <?php else: ?>
                    <p class="publish-date"><?= date('F j, Y', strtotime($notification['createdAt'])) ?> </p>
                <?php endif; ?>
            </div>
           
        </li>
        </a>
    <?php endforeach; ?>
    <li class="notification-item">
        <div class="notification-content mark-all-as-read">
            <form method="post" id="mark-all-as-read-form" action="/Notification/ajax_update_artist_all_notifications_status">
                <?= csrf_field(); ?>
                <button type="submit" class="mark-all-as-read-btn" style="background: none; border: none; cursor: pointer;">
                    <i class="ri-eye-line notification-read-icon"></i>
                    <i class="fas fa-spinner fa-spin notification-read-loader-icon" style="display:none;"></i>
                    <span>Mark all as read</span>
                </button>
                
            </form>
        </div>
    </li>
<?php else: ?>
    <li>
        <span class="no-notification-result">You have no new notifications</span>
    </li>
<?php endif; ?>
</ul>


