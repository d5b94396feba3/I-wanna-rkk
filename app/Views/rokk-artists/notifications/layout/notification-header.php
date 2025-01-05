<style>
    .notification-header {
        position: sticky; 
        top: 0;
        width: 100%;      
        max-width: 100%;
        background: #161515;
        z-index: 1000;  
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
        scrollbar-color: #666 transparent;
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

                if ($diff->days == 0) {
                    $days_ago = 'Today';
                } else if ($diff->days == 1) {
                    $days_ago = 'Yesterday';
                } else {
                    $days_ago = $diff->days . ' Days Ago';
                }
               ?>
                <p class="publish-date"><?= date('F j, Y', strtotime($notification['createdAt'])) ?> (<?= $days_ago ?>) </p>
            </div>
           
        </li>
        </a>
    <?php endforeach; ?>
<?php else: ?>
    <li>
        <span>No new notifications</span>
    </li>
<?php endif; ?>
</ul>


