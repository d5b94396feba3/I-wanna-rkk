<style>
    .notification-list-item {
        display: flex;
        align-items: center;
        padding: 15px 15px;
    }
    .notification-checkbox {
        flex: 0 0 30px;
        margin-right: 15px;
    }
    .notification-checkbox input[type="checkbox"] {
        width: 20px;
        height: 20px;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border: 2px solid #ccc;
        border-radius: 3px;
        outline: none;
        transition: all 0.3s;
        cursor: pointer;
        position: relative;
    }
    .notification-checkbox input[type="checkbox"]:checked {
        background-color: orange;
        border-color: orange;
    }
    .notification-checkbox input[type="checkbox"]:checked::before {
        content: '\2714';
        font-size: 14px;
        color: white;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .notification-content {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .notification-list-title {
        font-size: 16px;
        font-weight: 500;
        color: #333;
        margin-bottom: 0px;
    }
    .notification-list-content {
        font-size: 14px;
        color: #666;
    }
    .notification-list-message{
        font-size: 14px;
        color: #666;
    }
    .list-right-arrow {
        font-size: 20px;
        color: #999;
        margin-left: 15px;
    }

    .notification-list-title span {
        color: rgba(255, 255, 255, 0.6);
        font-size: 19px;
        font-weight: 600;
    }

   /* drawer style start here */
    .notifications-container {
        position: relative;
        overflow: hidden;
    }
    .notification-details-drawer {
        position: fixed;
        top: 0;
        right: -400px;
        width: 400px;
        height: 100%;
        background-color: #0f0f0f;
        box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
        transition: right 0.3s ease-in-out;
        z-index: 1000;
        color: #333333;
    }
    .notification-id{
        margin: 0;
        font-size: 15px !important;
        font-family: 'Poppins', sans-serif;
        line-height: 1.7em;
    }
    .notification-date{
        margin: 0;
        font-size: 17px !important;
        margin: 10px 0px 32px 0px;
    }
    .notification-message{
        margin: 0;
        font-size: 17px !important;
        font-family: 'Poppins', sans-serif;
        line-height: 1.7em;
    }
    .notification-details-drawer.open {
        right: 0;
    }
    .drawer-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        border-bottom: 1px solid rgba(255,255,255,0.08);
        background-color: #0f0f0f;
    }
    .close-drawer {
        background: none;
        border: none;
        font-size: 27px;
        cursor: pointer;
        color:#fff;
    }
    .close-drawer:hover {
        color:#ff8303;
    }
    .drawer-content {
        padding: 20px;
    }
   .drawer-notification-icon {
        width: 100%;
        height: 140px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
        padding: 0px 0px 0px 0px;
        background: #1a1a1a;
    }
    .drawer-notification-icon .notification-icon {
        font-size: 41px;
        color: #ff8303;
        background: #4a4444;
        padding: 20px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 80px;
        height: 80px;
    }
    .drawer-header h3 {
        margin: 0;
        font-size: 18px;
        font-weight: 600;
        font-family: "Poppins", sans-serif;
    }
    .notification-title {
        margin: 0;
        font-size: 19px;
        font-weight: 700 !important;
        font-family: "Poppins", sans-serif;
        line-height: 1.5em;
        margin-bottom: 5px;
    }
    .drawer-notification-icon img {
        width: 80px;
        height: 80px;
    }
    .drawer-actions {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        display: flex;
        justify-content: space-around;
        background-color: #0f0f0f;
        border-top: 1px solid rgba(255,255,255,0.08);
    }
    .drawer-actions button {
        padding: 14px 17px 14px 17px;
        border: none;
        background-color: #1a1a1a;
        color: white;
        cursor: pointer;
        font-weight: 600;
        text-transform: uppercase;
        border-radius: 4px;
        font-family: "Poppins", sans-serif;
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 6px;
    }
  
    .drawer-actions button.mark-btn {
        border-right: 2px solid #0f0f0f;
    }
    .drawer-actions button.delete {
        border-left: 2px solid #0f0f0f;
    }
    .drawer-actions button.mark-btn i,
    .drawer-actions button.delete i
    {
        font-size: 24px;
        color: #ff8303;
    }
    .drawer-actions button:hover {
        background-color: #ff8303;
    }
    .drawer-actions button:hover i{
        color: #fff;
    }
    
    .notification-list-message{
        display: none;
    }

</style>

<div class="notifications-container">
    <div class="notifications-list">
        <div class="notification-content">
        <?php if (!empty($notifications)): ?>
        <div class="row">
        <?php foreach ($notifications as $index => $notification): ?>
        <div class="col-md-12 col-sm-12">
            <?php if($notification['read'] == 0): ?>
                <div class="notification-list-item active">
            <?php else: ?>
                <div class="notification-list-item">
            <?php endif; ?>
                <div class="notification-checkbox">
                <input type="checkbox" id="notification-<?= $notification['id'] ?>" name="notification-<?= $notification['id'] ?>">
                </div>
                <div class="notification-content">
                    <div class="notification-list-title">
                        <span><?= esc($notification['title']) ?></span>
                    </div>
                    <div class="notification-list-content">
                        <p class="mb-0"><?= date('F j, Y', strtotime($notification['createdAt'])) ?></p>
                    </div>
                    <div class="notification-list-message">
                        <p class="mb-0"><?= $notification['content']; ?></p>
                    </div>
                </div>
                <i class="list-right-arrow fas fa-chevron-right"></i>
            </div>
        </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="notification-list-item-noresult">
                <div class="notification-list-title">
                    <span>No Notification Available</span>
                </div>
                <div class="notification-list-content">
                    <div class="show-less-content active">
                        <p class="mb-3">There are no Notification available.</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <?php endif; ?>
        </div>
    </div>
    <div class="notification-details-drawer">
        <div class="drawer-header">
            <h3>Notification details</h3>
            <button class="close-drawer">&times;</button>
        </div>
        <div class="drawer-content">
            <div class="drawer-notification-icon">
                <i class="notification-icon ri-notification-3-line"></i>
            </div>
            <h2 class="notification-title"></h2>
            <p class="notification-id"></p>
            <p class="notification-date"></p>
            <p class="notification-message"></p>
        </div>
        <div class="drawer-actions">
            <button class="mark-btn"><i class="ri-mail-unread-line"></i> MARK AS READ</button>
            <button class="delete"><i class="ri-delete-bin-line"></i> DELETE</button>
        </div>
    </div>
</div>


<script>


window.delete_selected_notification = function (notification_id) {


    var url = '<?= base_url('Notification/delete_notification') ?>';

    // Get CSRF token values
    var csrfName ="<?= csrf_token() ?>";
    var csrfValue ="<?= csrf_hash() ?>";

    // Abort any existing request
    if (currentNDelRequest && currentNDelRequest.state() === 'pending') {
        currentNDelRequest.abort();
    }
    // Store the new request
    currentNDelRequest = $.ajax({
        url: url,
        type: 'post',
        data:{
            [csrfName]:csrfValue,
            id:notification_id,
        },
        timeout:20000, // 20 seconds
        beforeSend: function (jqXHR) {
            //Show loading indicator
            const message = "Processing...";
            window.show_sweet2alert_loader(message);
        },
        success: function(response){
        if (response.csrf_hash) {
            $('input[name="csrf_ar"]').val(response.csrf_hash); // Update form with new token
        }
        if (response.success) {
            window.successMsg(response.message);
            window.load_notification_on_page_load();
        }else{
            window.errorMsg(response.message);
        }
        },
        error: function(xhr, status, error) {
            window.errorMsg('An error occurred while processing your request. Please refresh and try again.');
            console.error('Error submitting form:', error);
        },
        dataType: 'json'
    });

}


window.update_artist_notification_status = function (notification_id,read_status) {

    var url = '<?= base_url('Notification/ajax_update_artist_notification_status') ?>';
    // Get CSRF token values
    var csrfName ="<?= csrf_token() ?>";
    var csrfValue ="<?= csrf_hash() ?>";

    // Abort any existing request
    if (currentUDTRequest && currentUDTRequest.state() === 'pending') {
        currentUDTRequest.abort();
    }
    // Store the new request
    currentUDTRequest = $.ajax({
        url: url,
        type: 'post',
        data:{
            [csrfName]:csrfValue,
            notification_id:notification_id,
            read_status:read_status,
        },
        timeout:20000, // 20 seconds
        beforeSend: function (jqXHR) {
            //Show loading indicator
            const message = "Processing...";
            window.show_sweet2alert_loader(message);
        },
        success: function(response){
            if (response.csrf_hash) {
                $('input[name="csrf_ar"]').val(response.csrf_hash); // Update form with new token
            }
            $('#ajax_loader').fadeOut("slow");
            if (response.success) {
                window.successMsg(response.message);
                $('.notification-details-drawer').removeClass('open');
                window.load_notification_on_page_load();
            }else{
                window.errorMsg(response.message);
            }
        },
        error: function(xhr, status, error) {
            window.errorMsg('An error occurred while processing your request. Please refresh and try again.');
            console.error('Error submitting form:', error);
        },
        dataType: 'json'  
    });
}


</script>