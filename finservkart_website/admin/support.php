<?php session_start();
   include_once('../include/config.php');
   if (strlen($_SESSION['adminid']==0)) {
    header('location:logout.php');
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
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
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
         .nav-tabs .glyphicon:not(.no-margin) {
         margin-right: 10px;
         }
         .tab-pane .list-group-item:first-child {
         border-top-right-radius: 0px;
         border-top-left-radius: 0px;
         }
         .tab-pane .list-group-item:last-child {
         border-bottom-right-radius: 0px;
         border-bottom-left-radius: 0px;
         }
         .tab-pane .list-group .checkbox {
         display: inline-block;
         margin: 0px;
         }
         .tab-pane .list-group input[type="checkbox"] {
         margin-top: 2px;
         }
         .tab-pane .list-group .glyphicon {
         margin-right: 5px;
         }
         .tab-pane .list-group .glyphicon:hover {
         color: #FFBC00;
         }
         a.list-group-item.read {
         color: #222;
         background-color: #F3F3F3;
         }
         hr {
         margin-top: 5px;
         margin-bottom: 10px;
         }
         .nav-pills>li>a {
         padding: 5px 10px;
         }
         #case {
         position: relative;
         }
      </style>
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
         <!-- End Page Title -->
         <section class="section contact">
            <div class="container">
               <div class="row">
                  <div class="col-sm-9 col-md-10">
                     <!-- Nav tabs -->
                     <ul class="nav nav-tabs">
                        <li class="active"><a href="#home" data-toggle="tab"><span class="glyphicon glyphicon-inbox"></span>Primary</a></li>
                     </ul>
                     <!-- Tab panes -->
                     <div class="tab-content">
                        <div class="tab-pane fade in active" id="home">
                           <div class="list-group">
                              <?php
                                 $sql = "SELECT id, name, subject, message, sdate FROM support ORDER BY id DESC";
                                 $result = $con->query($sql);
                                 
                                 function truncateMessage($message, $maxWords = 255) {
                                 $words = preg_split("/[\n\r\t ]+/", $message, $maxWords + 1, PREG_SPLIT_NO_EMPTY);
                                 if (count($words) > $maxWords) {
                                 array_pop($words);
                                 $message = implode(" ", $words) . '...';
                                 }
                                 return $message;
                                 }
                                 
                                 if ($result->num_rows > 0) {
                                     // Output data of each row
                                     while($row = $result->fetch_assoc()) {
                                         echo '<div class="list-group-item">';
                                         echo '<span class="name" style="min-width: 150px; display: inline-block;"><span class="glyphicon glyphicon-envelope"></span>' . $row['name'] . '</span> ';
                                         echo '<span class="">' . $row['subject'] . '</span><br/>';
                                         echo '<span class="text-muted" style="font-size: 11px; text-align: justify; hyphens: auto; text-justify: distribute; word-spacing: -0.5px;">' . truncateMessage($row['message'], 255) . '</span><br/>';
                                         echo '<span class="badge">' . $row['sdate'] . '</span> ';
                                         echo '<span class="pull-right"><a href="api/delete.php?type=support&id=' . $row['id'] . '" onClick="return confirmDeleteDetails(event, '. $row['id'] .');"><span class="glyphicon glyphicon-trash"></span></a></span>';
                                         echo '</div>';
                                     }
                                 } else {
                                     echo "No data available";
                                 }
                                 $con->close();
                                 ?>
                           </div>
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
      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
      <!-- Vendor JS Files -->
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="assets/vendor/quill/quill.min.js"></script>
      <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
      <script src="assets/vendor/tinymce/tinymce.min.js"></script>
      <script src="assets/vendor/php-email-form/validate.js"></script>
      <!-- Template Main JS File -->
      <script src="assets/js/main.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
      function confirmDeleteDetails(event, id) {
          event.preventDefault();
          Swal.fire({
              title: "Delete Records",
              text: "Are you sure to Delete Records",
              icon: "warning",
              showCancelButton: true,
              confirmButtonText: "Yes",
              cancelButtonText: "No",
              dangerMode: true,
          }).then((result) => {
              if (result.isConfirmed) {
                  window.location.href = "api/delete.php?type=support&id=" + id;
              }
          });
      }
   </script>
   </body>
</html>