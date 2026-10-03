<?php session_start(); 
   include_once('../include/config.php');
   // Code for login 
   if(isset($_POST['login']))
   {
     $adminusername=$_POST['username'];
     $pass=md5($_POST['password']);
   $ret=mysqli_query($con,"SELECT * FROM admin WHERE username='$adminusername' and password='$pass'");
   $num=mysqli_fetch_array($ret);
   if($num>0)
   {
   $extra="dashboard.php";
   $_SESSION['login']=$_POST['username'];
   $_SESSION['adminid']=$num['id'];
   echo "<script>window.location.href='".$extra."'</script>";
   exit();
   }
   else
   {
   $errorMessage = "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">
                                Invalid username or password
                              </div>";
   }
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Admin Login | Finservkart | Financial Services</title>
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
   </head>
   <body>
      <main>
         <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
               <div class="container">
                  <div class="row justify-content-center">
                     <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <!-- End Logo -->
                        <div class="card mb-3">
                           <div class="card-body">
                              <div class="pt-4 pb-2">
                                 <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="100%" height="90" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                                    viewBox="0 0 21000 14800"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    xmlns:xodm="http://www.corel.com/coreldraw/odm/2003">
                                    <defs>
                                       <style type="text/css">
                                          <![CDATA[
                                             .fil1 {fill:#0F9858}
                                             .fil2 {fill:#0069B2}
                                             .fil0 {fill:#FEFEFE;fill-rule:nonzero}
                                             .fil4 {fill:#0F9858;fill-rule:nonzero}
                                             .fil3 {fill:#0069B2;fill-rule:nonzero}
                                             ]]>
                                       </style>
                                    </defs>
                                    <g id="Layer_x0020_1">
                                       <metadata id="CorelCorpID_0Corel-Layer"/>
                                       <g id="_2407582502544">
                                          <g>
                                             <path class="fil0" d="M15977.85 10230.85l790.33 2.53 -0.24 68.44 -790.33 -2.53 -32.29 -47.74 32.53 -20.7zm-32.53 20.7l9.21 -20.77 23.32 0.07 -32.53 20.7zm-32.41 73.1l32.41 -73.1 64.82 27.04 -32.41 73.1 -32.53 20.7 -32.29 -47.74zm32.29 47.74l-53.38 -0.18 21.09 -47.56 32.29 47.74zm822.74 2.79l-822.74 -2.79 0.24 -68.44 822.74 2.79 35.16 34.22 -35.4 34.22zm35.4 -34.22l0 34.34 -35.4 -0.12 35.4 -34.22zm0 -73.36l0 73.36 -70.56 0 0 -73.36 35.4 -34.22 35.16 34.22zm-35.16 -34.22l35.16 0.11 0 34.11 -35.16 -34.22z"/>
                                             <polygon id="_1" class="fil1" points="16768.06,10267.6 15977.73,10265.07 15945.32,10338.17 16768.06,10340.96 "/>
                                          </g>
                                          <g>
                                             <path class="fil0" d="M15898.97 10408.44l803.19 0 0 68.44 -803.19 0 -32.41 -47.74 32.41 -20.7zm-32.41 20.7l9.18 -20.7 23.23 0 -32.41 20.7zm-33.49 75.52l33.49 -75.52 64.82 27.04 -33.49 75.52 -32.32 20.7 -32.5 -47.74zm32.5 47.74l-53.73 0.14 21.23 -47.88 32.5 47.74zm836.68 -2.16l-836.68 2.16 -0.18 -68.44 836.68 -2.16 35.37 34.22 -35.19 34.22zm35.19 -34.22l0 34.13 -35.19 0.09 35.19 -34.22zm0 -73.36l0 73.36 -70.56 0 0 -73.36 35.28 -34.22 35.28 34.22zm-35.28 -34.22l35.28 0 0 34.22 -35.28 -34.22z"/>
                                             <polygon id="_1_0" class="fil2" points="16702.16,10442.66 15898.97,10442.66 15865.48,10518.18 16702.16,10516.02 "/>
                                          </g>
                                          <g>
                                             <path class="fil0" d="M15819.79 10586.98l882.65 0 0 68.44 -882.65 0 -32.41 -47.74 32.41 -20.7zm-32.41 20.7l9.18 -20.7 23.23 0 -32.41 20.7zm-30.83 69.53l30.83 -69.53 64.82 27.04 -30.83 69.53 -32.56 20.7 -32.26 -47.74zm32.26 47.74l-53.33 -0.22 21.07 -47.52 32.26 47.74zm913.48 3.83l-913.48 -3.83 0.3 -68.44 913.48 3.83 35.13 34.22 -35.43 34.22zm35.43 -34.22l0 34.37 -35.43 -0.15 35.43 -34.22zm0 -73.36l0 73.36 -70.56 0 0 -73.36 35.28 -34.22 35.28 34.22zm-35.28 -34.22l35.28 0 0 34.22 -35.28 -34.22z"/>
                                             <polygon id="_1_1" class="fil1" points="16702.44,10621.2 15819.79,10621.2 15788.96,10690.73 16702.44,10694.56 "/>
                                          </g>
                                          <polygon class="fil2" points="18249.67,6646.64 18451.78,6644.78 16702.44,10832.94 16114.27,10832.94 16181.57,10694.56 16545.77,10694.56 16575.77,10621.2 16217.25,10621.2 16268.41,10516.02 16620.35,10516.02 16650.35,10442.66 16304.09,10442.66 16355.25,10337.48 16704.93,10337.48 16734.93,10264.12 16390.93,10264.12 16514.5,10010.04 16733.07,10010.04 16773.07,10010.04 16820.7,10010.04 "/>
                                          <polygon class="fil3" points="1291.35,9274.14 1291.35,6272.84 3156.57,6272.84 3156.57,6883.27 2003.52,6883.27 2003.52,7480.99 3033.63,7480.99 3033.63,8087.18 2003.52,8087.18 2003.52,9274.14 "/>
                                          <polygon class="fil3" points="3634.91,9274.14 3634.91,6272.84 4351.32,6272.84 4351.32,9274.14 "/>
                                          <polygon class="fil3" points="5050.79,9274.14 5050.79,6175.34 5119.32,6175.34 6988.07,7926.8 6988.07,6272.84 7649.38,6272.84 7649.38,9388.6 7587.2,9388.6 5712.09,7637.13 5712.09,9274.14 "/>
                                          <path class="fil3" d="M8199.78 8426.31c184.4,113.05 341.25,191.47 470.54,237.4 128.59,45.21 254.35,67.82 377.28,67.82 123.64,0 223.26,-27.55 298.86,-81.96 74.89,-54.4 112.34,-124.34 112.34,-209.83 0,-122.23 -133.53,-260.71 -401.31,-413.32 -43.09,-24.73 -76.3,-44.51 -99.61,-57.93l-202.78 -114.46c-197.12,-111.63 -343.37,-238.1 -438.04,-378.69 -95.38,-140.6 -142.72,-300.28 -142.72,-478.32 0,-241.63 91.14,-439.46 273.43,-594.18 181.57,-154.73 416.84,-231.74 705.11,-231.74 106.68,0 221.84,12.71 345.48,37.44 124.35,24.73 262.12,63.59 414.03,115.87l0 702.99c-144.84,-90.43 -281.91,-160.38 -411.91,-209.84 -130,-49.45 -240.21,-74.18 -331.35,-74.18 -101.04,0 -180.17,21.9 -238.1,65 -57.94,43.1 -86.9,102.45 -86.9,176.63 0,52.28 16.95,101.03 51.57,146.25 34.62,45.92 86.2,86.9 155.44,124.35l351.84 194.29c294.62,163.21 492.45,313.7 594.19,451.47 101.74,138.48 152.61,301.68 152.61,491.03 0,292.5 -99.62,529.19 -298.86,709.35 -199.95,180.16 -464.19,269.89 -794.13,269.89 -111.63,0 -233.15,-12.01 -364.57,-35.33 -130.7,-23.31 -275.54,-60.05 -432.39,-109.51l-60.05 -800.49z"/>
                                          <polygon class="fil3" points="10670.51,9274.14 10670.51,6272.84 12518.77,6272.84 12518.77,6891.75 11365.73,6891.75 11365.73,7434.36 12353.44,7434.36 12353.44,8049.03 11365.73,8049.03 11365.73,8642.51 12535.73,8642.51 12535.73,9274.14 "/>
                                          <path class="fil3" d="M13895.1 6819.68l-117.99 0 0 830.87 151.19 0c180.87,0 318.64,-36.74 414.02,-109.51 95.38,-72.77 142.72,-178.04 142.72,-314.4 0,-143.42 -45.92,-246.58 -138.48,-310.87 -92.55,-64.29 -243.04,-96.09 -451.46,-96.09zm-813.21 2454.46l0 -3001.3 771.52 0c247.28,0 438.75,16.25 575.11,48.75 136.36,32.5 256.47,86.19 361.74,162.5 111.63,79.83 198.53,178.75 260,296.74 61.47,117.98 91.85,242.33 91.85,373.04 0,189.35 -48.05,354.67 -144.13,496.68 -96.09,142.01 -234.57,252.94 -415.44,333.48l915.65 1290.11 -818.15 0 -801.19 -1178.48 -101.74 0 0 1178.48 -695.22 0z"/>
                                          <polygon class="fil3" points="16803.84,9388.64 16754.41,9388.64 15337.81,6272.83 16095.92,6272.83 16803.84,7914.08 17696.32,5772.9 18398.61,5772.9 "/>
                                          <polygon class="fil3" points="18095.09,6432.15 18800.23,4740.38 19502.52,4740.38 18756.31,6432.15 "/>
                                          <path class="fil4" d="M13322.55 10474.22l306.05 0 -151.1 -364.73 -154.95 364.73zm-436.03 370.22l594.27 -1201.16 17.55 0 581.11 1201.16 -290.97 0 -73.77 -169.48 -472.78 0 -75.42 169.48 -279.99 0z"/>
                                          <path class="fil3" d="M14270.32 9891.72l-39.94 0 23.76 -212.26 0 0c96,0 170.33,6.34 223.25,18.93 52.89,12.6 99.53,33.46 140.41,63.08 43.33,30.97 77.06,69.36 100.91,115.18 23.86,45.79 35.66,94.05 35.66,144.8 0,73.48 -18.65,137.66 -55.94,192.78 -37.3,55.12 -91.06,98.18 -161.26,129.45l355.41 500.76 -317.56 0 -311 -457.43 -33.64 0 0 -172.78 52.83 0c70.22,0 123.68,-14.25 160.72,-42.51 37.02,-28.24 55.4,-69.11 55.4,-122.03 0,-55.67 -17.83,-95.72 -53.77,-120.68 -35.91,-24.95 -94.34,-37.29 -175.24,-37.29z"/>
                                          <polygon class="fil4" points="15172.43,10841.49 15594.67,9889.41 15224.44,9889.41 15300.27,9676.51 16368.36,9676.51 16241.34,9889.41 15872.76,9889.41 15450.52,10841.49 "/>
                                          <polygon class="fil3" points="13995.62,10392.29 14067.03,10172.25 15127.36,10174.48 15051.4,10392.29 "/>
                                          <polygon class="fil3" points="13995.62,9894.46 14067.03,9674.42 15127.36,9676.64 15051.4,9894.46 "/>
                                          <polygon class="fil2" points="19706.36,5057.72 18407.46,4930.94 19446.21,3952.88 "/>
                                          <polygon class="fil1" points="1285.62,10264.12 11648.43,10264.12 11645.89,10337.48 1285.62,10337.48 "/>
                                          <polygon class="fil2" points="1282.46,10442.66 11649.25,10442.66 11646.71,10516.02 1282.46,10516.02 "/>
                                          <polygon class="fil1" points="1279.37,10621.2 11640.07,10621.2 11637.53,10694.56 1279.37,10694.56 "/>
                                          <polygon class="fil4" points="11734.28,10863.78 11734.28,9619.2 12027.84,9619.2 12027.84,10160.92 12438.9,9619.2 12792.52,9619.2 12323.17,10211.31 12829.44,10863.78 12470.83,10863.78 12027.84,10290.42 12027.84,10863.78 "/>
                                       </g>
                                    </g>
                                 </svg>
                                 <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                 <p class="text-center small">Enter Your Username & Password To Login</p>
                              </div>
                              <?= $errorMessage ?>
                              <form class="row g-3 needs-validation" novalidate method="post">
                                 <div class="col-12">
                                    <label for="yourUsername" class="form-label">Username</label>
                                    <div class="input-group has-validation">
                                       <input type="text" name="username" class="form-control" id="yourUsername" required>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <label for="yourPassword" class="form-label">Password</label>
                                    <div class="input-group" id="show_hide_password">
                                       <input type="password" name="password" class="form-control" id="yourPassword" required>
                                       <div class="input-group-addon">
                                          <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="form-check">
                                       <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                                       <label class="form-check-label" for="rememberMe">Remember me</label>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit" name="login">Login</button>
                                 </div>
                                 <!--<div class="col-12">-->
                                 <!--  <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>-->
                                 <!--</div>-->
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </main>
      <!-- End #main -->
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
   </body>
</html>