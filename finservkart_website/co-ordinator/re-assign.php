<?php session_start();
   include_once('../include/config.php');
   if (strlen($_SESSION['adminid']==0)) {
    header('location:logout.php');
    } else{
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Re Assign Work / Admin</title>
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
      <?php 
         if (isset($_GET['reassigned']) && $_GET['reassigned'] == 'true') {
             echo '<script type="text/javascript">';
             echo '$(document).ready(function() {';
             echo 'toastr.success("Re-Assigned Completed");';
             echo '});';
             echo '</script>';
         }
         ?>
      <script>
         $(document).ready(function() {
             toastr.options = {
                 "closeButton": true,
                 "debug": false,
                 "newestOnTop": false,
                 "progressBar": false,
                 "positionClass": "toast-top-right",
                 "preventDuplicates": false,
                 "onclick": null,
                 "showDuration": "300",
                 "hideDuration": "1000",
                 "timeOut": "5000",
                 "extendedTimeOut": "1000",
                 "showEasing": "swing",
                 "hideEasing": "linear",
                 "showMethod": "fadeIn",
                 "hideMethod": "fadeOut"
             }
         });
         
         function toast(message) {
             toastr.success(message);
         }
      </script>
      <style>
         .btn-secondary {
         color: #fff;
         background-color: #000;
         border-color: #dee2e6;
         box-shadow: none;
         }  
      </style>
   </head>
   <body>
      <?php include("include/header.php"); ?>
      <?php include("include/sider.php"); ?>
      <main id="main" class="main">
         <div class="pagetitle">
            <h1>Re Assign Work</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item">Workflow</li>
                  <li class="breadcrumb-item active">Re Assign Work</li>
               </ol>
            </nav>
         </div>
         <?php
            $caid = $_GET['cid'];
            $pid = $_GET['pid'];
            $query = "SELECT * FROM ca WHERE CAID = ?";
            $stmt = $con->prepare($query);
            $stmt->bind_param("s", $caid);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            echo '<div class="card mb-3">
                   <div class="row g-0">
                    <div class="col-md-4" style="width: 175px; height: 175px; overflow: hidden;">
                    <img src="../../CA/assets/profile/'.$row['CAProfile'].'" class="img-fluid rounded-start" alt="..." style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="col-md-8">
                       <div class="card-body">
                         <p class="card-text">
                             <ul>
                                 <li>CA ID: '.$row['CAID'].'</li>
                                 <li>Name: '.$row['fname'].' '.$row['lname'].'</li>
                                 <li>Email : '.$row['email'].'</li>
                                 <li>Phone : '.$row['phone'].'</li>
                             </ul>
                         </p>
                       </div>
                    </div>
                   </div>
                 </div>';
            } else {
            echo "Profile not found.";
            }
            $stmt->close();
            ?>
         <!-- End Page Title -->
         <section class="section">
            <div class="row">
               <div class="col-lg-12">
                  <div class="card">
                     <div class="card-body">
                        <h5 class="card-title"></h5>
                        <!-- Horizontal Form -->
                        <form action="api/update.php?type=workflow&pid=<?= $pid ?>" method="POST">
                           <div class="row mb-3">
                              <label for="inputEmail3" class="col-sm-2 col-form-label">Select CA</label>
                              <div class="col-sm-10">
                                 <select class="form-control" name="CAID" aria-label="Default select example" required>
                                    <option hidden="" disabled="disabled" selected="selected" value="">--- Select CA  ---</option>
                                    <?php
                                       $sql = "SELECT * FROM ca";
                                       $result = mysqli_query($con, $sql);
                                       if (mysqli_num_rows($result) > 0) {
                                       while ($row = mysqli_fetch_assoc($result)) {
                                       echo '<option value="' . $row['CAID'] . '">' . $row['fname'] .  ' ' . $row['lname'] . '</option>';
                                       }
                                       } else {
                                       echo '<option>No CA Found</option>';
                                       }
                                       ?>
                                 </select>
                              </div>
                           </div>
                           <div class="text-center">
                              <button type="submit" name="update" class="btn btn-primary">Re-Assign</button>
                              <button type="reset" class="btn btn-secondary">Reset</button>
                           </div>
                        </form>
                        <!-- End Horizontal Form -->
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
   </body>
</html>
<?php } ?>