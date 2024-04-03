<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Graph</title>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns"></script>

    
</head>
<body>
    <!-- HTML canvas element for the chart -->
    <canvas id="balanceChart" width="400" height="200"></canvas>

    <!-- Pass data from PHP to JavaScript -->
    <script>
        // Access data passed from PHP
        var dates = {!! json_encode($dates) !!};
        var balances = {!! json_encode($balances) !!};
    
        // Create a new Chart instance
        var ctx = document.getElementById('balanceChart').getContext('2d');
        var balanceChart = new Chart(ctx, {
            type: 'line', // Set the chart type to line
            data: {
                labels: dates, // Set the labels for the x-axis (dates)
                datasets: [{
                    label: 'Balance', // Set the label for the dataset
                    data: balances, // Set the data points for the y-axis (balances)
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Set the background color
                    borderColor: 'rgba(75, 192, 192, 1)', // Set the border color
                    borderWidth: 1 // Set the border width
                }]
            },
            options: {
                scales: {
                    x: {
                        type: 'time', // Set the x-axis type to time
                        time: {
                            unit: 'day' // Set the time unit to display (adjust as needed)
                        }
                    },
                    y: {
                        beginAtZero: true // Start the y-axis at zero
                    }
                }
            }
        });
    </script>
    

    <!-- Include your JavaScript file -->
    
</body>
</html>
