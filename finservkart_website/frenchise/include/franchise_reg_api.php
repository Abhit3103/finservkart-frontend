<?php
session_start();
header('Content-Type: application/json');
date_default_timezone_set('Asia/Kolkata');
$regDate = date('Y-m-d H:i:s');

// SMTP PHPMailer include
include('../../smtp/PHPMailerAutoload.php');

// Database connection details
$servername = "localhost";
$username = "root";
$password = "WindRed@12345";
$dbname = "finservkart";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize and fetch POST data
$FID = trim($_POST['FID']);
$fname = htmlspecialchars(trim($_POST['fname']), ENT_QUOTES, 'UTF-8');
$lname = htmlspecialchars(trim($_POST['lname']), ENT_QUOTES, 'UTF-8');
$email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
$phone = trim($_POST['phone']);
$address = htmlspecialchars(trim($_POST['address']), ENT_QUOTES, 'UTF-8');
$password_raw = trim($_POST['password']);
$FProfile = trim($_POST['FProfile']);

// Validate mandatory fields
if (!$email || empty($fname) || empty($password_raw)) {
    echo json_encode(['status' => 'failed', 'message' => 'Required fields are missing or invalid.']);
    exit;
}

// Secure password hash (instead of plain text)
$password = password_hash($password_raw, PASSWORD_DEFAULT);

$subject =  "Welcome To Finservkart";

function smtp_mailer($to, $subject, $msg){
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
    $mail->SMTPOptions = ['ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false
    ]];
    return $mail->Send();
}

// Email content
$msg = <<<HTML
<!doctype html>
<html lang="en-US">
<head><meta charset="UTF-8"><title>Finservkart</title></head>
<body style="background:#fff;">
<table style="max-width:670px;margin:0 auto;background:#fff;padding:40px;border-radius:3px;box-shadow:0 6px 18px rgba(0,0,0,.06);">
<tr><td style="text-align:center;">
    <a href="https://finservkart.com/" target="_blank">
    <img width="120" src="https://finservkart.com/img/email-logo.png" alt="logo"></a></td></tr>
<tr><td><h1 style="color:#1e1e2d;font-size:32px;">Welcome</h1></td></tr>
<tr><td style="text-align:left;font-size:15px;color:#455056;">
<p>Dear $fname,<br><br>Congratulations and welcome to Finservkart! Your registration has been successfully completed.</p>
<p><b>Here are your login details:</b><br>
📧 Email ID : $email<br>
🔒 Password : (the password you set)</p>
<p>You can now manage your finances with ease.<br>
If you have questions, email us at <a href="mailto:support@finservkart.com">support@finservkart.com</a>.</p>
<p>Regards,<br>Team Finservkart</p>
</td></tr></table>
<p style="text-align:center;font-size:14px;color:#455056;margin-top:20px;"><strong>www.finservkart.com</strong></p>
</body></html>
HTML;

// Prepare and execute SQL safely using prepared statements
$stmt = $conn->prepare("INSERT INTO franchise (FranID, fname, lname, email, phone, address, password, regDate, FProfile) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssss", $FID, $fname, $lname, $email, $phone, $address, $password, $regDate, $FProfile);

$response = [];

if ($stmt->execute()) {
    smtp_mailer($email, $subject, $msg);
    $response['status'] = 'success';
    $response['message'] = 'Registered Successfully';
} else {
    $response['status'] = 'failed';
    $response['message'] = 'Try Again: ' . $stmt->error;
}

echo json_encode($response);

$stmt->close();
$conn->close();
?>
