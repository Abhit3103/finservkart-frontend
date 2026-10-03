<?php
header('Content-Type: application/json');  // Always return JSON

// Database credentials
$host= "localhost";
$username = "root";
$password = "WindRed@12345";
$dbname = "finservkart";


// Connect to database
$conn = new mysqli($host, $username, $password, $dbname);

// Default response
$response = ['exists' => false, 'error' => null];

// Check connection
if ($conn->connect_error) {
    $response['error'] = "Connection failed: " . $conn->connect_error;
    echo json_encode($response);
    exit;
}

// Get email from query
$email = trim($_GET['email'] ?? '');

if (!empty($email)) {
    $stmt = $conn->prepare("SELECT id FROM franchise WHERE email = ?");
    if ($stmt) {
        $stmt->bind_param("s", $email);
        if ($stmt->execute()) {
            $stmt->store_result();
            $response['exists'] = $stmt->num_rows > 0;
        } else {
            $response['error'] = 'Execute failed: ' . $stmt->error;
        }
        $stmt->close();
    } else {
        $response['error'] = 'Prepare failed: ' . $conn->error;
    }
}

$conn->close();
echo json_encode($response);
?>
