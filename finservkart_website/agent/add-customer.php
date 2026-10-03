<?php session_start();
   include_once('../include/config.php');
   if (strlen($_SESSION['id']==0)) {
   header('location:logout.php');
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
    $result = "CID-" . $ran;
?>
<!DOCTYPE html>
<html lang="en">
   <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Add Customer</title>
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
    <link href="../img/favcon.webp" rel="icon">
      <!-- Google Fonts -->
      <link href="https://fonts.gstatic.com" rel="preconnect">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
      <!-- Vendor CSS Files -->
      <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
      <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
      <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
      <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
      <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
      <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
      <!-- Template Main CSS File -->
      <link href="assets/css/style.css" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> 
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
      </style>
   </head>
   <body>
      <?php include("include/header.php"); ?>
      <?php include("include/sider.php"); ?>
      <main id="main" class="main">
        <script>
            $(document).ready(function() {
                if (window.location.search.indexOf('added=true') > -1) {
                    displayAlert();
                }
    
                function displayAlert() {
                    $("#alert").show();
                    setTimeout(function() {
                        $("#alert").fadeOut();
                    }, 3000);
                    window.history.replaceState(null, null, window.location.pathname);
                }
            });
         </script>
         <div class="pagetitle">
            <h1>Add Customer</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item">Customer</li>
                  <li class="breadcrumb-item active">Add Customer</li>
               </ol>
            </nav>
         </div>
         <?php 
            $userid=$_SESSION['id'];
            $query=mysqli_query($con,"select * from agent where id='$userid'");
            while($result=mysqli_fetch_array($query))
            { 
              $referral = $result['referral']; 
              $agnt_name = $result['fname'];
              $agnt_mail = $result['email'];
            } 
         ?>
         <!-- End Page Title -->
         
         <section class="section">
            <div class="row">
               <div class="col-lg-12">
                  <div class="card">
                     <div class="card-body">
                        <h5 class="card-title">Register Customer</h5>
                        <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                        <i class="bi bi-check-circle me-1"></i> Thank You, Registration Completed</div>
                        <form class="row g-3" action="api/addcustomer.php?type=customer&agnt_name=<?= $agnt_name ?>&agnt_mail=<?= $agnt_mail ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" class="form-control" name="CID" id="CID">
                            <input type="hidden" class="form-control" name="CProfile" id="CProfile" value="avatar.png">
                            <div class="col-md-12">
                              <div class="form-floating">
                                <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" autocomplete="new-fsname" required>
                                <label for="name">First Name</label>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-floating">
                                <input type="text" class="form-control" name="lname" id="laname" placeholder="Last Name" autocomplete="new-lsname" required>
                                <label for="email">Last Name</label>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-floating">
                              <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" title="Please enter valid email address" autocomplete="new-email" required oninput="this.value = this.value.toLowerCase()">
                              <label for="subject">Email ID</label>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-floating">
                              <input type="text" class="form-control" name="phone" id="phone" placeholder="Contact No" pattern="[0-9]{10}" title="10 numeric characters only" maxlength="10" autocomplete="new-phone"  required>
                              <label for="subject">Contact No</label>
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
                            <input type="hidden" class="form-control" id="referral" name="referral" value="<?= $referral ?>">
                            <div class="text-center">
                              <button type="submit" name="submit" class="btn btn-primary">Add</button>
                              <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                         </form><!-- End floating Labels Form -->
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </main>
      <!-- End #main -->
      <!-- ======= Footer ======= -->
      <?php include("include/footer.php"); ?>
      <!-- End Footer -->
      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
      <!-- Vendor JS Files -->
      <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
      <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="assets/vendor/chart.js/chart.umd.js"></script>
      <script src="assets/vendor/echarts/echarts.min.js"></script>
      <script src="assets/vendor/quill/quill.min.js"></script>
      <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
      <script src="assets/vendor/tinymce/tinymce.min.js"></script>
      <script src="assets/vendor/php-email-form/validate.js"></script>
      <!-- Template Main JS File -->
      <script src="assets/js/main.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
        var ran = Math.floor(Math.random() * (9999 - 1000 + 1)) + 1000;
        var result = "CID-" + ran;
        document.getElementById("CID").value = result;
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
      <script>
         document.getElementById('email').addEventListener('input', function() {
         var email = this.value;
         if(email) {
         var xhr = new XMLHttpRequest();
         xhr.open('GET', '../api.function/check_customer_email.php?email=' + encodeURIComponent(email), true);
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
   </body>
</html>