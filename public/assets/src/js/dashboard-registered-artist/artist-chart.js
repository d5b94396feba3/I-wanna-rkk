var artistCtx = $('#artistChart')[0].getContext('2d');
var artist_total = 0;
var artist_request = 0;
var artist_active = 0;
var artist_inactive = 0;

var artistChart = null;

var chartConfig = {
    intialCount: 100,
    initialColor: '#FF8303',
    requested: '#FF8303',
    approved: '#2A2A2A', 
    cancelled: '#3E3E3E'
};

// custom plugin for artist chart
const artistCenterPlugin = {
    id: 'artistCenterText',
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
            ctx.fillText(artist_total.toString(), centerX, centerY);
        }
        
        ctx.restore();
    }
};

window.count_registered_artists_data = function() {
    const url = `${baseLocation}/DashboardAdmin/ajax_count_registered_artists_data`;

    if (currentRCRA && currentRCRA.state() === 'pending') {
        currentRCRA.abort();
    }
    
    currentRCRA = $.ajax({
        url: url,
        type: 'get',
        timeout: 20000,
        beforeSend: function (jqXHR) {
            generateArtistChart(chartConfig.intialCount);
        },
        success: function(response) {
            artist_total = response.total_artist;

            artist_request = response.artist_request;
            artist_active = response.artist_active;
            artist_inactive = response.artist_inactive;

            $('.count-registered-artists').text(artist_total);
            generateArtistChart(artist_total);
        },
        error: function(xhr, status, error) {
            window.errorMsg('An error occurred while processing your request. Please refresh and try again.');
            console.log('Error submitting form:', error);
        },
        dataType: 'json'  
    });
}

function generateArtistChart(artist_request) {
    if (artistChart) {
        artistChart.destroy();
    }
    
    let existingChart = Chart.getChart(artistCtx.canvas);
    if (existingChart) {
        existingChart.destroy();
    }

    artistChart = new Chart(artistCtx, {
        type: 'doughnut',
        data: {
            labels: ['Active', 'Inactive', 'Requested'],
            datasets: [{
                data: [artist_active, artist_inactive, artist_request],
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
        plugins: [artistCenterPlugin]
    });
}