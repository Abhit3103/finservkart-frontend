<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
$regDate = date('Y-m-d H:i:s');
include('../smtp/PHPMailerAutoload.php');
// Your database credentials and connection setup
$host = 'localhost';
$dbname = 'finservkart';
$username = 'root';
$password = 'WindRed@12345';
// Create a new MySQLi connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$toemail = $_POST['email'];
$cname =  $_POST['fname'];
$cname = htmlspecialchars($cname, ENT_QUOTES, 'UTF-8');
$password = $_POST['password'];
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
                <table style="background-color: #fff; max-width:670px; margin:0 auto;" width="100%" border="0"
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
                                        <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:'Rubik',sans-serif;">Welcome
                                        </h1>
                                        <p text align="left" style="font-size:15px; color:#455056; margin:8px 0 0; line-height:24px;">
                                            Dear $cname; <br/>Congratulations and welcome to Finservkart! We are thrilled to have you as a member of our financial services platform. Your registration has been successfully completed, and you are now ready to explore the wide range of financial products and services we offer.</strong>.</p>
                                        <p text align="left" style="font-size:15px; color:#455056; margin:8px 0 0; line-height:24px;">
                                        <strong>Here are your login details:</strong><br/>
                                        <b>&#128231; Email ID : $toemail</b><br/>
                                        <b>&#128273; Password : $password</b><br/>
                                        With these credentials, you can access your Finservkart account anytime, anywhere, and start managing your finances with ease.<br/>
                                        If you have any questions or need assistance at any point, our dedicated customer support team is here to help. Simply reach out to us via email at <a href="mailto:support@finservkart.com">support@finservkart.com</a>, and we'll be happy to assist you.<br/>
                                        Thank you for choosing Finservkart. We look forward to serving you and helping you achieve your financial goals.
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

// Check if files are uploaded
if(isset($_FILES['file']) && !empty($_FILES['file'])) {
    // Initialize the ZipArchive class
    $zip = new ZipArchive();

    // Sanitize and escape the CAID value for use in a filename
    $caid = $conn->real_escape_string($_POST['CAID']);
    // Set the name of our zip archive with the CAID value
    $zip_file_name = 'uploads/CA/' . $caid . '.zip'; // Make sure the directory exists and is writable

    // Create the new zip archive
    if($zip->open($zip_file_name, ZipArchive::CREATE) === true) {
        // Loop through the tmp_name of the files in $_FILES array
        foreach($_FILES['file']['tmp_name'] as $key => $tmpName){
            // Get the name of the file
            $file_name = $_FILES['file']['name'][$key];
            // Add the file
            $zip->addFile($tmpName, $file_name);
        }
        // Close the archive
        $zip->close();
    } else {
        die("Couldn't create Zip Archive");
    }
}

// Other form fields...
// Make sure to sanitize and validate other form fields similarly

// Prepare the SQL statement for insertion
$sql = sprintf("INSERT INTO ca (CAID, fname, lname, email, phone, doc, password, regDate, CAProfile) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
    $conn->real_escape_string($_POST['CAID']),
    $conn->real_escape_string($_POST['fname']),
    $conn->real_escape_string($_POST['lname']),
    $conn->real_escape_string($_POST['email']),
    $conn->real_escape_string($_POST['phone']),
    $conn->real_escape_string($zip_file_name),
    $conn->real_escape_string($_POST['password']),
    $conn->real_escape_string($regDate),
    $conn->real_escape_string($_POST['CAProfile']),
);

// Initialize the response array
    $response = array();

    // Execute the statement
    if ($conn->query($sql) === TRUE) {
        smtp_mailer($toemail, $subject, $msg);
        $response['status'] = 'success';
        $response['message'] = 'Registerd Successfully';
    } else {
        $response['status'] = 'failed';
        $response['message'] = 'Try Again: ' . $conn->error;
    }

    // Output the response as JSON
    echo json_encode($response);

// Close the MySQLi connection
$conn->close();
?>
