<?php
require "db.php";
date_default_timezone_set('Asia/Kolkata');
include('../../smtp/PHPMailerAutoload.php');
$regDate = date('Y-m-d H:i:s');
// Get type from header
$type = $_GET['type'];
$urlId = $_GET["id"];
$urlImage = $_GET['img'];
$pid = $_GET['pid'];

if ($conn) {
    if (isset($_POST["update"])) {
        switch ($type) {
            case "ca":
                $fname = test_input($_POST["fname"]);
                $lname = test_input($_POST["lname"]);
                $phone = test_input($_POST["phone"]);
                $email = test_input($_POST["email"]);
                $address = test_input($_POST["address"]);
                $fb = test_input($_POST["fb"]);
                $insta = test_input($_POST["insta"]);
                $linkedin = test_input($_POST["linkedin"]);
                $twitter = test_input($_POST["twitter"]);
                $whatsapp = test_input($_POST["whatsapp"]);
                $IFSE = test_input($_POST["IFSE"]);
                $bank = test_input($_POST["bank"]);
                $branch = test_input($_POST["branch"]);
                $ACNo = test_input($_POST["ACNo"]);
                $CAProfile = test_input($_FILES["profile"]["name"]);

                // Upload Image
                if ($_FILES["profile"]['error'] === 0) {
                    uploadImage2("profile", "../assets/profile/");
                } else {
                    $CAProfile = $urlImage;
                }

                try {
                    $sql = "UPDATE `ca`
                        SET `fname`= ?, `lname`= ?, `phone`=?, `email`=?, `address`=?, `fb`= ?, `insta`= ?, `linkedin`=?, `twitter`=?, `whatsapp`= ?, `IFSE`= ?, `bank`= ?, `branch`=?, `ACNo`=?, `CAProfile`= ? WHERE `id` = ?";

                    $stmt = $conn->prepare($sql);

                    $stmt->execute([$fname, $lname, $phone, $email, $address, $fb, $insta, $linkedin, $twitter, $whatsapp, $IFSE, $bank, $branch, $ACNo, $CAProfile, $urlId]);

                } catch (PDOException $e) {
                    echo $e->getMessage();
                }

                // Go to 
                header("Location: ../profile.php?update=true", true, 301);
                exit;
                break;
            
            case "workflow":
                $name = test_input($_POST["name"]);
                $email = test_input($_POST["email"]);
                $service = test_input($_POST["service"]);
                $workflow = test_input($_POST["status"]);
                $asgndate = date('d-m-Y H:i:s');
                $subject =  "Your Project #$pid has Started with Finservkart!";
                $subject2 =  "Your Project #$pid has Completed with Finservkart!";
                
$msg = <<<HTML
<!doctypehtml><html lang=en-US><meta content="text/html; charset=utf-8"http-equiv=Content-Type><title>Finservkart</title><style>a:hover{text-decoration:underline!important}</style><body leftmargin=0 marginheight=0 marginwidth=0 style=margin:0;background-color:#fff topmargin=0><table border=0 cellpadding=0 cellspacing=0 style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700);font-family:'Open Sans',sans-serif"width=100% bgcolor=#fff><tr><td><table border=0 cellpadding=0 cellspacing=0 style="background-color:#fff;max-width:670px;margin:0 auto"width=100% align=center><tr><td style=height:80px><tr><td style=text-align:center><a href=https://finservkart.com/ target=_blank title=logo><img alt=logo src=https://finservkart.com/img/email-logo.png title=logo width=120></a><tr><td style=height:20px><tr><td><table border=0 cellpadding=0 cellspacing=0 style="max-width:670px;background:#fff;border-radius:3px;text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06)"width=95% align=center><tr><td style=height:40px><tr><td style="padding:0 35px"><p align=left text style="font-size:15px;color:#455056;margin:8px 0 0;line-height:24px">Dear $name;<br>I hope this email finds you well.<br>I am delighted to inform you that your project, <b>#$pid</b>, has officially commenced! We have assigned our expert Chartered Accountants (CA) to oversee and ensure the success of your project.<p align=left text style="font-size:15px;color:#455056;margin:8px 0 0;line-height:24px">Your satisfaction and success are our utmost priorities, and we are committed to providing you with the highest quality of service throughout this journey.<br><b>1. Project Tracking:</b> You can conveniently track the status of your project in real-time through your personalized portal on our website. Simply log in to your account to stay updated on the progress.<br><b>2. Communication with CA:</b> Our CAs are here to assist you every step of the way. Should you have any questions, concerns, or require clarification regarding your project, feel free to communicate directly with your assigned CA. They are committed to providing you with the support and guidance you need.<br><br/>We understand the importance of your project and assure you that we will spare no effort in delivering exceptional results that meet your expectations. Thank you for choosing Finservkart for your financial needs. We look forward to serving you and ensuring a smooth and successful journey throughout your project.<br>Should you have any queries or require further assistance, please don't hesitate to reach out to us.<p align=right text><br>Regards,<br>Team Finservkart</p><span style="display:inline-block;vertical-align:middle;margin:29px 0 26px;border-bottom:1px solid #cecece;width:100px"></span><tr><td style=height:40px></table><tr><td style=height:20px><tr><td style=text-align:center><p style="font-size:14px;color:rgba(69,80,86,.7411764705882353);line-height:18px;margin:0 0 0"><strong>www.finservkart.com</strong><tr><td style=height:80px></table></table>
HTML;

$msg2 = <<<HTML
<!doctypehtml><html lang=en-US><meta content="text/html; charset=utf-8"http-equiv=Content-Type><title>Finservkart</title><meta content="Thanks For Contact"name=description><style>a:hover{text-decoration:underline!important}</style><body leftmargin=0 marginheight=0 marginwidth=0 style=margin:0;background-color:#fff topmargin=0><table border=0 cellpadding=0 cellspacing=0 style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700);font-family:'Open Sans',sans-serif"width=100% bgcolor=#fff><tr><td><table border=0 cellpadding=0 cellspacing=0 style="background-color:#fff;max-width:670px;margin:0 auto"width=100% align=center><tr><td style=height:80px><tr><td style=text-align:center><a href=https://finservkart.com target=_blank title=logo><img alt=logo src=https://finservkart.com/img/email-logo.png title=logo width=120></a><tr><td style=height:20px><tr><td><table border=0 cellpadding=0 cellspacing=0 style="max-width:670px;background:#fff;border-radius:3px;text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06)"width=95% align=center><tr><td style=height:40px><tr><td style="padding:0 35px"><h1 style=color:#1e1e2d;font-weight:500;margin:0;font-size:32px;font-family:Rubik,sans-serif></h1><p align=left text style="font-size:15px;color:#455056;margin:8px 0 0;line-height:24px">Dear $name;<br>I hope this email finds you well.<br>We are thrilled to inform you that your project with Finservkart has been successfully completed! Our team of dedicated Chartered Accountants (CAs) has worked diligently to ensure that all aspects of your project <b>#$pid</b> were handled with precision and expertise.<br><p align=left text style="font-size:15px;color:#455056;margin:8px 0 0;line-height:24px">You can now track the status of your project via your personalized portal on our platform. Simply log in to your account and navigate to the project section to access detailed updates, documents, and any additional information related to your project.<br>We are committed to providing you with exceptional service and ensuring your satisfaction every step of the way. Should you have any questions or require further assistance, please do not hesitate to reach out to our customer support team. We are here to help.<br>Thank you for choosing Finservkart for your project needs. We look forward to continuing to serve you in the future.<p align=right text><br>Regards,<br>Team Finservkart</p><span style="display:inline-block;vertical-align:middle;margin:29px 0 26px;border-bottom:1px solid #cecece;width:100px"></span><tr><td style=height:40px></table><tr><td style=height:20px><tr><td style=text-align:center><p style="font-size:14px;color:rgba(69,80,86,.7411764705882353);line-height:18px;margin:0 0 0">© <strong>www.finservkart.com</strong><tr><td style=height:80px></table></table>
HTML;
                
                try {
                    $sql = "UPDATE `workflow` SET `workflow`= ?, asgndate = ? WHERE `pid` = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([$workflow, $asgndate, $pid]);
                    updateData($workflow, $pid);
                    
                    if ($workflow == "Processing") {
                        smtp_mailer($email, $subject, $msg);
                    } elseif ($workflow == "Completed") {
                        smtp_mailer($email, $subject2, $msg2);
                    }
                    
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
                // Go to 
                header("Location: ../status.php?pid=$pid&update=true", true, 301);
                exit;
                break;
            
            case "CA":
                $IFSE = test_input($_POST["IFSE"]);
                $bank = test_input($_POST["bank"]);
                $branch = test_input($_POST["branch"]);
                $ACNo = test_input($_POST["ACNo"]);
                
                try {
                    $sql = "UPDATE `ca` SET `IFSE`= ?, `bank`= ?, `branch`=?, `ACNo`=? WHERE `id` = ?";

                    $stmt = $conn->prepare($sql);

                    $stmt->execute([$IFSE, $bank, $branch, $ACNo, $urlId]);

                } catch (PDOException $e) {
                    echo $e->getMessage();
                }

                // Go to 
                header("Location: ../dashboard.php?update=true", true, 301);
                exit;
                break;

            default:
                break;
        }
    }
} else {
    echo 'API Error: ' . $e->getMessage();
}

function updateData($workflow, $pid){
    global $conn;
    try {
        $sql = "UPDATE `srv_tranaction` SET `workflow`= ? WHERE `pID` = ?";
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
$mail->Username = "support@finservkart.com";
$mail->Password = "Finservkart@2024#&";
$mail->SetFrom("support@finservkart.com", "Finservkart");
$mail->Subject = $subject;
$mail->Body =$msg;
$mail->AddAddress($to);
$mail->addCC("info@finservkart.com");
$mail->Send();
}

function uploadImage2($name, $dest)
{

    $target_dir = $dest;
    $target_file = $target_dir . basename($_FILES[$name]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES[$name]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
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

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}