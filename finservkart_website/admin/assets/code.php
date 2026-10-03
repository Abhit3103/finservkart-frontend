<?php
// Database connection details
$servername = "localhost";
$username = "username";
$password = "WindRed@12345";
$dbname = "database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$service_name = $_POST['service_name'];
$service_image = $_POST['service_image'];
$required_documents = $_POST['required_documents'];

// Convert the comma-separated list of documents to a newline-separated list
$required_documents = str_replace(',', "\n", $required_documents);

// Insert data into the database
$sql = "INSERT INTO services (service_name, service_image, required_documents) VALUES ('$service_name', '$service_image', '$required_documents')";

if ($conn->query($sql) === TRUE) {
    echo "New service added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
