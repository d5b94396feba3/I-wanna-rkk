<style type="text/css"> 

    #dashboard-footer {
        margin: 0px 55px 0px 111px !important;
    }
    .card-box {
        background: rgba(30, 30, 30, 0.67);
        padding: 0px 0px 33px 26px;
        border-radius: 16px;
    }
    .main-container {
        padding: 45px 37px 30px 37px;
    }
    .col-xl-4.mb-30.mt-4.chart4 {
        margin-top: 26px !important;
    }
    .widget-style {
        height: 100%;
        padding-right: 15px;
    }
    .widget-data {
        width: 100%;
    }
    .h4 {
        font-size: 48px;
        font-weight: 500;
        color: #FF8303;
        margin: 10px 0;
        font-family: 'TitlingGothicFBComp-Medium',sans-serif;
        font-stretch: condensed;
    }

    .metric-card {
        position: relative;
        padding: 26px;
    }
    .large-number {
        font-size: 25px;
        font-weight: 600;
        color: #FF8303;
        font-stretch: condensed;
        letter-spacing: -0.04em;
    }

    .add-btn {
        font-size: 25px;
        font-weight: 400;
        color: #FF8303;
        font-stretch: condensed;
        letter-spacing: -0.04em;
        background: #ffffff0f;
        border-radius: 50%;
        width: 35px;
        height: 35px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0;
        margin-right: -5px;
    }

    .medium-number {
        font-size: 36px;
        font-weight: bold;
        color: #FF8303;
    }

    .metric-label {
        font-size: 14px;
        color: #999;
        margin-top: -5px;
    }
    .metric-content {
        justify-content: space-between;
    }

    .main-metric, .secondary-metric {
        flex: 1;
    }

    .top-list {
        margin-top: 15px;
    }

.list-item {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
    padding: 10px;
    background: rgba(30, 30, 30, 0.67);
    border-radius: 12px;
}

