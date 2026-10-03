<?php
require "db.php";
date_default_timezone_set('Asia/Kolkata');
$regDate = date('Y-m-d H:i:s');
include('../../smtp/PHPMailerAutoload.php');
$type = $_GET['type'];
$agnt_name = $_GET['agnt_name'];
$agnt_email = $_GET['agnt_mail'];

$cus_email = $_POST['email'];
$cname =  $_POST['fname'];
$cname = htmlspecialchars($cname, ENT_QUOTES, 'UTF-8');
$password = $_POST['password'];
$cust_subject =  "Welcome To Finservkart";
$agnt_subject =  "New Customer Registration Completed - Details Enclosed";

function smtp_mailer_cus($to, $subject, $msg){
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

function smtp_mailer_agnt($to, $subject, $msg){
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
$mail->Body =$msg2;
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
                                            Dear $cname, <br/>Congratulations and welcome to Finservkart! We are thrilled to have you as a member of our financial services platform. Your registration has been successfully completed, and you are now ready to explore the wide range of financial products and services we offer.</strong>.</p>
                                        <p text align="left" style="font-size:15px; color:#455056; margin:8px 0 0; line-height:24px;">
                                        <strong>Here are your login details:</strong><br/>
                                        <b>&#128231; Email ID : $cus_email</b><br/>
                                        <b>&#128273; Password : $password</b><br/>
                                        <a href="https://finservkart.com/apps/FinservKartV2.apk"><button style="background-color:#1204aa;border:none;color:#fff;padding:15px 15px;text-align:center;text-decoration:none;display:inline-block;font-size:16px;margin:2px 2px;cursor:pointer">Download Apps</button></a><br/>
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

$msg2 = <<<HTML
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
                                        <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:'Rubik',sans-serif;">Thank You 
                                        </h1>
                                        <p text align="left" style="font-size:15px; color:#455056; margin:8px 0 0; line-height:24px;">
                                            Dear $agnt_name, <br/>Congratulations on registering a new customer ($cname) to Finservkart! We are thrilled to welcome a new member to our financial services platform. Below are the details of the newly registered customer.</strong>.</p>
                                        <p text align="left" style="font-size:15px; color:#455056; margin:8px 0 0; line-height:24px;">
                                        <strong>Here are your login details:</strong><br/>
                                        <b>&#128231; Email ID : $cus_email</b><br/>
                                        <b>&#128273; Password : $password</b><br/>
                                        With these credentials, the customer can access their Finservkart account anytime, anywhere, and start managing their finances with ease.<br/>
                                        Please remind the customer that if they have any questions or need assistance at any point, our dedicated customer support team is here to help. They can simply reach out to us via email at <a href="mailto:support@finservkart.com">support@finservkart.com</a>, and we'll be happy to assist them.<br/>
                                        Thank you for your continued support and for helping us grow our Finservkart community. We look forward to serving you and our new customers in achieving their financial goals.
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

if ($conn) {
   if (isset($_POST["submit"])) {
       switch ($type) {
           case "customer":
               $data = array(
                    "CustID" => test_input($_POST["CID"]),
                    "fname" => test_input($_POST["fname"]),
                    "lname" => test_input($_POST["lname"]),
                    "email" => test_input($_POST["email"]),
                    "phone" => test_input($_POST["phone"]),
                    "password" => test_input($_POST["password"]),
                    "referral" => test_input($_POST["referral"]),
                    "regDate" => test_input($regDate),
                    "CProfile" => test_input($_POST["CProfile"]),
                );
               insertToDB($conn, $type, $data);
               smtp_mailer_cus($cus_email, $cust_subject, $msg);
               smtp_mailer_agnt($agnt_email, $agnt_subject, $msg2);
               header("Location: ../add-customer.php?added=true", true, 301);
               exit;
               break;
               
           default:
               echo "ERROR";
               break;
       }
   }
} else {
   echo 'Error: ' . $e->getMessage();
}

function insertToDB($conn, $table, $data)
{
   $columns = implodeArray(array_keys($data));
   $prefixed_array = preg_filter('/^/', ':', array_keys($data));
   $values = implodeArray($prefixed_array);

   try {
       $sql = "INSERT INTO $table ($columns) VALUES ($values)";
       $stmt = $conn->prepare($sql);
       $stmt->execute($data);
       echo "New records created successfully";
   } catch (PDOException $error) {
       echo $error;
   }
}

function implodeArray($array)
{
   return implode(", ", $array);
}

function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

?>