<?php
include("../capture.php");
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
$result = "CID-" . $ran;
?>
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>SignUp</title>
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
                        <input type="hidden" class="form-control" name="CID" id="CID">
                        <input type="hidden" class="form-control" name="CProfile" id="CProfile" value="avatar.png">
                        <div class="row form-ro no-margin">
                           <input type="text" class="form-control form-control-sm" name="fname" id="fname" placeholder="First Name" autocomplete="new-fsname" required>
                        </div>
                        <div class="row form-ro no-margin">
                           <input type="text" class="form-control form-control-sm" name="lname" id="laname" placeholder="Last Name" autocomplete="new-lsname" required>
                        </div>
                        <div class="row form-ro no-margin">
                           <input type="email" class="form-control form-control-sm" name="email" id="email" placeholder="Email Address" autocomplete="new-email" oninput="this.value = this.value.toLowerCase()" required>
                        </div>
                        <div class="row form-ro no-margin">
                           <input type="text" class="form-control form-control-sm" name="phone" id="phone" placeholder="Contact No" pattern="[0-9]{10}" title="10 numeric characters only" maxlength="10" autocomplete="new-phone" required>
                        </div>
                        <div class="row form-ro no-margin">
                           <input type="text" class="form-control form-control-sm" id="referral" name="referral" placeholder="Paste Referral Code" maxlength="8" title="Referral code must be  8 characters long" pattern=".{8,}">
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
                              <p>Already have Account <a href="login.php">Sign In</a> </p>
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
     <script>
        var ran = Math.floor(Math.random() * (9999 - 1000 + 1)) + 1000;
        var result = "CID-" + ran;
        document.getElementById("CID").value = result;
      </script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
         document.getElementById('email').addEventListener('input', function() {
         var email = this.value;
         if(email) {
         var xhr = new XMLHttpRequest();
         xhr.open('GET', 'include/check_customer_email.php?email=' + encodeURIComponent(email), true);
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
        document.getElementById('referral').addEventListener('blur', function() {
            var referral = this.value;
            if(referral) {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'include/check_referral.php?referral=' + encodeURIComponent(referral), true);
                xhr.onload = function() {
                    if(this.status == 200) {
                        try {
                            var response = JSON.parse(this.responseText);
                            if(!response.exists) { // Check if the referral code does not exist
                                Swal.fire({
                                    title: 'Referral code invalid!',
                                    text: '',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                                document.getElementById('referral').value = '';
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
         document.getElementById('phone').addEventListener('input', function() {
         var phone = this.value;
         if(phone) {
         var xhr = new XMLHttpRequest();
         xhr.open('GET', '../api.function/check_customer_contact.php?phone=' + encodeURIComponent(phone), true);
         xhr.onload = function() {
         if(this.status ==   200) {
         try {
         var response = JSON.parse(this.responseText);
         if(response.exists) {
           Swal.fire({
             title: 'Contact No already exists!',
             text: '',
             icon: 'warning',
             confirmButtonText: 'OK'
           });
           document.getElementById('phone').value = '';
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
        document.getElementById('myForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission
    
            var formData = new FormData(this); // Create a new FormData instance
    
            // Use AJAX to submit the form data
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'include/customer_reg_api.php', true);
    
            
            Swal.fire({
                title: 'Please Wait...',
                allowOutsideClick: false,
                showConfirmButton: false, 
                onBeforeOpen: () => {
                    Swal.showLoading();
                },
                onClose: () => {
                    Swal.close();
                }
            });

    
            xhr.onload = function() {
                Swal.close(); // Close the initial SweetAlert
    
                if (this.status >= 200 && this.status < 400) {
                    // Success!
                    var response = JSON.parse(this.response);
                    Swal.fire({
                        title: response.message,
                        icon: response.status === 'success'? 'success' : 'error',
                        confirmButtonText: 'Login',
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirect to the login page after the user clicks 'Ok'
                            window.location.href = 'login.php';
                        }
                    });
                } else {
                    // We reached our target server, but it returned an error
                    Swal.fire({
                        title: 'Error',
                        text: 'There was an error with the request',
                        icon: 'error'
                    });
                }
            };
    
            xhr.onerror = function() {
                // There was a connection error of some sort
                Swal.fire({
                    title: 'Error',
                    text: 'There was an error with the request',
                    icon: 'error'
                });
            };
    
            xhr.send(formData); // Send the form data
        });
      </script>
</html>