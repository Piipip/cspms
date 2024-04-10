<?php
session_start();
// Include database configuration
include('includes/config.php');

// Retrieve roll ID, class ID, term ID, and semester ID from the form
$rollid = $_POST['rollid'];
$classid = $_POST['class'];
$termid = $_POST['term'];
$semesterid = $_POST['semester'];

// Prepare SQL query to fetch student data and results
$query = "SELECT tblstudents.StudentName, tblstudents.RollId, tblclasses.ClassName, tblclasses.Section, tblsubjects.SubjectName, tblresult.marks 
          FROM tblstudents 
          JOIN tblclasses ON tblclasses.id = tblstudents.ClassId 
          JOIN tblresult ON tblresult.StudentId = tblstudents.StudentId 
          JOIN tblsubjects ON tblsubjects.id = tblresult.SubjectId 
          WHERE tblstudents.RollId = :rollid 
          AND tblstudents.ClassId = :classid 
          AND tblresult.TermId = :termid 
          AND tblresult.SemesterId = :semesterid";
$stmt = $dbh->prepare($query);
$stmt->bindParam(':rollid', $rollid, PDO::PARAM_STR);
$stmt->bindParam(':classid', $classid, PDO::PARAM_STR);
$stmt->bindParam(':termid', $termid, PDO::PARAM_STR);
$stmt->bindParam(':semesterid', $semesterid, PDO::PARAM_STR);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_OBJ);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Result</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        @media print {
            /* Hide elements not relevant for printing */
            .no-print {
                display: none !important;
            }
            /* Adjust table styles for printing */
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid #000;
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
            }
        }

        /* Custom CSS for shadows */
        .shadow-mirror {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .shadow-3d {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1), 0 8px 16px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="container mt-5 shadow-mirror">
    <h2 class="text-center">Student Result</h2>
    <?php if($stmt->rowCount() > 0) { ?>
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow-3d">
                    <div class="card-body">
                        <h4 class="card-title">Student Information</h4>
                        <p class="card-text">Student Name: <?php echo htmlentities($results[0]->StudentName); ?></p>
                        <p class="card-text">Class: <?php echo htmlentities($results[0]->ClassName); ?></p>
                        <p class="card-text">Term: <?php echo htmlentities($termid); ?></p>
                        <p class="card-text">Semester: <?php echo htmlentities($semesterid); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <canvas id="resultChart" width="400" height="200" class="shadow-3d"></canvas>
            </div>
        </div>
        <div class="container mt-5 shadow-mirror">
    
</div>
        <div class="row mt-4">
            <div class="col-md-12">
                <table class="table table-bordered table-striped shadow-mirror">
                    <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Marks</th>
                        <th>Grade</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $totalMarks = 0; // Initialize total marks
                    foreach ($results as $row) { 
                        $totalMarks += $row->marks; // Calculate grade based on marks
                        $grade = '';
                        if ($row->marks >= 80) {
                            $grade = 'A';
                            $class = 'table-success';
                        } elseif ($row->marks >= 70) {
                            $grade = 'B';
                            $class = 'table-primary';
                        } elseif ($row->marks >= 60) {
                            $grade = 'C';
                            $class = 'table-info';
                        } elseif ($row->marks >= 50) {
                            $grade = 'D';
                            $class = 'table-warning';
                        } else {
                            $grade = 'F';
                            $class = 'table-danger';
                        }
                    ?>
                        <tr class="<?php echo $class; ?>">
                            <td><?php echo htmlentities($row->SubjectName); ?></td>
                            <td><?php echo htmlentities($row->marks); ?></td>
                            <td><?php echo $grade; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Total Marks:</th>
                            <td colspan="2"><?php echo $totalMarks; ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    <?php } else { ?>
        <p class="text-center">No results found</p>
    <?php } ?>
    <div class="text-center">
        <a href="index.php" class="btn btn-primary">Back to Home</a>
        <button onclick="window.print()" class="btn btn-success">Print</button>
    </div>
</div>

<script>
    // JavaScript for creating the bar chart
    var ctx = document.getElementById('resultChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php foreach ($results as $row) { echo '"' . htmlentities($row->SubjectName) . '",'; } ?>],
            datasets: [{
                label: 'Marks',
                data: [<?php foreach ($results as $row) { echo $row->marks . ','; } ?>],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>



<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
