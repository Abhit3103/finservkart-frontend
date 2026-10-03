<?php
require "db.php";
date_default_timezone_set('Asia/Kolkata');
include('../../smtp/PHPMailerAutoload.php');
$regDate = date('Y-m-d H:i:s');
$type = $_GET['type'];
$uid = $_GET['id'];
$pid = $_GET['pid'];
if ($conn) {
    if (isset($_POST["submit"])) {
        switch ($type) {
            case "services":
                uploadImage2("serviceimg", "../assets/services/");
                $required_documents = $_POST['required_documents'];
                $required_documents = str_replace(',', "\n", $required_documents);
                $data = array(
                    "service_name" => test_input($_POST["service_name"]),
                    "service_image" => test_input($_FILES["serviceimg"]["name"]),
                    "required_documents" => test_input($required_documents),
                    "service_price" => test_input($_POST["service_price"]),
                    "govt_fees" => test_input($_POST["govt_fees"]),
                    "percentage" => test_input($_POST["percentage"]),
                    "total_amt" => test_input($_POST["total_amt"]),
                    "commission" => test_input($_POST["commission"]),
                    "terms" => test_input($_POST["terms"]),
                );
                insertToDB($conn, $type, $data);
                header("Location: ../add-services.php?added=true", true, 301);
                exit;
                break;
            
            case "workflow":
                $data = array(
                    "pid" => test_input($_POST["pid"]),
                    "CAID" => test_input($_POST["CAID"]),
                    "name" => test_input($_POST["name"]),
                    "email" => test_input($_POST["email"]),
                    "payment_id" => test_input($_POST["payment_id"]),
                    "CustID" => test_input($_POST["CustID"]),
                    "documents" => test_input($_POST["documents"]),
                    "service" => test_input($_POST["service"]),
                    "workflow" => test_input($_POST["workflow"]),
                    "asgndate" => date('d-m-Y H:i:s')
                );
                
                $toemail = $_POST['email'];
                $cname =  $_POST['name'];
                $cname = htmlspecialchars($cname, ENT_QUOTES, 'UTF-8');
                $sname = $_POST['service'];
                $PID = $_POST['pid']; 
                $subject =  "$sname - Assignment Assigned Confirmation";
                
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
                                        <p text align="left" style="font-size:15px; color:#455056; margin:8px 0 0; line-height:24px;">
                                            Dear $cname; <br/>I hope this email finds you well.<br/>I'm pleased to inform you that your service request has been successfully assigned to our Chartered Accountants(CA). The service details are as follows:</p>
                                        <p text align="left" style="font-size:15px; color:#455056; margin:8px 0 0; line-height:24px;">
                                        <strong>Here are your service details:</strong><br/>
                                        <b>&diams; Service/Invoice ID : #$PID</b><br/>
                                        <b>&diams; Service Name : $sname</b><br/>
                                        Your satisfaction is our top priority, and we are confident that our CA will efficiently handle your request. Should you have any questions or require further assistance, please don't hesitate to reach out to us..<br/>
                                        Thank you for choosing our services. We look forward to serving you!
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
                insertToDB($conn, $type, $data);
                updateData();
                if ($_POST["sendmail"] == 'Yes') {
                    smtp_mailer($toemail, $subject, $msg);
                }
                header("Location: ../assign.php?pid=$pid&assigned=true", true, 301);
                exit;
                break;
                
            default:
                echo "API ERROR";
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

function updateData(){
         global $conn, $pid;
         $workflow = 'Assigned';
         try {
           $sql = "UPDATE `srv_tranaction` SET `workflow`= ? WHERE `pid` = ?";
           $stmt = $conn->prepare($sql);
           $stmt->execute([$workflow, $pid]);
           } catch (PDOException $e) {
               echo $e->getMessage();
       }
}

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

function uploadImage2($name, $dest)
{
    // Check if a file was uploaded
    if (!isset($_FILES[$name])) {
        echo "No file was uploaded under the name $name.";
        return;
    }

    $target_dir = $dest;
    $target_file = $target_dir . basename($_FILES[$name]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_FILES[$name]["tmp_name"])) {
        $check = getimagesize($_FILES[$name]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    } else {
        echo "No file was uploaded under the name $name.";
        return;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES[$name]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES[$name]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

?>