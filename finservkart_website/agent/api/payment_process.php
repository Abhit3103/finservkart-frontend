<?php
// Database connection parameters
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'WindRed@12345');
define('DB_NAME', 'finservkart');
date_default_timezone_set('Asia/Kolkata');
include('../../smtp/PHPMailerAutoload.php');
// Create a new PDO connection
try {
    $conn = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Function to redirect to a specified location
function redirect_to($new_location) {
    header("Location: " . $new_location);
    exit;
}

// Check if form data is submitted
if(isset($_POST['payment_id'], $_POST['pID'], $_POST['CustID'], $_POST['name'], $_POST['email'], $_POST['contact'], $_POST['referral'], $_POST['serviceid'], $_POST['service'], $_POST['amt'])){
    if(isset($_FILES['file']) && !empty($_FILES['file'])) {
        // Ensure the documents directory exists
        $documentsDir = '../../customer/api/documents/';
        if (!file_exists($documentsDir)) {
            mkdir($documentsDir, 0777, true); // Create directory with read/write permissions
        }

        $zip = new ZipArchive();
        $PID = $GLOBALS['conn']->quote($_POST['pID']);
        // Remove any quotes from $PID to avoid issues with file names
        $PID = str_replace("'", "", $PID);
        $zip_file_name = $documentsDir . $PID . '.zip';

        if($zip->open($zip_file_name, ZipArchive::CREATE) === true) {
            foreach($_FILES['file']['tmp_name'] as $key => $tmpName){
                $file_name = $_FILES['file']['name'][$key];
                $zip->addFile($tmpName, $file_name);
            }
            if ($zip->close() === false) {
                die("Couldn't close Zip Archive");
            }
        } else {
            die("Couldn't create Zip Archive");
        }
    }
    
    // Prepare data for insertion
    $payment_id = $_POST['payment_id'];
    $pID = $_POST['pID'];
    $CustID = $_POST['CustID'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $referral = $_POST['referral'];
    $serviceid = $_POST['serviceid'];
    $service = $_POST['service'];
    $amt = $_POST['amt'];
    $regdate = date('Y-m-d h:i:s');
    $payment_status = "Paid";
    $isPaid = "Yes";
    $workflow = "Pending";
    $isCommission = "No";
    
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

$cname =  $_POST['name'];
$cname = htmlspecialchars($cname, ENT_QUOTES, 'UTF-8');
$subject =  "Thank you for your Payment - Finservkart";   

$msg = <<<HTML
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
      bgcolor="#f2f3f8"
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
                      >
                        Thank You
                      </h1>
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
                        Dear $cname; <br />I hope this email finds you well. I
                        wanted to take a moment to express my gratitude for your
                        recent payment for the <b> $service </b>provided by
                        Finservkart. Your prompt payment is greatly appreciated
                        and ensures the continuation of our services.
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
                        <a href="https://finservkart.com/invoice.php?pid=$pID"
                          ><button
                            style="
                              background-color: #1204aa;
                              border: none;
                              color: white;
                              padding: 15px 15px;
                              text-align: center;
                              text-decoration: none;
                              display: inline-block;
                              font-size: 16px;
                              margin: 2px 2px;
                              cursor: pointer;
                            "
                          >
                            Download Invoice #$pID
                          </button></a
                        ><br />
                        The payment ID associated with your transaction is
                        <b>$payment_id</b>, which helps us efficiently track and
                        process your payment.<br />
                        Once again, thank you for your trust in Finservkart.
                        Should you have any questions or require further
                        assistance, please don't hesitate to reach out to us.
                      </p>
                      <p text align="right">
                        <br />Regards,<br />Team Finservkart
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

    // send mail
    smtp_mailer($email, $subject, $msg);
    
    // Prepare SQL statement
    $sql = "INSERT INTO srv_tranaction (payment_id, pID, CustID, name, email, contact, referral, serviceid, service, amt, payment_status, documents, regdate, isPaid, workflow, isCommission) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Execute the prepared statement
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([$payment_id, $pID, $CustID, $name, $email, $contact, $referral, $serviceid, $service, $amt, $payment_status, $zip_file_name, $regdate, $isPaid, $workflow, $isCommission]);
        
        echo "";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>