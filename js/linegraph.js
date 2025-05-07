 // Generate random fines data for the last 7 days
 const generateFinesData = () => {
    const data = [];
    let totalFines = 0;
    for (let i = 0; i < 7; i++) {
        const fine = Math.floor(Math.random() * 5000) + 1000; // Random amount between 1000 and 6000
        data.push(fine);
        totalFines += fine;
    }
    return { data, totalFines };
};

// Create line chart for fines
const createFinesChart = () => {
    const ctx = document.getElementById('lineChart').getContext('2d');
    const { data, totalFines } = generateFinesData();
    
    // Update total fines display
    document.getElementById('total-fines').textContent = 
        `Total Fines Collected: PHP ${totalFines.toLocaleString()}.00`;

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
            datasets: [{
                label: 'Fines Collected (PHP)',
                data: data,
                borderColor: '#4CAF50',
                backgroundColor: 'rgba(76, 175, 80, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `PHP ${context.raw.toLocaleString()}.00`;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'PHP ' + value.toLocaleString();
                        }
                    }
                }
            }
        }
    });
};

// Initialize the chart when the page loads
document.addEventListener('DOMContentLoaded', function() {
    createFinesChart();
});