var ctx = document.getElementById('ReleasesChart').getContext('2d');
var total_release = window.release_info.artist_release;

var ReleasesChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Releases', 'Albums', 'Singles'],
        datasets: [{
            data: [total_release, 0, 0],
            backgroundColor: ['#FF8303', '#3E3E3E', '#2A2A2A'],
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
                    boxHeight:6,
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
        },

    }
});

// Add center text
Chart.register({
    id: 'centerText',
    afterDraw: (chart) => {
        const width = chart.width;
        const height = chart.height;
        const ctx = chart.ctx;

        ctx.save();
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.font = "300 20px 'Poppins', sans-serif";
        ctx.fillStyle = "#fff";

        const text = total_release;
        const textX = width / 2;
        const textY = height / 2;

        // Adjust for the chart area
        const chartArea = chart.chartArea;
        const centerX = (chartArea.left + chartArea.right) / 2;
        const centerY = (chartArea.top + chartArea.bottom) / 2;

        ctx.fillText(text, centerX, centerY);
        ctx.restore();
    }
});
