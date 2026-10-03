<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
$regDate = date('Y-m-d H:i:s');
include('../smtp/PHPMailerAutoload.php');
// Your database credentials and connection setup
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

$toemail = $_POST['email'];
$cname =  $_POST['name'];
$cname = htmlspecialchars($cname, ENT_QUOTES, 'UTF-8');
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
$mail->Body =$msg;
$mail->AddAddress($to);
$mail->SMTPOptions=array('ssl'=>array(
    'verify_peer'=>false,
    'verify_peer_name'=>false,
    'allow_self_signed'=>false
    ));
$mail->Send();
}

$msg = <<<HTML
<!doctype html>
<html lang="en-US">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Finservkart</title>
    <meta name="description" content="Thanks For Contact">
    <style type="text/css">
        a:hover {text-decoration: underline !important;}
    </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #fff;" leftmargin="0">
    <!-- 100% body table -->
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#fff"
        style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
        <tr>
            <td>
                <table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0"
                    align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <a href="https://finservkart.com/" title="logo" target="_blank">
                            <img width="120" src="https://finservkart.com/img/email-logo.png" title="logo" alt="logo">
                          </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                style="max-width:670px; background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding:0 35px;">
                                        <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:'Rubik',sans-serif;">Thank You
                                        </h1>
                                        <p text align="left" style="font-size:15px; color:#455056; margin:8px 0 0; line-height:24px;">
                                            Dear $cname; <br/>I hope this email finds you well.<br/>I wanted to take a moment to express our sincerest gratitude for reaching out to Finservkart. Your interest and trust mean a lot to us, and we are truly thankful for the opportunity to assist you with your financial needs.</p>
                                        <p text align="left" style="font-size:15px; color:#455056; margin:8px 0 0; line-height:24px;">
                                        Here at Finservkart, we strive to provide the highest level of service and support to each and every one of our valued customers. Your inquiry is important to us, and we are committed to addressing it promptly and effectively.<br/>
                                        Our team of dedicated professionals is already reviewing your message and will get back to you shortly with the information or assistance you require. In the meantime, if you have any additional questions or concerns, please feel free to reach out to us at any time. We are here to help!<br/>
                                        Once again, thank you for choosing Finservkart. We look forward to serving you and exceeding your expectations.
                                    </p>
                                        <p text align="right"><br/>Regards,<br/>Team Finservkart</p> 
                                            <span
                                            style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;"><strong>www.finservkart.com</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
HTML;

// Prepare the SQL statement for insertion
$sql = sprintf("INSERT INTO contact (country, state, name, phone, email, subject, message, regDate) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
    $conn->real_escape_string($_POST['country']),
    $conn->real_escape_string($_POST['state']),
    $conn->real_escape_string($_POST['name']),
    $conn->real_escape_string($_POST['phone']),
    $conn->real_escape_string($_POST['email']),
    $conn->real_escape_string($_POST['subject']),
    $conn->real_escape_string($_POST['message']),
    $conn->real_escape_string($regDate),
);

// Initialize the response array
    $response = array();

    // Execute the statement
    if ($conn->query($sql) === TRUE) {
        smtp_mailer($toemail, $subject, $msg);
        $response['status'] = 'success';
        $response['message'] = 'Thank You, We will connect with you very soon';
    } else {
        $response['status'] = 'failed';
        $response['message'] = 'Try Again: ' . $conn->error;
    }

    // Output the response as JSON
    echo json_encode($response);

// Close the MySQLi connection
$conn->close();
?>