.list-item:hover {
    background: linear-gradient(0deg, #1a1a1a 100%, rgba(0, 0, 0, 0) 27.82%), linear-gradient(0deg, #151515, #333333);
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.item-image {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 5px;
    margin-right: 10px;
}

.item-info {
    flex-grow: 1;
}

.item-title {
    color:rgba(255, 255, 255, 0.7);
    font-size: 14px;
    font-weight:500;
}

.item-subtitle {
    color: #999999;
    font-size: 12px;
}

.fas.fa-arrow-right {
    color: #999999;
}

h2 svg {
    margin-right: 7px;
}

.rt-link-icon {
    float: right;
    margin-right: 0px;
    color: rgba(255, 255, 255, 0.5);
}
.rt-link-icon:hover {
    color: rgba(255, 255, 255, 0.7);
}

.das-user-count {
    position: relative;
}
.das-user-count::after {
    content: '';
    position: absolute;
    top: 22px;
    right: 0;
    width: 1px;
    height: 80%;
    background-color: #ffffff1f;
}
.widget-data.secondary-metric {
    margin: -37px 0px 0px 26px;
}

.weight-700 {
    font-weight: 700 !important;
    color: rgba(255,255,255,0.75);
    font-size: 16px;
    font-family: 'TitlingGothicFBComp-Medium',sans-serif;
    letter-spacing: 0.06em;
    font-stretch: condensed; 
    text-transform: uppercase;
}

.show-result {
    font-size: 25px !important;
    font-weight: 500;
    color: var(--text-color-show-result);
    text-transform: uppercase;
    font-family: 'TitlingGothicFBComp-Medium', sans-serif;
}
.highlight-result {
    color: #cf6c05;
}
.second-highlight-result {
    color: #888;
}

.alert-success {
    width: 90% !important;
    display: flex;
    margin: 0 auto;
    justify-content: center;
    align-items: center;
    color: #155724 !important;
    background-color: #d4edda;
    border-color: #282828 !important;
    border: 1px solid #c3e6cb;
}

.alert-danger {
    color: #842029;
    background-color: #f8d7da;
    border-color: #f5c2c7;
    width: 90% !important;
    margin: 0 auto;
    text-align: center;
    margin-bottom: 20px;
}

p.show-result.show-das-heading {
    margin-top: 7px !important;
    font-size: 12px !important;
    color: #FF8303 !important;
    font-family:'Poppins', sans-serif;
    font-weight:500 !important;
}

.metric-card .large-number {
    margin-left: 15px;
}

.metric-card {
    padding: 15px 20px;
}

.separator {
    width: 100%;
    height: 1px;
    background-color: #333333ab;
    margin: 23px 0px 0px 0px;
}
#ReleasesChart {
    height: 117px !important;
    width: 248px !important;
    margin-top: 8px;
}
.left-release-data {
    margin: 0px 0px 0px 0px;
    padding: 18px 0px 0px 0px;
    width: 100%;
}

.left-release-data {
    position: relative;
}
.left-release-data::after {
    content: '';
    position: absolute;
    top: 20px;
    right: 0;
    width: 1px;
    height: 100px;
    background-color: #ffffff1f;
}

/* placeholder style */
#notification-table-container-placeholder {
    width: 98.5%;
    background: linear-gradient(to right, rgba(40, 40, 40, 0) 47.82%, rgba(17, 17, 17, 0) 100%);
    background-size: 100% 100%, 100% 100%, contain;
    background-position: right center;
    border-radius: 15px;
    color: #FFFFFFCC;
    margin-top: 18px;
    padding: 0;
    margin-bottom: 20px;
    margin-left: 8px;
    transition: background .3s ease, transform .3s ease;
    border: none;
    position: relative;
    overflow: hidden;
    margin-right: 0;
}
.background-masker {
    background-color: #fff;
    position: absolute;
}
@keyframes placeHolderShimmer {
    0% {
    background-position: -800px 0;
}
100% {
    background-position: 800px 0;
}
}.notification-table-animated-background {
    animation-duration: 2s;
    animation-fill-mode: forwards;
    animation-iteration-count: infinite;
    animation-name: placeHolderShimmer;
    animation-timing-function: linear;
    background: linear-gradient(to right, #111 47.82%, rgba(17, 17, 17, 0) 100%);
    background-size: 100% 100%, 100% 100%, contain;
    background-position: right center;
    height: 750px !important;
    border-radius: 1px;
    position: relative;
}

#uploadProgressBar {
    position: relative;
    height: 20px;
    background-color: #f0f0f0 !important;
    border-radius: 25px;
    width: 100%;
    padding: 0px 0px;
    display: none;
    text-align: center;
    margin: 50px 0px 79px 2px !important;
}
.progress-bar-inner {
    height: 100%;
    width: 0;
    background-color: #4caf50;
    border-radius: 4px;
}

/* Secondary Navigation Bar */
.secondary-nav {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start;
    gap: 10px;
    margin-bottom: -5px;
}

.secondary-nav-item,
.nav-item-link {
    color: #888;
    text-decoration: none;
    padding: 8px 16px;
    border-radius: 12px;
    font-size: 13px;
    border: 1px solid #292626;
}

.secondary-nav-item.active {
    background-color: #333;
    color: #ff8303;
}

.secondary-nav-item:hover,
.nav-item-link:hover {
    background-color: #ff8303;
    color: #fff;
}

.read-more-btn, .read-less-btn{
    color: #888;
    text-decoration: none;
    padding: 8px 16px;
    border-radius: 12px;
    font-size: 12px;
    border: 1px solid #4b4343;
}


/* popups style */

.add-sec-popup,
.notifcationpopup {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 1000;
  backdrop-filter: blur(5px);
}

.popup-content {
  background-color: #111111;
  border-radius: 10px;
  width: 90%;
  max-width: 600px;
  margin: 90px auto;
  padding: 30px;
  border: 1px solid rgba(255,255,255,0.1);
}

