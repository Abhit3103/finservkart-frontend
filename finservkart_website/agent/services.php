<?php session_start();
   include_once('../include/config.php');
   if (strlen($_SESSION['id']==0)) {
   header('location:logout.php');
   } else{
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Services</title>
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
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
      <!-- Template Main CSS File -->
      <link href="assets/css/style.css" rel="stylesheet">
   </head>
   <body>
      <?php include("include/header.php"); ?>
      <?php include("include/sider.php"); ?>
      <main id="main" class="main">
         <div class="pagetitle">
            <h1>Services</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item">Services</li>
                  <li class="breadcrumb-item active">Services List</li>
               </ol>
            </nav>
         </div>
         <!-- End Page Title -->
         <section class="section">
            <!-- Page Header End -->
            <?php
               // Database connection details
               $servername = "localhost";
               $username = "root";
               $password = "WindRed@12345";
               $dbname = "finservkart";
               $host = 'localhost';
               
               // Create connection
               $conn = new mysqli($servername, $username, $password, $dbname);
               
               // Check connection
               if ($conn->connect_error) {
                   die("Connection failed: " . $conn->connect_error);
               }
               
               // Fetch data from the database
               $sql = "SELECT * FROM services";
               $result = $conn->query($sql);
               
               // Store the results in an array
               $services = [];
               if ($result->num_rows >  0) {
                   while($row = $result->fetch_assoc()) {
                       $services[] = $row;
                   }
               }
               ?>
            <!-- Service Start -->
            <div class="container-xxl service py-5">
               <div class="container">
                  <div class="input-group">
                     <input type="text" class="form-control" placeholder="Search Services ..." id="searchService" name="search"></input>
                  </div>
                  <br/>
                  <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width:600px;">
                  </div>
                  <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                     <div class="col-lg-4">
                        <div class="nav nav-pills d-flex justify-content-between w-100 me-4" id="serviceButtons">
                           <?php
                              $activeClass = 'active';
                              $activeTabPane = 'show active';
                              $i =  1;
                              foreach($services as $service) {
                                  $service_name = $service["service_name"];
                                  $id = $service['id'];
                                  ?>
                           <!-- Service Button -->
                           <button class="nav-link w-100 d-flex align-items-center text-start border p-4 mb-4 <?php echo $activeClass; ?>" data-bs-toggle="pill" data-bs-target="#tab-pane-<?php echo $i; ?>" type="button">
                              <h5 class="m-0 text-capitalize"><i class="fa fa-bars text-dark me-3"></i><?php echo $service_name; ?></h5>
                           </button>
                           <?php
                              $activeClass = '';
                              $activeTabPane = '';
                              $i++;
                              }
                              ?>
                        </div>
                     </div>
                     <div class="col-lg-8">
                        <div class="tab-content w-100" id="serviceTabs">
                           <?php
                              $activeClass = 'active';
                              $activeTabPane = 'show active';
                              $i =  1;
                              foreach($services as $service) {
                                  $service_name = $service["service_name"];
                                  $service_image = $service["service_image"];
                                  $required_documents = explode("\n", $service["required_documents"]);
                                  $id = $service['id'];
                                  ?>
                           <!-- Tab Pane -->
                           <div class="tab-pane fade <?php echo $activeTabPane; ?>" id="tab-pane-<?php echo $i; ?>">
                              <div class="row g-4">
                                 <div class="col-md-6" style="min-height:   350px;">
                                    <div class="position-relative h-100">
                                       <img class="position-absolute rounded w-100 h-100" src="../admin/assets/services/<?php echo $service_image; ?>" style="object-fit: cover;" alt="">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <h3 class="mb-4">Required Documents</h3>
                                    <?php foreach($required_documents as $document): ?>
                                    <p><i class="fa fa-check text-primary me-3"></i><?php echo $document; ?></p>
                                    <?php endforeach; ?>
                                    <a href="buy-service.php?id=<?php echo $id; ?>" onClick="return confirmViewDetails(event, '<?php echo $id; ?>');" class="btn btn-primary py-3 px-5 mt-3">Apply</a>
                                 </div>
                              </div>
                           </div>
                           <?php
                              $activeClass = '';
                              $activeTabPane = '';
                              $i++;
                              }
                              ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Service End -->
            <?php
               $conn->close();
               ?>
         </section>
      </main>
      <!-- End #main -->
      <!-- ======= Footer ======= -->
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
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <!-- Template Main JS File -->
      <script src="assets/js/main.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
         function confirmViewDetails(event, id) {
             event.preventDefault();
             Swal.fire({
                 title: "Apply Service",
                 text: "Are you sure to apply this service ?",
                 icon: "question",
                 showCancelButton: true,
                 confirmButtonText: "Yes",
                 cancelButtonText: "No",
                 dangerMode: true,
             }).then((result) => {
                 if (result.isConfirmed) {
                     window.location.href = "buy-service.php?id=" + id;
                 }
             });
         }
      </script>
      <script>
         $(document).ready(function() {
             // Store the original state of the service buttons and tabs
             var originalServiceButtons = $('#serviceButtons').html();
             var originalServiceTabs = $('#serviceTabs').html();
         
             $('#searchService').on('input', function() {
                 var searchTerm = $(this).val();
         
                 if (searchTerm === '') {
                     // If the search input is cleared, restore the original state
                     $('#serviceButtons').html(originalServiceButtons);
                     $('#serviceTabs').html(originalServiceTabs);
                 } else {
                     // If there's a search term, perform the search
                     $.ajax({
                         url: 'include/search_services.php',
                         type: 'GET',
                         data: { term: searchTerm },
                         dataType: 'json',
                         success: function(data) {
                             $('#serviceButtons').empty();
                             $('#serviceTabs').empty();
         
                             if (data.length === 0) {
                                 // If no services are found, show a specific message
                                 $('#serviceButtons').append('<p class="text-center font-weight-bold">No services found with this name: ' + searchTerm + '.</p>');
                             } else {
                                 var activeClass = 'active';
                                 var activeTabPane = 'show active';
                                 var i = 1;
                                 $.each(data, function(index, service) {
                                     var serviceName = service.service_name;
                                     var serviceImage = service.service_image;
                                     var requiredDocuments = service.required_documents.split('\n');
         
                                     // Adjusted to match your PHP-generated structure
                                     $('#serviceButtons').append('<button class="nav-link w-100 d-flex align-items-center text-start border p-4 mb-4 ' + activeClass + '" data-bs-toggle="pill" data-bs-target="#tab-pane-' + i + '" type="button"><h5 class="m-0 text-capitalize"><i class="fa fa-bars text-dark me-3"></i>' + serviceName + '</h5></button>');
         
                                     $('#serviceTabs').append('<div class="tab-pane fade ' + activeTabPane + '" id="tab-pane-' + i + '"><div class="row g-4"><div class="col-md-6" style="min-height: 350px;"><div class="position-relative h-100"><img class="position-absolute rounded w-100 h-100" src="../admin/assets/services/' + serviceImage + '" style="object-fit: cover;" alt=""></div></div><div class="col-md-6"><h3 class="mb-4">Required Documents</h3><p><i class="fa fa-check text-primary me-3"></i>' + requiredDocuments.join('</p><p><i class="fa fa-check text-primary me-3"></i>') + '</p><a href="buy-service.php?id=' + service.id + '" onClick="return confirmViewDetails(event, \'' + service.id + '\');" class="btn btn-primary py-3 px-5 mt-3">Apply</a></div></div></div>');
         
                                     activeClass = '';
                                     activeTabPane = '';
                                     i++;
                                 });
                             }
                         }
                     });
                 }
             });
         });
      </script>
   </body>
</html>
<?php } ?>