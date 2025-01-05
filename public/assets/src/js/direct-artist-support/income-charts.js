// Declare the chart variable globally
var incomeChart;
const currentDate=new Date();
const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
const days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];

$(document).ready(function() {

    window.generate_income_charts_on_page_load();    
    // Update current date and users count
    // const currentDate = new Date();
    const options = { year: 'numeric', month: 'short' };
    const formattedDate =currentDate.toLocaleDateString('en-US', options).replace(/(\w+)\s(\d+)/, '$1, $2').toUpperCase();
    document.getElementById('currentDate').textContent =formattedDate;
    document.getElementById('currentDateIncome').textContent = formattedDate;
    document.getElementById('LastMonthDate').textContent = currentDate.toLocaleDateString('en-US', { month: 'long' });
    
    // document.getElementById('currentIncome').textContent = '$197,50';

});

window.generate_income_charts_on_page_load=function(){
    const currentMonthIndex = currentDate.getMonth();
    var chart_labels = months.slice(0, currentMonthIndex + 1);
    var fullYearData = [4, 9, 2, 5.5, 10.5, 19, 4, 9, 12, 4.5, 11.5, 0];
    var data = fullYearData.slice(0, currentMonthIndex + 1);

    generate_income_charts_by_user_selected_option(chart_labels, data);
}

window.generate_income_charts_onchange=function (){
    var selected_income_charts=$('.income-charts').val();
    var chart_labels=[];
    var data=[];
    if(selected_income_charts=='yearly'){
        const currentYear = new Date().getFullYear();
        chart_labels = [
            currentYear - 4,
            currentYear - 3,
            currentYear - 2,
            currentYear - 1,
            currentYear
        ];
        data = [15, 30, 45, 60, 0];
    }
    else if(selected_income_charts=='monthly'){
        const currentMonthIndex = currentDate.getMonth();
        chart_labels = months.slice(0, currentMonthIndex + 1);
        var fullYearData = [4, 9, 2, 5.5, 10.5, 19, 4, 9, 12, 0, 11.5, 7];
        data = fullYearData.slice(0, currentMonthIndex + 1);
        
    }else if(selected_income_charts=='weekly'){
        chart_labels = days;
        data = [3, 5, 4, 6, 8, 10, 0];
    }
    console.log("generate_income_charts_onchange(): " + selected_income_charts); 

    generate_income_charts_by_user_selected_option(chart_labels, data);
}
    
window.generate_income_charts_by_user_selected_option = function (chart_labels, data){
    
    // INCOME CHART
    var ctx = document.getElementById('incomeChart').getContext('2d');
    var gradient = ctx.createLinearGradient(0, 0, 0, 0);

    gradient.addColorStop(0, 'rgba(255, 131, 3, 0.2)');
    gradient.addColorStop(1, 'rgba(255, 131, 3, 0)');

    // Destroy existing chart if it exists
    if (incomeChart) {
        incomeChart.destroy();
    }

    incomeChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: chart_labels,
            datasets: [{
                data: data,
                backgroundColor: gradient,
                borderColor: '#FF8303',
                borderWidth: 2,
                pointRadius: 4,
                pointBackgroundColor: '#FF8303',
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
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed.y !== null) {
                                label += new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(context.parsed.y);
                            }
                            return label;
                        }
                    }
                }
            },
            hover: {
                mode: 'nearest',
                intersect: true
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
                        callback: function(value) {
                            return '$' + value;
                        }
                    }
                }
            }
        }
    });

    
}