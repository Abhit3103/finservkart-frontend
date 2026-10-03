<?php   
session_start(); 
include("../capture.php");
include_once('../include/config.php');
include("include/db_connection.php");
$errorMessage = '';

// Code for login
if (isset($_POST['login'])) {
    $password = $_POST['password'];
    $useremail = $_POST['email'];

    // Secure query with prepared statements
    $stmt = $con->prepare("SELECT id, fname, lname, password FROM franchise WHERE email = ?");
    $stmt->bind_param("s", $useremail); // 's' stands for string type
    $stmt->execute();
    $result = $stmt->get_result(); // Get the result set

    // Check if query was successful
    if ($result) {
        $num = $result->fetch_assoc(); // Fetch the row

        // Check if user exists and password matches
      if ($num && $num['password'] === $password) {
    // Get referral_code also from database (you need to update your SELECT)
    $stmt = $con->prepare("SELECT id, fname, lname, password, referral_code FROM franchise WHERE email = ?");
    $stmt->bind_param("s", $useremail);
    $stmt->execute();
    $result = $stmt->get_result();
    $num = $result->fetch_assoc();

    $_SESSION['id'] = $num['id'];
    $_SESSION['name'] = $num['fname'];
    $_SESSION['franchise_referral_code'] = $num['referral_code']; // ⭐️ Save referral code here

    header("location: dashboard.php");
    exit();
}
 else {
            // Invalid credentials
            $errorMessage = "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">
                             Invalid Credentials
                           </div>";
        }
    } else {
        // SQL error
        $errorMessage = "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">
                             SQL error: " . $con->error . "
                           </div>";
    }
}
?>


<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Login</title>
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
      <link rel="shortcut icon" href="assets/assets/images/logo.png">
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
                        <img src="assets/login.svg" alt="">
                     </div>
                  </div>
                  <div class="col-md-7 detail-box">
                     <div class="detailsh col-lg-7 col-md-10 col-sm-7 col-11 mx-auto">
                        <img class="logo" src="logo.png" alt=""> 
                        <?= $errorMessage ?>
                        <form method="post">
                        <div class="row form-ro no-margin">
                           <input type="email" placeholder="Email ID" name="email" class="form-control form-control-sm" autocomplete="off" required>
                        </div>
                        <div class="row form-ro no-margin">
                           <div class="input-group" id="show_hide_password">
                              <input type="password" name="password" placeholder="Password" class="form-control form-control-sm" id="yourPassword" autocomplete="off" required>
                              <div class="input-group-append">
                                 <a href="#" class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                              </div>
                           </div>
                        </div>
                        <br/>
                        <div class="row form-ro fgbh">
                           <div class="col-6">
                              <a href="forgot-pass.php">Forget Password</a>
                           </div>
                           <div class="col-6">
                              <button type="submit" name="login" class="btn btn-sm btn-primary">Sign In</button>
                           </div>
                        </div>
                        <div class="row form-ro hlio fgbh">
                           <div class="col-md-12">
                              <p>Don't have account <a href="signup.php">Sign Up Now</a> </p>
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
    <script>
         $(document).ready(function() {
             $("#show_hide_password a").on('click', function(event) {
                 event.preventDefault();
                 if($('#show_hide_password input').attr("type") == "text"){
                     $('#show_hide_password input').attr('type', 'password');
                     $('#show_hide_password i').addClass( "fa-eye-slash" );
                     $('#show_hide_password i').removeClass( "fa-eye" );
                 }else if($('#show_hide_password input').attr("type") == "password"){
                     $('#show_hide_password input').attr('type', 'text');
                     $('#show_hide_password i').removeClass( "fa-eye-slash" );
                     $('#show_hide_password i').addClass( "fa-eye" );
                 }
             });
         });
    </script>
</html>