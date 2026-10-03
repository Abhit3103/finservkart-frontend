<?php
   session_start();
   include_once('../include/config.php');
   date_default_timezone_set('Asia/Kolkata');
   
   if (strlen($_SESSION['id']) ==   0) {
       header('location:logout.php');
       exit();
   }
   
   $userid = $_SESSION['id'];
   $query = mysqli_query($con, "SELECT * FROM agent WHERE id='$userid'");
   $result = mysqli_fetch_array($query);
   $pid = $result['AGID'];
   $fname = $result['fname'];
   $lname = $result['lname'];
   
   if (isset($_POST['submit'])) {
       $pid = $_POST['pid'];
       $name = $_POST['name'];
       $subject = $_POST['subject'];
       $message = $_POST['message']; // Corrected typo here
       $sdate = date('Y-m-d H:i:s'); // Corrected date format
   
       // Using prepared statements to prevent SQL injection
       $stmt = $con->prepare("INSERT INTO support (pid, name, subject, message, sdate) VALUES (?, ?, ?, ?, ?)");
       $stmt->bind_param("sssss", $pid, $name, $subject, $message, $sdate);
   
       if ($stmt->execute()) {
           $SuccessMessage = "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
                                  Thank You, Our Team will connect with you very soon
                              </div>";
       } else {
           $errorMessage = "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">
                                  Something went wrong, Try Again!
                              </div>";
       }
   
       $stmt->close();
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Support</title>
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
      <link href="../customer/assets/css/button.css" rel="stylesheet">
   </head>
   <body>
      <?php include("include/header.php"); ?>
      <?php include("include/sider.php"); ?>
      <main id="main" class="main">
         <div class="pagetitle">
            <h1>Support</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item active">Support</li>
               </ol>
            </nav>
         </div>
         <?php include_once('../customer/api/init.php'); ?>
         <!-- End Page Title -->
         <section class="section contact">
            <div class="row gy-4">
               <div class="col-xl-6">
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="info-box card">
                           <i class="bi bi-envelope"></i>
                           <h3>Email Us</h3>
                           <p><a href="mailto:<?= $email ?>"><?= $email ?></a></p>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="info-box card">
                           <i class="bi bi-telephone"></i>
                           <h3>Call Us</h3>
                           <p><a href="tel:<?= $phone ?>">+91 <?= $phone ?></a></p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-6">
                  <div class="card p-4">
                     <?php echo isset($errorMessage) ? $errorMessage : ''; ?>
                     <?php echo isset($SuccessMessage) ? $SuccessMessage : ''; ?>
                     <form method="post">
                        <div class="row gy-4">
                           <div class="col-md-6">
                              <input type="hidden" name="pid" class="form-control" value="<?= $pid  ?>">
                           </div>
                           <div class="col-md-6">
                              <input type="hidden" class="form-control" name="name" value="<?= $fname . ' ' . $lname ?>">
                           </div>
                           <div class="col-md-12">
                              <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                           </div>
                           <div class="col-md-12">
                              <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                           </div>
                           <div class="col-md-12 text-center">
                              <button type="submit" name="submit" class="custom-btn btn-1">Send</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            </div>
         </section>
      </main>
      <!-- End #main -->
      <!-- ======= Footer ======= -->
      <?php include("include/footer.php"); ?>
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
      <script>
         $(document).ready(function(){
         $('.alert').delay(5000).slideUp(200, function() {
             $(this).alert('close');
         });
         });
      </script>
   </body>
</html>