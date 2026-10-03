<?php session_start();
   include_once('../include/config.php');
   if (strlen($_SESSION['adminid']==0)) {
    header('location:logout.php');
    } else{
    $ids = urldecode($_GET['ids']);
    $pIDs = urldecode($_GET['pIDs']);
    $referrals = urldecode($_GET['referrals']);
    $services = urldecode($_GET['services']);
    $amounts = urldecode($_GET['amounts']);
    $percentages = urldecode($_GET['percentages']);
    $commissions = urldecode($_GET['commissions']);

    // Split the decoded strings into arrays
    $ids = explode(',', $ids);
    $pIDs = explode(',', $pIDs);
    $referrals = explode(',', $referrals);
    $services = explode(',', $services);
    $amounts = explode(',', $amounts);
    $percentages = explode(',', $percentages);
    $commissions = explode(',', $commissions);
    
    $totalCommission = array_sum($commissions);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Agent Payment | Finservkart | Financial Services</title>
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
  <style>
    #bank, #txnid {
        display: none;
    }
  </style>
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
      <h1>Agent Payment</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item">Agent Payment</li>
          <li class="breadcrumb-item active">Agent Payment</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Agent Payments</h5>
              <!-- Floating Labels Form -->
                <form class="row g-3" action="api/payout.php" method="POST" enctype="multipart/form-data">
                    <p><b>Total Commission:</b> ₹<?php echo $totalCommission;?>/-</p>
                    <input type="hidden" class="form-control" name="pid" id="pid" value="<?php echo implode(',', $pIDs);?>">
                    <input type="hidden" class="form-control" name="referral" id="referral" value="<?php echo implode(',', $referrals);?>">
                    <input type="hidden" class="form-control" name="service" id="service" value="<?php echo implode(',', $services);?>">
                    <input type="hidden" class="form-control" name="amount" id="amount" value="<?php echo implode(',', $amounts);?>">
                    <input type="hidden" class="form-control" name="percentage" id="percentage" value="<?php echo implode(',', $percentages);?>">
                    <input type="hidden" class="form-control" name="commission" id="commission" value="<?php echo implode(',', $commissions);?>">
                    <input type="hidden" class="form-control" name="totalCommission" id="totalCommission" value="<?= $totalCommission;?>">
                    <div class="col-md-12">
                      <div class="form-group">
                        <select class="form-control" id="mode" name="mode" required>
                            <option hidden="" disabled="disabled" selected="selected" value="">Select Payment Mode</option>
                            <option value="cash">Cash Payments</option>
                            <option value="online">Online Payments</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group" id="bankDetailsContainer">
                            <input type="text" class="form-control" id="bank" name="bank" placeholder="Enter Bank/UPI Details">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" id="txnid" name="txnid" placeholder="Enter Transaction ID">
                        </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form><!-- End floating Labels Form -->

            </div>
          </div>

        </div>
      </div>
    </section>
  </main><!-- End #main -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the payment mode dropdown
        var modeDropdown = document.getElementById('mode');
    
        // Listen for changes on the payment mode dropdown
        modeDropdown.addEventListener('change', function() {
            // Check if the selected option is "Online Payments"
            if (this.value === 'online') {
                // Show the bank details and TxnID fields
                document.getElementById('bank').style.display = 'block';
                document.getElementById('txnid').style.display = 'block';
    
                // Add the 'required' attribute to the bank and TxnID fields
                document.getElementById('bank').setAttribute('required', '');
                document.getElementById('txnid').setAttribute('required', '');
            } else {
                // Hide the bank details and TxnID fields if another payment mode is selected
                document.getElementById('bank').style.display = 'none';
                document.getElementById('txnid').style.display = 'none';
    
                // Remove the 'required' attribute from the bank and TxnID fields
                document.getElementById('bank').removeAttribute('required');
                document.getElementById('txnid').removeAttribute('required');
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
