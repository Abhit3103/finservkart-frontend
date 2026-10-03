<?php
session_start();
require '../smtp/PHPMailerAutoload.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Kolkata');

// DB Credentials
$host = 'localhost';
$dbname = 'finservkart';
$username = 'root';
$password = 'WindRed@12345';
// DB Connection
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(['status' => 'failed', 'message' => 'DB connection failed'])); // If DB connection fails
}

// Sanitize and get values
$AGID = $conn->real_escape_string($_POST['AGID']);
$fname = htmlspecialchars($_POST['fname'], ENT_QUOTES, 'UTF-8');
$lname = htmlspecialchars($_POST['lname'], ENT_QUOTES, 'UTF-8');
$email = $conn->real_escape_string($_POST['email']);
$contact = $conn->real_escape_string($_POST['contact']);
$password = $conn->real_escape_string($_POST['password']);
$referral = substr($contact, -6);
$address = $conn->real_escape_string($_POST['address']);
$profile = $conn->real_escape_string($_POST['AGProfile']);
$franchisecode = isset($_POST['franchisecode']) ? trim($_POST['franchisecode']) : '';
$payment_id = isset($_POST['payment_id']) ? $_POST['payment_id'] : '';
$pid = isset($_POST['pid']) ? $_POST['pid'] : '';
$amt = isset($_POST['amt']) ? $_POST['amt'] : '0';

$docZipPath = '';

// Handle file uploads
if (isset($_FILES['file']) && !empty($_FILES['file']['name'][0])) {
    $zip = new ZipArchive();
    $zip_file_name = 'uploads/agent/' . $AGID . '.zip';

    if ($zip->open($zip_file_name, ZipArchive::CREATE) === true) {
        foreach ($_FILES['file']['tmp_name'] as $key => $tmpName) {
            $file_name = $_FILES['file']['name'][$key];
            $zip->addFile($tmpName, $file_name);
        }
        $zip->close();
        $docZipPath = $zip_file_name;
    } else {
        die(json_encode(['status' => 'failed', 'message' => 'Could not create zip'])); // If zip creation fails
    }
}

// Send email
$subject = "Welcome To Finservkart";
$msg = <<<HTML
<!doctype html>
<html lang="en-US">
<head><meta charset="UTF-8"><title>Finservkart</title></head>
<body>
<h2>Welcome, $fname!</h2>
<p>Your registration is successful.</p>
<p><strong>Email:</strong> $email</p>
<p><strong>Password:</strong> $password</p>
<p><a href="https://finservkart.com/apps/FinservKart-Agent.apk">Download App</a></p>
<p>Thanks,<br>Team Finservkart</p>
</body>
</html>
HTML;

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
    $mail->SMTPOptions = ['ssl' => ['verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => false]];
    $mail->Send();
}

// Insert into agent table
$regDate = date('Y-m-d H:i:s'); // Assign separately
$is_approved = 0;
$stmt = $conn->prepare("INSERT INTO agent (AGID, fname, lname, email, phone, doc, password, referral, regDate, AGProfile, franchisecode, address, is_approved) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssssss", $AGID, $fname, $lname, $email, $contact, $docZipPath, $password, $referral, $regDate, $profile, $franchisecode, $address, $is_approved);
$response = [];

if ($stmt->execute()) {
// Admin ko mail
$adminEmail = "info@finservkart.com";
$adminSubject = "New Agent Registration - $fname $lname";
$adminMsg = <<<HTML
<html>
<body>
<p>New agent <strong>$fname $lname</strong> has registered.</p>
<p><strong>Email:</strong> $email<br><strong>Phone:</strong> $contact</p>
<p>Please review and approve the registration in admin panel.</p>
</body>
</html>
HTML;

smtp_mailer($adminEmail, $adminSubject, $adminMsg);

  if (!empty($payment_id)) {
    $stmtPay = $conn->prepare("INSERT INTO agents_pay (payment_id, pid, amt, agid, status, regdate) VALUES (?, ?, ?, ?, ?, ?)");
    $status = 'Paid';
    $stmtPay->bind_param("ssssss", $payment_id, $pid, $amt, $AGID, $status, $regDate);

    if ($stmtPay->execute()) {
      $response = ['status' => 'success', 'message' => 'Registration successful. Please wait for admin approval.'];
    } else {
      $response = ['status' => 'failed', 'message' => 'Payment entry failed: ' . $conn->error];
    }

  } else {
    $response = ['status' => 'success', 'message' => 'Registration successful. Please wait for admin approval.'];
  }

} else {
  $response = ['status' => 'failed', 'message' => 'Registration failed: ' . $conn->error];
}

// Final JSON output
echo json_encode($response);
?>
