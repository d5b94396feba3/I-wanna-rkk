<style type="text/css">
#main-footer {
    margin: 0px 55px 0px 111px !important;
}
.separator {
    width: 100%;
    height: 1px;
    background-color: #333333ab;
    margin: 0px 0px 25px 0px;
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

input, textarea {
    width: 100%;
    padding: 10px;
    background-color: rgba(255,255,255,0.12);
    border: none;
    border-radius: 55px !important;
    color: #ffffff;
    padding-left: 20px;
    margin-top: 4px;
}

input::placeholder,
textarea::placeholder {
    color: #555;
}

select {
    width: 100%;
    padding: 10px;
    background-color: #333 !important;
    border: none;
    border-radius: 55px !important;
    color: #ffffff !important;
    padding-left: 20px;
    margin-top: 4px;
    appearance: none;
    background-image: url('data:image/svg+xml;utf8,<svg fill="%23ffffff" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>');
    background-repeat: no-repeat;
    background-position: right 10px center;
}
.custom-select select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-color: #333 !important;
    border: none;
    border-radius: 55px !important;
    color: #ffffff !important;
    padding-left: 20px;
    margin-top: 4px;
    cursor: pointer;
}

.btn-back{
    padding: 10px 40px;
    border-radius: 25px;
    font-weight: 500;
    cursor: pointer;
    background-color: transparent;
    color: rgba(255,255,255,0.7);
    border: 2px solid #333;
    letter-spacing: 0.12em;
    margin-top: 12px;
}

.submit-release-btn {
    padding: 10px 60px;
    border: none;
    border-radius: 25px;
    font-weight: 600;
    cursor: pointer;
    background-color: #FF8303;
    color: #000000;
    letter-spacing: 0.12em;
    float:right;
}

.btn-next{
    padding: 10px 40px;
    border: none;
    border-radius: 25px;
    font-weight: 600;
    cursor: pointer;
    background-color: #FF8303;
    color: #000000;
    letter-spacing: 0.12em;
    float: right;
    margin-top: 12px;
}

.img-update-btn {
    padding: 8px 25px;
    border: none;
    border-radius: 25px;
    font-weight: 500;
    cursor: pointer;
    background-color: transparent;
    color: rgba(255,255,255,0.7);
    border: 2px solid #333;
    letter-spacing: 0.12em;
    margin-top: 17px;
    font-size: 12px;
}

.track-update-btn{
    padding: 8px 25px;
    border: none;
    border-radius: 25px;
    font-weight: 500;
    cursor: pointer;
    background-color: transparent;
    color: rgba(255,255,255,0.7);
    border: 2px solid #333;
    letter-spacing: 0.12em;
    margin-top: 4px;
    font-size: 12px;
}

.release-info-update-btn {
    padding: 8px 25px;
    border: none;
    border-radius: 25px;
    font-weight: 500;
    cursor: pointer;
    background-color: transparent;
    color: rgba(255,255,255,0.7);
    border: 2px solid #333;
    letter-spacing: 0.12em;
    margin-top: 0px;
    font-size: 12px;
    margin-bottom: 25px;
}

.btn-next:hover, .submit-release-btn:hover {
    background-color: #FF9933;
    color: #FFFFFF;
    transition: all 0.3s ease;
    box-shadow: 0 0 10px rgba(255, 131, 3, 0.5);
}

