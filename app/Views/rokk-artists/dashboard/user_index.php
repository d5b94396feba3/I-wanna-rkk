<style type="text/css">

    /* #dashboard-footer {
        margin: 60px 0px -25px 0px;
    } */

    .card-box{
        background: rgba(30, 30, 30, 0.67);
        padding: 30px 0px 35px 25px;
        border-radius: 16px;
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
        color: #4caf50;
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
    #currentDate, #currentDateIncome {
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

    .trend,
    .trend-das {
        position: absolute;
        top: 20px;
        right: 20px;
        font-size: 14px;
        font-weight: bold;
    }

    .trend-box-das{
        background: #4caf500f;
        padding: 13px 30px;
        border-radius: 13px;
        width: 50px;
        margin-top: -48px;
        margin-left: -3px;
        float: right;
    }

    .trend.positive {
        color: #4caf50;
        bottom: 0;
        left: 7px;
        top: 104px;
        font-size: 12px;
    }

    .trend-box-followers{
        background: #f443361a;
        padding: 13px 30px;
        border-radius: 13px;
        width: 50px;
        margin-top: -48px;
        margin-left: -3px;
        float: right;
    }

    .trend.negative {
        color: #f44336;
        bottom: 0;
        top: 146px;
        right: 31px;
    }

    .trend-das.positive {
        color: #4caf50;
        bottom: 0;
        top: 146px;
        right: 31px;
    }


    .followers-metric .large-number{
        margin-top: 64px;
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
}
/* placeholder style */
#right-stats-placeholder {
    width: 98.5%;
    background: linear-gradient(to right, rgba(40, 40, 40, 0) 47.82%, rgba(17, 17, 17, 0) 100%);
    background-size: 100% 100%, 100% 100%, contain;
    background-position: right center;
    border-radius: 15px;
    color: #FFFFFFCC;
    margin-top: 0px;
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
}
.right-stats-animated-background {
    animation-duration: 2.6s;
    animation-fill-mode: forwards;
    animation-iteration-count: infinite;
    animation-name: placeHolderShimmer;
    animation-timing-function: linear;
    background: linear-gradient(to right, #141414 0%, rgb(17 17 17 / 95%) 100%);
    background-size: 200% 100%;
    height: 350px !important;
    border-radius: 1px;
    position: relative;
}

@media  screen and (max-width:768px) {
    .track-container {
        margin-top: 28px;
    }

    #dashboard-footer {
        margin: 0px 0px 0px 0px !important;
    }
}

</style>


<script src="<?= base_url('assets/src/js/dashboard/listeners-charts.js') ?>"></script>
<script src="<?= base_url('assets/src/js/dashboard/income-charts.js') ?>"></script>
<script src="<?= base_url('assets/src/js/dashboard/alert.js') ?>"></script>

<script type="text/javascript">
  

    $(document).ready(function () {

        // Creating an array of promises for each AJAX request
        const promises = [
            generate_listeners_charts_on_page_load(),
            generate_income_charts_on_page_load(),
            get_artist_top_tracks_on_page_load()
        ];

        // Wait for all AJAX requests to complete before hiding the loader
        Promise.all(promises)
            .then(() => {
                $("#ajax_loader").fadeOut("slow");
            })
            .catch((error) => {
                console.log("Error:", error);
            });

    });


    function get_artist_top_tracks_on_page_load() {

        var url = '<?= base_url('MusicRelease/ajax_artist_top_track_stats') ?>';

        $.ajax({
        url: url,
        type: 'GET',
        timeout:20000, // 20 seconds
        beforeSend: function (jqXHR) {
            $('.release-table-content').empty();
            $('#right-stats-placeholder').show();
        },
        success: function(response){
            var topTracks=response.topTracks;
            var topPlaylists=response.topPlaylists;
            var topAlbums=response.topAlbums;
            $('.top-tracks-content').html(topTracks);
            $('.top-playlists-content').html(topPlaylists);
            $('.top-albums-content').html(topAlbums);
        },
        error: function(xhr, status, error) {
            // Handle AJAX errors
            $('#right-stats-placeholder').hide();
            window.show_error_msg('An error occurred while processing your request. Please refresh and try again.');
            console.error('Error submitting form:', error);
        },
        dataType: 'json'
        });
    }


</script>



