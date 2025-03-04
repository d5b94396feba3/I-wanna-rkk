<style type="text/css">

#main-footer {
    margin: 0px 55px 0px 111px !important;
}

.separator {
    width: 100%;
    height: 1px;
    background-color: #333333ab;
    margin: 30px 0px 30px 0px;
}

.address-container {
    display: flex;
    justify-content: space-between;
    background-color: rgba(255, 255, 255, 0.09);
    border-radius: 10px;
    padding: 5px;
    margin: 0px 0px 30px 0px;
}

.address-box {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 25px 20px;
    border-radius: 25px;
    flex-grow: 1;
}

.address-box.active {
    background-color: #2A2A2A;
    justify-content: flex-start; 
}

.box-number {
    width: 26px;
    height: 26px;
    border-radius: 50%;
    /* background-color: #333; */
    color: rgba(255, 255, 255, 0.60);
    display: flex;
    justify-content: center;
    align-items: center;
    margin-right: 10px;
    font-weight: 500;
    font-size: 14px;
    flex-shrink: 0; 
}

.box-number.active {
    background-color: #FF8303;
    color: #fff;
}

.box-number svg{
    color: #fff;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    flex-shrink: 0; 
}

.address-text {
    color: rgba(255, 255, 255, 0.90);
    font-size: 16px;
    font-weight: 500;
}

.address-text.active {
    color: #fff;
}

.account-container, .contact-container, .track-container, .review-container {
    margin: 48px 43px 0px 30px;
}

.contact-header {
    background-color: rgba(255,255,255,0.08);
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 26px;
    margin-top: -4px;
}

.contact-header h2 {
    margin: 0 0 10px 0;
    font-size: 17px;
    text-transform: uppercase;
    letter-spacing: 0.08em;
}

.contact-header p {
    margin: 0;
    color: #FF8303;
    font-size: 13px;
}

.contact-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

.contact-form-group {
    flex: 1;
    margin-right: 20px;
} 

.contact-form-group:last-child {
    margin-right: 0;
}

label {
    display: block;
    margin-bottom: 5px;
    color: rgba(255,255,255,0.35);
    font-size: 14px;
}

input, select {
    width: 100%;
    padding: 16px;
    background-color: rgba(255,255,255,0.12);
    border: none;
    border-radius: 55px !important;
    color: #ffffff;
    padding-left: 20px;
    margin-top: 4px;
}

textarea {
    width: 100%;
    padding: 10px;
    background-color: rgba(255,255,255,0.12);
    border: none;
    border-radius: 25px !important;
    color: #ffffff;
    padding-left: 20px;
    margin-top: 4px;
}

input::placeholder{
    color: #555;
}
textarea::placeholder {
    color: #555;
    padding-top:5px;
}


select {
    appearance: none;
    background-image: url('data:image/svg+xml;utf8,<svg fill="%23ffffff" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>');
    background-repeat: no-repeat;
    background-position: right 10px center;
}

.contact-btn {
    padding: 14px 80px;
    border: none;
    border-radius: 25px;
    font-weight: bold;
    cursor: pointer;
    background-color: #ff8303;
    color: #000;
    border: 2px solid #333;
    letter-spacing: 0.12em;
    margin-top: 14px;
    float: right;
}


