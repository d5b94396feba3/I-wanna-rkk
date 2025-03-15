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

.progress-data {
    margin-top: 0px;
}
#releaseDate, #releaseDateIncome, #totalIncomeDate, #followersDate, #LastMonthDate {
    color: rgba(255,255,255,0.2);
    padding-left: 10px;
    font-weight: 400 !important;
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
#release-tbl-container-placeholder {
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
.release-tbl-animated-background {
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

/* mobile responsiveness */

@media (max-width: 868px){
    .mmt-24{
        margin-top: 24px;
    }
    #dashboard-footer {
        margin: 0px 0px 0px 0px !important;
    }
}

</style>


<script>
// Initialize release_info for chart.js
// This object holds information about the artist's releases, including their ID, counts of releases in different statuses, and the total number of releases.
window.release_info = {
    artist_id: null, // The ID of the artist
    publish_count: <?php echo $publish_count; ?>, // The number of published releases
    pending_count: <?php echo $pending_count; ?>, // The number of pending releases
    draft_count: <?php echo $draft_count; ?>, // The number of draft releases
    artist_release: <?php echo json_encode(empty($artist_release) ? 0 : count($artist_release)); ?> // The total number of releases by the artist
};

</script>

<script src="<?= base_url('assets/src/js/music-upload/releases/index.js') ?>"></script>
<script src="<?= base_url('assets/src/js/music-upload/releases/search-idx.js') ?>"></script>
<script src="<?= base_url('assets/src/js/music-upload/releases/alert.js') ?>"></script>
<script src="<?= base_url('assets/src/js/music-upload/releases/event-listeners.js') ?>"></script>

<div class="main-container">

    <div class="row">

        <div class="col-md-6 col-sm-12">
            <div class="row">
                <!-- Row 3 -->
                <div class="col-md-12 col-sm-12 mb-30">
                    <div class="card-box widget-style height-100-p">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <div class="widget-data d-flex flex-column justify-content-center left-release-data">
                                <div class="weight-700 font-14">
                                    Releases
                                    <span id="releaseDate">SINCE <?= session()->get('joinyear') ?></span>
                                </div>
                                <div class="h4 mb-0" id="currentUsers">
                                    <?= empty($artist_release) ? 0 : count($artist_release); ?>
                                </div>
                            </div>
                            <div class="progress-data right-release-data">
                                <canvas id="ReleasesChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- right colunm 2-->
        <div class="col-md-6 col-sm-12  mb-30">
            <!-- row 1 -->
            <div class="row">
                <div class="col-md-4 col-sm-4 col-lg-4 mb-15 mmt-24">
                    <div class="card-box height-100-p metric-card">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="weight-700 font-14 mb-0">Published</h2>
                            <div class="large-number published-number"><?php echo $publish_count; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-lg-4 mb-15 mmt-24">
                    <div class="card-box height-100-p metric-card">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="weight-700 font-14 mb-0">Pending</h2>
                            <div class="large-number pending-number"><?php echo $pending_count; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-lg-4 mb-15 mmt-24">
                    <div class="card-box height-100-p metric-card">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="weight-700 font-14 mb-0">Draft</h2>
                            <div class="large-number draft-number"><?php echo $draft_count; ?></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- row 2 -->
            <div class="row mt-4">
                <div class="col-md-12 col-sm-12 mb-15">
                    <div class="card-box height-100-p metric-card">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="weight-700 font-14 mb-0">Create Release</h2>
                            <a href="<?php echo base_url("create_release"); ?>"><div class="add-btn">+</div></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="separator"></div>

    <div class="search-container">
        <div class="search-filter-wrapper">
            <div class="search-input">
                <i class="fas fa-search"></i>
                <input type="text" id="search" placeholder="Search releases..." onkeyup="search_filter()">
            </div>
            <div class="filter-select" onchange="search_filter()">
                <select id="filterBy">
                    <option value="">Filter by</option>
                    <option value="Published">Published</option>
                    <option value="Pending">Pending</option>
                    <option value="Draft">Draft</option>
                </select>
            </div>
        </div>
    </div>

    <div class="release-table-container">

        <div id="release-tbl-container-placeholder">
                <div class="release-tbl-animated-background">
                    <div class="background-masker"></div>
                </div>
        </div>

        <div class="release-table-content">
          
        </div>

    </div>

</div>



<!-- Chart.js script for visualizing release metrics and statistics -->
<script src="<?= base_url('assets/src/js/music-upload/releases/chart.js') ?>"></script>
