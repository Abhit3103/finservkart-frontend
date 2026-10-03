<?php
session_start();  
include_once('include/config.php');
date_default_timezone_set('Asia/Kolkata');
include('smtp/PHPMailerAutoload.php');

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
        <!doctypehtml><html lang=en-US><meta content="text/html; charset=utf-8"http-equiv=Content-Type><title>Finservkart</title><meta content="Thanks For Contact"name=description><style>a:hover{text-decoration:underline!important}</style><body leftmargin=0 marginheight=0 marginwidth=0 style=margin:0;background-color:#fff topmargin=0><table border=0 cellpadding=0 cellspacing=0 style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700);font-family:'Open Sans',sans-serif"width=100% bgcolor=#fff><tr><td><table border=0 cellpadding=0 cellspacing=0 style="background-color:#fff;max-width:670px;margin:0 auto"width=100% align=center><tr><td style=height:80px> <tr><td style=text-align:center><a href=https://finservkart.com/ target=_blank title=logo><img alt=logo src=https://finservkart.com/img/email-logo.png title=logo width=120></a><tr><td style=height:20px> <tr><td><table border=0 cellpadding=0 cellspacing=0 style="max-width:670px;background:#fff;border-radius:3px;text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06)"width=95% align=center><tr><td style=height:40px> <tr><td style="padding:0 35px"><h1 style=color:#1e1e2d;font-weight:500;margin:0;font-size:32px;font-family:Rubik,sans-serif></h1><p align=left text style="font-size:15px;color:#455056;margin:8px 0 0;line-height:24px">Dear $fname;<br>I hope this email finds you well.<br>We have received a request to reset the password for your Finservkart account. As per your request, we are providing your username and password to regain access to your account:<br><p align=left text><strong>&#128231; Username: </strong>$toemail<br><strong>&#128273; Password: </strong>$password<br><a href="https://finservkart.com/user-login.php"><button style="background-color:#1204aa;border:none;color:#fff;padding:15px 15px;text-align:center;text-decoration:none;display:inline-block;font-size:16px;margin:2px 2px;cursor:pointer">Login Now</button></a><br/><p align=left text style="font-size:15px;color:#455056;margin:8px 0 0;line-height:24px">Please use the provided credentials to log in to your Finservkart account. Upon logging in, we highly recommend changing your password to something more secure for your account's safety.<br>If you did not request this password reset or have any concerns regarding your account security, please contact our support team immediately at <a href=info@finservkart.com>support@finservkart.com</a><br>Thank you for choosing Finservkart.<p align=right text><br>Regards,<br>Team Finservkart</p><span style="display:inline-block;vertical-align:middle;margin:29px 0 26px;border-bottom:1px solid #cecece;width:100px"></span><tr><td style=height:40px> </table><tr><td style=height:20px> <tr><td style=text-align:center><p style="font-size:14px;color:rgba(69,80,86,.7411764705882353);line-height:18px;margin:0 0 0">© <strong>www.finservkart.com</strong><tr><td style=height:80px> </table></table>
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
                                 Email Sending Failed, Try Again!
                               </div>";
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            $SuccessMessage = "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
                                 We sent your Password to your registered email, Please check your E-Mail
                               </div>";
        }
    } else {
        $errorMessage = "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">
                             Email Can't Register, Please Create an account!
                           </div>"; 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8">
      <title>Password Recovery | Finservkart | Financial Services</title>
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta property="og:image" content="https://finservkart.com/logo.png">
      <meta name="subject" content="Finservkart">
      <meta name="subtitle" content="Welcome to FinservKart, your trusted partner in navigating the intricate landscape of financial services.">
      <meta name="description" content="At Finservkart, we understand the intricate dynamics of the financial landscape, and we are dedicated to empowering individuals and businesses with tailored financial solutions.">
      <meta name="keywords" content="">
      <meta name="catagory" content="Finance Provider">
      <meta name="identifier-URL" content="https://finservkart.com/">
      <meta name="coverage" content="Worldwide">
      <meta name='target' content='all'>
      <meta name='HandheldFriendly' content='True'>
      <meta http-equiv='Cache-Control' content='no-cache'>
      <meta http-equiv='imagetoolbar' content='no'>
      <meta http-equiv='x-dns-prefetch-control' content='off'>
      <meta name='og:email' content='info@finservkart.com'>
      <meta name='og:region' content='IN'>
      <meta name='og:country-name' content='INDIA'>
      <!-- Favicon -->
      <link href="img/favcon.webp" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <?php include("include/header.php"); ?>


    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-4 animated slideInDown">Password Recovery</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Password Recovery</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Login Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Password Recovery</p>
                    <h1 class="display-5 mb-4">Forgot Password?</h1>
                    <?= $errorMessage ?>
                    <?= $SuccessMessage ?>
                    <?= $WarningMessage ?>
                    <form method="post">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="femail" id="femail" placeholder="Your Registered Email" oninput="this.value = this.value.toLowerCase()" required>
                                    <label for="email">Your Registered Email</label>
                                </div>
                            </div>
                            <div class="col-8">
                                <button class="btn btn-success py-3 px-5" type="submit" name="send"><i class="fa fa-paper-plane" aria-hidden="true"></i> Submit Request</button>
                            </div>
                        </div>
                        <br/>
                        <h5><a href="user-signup.php">Sign Up</a> | <a href="user-login.php">Sign In</a> </h5>
                    </form>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 450px;">
                    <div class="position-relative rounded overflow-hidden h-100">
                        <img src="img/forgot-password.png" height="400" width="100%">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login End -->


    <?php include("include/footer.php"); ?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
         function togglePasswordVisibility() {
             var passwordInput = document.getElementById("password");
             if (passwordInput.type === "password") {
                 passwordInput.type = "text";
             } else {
                 passwordInput.type = "password";
             }
         }
    </script>
    <script>
    $(document).ready(function(){
    $('.alert').delay(5000).slideUp(200, function() {
        $(this).alert('close');
    });
    });
    </script>
</body>
</html>