/* placeholder style */
#contact-placeholder {
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
}.contact-animated-background {
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

.btn-space {
    margin-bottom: 28px;
    margin-top: 0px;
}

.address-text p {
    margin: 0;
    padding: 0;
    line-height: 1.7; 
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
.main-container {
    padding: 4px 0px 30px 75px !important;
    margin-bottom: 60px !important;
}
/* Media query for smaller screens */

@media screen and (max-width: 768px) {
    .address-container {
        display: block;
    }
    .contact-btn {
        float: left;
    }
    .contact-row {
        display: block;
        justify-content: space-between;
        margin-bottom: 20px;
        margin-top: 0px;
    }
    label {
        display: block;
        margin-bottom: 5px;
        color: rgba(255,255,255,0.35);
        font-size: 14px;
        margin-top: 10px;
    }
    .address-box {
        display: inline;
        padding: 10px 20px;

    }
    .main-container{
        margin-top: 6px !important;
        padding: 0px 0px 0px 0px !important;
    }
    .address-container {
        padding: 0px 0px 0px 20px !important;
    }
    .box-number svg {
        margin-bottom: 10px;
    }
    .contact-form-group {
        margin-right: 0px !important;
    }
    #main-footer {
        margin: 0px 0px 0px 0px !important;
    }
    .contact-btn {
        padding: 7px 40px;
    }
}

</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="<?= base_url('assets/src/js/contact/index.js') ?>"></script>
<script src="<?= base_url('assets/src/js/contact/alert.js') ?>"></script>

<script type="text/javascript">
    var hiddenArtistId = '';
    var artistName = "<?= session()->get('fullname') ?>";
</script>


<div class="main-container">


    <div class="contact-container" data-step="0">
        <div class="contact-header">
            <h2>Have a question? We're here to help.</h2>
            <p>Please fill out the form below and we'll get back to you as soon as possible.</p>
        </div>

    <div class="address-container">
        
        <div class="address-box">
            <div class="box-number" data-step="0">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M2.25 2.25H15.75C16.1642 2.25 16.5 2.58579 16.5 3V15C16.5 15.4142 16.1642 15.75 15.75 15.75H2.25C1.83579 15.75 1.5 15.4142 1.5 15V3C1.5 2.58579 1.83579 2.25 2.25 2.25ZM15 5.42844L9.05385 10.7535L3 5.41195V14.25H15V5.42844ZM3.38359 3.75L9.04642 8.7465L14.6257 3.75H3.38359Z" fill="#FF8303"/>
            </svg>
            </div>
            <div class="address-text">artist@rokk.app</div>
        </div>
        <!-- <div class="address-box">
            <div class="box-number" data-step="1">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.02417 8.01158C7.7265 9.2466 8.7534 10.2735 9.98842 10.9758L10.6518 10.0471C10.8724 9.73838 11.2887 9.64297 11.6217 9.82485C12.6768 10.4012 13.8428 10.7515 15.0592 10.8478C15.4492 10.8787 15.75 11.2042 15.75 11.5954V14.9426C15.75 15.3271 15.4591 15.6493 15.0766 15.6886C14.6792 15.7295 14.2783 15.75 13.875 15.75C7.45469 15.75 2.25 10.5453 2.25 4.125C2.25 3.7217 2.27057 3.32078 2.31142 2.92332C2.35073 2.54081 2.67296 2.25 3.05749 2.25H6.40456C6.79583 2.25 7.12135 2.55078 7.15222 2.94082C7.2485 4.15716 7.59877 5.32323 8.17515 6.37833C8.35703 6.7113 8.26162 7.12766 7.95292 7.34818L7.02417 8.01158ZM5.13319 7.5189L6.55815 6.50107C6.1541 5.62885 5.87721 4.70387 5.73545 3.75H3.7568C3.75227 3.87474 3.75 3.99975 3.75 4.125C3.75 9.71685 8.28315 14.25 13.875 14.25C14.0002 14.25 14.1253 14.2478 14.25 14.2432V12.2645C13.2962 12.1228 12.3712 11.8459 11.4989 11.4419L10.4811 12.8668C10.0694 12.7069 9.6717 12.5186 9.29055 12.3046L9.24697 12.2797C7.77728 11.444 6.55601 10.2227 5.72025 8.75303L5.69545 8.70945C5.48137 8.3283 5.29316 7.93065 5.13319 7.5189Z" fill="#FF8303"/>
                </svg>
            </div>
            <div class="address-text">+49 445 454 5454</div>
        </div> -->
        <div class="address-box">
            <div class="box-number" data-step="2">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 17.7959L4.22703 13.023C1.59099 10.3869 1.59099 6.11307 4.22703 3.47703C6.86307 0.84099 11.1369 0.84099 13.773 3.47703C16.409 6.11307 16.409 10.3869 13.773 13.023L9 17.7959ZM12.7123 11.9623C14.7625 9.91208 14.7625 6.58794 12.7123 4.53769C10.6621 2.48744 7.33794 2.48744 5.28769 4.53769C3.23744 6.58794 3.23744 9.91208 5.28769 11.9623L9 15.6746L12.7123 11.9623ZM9 9.75C8.17155 9.75 7.5 9.07845 7.5 8.25C7.5 7.42157 8.17155 6.75 9 6.75C9.82845 6.75 10.5 7.42157 10.5 8.25C10.5 9.07845 9.82845 9.75 9 9.75Z" fill="#FF8303"/>
                </svg>
            </div>
            <div class="address-text">
                <!-- <p>FAIRMUSIC AG</p>
                <p>In der Dumpf 12</p>
                <p>66130 Saarbrücken</p>
                <p>Germany</p> -->
                <p>FAIRMUSIC AG,
                In der Dumpf 12,
               66130 Saarbrücken,
                Germany</p>
            </div>
        </div>
      
    </div>

    <?php if (isset($_SESSION["success-msg"])) { ?>
   <div class="alert alert-success mt-4" style="width:60% !important; margin-bottom: 28px !important;">
      <?php
      echo $_SESSION["success-msg"];
      unset($_SESSION["success-msg"]);
      ?>
      <span class="alert-close-icon" style="cursor: pointer;">&times;</span>
   </div>
   <?php } ?>
   <?php if (isset($_SESSION["error-msg"])) { ?>
   <div class="alert alert-danger">
      <?php
      echo $_SESSION["error-msg"];
      unset($_SESSION["error-msg"]);
      ?>
      <span class="alert-close-icon" style="cursor: pointer;">&times;</span>
   </div>
   <?php } ?>



    <div id="contact-placeholder">
        <div class="contact-animated-background">
            <div class="background-masker"></div>
        </div>
    </div>

    <div class="contact-form">
      
    <form action="<?= base_url('send_artist_contact_us_form') ?>" id="ContactForm" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
    
        <div class="contact-row">
          
            <div class="contact-form-group">
                <label for="Full Name">Full Name *</label>
                <input type="text" name="full_name" id="full_name" value="<?= isset($person_data) && isset($person_data->first_name) ? $person_data->first_name . ' ' . $person_data->last_name : (isset($person_data) && isset($person_data->role) ? $person_data->role : '') ?>" placeholder="John Doe" required>
            </div>
            <div class="contact-form-group">
                <label for="email">Email *</label>
                <input type="email" name="email" id="email" value="<?= isset($person_data->email) ? $person_data->email : ''; ?>" placeholder="gmail.com" required>
            </div>
        </div>
        
        <div class="contact-row">
        <div class="contact-form-group">
                <label for="Subject">Subject  * </label>
                <input type="text" name="subject" id="subject" value="" placeholder="Your subject" required>
            </div>
        </div>

        <div class="contact-row">
            <div class="contact-form-group">
                <label for="Message">Message *</label>
                <textarea name="message" id="message" placeholder="Your message" rows="5" required></textarea>
            </div>
            
        </div>
        <div class="separator"></div>
        <button type="submit" class="contact-btn btn-space">SEND</button>
        </form>
    
    </div>
</div>

</div>
