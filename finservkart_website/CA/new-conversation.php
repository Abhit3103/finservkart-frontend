<?php session_start();
   include_once('../include/config.php');
   if (strlen($_SESSION['id']==0)) {
   header('location:logout.php');
   die();
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>New Conversation</title>
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
         if (isset($_GET['sent']) && $_GET['sent'] == 'true') {
             echo '<script type="text/javascript">';
             echo '$(document).ready(function() {';
             echo 'toastr.success("Message Sent Successfully");';
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
            <h1>New Conversation</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item">Workflow</li>
                  <li class="breadcrumb-item active">New Conversation</li>
               </ol>
            </nav>
         </div>
         <!-- End Page Title -->
         <?php 
            $pid=$_GET['pid'];
            $query=mysqli_query($con,"SELECT workflow.*, ca.*, workflow.email AS workflow_email, ca.email AS ca_email FROM workflow INNER JOIN ca ON workflow.CAID = ca.CAID WHERE workflow.pid = '$pid'");
            while($result=mysqli_fetch_array($query)) {
                $work = $result['workflow'];
                $CAID = $result['CAID'];
                $CustID = $result['CustID'];
                $CustName = $result['name'];
                $CAFname = $result['fname'];
                $CALname = $result['lname'];
                $CustEmail = $result['workflow_email'];
                $CAEmail = $result['ca_email'];
                $service = $result['service'];
                $workflow = $result['workflow'];
            } ?>
         <section class="section">
            <div class="row">
               <div class="col-lg-12">
                  <div class="card">
                     <br/>
                     <div class="card-body">
                        <form class="row g-3" action="chat_socket.php?type=conversation" method="POST" enctype="multipart/form-data">
                           <div class="col-12">
                                        <label for="inputAddress" class="form-label">Subject</label>
                                        <input class="form-control" name="sub" type="text" required>
                           </div>
                           <?php
                           if ($workflow != "Completed") {
                                echo '
                                    <div class="col-12">
                                        <label for="inputAddress" class="form-label">Write Messages</label>
                                        <textarea class="tinymce-editor" name="message"></textarea>
                                    </div>';
                            }
                           ?>
                           <div class="col-12">
                              <label for="inputAddress" class="form-label">Upload Documents</label>
                              <input class="form-control" name="file[]" accept=".xlsx, .xls, .csv, .pdf, .png, .jpg, .jpeg, .doc, .docx, .txt, .pptx, .zip, .rar" type="file" id="formFile" multiple>
                           </div>
                           <input class="form-control" name="pid" value="<?= $pid ?>" type="hidden">
                           <input class="form-control" name="CAID" value="<?= $CAID ?>" type="hidden">
                           <input class="form-control" name="CustID" value="<?= $CustID ?>" type="hidden">
                           <input class="form-control" name="CustName" value="<?= $CustName ?>" type="hidden">
                           <input class="form-control" name="CAName" value="<?= $CAFname ?> <?= $CALname ?>" type="hidden">
                           <input class="form-control" name="CustEmail" value="<?= $CustEmail ?>" type="hidden">
                           <input class="form-control" name="CAEmail" value="<?= $CAEmail ?>" type="hidden">
                           <input class="form-control" name="service" value="<?= $service ?>" type="hidden">
                           <div class="text-center">
                              <button type="submit" name="submit" class="btn btn-primary">Send Message</button>
                              <button type="reset" class="btn btn-secondary">Reset</button>
                           </div>
                        </form>
                     </div>
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
         function confirmStatus(event, id) {
             event.preventDefault();
             Swal.fire({
                 title: "Start Project",
                 text: "Do you want to start this project?",
                 icon: "question",
                 showCancelButton: true,
                 confirmButtonText: "Yes",
                 cancelButtonText: "No",
                 dangerMode: true,
             }).then((result) => {
                 if (result.isConfirmed) {
                     window.location.href = "status.php?pid=" + id;
                 }
             });
         }
      </script>
      <script>
         $(document).ready(function(){
         $('.bi-record2').on('click', function(){
          var caid = $(this).data('caid');
          $.ajax({
              url: 'api/fetch_customer_profile.php',
              type: 'POST',
              data: {caid: caid},
              success: function(response) {
                  $('#profileModalBody').html(response);
                  $('#profileModal').modal('show');
              }
          });
         });
         });
      </script>
   </body>
</html>