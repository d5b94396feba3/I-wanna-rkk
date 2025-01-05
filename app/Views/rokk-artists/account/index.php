<style>
#dashboard-footer {
    margin: 0px 55px 0px 111px !important;
}

#account-content-placeholder {
    background: linear-gradient(to right, rgba(40, 40, 40, 0) 47.82%, rgba(17, 17, 17, 0) 100%);
    background-size: 100% 100%, 100% 100%, contain;
    background-position: right center;
    border-radius: 15px;
    color: #FFFFFFCC;
    margin: -47px 0 0 -60px;
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
        background-position: -800px 0;
    }
    100% {
        background-position: 800px 0;
    }
}

.account-animated-background {
    animation-duration: 2s;
    animation-fill-mode: forwards;
    animation-iteration-count: infinite;
    animation-name: placeHolderShimmer;
    animation-timing-function: linear;
    background: linear-gradient(to right, #111 47.82%, rgba(17, 17, 17, 0) 100%);
    background-size: 100% 100%, 100% 100%, contain;
    background-position: right center;
    height: 625px !important;
    border-radius: 1px;
    position: relative;
}

.account-container {
    overflow-y: hidden;
    background: rgba(30, 30, 30, 0.5);
    margin-top: 15px;
    padding: 33px 0px 0px 35px;
    height: 100% !important;
    overflow-x: hidden;
    border-radius: 10px;
}

.main-container {
    padding: 10px 60px 30px 126px !important;
}

.main-container p {
    line-height: 1.6rem;
    color: #888;
    font-size: 13px;
}

.account-topnav {
    padding: 0px 0;
    margin-bottom: 10px;
    margin-top: 30px;
    overflow-x: auto;
    margin-left: -12px;
}

.account-nav {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    list-style-type: none;
    padding: 0;
    margin: 0;
    flex-wrap: nowrap;
    min-width: max-content;
}

.account-nav-item {
    margin-right: 10px;
    border: 1px solid #292626;
    border-radius: 65px;
    flex-shrink: 0;
}

.account-nav-link {
    display: inline-block;
    padding: 8px 16px;
    border-radius: 20px;
    color: #888;
    text-decoration: none;
    font-size: 13px;
    transition: background-color 0.3s, color 0.3s;
    white-space: nowrap;
}

.account-nav-link:hover,
.account-nav-link.active {
    background-color: #333;
    color: #fff;
}

.account-nav-link.active {
    background-color: #333;
    color: #ff8303;
}

.account-selected-menu-container{
    padding: 0px 35px 0px 0px;
}

.artist-uform {
    padding-bottom: 35px;
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

h2.acccount-header-title {
    font-family: 'Poppins', sans-serif !important;
}

label.label-block.acccount-header-title {
    font-size: 16px;
    font-weight: 700;
    width: 100%;
    color: rgba(255,255,255,0.7);
    margin: 0px 0px 25px 0px;
    padding: 0px 0px 20px 0px;
}


/* custom alert */

.custom-alert svg,
.custom-error-alert svg{
    font-size: 24px;
    margin: 0px 15px 0px 15px;
}

.custom-alert {
    position: fixed;
    top: 160px;
    right: 550px;
    z-index: 9999;
    padding: 15px 20px;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    display: flex;
    width: 435px !important;
    justify-content: left !important;
}

.custom-error-alert {
    position: fixed;
    top: 160px;
    right: 514px;
    z-index: 9999;
    padding: 15px 20px;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    display: flex;
    width: 556px !important;
    justify-content: left !important;
}

@media (max-width: 768px) {

    .main-container {
        padding: 4px 39px 30px 44px !important;
    }
    .account-topnav {
        margin-top: 0px;
    }
    .account-nav-link {
        padding: 6px 12px;
        font-size: 15px;
    }
    #updatePersonDetail input, select {
        width: 368px !important;
    }
    #dashboard-footer {
        margin: 0px 0px 0px 0px !important;
    }
}

</style>

<script>
// Initialize configuration for file-upload.js
window.config = {
    defaultImageUrl: '<?= base_url('assets/images/image-cover.png') ?>'
};
</script>
<script src="<?= base_url('assets/src/js/account/index.js') ?>"></script>
<script src="<?= base_url('assets/src/js/account/alert.js') ?>"></script>
<!-- <script src="<?= base_url('assets/src/js/account/file-upload.js') ?>"></script> -->
<script src="<?= base_url('assets/src/js/account/password.js') ?>"></script>
<script src="<?= base_url('assets/src/js/account/form.js') ?>"></script>

<div class="main-container">

    <div class="account-topnav">
        <nav>
            <ul class="account-nav">
                <li class="account-nav-item"><a href="#" class="account-nav-link active" data-navid="1">Administrator</a></li>
                <li class="account-nav-item"><a href="#" class="account-nav-link" data-navid="2">Connected Accounts</a></li>
                <li class="account-nav-item"><a href="#" class="account-nav-link" data-navid="3">Account Password</a></li>
                <li class="account-nav-item"><a href="#" class="account-nav-link" data-navid="4">Delete Account</a></li>
            </ul>
        </nav>
    </div>

    <?php if (isset($_SESSION["success-msg"])) { ?>
        <div class="custom-alert alert alert-success mt-4">
        <i class="fas fa-check-circle"></i>
            <?php
            echo $_SESSION["success-msg"];
            unset($_SESSION["success-msg"]);
            ?>
        </div>
    <?php } ?>
    <?php if (isset($_SESSION["error-msg"])) { ?>
        <div class="custom-error-alert alert alert-danger mt-4">
        <i class="fas fa-exclamation-circle"></i>
            <?php
            echo $_SESSION["error-msg"];
            unset($_SESSION["error-msg"]);
            ?>
        </div>
    <?php } ?>
   <div class="row">
         <div class="col-md-12 col-lg-12 col-sm-12 account-container">
               <div id="account-content-placeholder">
                  <div class="account-animated-background">
                     <div class="background-masker"></div>
                  </div>
               </div>
               <div class="account-selected-menu-container secid-1">
               <!-- secid-1 -->
               </div>
               <div class="account-selected-menu-container secid-2">
               <!-- secid-2 -->
               </div>
               <div class="account-selected-menu-container secid-3">
               <!-- secid-3 -->
               </div>
               <div class="account-selected-menu-container secid-4">
               <!-- secid-4 -->
               </div>
         </div>
   </div>
</div>
