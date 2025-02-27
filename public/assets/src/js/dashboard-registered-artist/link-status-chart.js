var linkCtx = $('#linkStatusChart')[0].getContext('2d');
var total_link_request = 0;
var total_link_empty = 0;
var total_link_confirm = 0;
var linkChart = null;
var chartConfig = {
    intialCount: 100,
    initialColor: '#FF8303',
    requested: '#FF8303',
    approved: '#2A2A2A', 
    cancelled: '#3E3E3E'
};

// custom plugin for link chart
const linkCenterPlugin = {
    id: 'linkCenterText',
    beforeDraw: (chart) => {
        const { ctx, chartArea, data } = chart;
        const centerX = (chartArea.left + chartArea.right) / 2;
        const centerY = (chartArea.top + chartArea.bottom) / 2;
        
        ctx.save();
        
        // Draw background circle
        ctx.beginPath();
        ctx.arc(centerX, centerY, 40, 0, 2 * Math.PI);
        ctx.fillStyle = '#1A1A1A';
        ctx.fill();
        
        // Draw text
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.font = "300 20px 'Poppins', sans-serif";
        ctx.fillStyle = "#fff";
        
        // Get the active element
        const activeElements = chart.getActiveElements();
        if (activeElements.length > 0) {
            const value = data.datasets[0].data[activeElements[0].index];
            ctx.fillText(value.toString(), centerX, centerY);
        } else {
            ctx.fillText(total_link_request.toString(), centerX, centerY);
        }
        
        ctx.restore();
    }
};

window.count_link_status_data = function() {
    const url = `${baseLocation}/DashboardAdmin/ajax_count_link_status_data`;

    if (currentRCRA2 && currentRCRA2.state() === 'pending') {
        currentRCRA2.abort();
    }
    
    currentRCRA2 = $.ajax({
        url: url,
        type: 'get',
        timeout: 20000,
        beforeSend: function (jqXHR) {
            generateLinkChart(chartConfig.intialCount);
        },
        success: function(response) {
            total_link_request = response.total_link_request;
            total_link_empty = response.total_link_empty;
            total_link_confirm = response.total_link_confirm;
            $('.count-link-request').text(total_link_request);
            generateLinkChart(total_link_request);
        },
        error: function(xhr, status, error) {
            window.errorMsg('An error occurred while processing your request. Please refresh and try again.');
            console.log('Error submitting form:', error);
        },
        dataType: 'json'  
    });
}

function generateLinkChart(total_link_request) {
    if (linkChart) {
        linkChart.destroy();
    }
    
    let existingChart = Chart.getChart(linkCtx.canvas);
    if (existingChart) {
        existingChart.destroy();
    }

    linkChart = new Chart(linkCtx, {
        type: 'doughnut',
        data: {
            labels: ['Empty', 'Confirmed', 'Requested'],
            datasets: [{
                data: [total_link_empty, total_link_confirm, total_link_request],
                backgroundColor: ['#2A2A2A', '#3E3E3E', '#FF8303'],
                borderWidth: 0,
                cutout: '80%'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            aspectRatio: 1,
            plugins: {
                legend: {
                    display: true,
                    position: 'left',
                    labels: {
                        color: 'rgba(255,255,255,0.6)',
                        font: {
                            size: 12,
                            family: "'Poppins', sans-serif"
                        },
                        padding: 15,
                        usePointStyle: true,
                        pointStyle: 'circle',
                        boxWidth: 6,
                        boxHeight: 6,
                    }
                },
                tooltip: {
                    enabled: true
                }
            },
            layout: {
                padding: {
                    left: 10,
                    right: 0,
                    top: 20,
                    bottom: 0
                }
            }
        },
        plugins: [linkCenterPlugin]
    });
}