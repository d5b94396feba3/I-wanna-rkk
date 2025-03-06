<style>
#main-footer {
    margin: 0px 55px 0px 111px !important;
}
.separator {
    width: 100%;
    height: 1px;
    background-color: #333333ab;
    margin: 0px 0px 25px 0px;
}

#notification-content-placeholder {
    background: linear-gradient(to right, rgba(40, 40, 40, 0) 47.82%, rgba(17, 17, 17, 0) 100%);
    background-size: 100% 100%, 100% 100%, contain;
    background-position: right center;
    border-radius: 15px;
    color: #FFFFFFCC;
    margin: 0px 0px 0px 0px;
    padding: 0;
    transition: background .3s ease, transform .3s ease;
    border: none !important;
    position: relative;
    overflow: hidden;
}

.background-masker {
    background-color: #fff;
    position: absolute;
}

@keyframes placeHolderShimmer {

    0% {
        background-position: 0 0;
    }
    100% {
        background-position: 2000px 0;
    }
}

.account-animated-background {
    animation-duration: 2.6s;
    animation-fill-mode: forwards;
    animation-iteration-count: infinite;
    animation-name: placeHolderShimmer;
    animation-timing-function: linear;
    background: linear-gradient(to right, #141414 0%, rgb(17 17 17 / 95%) 100%);
    background-size: 200% 100%;
    height: 750px !important;
    border-radius: 1px;
    position: relative;
}

.main-container {
    padding-top:0px !important;
    padding-right:44px !important;
}

.main-container p {
    line-height: 1.6rem;
    color: #888;
    font-size: 13px;
}

/* faq styling start here... */
.notification-container {
    margin-top: 20px;
}

.notification-list-item,
.notification-list-item-noresult{
    background-color: rgba(255,255,255,0.08);
    border-radius: 10px;
    margin-bottom: 20px;
    overflow: hidden;
    height: 150px;
    border: 1px solid rgba(255,255,255,0.08);
}
.notification-list-title {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 20px 20px 20px;
    cursor: pointer;
    font-weight:500;
    font-family: 'Poppins', sans-serif;
}

.notification-list-title span {
    color: rgba(255, 255, 255, 0.6);
    font-size: 18px;
    font-weight: 600;
}

.notification-list-title svg {
    color: #6f6d6d;
    transition: transform 0.3s ease;
}

.notification-list-title svg.rotate360 {
    transform: rotate(180deg);
}

.notification-list-content {
    padding: 0px 80px 20px 22px;
    margin-top: -10px;
    color: rgba(255, 255, 255, 0.2);
}
.notification-list-content p {
    margin: 0;
    font-size: 14px;
    font-family: 'Poppins', sans-serif;
}

.show-more-content{
    display: none;
}

.notification-list-item.active {
    background-color: rgba(255,255,255,0.16);
    border: 1px solid #565454;
}

.notification-list-item.active span{
    color: rgba(255, 255, 255, 0.9) !important;
}

.notification-list-item:hover{
    background-color: rgba(255,255,255,0.16);
    border: 1px solid #565454;
}
.notification-list-item:hover .notification-list-title span{
    color: #ff8303;
}
.notification-list-item:hover .notification-list-content p,
.notification-list-item.active .notification-list-content p{
    color: rgba(255, 255, 255, 0.7);
}
.notification-list-item:hover .read-more-btn,
.notification-list-item:hover .read-less-btn,
.notification-list-item.active .read-more-btn,
.notification-list-item.active .read-less-btn {
    color: #cfc2c2;
    border: 1px solid #7d7a7a;
}

.notifications-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    padding: 10px 0;
    margin-top: 40px;
}
.notifications-title-wrapper {
    display: flex;
    align-items: center;
}
.header-checkbox {
    margin-right: 15px;
    margin-bottom: -16px;
}
.header-checkbox input[type="checkbox"] {
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
.header-checkbox input[type="checkbox"]:checked {
    background-color: orange;
    border-color: orange;
}
.header-checkbox input[type="checkbox"]:checked::before {
    content: '\2714';
    font-size: 14px;
    color: white;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.notifications-title {
    font-size: 24px;
    font-weight: bold;
}
.show-unread-toggle {
    display: flex;
    align-items: center;
}
.show-unread-toggle span {
    margin-right: 10px;
    font-size: 14px;
    color: #666;
}
.toggle-switch {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 24px;
}
.toggle-switch input {
    opacity: 0;
    width: 0;
    height: 0;
}
.toggle-slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    transition: .4s;
    border-radius: 34px;
}
.toggle-slider:before {
    position: absolute;
    content: "";
    height: 20px;
    width: 20px;
    left: 2px;
    bottom: 2px;
    background-color: white;
    transition: .4s;
    border-radius: 50%;
}
input:checked + .toggle-slider {
    background-color: #2196F3;
}
input:checked + .toggle-slider:before {
    transform: translateX(26px);
}
.alert svg {
    font-size: 20px;
    margin-left: 10px;
    margin: 0px 25px -1px 5px;
}

/* sweetalert2 style */
.custom-popup {
    background-color: #1E1E1E;
    border-radius: 10px;
    color: #FFFFFF;
}
.custom-title h2{
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

/* Media query for smaller screens */
@media (max-width: 768px) {
    #main-footer {
        position: static !important;
        width: 100%;
    }
    .secondary-nav.sticky {
        top: 74px;
        position: static !important;
    }
    .main-container{
        margin-top: -20px !important;
        padding: 0px 30px 0px 42px !important;
    }
    #main-footer {
        margin: 0px 0px 0px 0px !important;
    }
}

</style>

<script src="<?= base_url('assets/src/js/notification/public/index.js') ?>"></script>
<script src="<?= base_url('assets/src/js/notification/public/filter.js') ?>"></script>
<script src="<?= base_url('assets/src/js/notification/public/alert.js') ?>"></script>
<script src="<?= base_url('assets/src/js/notification/public/event-listeners.js') ?>"></script>
<script src="<?= base_url('assets/src/js/notification/public/form.js') ?>"></script>

<div class="main-container">

<div class="notifications-header">
<div class="notifications-title-wrapper">
        <div class="header-checkbox">
            <input type="checkbox" id="select-all-notifications">
        </div>
    </div>
    <div class="show-unread-toggle">
        <span>Show only unread</span>
        <label class="toggle-switch">
            <input type="checkbox" id="show-unread-toggle">
            <span class="toggle-slider"></span>
        </label>
    </div>
</div>   
    <div id="notification-content-placeholder">
        <div class="account-animated-background">
            <div class="background-masker"></div>
        </div>
    </div>

    <div class="notification-container">
        <!-- dynamic container -->
    </div>
  
</div>
