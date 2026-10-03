<?php
include("../capture.php");
include("../db_connection.php"); // your db connection
require '../smtp/PHPMailerAutoload.php';

function smtp_mailer($to, $subject, $msg) {
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
    $mail->Body = $msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions = ['ssl' => ['verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => false]];
    $mail->Send();
}

function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$referralCode = generateRandomString(8);
$ran = mt_rand(1000, 9999);
$result = "FID-" . $ran;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $FID = $_POST['FID'];
    $FProfile = $_POST['FProfile'];
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $password = $_POST['password'];
    $referralCode = substr($phone, -6);

    $sql = "INSERT INTO franchise (FranID, FProfile, fname, lname, email, phone, address, password, referral_code, is_approved) 
            VALUES ('$FID', '$FProfile', '$fname', '$lname', '$email', '$phone', '$address', '$password', '$referralCode', 'no')";

    if (mysqli_query($conn, $sql)) {
        // Notify Admin
        $adminEmail = "info@finservkart.com";
        $subject = "New Franchise Registration - $fname $lname";
        $msg = "
        <html>
        <body>
            <p>A new franchise has registered:</p>
            <p><strong>Name:</strong> $fname $lname<br>
            <strong>Email:</strong> $email<br>
            <strong>Phone:</strong> $phone</p>
            <p>Please review and approve the registration in the admin panel.</p>
        </body>
        </html>
        ";
        smtp_mailer($adminEmail, $subject, $msg);

        echo "
        <div id='successModal' style='display:block; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 80%; max-width: 400px; background-color: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); z-index: 9999;'>
            <span onclick='closeModal()' style='position: absolute; top: 10px; right: 10px; font-size: 20px; cursor: pointer; color: #333;'>×</span>
            <h2 style='text-align: center; font-size: 24px;'>Registration Successful!</h2>
            <p style='text-align: center;'>Please wait for admin approval. You will be notified once your account is approved.</p>
            <div style='text-align: center; margin-top: 20px;'>
                <a href='index.php' style='padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;'>Login</a>
            </div>
        </div>

        <script>
        function closeModal() {
            document.getElementById('successModal').style.display = 'none';
        }

        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('myForm');
            if (form) {
                form.reset();
            }
        });
        </script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>SignUp</title>
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
      <link rel="shortcut icon" href="assets/assets/images/logo.png">
      <link rel="stylesheet" href="assets/assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/assets/css/all.min.css">
      <link rel="stylesheet" href="assets/assets/css/animate.css">
      <!-- <link rel="stylesheet" href="assets/assets/plugins/slider/css/owl.carousel.min.css"> -->
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
                        <p>Trust is the foundation of our relationship with clients. Finservkart operates with the highest standards of transparency and ethical conduct. Our commitment to integrity ensures that you can have complete confidence in the services we provide.</p>
                     </div>
                     <div class="login-det">
                        <img src="assets/signup.svg" alt="">
                     </div>
                  </div>
                  <div class="col-md-7 detail-box">
                     <div class="detailsh col-lg-7 col-md-10 col-sm-7 col-11 mx-auto">
                        <img class="logo" src="logo.png" alt=""> 
                        <form id="myForm" method="POST" enctype="multipart/form-data">


<input type="hidden" class="form-control" name="FID" id="FID" value="<?php echo $result; ?>">
<input type="hidden" class="form-control" name="FProfile" id="FProfile" value="avatar.png">
                        <div class="row form-ro no-margin">
                           <input type="text" class="form-control form-control-sm" name="fname" id="fname" placeholder="First Name" autocomplete="new-fsname" required>
                        </div>
                        <div class="row form-ro no-margin">
                           <input type="text" class="form-control form-control-sm" name="lname" id="lname" placeholder="Last Name" autocomplete="new-lsname" required>
                        </div>
                        <div class="row form-ro no-margin">
                           <input type="email" class="form-control form-control-sm" name="email" id="email" placeholder="Email Address" autocomplete="new-email" oninput="this.value = this.value.toLowerCase()" required>
                        </div>
                        <div class="row form-ro no-margin">
                           <input type="text" class="form-control form-control-sm" name="phone" id="phone" placeholder="Contact No" pattern="[0-9]{10}" title="10 numeric characters only" maxlength="10" autocomplete="new-phone" required>
                        </div>
                        <div class="row form-ro no-margin">
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter  address">
                        </div>
                 
                        <div class="row form-ro no-margin">
                           <div class="input-group" id="show_hide_password">
                              <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Password" autocomplete="new-password" required pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,}$" title="Must contain at least one uppercase letter, one lowercase letter, one digit, one special character, and be at least  8 characters long">
                              <div class="input-group-append">
                                 <a href="#" class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                              </div>
                           </div>
                        </div>
                        <br/>
                        <div class="row form-ro fgbh">
                           <div class="col-12">
                              <button type="submit" class="btn btn-sm btn-primary">Sign Up</button>
                           </div>
                        </div>
                        <div class="row form-ro hlio fgbh">
                           <div class="col-md-12">
                              <p>Already have Account <a href="index.php">Sign In</a> </p>
                           </div>
                        </div>
                    </form>
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
   <!-- <script src="assets/assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
   <script src="assets/assets/plugins/slider/js/owl.carousel.min.js"></script> -->
   <script src="assets/assets/js/script.js"></script>
    <script>
         $(document).ready(function() {
             $("#show_hide_password a").on('click', function(event) {
                 event.preventDefault();
                 if($('#show_hide_password input').attr("type") == "text"){
                     $('#show_hide_password input').attr('type', 'password');
                     $('#show_hide_password i').addClass( "fa-eye-slash" );
                     $('#show_hide_password i').removeClass( "fa-eye" );
                 }else if($('#show_hide_password input').attr("type") == "password"){
                     It's Rohit, [09-05-2025 14:01]
$('#show_hide_password input').attr('type', 'text');
                     $('#show_hide_password i').removeClass( "fa-eye-slash" );
                     $('#show_hide_password i').addClass( "fa-eye" );
                 }
             });
         });
     </script>
   
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
         document.getElementById('email').addEventListener('input', function() {
         var email = this.value;
         if(email) {
         var xhr = new XMLHttpRequest();
         xhr.open('GET', 'include/check_franchise_email.php?email=' + encodeURIComponent(email), true);
         xhr.onload = function() {
         if(this.status ==   200) {
         try {
         var response = JSON.parse(this.responseText);
         if(response.exists) {
           Swal.fire({
             title: 'Email already exists!',
             text: '',
             icon: 'warning',
             confirmButtonText: 'OK'
           });
           document.getElementById('email').value = '';
         }
         } catch (e) {
         console.error('Parsing error:', e);
         }
         }
         };
         xhr.onerror = function() {
         console.error('Request failed');
         };
         xhr.send();
         }
         });
      </script>
     
      <script>
document.addEventListener('DOMContentLoaded', function () {
    const togglePassword = document.querySelector('#show_hide_password a');
    const passwordInput = document.querySelector('#show_hide_password input');
    const icon = document.querySelector('#show_hide_password i');

    togglePassword.addEventListener('click', function (e) {
        e.preventDefault();
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        } else {
            passwordInput.type = "password";
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        }
    });
});
</script>

</html>