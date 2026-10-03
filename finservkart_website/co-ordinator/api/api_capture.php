<?php
include_once('../../include/config.php');
// Get the current year
$currentYear = date("Y");

// SQL query to count data by month for the current year
$sql = "SELECT DATE_FORMAT(STR_TO_DATE(capture, '%d-%m-%Y %H:%i:%s'), '%M') AS Month, COUNT(*) as Count FROM track WHERE YEAR(STR_TO_DATE(capture, '%d-%m-%Y %H:%i:%s')) = $currentYear GROUP BY MONTH(STR_TO_DATE(capture, '%d-%m-%Y %H:%i:%s'));";

$result = $con->query($sql);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . $con->error);
}

// Initialize an array to hold the monthly counts
$monthlyCounts = array_fill(0, 12, 0); // Default values are 0

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $monthIndex = date("n", strtotime($row["Month"])) - 1; // Convert month name to index
        $monthlyCounts[$monthIndex] = $row["Count"];
    }
} else {
    echo "0 results";
}

// Close connection
$con->close();

// Convert the array to JSON format for JavaScript
echo json_encode($monthlyCounts);
?>
