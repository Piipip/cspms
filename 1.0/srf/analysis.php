<?php
// Include database configuration
include('includes/config.php');

// Fetch student's academic performance based on class, term, year, etc.
// Implement your logic here to fetch data from the database

// Example data (replace with actual database query)
$data = array(
    'subjects' => ['Software Engineering', 'Basics of Computer Science', 'Functional English', 'Technical Writing', 'Operating Systems concepts'],
    'marks' => [89, 87, 66, 78, 90]
);

// Convert data to JSON format
$json_data = json_encode($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Academic Performance</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Student Academic Performance</h2>
        <!-- Bar chart -->
        <div class="row">
            <div class="col-md-6">
                <canvas id="barChart"></canvas>
            </div>
            <!-- Pie chart -->
            <div class="col-md-6">
                <canvas id="pieChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Chart.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Parse JSON data
        var jsonData = <?php echo $json_data; ?>;

        // Bar chart data
        var barData = {
            labels: jsonData.subjects,
            datasets: [{
                label: 'Marks',
                data: jsonData.marks,
                backgroundColor: 'rgba(54, 162, 235, 0.6)'
            }]
        };

        // Pie chart data
        var pieData = {
            labels: jsonData.subjects,
            datasets: [{
                data: jsonData.marks,
                backgroundColor: ['red', 'blue', 'green', 'orange', 'purple']
            }]
        };

        // Draw bar chart
        var barChart = new Chart(document.getElementById('barChart'), {
            type: 'bar',
            data: barData,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        // Draw pie chart
        var pieChart = new Chart(document.getElementById('pieChart'), {
            type: 'pie',
            data: pieData
        });
    </script>
</body>

</html>
