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
    <title>Add Services | Finservkart | Financial Services</title>
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
      if (isset($_GET['added']) && $_GET['added'] == 'true') {
          echo '<script type="text/javascript">';
          echo '$(document).ready(function() {';
          echo 'toastr.success("Services Added Successfully");';
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
</head>

<body>
  <?php include("include/header.php"); ?>
  <?php include("include/sider.php"); ?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Service</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item">Services</li>
          <li class="breadcrumb-item active">Add</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <script>
    $(document).ready(function() {
        // Listen for changes on service_price, govt_fees, and percentage inputs
        $('#service_price, #govt_fees, #percentage').on('input', function() {
            // Calculate total payable amount for the customer
            var servicePrice = parseFloat($('#service_price').val()) || 0;
            var govtFees = parseFloat($('#govt_fees').val()) || 0;
            var totalCustomerPayable = servicePrice + govtFees;
            $('#customer_payable_amount').text('Customer Payable Amount: ₹' + Math.floor(totalCustomerPayable));
            $('#total_amt').val(Math.floor(totalCustomerPayable)); 

            // Calculate agent's payable amount based on the percentage
            var percentage = parseFloat($('#percentage').val()) || 0;
            var agentPayableAmount = (servicePrice * percentage) / 100;
            $('#agent_payable_amount').text('Agent Commission Amount: ₹' + Math.floor(agentPayableAmount));
            $('#commission').val(Math.floor(agentPayableAmount)); 
        });
    });
    </script>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Services</h5>
              <!-- Floating Labels Form -->
              <form class="row g-3" action="api/insert.php?type=services" method="POST" enctype="multipart/form-data">
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="service_name" id="service_name" placeholder="Service Name" required>
                    <label for="floatingName">Service Name</label>
                  </div>
                </div>
                <div class="col-md-12">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Service Image</label>
                    <input class="form-control" type="file" name="serviceimg" id="serviceimg" accept="image/png, image/jpeg, image/jpg" required>
                </div>
                <div class="col-md-12">
                  <label for="inputNumber" class="col-sm-4 col-form-label text-danger"><b><i class="bi bi-exclamation-octagon me-1"></i> Separate with commas</b></label>
                  <div class="form-floating">
                    <textarea class="form-control" placeholder="separate with commas" name="required_documents" id="floatingTextarea" style="height: 100px;" required></textarea>
                    <label for="floatingName">Required Documents</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="number" class="form-control" name="service_price" id="service_price" placeholder="Service Price" required>
                    <label for="floatingName">Service Price [Net Cost]</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="number" class="form-control" name="govt_fees" id="govt_fees" placeholder="Government Fees" required>
                    <label for="floatingName">Government Fees</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="number" class="form-control" name="percentage" id="percentage" min="0" max="100" placeholder="Agent Percentage" required>
                    <label for="floatingName">Agent Percentage</label>
                  </div>
                </div>
                <input type="hidden" class="form-control" name="total_amt" id="total_amt">
                <input type="hidden" class="form-control" name="commission" id="commission">
                <div class="col-md-12">
                    <p class="font-weight-bold" id="customer_payable_amount"></p>
                    <p class="font-weight-bold" id="agent_payable_amount"></p>
                </div>
                <div class="col-md-12">
                  <label for="inputNumber" class="col-sm-4 col-form-label text-success"><b><i class="bi bi-exclamation-octagon me-1"></i> Service Terms & Conditions</b><br/><small style="color:red;">[ * Use / for break the line ]</small> </label>
                  <div class="form-floating">
                    <textarea class="form-control" placeholder="Terms & Conditions" name="terms" id="floatingTextarea" style="height: 100px;"></textarea>
                    <label for="floatingName">Terms & Conditions</label>
                  </div>
                </div>
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

  </main><!-- End #main -->
  <script>
    $(document).ready(function() {
        // Listen for changes on the percentage input
        $('#percentage').on('input', function() {
            var value = parseInt($(this).val());
            if (value > 100) {
                // If the value is greater than 100, reset it to 100
                $(this).val(100);
            }
        });
    });
  </script>

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

</body>
</html>
<?php } ?>