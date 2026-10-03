<?php
$host = 'localhost';
$db   = 'finservkart';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$con = new PDO($dsn, $user, $pass, $opt);

// Get the current year and month
$currentYear = date("Y");
$currentMonth = date("m");

// Calculate the previous month's year and month
$previousYear = $currentYear;
$previousMonth = $currentMonth - 1;
if ($previousMonth < 1) {
    $previousMonth = 12;
    $previousYear--;
}

// Prepare the SQL query to include data for both the current and the previous month
$sql = "SELECT DATE_FORMAT(regdate, '%M') AS Month, workflow, COUNT(*) as Count FROM srv_tranaction WHERE (YEAR(regdate) = :currentYear AND MONTH(regdate) = :currentMonth) OR (YEAR(regdate) = :previousYear AND MONTH(regdate) = :previousMonth) GROUP BY MONTH(regdate), workflow;";

// Prepare and execute the statement
$stmt = $con->prepare($sql);
$stmt->execute([
    'currentYear' => $currentYear, 
    'currentMonth' => $currentMonth, 
    'previousYear' => $previousYear, 
    'previousMonth' => $previousMonth
]);

// Initialize an array to hold the data for each status
$data = [
    'Assigned' => array_fill(0, 12, 0),
    'Processing' => array_fill(0, 12, 0),
    'Completed' => array_fill(0, 12, 0)
];

// Fetch the results
while ($row = $stmt->fetch()) {
    $monthIndex = date("n", strtotime($row["Month"])) - 1; // Convert month name to index
    // Ensure the workflow status is correctly matched and assigned
    if (isset($data[$row["workflow"]])) {
        $data[$row["workflow"]][$monthIndex] = $row["Count"];
    }
}

// Close the statement and connection
$stmt = null;
$con = null;

// Convert the array to JSON format for JavaScript
echo json_encode($data);
?>
