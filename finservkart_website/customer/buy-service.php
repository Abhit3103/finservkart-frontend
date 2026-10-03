<?php 
session_start();
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
      <style>
         input[type=file] {
         width: 100%;
         max-width: 100%;
         color: #444;
         padding: 5px;
         background: #fff;
         border-radius: 8px;
         }
         input[type=file]::file-selector-button {
         margin-right: 20px;
         border: none;
         background: #084cdf;
         padding: 10px 10px;
         border-radius: 8px;
         color: #fff;
         cursor: pointer;
         transition: background .2s ease-in-out;
         }
         input[type=file]::file-selector-button:hover {
         background: #0d45a5;
         }
      </style>
      
   </head>
   <body>
      <?php include("include/header.php"); ?>
      <?php include("include/sider.php"); ?>
      <?php
      $year = substr(date("Y"), -2);
      $randomLetter = chr(rand(65, 90)); // ASCII values for A-Z are 65-90
      $randomNumber = rand(10, 99); // This generates a two-digit number.
      $formattedString = "FSK" . $year . $randomLetter . $randomNumber;
      ?>
      <main id="main" class="main">
         <?php
         $userid=$_SESSION['id'];
         $query=mysqli_query($con,"select * from customer where id='$userid'");
         while($result=mysqli_fetch_array($query))
         {
          $CustID = $result['CustID'];
          $fname = $result['fname'];
          $lname = $result['lname'];
          $email = $result['email'];
          $phone = $result['phone'];
          $referral = $result['referral'];
         }
         ?>
      <div class="pagetitle">
         <h1>Services</h1>
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
               <li class="breadcrumb-item">Services</li>
               <li class="breadcrumb-item active">Apply Services</li>
            </ol>
         </nav>
      </div>
      <?php 
         $servid=$_GET['id'];
         $query=mysqli_query($con,"select * from services where id='$servid'");
         while($result=mysqli_fetch_array($query))
         {?>
      <section class="section">
         <!-- Card with an image on left -->
         <div class="card mb-3">
            <div class="row g-0">
               <div class="col-md-4">
                  <img src="../admin/assets/services/<?php echo $result['service_image']; ?>" class="img-fluid rounded-start" alt="...">
               </div>
               <div class="col-md-8">
                  <div class="card-body">
                     <h5 class="card-title"><?php echo $result['service_name']; ?></h5>
                     <?php
                     $required_documents = $result['required_documents'];
                     $documentsArray = explode("\n", $required_documents);
                     $documentsArray = array_map('trim', $documentsArray);
                     $formattedDocuments = implode(", ", $documentsArray);
                     
                     $terms = $result["terms"];
                     $terms = preg_replace('/\/(?!$)/', '<br>', $terms);
                     $terms = rtrim($terms, "/");
                     ?>
                     <p><b>Required Documents</b><br/><?php echo $formattedDocuments; ?></p>
                     <?php if (!empty($terms)) {
                     ?>
                     <div class='alert border-danger alert-dismissible fade show' role='alert'>
                     <b>&#128204; Terms & Conditions:</b><br/>
                       <?= $terms ?>                 
                     <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close alert'></button>
                     </div>
                     <?php } ?>
                     
                   <form id="myForm" method="post" enctype="multipart/form-data">

    <input type="hidden" name="pID" value="<?php echo $formattedString; ?>">
    <input type="hidden" name="CustID" value="<?php echo $CustID; ?>">
    <input type="hidden" name="name" value="<?php echo $fname . ' ' . $lname; ?>">
    <input type="hidden" name="email" value="<?php echo $email; ?>">
    <input type="hidden" name="contact" value="<?php echo $phone; ?>">
    <input type="hidden" name="referral" value="<?php echo $referral; ?>">
    <input type="hidden" name="serviceid" value="<?php echo $result['id']; ?>">
    <input type="hidden" name="service" value="<?php echo $result['service_name']; ?>">
    <input type="hidden" name="amount" value="<?php echo $result['total_amt']; ?>">

    <div class="col-12">
        <label for="inputPassword4" class="form-label">Upload Documents</label>
        <input type="file" name="file[]" accept=".xlsx, .xls, .csv, .pdf, .png, .jpg, .jpeg, .doc, .docx, .txt, .pptx, .zip, .rar" multiple required>
    </div>

    <div class="col-12">
        <input class="form-check-input me-1" type="checkbox" value="" aria-label="..." required>
        Yes, I uploaded all required documents 
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-success">Pay ₹<?php echo $result['total_amt']; ?> & Apply Service</button>
    </div>
</form>
                        <!-- Vertical Form -->
                     </div>
                  </div>
               </div>
            </div>
            <!-- End Card with an image on left -->
         </section>
         <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
       <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.getElementById("myForm").addEventListener("submit", function(e){
    e.preventDefault();

    const form = this;

    if (!form.checkValidity()) {
        form.reportValidity();
        return;
    }
    const formData = new FormData(form);
    const amount = parseFloat(formData.get("amount")) * 100;  // Convert to paise
    const contact = formData.get("contact");
    const name = formData.get("name");

    const options = {
        key: "rzp_live_wHDSacVlpdLgtE",  // Replace with your Razorpay live key
        amount: amount,
        currency: "INR",
        name: "Finservkart",
        description: "Service Bill Pay",
        image: "https://finservkart.com/logo.png", // optional
        prefill: {
            name: name,
            contact: contact
        },
        handler: function (response) {
            // Add payment_id to formData
            formData.append("payment_id", response.razorpay_payment_id);

            // Submit data to server via AJAX
            $.ajax({
                url: "./api/payment_process.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(result){
                    const pid = formData.get('pID');
                    window.location.href = "invoice.php?pid=" + pid;
                },
                error: function(){
                    Swal.fire("Server Error", "Payment succeeded but data submission failed.", "error");
                }
            });
        },
        theme: {
            color: "#3399cc"
        }
    };

    const rzp1 = new Razorpay(options);
    rzp1.on("payment.failed", function (response){
        Swal.fire("Payment Failed", response.error.description, "error");
    });
    rzp1.open();
});
</script>

</main>
      <?php } ?>
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
      <!-- Template Main JS File -->
      <script src="assets/js/main.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
         function confirmViewDetails(event, id) {
             event.preventDefault();
             Swal.fire({
                 title: "Apply Service",
                 text: "Are you sure to apply",
                 icon: "question",
                 showCancelButton: true,
                 confirmButtonText: "Yes",
                 cancelButtonText: "No",
                 dangerMode: true,
             }).then((result) => {
                 if (result.isConfirmed) {
                     window.location.href = "?id=" + id;
                 }
             });
         }
      </script>
   </body>
</html>
<?php } ?>
