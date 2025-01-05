$(document).ready(function() {

    // INCOME CHART
    var ctx = document.getElementById('incomeChart').getContext('2d');
    var gradient = ctx.createLinearGradient(0, 0, 0, 0);

    gradient.addColorStop(0, 'rgba(255, 131, 3, 0.2)');
    gradient.addColorStop(1, 'rgba(255, 131, 3, 0)');
    const currentDate=new Date();
    const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    const days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
    var incomeChart;

    window.generate_income_charts_on_page_load = function(){
        const currentMonthIndex = currentDate.getMonth();
        var chart_labels = months.slice(0, currentMonthIndex + 1);
        // var fullYearData = [1000, 1500, 2000, 2500, 3000, 3500, 4000, 4500, 5000, 5500, 6000, 6500];
        var fullYearData = Array.from({length: 12}, () => Math.floor(Math.random() * 6500) + 500);
        var data = fullYearData.slice(0, currentMonthIndex + 1);
    
        generate_income_charts_by_user_selected_option(chart_labels, data);
    }
    
    window.generate_income_charts_onchange=function(){
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
            var fullYearData = [1000, 1500, 2000, 2500, 3000, 3500, 4000, 4500, 5000, 0, 6000, 6500];
            data = fullYearData.slice(0, currentMonthIndex + 1);
            
        }else if(selected_income_charts=='weekly'){
            chart_labels = days;
            data = [3, 5, 4, 6, 8, 10, 0];
        }
        console.log("generate_income_charts_onchange(): " + selected_income_charts); 
    
        generate_income_charts_by_user_selected_option(chart_labels, data);
    }
    
    function generate_income_charts_by_user_selected_option(chart_labels, data){
    
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

    // Update current date and income
    document.getElementById('currentDateIncome').textContent = currentDate.toLocaleDateString('en-US', { year: 'numeric', month: 'long' }).replace(/(\w+)\s(\d+)/, '$1, $2').toUpperCase();

});