.popup-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
}

.popup-header h2 {
  color: #FF8303;
  font-size: 24px;
  margin: 0;
}

.popup-header .close-btn {
  background: none;
  border: none;
  color: #FFFFFF;
  font-size: 24px;
  cursor: pointer;
}
.close-btn:hover{
    color: #FF9933;
}

.popup-body .form-row {
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px;
}

.popup-body .popup-form-group {
  flex: 1;
  margin-right: 20px;
}

.popup-body .popup-form-group:last-child {
  margin-right: 0;
}

.popup-body label {
  display: inline-flex;
  margin-bottom: 5px;
  color: rgba(255, 255, 255, 0.35);
  font-size: 13px;
}

.popup-body input[type="text"],
.popup-body input[type="url"],
.popup-body input[type="email"],
.popup-body input[type="date"],
.popup-body textarea,
.popup-body select{
  width: 100%;
  padding: 10px;
  background-color: rgba(255, 255, 255, 0.1);
  border: none;
  border-radius: 5px;
  color: #ffffff;
  padding-left: 20px;
  margin-top: 4px;
  font-size: 14px;
}

.popup-body input::placeholder {
  color: #555;
}

.popup-radio-group {
  display: flex;
  align-items: center;
}

.popup-radio-label {
  display: flex;
  align-items: center;
  margin-right: 20px;
  color: #FFFFFF;
}

.popup-radio-label input {
  margin-right: 5px;
}

.popup-radio-label input[type="radio"]:checked {
  accent-color: #FF8303;
}

.popup-radio-label input[type="radio"]:checked::before {
  background-color: #FF8303;
}

.popup-footer {
  display: flex;
  justify-content: center;
  margin-top: 20px;
}

.submit-popup-btn{
  padding: 10px 40px;
  border: none;
  border-radius: 25px;
  font-weight: 600;
  cursor: pointer;
  background-color: #FF8303;
  color: #000000;
  letter-spacing: 0.12em;
  width: 100%;
}

.submit-popup-btn:hover{
  background-color: #FF9933;
  color: #FFFFFF;
  transition: all 0.3s ease;
  box-shadow: 0 0 10px rgba(255, 131, 3, 0.5);
}

/* sweetalert2 style */
.custom-popup {
    background-color: #1E1E1E;
    border-radius: 10px;
    color: #FFFFFF;
}
.custom-title h2 {
    color: #FFFFFF;
    font-size: 24px;
    font-weight: bold;
}
.custom-html-container {
    color: #FFFFFF;
}
.custom-icon {
    border-color: #FF8303;
}
.custom-confirm-button, .custom-cancel-button {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
    margin: 0 10px;
}
.custom-confirm-button {
    background-color: #FF8303;
    color: #000000;
}
.custom-cancel-button {
    background-color: #333333;
    color: #FFFFFF;
}
.custom-confirm-button:hover {
    background-color: #FF9933;
}
.custom-cancel-button:hover {
    background-color: #444444;
}

.alert svg {
    font-size: 20px;
    margin-left: 10px;
    margin: 0px 25px -1px 5px;
}

/* drawer style start here */

.notifications-container {
    position: relative;
    overflow: hidden;
}
.notification-details-drawer {
    position: fixed;
    top: 0;
    right: -430px;
    width: 430px;
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
    padding: 15px 0px 15px 0px;
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
    flex-direction: row;
    justify-content: center;
    align-items: center;
    gap: 15px;
}

.drawer-actions button.mark-btn {
    border-right: 2px solid #0f0f0f;
}
.drawer-actions button.delete,
.drawer-actions button.close-drawer-btn {
    border-left: 2px solid #0f0f0f;
}

.drawer-actions button.mark-btn i, 
.drawer-actions button.close-drawer-btn i, 
.drawer-actions button.delete i {
    font-size: 24px;
    color: #ff8303;
}

