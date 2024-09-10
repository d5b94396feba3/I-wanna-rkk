<style type="text/css">

    .card-box{
/*        background: #282828;*/
        background: linear-gradient(0deg, #111 100%, rgba(0, 0, 0, 0) 27.82%), linear-gradient(0deg, #0b0b0b, #282828);
        padding: 30px 0px 35px 25px;
    }
    .main-container {
        padding: 45px 37px 30px 37px;
        height: 55vh;
    }
    .col-xl-4.mb-30.mt-4.chart4 {
        margin-top: 26px !important;
    }

</style>

<div class="heading">
        <h2>Artist Dashboard</h2>
        <p>Welcome to the Artist dashboard.</p>
</div>

<div class="main-container">

    <div class="row">
        <!-- Chart 1 - Connected Accounts -->
        <div class="col-xl-4 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data">
                        <canvas id="chart1" width="120" height="120"></canvas>
                    </div>
                    <div class="widget-data">
                        <div class="h4 mb-0">0</div>
                        <div class="weight-600 font-14">Connected Accounts</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart 2 - Releases -->
        <div class="col-xl-4 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data">
                        <canvas id="chart2" width="120" height="120"></canvas>
                    </div>
                    <div class="widget-data">
                        <div class="h4 mb-0">0</div>
                        <div class="weight-600 font-14">Releases</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart 3 - Tracks -->
        <div class="col-xl-4 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data">
                        <canvas id="chart3" width="120" height="120"></canvas>
                    </div>
                    <div class="widget-data">
                        <div class="h4 mb-0">0</div>
                        <div class="weight-600 font-14">Tracks</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart 4 - Active Accounts -->
        <div class="col-xl-4 mb-30 mt-4 chart4">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data">
                        <canvas id="chart4" width="120" height="120"></canvas>
                    </div>
                    <div class="widget-data">
                        <div class="h4 mb-0">0</div>
                        <div class="weight-600 font-14">Active Accounts</div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<!-- <div class="row mt-5">
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data">
                        <canvas id="chart5" width="120" height="120"></canvas>
                    </div>
                    <div class="widget-data">
                        <div class="h4 mb-0">0</div>
                        <div class="weight-600 font-14">Connected Accounts</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data">
                        <canvas id="chart6" width="120" height="120"></canvas>
                    </div>
                    <div class="widget-data">
                        <div class="h4 mb-0">0</div>
                        <div class="weight-600 font-14">Releases</div>
                    </div>
                </div>
            </div>
        </div>
</div> -->


</div>


<script>
    // Dummy data for charts
    var data1 = {
        labels: ["Accounts"],
        datasets: [{
            data: [100],
            backgroundColor: ["#FFD700"],
        }],
    };

    var data2 = {
        labels: ["Releases"],
        datasets: [{
            data: [100],
            backgroundColor: ["#FFA500"],
        }],
    };

    var data3 = {
        labels: ["Tracks"],
        datasets: [{
            data: [100],
            backgroundColor: ["#FF8C00"],
        }],
    };

    var data4 = {
        labels: ["Active"],
        datasets: [{
            data: [100],
            backgroundColor: ["#CC5500"],
        }],
    };

    // Chart configuration
    var options = {
        cutoutPercentage: 50, 
        legend: {
            display: false,
        },
    };

    // Create charts
    var ctx1 = document.getElementById("chart1").getContext("2d");
    var ctx2 = document.getElementById("chart2").getContext("2d");
    var ctx3 = document.getElementById("chart3").getContext("2d");
    var ctx4 = document.getElementById("chart4").getContext("2d");

    new Chart(ctx1, {
        type: "doughnut",
        data: data1,
        options: options,
    });

    new Chart(ctx2, {
        type: "doughnut",
        data: data2,
        options: options,
    });

    new Chart(ctx3, {
        type: "doughnut",
        data: data3,
        options: options,
    });

    new Chart(ctx4, {
        type: "doughnut",
        data: data4,
        options: options,
    });
</script>