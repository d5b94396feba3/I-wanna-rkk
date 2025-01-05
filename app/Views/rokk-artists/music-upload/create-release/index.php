<style type="text/css">
#dashboard-footer {
    margin: 0px 55px 0px 111px !important;
}

.separator {
    width: 100%;
    height: 1px;
    background-color: #333333ab;
    margin: 0px 0px 25px 0px;
}
.mt-20{
    margin-top:20px;
}
.music-upload-progress-bar {
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

.account-container, .release-container, .track-container, .review-container{
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

.form-actions {
    display: flex;
    justify-content: space-between;
    margin-top: 30px;
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

.btn-next, .create-release-form-btn {
    padding: 10px 90px;
    border: none;
    border-radius: 25px;
    font-weight: 600;
    cursor: pointer;
    background-color: #FF8303;
    color: #000000;
    letter-spacing: 0.12em;
}

.btn-next:hover, .create-release-form-btn:hover {
    background-color: #FF9933;
    color: #FFFFFF;
    transition: all 0.3s ease;
    box-shadow: 0 0 10px rgba(255, 131, 3, 0.5);
}

.btn-cancel:hover {
    background-color: #333;
    color: #ffffff;
    transition: all 0.3s ease;
    box-shadow: 0 0 10px rgba(51, 51, 51, 0.5);
}

.form-actions {
    border-top: 1px solid #333333ab;
    padding-top: 25px;
}

.first-form-actions {
    border-top: 1px solid #333333ab;
    padding-top: 25px;
    margin-top: 30px;
}

.first-form-actions .btn-next {
    float: right;
}

.cover-upload-container {
  margin: 0px 0px;
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

.image-placeholder img.upload-default-img {
    width: 60px;
    height: 60px;
}

.upload-content {
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.img-upload-button {
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

.img-upload-button:hover {
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

.btn-release{
    padding: 10px 90px;
    border: none;
    border-radius: 25px;
    font-weight: 600;
    cursor: pointer;
    background-color: rgba(255,255,255,0.15);
    color:rgba(255,255,255,0.55);
}

.track-no {
    color: #FF8303;
    font-size: 15px;
    font-weight: 500;
    margin-bottom: 15px;
}

.track-container {
    margin: 0px 43px 30px 30px;
    color: #fff;
}

.track-row {
    margin-bottom: 20px;
}

.track-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.track-header h3 {
    color: #FF8303;
    font-size: 16px;
    margin: 0;
}

.reset-btn {
    background: none;
    border: none;
    color: #888;
    cursor: pointer;
    font-size: 14px;
}
.reset-btn:hover {
 color:#FF8303;
}
.track-inputs {
    display: flex;
    gap: 0px;
}

.track-input-group {
    flex: 1;
}

.track-input-group label {
    display: block;
    color: rgba(255,255,255,0.35);
    font-size: 14px;
    margin-bottom: 5px;
}

.track-input-group input {
    width: 100%;
    padding: 10px;
    background-color: rgba(255,255,255,0.12);
    border: none;
    color: #fff;
    font-size: 16px;
    padding-left: 20px;
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

.add-track-info-btn, .upload-audio-btn {
    color: #888;
    cursor: pointer;
}

.track-row {
    border-bottom: 1px solid #333333ab;
    padding-bottom: 20px;
}

.track-row:last-of-type,
 .track-row:last-child {
    border-bottom: 1px solid transparent !important;
}


.section-title {
    text-transform: uppercase;
    font-size: 18px;
    margin-bottom: 20px;
}

.release-details {
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 30px;
    background:rgba(255, 255, 255, 0.085);
}

.release-details-container{
    display: flex; 
}

.album-cover {
    width: 115px;
    height: 115px;
    object-fit: cover;
    border-radius: 5px;
    margin-right: 20px;
}

.details-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    width: 100%;
}

.detail-item {
    display: flex;
    flex-direction: column;
}

.detail-label {
    margin-bottom: 0px; 
    color: rgba(255,255,255,0.35);
    font-size: 14px;
}

.detail-value {
    font-size: 14px;
}

.orange {
    color: #FF8303;
}

.tracks-list {
    background:rgba(255, 255, 255, 0.085);
    border-radius: 10px;
    padding: 10px 10px 0px 10px;
}

.track-item {
    display: flex;
    align-items: center;
    padding: 20px 10px 20px 10px;
    border-bottom: 1px solid #3A3A3A;
}

.track-item:last-child {
    border-bottom: none;
}

.track-cover {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 5px;
    margin-right: 15px;
}

.track-details {
    flex-grow: 1;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.track-duration {
    font-size: 14px;
    color: #888;
}

.more-details-btn {
    background: none;
    border: none;
    cursor: pointer;
    color: rgba(255,255,255,0.35);
    font-size: 14px;
    margin-top: 10px;
}

.track-list-more-info {
    transition: margin-bottom 0.6s ease;
    background: rgba(255, 255, 255, 0.01);
    border-bottom: 1px solid #3A3A3A;
    border-radius: 0px;
    margin-left:-8px;
}

.track-list-more-info .details-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    width: 100%;
}

.more-info-title {
    margin-bottom:-10px !important;
}

.rotate180 {
    transform: rotate(180deg);
    transition: transform 0.3s ease;
}

.more-details-btn:hover {
    color: #FF8303;
    transition: color 0.3s ease, text-decoration 0.3s ease;
}

.action-buttons {
    display: flex;
    justify-content: space-between;
    margin-top: 30px;
}

.btn-back, .create-release-form-btn {
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

.create-release-form-btn {
    background-color: #FF8303;
    color: #000000;
    border: none;
    padding: 10px 30px;
}
.track-title {
    font-size:16px;
    margin: 10px 10px -3px 10px;
}

.add-track-info-btn:hover svg,
.add-track-info-btn:hover svg path, .upload-audio-btn:hover svg path{
    fill: #FF8303 !important;
    stroke: #FF8303 !important;
}

/* track popup style  */
.track-popup {
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
.popup-body input[type="date"] {
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

.save-track-btn, .audio-upload-btn {
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

.save-track-btn:hover, .audio-upload-btn:hover {
  background-color: #FF9933;
  color: #FFFFFF;
  transition: all 0.3s ease;
  box-shadow: 0 0 10px rgba(255, 131, 3, 0.5);
}

/* audio upload popup */

.audio-upload-popup {
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

.audio-upload-popup .popup-content .popup-body{
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
.audio-upload-popup .track-upload-area {
  border: 2px dashed #333333;
  border-radius: 10px;
  padding: 40px 20px;
  text-align: center;
}

.audio-upload-popup .audio-upload-icon {
    background: rgba(255,255,255,0.1);
    width: 92px;
    display: flex;
    justify-content: center;
    margin: 0 auto 20px auto;
    padding: 27px 0px;
    border-radius: 10px;
}

.audio-upload-popup .audio-upload-icon svg{
    width: 32px !important;
}

.audio-upload-popup .upload-text {
  color: #666666;
  margin: 5px 0;
  font-size: 14px;
}

/* submit release, save popup style*/

.create-release-popup,
.save-track-popup {
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

.create-release-popup .popup-content{
  width: 70%;
  margin: 100px auto;
  padding: 30px;
  text-align: center;
  border-radius: 15px;
}

.save-track-popup .popup-content{
  width: 90%;
  margin: 100px auto;
  padding: 33px;
  text-align: center;
  border-radius: 15px;
}

.create-release-popup .popup-content .popup-body,
.save-track-popup .popup-content .popup-body{
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 15px;
    margin: 0px 0px 28px 0px;
    padding: 37px 10px 10px 10px;
}

.create-release-popup .popup-icon,
.save-track-popup .popup-icon{
  margin-bottom: 20px;
}

.create-release-popup h2,
.save-track-popup h2 {
    color: #FF8303;
    font-size: 25px;
    margin: 0 0 10px;
    letter-spacing: 0.07em;
}
.create-release-popup p, 
.save-track-popup p{
  color: #666666;
  font-size: 16px;
  margin-bottom: 30px;
}

.create-release-popup .popup-actions, 
.save-track-popup .popup-actions{
  display: flex;
  justify-content: space-between;
}

.create-release-popup .btn-cancel,
.create-release-popup .btn-submit, 
.save-track-popup .btn-cancel, 
.save-track-popup .btn-submit{
  width: 48%;
  padding: 12px 0;
  border: none;
  border-radius: 25px;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.create-release-popup .btn-cancel,
.save-track-popup .btn-cancel {
    background-color: rgba(255,255,255,0.08);
    color: rgba(255,255,255,0.55);
    font-weight: 500 !important;
}

.create-release-popup .btn-submit,
.save-track-popup .btn-submit {
  background-color: #FF8303;
  color: #000000;
}

.btn-reset {
    border: none;
    border-radius: 25px;
    font-size: 12px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    background: transparent;
    color: rgb(255 255 255 / 50%);
    text-decoration: underline;
}

.btn-reset:hover {
    color: rgb(255 255 255 / 98%);
}

.create-release-popup .btn-cancel:hover,
.save-track-popup .btn-cancel:hover {
  background-color: #444444;
}

.create-release-popup .btn-submit:hover,
.save-track-popup .btn-submit:hover {
  background-color: #FF9933;
}

#imageFileContainer.highlight,
.highlight
 {
    border-color: #FF8303;
    background-color: rgba(255, 131, 3, 0.1);
}

.audio-upload-icon{
    cursor: pointer;
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

/* sweetalert2 style */
.custom-popup {
    background-color: #1E1E1E;
    border-radius: 10px;
    color: #FFFFFF;
}
.custom-title {
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

/* style sweetalert2 custom progressbar */
.progress-bar-container {
    width: 100%;
    background-color: #f0f0f0;
    border-radius: 4px;
    margin: 10px 0;
}
.progress-bar {
    width: 0%;
    height: 20px;
    background-color: #4CAF50;
    border-radius: 4px;
    transition: width 0.3s ease-in-out;
}

.progress-percentage {
    position: absolute;
    top: 46.3%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #000;
}

.dynamic-track-container {
    padding-top: 19px !important;
    border-top: 1px solid #333333ab;
    margin-top: 28px !important;
    display:none;
}

.main-container {
    padding: 4px 0px 30px 75px !important;
    margin-bottom: 60px !important;
}

/* mobile responsiveness */
 
@media (max-width: 868px){
    .main-container {
        margin-top: 0px !important;
        padding: 0px 10px 0px 0px !important;
    }
    .progress-step {
        display: block !important;
    }
    .track-input-group label {
        margin-top: 10px;
    }
    #dashboard-footer {
        margin: 0px 0px 0px 0px !important;
    }
}

</style>

<script>
// Initialize configuration for file-upload.js
window.config = {
    defaultImageUrl: '<?= base_url('assets/images/image-cover.png') ?>',
    artistName : "<?= session()->get('fullName') ?>"
};
</script>

<script src="<?= base_url('assets/src/js/music-upload/create-release/index.js') ?>"></script>
<script src="<?= base_url('assets/src/js/music-upload/create-release/alert.js') ?>"></script>
<script src="<?= base_url('assets/src/js/music-upload/create-release/file-upload.js') ?>"></script>
<script src="<?= base_url('assets/src/js/music-upload/create-release/progress-bar-reviews.js') ?>"></script>
<script src="<?= base_url('assets/src/js/music-upload/create-release/validation.js') ?>"></script>
<script src="<?= base_url('assets/src/js/music-upload/create-release/track-management.js') ?>"></script>
<script src="<?= base_url('assets/src/js/music-upload/create-release/event-listeners.js') ?>"></script>
<script src="<?= base_url('assets/src/js/music-upload/create-release/form.js') ?>"></script>


<div class="main-container">

<form action="<?= base_url('upload_music_release_data') ?>" id="releaseForm" class="artist-uform" method="post" enctype="multipart/form-data">
<?= csrf_field() ?>
    <div class="music-upload-progress-bar">
        <div class="progress-step active">
            <div class="step-number default active" data-step="0">1</div>
            <div class="step-number check" style="display:none;" data-step="0">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z" fill="white"/>
                </svg>
            </div>
            <div class="step-text">Account</div>
        </div>
        <div class="progress-step">
            <div class="step-number default" data-step="1">2</div>
            <div class="step-number check" style="display:none;" data-step="1">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z" fill="white"/>
                </svg>
            </div>
            <div class="step-text">Release</div>
        </div>
        <div class="progress-step">
            <div class="step-number default" data-step="2">3</div>
            <div class="step-number check" style="display:none;" data-step="2">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z" fill="white"/>
                </svg>
            </div>
            <div class="step-text">Tracks</div>
        </div>
        <div class="progress-step">
            <div class="step-number default" data-step="3">4</div>
            <div class="step-number check" style="display:none;" data-step="3">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z" fill="white"/>
                </svg>
            </div>
            <div class="step-text">Review</div>
        </div>
    </div>


    <input type="hidden"  name="hidden_artist_id" id="hidden_artist_id" value="<?= esc($artist_data->artist_id); ?>">

    <div class="account-container form-section" class="form-section" data-step="0">
        <div class="step-container">
            <h2>ACCOUNT DETAILS</h2>
            <p>Please let us know who you are and in what role you are uploading this release (artist, management, label, etc.).</p>
        </div>
        <div class="separator"></div>
        
        <div class="upload-form-row">
            <div class="upload-popup-form-group">
                <label for="artist_name">Band/Artist Name *</label>
                <input type="text" name="artist_name" id="artist_name" value="<?= esc($artist_data->artist_name); ?>" placeholder="Band/Artist Name">
            </div>
            <div class="upload-popup-form-group">
                <label for="role">Role *</label>
                <select id="role">
                    <?php if(isset($artist_data)): ?>
                        <option value="<?= esc($artist_data->artist_type_from_ai); ?>"><?= esc($artist_data->artist_type_from_ai); ?></option>
                        <?php if(esc($artist_data->artist_type_from_ai) !="Solo Artist"): ?>
                        <option value="Solo Artist">Solo Artist</option>
                        <?php endif; ?>
                        <?php if(esc($artist_data->artist_type_from_ai) !="Band"): ?>
                        <option value="Band">Band</option>
                        <?php endif; ?>
                        <?php if(esc($artist_data->artist_type_from_ai) !="Influencer"): ?>
                        <option value="Influencer">Influencer</option>
                        <?php endif; ?>
                    <?php else: ?>
                        <option value="Unknown">Unknown</option>
                    <?php endif; ?>
                </select>
            </div>
            <div class="upload-popup-form-group">
                <label for="label">Label *</label>
                <input type="text" id="label" placeholder="e.g. Warner Music">
            </div>
        </div>
        
        <div class="upload-form-row">
            <div class="upload-popup-form-group">
                <label for="distributor">Distributor / Aggregator</label>
                <input type="text" id="distributor" value="" placeholder="e.g. DistroKid">
            </div>
            <div class="upload-popup-form-group">
                <label for="management-email">Management Email *</label>
                <input type="email" id="management-email" value="<?= esc($artist_data->official_contact_email); ?>" placeholder="Management Email">
            </div>
            <div class="upload-popup-form-group">
                <label for="website">Website</label>
                <input type="url" id="website" placeholder="https://">
            </div>
        </div>
        
        <div class="first-form-actions">
            <button type="button" class="btn-next form-btn-next">NEXT</button>
        </div>
    </div>

    
<div class="release-container form-section" data-step="1" style="display: none;">
    <div class="step-container">
        <h2>Release Information</h2>
        <p>Upload the cover image and fill the release form below to proceed.</p>
    </div>
    <div class="cover-upload-container">
        <div class="cover-upload-box" id="imageFileContainer">
            <div class="image-placeholder" id="preview">
                <img src="<?php echo base_url('assets/images/image-cover.png'); ?>" class="upload-default-img" alt="Upload icon">
                <img src="<?php echo base_url('assets/images/image-cover.png'); ?>" class="uploaded-img" alt="Upload icon" style="display:none;">
            </div>
            <div class="upload-content">
                <button class="img-upload-button">Upload Cover Image</button>
                <input type="file" name="image_link" id="image_link" accept="image/*" style="display: none;" required>
                <p class="upload-instructions">
                    At least 800 x 800px recommended. PNG or JPG is allowed.<br>
                    Drag and Drop the image.
                </p>
            </div>
        </div>
    </div>
    <div class="separator mt-20"></div>
    
        <div class="upload-form-row">
          
            <div class="upload-popup-form-group">
                <label for="label">Release Title *</label>
                <input type="text" name="release_title" id="release_title" value="Faith no more" placeholder="Faith no more">
            </div>

            <div class="upload-popup-form-group">
                <label for="genre">Genre *</label>
                <select name="genre" id="genre" required>
                    <?php foreach($genres as $genre): ?>
                        <option value="<?= $genre['genre'] ?>"><?= $genre['genre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        
        <div class="upload-form-row">
            <div class="upload-popup-form-group">
                <label for="release_date">Release Date *</label>
                <input type="date" name="release_date" id="release_date" placeholder="06/12/24">
            </div>
            <div class="upload-popup-form-group">
                <label for="copyright">Copyright *</label>
                <select name="copyright" id="copyright" required>
                    <?php
                    date_default_timezone_set("UTC");
                    $current_year = date("Y");
                    for ($copyright_year = 1964; $copyright_year <= $current_year; $copyright_year++) {
                        echo '<option value="' . $copyright_year . '">' . $copyright_year . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="upload-popup-form-group">
                <label for="language">Language *</label>
                <select name="language" id="language" required>
                    <option value="ar">Arabic</option>
                    <option value="yue-Hant">Cantonese</option>
                    <option value="ca">Catalan</option>
                    <option value="cmn-Hans">Chinese (Simplified)</option>
                    <option value="cmn-Hant">Chinese (Traditional)</option>
                    <option value="hr">Croatian</option>
                    <option value="cs">Czech</option>
                    <option value="da">Danish</option>
                    <option value="de-DE">Deutsch</option>
                    <option value="nl">Dutch</option>
                    <option selected="selected" value="en-GB">English</option>
                    <option value="et">Estonian</option>
                    <option value="fi">Finnish</option>
                    <option value="fr-FR">French</option>
                    <option value="el">Greek</option>
                    <option value="he">Hebrew</option>
                    <option value="hu">Hungarian</option>
                    <option value="is">Icelandic</option>
                    <option value="id">Indonesian</option>
                    <option value="it-IT">Italian</option>
                    <option value="ja">Japanese</option>
                    <option value="ko">Korean</option>
                    <option value="lo">Lao</option>
                    <option value="lv">Latvian</option>
                    <option value="li">Lithuanian</option>
                    <option value="ms">Malay</option>
                    <option value="no">Norwegian</option>
                    <option value="pl">Polish</option>
                    <option value="pt">Portuguese</option>
                    <option value="ro">Romanian</option>
                    <option value="ru">Russian</option>
                    <option value="sk">Slovak</option>
                    <option value="es">Spanish</option>
                    <option value="sv">Swedish</option>
                    <option value="de-CH">Schweizerdeutsch</option>
                    <option value="tl">Tagalog</option>
                    <option value="th">Thai</option>
                    <option value="tr">Turkish</option>
                    <option value="uk">Ukrainian</option>
                    <option value="vi">Vietnamese</option>
                </select>
            </div>
        </div>

        <div class="upload-form-row">
            <div class="upload-popup-form-group">
                <label for="copyright_desc">Additional Copyright Information</label>
                <input type="text" id="copyright_desc" name="copyright_desc" value="" placeholder="e.g. ℗ 2024 Artist Name. All rights reserved.">
            </div>
        </div>
        
        <div class="form-actions">
            <button type="button" class="btn-cancel form-btn-cancel">BACK</button>
            <button type="button" class="btn-next form-btn-next">NEXT</button>
        </div>
</div>

<div class="track-container form-section" data-step="2" style="display: none;">
    <div class="step-container">
        <h2>Tracks</h2>
        <p>Add total Tracks then upload the track audio and information and continue. </p>
    </div>
    <div class="upload-form-row">
        <div class="upload-popup-form-group">
            <label for="total-number-of-tracks">Total number of Tracks *</label>
            <input type="number" name="num_of_track" id="num_of_track" placeholder="Please enter number of tracks" required onkeyup="genre_track_upload_fields()">
        </div>
    </div>
    <div class="dynamic-track-container"></div>
    <div class="form-actions">
        <button type="button" class="btn-cancel form-btn-cancel">BACK</button>
        <button type="button" class="btn-next form-btn-next">NEXT</button>
    </div>
</div>

<div class="review-container form-section" data-step="3" style="display: none;">
    <div class="step-container">
        <h2>Review</h2>
        <p>Review and correct the new release details in the best time before releasing.</p>
    </div>

    <div class="separator"></div>
   
    <div class="release-details">
    <h2 class="section-title">RELEASE DETAILS</h2>
    <div class="release-details-container">
        <img src="https://i.scdn.co/image/ab67616d00001e02ec28bb60d3b20894ca9b5df7" alt="Album Cover" class="album-cover review-album-cover">
        <div class="details-grid">
            <div class="detail-item">
                <span class="detail-label">Album Name</span>
                <span class="detail-value orange review-album-name">Empires Falling</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Artist</span>
                <span class="detail-value review-artist_name">Peter Moog</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Copyright</span>
                <span class="detail-value review-copyright">1964</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Release Date</span>
                <span class="detail-value orange review-release_date">31st May, 2024</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Language</span>
                <span class="detail-value review-language">English</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Genre</span>
                <span class="detail-value review-genre">Thrash Metal</span>
            </div>
        </div>
        </div>
    </div>
    <div class="tracks-list">
    <h2 class="section-title track-title">TRACKS (<span class="review-total-track"></span>)</h2>
        <div class="dynamic-review-track-content"></div>
    </div>
        <div class="form-actions">
            <button type="button" class="btn-cancel form-btn-cancel">BACK</button>
            <button type="button" class="create-release-form-btn">CREATE RELEASE</button>
        </div>
        <div id="uploadProgressBar">
            <div class="progress-bar-inner"></div>
        </div>
    </div>

</form>
</div>


<!-- submit release popup -->
<div id="submitReleasePopup" class="create-release-popup">
  <div class="popup-content">
  <div class="popup-body">
    <div class="popup-icon">
      <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M26 5.16291V19.9999C26 23.3137 23.3138 25.9999 20 25.9999C16.6862 25.9999 14 23.3137 14 19.9999C14 16.6861 16.6862 13.9999 20 13.9999C20.7012 13.9999 21.3744 14.1202 22 14.3413V0.0986328C32.1066 1.10207 40 9.62917 40 19.9999C40 31.0457 31.0456 39.9999 20 39.9999C8.9543 39.9999 0 31.0457 0 19.9999C0 9.62917 7.89336 1.10207 18 0.0986328V4.12367C10.1074 5.10785 4 11.8406 4 19.9999C4 28.8365 11.1634 35.9999 20 35.9999C28.8366 35.9999 36 28.8365 36 19.9999C36 13.2851 31.8636 7.53645 26 5.16291Z" fill="#FF8303"/>
      </svg>
    </div>
    <h2>CREATE RELEASE</h2>
    <p>Are you sure to submit the release?</p>
    </div>
    <div class="popup-actions">
      <button class="btn-cancel create-release-popup-cancel-btn">CANCEL</button>
      <button class="btn-submit create-release-popup-submit-btn">SUBMIT</button>
    </div>
  </div>
</div>

<!-- submit release popup -->
<div id="saveTrackDataInPopup" class="save-track-popup">
  <div class="popup-content">
  <div class="popup-body">
    <div class="popup-icon">
      <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M26 5.16291V19.9999C26 23.3137 23.3138 25.9999 20 25.9999C16.6862 25.9999 14 23.3137 14 19.9999C14 16.6861 16.6862 13.9999 20 13.9999C20.7012 13.9999 21.3744 14.1202 22 14.3413V0.0986328C32.1066 1.10207 40 9.62917 40 19.9999C40 31.0457 31.0456 39.9999 20 39.9999C8.9543 39.9999 0 31.0457 0 19.9999C0 9.62917 7.89336 1.10207 18 0.0986328V4.12367C10.1074 5.10785 4 11.8406 4 19.9999C4 28.8365 11.1634 35.9999 20 35.9999C28.8366 35.9999 36 28.8365 36 19.9999C36 13.2851 31.8636 7.53645 26 5.16291Z" fill="#FF8303"/>
      </svg>
    </div>
    <h2>SAVE TRACK</h2>
    <p>To save time, you can click here to transfer all details, except the track name, for all other songs. However, you can still change them for each individual song.</p>
    </div>
    <div class="popup-actions">
      <button class="btn-cancel save-track-popup-cancel-btn">I want to fill them out</button>
      <button class="btn-submit save-track-popup-submit-btn">Yes, I want to save time</button>
    </div>
  </div>
</div>
