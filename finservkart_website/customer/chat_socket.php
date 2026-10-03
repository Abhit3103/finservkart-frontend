<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require "api/db.php";
date_default_timezone_set('Asia/Kolkata');
include('../smtp/PHPMailerAutoload.php');
$regDate = date('Y-m-d H:i:s');
$type = $_GET['type'];
if ($conn) {
    if (isset($_POST["submit"])) {
        switch ($type) {
            case "conversation":
                $zipFilePath = ''; // Initialize zipFilePath as empty
                if(isset($_FILES['file']) && !empty($_FILES['file'])) {
                    $zip = new ZipArchive();
                    $zipFileName = uniqid() . '.zip';
                    $zipFilePath = '../docs/' . $zipFileName;
                    $docsDir = '../docs/';
                    
                    if (!file_exists($docsDir)) {
                        mkdir($docsDir, 0777, true);
                    }
                    
                    if (!is_writable($docsDir)) {
                        die("The directory $docsDir is not writable.");
                    }
                    if($zip->open($zipFilePath, ZipArchive::CREATE) === true) {
                        if (is_iterable($_FILES['file']['tmp_name'])) {
                            foreach($_FILES['file']['tmp_name'] as $key => $tmpName){
                                $file_name = $_FILES['file']['name'][$key];
                                // Check if the file exists and is readable before adding it to the zip
                                if(file_exists($tmpName) && is_readable($tmpName)) {
                                    $zip->addFile($tmpName, $file_name);
                                } else {
                                    // Optionally, handle the case where the file does not exist or is not readable
                                    echo "";
                                }
                            }
                        } else {
                            $tmpName = $_FILES['file']['tmp_name'];
                            $file_name = $_FILES['file']['name'];
                            // Check if the file exists and is readable before adding it to the zip
                            if(file_exists($tmpName) && is_readable($tmpName)) {
                                $zip->addFile($tmpName, $file_name);
                            } else {
                                // Optionally, handle the case where the file does not exist or is not readable
                                echo "";
                            }
                        }
                        $zip->close();
                        // if (!file_exists($zipFilePath)) {
                        //     die("Zip file was not created at $zipFilePath");
                        // }
                    } else {
                        die("Couldn't create Zip Archive");
                    }
                }

                $data = array(
                    "pid" => test_input($_POST["pid"]),
                    "CAID" => test_input($_POST["CAID"]),
                    "CustID" => test_input($_POST["CustID"]),
                    "CustName" => test_input($_POST["CustName"]),
                    "CAName" => test_input($_POST["CAName"]),
                    "CustEmail" => test_input($_POST["CustEmail"]),
                    "CAEmail" => test_input($_POST["CAEmail"]),
                    "service" => test_input($_POST["service"]),
                    "message" => test_input($_POST["message"]),
                    "docx" => test_input($zipFilePath),
                    "convdate" => date('d-m-Y H:i:s')
                );
                
                $CustName = $_POST["CustName"];
                $CAName = $_POST["CAName"];
                $toemail = $_POST['CAEmail'];
                $bcc = $_POST['CustEmail']; 
                $PID = $_POST['pid']; 
                $sub =  $_POST['sub'];
                $subject = "$sub - #$PID";
                $msg = $_POST['message'];
                $finalMSG = htmlspecialchars_decode($msg);
                
                $FilePath = $zipFilePath;
                $cleanZipFilePath = str_replace('../docs/', '', $zipFilePath);
                $docfiles = "";
                if (file_exists($FilePath)) {
                    $docfiles = "<b>&#128193; Documents :</b> <a style='text-decoration: none; color: green;' href='https://finservkart.com/docs/". $cleanZipFilePath. "'>Download Files</a>";
                } else {
                    $docfiles = "";
                }
                
$msgs = <<<HTML
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Finservkart</title>
    <style type="text/css">
      a:hover {
        text-decoration: underline !important;
      }
    </style>
  </head>

  <body
    marginheight="0"
    topmargin="0"
    marginwidth="0"
    style="margin: 0px; background-color: #fff"
    leftmargin="0"
  >
    <!-- 100% body table -->
    <table
      cellspacing="0"
      border="0"
      cellpadding="0"
      width="100%"
      bgcolor="#fff"
      style="
        @import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700);
        font-family: 'Open Sans', sans-serif;
      "
    >
      <tr>
        <td>
          <table
            style="background-color: #fff; max-width: 670px; margin: 0 auto"
            width="100%"
            border="0"
            align="center"
            cellpadding="0"
            cellspacing="0"
          >
            <tr>
              <td style="height: 80px">&nbsp;</td>
            </tr>
            <tr>
              <td style="text-align: center">
                <a href="https://finservkart.com/" title="logo" target="_blank">
                  <img
                    width="120"
                    src="https://finservkart.com/img/email-logo.png"
                    title="logo"
                    alt="logo"
                  />
                </a>
              </td>
            </tr>
            <tr>
              <td style="height: 20px">&nbsp;</td>
            </tr>
            <tr>
              <td>
                <table
                  width="95%"
                  border="0"
                  align="center"
                  cellpadding="0"
                  cellspacing="0"
                  style="
                    max-width: 670px;
                    background: #fff;
                    border-radius: 3px;
                    text-align: center;
                    -webkit-box-shadow: 0 6px 18px 0 rgba(0, 0, 0, 0.06);
                    -moz-box-shadow: 0 6px 18px 0 rgba(0, 0, 0, 0.06);
                    box-shadow: 0 6px 18px 0 rgba(0, 0, 0, 0.06);
                  "
                >
                  <tr>
                    <td style="height: 40px">&nbsp;</td>
                  </tr>
                  <tr>
                    <td style="padding: 0 35px">
                      <h1
                        style="
                          color: #1e1e2d;
                          font-weight: 500;
                          margin: 0;
                          font-size: 32px;
                          font-family: 'Rubik', sans-serif;
                        "
                      ></h1>
                      <p
                        text
                        align="left"
                        style="
                          font-size: 15px;
                          color: #455056;
                          margin: 8px 0 0;
                          line-height: 24px;
                        "
                      >
                        Dear $CAName, <br />Hope you are doing well , Kindly follow the
                        email below and do something useful.
                      </p>
                      <p
                        text
                        align="left"
                        style="
                          font-size: 15px;
                          color: #455056;
                          margin: 8px 0 0;
                          line-height: 24px;
                        "
                      >
                        $finalMSG </p>
                        <p
                        text
                        align="left"
                        style="
                          font-size: 15px;
                          color: #455056;
                          margin: 8px 0 0;
                          line-height: 24px;
                        "
                      >
                        $docfiles
                        <br/>
                        If you have any questions or need assistance at any
                        point, our dedicated customer support team is here to
                        help. Simply reach out to us via email at
                        <a href="mailto:support@finservkart.com"
                          >support@finservkart.com</a> & we'll be happy to assist you.<br />
                        Thank you for choosing Finservkart. We look forward to
                        serving you and helping you achieve your financial
                        goals.
                      </p>
                      <p text align="right">
                        <br />Regards,<br />
                        $CustName <br />
                        Team Finservkart
                      </p>
                      <span
                        style="
                          display: inline-block;
                          vertical-align: middle;
                          margin: 29px 0 26px;
                          border-bottom: 1px solid #cecece;
                          width: 100px;
                        "
                      ></span>
                    </td>
                  </tr>
                  <tr>
                    <td style="height: 40px">&nbsp;</td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td style="height: 20px">&nbsp;</td>
            </tr>
            <tr>
              <td style="text-align: center">
                <p
                  style="
                    font-size: 14px;
                    color: rgba(69, 80, 86, 0.7411764705882353);
                    line-height: 18px;
                    margin: 0 0 0;
                  "
                >
                  <strong>www.finservkart.com</strong>
                </p>
              </td>
            </tr>
            <tr>
              <td style="height: 80px">&nbsp;</td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
</html>
HTML;
                
                insertToDB($conn, $type, $data);
                smtp_mailer($toemail, $bcc, $subject, $msgs);
                header("Location: new-conversation.php?pid=$PID&sent=true", true, 301);
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
        echo "";
    } catch (PDOException $error) {
        echo $error;
    }
}

function smtp_mailer($to, $bcc, $subject, $msg){
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
$mail->addBCC($bcc);
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

?>