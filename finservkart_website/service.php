<?php
   include_once('include/config.php');
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Services | Finservkart | Financial Services</title>
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
      <style>
         body {
            font-family: 'Poppins', sans-serif;
            color: #1a202c;
            background: #f8fafc;
         }
         
         .heading {
            margin-bottom: 1.5rem;
            font-size: 1.2rem;
            color: #2d3748;
            font-weight: 600;
         }
         
         .searchInputWrapper {
            position: relative;
            display: inline-block;
         }
         
         .searchInput {
            width: 100%;
            max-width: 350px;
            height: 50px;
            padding: 0 20px 0 20px; 
            border-radius: 12px;
            border: 2px solid #e2e8f0;
            background: white;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease-in-out;
            color: #1a202c;
            font-size: 0.95rem;
         }
         
         .searchInput::placeholder {
            color: #94a3b8;
         }
         
         .searchInput:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
         }
         
         .searchInputIcon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            transition: all 0.3s ease-in-out;
            pointer-events: none;
         }
         
         .searchInput:focus ~ .searchInputIcon {
            color: #2563eb;
         }
         
         .filter-service {
            background: white;
            border: 2px solid #e2e8f0 !important;
            border-radius: 12px;
            padding: 20px !important;
            margin-bottom: 15px !important;
            transition: all 0.3s ease;
            cursor: pointer;
            color: #475569 !important;
         }
         
         .filter-service:hover {
            border-color: #2563eb !important;
            background: linear-gradient(135deg, #f0f7ff 0%, #f9fbff 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.1);
         }
         
         .filter-service.active {
            background: linear-gradient(135deg, #2563eb, #1e40af);
            border-color: #2563eb !important;
            color: white !important;
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
         }
         
         .filter-service h5 {
            font-weight: 600;
            font-size: 1rem;
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
      <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s" style="position: relative; z-index: 1;">
         <div class="container position-relative z-1">
            <h1 class="display-3 mb-4 animated slideInDown">Services</h1>
            <nav aria-label="breadcrumb animated slideInDown">
               <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Services</li>
               </ol>
            </nav>
         </div>
      </div>
      <!-- Page Header End -->
      <?php
         require_once 'db_connection.php';
         
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
      <div class="container-xxl service py-5" style="background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);">
         <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
               <p class="d-inline-block border rounded fw-semi-bold py-2 px-4" style="background: linear-gradient(135deg, #dbeafe 0%, #e0f2fe 100%); border: 2px solid #2563eb !important; border-radius: 50px; color: #1e40af !important;">Our Services</p>
               <h1 class="display-5 mb-5" style="color: #1a202c; font-weight: 700; margin-top: 15px;">Awesome Financial Services For Business</h1>
               <p class="heading" style="color: #2d3748; font-size: 1.1rem;">Search Services</p>
               <div class="searchInputWrapper">
                  <input class="searchInput" id="searchService" type="text" placeholder='Search services here...' style="border-color: #e2e8f0;">
                  <i class="searchInputIcon fa fa-search"></i>
               </div>
               <br/><br/>
            </div>
            <!-- Service Button -->
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
               <div class="col-lg-4">
                  <div class="nav nav-pills d-flex justify-content-between w-100 me-4" id="serviceButtons">
                     <?php
                        $activeClass = 'active';
                        $activeTabPane = 'show active';
                        $i =  1;
                        foreach($services as $service) {
                            $service_name = $service["service_name"];
                            ?>
                     <button class="nav-link filter-service w-100 d-flex align-items-center text-start border p-4 mb-4 <?php echo $activeClass; ?>" data-bs-toggle="pill" data-bs-target="#tab-pane-<?php echo $i; ?>" type="button">
                        <h5 class="m-0"><i class="fa fa-bars text-primary me-3"></i><?php echo $service_name; ?></h5>
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
                            ?>
                     <!-- Tab Pane -->
                     <div class="tab-pane fade <?php echo $activeTabPane; ?>" id="tab-pane-<?php echo $i; ?>">
                        <div class="row g-4">
                           <div class="col-md-6" style="min-height: 350px;">
                              <div class="position-relative h-100" style="border-radius: 16px; overflow: hidden; box-shadow: 0 8px 32px rgba(37, 99, 235, 0.15);">
                                 <img class="position-absolute rounded w-100 h-100" src="./admin/assets/services/<?php echo $service_image; ?>" style="object-fit: cover;" alt="">
                              </div>
                           </div>
                           <div class="col-md-6" style="background: white; padding: 30px; border-radius: 16px; box-shadow: 0 8px 32px rgba(37, 99, 235, 0.1);">
                              <h3 class="mb-4" style="color: #1a202c; font-weight: 700;">Required Documents</h3>
                              <?php foreach($required_documents as $document): ?>
                              <p style="color: #475569; margin-bottom: 12px; font-size: 0.95rem; font-weight: 500;"><i class="fa fa-check" style="color: #10b981; margin-right: 12px;"></i><?php echo $document; ?></p>
                              <?php endforeach; ?>
                              <a href="user-signup.php" class="btn" style="background: linear-gradient(135deg, #2563eb, #1e40af); color: white; padding: 12px 32px; margin-top: 20px; border-radius: 8px; font-weight: 600; transition: all 0.3s ease; border: none;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 20px rgba(37, 99, 235, 0.3)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">Apply Now</a>
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
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                         url: 'search_services.php',
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
         
                                     $('#serviceButtons').append('<button class="nav-link filter-service w-100 d-flex align-items-center text-start border p-4 mb-4 ' + activeClass + '" data-bs-toggle="pill" data-bs-target="#tab-pane-' + i + '" type="button"><h5 class="m-0"><i class="fa fa-bars text-primary me-3"></i>' + serviceName + '</h5></button>');
         
                                     $('#serviceTabs').append('<div class="tab-pane fade ' + activeTabPane + '" id="tab-pane-' + i + '"><div class="row g-4"><div class="col-md-6" style="min-height: 350px;"><div class="position-relative h-100"><img class="position-absolute rounded w-100 h-100" src="./admin/assets/services/' + serviceImage + '" style="object-fit: cover;" alt=""></div></div><div class="col-md-6"><h3 class="mb-4">Required Documents</h3><p><i class="fa fa-check text-primary me-3"></i>' + requiredDocuments.join('</p><p><i class="fa fa-check text-primary me-3"></i>') + '</p><a href="user-signup.php" class="btn btn-primary py-3 px-5 mt-3">Apply</a></div></div></div>');
         
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