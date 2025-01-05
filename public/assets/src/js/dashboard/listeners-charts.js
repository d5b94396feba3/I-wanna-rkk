$(document).ready(function() {

// LISTENERS CHART
var ctx = document.getElementById('listenersChart').getContext('2d');
var gradient = ctx.createLinearGradient(0, 0, 0, 200);
gradient.addColorStop(0, 'rgba(255, 131, 3, 0.98)');
gradient.addColorStop(1, 'rgba(0, 0, 0, 0)');
const currentDate=new Date();
const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
var maxValue = 0;
var listenersChart;

// Define the function globally
window.generate_listeners_charts_on_page_load = function() {
    const currentMonthIndex = currentDate.getMonth();
    var chart_labels = months.slice(0, currentMonthIndex + 1);
    // var fullYearData = [1000, 1500, 2000, 2500, 3000, 3500, 4000, 4500, 5000, 5500, 6000, 6500];
    var fullYearData = Array.from({length: 12}, () => Math.floor(Math.random() * 6500) + 500);
    var data = fullYearData.slice(0, currentMonthIndex + 1);
    maxValue = Math.max(...data);
    // var current_date = months[currentDate.getMonth()];
    generate_listeners_charts(chart_labels, data);
}

function generate_listeners_charts(chart_labels, data){

    // Destroy existing chart if it exists
    if (listenersChart) {
        listenersChart.destroy();
    }

    listenersChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: chart_labels,
            datasets: [{
                data: data,
                backgroundColor: gradient,
                borderColor: '#FF8303',
                borderWidth: 2,
                pointRadius: 0,
                fill: 'start',
                tension: 0.4
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
                        color: 'rgba(255,255,255,0.1)'
                    },
                    ticks: {
                        color: '#999'
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
                        max: 50,
                        stepSize: 10,
                        callback: function(value) {
                            return value.toFixed(0);
                        }
                    }
                }
            }
        }
    });
}


// Update current date and income
const options = { year: 'numeric', month: 'long', day: 'numeric' };
document.getElementById('currentDate').textContent = currentDate.toLocaleDateString('en-US', options).toUpperCase();

});