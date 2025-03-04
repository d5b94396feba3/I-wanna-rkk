<style type="text/css">

#main-footer {
    margin: 0px 55px 0px 111px;
}

.separator {
    width: 100%;
    height: 1px;
    background-color: #333333ab;
    margin: 0px 0px 25px 0px;
}

.account-setting-progress-bar {
    display: flex;
    justify-content: space-between;
    background-color: rgba(255, 255, 255, 0.09);
    border-radius: 30px;
    padding: 5px;
    margin: 43px 43px 30px 30px;
}

.progress-step {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    padding: 10px 20px;
    border-radius: 25px;
    flex-grow: 1;
}

.progress-step.active {
    background-color: #2A2A2A;
    justify-content: flex-start; 
}

.step-number {
    width: 26px;
    height: 26px;
    border-radius: 50%;
    background-color: #333;
    color: rgba(255, 255, 255, 0.60);
    display: flex;
    justify-content: center;
    align-items: center;
    margin-right: 10px;
    font-weight: 500;
    font-size: 14px;
    flex-shrink: 0; 
}

.step-number.active {
    background-color: #FF8303;
    color: #fff;
}

.step-number svg{
    background-color: #FF8303;
    color: #fff;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    flex-shrink: 0; 
}

.step-text {
    color: rgba(255, 255, 255, 0.60);
    font-size: 16px;
    font-weight: 500;
}

.step-text.active {
    color: #fff;
}

.account-container, .account-setting-container{
    margin: 0px 43px 30px 30px;
}

.step-container {
    background-color: rgba(255,255,255,0.08);
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 26px;
    margin-top: -4px;
}

.step-container h2 {
    margin: 0 0 10px 0;
    font-size: 17px;
    text-transform: uppercase;
    letter-spacing: 0.08em;
}

.step-container p {
    margin: 0;
    color: #FF8303;
    font-size: 13px;
}

.upload-form-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

.upload-popup-form-group {
    flex: 1;
    margin-right: 20px;
} 

.upload-popup-form-group:last-child {
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
    padding: 10px;
    background-color: rgba(255,255,255,0.12);
    border: none;
    border-radius: 55px !important;
    color: #ffffff;
    padding-left: 20px;
    margin-top: 4px;
}

input::placeholder {
    color: #555;
}

select {
    appearance: none;
    background-image: url('data:image/svg+xml;utf8,<svg fill="%23ffffff" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>');
    background-repeat: no-repeat;
    background-position: right 10px center;
}

.btn-cancel{
    padding: 10px 40px;
    border: none;
    border-radius: 25px;
    font-weight: 500;
    cursor: pointer;
    background-color: transparent;
    color: rgba(255,255,255,0.7);
    border: 2px solid #333;
    letter-spacing: 0.12em;
}
.btn-next{
    padding: 10px 60px;
    border: none;
    border-radius: 25px;
    font-weight: 600;
    cursor: pointer;
    background-color: transparent;
    color: rgba(255,255,255,0.7);
    letter-spacing: 0.12em;
    float:right;
    border:2px solid #333;

}
.img-update,
.update-person-btn,
.update-artist-btn,
.media-update-btn{
    padding: 8px 25px;
    border: none;
    border-radius: 25px;
    font-weight: 500;
    cursor: pointer;
    background-color: #ff8303;
    color: #000;
    border: 2px solid #333;
    letter-spacing: 0.12em;
    margin-top: 14px;
    font-size: 12px;
}

.btn-next:hover{
    background-color: #FF9933;
    color: #FFFFFF;
    transition: all 0.3s ease;
    box-shadow: 0 0 10px rgba(255, 131, 3, 0.5);
}

.btn-cancel:hover, 
.img-update:hover, 
.update-person-btn:hover,
.update-artist-btn:hover,
.media-update-btn:hover{
    background-color: #333;
    color: #ffffff;
    transition: all 0.3s ease;
    box-shadow: 0 0 10px rgba(51, 51, 51, 0.5);
}

.form-actions {
    border-top: 1px solid #333333ab;
    padding-top: 25px;
    margin-top:0px;
}