<div class="main-container">

    <div class="row">
        <!-- Chart 1 - Connected Accounts -->
        <div class="col-md-8 mb-30">
                <div class="row">
                    <!-- Row 1 -->
                    <div class="col-md-12 mb-30">
                    <div class="card-box widget-style ">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="widget-data">
                                <div class="weight-500 font-14">MONTHLY LISTENERS 
                                    <span id="currentDate"></span>
                                </div>
                                <div class="h4 mb-0" id="currentListeners">0.000</div>
                                <div class="chart-link"> <a href="#"><i class="ri-arrow-right-up-line"></i></a></div>
                                <div class="text-success">+71 <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M1 11L6.5 5.5L10.2727 9.66667L18 1" stroke="#03D973" stroke-width="1.5"/></svg></div>
                                </div>
                                <div class="progress-data" style="width: 100%; height: 200px;">
                                <canvas id="listenersChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row 2 -->
                <div class="row">
                    <div class="col-md-6 mb-30 mt-4">
                        <!-- <div class="card-box metric-card">
                            <h2 class="weight-500 font-14">DIRECT ARTIST SUPPORT</h2>
                            
                            <div class="d-flex flex-wrap align-items-center metric-content">
                                <div class="widget-data main-metric das-user-count">
                                    <div class="large-number">0</div>
                                    <div class="metric-label">Users</div>
                                    <div class="trend-box-das">
                                    <div class="trend positive">+2 <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 11L6.5 5.5L10.2727 9.66667L18 1" stroke="#03D973" stroke-width="1.5"/>
                                    </svg></div></div>
                                </div>
                                <div class="widget-data secondary-metric">
                                    <div class="large-number">0</div>
                                    <div class="metric-label">Test User</div>
                                </div>
                                <div class="metric-chart-link"><a href="#"> <i class="ri-arrow-right-up-line"></i></a></div>
                            </div>
                        </div> -->

                        <div class="card-box  metric-card">
                            <h2 class="weight-500 font-14">DIRECT ARTIST SUPPORT</h2>
                            <div class="d-flex flex-wrap align-items-center metric-content">
                                <div class="widget-data main-metric followers-metric">
                                    <div class="large-number">0.00</div>
                                    <div class="trend-box-das">
                                    <div class="trend-das positive">
                                       +2 <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 11L6.5 5.5L10.2727 9.66667L18 1" stroke="#03D973" stroke-width="1.5"/>
                                    </svg>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="followers-chart-link"><a href="#"> <i class="ri-arrow-right-up-line"></i></a></div>
                        </div>
                        
                    </div>
                    <div class="col-md-6 mb-30 mt-4">
                        <div class="card-box  metric-card">
                            <h2 class="weight-500 font-14">FOLLOWERS</h2>
                            <div class="d-flex flex-wrap align-items-center metric-content">
                                <div class="widget-data main-metric followers-metric">
                                    <div class="large-number">0.00</div>
                                    <div class="trend-box-followers">
                                    <div class="trend negative">-10 <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L6.5 6.5L10.2727 2.33333L18 11" stroke="#E45263" stroke-width="1.5"/>
                                        </svg>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="followers-chart-link"><a href="#"> <i class="ri-arrow-right-up-line"></i></a></div>
                        </div>
                    </div>
                </div>
                <!-- Row 3 -->
                <div class="row mt-4">
                    <!-- Row 1 -->
                    <div class="col-md-12 mb-30">
                    <div class="card-box widget-style ">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="widget-data">
                                <div class="weight-500 font-14">INCOME
                                    <span id="currentDateIncome"></span>
                                </div>
                                <div class="h4 mb-0" id="currentIncome">$0.00</div>
                                <div class="chart-link"><a href="#"> <i class="ri-arrow-right-up-line"></i></a></div>
                                <div class="text-success">40% <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 11L6.5 5.5L10.2727 9.66667L18 1" stroke="#03D973" stroke-width="1.5"/>
                                </svg>
                            </div>
                            </div>
                            <div class="progress-data" style="width: 100%; height: 200px;">
                                <canvas id="incomeChart"></canvas>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
        </div>

    <!-- Chart 2 - Releases -->
    <div class="col-md-4 mb-30">
    <!-- row 1 -->

    <div class="track-container">

        <div class="top-tracks-content">

        <div id="right-stats-placeholder">
            <div class="right-stats-animated-background">
                <div class="background-masker"></div>
            </div>
        </div>

        </div>

        <div class="top-playlists-content">

        <div id="right-stats-placeholder">
            <div class="right-stats-animated-background">
                <div class="background-masker"></div>
            </div>
        </div>

        </div>

        <div class="top-albums-content">

        <div id="right-stats-placeholder">
            <div class="right-stats-animated-background">
                <div class="background-masker"></div>
            </div>
        </div>

        </div>

    </div>

    </div>

</div>
