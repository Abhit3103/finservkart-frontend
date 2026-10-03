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
      <title>View Conversation</title>
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
            <h1>My Conversation</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item">Workflow</li>
                  <li class="breadcrumb-item active">View Conversation</li>
               </ol>
            </nav>
         </div>
          <?php 
            $id=$_GET['id'];
            $query=mysqli_query($con,"select * from conversation where id='$id'");
            while($result=mysqli_fetch_array($query)) {
            $CustName = $result['CustName'];
            $CAName = $result['CAName'];
            $msg = $result['message'];
            $finalMSG = htmlspecialchars_decode($msg);
          }
         ?>
         <section class="section">
            <div class="row">
               <div class="col-lg-12">
                  <div class="card">
                     <div class="card-body">
                        <h5 class="card-title"></h5>
                        <table
                           cellspacing="0"
                           border="0"
                           cellpadding="0"
                           width="100%"
                           bgcolor="#fff"
                           style="
                           @import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700);
                           font-family: 'Open Sans', sans-serif;
                           "
                           >
                           <tr>
                              <td>
                                 <table
                                    style="background-color: #fff; max-width: 670px; margin: 0 auto"
                                    width="100%"
                                    border="0"
                                    align="center"
                                    cellpadding="0"
                                    cellspacing="0"
                                    >
                                    <tr>
                                       <td style="height: 80px">&nbsp;</td>
                                    </tr>
                                    <tr>
                                       <td style="text-align: center">
                                          <a href="https://finservkart.com/" title="logo" target="_blank">
                                          <img
                                             width="120"
                                             src="https://finservkart.com/img/email-logo.png"
                                             title="logo"
                                             alt="logo"
                                             />
                                          </a>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td style="height: 20px">&nbsp;</td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <table
                                             width="95%"
                                             border="0"
                                             align="center"
                                             cellpadding="0"
                                             cellspacing="0"
                                             style="
                                             max-width: 670px;
                                             background: #fff;
                                             border-radius: 3px;
                                             text-align: center;
                                             -webkit-box-shadow: 0 6px 18px 0 rgba(0, 0, 0, 0.06);
                                             -moz-box-shadow: 0 6px 18px 0 rgba(0, 0, 0, 0.06);
                                             box-shadow: 0 6px 18px 0 rgba(0, 0, 0, 0.06);
                                             "
                                             >
                                             <tr>
                                                <td style="height: 40px">&nbsp;</td>
                                             </tr>
                                             <tr>
                                                <td style="padding: 0 35px">
                                                   <h1
                                                      style="
                                                      color: #1e1e2d;
                                                      font-weight: 500;
                                                      margin: 0;
                                                      font-size: 32px;
                                                      font-family: 'Rubik', sans-serif;
                                                      "
                                                      ></h1>
                                                   <p
                                                      text
                                                      align="left"
                                                      style="
                                                      font-size: 15px;
                                                      color: #455056;
                                                      margin: 8px 0 0;
                                                      line-height: 24px;
                                                      "
                                                      >
                                                      Dear <?= $CustName ?>, <br />Hope you are doing well , Kindly follow the
                                                      email below and do something useful.
                                                   </p>
                                                   <p
                                                      text
                                                      align="left"
                                                      style="
                                                      font-size: 15px;
                                                      color: #455056;
                                                      margin: 8px 0 0;
                                                      line-height: 24px;
                                                      "
                                                      >
                                                      <?= $finalMSG ?> </p>
                                                      <p
                                                      text
                                                      align="left"
                                                      style="
                                                      font-size: 15px;
                                                      color: #455056;
                                                      margin: 8px 0 0;
                                                      line-height: 24px;
                                                      "
                                                      >
                                                      If you have any questions or need assistance at any
                                                      point, our dedicated customer support team is here to
                                                      help. Simply reach out to us via email at
                                                      <a href="mailto:support@finservkart.com"
                                                         >support@finservkart.com</a> & we'll be happy to assist you.<br />
                                                      Thank you for choosing Finservkart. We look forward to
                                                      serving you and helping you achieve your financial
                                                      goals.
                                                   </p>
                                                   <p text align="right">
                                                      <br />Regards,<br />
                                                      <?= $CAName ?><br />
                                                      Team Finservkart
                                                   </p>
                                                   <span
                                                      style="
                                                      display: inline-block;
                                                      vertical-align: middle;
                                                      margin: 29px 0 26px;
                                                      border-bottom: 1px solid #cecece;
                                                      width: 100px;
                                                      "
                                                      ></span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td style="height: 40px">&nbsp;</td>
                                             </tr>
                                          </table>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td style="height: 20px">&nbsp;</td>
                                    </tr>
                                    <tr>
                                       <td style="text-align: center">
                                          <p
                                             style="
                                             font-size: 14px;
                                             color: rgba(69, 80, 86, 0.7411764705882353);
                                             line-height: 18px;
                                             margin: 0 0 0;
                                             "
                                             >
                                             <strong>www.finservkart.com</strong>
                                          </p>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td style="height: 80px">&nbsp;</td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
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
         function confirmView(event, id) {
             event.preventDefault();
             Swal.fire({
                 title: "View Message",
                 text: "Do you want to view messages",
                 icon: "question",
                 showCancelButton: true,
                 confirmButtonText: "Yes",
                 cancelButtonText: "No",
                 dangerMode: true,
             }).then((result) => {
                 if (result.isConfirmed) {
                     window.location.href = "view.php?pid=" + id;
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
<?php } ?>