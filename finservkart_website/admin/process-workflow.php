<?php session_start();
   if (strlen($_SESSION['adminid']==0)) {
    header('location:logout.php');
    } else{
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Process Workflow / Admin</title>
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
         if (isset($_GET['isDeleted']) && $_GET['isDeleted'] == 'true') {
             echo '<script type="text/javascript">';
             echo '$(document).ready(function() {';
             echo 'toastr.success("Records Deleted Successfully");';
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
            <h1>Process Workflow</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item">Workflow</li>
                  <li class="breadcrumb-item active">Process Workflow</li>
               </ol>
            </nav>
         </div>
         <!-- End Page Title -->
         <div class="card">
         <div class="card-body">
            <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="profileModalLabel">CA Profile Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body" id="profileModalBody">
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-octagon me-1"></i> Close</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <section class="section">
            <div class="row">
               <div class="col-lg-12">
                  <div class="card">
                     <div class="card-body">
                        <h5 class="card-title"></h5>
                        <div class="table-responsive">
                           <table class="table table-borderless datatable">
                              <thead class="table-dark">
                                 <tr>
                                    <th>Sno.</th>
                                    <th>SID</th>
                                    <th>Name</th>
                                    <th>CA ID</th>
                                    <th>Service</th>
                                    <th>Status</th>
                                    <th>Files</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    $qry = $con->query("SELECT * FROM `workflow` WHERE workflow = 'Processing'");
                                    $i = 1;
                                    while($row = $qry->fetch_assoc()):
                                    $original_date = $row['asgndate'];
                                    $timestamp = strtotime($original_date);
                                    $new_date = date("d/m/y", $timestamp);
                                    ?>
                                 <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row['pid'];?></td>
                                    <td><?php echo $row['name'];?></td>
                                    <td><?php echo $row['CAID'];?> <i style="color: tomato;" class="bi bi-record2 me-1" data-caid="<?php echo $row['CAID'];?>" data-toggle="modal" data-target="#profileModal"></i></td>
                                    <td><?php echo $row['service'];?></td>
                                    <td><span class="badge bg-warning"><i class="bi bi-hourglass-split me-1"></i><?php echo $row['workflow'];?></span></td>
                                    <td><a href="../customer/api/<?php echo $row['documents'];?>" download><img src="../icons/download_folder_file.ico" width="30" height="30" /></a></td>
                                    <td><?php echo $new_date;?></td>
                                    <td>
                                       <a href="conversation.php?pid=<?php echo $row['pid'];?>" onClick="return confirmChat(event, '<?php echo $row['pid']; ?>');">
                                           <img src="../icons/letter_sms_talk.ico" width="25" height="25" /></a>
                                    </td>
                                 </tr>
                                 <?php endwhile; ?>
                              </tbody>
                           </table>
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
      function confirmChat(event, id) {
          event.preventDefault();
          Swal.fire({
              title: "Conversation",
              text: "Do you want to see the conversations",
              icon: "info",
              showCancelButton: true,
              confirmButtonText: "Yes",
              cancelButtonText: "No",
              dangerMode: true,
          }).then((result) => {
              if (result.isConfirmed) {
                  window.location.href = "conversation.php?pid=" + id;
              }
          });
      }
      </script>
      <script>
         $(document).ready(function(){
         $('.bi-record2').on('click', function(){
          var caid = $(this).data('caid');
          $.ajax({
              url: 'api/fetch_ca_profile.php',
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
<?php } ?>