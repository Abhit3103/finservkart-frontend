<?php
// Database credentials and connection setup
$host = 'localhost';
$dbname = 'finservkart';
$username = 'finservkart';
$password = 'WindRed@12345';
// Create a new MySQLi connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the referral code from the query string
$referral = $_GET['referral'] ?? '';

// Prepare a SQL statement to check if the referral code exists
$stmt = $conn->prepare("SELECT * FROM agent WHERE referral = ?");
if ($stmt === false) {
    die('Prepare failed: (' . $conn->errno . ') ' . $conn->error);
}

$stmt->bind_param("s", $referral);
if ($stmt->execute() === false) {
    die('Execute failed: (' . $stmt->errno . ') ' . $stmt->error);
}

// Check if the referral code exists
$result = $stmt->get_result();
$exists = $result->num_rows >  0;

// Return the result as JSON
echo json_encode(array('exists' => $exists));
?>
