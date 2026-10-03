<?php
   session_start();
   include("capture.php");
   // Generate a random number between  1000 and  9999
   $randomNumber = mt_rand(1000,  9999);
   // Prepend the random number with "CA-"
   $result = "CA-" . $randomNumber;
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>CA Signup | Finservkart | Financial Services</title>
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
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
      <!-- Icon Font Stylesheet -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
      <!-- Libraries Stylesheet -->
      <link href="lib/animate/animate.min.css" rel="stylesheet">
      <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
      <!-- Customized Bootstrap Stylesheet -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <!-- Modern Premium CSS -->
      <link href="css/modern-premium.css" rel="stylesheet">
      <!-- Template Stylesheet -->
      <link href="css/style.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
      <style>
         .show-pass{
         position: absolute;
         top:5%;
         right: 8%;
         }
         .progress-bar-danger {
         background-color: #e90f10;
         }
         .progress-bar-warning{
         background-color: #ffad00;
         }
         .progress-bar-success{
         background-color: #02b502;
         }
         .fa-eye{
         color: #022255;
         cursor: pointer;
         }
         .ex-account p a{
         color: #f6086e;
         text-decoration: underline;
         }
         .fa-circle{
         font-size: 6px;  
         }
         .fa-check{
         color: #02b502;
         }
         input[type=file] {
         width: 100%;
         max-width: 100%;
         color: #444;
         padding: 5px;
         background: #fff;
         border-radius: 8px;
         }
         input[type=file]::file-selector-button {
         margin-right: 20px;
         border: none;
         background: #084cdf;
         padding: 10px 10px;
         border-radius: 8px;
         color: #fff;
         cursor: pointer;
         transition: background .2s ease-in-out;
         }
         input[type=file]::file-selector-button:hover {
         background: #0d45a5;
         }
      </style>
   </head>
   <body style="font-family: 'Poppins', sans-serif;">
      <!-- Spinner Start -->
      <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
         <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
      </div>
      <!-- Spinner End -->
      <?php include("include/header.php"); ?>
      <!-- Page Header Start -->
      <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
         <div class="container position-relative z-1">
            <h1 class="display-3 mb-4 animated slideInDown">CA Registration</h1>
            <nav aria-label="breadcrumb animated slideInDown">
               <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">CA Signup</li>
               </ol>
            </nav>
         </div>
      </div>
      <!-- Page Header End -->
      <!-- Contact Start -->
      <div class="container-xxl py-5">
         <div class="container">
            <div class="row g-5">
               <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                  <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Signup</p>
                  <h1 class="display-5 mb-4">CA Register</h1>
                  <form id="myForm" method="POST" enctype="multipart/form-data">
                     <input type="hidden" class="form-control" name="CAID" id="CAID">
                     <input type="hidden" class="form-control" name="CAProfile" id="CAProfile" value="avatar.png">
                     <div class="row g-3">
                        <div class="col-md-6">
                           <div class="form-floating">
                              <input type="text" class="form-control form-control-sm" name="fname" id="fname" placeholder="First Name" autocomplete="new-fsname" required>
                              <label for="name">First Name</label>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-floating">
                              <input type="text" class="form-control form-control-sm" id="lname" name="lname" placeholder="Last Name" autocomplete="new-lsname" required>
                              <label for="email">Last Name</label>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-floating">
                              <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" title="Please enter valid email address" autocomplete="new-email" required oninput="this.value = this.value.toLowerCase()">
                              <label for="subject">Email ID</label>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-floating">
                              <input type="text" class="form-control" name="phone" id="phone" placeholder="Contact No" pattern="[0-9]{10}" title="10 numeric characters only" maxlength="10" autocomplete="new-phone"  required>
                              <label for="subject">Contact No</label>
                           </div>
                        </div>
                        <div class="col-12">
                           <div class="form-floating">
                              <input type="file" name="file[]" accept=".xlsx, .xls, .csv, .pdf, .png, .jpg, .jpeg, .doc, .docx, .txt, .pptx, .zip, .rar" multiple required>
                           </div>
                        </div>
                        <div class="col-12">
                           <div class="form-floating">
                              <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="new-password" required pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,}$" title="Must contain at least one uppercase letter, one lowercase letter, one digit, one special character, and be at least  8 characters long">
                              <label for="subject">Password</label>
                              <input type="checkbox" onclick="togglePasswordVisibility()"> Show Password
                           </div>
                        </div>
                        <div id="popover-password">
                           <p><span id="result"></span></p>
                           <div class="progress">
                              <div id="password-strength" 
                                 class="progress-bar" 
                                 role="progressbar" 
                                 aria-valuenow="40" 
                                 aria-valuemin="0" 
                                 aria-valuemax="100" 
                                 style="width:0%">
                              </div>
                           </div>
                           <ul class="list-unstyled">
                              <li class="">
                                 <span class="low-upper-case">
                                 <i class="fas fa-circle" aria-hidden="true"></i>
                                 &nbsp;Lowercase &amp; Uppercase
                                 </span>
                              </li>
                              <li class="">
                                 <span class="one-number">
                                 <i class="fas fa-circle" aria-hidden="true"></i>
                                 &nbsp;Number (0-9)
                                 </span> 
                              </li>
                              <li class="">
                                 <span class="one-special-char">
                                 <i class="fas fa-circle" aria-hidden="true"></i>
                                 &nbsp;Special Character (!@#$%^&*)
                                 </span>
                              </li>
                              <li class="">
                                 <span class="eight-character">
                                 <i class="fas fa-circle" aria-hidden="true"></i>
                                 &nbsp;Atleast 8 Character
                                 </span>
                              </li>
                           </ul>
                        </div>
                        <div class="col-12">
                           <button class="btn btn-primary py-3 px-5" type="submit" name="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i> Signup</button>
                        </div>
                        <h5><b style="color:green;">Already have an account? </b><a href="ca-login.php">Log In</a></h5>
                     </div>
                  </form>
               </div>
               <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 450px;">
                  <div class="position-relative rounded overflow-hidden h-100">
                     <img src="img/sign-up-8044448-6430849.png">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Contact End -->
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
        var ran = Math.floor(Math.random() * (9999 - 1000 + 1)) + 1000;
        var result = "CAID-" + ran;
        document.getElementById("CAID").value = result;
      </script>
      <script>
         let state = false;
         let password = document.getElementById("password");
         let passwordStrength = document.getElementById("password-strength");
         let lowUpperCase = document.querySelector(".low-upper-case i");
         let number = document.querySelector(".one-number i");
         let specialChar = document.querySelector(".one-special-char i");
         let eightChar = document.querySelector(".eight-character i");
         
         password.addEventListener("keyup", function(){
         let pass = document.getElementById("password").value;
         checkStrength(pass);
         });
         
         function toggle(){
         if(state){
         document.getElementById("password").setAttribute("type","password");
         state = false;
         }else{
         document.getElementById("password").setAttribute("type","text")
         state = true;
         }
         }
         
         function myFunction(show){
         show.classList.toggle("fa-eye-slash");
         }
         
         function checkStrength(password) {
         let strength = 0;
         
         //If password contains both lower and uppercase characters
         if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
         strength += 1;
         lowUpperCase.classList.remove('fa-circle');
         lowUpperCase.classList.add('fa-check');
         } else {
         lowUpperCase.classList.add('fa-circle');
         lowUpperCase.classList.remove('fa-check');
         }
         //If it has numbers and characters
         if (password.match(/([0-9])/)) {
         strength += 1;
         number.classList.remove('fa-circle');
         number.classList.add('fa-check');
         } else {
         number.classList.add('fa-circle');
         number.classList.remove('fa-check');
         }
         //If it has one special character
         if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
         strength += 1;
         specialChar.classList.remove('fa-circle');
         specialChar.classList.add('fa-check');
         } else {
         specialChar.classList.add('fa-circle');
         specialChar.classList.remove('fa-check');
         }
         //If password is greater than 7
         if (password.length > 7) {
         strength += 1;
         eightChar.classList.remove('fa-circle');
         eightChar.classList.add('fa-check');
         } else {
         eightChar.classList.add('fa-circle');
         eightChar.classList.remove('fa-check');   
         }
         
         // If value is less than 2
         if (strength < 2) {
         passwordStrength.classList.remove('progress-bar-warning');
         passwordStrength.classList.remove('progress-bar-success');
         passwordStrength.classList.add('progress-bar-danger');
         passwordStrength.style = 'width: 10%';
         } else if (strength == 3) {
         passwordStrength.classList.remove('progress-bar-success');
         passwordStrength.classList.remove('progress-bar-danger');
         passwordStrength.classList.add('progress-bar-warning');
         passwordStrength.style = 'width: 60%';
         } else if (strength == 4) {
         passwordStrength.classList.remove('progress-bar-warning');
         passwordStrength.classList.remove('progress-bar-danger');
         passwordStrength.classList.add('progress-bar-success');
         passwordStrength.style = 'width: 100%';
         }
         }
      </script>
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
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
         document.getElementById('email').addEventListener('input', function() {
         var email = this.value;
         if(email) {
         var xhr = new XMLHttpRequest();
         xhr.open('GET', 'api.function/check_ca_email.php?email=' + encodeURIComponent(email), true);
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
         document.getElementById('phone').addEventListener('input', function() {
         var phone = this.value;
         if(phone) {
         var xhr = new XMLHttpRequest();
         xhr.open('GET', 'api.function/check_ca_contact.php?phone=' + encodeURIComponent(phone), true);
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
            xhr.open('POST', 'api.function/ca_reg_api.php', true);
    
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
                            window.location.href = 'ca-login.php';
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
   </body>
</html>