.drawer-actions button:hover {
    background-color: #ff8303;
}
.drawer-actions button:hover i{
    color: #fff;
}
.notification-details-drawer {
    overflow-y: auto; /* Allow scrolling in the drawer instead */
}

.notification-list-message{
    display: none;
}

.notification-details-drawer span.text-danger {
    font-size: 14px;
}

.search-filter-wrapper {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    margin: 20px 0px 20px 0px;    
}

.search-input {
    position: relative;
    margin-right: 10px;
}

.search-input input {
    padding: 12px 30px 12px 52px;
    border: none;
    font-size: 14px;
    border-radius: 55px !important;
    background-color: rgba(255, 255, 255, 0.12);
    color: #fff;
    width: 26rem;
}

.search-input svg {
    position: absolute;
    left: 17px;
    top: 50%;
    transform: translateY(-50%);
    color: #999;
}

.filter-select select {
    padding: 12px 30px 12px 15px;
    border: none;
    font-size: 14px;
    border-radius: 55px !important;
    background-color: rgba(255, 255, 255, 0.12);
    min-width: 10rem;
}

/* Media query for smaller screens */
@media (max-width: 768px) {
    .secondary-nav {
        gap: 0px;
        margin-bottom: -13px;
    }
    .secondary-nav-item,
    .nav-item-link {
        margin-bottom: 8px;
    }
    #dashboard-footer {
        position: static !important;
        width: 100%;
    }
    .mt-30{
        margin-top:30px;
    }
    .metric-card {
        padding: 15px 20px;
        margin: 7px 7px 7px 0px;
    },
    .nav-item-link {
        margin-right: 9px;
        margin-bottom: 9px !important;
    }
    .main-container{
        margin-top: 6px !important;
    }
    #dashboard-footer {
        margin: 0px 0px 0px 0px !important;
    }
}


</style>

<script>
// Declare the variable globally
let currentDeleteRequest;

</script>

<script src="<?= base_url('assets/src/js/notification/dashboard/index.js') ?>"></script>
<script src="<?= base_url('assets/src/js/notification/dashboard/search.js') ?>"></script>
<script src="<?= base_url('assets/src/js/notification/dashboard/alert.js') ?>"></script>
<script src="<?= base_url('assets/src/js/notification/dashboard/event-listeners.js') ?>"></script>
<script src="<?= base_url('assets/src/js/notification/dashboard/form.js') ?>"></script>


<div class="main-container">

    <div class="row mt-30">
        <!-- Column 1 -->
        <div class="col-md-3 col-sm-12 mb-30">
            <div class="card-box height-100-p metric-card">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="weight-700 font-14 mb-0">Notification</h2>
                    <div class="large-number"><?= $total_notification ?></div>
                </div>
            </div>
        </div>
          <!-- Column 4 -->
        <div class="col-md-3 col-sm-12 mb-30">
            <div class="card-box height-100-p metric-card">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="weight-700 font-14 mb-0">Add Notification</h2>
                    <a href="#"><div class="add-btn add-notificaton-btn">+</div></a>
                </div>
            </div>
        </div>
        
    </div>

    <div class="separator"></div>

    <?php if(isset($_SESSION['success-msg'])): ?>
    <div class="alert alert-success mt-4" style="width: 28% !important;">
        <i class="fas fa-check-circle"></i>
        <?php 
        echo $_SESSION['success-msg'];
        unset($_SESSION['success-msg']);
        ?>
    </div>
    <?php endif; ?>

    <?php if(isset($_SESSION['error-msg'])): ?>
    <div class="alert alert-danger mt-4" style="width: 50% !important;">
        <i class="fas fa-exclamation-circle"></i>
        <?php
        echo $_SESSION['error-msg'];
        unset($_SESSION['error-msg']);
        ?>
    </div>
    <?php endif; ?>

    <nav class="secondary-nav mt-3">
        <a href="#" class="secondary-nav-item active" data-sec-navid="1">Dashboard</a>
        <a href="<?php echo base_url("notification"); ?>" class="nav-item-link last-item" data-sec-navid="3">View Page </a>
    </nav>

    <div class="separator"></div>

    <div class="search-container">
        <div class="search-filter-wrapper">
            <div class="search-input">
                <i class="fas fa-search"></i>
                <input type="text" id="search" placeholder="Search..." onkeyup="search_filter()">
            </div>
            <div class="filter-select" onchange="search_filter()">
                <select id="filter_by">
                    <option value="">Filter by</option>
                    <option value="welcome">Welcomes</option>
                    <option value="news">News</option>
                    <option value="published">Published</option>
                    <option value="preview">Preview</option>
                </select>
            </div>
        </div>
    </div>

    <div class="notification-table-container">

        <div id="notification-table-container-placeholder">
                <div class="notification-table-animated-background">
                    <div class="background-masker"></div>
                </div>
        </div>

        <div class="notification-table-content">
          
        </div>

    </div>