.btn-back:hover, .img-update-btn:hover, .release-info-update-btn:hover, .track-update-btn:hover{
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

.add-info-popup-btn, .upload-audio-btn {
    color: #888;
    cursor: pointer;
}

.track-row {
    border-bottom: 1px solid #333333ab;
    padding-bottom: 32px;
    margin:25px 0px 9px 0px;
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
    font-size: 16px;
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
    grid-template-columns: repeat(4, 1fr);
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

.submit-release-btn {
    padding: 10px 20px;
    border-radius: 25px;
    font-weight: bold;
    cursor: pointer;
    text-transform: uppercase;
}

.submit-release-btn {
    background-color: #FF8303;
    color: #000000;
    border: none;
    padding: 10px 30px;
}
.track-title {
    font-size:16px;
    margin: 10px 10px -3px 10px;
}

.add-info-popup-btn:hover svg,
.add-info-popup-btn:hover svg path, .upload-audio-btn:hover svg path{
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

.close-btn{
    cursor:pointer;
}
.close-btn:hover{
    color: #FF9933;
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
.uploaded-file-name{
    color: #fff;
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

.create-release-popup .btn-back,
.create-release-popup .btn-submit, 
.save-track-popup .btn-back, 
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

.create-release-popup .btn-back,
.save-track-popup .btn-back {
    background-color: rgba(255,255,255,0.08);
    color: rgba(255,255,255,0.55);
    font-weight: 500 !important;
}

.create-release-popup .btn-submit,
.save-track-popup .btn-submit {
  background-color: #FF8303;
  color: #000000;
}

.create-release-popup .btn-back:hover,
.save-track-popup .btn-back:hover {
  background-color: #444444;
}

.create-release-popup .btn-submit:hover,
.save-track-popup .btn-submit:hover {
  background-color: #FF9933;
}

#imageFileContainer.highlight {
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
    margin:0px 0px 79px 2px !important;
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
    top: 49.2%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #000;
}

/* custom alert */

.alert svg {
    font-size: 24px;
    margin: 0px 15px -3px 15px;
}

.form-actions.last-form-actions {
    margin-top: -12px;
}

.track-update-group{
    display: flex; 
    gap: 10px;
}

.isrc-radio-container {
    display: flex;
    align-items: center;
    gap: 20px;
}

.isrc-label {
    margin: 0;
    white-space: nowrap;
}

.popup-radio-group {
    display: flex;
    gap: 15px;
}

.inline-radio {
    display: flex;
    align-items: center;
    gap: 5px;
    cursor: pointer;
}

.inline-radio input[type="radio"] {
    width: auto;
    margin: 0;
    cursor: pointer;
}

.main-container {
    padding: 10px 5px 30px 80px !important;
}


.markets-select-container {
    position: relative;
    background-color: rgba(255, 255, 255, 0.12);
    border-radius: 16px;
    padding: 6px 16px;
    margin-top: 9px;
    padding-top: 10px;
    padding-left: 18px;
}
#marketSearch:focus,
#marketSearch:active {
    outline: none;
    border: none;
    box-shadow: none;
}
.selected-markets {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.market-tag {
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

.market-tag .remove-tag {
    cursor: pointer;
    color: #FF8303;
    font-weight: bold;
}

#marketSearch {
    background: transparent;
    border: none;
    color: #ffffff;
    width: 100%;
    padding: 6px;
    margin: 0px 0px 0px 18px;
    font-size: 15px;
}

#copyright_desc{
    border-radius: 16px !important;
}

.markets-dropdown {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background-color: #1E1E1E;
    border: 1px solid #333;
    border-radius: 10px;
    max-height: 250px;
    overflow-y: auto;
    z-index: 1000;
    margin-top: 5px;
}

.market-option {
    display: flex;
    align-items: center;
    padding: 8px 12px;
    cursor: pointer;
}

.market-option:hover {
    background-color: rgba(255, 131, 3, 0.1);
}

.flag-icon {
    width: 20px;
    height: 20px;
    margin-right: 10px;
    border-radius: 2px;
    object-fit: cover;
}

.market-tag .flag-icon {
    width: 16px;
    height: 16px;
    margin-right: 6px;
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

input[type="text"] {
    padding-left: 30px;
}


/* mobile responsiveness */

@media (max-width: 868px){
    .main-container {
        margin-top: 6px !important;
        padding: 0px 0px 0px 0px !important;
    }
    .track-input-group label {
        margin-top: 10px;
    }
    #main-footer {
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

<script src="<?= base_url('assets/src/js/music-upload/release-detail/index.js') ?>"></script>
<script src="<?= base_url('assets/src/js/music-upload/release-detail/alert.js') ?>"></script>
<script src="<?= base_url('assets/src/js/music-upload/release-detail/file-upload.js') ?>"></script>
<script src="<?= base_url('assets/src/js/music-upload/release-detail/validation.js') ?>"></script>
<script src="<?= base_url('assets/src/js/music-upload/release-detail/progress-bar.js') ?>"></script>
<script src="<?= base_url('assets/src/js/music-upload/release-detail/event-listeners.js') ?>"></script>
<script src="<?= base_url('assets/src/js/music-upload/release-detail/form.js') ?>"></script>
<script src="<?= base_url('assets/src/js/music-upload/create-release/market-search.js') ?>"></script>
<script src="<?= base_url('assets/src/js/music-upload/release-detail/select-status.js') ?>"></script>


<div class="main-container">
    <div class="music-upload-progress-bar">
        <div class="progress-step active">
            <div class="step-number active" data-step="0">1</div>
            <div class="step-number check" style="display:none;" data-step="1">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z" fill="white"/>
                </svg>
            </div>
            <div class="step-text">Release</div>
        </div>
        <div class="progress-step">
            <div class="step-number default" data-step="2">2</div>
            <div class="step-number check" style="display:none;" data-step="2">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z" fill="white"/>
                </svg>
            </div>
            <div class="step-text">Tracks</div>
        </div>
    </div>
    
    <?php 
    // Include the release section layout file
    include __DIR__ . '/layout/release-section.php';
    // Include the track section layout file
    include __DIR__ . '/layout/track-section.php';
    ?>
</div>