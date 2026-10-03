<?php
// Database connection details
$servername = "localhost";
$username = "finservkart";
$password = "WindRed@12345";
$dbname = "finservkart";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['term'])) {
    $term = $_GET['term'];

    $sql = "SELECT * FROM services WHERE service_name LIKE ?";
    $stmt = $conn->prepare($sql);
    $term = '%' . $term . '%';
    $stmt->bind_param("s", $term);
    $stmt->execute();
    $result = $stmt->get_result();

    $services = [];
    while ($row = $result->fetch_assoc()) {
        $services[] = $row;
    }

    echo json_encode($services);
}
?>
