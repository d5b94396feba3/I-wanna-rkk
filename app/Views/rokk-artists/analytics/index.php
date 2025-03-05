<style>

#main-footer {
    margin: 0px 55px 0px 111px !important;
}

#pro-content-placeholder {
    width: 100%;
    background: linear-gradient(to right, rgba(40, 40, 40, 0) 47.82%, rgba(17, 17, 17, 0) 100%);
    background-size: 100% 100%, 100% 100%, contain;
    background-position: right center;
    border-radius: 15px;
    color: #FFFFFFCC;
    margin: -47px 0 0 0px;
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

.pro-animated-background {
    animation-duration: 2.6s;
    animation-fill-mode: forwards;
    animation-iteration-count: infinite;
    animation-name: placeHolderShimmer;
    animation-timing-function: linear;
    background: linear-gradient(to right, #141414 0%, rgb(17 17 17 / 95%) 100%);
    background-size: 200% 100%;
    height: 625px !important;
    border-radius: 1px;
    position: relative;
}

.pro-right-sidebar {
    overflow-y: hidden;
    background: rgba(30, 30, 30, 0.67);
    margin-top: 15px;
    padding: 35px 30px 30px 30px;
    overflow-x: hidden;
    height: 13vh !important;
    border-radius: 10px;
    margin-left: 12px;
    width: 97.5%;
}

.pro-selected-menu-container {
    padding-left: 35px;
}

.main-container p {
    line-height: 1.6rem;
    color: #888;
    font-size: 15px;
}
span.note {
    color: #ff9900;
}
.analytics-header {
    padding: 0px 0;
    margin-bottom: 0px;
    margin-top: 0px;
    overflow-x: auto;
}

.analytics-nav {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    list-style-type: none;
    padding: 0;
    margin: 0;
    flex-wrap: nowrap;
    min-width: max-content;
}

.analytics-nav-item {
    margin-right: 10px;
    border: 1px solid #292626;
    border-radius: 65px;
    flex-shrink: 0;
}

.analytics-nav-link {
    display: inline-block;
    padding: 8px 16px;
    border-radius: 20px;
    color: #888;
    text-decoration: none;
    font-size: 13px;
    transition: background-color 0.3s, color 0.3s;
    white-space: nowrap;
}

.analytics-nav-link:hover,
.analytics-nav-link.active {
    background-color: #333;
    color: #fff;
}

.analytics-nav-link.active {
    background-color: #333;
    color: #ff8303;
}

/* Media query for smaller screens */
@media (max-width: 768px) {
    .analytics-nav-link {
        padding: 6px 12px;
        font-size: 12px;
    }
    #main-footer {
        margin: 0px 0px 0px 0px !important;
    }
}

/* Base styles for panels */
.tab-panel {
    transition: all 0.3s ease;
}

/* Optional: Add responsive behavior */
@media (max-width: 768px) {
    .tab-panel {
        width: 100% !important;
    }
}

</style>


