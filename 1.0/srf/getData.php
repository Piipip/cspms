<?php
// Fetch data from the database based on selected options
$selectedClass = $_POST['class'];
$selectedTerm = $_POST['term'];
$selectedYear = $_POST['year'];
$selectedStudent = $_POST['student'];

// Connect to the database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "result7";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch bar chart data (student marks by subject)
$sqlBarChart = "SELECT s.SubjectName, r.marks
                FROM tblresult r
                JOIN tblsubjects s ON r.SubjectId = s.id
                WHERE r.ClassId = $selectedClass
                AND r.TermId = $selectedTerm
                AND r.YearId = $selectedYear
                AND r.StudentId = $selectedStudent";
$resultBarChart = $conn->query($sqlBarChart);

$barChartData = array();
$barChartData[] = array('Subject', 'Marks');

if ($resultBarChart->num_rows > 0) {
    while($row = $resultBarChart->fetch_assoc()) {
        $barChartData[] = array($row["SubjectName"], (int)$row["marks"]);
    }
}

// Query to fetch pie chart data (overall marks distribution)
$sqlPieChart = "SELECT 'Pass' AS label, COUNT(*) AS count
                FROM tblresult
                WHERE marks >= 40
                AND ClassId = $selectedClass
                AND TermId = $selectedTerm
                AND YearId = $selectedYear
                AND StudentId = $selectedStudent
                UNION ALL
                SELECT 'Fail' AS label, COUNT(*) AS count
                FROM tblresult
                WHERE marks < 40
                AND ClassId = $selectedClass
                AND TermId = $selectedTerm
                AND YearId = $selectedYear
                AND StudentId = $selectedStudent";
$resultPieChart = $conn->query($sqlPieChart);

$pieChartData = array();
$pieChartData[] = array('Label', 'Count');

if ($resultPieChart->num_rows > 0) {
    while($row = $resultPieChart->fetch_assoc()) {
        $pieChartData[] = array($row["label"], (int)$row["count"]);
    }
}

// Close database connection
$conn->close();

// Prepare data to be sent back as JSON
$data = array(
    'barChartData' => $barChartData,
    'pieChartData' => $pieChartData
);

echo json_encode($data);
?>
