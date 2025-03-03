<style type="text/css">
    .card-box{
        background: rgba(30, 30, 30, 0.67);
        padding: 30px 0px 35px 25px;
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

    .chart-link a{
        color: rgba(255, 255, 255, 0.5);
        font-size: 17px;
        float: right;
        margin-right: 20px;
        margin-top: -94px;
    }
    .copy-prokk-address{
        font-size: 17px;
        float: right;
        margin-right: 12px;
        margin-top: -28px;
        padding: 5px 5px;

    }

    .copy-prokk-address a{
        color: rgba(255, 255, 255, 0.5);
        cursor: pointer;
        transition: color 0.2s ease;
    }

    .copy-prokk-address:hover{
        background: rgba(255, 131, 3, 0.2);
        border-color: rgba(255, 131, 3, 0.3);
    }

    .copy-link-icon a:hover{
        color: #ff8303 !important;
    }

    .metric-chart-link a{
        color: rgba(255, 255, 255, 0.5);
        font-size: 17px;
        float: right;
        margin-right: 0px;
        margin-top: -94px;
    }
    .followers-chart-link a{
        color: rgba(255, 255, 255, 0.5);
        font-size: 17px;
        float: right;
        margin-right: 0px;
        margin-top: -170px;
    }
    .text-success {
        color: #4caf50 !important;
        font-size: 14px;
        font-size: 12px;
        float: right;
        margin-right: 20px;
        margin-top: -40px;
        background: #4caf500f;
        padding: 5px 12px;
        border-radius: 13px;
    }
    .progress-data {
        width: 100%;
        height: 200px;
        margin-top: 20px;
    }
    #currentDate, #currentDateIncome, #totalIncomeDate, #followersDate, #LastMonthDate {
        color: #9999997d;
        padding-left: 10px;
    }
    .metric-card {
        position: relative;
        padding: 26px;
        height: 200px;
    }
    .metric-card:hover
    {
        background: linear-gradient(0deg, #1a1a1a 100%, rgba(0, 0, 0, 0) 27.82%), linear-gradient(0deg, #151515, #333333);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    .large-number {
        font-size: 48px;
        font-weight: 600;
        color: #FF8303;
        font-stretch: condensed;
        letter-spacing: -0.04em;
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

    .trend {
        position: absolute;
        top: 20px;
        right: 20px;
        font-size: 14px;
        font-weight: bold;
    }

    .trend-box-das{
        background: #4caf500f;
        padding: 13px 28px;
        border-radius: 13px;
        width: 50px;
        margin-top: 7px;
        margin-left: -3px;
    }

    .trend.positive {
        color: #4caf50;
        bottom: 0;
        left: 7px;
        top: 104px;
        font-size: 12px;
    }

    .trend-box-followers-positive{
        background: #4caf500f;
        padding: 13px 30px;
        border-radius: 13px;
        width: 50px;
        margin-top: -48px;
        margin-left: -3px;
        float: right;
    }

    .followers-negative {
        color: #f44336;
        bottom: 0;
        top: 80px;
        right: 31px;
    }
    .followers-positive {
        color: #4caf50;
        bottom: 0;
        top: 80px;
        right: 31px;
    }

    .trend-box-lmi-negative{
        background: #f443361a;
        padding: 13px 30px;
        border-radius: 13px;
        width: 50px;
        margin-top: -48px;
        margin-left: -3px;
        float: right;
    }

    .trend-box-lmi-positive{
        background: #4caf500f;
        padding: 13px 30px;
        border-radius: 13px;
        width: 50px;
        margin-top: -48px;
        margin-left: -3px;
        float: right;
    }

    .trend.lmi-negative {
        color: #f44336;
        bottom: 0;
        top: 80px;
        right: 31px;
    }

    .trend.lmi-positive {
        color: #4caf50;
        bottom: 0;
        top: 80px;
        right: 31px;
    }

    .das .large-number{
        margin-top: 0px;
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

.weight-500 {
    font-weight: 500 !important;
    color: rgba(255,255,255,0.8);
    font-size: 17px;
    font-family: 'TitlingGothicFBComp-Medium',sans-serif;
    letter-spacing: 0.1em;
    font-stretch: condensed;
    text-transform: uppercase;
}
.das-select {
    background-color: rgb(255 255 255 / 0%) !important;
    color: rgba(255, 255, 255, 0.6);
    border: 1px solid #ffffff2b;
    border-radius: 20px;
    padding: 4px 25px 4px 10px;
    font-size: 12px;
    cursor: pointer;
    outline: none;
    float: right;
    margin-top: -95px;
    margin-right: 20px;
    font-weight: 500;
    font-family: 'Poppins', sans-serif;
}

.das-select:hover,
.das-select:focus {
    background-color: rgba(255, 255, 255, 0.2);
}

.das-select option {
    background-color: #1E1E1E;
    color: rgba(255, 255, 255, 0.7);
}

/* das previous style goes here */

#das-container-placeholder {
    width: 97%;
    background: linear-gradient(to right, rgba(40, 40, 40, 0) 47.82%, rgba(17, 17, 17, 0) 100%);
    background-size: 100% 100%;
    background-position: right center;
    border-radius: 15px;
    color: rgba(255, 255, 255, 0.8);
    margin: 0 0 0 3px;
    padding: 0;
    transition: background 0.3s ease, transform 0.3s ease;
    border: none;
    position: relative;
    overflow: hidden;
}

@keyframes placeHolderShimmer {
    0% {
        background-position: -800px 0;
    }
    100% {
        background-position: 800px 0;
    }
}
.das-animated-background {
    animation-duration: 2s;
    animation-fill-mode: forwards;
    animation-iteration-count: infinite;
    animation-name: placeHolderShimmer;
    animation-timing-function: linear;
    background: linear-gradient(to right, #111 47.82%, rgba(17, 17, 17, 0) 100%);
    background-size: 100% 100%, 100% 100%, contain;
    background-position: right center;
    min-height: 545px;
    border-radius: 1px;
    position: relative;
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

.pass-valid-text {
    color: rgba(255,255,255,0.3) !important;
    font-size: 11px !important;
    margin: 7px 0px 20px 0px !important;
}

p.das-info {
    color: rgba(255, 255, 255, 0.75);
}

.das-input {
    width: 76% !important;
    background: rgb(255 255 255 / 7.3%);
    color: #fff;
    border: 1px solid transparent;
    border-radius: 50px;
    margin: 0px 20px 10px 0px !important;
    padding: 8px 0px 10px 24px !important;
    font-size: 18px;
    text-transform: lowercase;
}
.rokk-app {
    color: #FF8303;
    font-size: 18px;
}
.termsofsevice-txtarea {
    margin:16px 8px 21px 0px;;
    border: 1px solid #d3d3d32b;
    border-radius: 5px !important;
    font-size: 13px !important;
    color: #d3d3d3;
    background: linear-gradient(0deg, #111 100%, rgba(0, 0, 0, 0) 27.82%), linear-gradient(0deg, #0b0b0b, #080808);
    height: 266px !important;
    overflow-y: scroll !important;
    padding:15px 10px 19px 15px;
}

input[type="checkbox"] {
    accent-color: #FF8302;
}

.checkbox {
    width: 100% !important;
    margin-left: -11px;
    padding-left: 14px;
    border: none !important;
    padding-top: 0px !important;
    padding-bottom: 0px;
    margin-top: 10px;
    margin-bottom: 10px;
    font-size: 13px;
}

.checkbox-link{
    cursor: pointer;
}

.checkbox-link:hover {
    color: #fff !important;
}

.das-preferred-address {
    margin-right: 9px;
}

.das-submit-btn{
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
.das-submit-btn:hover{
    background-color: #333;
    color: #ffffff;
    transition: all 0.3s ease;
    box-shadow: 0 0 10px rgba(51, 51, 51, 0.5);
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
    margin-top: 4px !important;
    font-size: 19px !important;
    color: #FF8303 !important;
    font-family:'Poppins', sans-serif;2
    font-weight:500 !important;
}

.das-container-height {
    height: 650px;
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


@media query and (max-width: 768px) {
    #dashboard-footer {
        margin: 0px 0px 0px 0px !important;
    }
    .das-container-height {
        height: 788px !important;
    }
    
}

</style>


<script src="<?= base_url('assets/src/js/direct-artist-support/index.js') ?>"></script>
<script src="<?= base_url('assets/src/js/direct-artist-support/income-charts.js') ?>"></script>
<script src="<?= base_url('assets/src/js/direct-artist-support/users-charts.js') ?>"></script>
<script src="<?= base_url('assets/src/js/direct-artist-support/clipboard.js') ?>"></script>
<script src="<?= base_url('assets/src/js/direct-artist-support/alert.js') ?>"></script>

<div class="main-container">
    <div class="row">
        <div class="col-md-8 mb-30">
            <!-- Preferred ROKK Address Card -->
            <div class="row mb-4">
                <div class="col-md-12 mb-30">
                    <div class="card-box widget-style height-100-p das-container-height">
                        <div class="widget-data">
                            <div class="weight-500 font-14">Preferred ROKK Address</div>
                            <div class="copy-prokk-address">
                                <a href="#" class="copy-link-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.1202 17.0228L8.92129 14.7324C8.19135 15.5125 7.15261 16 6 16C3.79086 16 2 14.2091 2 12C2 9.79086 3.79086 8 6 8C7.15255 8 8.19125 8.48746 8.92118 9.26746L13.1202 6.97713C13.0417 6.66441 13 6.33707 13 6C13 3.79086 14.7909 2 17 2C19.2091 2 21 3.79086 21 6C21 8.20914 19.2091 10 17 10C15.8474 10 14.8087 9.51251 14.0787 8.73246L9.87977 11.0228C9.9583 11.3355 10 11.6629 10 12C10 12.3371 9.95831 12.6644 9.87981 12.9771L14.0788 15.2675C14.8087 14.4875 15.8474 14 17 14C19.2091 14 21 15.7909 21 18C21 20.2091 19.2091 22 17 22C14.7909 22 13 20.2091 13 18C13 17.6629 13.0417 17.3355 13.1202 17.0228ZM6 14C7.10457 14 8 13.1046 8 12C8 10.8954 7.10457 10 6 10C4.89543 10 4 10.8954 4 12C4 13.1046 4.89543 14 6 14ZM17 8C18.1046 8 19 7.10457 19 6C19 4.89543 18.1046 4 17 4C15.8954 4 15 4.89543 15 6C15 7.10457 15.8954 8 17 8ZM17 20C18.1046 20 19 19.1046 19 18C19 16.8954 18.1046 16 17 16C15.8954 16 15 16.8954 15 18C15 19.1046 15.8954 20 17 20Z" fill="white" fill-opacity="0.3"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="das-form-container">
                            <div class="row mt-3">
                                <div id="das-container-placeholder">
                                    <div class="das-animated-background">
                                        <div class="background-masker"></div>
                                    </div>
                                </div>
                                <div class="das-form-data" id="das-container"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="col-md-4 mb-30">
            <!-- Followers Card -->
            <div class="row">
                <div class="col-md-12 mb-15">
                    <div class="card-box height-100-p metric-card">
                        <h2 class="weight-500 font-14">FOLLOWERS <span id="followersDate">SINCE <?= isset($_SESSION['joinyear']) ? $_SESSION['joinyear'] : '' ?></span></h2>
                        <div class="d-flex flex-wrap align-items-center metric-content">
                            <div class="widget-data main-metric das">
                                <div class="large-number">0.00</div>
                                <div class="trend-box-followers-positive">
                                    <div class="trend followers-positive">+44 
                                        <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 11L6.5 5.5L10.2727 9.66667L18 1" stroke="#03D973" stroke-width="1.5"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Income Card -->
            <div class="row mt-4">
                <div class="col-md-12 mb-15">
                    <div class="card-box height-100-p metric-card">
                        <h2 class="weight-500 font-14">TOTAL INCOME <span id="totalIncomeDate">SINCE <?= isset($_SESSION['joinyear']) ? $_SESSION['joinyear'] : '' ?></span></h2>
                        <div class="d-flex flex-wrap align-items-center metric-content">
                            <div class="widget-data main-metric das">
                                <div class="large-number">$0.00</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Last Month Income Card -->
            <div class="row mt-4">
                <div class="col-md-12 mb-15">
                    <div class="card-box height-100-p metric-card">
                        <h2 class="weight-500 font-14">LAST MONTH INCOME <span id="LastMonthDate">AUGUST</span></h2>
                        <div class="d-flex flex-wrap align-items-center metric-content">
                            <div class="widget-data main-metric das">
                                <div class="large-number">$0.00</div>
                                <div class="trend-box-lmi-negative">
                                    <div class="trend lmi-negative">-10 
                                        <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 1L6.5 6.5L10.2727 2.33333L18 11" stroke="#E45263" stroke-width="1.5"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-1">
         <!-- Income Chart Card -->
            <div class="col-md-6 mb-30">
                <div class="card-box widget-style height-100-p">
                        <div class="widget-data">
                            <div class="weight-500 font-14">
                                INCOME <span id="currentDateIncome"></span>
                                <div class="h4 mb-0" id="currentIncome">$0.00</div>
                                <select class="das-select income-charts" onchange="generate_income_charts_onchange()">
                                    <option value="monthly" selected>Monthly</option>
                                    <option value="weekly">Weekly</option>
                                    <option value="yearly">Yearly</option>
                                </select>
                            </div>
                            <div class="text-success">40% 
                                <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 11L6.5 5.5L10.2727 9.66667L18 1" stroke="#03D973" stroke-width="1.5"/>
                                </svg>
                            </div>
                        </div>
                        <div class="progress-data" style="width: 100%; height: 200px;">
                            <canvas id="incomeChart"></canvas>
                        </div>
                </div>
            </div>

            <!-- Users Chart Card -->
            <div class="col-md-6 mb-30">
                <div class="card-box widget-style height-100-p">
                        <div class="widget-data">
                            <div class="weight-500 font-14">
                                USERS <span id="currentDate"></span>
                            </div>
                            <div class="h4 mb-0" id="currentUsers">0.00</div>
                            <select class="das-select users-charts" onchange="generate_users_charts_onchange()">
                                <option value="monthly" selected>Monthly</option>
                                <option value="weekly">Weekly</option>
                                <option value="yearly">Yearly</option>
                            </select>
                            <div class="text-success">+71 
                                <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 11L6.5 5.5L10.2727 9.66667L18 1" stroke="#03D973" stroke-width="1.5"/>
                                </svg>
                            </div>
                        </div>
                        <div class="progress-data" style="width: 100%; height: 200px;">
                            <canvas id="UsersChart"></canvas>
                        </div>
                </div>
            </div>
     </div>