<!-- das -->


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
    .Listeners-chart-link a{
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
    #currentDate, #currentDateIncome, #totalIncomeDate, #ListenersDate, #LastMonthDate {
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

    .trend-box-Listeners-positive{
        background: #4caf500f;
        padding: 13px 30px;
        border-radius: 13px;
        width: 50px;
        margin-top: -48px;
        margin-left: -3px;
        float: right;
    }

    .Listeners-negative {
        color: #f44336;
        bottom: 0;
        top: 80px;
        right: 31px;
    }
    .Listeners-positive {
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


@media (max-width: 768px) {
    .das-container-height {
        height: 750px !important;
    }
    .mrt-25{
        margin-top: 25px;
    }
}

</style>

<script src="<?= base_url('assets/src/js/analytics/tab-panels.js') ?>"></script>
<script src="<?= base_url('assets/src/js/analytics/index.js') ?>"></script>
<script src="<?= base_url('assets/src/js/analytics/income-charts.js') ?>"></script>
<script src="<?= base_url('assets/src/js/analytics/users-charts.js') ?>"></script>
<script src="<?= base_url('assets/src/js/analytics/alert.js') ?>"></script>

<script type="text/javascript">

    function load_artist_stats_data_OnPageLoad() {
        var url = '<?= base_url('Analytics/ajax_artist_stats_data_onPageLoad') ?>';
        // Get CSRF token values
        var csrfName ="<?= csrf_token() ?>";
        var csrfValue ="<?= csrf_hash() ?>";

        $.ajax({
            url: url,
            type: 'GET',
            data:{
                [csrfName]:csrfValue
            },
            timeout:20000, // 20 seconds
            beforeSend: function (jqXHR) {
                $('.profile-details-btn').addClass('menu-active');
            },
            success: function(response){
                var html = response;
                $('#ajax_loader').fadeOut("slow");
                $('#pro-content-placeholder').hide(); 
                $('.pro-selected-menu-container').html(html);
            },
            error: function(xhr, status, error) {
                // Handle AJAX errors
                $('#pro-content-placeholder').hide();
                $('.pro-selected-menu-container').html('An error occurred while processing your request. Please refresh and try again.');
                console.log('Error submitting form:', error);
            },
            dataType: 'text'  
        });
    }
</script>

<div class="main-container">
    <div class="analytics-header">
        <nav>
            <ul class="analytics-nav" role="tablist">
                <li class="analytics-nav-item">
                    <a href="#" class="analytics-nav-link active" 
                       data-target="all" 
                       data-layout="grid" 
                       role="tab">All</a>
                </li>
               
                <li class="analytics-nav-item">
                    <a href="#" class="analytics-nav-link" 
                       data-target="2" 
                       data-layout="grid" 
                       role="tab">Streams</a>
                </li>
                <li class="analytics-nav-item">
                    <a href="#" class="analytics-nav-link" 
                       data-target="3" 
                       data-layout="grid" 
                       role="tab">Listeners</a>
                </li>
                <li class="analytics-nav-item">
                    <a href="#" class="analytics-nav-link" data-target="4" data-layout="full" role="tab">Income</a>
                </li>
                <li class="analytics-nav-item">
                       <a href="#" class="analytics-nav-link" data-target="5" data-layout="full"  role="tab">Direct Artist Support</a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Content for each tab -->
    <div class="tab-content" role="tabpanel">
        <div class="row mt-4">
            <!-- Total Income Card -->
            <div class="col-md-4 mb-15 tab-panel tab-idx-1">
                    <div class="card-box height-100-p metric-card">
                        <h2 class="weight-500 font-14">TOTAL INCOME <span id="totalIncomeDate">SINCE <?= isset($_SESSION['joinyear']) ? $_SESSION['joinyear'] : '' ?></span></h2>
                        <div class="d-flex flex-wrap align-items-center metric-content">
                            <div class="widget-data main-metric das">
                                <div class="large-number">$0.00</div>
                            </div>
                        </div>
                    </div>
            </div>

            <!-- Last Month Income Card -->
            <div class="col-md-4 mb-15 tab-panel tab-idx-2">
                    <div class="card-box height-100-p metric-card">
                        <h2 class="weight-500 font-14">LAST MONTH INCOME <span id="LastMonthDate">AUGUST</span></h2>
                        <div class="d-flex flex-wrap align-items-center metric-content">
                            <div class="widget-data main-metric das">
                                <div class="large-number">$0.00</div>
                                <div class="trend-box-lmi-negative">
                                    <div class="trend lmi-negative">0 
                                        <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 1L6.5 6.5L10.2727 2.33333L18 11" stroke="#E45263" stroke-width="1.5"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <!-- Listeners Card -->
            <div class="col-md-4 mb-15 tab-panel tab-idx-3">
                    <div class="card-box height-100-p metric-card">
                        <h2 class="weight-500 font-14">Listeners <span id="ListenersDate">SINCE <?= isset($_SESSION['joinyear']) ? $_SESSION['joinyear'] : '' ?></span></h2>
                        <div class="d-flex flex-wrap align-items-center metric-content">
                            <div class="widget-data main-metric das">
                                <div class="large-number">0.00</div>
                                <div class="trend-box-Listeners-positive">
                                    <div class="trend Listeners-positive">0 
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

        <div class="row mt-4">
            <!-- Income Chart Card -->
            <div class="col-md-6 mb-30 mrt-25 tab-panel tab-idx-4">
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
                            <div class="text-success">0% 
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
            <div class="col-md-6 mb-30 mrt-25 tab-panel tab-idx-5">
                    <div class="card-box widget-style height-100-p">
                        <div class="widget-data">
                            <div class="weight-500 font-14">
                                DIRECT ARTIST SUPPORT <span id="currentDate"></span>
                            </div>
                            <div class="h4 mb-0" id="currentUsers">0.00</div>
                            <select class="das-select users-charts" onchange="generate_users_charts_onchange()">
                                <option value="monthly" selected>Monthly</option>
                                <option value="weekly">Weekly</option>
                                <option value="yearly">Yearly</option>
                            </select>
                            <div class="text-success">0 
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
        <div class="row mt-3">
            <div class="col-md-12 col-lg-12 col-sm-12 pro-right-sidebar">
                <div class="note-container"><p><span class="note">Note:</span> After the first few months of our service, all your analytics such as the number of plays, the distribution of your plays across the individual territories etc. will be displayed here.</p></div>
            </div>
        </div>
    </div>
</div>
