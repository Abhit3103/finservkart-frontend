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
      <title>Prioject Status</title>
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
         if (isset($_GET['update']) && $_GET['update'] == 'true') {
             echo '<script type="text/javascript">';
             echo '$(document).ready(function() {';
             echo 'toastr.success("Status Applied Successfully");';
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
         <?php 
            $userid=$_SESSION['id'];
            $query=mysqli_query($con,"select * from ca where id='$userid'");
            while($result=mysqli_fetch_array($query)) {
            $fname = $result['fname'];
            }
            ?>
         <div class="pagetitle">
            <h1>Project Status</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item">Workflow</li>
                  <li class="breadcrumb-item active">Project Status</li>
               </ol>
            </nav>
         </div>
         <!-- End Page Title -->
         <?php 
            $pid=$_GET['pid'];
            $query=mysqli_query($con,"SELECT workflow.*, ca.*, workflow.email AS workflow_email, ca.email AS ca_email FROM workflow INNER JOIN ca ON workflow.CAID = ca.CAID WHERE workflow.pid = '$pid'");
            while($result=mysqli_fetch_array($query)) {
                $work = $result['workflow'];
                $name = $result['name'];
                $email = $result['workflow_email'];
                $service = $result['service'];
            } ?>
         <section class="section">
            <div class="row">
               <div class="col-lg-12">
                  <div class="card">
                     <div class="card-body">
                        <br/>
                        <label for="email"><b><i class='bi bi-signpost-2-fill me-1'></i> Project Status of <a href="status.php?pid=<?= htmlspecialchars($pid) ?>">#<?= htmlspecialchars($pid) ?></a></b></label>
                        <?php
                           switch($work) {
                               case 'Assigned':
                                   echo "<span class='badge bg-info'>Assigned</span>";
                                   echo "<br/><br/>";
                                   echo "<div class='alert border-primary alert-dismissible fade show' role='alert'>
                                           <b>&#128204; Notes:</b><br/>
                                           Hello " . htmlspecialchars($fname) . ",<br/> Exciting news! You've been officially assigned to our latest project, and it's time to hit the ground running.<br/>Consider this your launchpad: we're diving straight into action! Your role in this project is pivotal, and we're thrilled to have you on board.<br/>To get things rolling, we're marking the status as <b>Processing</b>, This signals the beginning of our journey together towards project success.<br/>Stay tuned for updates, milestones, and achievements as we progress through this exciting venture!
                                           <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close alert'></button>
                                        </div>";
                                   break;
                               case 'Processing':
                                   echo "<span class='badge bg-warning'>Processing</span>";
                                   echo "<br/><br/>";
                                   echo "<div class='alert border-warning alert-dismissible fade show' role='alert'>
                                           <b>&#128204; Notes:</b><br/>
                                            Welcome Back " . htmlspecialchars($fname) . ", <br/>I trust your project is exceeding all expectations and turning out to be truly exceptional!<br/>Please ensure that you've wrapped up all the outstanding tasks and updates. Kindly mark the status as <b>Completed</b>, once everything is done.<br/>Looking forward to seeing the remarkable results!
                                           <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close alert'></button>
                                        </div>";
                                   break;
                               case 'Completed':
                                   echo "<span class='badge bg-success'>Completed</span>";
                                   echo "<br/><br/>";
                                   echo "<div class='alert border-success alert-dismissible fade show' role='alert'>
                                           <b>&#128204; Notes:</b><br/>
                                            Hey " . htmlspecialchars($fname) . ", <br/>We're thrilled to extend our heartfelt <b>congratulations on successfully completing the project!</b> Your hard work, dedication, and sheer brilliance have truly shone through, and we couldn't be prouder of your accomplishments.<br/>Thank you for pouring your passion and expertise into this project. Your commitment to excellence has undoubtedly made a significant impact, and we're incredibly grateful for your invaluable contributions.<br/>Keep shining bright, " . htmlspecialchars($fname) . "!
                                        </div>";
                                   break;
                               default:
                                   echo "<span class='badge bg-secondary'>Backlist</span>";
                                   break;
                           }
                           ?>
                        <br/> 
                        <?php if ($work != "Completed"): ?>
                        <form method="POST" action="api/update.php?type=workflow&pid=<?= $pid ?>">
                           <div class="form-group col">
                              <label for="email"><b>Select Status</b></label>
                              <select class="form-control" name="status" aria-label="Default select example" style="border-color:purple">
                                 <option selected>--- Select Status ---</option>
                                 <?php
                                    if ($work == "Assigned") {
                                        echo "<option value='Processing'>Processing</option>";
                                    } elseif ($work == "Processing") {
                                        echo "<option value='Completed'>Completed</option>";
                                    }
                                    ?>
                              </select>
                           </div>
                           <br/>
                           <input type="hidden" name="name" value="<?= $name ?>">
                           <input type="hidden" name="email" value="<?= $email ?>">
                           <input type="hidden" name="service" value="<?= $service ?>">
                           <div class="form-group col">
                              <center><button type="submit" name="update" class="btn btn-dark btn-sm">Apply Status</button></center>
                           </div>
                        </form>
                        <?php endif; ?>
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