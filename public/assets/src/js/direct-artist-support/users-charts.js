// Declare the chart variable globally
var UsersChart;
// let currentDate=new Date();
// let months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
// let days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
// var maxValue = 0;

$(document).ready(function() {

    // Update current date and users count
    // const currentDate = new Date();
    const options = { year: 'numeric', month: 'short' };
    const formattedDate =currentDate.toLocaleDateString('en-US', options).replace(/(\w+)\s(\d+)/, '$1, $2').toUpperCase();
    document.getElementById('LastMonthDate').textContent = currentDate.toLocaleDateString('en-US', { month: 'long' });

});

window.generate_users_charts_on_page_load = function(){
    const currentMonthIndex = currentDate.getMonth();
    var chart_labels = months.slice(0, currentMonthIndex + 1);
    var fullYearData = Array.from({length: 12}, () => Math.floor(Math.random() * 0) + 0);
    var data = fullYearData.slice(0, currentMonthIndex + 1);
    maxValue = Math.max(...data);
    // var current_date = months[currentDate.getMonth()];
    generate_users_charts_by_user_selected_option(chart_labels, data, maxValue);
}

window.generate_users_charts_onchange=function(){
    var selected_users_charts=$('.users-charts').val();
    var chart_labels=[];
    var data=[];
    var current_date;
    if(selected_users_charts=='yearly'){
        const currentYear = new Date().getFullYear();
        chart_labels = [
            currentYear - 4,
            currentYear - 3,
            currentYear - 2,
            currentYear - 1,
            currentYear
        ];
        data = [15, 30, 45, 60, 2];
        maxValue = Math.max(...data);
    }
    else if(selected_users_charts=='monthly'){
        const currentMonthIndex = currentDate.getMonth();
        chart_labels = months.slice(0, currentMonthIndex + 1);
        var fullYearData = Array.from({length: 12}, () => Math.floor(Math.random() * 0) + 0);;
        data = fullYearData.slice(0, currentMonthIndex + 1);
        current_date = months[currentDate.getMonth()];
        maxValue = Math.max(...data);
        
    }else if(selected_users_charts=='weekly'){
        const currentDayIndex = currentDate.getDay();
        const currentDay = days[currentDayIndex === 0 ? 6 : currentDayIndex - 1]; 
        chart_labels = days;
        data = [3, 5, 4, 6, 8, 10, 2];
        maxValue = Math.max(...data);

    }
    console.log("generate_users_charts(): " + selected_users_charts); 

    generate_users_charts_by_user_selected_option(chart_labels, data,maxValue);
}


window.generate_users_charts_by_user_selected_option =function (chart_lables,data,maxValue){

    // USERS CHART
    var ctx = document.getElementById('UsersChart').getContext('2d');

    // Destroy existing chart if it exists
    if (UsersChart) {
        UsersChart.destroy();
    }

    UsersChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: chart_lables,
            datasets: [{
                data: data,
                backgroundColor: function(context) {
                    var index = context.dataIndex;
                    var value = context.dataset.data[index];
                    return value === maxValue ? '#FF8303' : '#3E3E3E';
                },
                borderColor: 'transparent',
                borderWidth: 0,
                borderRadius: 3,
                barPercentage: 0.6,
                categoryPercentage: 0.8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                    callbacks: {
                        label: function(context) {
                            return context.parsed.y.toFixed(3).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                        }
                    }
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        color: '#999',
                        font: {
                            size: 10
                        }
                    }
                },
                y: {
                    grid: {
                        color: 'rgba(255,255,255,0.1)',
                        drawBorder: false
                    },
                    ticks: {
                        color: '#999',
                        beginAtZero: true,
                        max: 25,
                        stepSize: 5,
                        font: {
                            size: 10
                        },
                        padding: 10
                    }
                }
            },
            layout: {
                padding: {
                    top: 20,
                    right: 20,
                    bottom: 0,
                    left: 0
                }
            }
        }
    });

}