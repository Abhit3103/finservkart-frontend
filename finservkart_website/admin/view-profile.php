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
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Admin / View Profile</title>
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
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">
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
         .profile-pic {
         position: relative;
         display: inline-block;
         }
         .profile-pic img {
         width:   80px;
         height:   80px;
         border-radius:   50%;
         }
         .pencil-icon {
         position: absolute;
         top:   50%;
         right:   50%;
         transform: translate(50%, -50%);
         font-size:   1.5rem; /* Adjust size as needed */
         color: white; /* Adjust color as needed */
         cursor: pointer;
         opacity:  0; /* Hide the icon by default */
         transition: opacity  0.3s ease; /* Smooth transition */
         }
         .profile-pic:hover .pencil-icon {
         opacity:  1; /* Show the icon on hover */
         }
      </style>
      <?php 
      if (isset($_GET['update']) && $_GET['update'] == 'true') {
          echo '<script type="text/javascript">';
          echo '$(document).ready(function() {';
          echo 'toastr.success("Records Updated Successfully");';
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
         <?php 
            $role = $_GET['role'];
            $id = $_GET['id'];
            $query=mysqli_query($con,"select * from $role where id = $id");
            while($result=mysqli_fetch_array($query))
            {
         ?> 
         <div class="pagetitle">
            <h1>View Profile</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item">Admin</li>
                  <li class="breadcrumb-item active">View <?= $role ?> Profile</li>
               </ol>
            </nav>
         </div>
         <!-- End Page Title -->
         <section class="section profile">
            <div class="row">
               <div class="col">
                  <div class="card">
                     <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <?php 
                        if ($role == "customer") {
                            $profileImage = empty($result['CProfile']) ? '../customer/assets/profile/avatar.png' : '../customer/assets/profile/' . $result['CProfile'];
                        } elseif ($role == "ca") {
                            $profileImage = empty($result['CAProfile']) ? '../CA/assets/profile/avatar.png' : '../CA/assets/profile/' . $result['CAProfile'];
                        } elseif ($role == "agent") {
                            $profileImage = empty($result['AGProfile']) ? '../agent/assets/profile/avatar.png' : '../agent/assets/profile/' . $result['AGProfile'];
                        }
                        ?>
                        <img src="<?php echo $profileImage; ?>" alt="Profile" class="rounded-circle" height="100" width="100" style="object-fit: cover;">
                        <h2><?php echo $result['fname']; ?> <?php echo $result['lname']; ?></h2>
                        <h2><?php echo $result['address']; ?></h2>
                        <div class="social-links mt-2">
                           <a href="tel:<?php echo $result['phone']; ?>" class="facebook"><i class="bi bi-telephone-outbound"></i></a>
                           <a href="mailto::<?php echo $result['email']; ?>" class="facebook"><i class="bi bi-envelope-open"></i></a>
                           <a href="<?php echo $result['fb']; ?>" class="facebook"><i class="bi bi-facebook"></i></a>
                           <a href="<?php echo $result['insta']; ?>" class="instagram"><i class="bi bi-instagram"></i></a>
                           <a href="https://wa.me/+91<?php echo $result['whatsapp']; ?>" class="linkedin"><i class="bi bi-whatsapp"></i></a>
                           <a href="<?php echo $result['twitter']; ?>" class="twitter"><i class="bi bi-twitter"></i></a>
                           <a href="<?php echo $result['linkedin']; ?>" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
               </div>
            </div>
         </section>
         <?php } ?>
      </main>
      <!-- End #main -->
      <?php include("include/footer.php"); ?>
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
      <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
      <script src="https://use.fontawesome.com/b9bdbd120a.js"></script>
      <!-- Template Main JS File -->
      <script src="assets/js/main.js"></script>
      <script>
         $(document).ready(function(){
         $('.alert').delay(5000).slideUp(200, function() {
             $(this).alert('close');
         });
         });
      </script>
      <script>
         function triggerClick() {
             document.getElementById('profilePicUpload').click();
         }
         
         function displayImage(e) {
             if (e.files[0]) {
                 var reader = new FileReader();
                 reader.onload = function(e) {
                     document.getElementById('profilePic').setAttribute('src', e.target.result);
                 }
                 reader.readAsDataURL(e.files[0]);
             }
         }
      </script>
      <script>
         $(document).ready(function() {
             $("#show_hide_password a").on('click', function(event) {
                 event.preventDefault();
                 if($('#show_hide_password input').attr("type") == "text"){
                     $('#show_hide_password input').attr('type', 'password');
                     $('#show_hide_password i').addClass( "fa-eye-slash" );
                     $('#show_hide_password i').removeClass( "fa-eye" );
                 }else if($('#show_hide_password input').attr("type") == "password"){
                     $('#show_hide_password input').attr('type', 'text');
                     $('#show_hide_password i').removeClass( "fa-eye-slash" );
                     $('#show_hide_password i').addClass( "fa-eye" );
                 }
             });
         });
      </script>
      <script>
         $(document).ready(function() {
             $("#show_hide_password3 a").on('click', function(event) {
                 event.preventDefault();
                 if($('#show_hide_password3 input').attr("type") == "text"){
                     $('#show_hide_password3 input').attr('type', 'password');
                     $('#show_hide_password3 i').addClass( "fa-eye-slash" );
                     $('#show_hide_password3 i').removeClass( "fa-eye" );
                 }else if($('#show_hide_password3 input').attr("type") == "password"){
                     $('#show_hide_password3 input').attr('type', 'text');
                     $('#show_hide_password3 i').removeClass( "fa-eye-slash" );
                     $('#show_hide_password3 i').addClass( "fa-eye" );
                 }
             });
         });
      </script>
   </body>
</html>
<?php } ?>