.cover-upload-container {
  margin: 20px 0;
  padding: 20px;
  border: 2px solid transparent;
  border-radius: 10px;
  background-image: 
    repeating-linear-gradient(to right, #444 0, #444 10px, transparent 10px, transparent 20px),
    repeating-linear-gradient(to bottom, #444 0, #444 10px, transparent 10px, transparent 20px),
    repeating-linear-gradient(to left, #444 0, #444 10px, transparent 10px, transparent 20px),
    repeating-linear-gradient(to top, #444 0, #444 10px, transparent 10px, transparent 20px);
  background-position: top, right, bottom, left;
  background-repeat: repeat-x, repeat-y;
  background-size: 20px 2px, 2px 20px;
  background-clip: padding-box;
}
.cover-upload-box {
  display: flex;
  align-items: center;
}

.image-placeholder {
  width: 100px;
  height: 100px;
  background-color: #333;
  border-radius: 10px;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-right: 20px;
}

.image-placeholder img {
    width: 94px;
    height: 94px;
}

.upload-content {
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.img-upload-btn {
  background-color: transparent;
  color: #fff;
  border: 1px solid #FF8303;
  border-radius: 20px;
  padding: 8px 20px;
  font-size: 14px;
  font-weight: 500;
  cursor: pointer;
  transition: all 0.3s ease;
  margin-bottom: 10px;
  width: 225px;
}

.img-upload-btn:hover {
  background-color: #FF8303;
  color: #000;
}

.upload-instructions {
    color: rgba(255,255,255,0.3);
    font-size: 13px;
    line-height: 1.5;
    margin: 0;
    text-align: left;
}

.account-setting-container {
    margin: 0px 43px 30px 30px;
    color: #fff;
}

.input-with-icon {
    position: relative;
}

.input-with-icon input {
    padding-right: 30px;
}

.input-with-icon span {
    position: absolute;
    right: 16px;
    top: 50%;
    transform: translateY(-50%);
}

.check-icon {
    color: #FF8303;
}

.section-title {
    text-transform: uppercase;
    font-size: 18px;
    margin-bottom: 20px;
}

.orange {
    color: #FF8303;
}

.rotate180 {
    transform: rotate(180deg);
    transition: transform 0.3s ease;
}
.action-buttons {
    display: flex;
    justify-content: space-between;
    margin-top: 30px;
}

.btn-back{
    padding: 10px 20px;
    border-radius: 25px;
    font-weight: bold;
    cursor: pointer;
    text-transform: uppercase;
}

.btn-back {
    background-color: transparent;
    color: #FFFFFF;
    border: 2px solid #3A3A3A;
}

.highlight {
    border-color: #FF8303;
    background-color: rgba(255, 131, 3, 0.1);
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
svg.back-arrow {
    margin-left: -20px;
    margin-right: 6px;
}

svg.right-arrow {
    margin-left: 8px;
    margin-right: -28px;
    transform: rotate(180deg);
}

.form-btn-next:hover .back-arrow {
    transform: translateX(-3px);
    transition: transform 0.3s ease;
}


/* placeholder style */
#artist-info-placeholder {
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
        background-position: 0 0;
    }
    100% {
        background-position: 2000px 0;
    }
}
.artist-info-animated-background {
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

.btn-space {
    margin-bottom: 28px;
    margin-top: 0px;
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
    right: 514px;
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
    right: 442px;
    z-index: 9999;
    padding: 15px 20px;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    display: flex;
    width: 556px !important;
    justify-content: left !important;
}

.main-container {
    padding: 4px 0px 30px 75px !important;
    margin-bottom: 60px !important;
}

.genries-select-container {
    position: relative;
    background-color: rgba(255, 255, 255, 0.12);
    border-radius: 16px;
    padding: 6px 16px 8px 16px;
    margin-top: 9px;
}

#genreSearch:focus,
#genreSearch:active {
    outline: none;
    border: none;
    box-shadow: none;
}
.selected-genries {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.genre-tag {
    background-color: rgba(255,131,3,0.2);
    color: #FF8303;
    padding: 4px 12px;
    border-radius: 20px;
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    margin-top: 4px;
    margin-bottom: 1px;
}

.genre-tag .remove-tag {
    cursor: pointer;
    color: #FF8303;
    font-weight: bold;
}

#genreSearch {
    background: transparent;
    border: none;
    color: #ffffff;
    width: 100%;
    padding: 5px;
    margin: 0px 0px 0px 18px;
}

.genries-dropdown {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background-color: #1E1E1E;
    border: 1px solid #333;
    border-radius: 10px;
    max-height: 200px;
    overflow-y: auto;
    z-index: 1000;
    margin-top: 5px;
}

.genre-option {
    display: flex;
    align-items: center;
    padding: 8px 12px;
    cursor: pointer;
}

.genre-option:hover {
    background-color: rgba(255, 131, 3, 0.1);
}

.flag-icon {
    width: 20px;
    height: 20px;
    margin-right: 10px;
    border-radius: 2px;
    object-fit: cover;
}

.genre-tag .flag-icon {
    width: 16px;
    height: 16px;
    margin-right: 6px;
}

.countries-select-container {
    position: relative;
    background-color: rgba(255, 255, 255, 0.12);
    border-radius: 55px;
    padding: 6px 16px;
    margin-top: 9px;
    width: 100%;
    cursor: pointer;
}

.search-input-wrapper {
    position: relative;
    display: flex;
    align-items: center;
    border: none;
}

.selected-flag-container {
    display: flex;
    align-items: center;
    margin-right: 0px;
}

.selected-flag-container .flag-icon {
    width: 20px;
    height: 20px;
    object-fit: cover;
    border-radius: 2px;
}

.countrySearch {
    background: transparent;
    border: none;
    color: #ffffff;
    width: 100%;
    padding: 5px;
    cursor: pointer;
}

.countrySearch::placeholder {
    color: rgba(255, 255, 255, 0.5);
}

.countrySearch:focus {
    outline: none;
}

.dropdown-icon {
    position: absolute;
    right: 10px;
    color: rgba(255, 255, 255, 0.8);
    pointer-events: none;
}

.dropdown-icon i {
    font-size: 12px;
}

.clear-selection {
    position: absolute;
    right: 30px;
    color: rgba(255, 255, 255, 0.5);
    cursor: pointer;
    font-size: 18px;
}

.countries-dropdown {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background-color: #1E1E1E;
    border: 1px solid #333;
    border-radius: 10px;
    max-height: 270px;
    overflow-y: auto;
    z-index: 1000;
    margin-top: 5px;
}

.country-option {
    display: flex;
    align-items: center;
    padding: 8px 12px;
    cursor: pointer;
    color: #FFFFFF;
}

.country-option:hover {
    background-color: rgba(255, 131, 3, 0.1);
}

.country-option.selected {
    background-color: rgba(255, 131, 3, 0.1);
}

.flag-icon {
    width: 20px;
    height: 20px;
    margin-right: 10px;
    border-radius: 2px;
    object-fit: cover;
}

/* Scrollbar styling */
.countries-dropdown::-webkit-scrollbar {
    width: 8px;
}

.countries-dropdown::-webkit-scrollbar-track {
    background: #1E1E1E;
}

.countries-dropdown::-webkit-scrollbar-thumb {
    background: #333;
    border-radius: 4px;
}

.countries-dropdown::-webkit-scrollbar-thumb:hover {
    background: #444;
}

.country-search-wrapper {
    padding: 8px;
    position: sticky;
    top: 0;
    background: #1E1E1E;
    z-index: 1;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.country-search-wrapper .cs-icon{
  left:3px;
}

.country-search-input {
    width: 100%;
    padding: 8px 12px;
    border-radius: 4px;
    background: rgba(255, 255, 255, 0.01);
    color: #fff;
    font-size: 14px;
    margin:0px 0px 0px 15px !important;
}

.country-search-input:focus {
    outline: none;
    border-color: #FF8303;
}

.country-search-input::placeholder {
    color: rgba(255, 255, 255, 0.5);
}

.search-input-wrapper {
    position: relative;
    display: flex;
    align-items: center;
    margin-top:2px;
}

.search-icon {
    position: absolute;
    left: 2px;
    pointer-events: none;
    opacity: 0.3;
}

/* mobile responsiveness */

@media (max-width: 868px){

    .upload-form-row {
        display: block;
        justify-content: space-between;
        width: 100% !important;
    }
    input, select {
        width: 100% !important;
    }
    .cover-upload-box {
        display: block !important;
    }
    .img-upload-btn {
        padding: 5px 24px;
        font-size: 11px;
        width: 179px;
        margin:15px 0px 13px 0px;
    }
    #updatePersonDetail label {
        display: block;
        margin-bottom: 0px;
        color: rgba(255,255,255,0.35);
        font-size: 14px;
        margin-top: 10px !important;
    }
    .account-setting-progress-bar {
        display: block;
    }
    label {
        display: block;
        margin-bottom: 5px;
        color: rgba(255, 255, 255, 0.35);
        font-size: 14px;
        margin-top: 10px;
    }
    .btn-cancel {
        padding: 4px 40px !important;
        font-size: 11px !important;
    }
    .btn-next {
        padding: 4px 40px !important;
        font-size: 11px !important;
    }
    svg.right-arrow, svg.back-arrow {
        width: 21px !important;
    }
    .main-container{
        margin-top: -35px !important;
        padding: 0px 0px 0px 0px !important;
    }
    #main-footer {
        margin: 0px 0px 0px 0px !important;
    }
    input, .genre-tag{
        font-size: 12px;
    }
    .upload-popup-form-group:last-child {
        margin-right: 20px;
    }
    
}

</style>

<script type="text/javascript">
    // global variables
    var artistName = "<?= session()->get('fullName') ?>";
    // Initialize configuration for file-upload.js
    window.config = {
        defaultImageUrl: '<?= base_url('assets/images/image-cover.png') ?>'
    };

</script>


<script src="<?= base_url('assets/src/js/account-setting/index.js') ?>"></script>
<script src="<?= base_url('assets/src/js/account-setting/alert.js') ?>"></script>
<script src="<?= base_url('assets/src/js/account-setting/file-upload.js') ?>"></script>
<script src="<?= base_url('assets/src/js/account-setting/progress-bar.js') ?>"></script>
<script src="<?= base_url('assets/src/js/account-setting/validation.js') ?>"></script>
<script src="<?= base_url('assets/src/js/account-setting/form.js') ?>"></script>
<script src="<?= base_url('assets/src/js/account-setting/genre-select.js') ?>"></script>
<script src="<?= base_url('assets/src/js/account-setting/country-select.js') ?>"></script>


<!-- previous script end -->
<div class="main-container">
    <div class="account-setting-progress-bar">
        <div class="progress-step active">
            <div class="step-number active" data-step="0">1</div>
            <div class="step-number check" style="display:none;" data-step="1">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z" fill="white"/>
                </svg>
            </div>
            <div class="step-text">ARTIST</div>
        </div>
        <div class="progress-step">
            <div class="step-number default" data-step="2">2</div>
            <div class="step-number check" style="display:none;" data-step="2">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z" fill="white"/>
                </svg>
            </div>
            <div class="step-text">PERSON</div>
        </div>
        <div class="progress-step">
            <div class="step-number default" data-step="3">3</div>
            <div class="step-number check" style="display:none;" data-step="3">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z" fill="white"/>
                </svg>
            </div>
            <div class="step-text">SOCIAL MEDIA</div>
        </div>
    </div>
    <div class="account-setting-container form-section" data-step="0">
        <div class="step-container">
            <h2>ARTIST Information</h2>
            <p>Shows the artist image and information below</p>
        </div>
        <div id="artist-info-placeholder">
            <div class="artist-info-animated-background">
                <div class="background-masker"></div>
            </div>
        </div>
        <?php include __DIR__.'/section/section-artist.php'; ?>
    </div>
    <div class="account-setting-container form-section" data-step="1" style="display: none;">
        <div class="step-container">
            <h2>PERSON</h2>
            <p>Shows the artist administrator's personal information below</p>
        </div>
        <?php include __DIR__.'/section/section-person.php'; ?>
    </div>
    <div class="account-setting-container form-section" data-step="2" style="display: none;">
        <div class="step-container">
            <h2>Social Media</h2>
            <p>Shows the social media information below.</p>
        </div>
        <div class="separator"></div>
        <?php include __DIR__.'/section/section-social-media.php'; ?>
    </div>
</div>
