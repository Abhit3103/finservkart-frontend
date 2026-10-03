<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
date_default_timezone_set('Asia/Kolkata');
$regDate = date('Y-m-d H:i:s');
header('Content-Type: application/json'); // Ensure the response is in JSON format
include('../smtp/PHPMailerAutoload.php');

// Database connection
$host = 'localhost';
$dbname = 'finservkart';
$username = 'finservkart';
$password = 'WindRed@12345';
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    // Exit early if database connection fails
    die(json_encode(['status' => 'failed', 'message' => 'DB Connection Failed: ' . $conn->connect_error]));
}

// Validate required fields
$required = ['CID', 'fname', 'lname', 'email', 'phone', 'address', 'password', 'referral', 'pincode', 'CProfile'];
foreach ($required as $field) {
    if (!isset($_POST[$field])) {
        echo json_encode(['status' => 'failed', 'message' => "Missing field: $field"]);
        exit;
    }
}

// Sanitize input
$CID       = trim($_POST['CID']);
$fname     = htmlspecialchars(trim($_POST['fname']), ENT_QUOTES, 'UTF-8');
$lname     = htmlspecialchars(trim($_POST['lname']), ENT_QUOTES, 'UTF-8');
$email     = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$phone     = trim($_POST['phone']);
$address   = htmlspecialchars(trim($_POST['address']), ENT_QUOTES, 'UTF-8');
$password  = trim($_POST['password']); // Raw password (insecure)

$referral  = trim($_POST['referral']);
$pincode   = trim($_POST['pincode']);
$CProfile  = trim($_POST['CProfile']);

// Validate email
if (!$email) {
    echo json_encode(['status' => 'failed', 'message' => 'Invalid email address']);
    exit;
}

// Email content
$subject = "Welcome To Finservkart";
$msg = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Welcome</title></head>
<body>
    <h2>Welcome to Finservkart</h2>
    <p>Dear $fname,</p>
    <p>Thank you for registering on Finservkart. Below are your login details:</p>
    <ul>
        <li>Email ID: $email</li>
        <li>Password: (hidden for security reasons)</li>
    </ul>
    <p>You can download the app here: <a href="https://finservkart.com/apps/FinservKartV2.apk">Download App</a></p>
    <p>If you have questions, contact <a href="mailto:support@finservkart.com">support@finservkart.com</a></p>
    <br>Regards,<br>Team Finservkart
</body>
</html>
HTML;

// Send email function
function smtp_mailer($to, $subject, $msg) {
    $mail = new PHPMailer(); 
    $mail->IsSMTP(); 
    $mail->SMTPAuth = true; 
    $mail->SMTPSecure = 'tls'; 
    $mail->Host = "smtp.hostinger.com";
    $mail->Port = 587; 
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Username = "info@finservkart.com";
    $mail->Password = "Finservkart@2024#&";
    $mail->SetFrom("info@finservkart.com", "Finservkart");
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions = ['ssl' => ['verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true]];
    return $mail->Send();
}

// Insert data into the database
$stmt = $conn->prepare("INSERT INTO customer (CustID, fname, lname, email, phone, address, password, referral, pincode, regDate, CProfile) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssss", $CID, $fname, $lname, $email, $phone, $address, $password, $referral, $pincode, $regDate, $CProfile);


$response = [];

if ($stmt->execute()) {
    // Check if email is sent successfully
    if (smtp_mailer($email, $subject, $msg)) {
        $response = ['status' => 'success', 'message' => 'Registration successful '];
    } else {
        $response = ['status' => 'partial', 'message' => 'Registration successful, but email failed to send'];
    }
} else {
    // Return failure if registration fails
    $response = ['status' => 'failed', 'message' => 'Registration Failed: ' . $stmt->error];
}

// Output the response as JSON
echo json_encode($response);

// Clean up
$stmt->close();
$conn->close();
?>
