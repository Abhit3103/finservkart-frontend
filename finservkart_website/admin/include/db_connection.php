<?php
// Database connection details
$servername = "localhost";
define('DB_USER', 'finservkart');
define('DB_PASS', 'WindRed@12345');
$dbname = "finservkart";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
