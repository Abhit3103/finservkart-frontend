<?php session_start();
   include_once('../include/config.php');
   if (strlen($_SESSION['id']==0)) {
   header('location:logout.php');
   }
   if(isset($_POST['update']))
   {
   $oldpassword=$_POST['currentpassword']; 
   $newpassword=$_POST['newpassword'];
   $sql=mysqli_query($con,"SELECT password FROM agent where password='$oldpassword'");
   $num=mysqli_fetch_array($sql);
   if($num>0)
   {
   $userid=$_SESSION['id'];
   $ret=mysqli_query($con,"update agent set password='$newpassword' where id='$userid'");
   $SuccessMessage = "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
                             Password Updated Successfully
                           </div>";
   }
   else
   {
   $errorMessage = "<div class=\"alert alert-dengar alert-dismissible\" role=\"alert\">
                             Password Not Matched
                           </div>";
   }
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Agent / Profile </title>
      <meta content="" name="description">
      <meta content="" name="keywords">
      <!-- Favicons -->
      <link href="../img/favcon.webp" rel="icon">
      <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
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
            $userid=$_SESSION['id'];
            $query=mysqli_query($con,"select * from agent where id='$userid'");
            while($result=mysqli_fetch_array($query))
            { ?>
         <div class="pagetitle">
            <h1><?php echo $result['fname']; ?>'s Profile</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item">Agent</li>
                  <li class="breadcrumb-item active">Profile</li>
               </ol>
            </nav>
         </div>
         <!-- End Page Title -->
         <section class="section profile">
            <div class="row">
               <div class="col-xl-4">
                  <div class="card">
                     <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <?php $profileImage = empty($result['AGProfile']) ? 'assets/profile/avatar.png' : 'assets/profile/' . $result['AGProfile'];?>
                        <img src="<?php echo $profileImage; ?>" alt="Profile" class="rounded-circle" height="100" width="100" style="object-fit: cover;">
                        <h2><?php echo $result['fname']; ?> <?php echo $result['lname']; ?></h2>
                        <h3>Agent</h3>
                        <div class="social-links mt-2">
                           <a href="<?php echo $result['fb']; ?>" class="facebook"><i class="bi bi-facebook"></i></a>
                           <a href="<?php echo $result['insta']; ?>" class="instagram"><i class="bi bi-instagram"></i></a>
                           <a href="https://wa.me/+91<?php echo $result['whatsapp']; ?>" class="linkedin"><i class="bi bi-whatsapp"></i></a>
                           <a href="<?php echo $result['twitter']; ?>" class="twitter"><i class="bi bi-twitter"></i></a>
                           <a href="<?php echo $result['linkedin']; ?>" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-8">
                  <div class="card">
                     <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                           <li class="nav-item">
                              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                           </li>
                           <li class="nav-item">
                              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                           </li>
                           <li class="nav-item">
                              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                           </li>
                        </ul>
                        <div class="tab-content pt-2">
                           <div class="tab-pane fade show active profile-overview" id="profile-overview">
                              <!--<h5 class="card-title">About</h5>-->
                              <!--<p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>-->
                              <h5 class="card-title">Profile Details</h5>
                              <div class="row">
                                 <div class="col-lg-3 col-md-4 label">ID No</div>
                                 <div class="col-lg-9 col-md-8"><?php echo $result['AGID']; ?></div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-3 col-md-4 label">Referral Code</div>
                                 <div class="col-lg-9 col-md-8"><?php echo $result['referral']; ?></div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                 <div class="col-lg-9 col-md-8"><?php echo $result['fname']; ?> <?php echo $result['lname']; ?></div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-3 col-md-4 label">Phone No</div>
                                 <div class="col-lg-9 col-md-8">+91 <?php echo $result['phone']; ?></div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-3 col-md-4 label">Email ID</div>
                                 <div class="col-lg-9 col-md-8"><?php echo $result['email']; ?></div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-3 col-md-4 label">Address</div>
                                 <div class="col-lg-9 col-md-8"><?php echo $result['address']; ?></div>
                              </div>
                              <?php if (!empty($result['IFSE'])) { ?>
                              <div class="row">
                                <div class="col-lg-3 col-md-4 label">IFSE Code</div>
                                <div class="col-lg-9 col-md-8"><?php echo $result['IFSE']; ?></div>
                              </div>
                              <?php } ?>
                              <?php if (!empty($result['bank'])) { ?>
                               <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Bank Name</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $result['bank']; ?></div>
                               </div>
                               <?php } ?>
                               <?php if (!empty($result['branch'])) { ?>
                               <div class="row">
                                <div class="col-lg-3 col-md-4 label">Branch</div>
                                <div class="col-lg-9 col-md-8"><?php echo $result['branch']; ?></div>
                              
                                </div>
                                <?php } ?>
                                <?php if (!empty($result['ACNo'])) { ?>
                                <div class="row">
                                <div class="col-lg-3 col-md-4 label">A/C No</div>
                                <div class="col-lg-9 col-md-8"><?php echo $result['ACNo']; ?></div>
                                </div>
                                <?php } ?>
                           </div>
                           <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                              <!-- Profile Edit Form -->
                              <form action="./api/update.php?type=agent&id=<?php echo $result['id']; ?>&img=<?php echo $result['AGProfile']; ?>" method="POST" enctype="multipart/form-data">
                                 <div class="row mb-3">
                                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                    <div class="col-md-8 col-lg-9">
                                       <div class="profile-pic">
                                          <?php $profileImage = empty($result['AGProfile']) ? 'assets/profile/avatar.png' : 'assets/profile/' . $result['AGProfile'];?>
                                          <img id="profilePic" src="<?php echo $profileImage; ?>" width="80" height="80" alt="Profile Picture" class="rounded-circle" style="object-fit: cover;">
                                          <input type="file" name="profile" id="profilePicUpload" accept="image/*" style="display: none;" onchange="displayImage(this)">
                                          <i class="bi bi-camera pencil-icon" onclick="triggerClick()"></i>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row mb-3">
                                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                                    <div class="col-md-8 col-lg-9">
                                       <input name="fname" type="text" class="form-control" id="fname" value="<?php echo $result['fname']; ?>">
                                    </div>
                                 </div>
                                 <div class="row mb-3">
                                    <label for="company" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                                    <div class="col-md-8 col-lg-9">
                                       <input name="lname" type="text" class="form-control" id="lname" value="<?php echo $result['lname']; ?>">
                                    </div>
                                 </div>
                                 <div class="row mb-3">
                                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                    <div class="col-md-8 col-lg-9">
                                       <input name="phone" type="number" class="form-control" id="Phone" value="<?php echo $result['phone']; ?>">
                                    </div>
                                 </div>
                                 <div class="row mb-3">
                                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                    <div class="col-md-8 col-lg-9">
                                       <input name="email" type="email" class="form-control" id="Email" value="<?php echo $result['email']; ?>">
                                    </div>
                                 </div>
                                 <div class="row mb-3">
                                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                    <div class="col-md-8 col-lg-9">
                                       <input name="address" type="text" class="form-control" id="address" value="<?php echo $result['address']; ?>">
                                    </div>
                                 </div>
                                 <div class="row mb-3">
                                    <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook</label>
                                    <div class="col-md-8 col-lg-9">
                                       <input name="fb" type="url" class="form-control" id="Facebook" value="<?php echo $result['fb']; ?>">
                                    </div>
                                 </div>
                                 <div class="row mb-3">
                                    <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram</label>
                                    <div class="col-md-8 col-lg-9">
                                       <input name="insta" type="url" class="form-control" id="Instagram" value="<?php echo $result['insta']; ?>">
                                    </div>
                                 </div>
                                 <div class="row mb-3">
                                    <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Whatsapp No</label>
                                    <div class="col-md-8 col-lg-9">
                                       <input name="whatsapp" type="number" class="form-control" id="whatsapp" value="<?php echo $result['whatsapp']; ?>">
                                    </div>
                                 </div>
                                 <div class="row mb-3">
                                    <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin</label>
                                    <div class="col-md-8 col-lg-9">
                                       <input name="linkedin" type="url" class="form-control" id="Linkedin" value="<?php echo $result['linkedin']; ?>">
                                    </div>
                                 </div>
                                 <div class="row mb-3">
                                    <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter</label>
                                    <div class="col-md-8 col-lg-9">
                                       <input name="twitter" type="url" class="form-control" id="Twitter" value="<?php echo $result['twitter']; ?>">
                                    </div>
                                 </div>
                                 <?php if (!empty($result['IFSE'])) { ?>
                                 <div class="row mb-3">
                                    <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">IFSE</label>
                                    <div class="col-md-8 col-lg-9">
                                       <input name="IFSE" type="text" class="form-control" id="IFSE" value="<?php echo $result['IFSE']; ?>">
                                    </div>
                                 </div>
                                 <?php } ?>
                                 <?php if (!empty($result['bank'])) { ?>
                                 <div class="row mb-3">
                                    <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Bank Name</label>
                                    <div class="col-md-8 col-lg-9">
                                       <input name="bank" type="text" class="form-control" id="bank" value="<?php echo $result['bank']; ?>">
                                    </div>
                                 </div>
                                 <?php } ?>
                                 <?php if (!empty($result['branch'])) { ?>
                                 <div class="row mb-3">
                                    <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Branch Name</label>
                                    <div class="col-md-8 col-lg-9">
                                       <input name="branch" type="text" class="form-control" id="branch" value="<?php echo $result['branch']; ?>">
                                    </div>
                                 </div>
                                 <?php } ?>
                                 <?php if (!empty($result['ACNo'])) { ?>
                                 <div class="row mb-3">
                                    <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">A/C No</label>
                                    <div class="col-md-8 col-lg-9">
                                       <input name="ACNo" type="text" class="form-control" id="ACNo" value="<?php echo $result['ACNo']; ?>">
                                    </div>
                                 </div>
                                 <?php } ?>
                                 <div class="text-center">
                                    <button type="submit" name="update" class="btn btn-primary">Save Changes</button>
                                 </div>
                              </form>
                              <!-- End Profile Edit Form -->
                           </div>
                           <div class="tab-pane fade pt-3" id="profile-change-password">
                              <!-- Change Password Form -->
                              <?= $errorMessage ?>
                              <?= $SuccessMessage ?>
                              <div id="passwordError" class="alert alert-danger alert-dismissible" role="alert" style="display:none;"></div>
                              <form method="post">
                                 <div class="row mb-3">
                                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                    <div class="col-md-8 col-lg-9">
                                       <div class="input-group" id="show_hide_password">
                                          <input class="form-control" type="password" id="currentpassword" name="currentpassword" type="password" value="" required>
                                          <div class="input-group-addon">
                                             <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row mb-3">
                                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                    <div class="col-md-8 col-lg-9">
                                       <div class="input-group" id="show_hide_password3">
                                          <input id="newpassword" name="newpassword" type="password" value=""  required class="form-control">
                                          <div class="input-group-addon">
                                             <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="text-center">
                                    <button type="submit" name="update" class="btn btn-primary">Change Password</button>
                                 </div>
                              </form>
                              <!-- End Change Password Form -->
                           </div>
                        </div>
                        <!-- End Bordered Tabs -->
                     </div>
                  </div>
               </div>
            </div>
         </section>
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