</div>


<div class="notifications-container">
    <div class="notification-details-drawer">
        <div class="drawer-header">
            <h3>Notification details</h3>
            <button class="close-drawer">&times;</button>
        </div>
        <div class="drawer-content">
            <form id="NotifcationForm" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="request-type" id="request-type" value="add">
            <input type="hidden" name="notification-id" id="notification-id" value="">

            <div class="popup-body">
            <div class="form-row">
                <div class="popup-form-group">
                    <label for="title">Title *</label>
                    <input type="text" name="title" id="title" required placeholder="e.g. Upcoming Maintenance">
                </div>
            </div>
            <div class="form-row">
            <div class="popup-form-group">
            <label for="content">Content *</label>
            <textarea type="text" name="content" id="content" rows="8" required placeholder="e.g. Our platform will be undergoing schedul."></textarea>
            </div>
            </div>
            <div class="form-row">
            <div class="popup-form-group">
            <label for="types">Types *</label>
                <select name="types" id="types" required>
                <option value="">Select type</option>
                <option value="welcome">Welcome</option>
                <option value="news">News</option>
                <option value="security">Security</option>
                </select>
            </div>
            </div>
            <div class="form-row">
                    <div class="popup-form-group">
                    <label for="imgUrl">imgUrl</label>
                    <input type="text" name="imgUrl" id="imgUrl" placeholder="https://">
                </div>
            </div>

            <div class="form-row drawer-additional-fields" style="display:none;">
                    <div class="popup-form-group">
                    <label for="CreatedAt">CreatedAt</label>
                    <input type="text" name="createdAt" id="createdAt" readonly>
                </div>
            </div>

            <div class="form-row drawer-additional-fields" style="display:none;">
                    <div class="popup-form-group">
                    <label for="UpdatedAt">UpdatedAt</label>
                    <input type="text" name="updatedAt" id="updatedAt" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="popup-form-group">
                    <label for="status">Status *</label>
                    <select name="status" id="status" required>
                        <option value="">Select status</option>
                        <option value="published">Publish</option>
                        <option value="preview">Preview</option>
                    </select>
                </div>
            </div>
            </div>


        </div>
        <div class="drawer-actions drawer-actions-add">
            <button class="mark-btn drawer-actions-submit-btn"><i class="ri-add-line"></i> SUBMIT</button>
            <button class="close-drawer-btn"><i class="ri-close-line"></i> CANCEL</button>
        </div>
        <div class="drawer-actions drawer-actions-update" style='display:none;'>
            <button class="mark-btn drawer-actions-update-btn"><i class="ri-edit-line"></i> UPDATE</button>
            <button class="delete drawer-delete-btn"><i class="ri-delete-bin-line"></i> DELETE</button>
        </div>

        </form>

    </div>
</div>
