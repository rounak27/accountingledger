import 'chartjs-adapter-date-fns';

// Access data passed from PHP
var ctx = document.getElementById('balanceChart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: dates,
        datasets: [{
            label: 'Balance',
            data: balances,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            x: {
                type: 'time',
                time: {
                    unit: 'day' // Adjust as needed
                }
            },
            y: {
                beginAtZero: true
            }
        }
    }
});
