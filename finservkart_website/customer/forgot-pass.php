<?php
session_start();  
include_once('../include/config.php');
date_default_timezone_set('Asia/Kolkata');
include('../smtp/PHPMailerAutoload.php');

if(isset($_POST['send'])){
    $mail = new PHPMailer(); 
    $femail = $_POST['femail'];

    $stmt = $con->prepare("SELECT email, fname, password FROM customer WHERE email = ?");
    $stmt->bind_param("s", $femail);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $toemail = $row['email'];
        $fname = htmlspecialchars($row['fname'], ENT_QUOTES, 'UTF-8');
        $password=htmlspecialchars($row['password'], ENT_QUOTES, 'UTF-8');
        $subject = "Password Reset Request - Finservkart";
        $msg = <<<HTML
        <!doctypehtml><html lang=en-US><meta content="text/html; charset=utf-8"http-equiv=Content-Type><title>Finservkart</title><meta content="Thanks For Contact"name=description><style>a:hover{text-decoration:underline!important}</style><body leftmargin=0 marginheight=0 marginwidth=0 style=margin:0;background-color:#fff topmargin=0><table border=0 cellpadding=0 cellspacing=0 style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700);font-family:'Open Sans',sans-serif"width=100% bgcolor=#fff><tr><td><table border=0 cellpadding=0 cellspacing=0 style="background-color:#fff;max-width:670px;margin:0 auto"width=100% align=center><tr><td style=height:80px><tr><td style=text-align:center><a href=https://finservkart.com/ target=_blank title=logo><img alt=logo src=https://finservkart.com/img/email-logo.png title=logo width=120></a><tr><td style=height:20px><tr><td><table border=0 cellpadding=0 cellspacing=0 style="max-width:670px;background:#fff;border-radius:3px;text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06)"width=95% align=center><tr><td style=height:40px><tr><td style="padding:0 35px"><h1 style=color:#1e1e2d;font-weight:500;margin:0;font-size:32px;font-family:Rubik,sans-serif></h1><p align=left text style="font-size:15px;color:#455056;margin:8px 0 0;line-height:24px">Dear $fname,<br>I hope this email finds you well.<br>We have received a request to reset the password for your Finservkart account. As per your request, we are providing your username and password to regain access to your account:<br><p align=left text><strong>&#128231; Username: </strong>$toemail<br><strong>&#128273; Password: </strong>$password<br><a href="https://finservkart.com/user-login.php"><button style="background-color:#1204aa;border:none;color:#fff;padding:15px 15px;text-align:center;text-decoration:none;display:inline-block;font-size:16px;margin:2px 2px;cursor:pointer">Login Now</button></a><br/><p align=left text style="font-size:15px;color:#455056;margin:8px 0 0;line-height:24px">Please use the provided credentials to log in to your Finservkart account. Upon logging in, we highly recommend changing your password to something more secure for your account's safety.<br>If you did not request this password reset or have any concerns regarding your account security, please contact our support team immediately at <a href=info@finservkart.com>support@finservkart.com</a><br>Thank you for choosing Finservkart.<p align=right text><br>Regards,<br>Team Finservkart</p><span style="display:inline-block;vertical-align:middle;margin:29px 0 26px;border-bottom:1px solid #cecece;width:100px"></span><tr><td style=height:40px></table><tr><td style=height:20px><tr><td style=text-align:center><p style="font-size:14px;color:rgba(69,80,86,.7411764705882353);line-height:18px;margin:0 0 0">© <strong>www.finservkart.com</strong><tr><td style=height:80px></table></table>
HTML;

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
        $mail->addAddress($toemail);   
        $mail->Subject = $subject;
        $mail->Body = $msg;
        $mail->SMTPOptions=array('ssl'=>array(
            'verify_peer'=>false,
            'verify_peer_name'=>false,
            'allow_self_signed'=>false
        ));

        if(!$mail->send()) {
            $WarningMessage = "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\">
                                Try Again!
                               </div>";
        } else {
            $SuccessMessage = "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
                                 We sent your Password to email
                               </div>";
        }
    } else {
        $errorMessage = "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">
                             Email Can't Register
                           </div>"; 
    }
}
?>
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Forgot Password</title>
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
      <link rel="shortcut icon" href="assets/assets/images/fav.jpg">
      <link rel="stylesheet" href="assets/assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/assets/css/all.min.css">
      <link rel="stylesheet" href="assets/assets/css/animate.css">
      <link rel="stylesheet" href="assets/assets/plugins/slider/css/owl.carousel.min.css">
      <link rel="stylesheet" href="assets/assets/plugins/slider/css/owl.theme.default.css">
      <link rel="stylesheet" type="text/css" href="assets/assets/css/style.css" />
      <script type="text/javascript">
         function noBack() { 
             window.history.forward(); 
         }
         noBack();
         window.onload = noBack;
         window.onpageshow = function(evt) { 
             if (evt.persisted) { 
                 noBack(); 
             }
         };
         window.onunload = function() { null };
      </script>
   </head>
   <body class="form-login-body">
      <div class="container">
         <div class="row">
            <div class="col-lg-9 mx-auto login-desk">
               <div class="row">
                  <div class="col-md-5 loginform">
                     <div class="log-txt row no-margin">
                        <h2>FinservKart</h2>
                        <p>Welcome to FinservKart, your trusted partner in navigating the intricate landscape of financial services.</p>
                     </div>
                     <div class="login-det">
                        <img src="assets/forgot.svg" alt="">
                     </div>
                  </div>
                  <div class="col-md-7 detail-box">
                     <div class="detailsh col-lg-7 col-md-10 col-sm-7 col-11 mx-auto">
                        <img class="logo" src="logo.png" alt=""> 
                        <?= $errorMessage ?>
                        <?= $SuccessMessage ?>
                        <?= $WarningMessage ?>
                        <form method="post">
                        <div class="row form-ro no-margin">
                           <input type="email" placeholder="Registered Email ID" name="femail" id="femail" class="form-control form-control-sm" autocomplete="off" required>
                        </div>
                        <div class="row form-ro fgbh">
                           <div class="col-12">
                              <button type="submit" name="send" class="btn btn-sm btn-primary"> Send Requests</button>
                           </div>
                        </div>
                        <div class="row form-ro hlio fgbh">
                           <div class="col-md-12">
                              <p>Don't have account <a href="signup.php">Sign Up</a> </p><br/><p>Already have account <a href="login.php">Sign In</a> </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
   <script src="assets/assets/js/jquery-3.2.1.min.js"></script>
   <script src="assets/assets/js/popper.min.js"></script>
   <script src="assets/assets/js/bootstrap.min.js"></script>
   <script src="assets/assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
   <script src="assets/assets/plugins/slider/js/owl.carousel.min.js"></script>
   <script src="assets/assets/js/script.js"></script>
   <script src="assets/vendor/php-email-form/validate.js"></script>
   <script>
         $(document).ready(function(){
         $('.alert').delay(5000).slideUp(200, function() {
             $(this).alert('close');
         });
         });
    </script>
</html>