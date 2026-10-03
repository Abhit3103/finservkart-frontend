<?php session_start();
   include_once('../include/config.php');
   if (strlen($_SESSION['id']==0)) {
    header('location:logout.php');
    }
   $userid=$_SESSION['id'];
   $query=mysqli_query($con,"select * from agent where id='$userid'");
   while($result=mysqli_fetch_array($query))
   {
       $referral = $result['referral'];
       
           // NAYA CODE: franchisecode nikalo aur franchise ka data lao
       $franchisecode = $result['franchisecode'];
       $franchiseInfo = '';

       $franchiseQuery = mysqli_query($con, "SELECT id, fname, lname FROM franchise WHERE referral_code='$franchisecode'");
       if ($fran = mysqli_fetch_array($franchiseQuery)) {
           $franchiseInfo = 'FranID: ' . htmlspecialchars($fran['id']) . ' | Name: ' . htmlspecialchars($fran['fname'] . ' ' . $fran['lname']);
       }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title><?php echo $result['fname'];?>'s Dashboard </title>
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>
      <!-- Template Main CSS File -->
      <link href="assets/css/style.css" rel="stylesheet">
      <style>
         .stretch-card>.card {
         width: 100%;
         min-width: 100%
         }
         body {
         background-color: #f9f9fa
         }
         .flex {
         -webkit-box-flex: 1;
         -ms-flex: 1 1 auto;
         flex: 1 1 auto
         }
         @media (max-width:991.98px) {
         .padding {
         padding: 1.5rem
         }
         }
         @media (max-width:767.98px) {
         .padding {
         padding: 1rem
         }
         }
      </style>
   </head>
   <body>
      <?php include("include/header.php"); ?>
      <?php include("include/sider.php"); ?>
      <script>
        $(document).ready(function() {
            if (window.location.search.indexOf('update=true') > -1) {
                displayAlert();
            }

            function displayAlert() {
                $("#alert").show();
                setTimeout(function() {
                    $("#alert").fadeOut();
                }, 3000);
                window.history.replaceState(null, null, window.location.pathname);
            }
        });
      </script>
      <main id="main" class="main">
         <div class="pagetitle d-flex justify-content-between align-items-center">
   <div>
      <h1>Dashboard</h1>
      <nav>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
         </ol>
      </nav>
   </div>
   <div>
      <span style="font-weight:bold; font-size:14px;">
         <?php echo $franchiseInfo; ?>
      </span>
   </div>
</div>
         <?php
        $query2 = "SELECT IFSE, bank, branch, ACNo FROM agent WHERE id='$userid'";
        $result2 = mysqli_query($con, $query2);
        
        // Fetch data
        $data = mysqli_fetch_assoc($result2);
        echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/howler/2.2.1/howler.min.js'></script>";
        // Check if any of the fields are empty
        if (empty($data['IFSE']) || empty($data['bank']) || empty($data['branch']) || empty($data['ACNo'])) {
            echo '<div id="alert-box" style="display:none;"></div>';
            echo '<script>
                setTimeout(function() {
                    var alertBox = document.getElementById("alert-box");
                    alertBox.innerHTML = \'<div class="alert alert-warning" role="alert"><img src="assets/bells.gif" width="25" height="25"> Please update your Bank Details <a data-bs-toggle="modal" data-bs-target="#verticalycentered"><span class="badge bg-success"><i class="bi bi-arrow-right-circle me-1"></i>Update</span></a></div>\';
                    alertBox.style.display = "block";
                }, 2000);
            </script>';
            echo '<script>
                var sound = new Howl({ src: ["assets/bells.mp3"] });
                sound.play();
            </script>';
        } else {
            echo '';
        }
        ?>
        <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                        <i class="bi bi-check-circle me-1"></i> Thank You, Updated Successfully</div>
         <!-- End Page Title -->
         <section class="section dashboard">
            <div class="row">
               <!-- Left side columns -->
               <div class="col-lg-8">
                  <p class="card-description">Your Referral Code</p>
                  <div class="input-group">
                     <input type="text" id="clipboardExample1" class="form-control" size="4" value="<?php echo $referral; ?>" readonly>
                     <button type="button" class="btn btn-dark btn-sm" data-clipboard-action="copy" data-clipboard-target="#clipboardExample1">
                     <i class="ri-file-copy-line" aria-hidden="true"></i> Copy Code
                     </button>
                  </div>
                  <br/>
                  <div class="row">
                     <!-- Sales Card -->
                     <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                           <div class="card-body">
                              <h5 class="card-title">Total Services</h5>
                              <?php
                                 $query1=mysqli_query($con,"select id from services");
                                 $services=mysqli_num_rows($query1);?>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-slack"></i>
                                 </div>
                                 <div class="ps-3">
                                    <h6><?php echo $services;?></h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- End Sales Card -->
                     <!-- Customers Card -->
                     <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                           <div class="card-body">
                              <h5 class="card-title">Total Customers</h5>
                              <?php
                               $query2 = mysqli_query($con, "SELECT COUNT(*) as count FROM customer WHERE referral = '$referral'");
                               $row = mysqli_fetch_assoc($query2);
                               $ref = $row['count'];  
                              ?>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                 </div>
                                 <div class="ps-3">
                                    <h6><?php echo $ref;?></h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xxl-4 col-md-6">
                        <div class="card info-card customers-card">
                           <div class="card-body">
                              <h5 class="card-title">Deu Payment</h5>
                              <?php
                               $query3 = mysqli_query($con,"SELECT COALESCE(SUM(services.commission), 0) AS total_commission FROM srv_tranaction JOIN services ON srv_tranaction.serviceid = services.id JOIN agent ON srv_tranaction.referral = agent.referral WHERE srv_tranaction.isCommission = 'No' AND srv_tranaction.referral = '$referral'");
                               $row = mysqli_fetch_assoc($query3);
                               $deu = $row['total_commission'];  
                              ?>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-hourglass-top"></i>
                                 </div>
                                 <div class="ps-3">
                                    <h6>₹<?php echo $deu;?></h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xxl-4 col-md-6">
                        <div class="card info-card" style="color: #1dd3ff;">
                           <div class="card-body">
                              <h5 class="card-title">Total Payout</h5>
                              <?php
                               $query4 = mysqli_query($con,"SELECT COALESCE(SUM(totalCommission), 0) AS total_sum FROM `agent_commision` WHERE referral LIKE '%$referral%';");
                               $row = mysqli_fetch_assoc($query4);
                               $total_pay = $row['total_sum'];  
                              ?>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-wallet2"></i>
                                 </div>
                                 <div class="ps-3">
                                    <h6>₹<?php echo $total_pay;?></h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- End Customers Card -->
                     <!-- Recent Sales -->
                     <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                           <div class="card-body">
                              <h5 class="card-title">Customer List</h5>
                              <table id="datatablesSimple" class="table table-borderless datatable">
                                 <thead class="table-dark">
                                 <tr>
                                    <th>Sno.</th>
                                    <th>ID</th>
                                    <th>Profile</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                 </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       $qry = $con->query("SELECT * FROM customer WHERE referral = '$referral' ORDER BY id DESC");
                                       $i = 1;
                                       while($row = $qry->fetch_assoc()):
                                       $profileImage = empty($row['CProfile']) ? '../customer/assets/profile/avatar.png' : '../customer/assets/profile/' . $row['CProfile'];
                                       ?>
                                    <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row['CustID'];?></td>
                                    <td>
                                       <center><img src="<?php echo $profileImage; ?>" alt="Profile" class="rounded-circle" height="30" width="30"></center>
                                    </td>
                                    <td><?php echo $row['fname'];?> <?php echo $row['lname'];?></td>
                                    <td><?php echo $row['phone'];?></td>
                                    <td><?php echo $row['email'];?></td>
                                 </tr>
                                    <?php endwhile; ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                     <!-- End Recent Sales -->
                  </div>
               </div>
               <!-- End Left side columns -->
               <!-- Right side columns -->
               <div class="col-lg-4">
                  <!-- Recent Activity 
                     <div class="card">
                       <div class="filter">
                         <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                         <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                           <li class="dropdown-header text-start">
                             <h6>Filter</h6>
                           </li>
                     
                           <li><a class="dropdown-item" href="#">Today</a></li>
                           <li><a class="dropdown-item" href="#">This Month</a></li>
                           <li><a class="dropdown-item" href="#">This Year</a></li>
                         </ul>
                       </div>
                     
                       <div class="card-body">
                         <h5 class="card-title">Recent Activity <span>| Today</span></h5>
                     
                         <div class="activity">
                     
                           <div class="activity-item d-flex">
                             <div class="activite-label">32 min</div>
                             <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                             <div class="activity-content">
                               Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                             </div>
                           </div>
                     
                           <div class="activity-item d-flex">
                             <div class="activite-label">56 min</div>
                             <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                             <div class="activity-content">
                               Voluptatem blanditiis blanditiis eveniet
                             </div>
                           </div>
                     
                           <div class="activity-item d-flex">
                             <div class="activite-label">2 hrs</div>
                             <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                             <div class="activity-content">
                               Voluptates corrupti molestias voluptatem
                             </div>
                           </div>
                     
                           <div class="activity-item d-flex">
                             <div class="activite-label">1 day</div>
                             <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                             <div class="activity-content">
                               Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
                             </div>
                           </div>
                     
                           <div class="activity-item d-flex">
                             <div class="activite-label">2 days</div>
                             <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                             <div class="activity-content">
                               Est sit eum reiciendis exercitationem
                             </div>
                           </div>
                     
                           <div class="activity-item d-flex">
                             <div class="activite-label">4 weeks</div>
                             <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                             <div class="activity-content">
                               Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                             </div>
                           </div>
                         </div>
                     
                       </div>
                     </div> End Recent Activity -->
                  <!-- Website Traffic -->
                  <?php 
                  $qpending = mysqli_query($con, "SELECT COUNT(*) FROM srv_tranaction WHERE workflow = 'Pending' AND referral = '$referral'");
                  $pending = mysqli_fetch_row($qpending)[0];
                  
                  $qassigned = mysqli_query($con, "SELECT COUNT(*) FROM srv_tranaction WHERE workflow = 'Assigned' AND referral = '$referral'");
                  $assigned = mysqli_fetch_row($qassigned)[0];
                  
                  $qcompleted = mysqli_query($con, "SELECT COUNT(*) FROM srv_tranaction WHERE workflow = 'Completed' AND referral = '$referral'");
                  $completed = mysqli_fetch_row($qcompleted)[0];
                  
                  $qprocessing = mysqli_query($con, "SELECT COUNT(*) FROM srv_tranaction WHERE workflow = 'Processing' AND referral = '$referral'");
                  $processing = mysqli_fetch_row($qprocessing)[0];
                  ?>
                  <div class="card">
                     <div class="card-body pb-0">
                        <h5 class="card-title">Workflow Details</h5>
                        <div id="trafficChart" style="min-height: 400px;" class="echart"></div>
                        <script>
                           document.addEventListener("DOMContentLoaded", () => {
                             echarts.init(document.querySelector("#trafficChart")).setOption({
                               tooltip: {
                                 trigger: 'item'
                               },
                               legend: {
                                 top: '5%',
                                 left: 'center'
                               },
                               series: [{
                                 name: 'Workflow',
                                 type: 'pie',
                                 radius: ['40%', '70%'],
                                 avoidLabelOverlap: false,
                                 label: {
                                   show: false,
                                   position: 'center'
                                 },
                                 emphasis: {
                                   label: {
                                     show: true,
                                     fontSize: '18',
                                     fontWeight: 'bold'
                                   }
                                 },
                                 labelLine: {
                                   show: false
                                 },
                                 data: [{
                                     value: <?= $assigned ?>,
                                     name: 'Assigned'
                                   },
                                   {
                                     value: <?= $completed ?>,
                                     name: 'Completed'
                                   },
                                   {
                                     value: <?= $pending ?>,
                                     name: 'Pending'
                                   },
                                   {
                                     value: <?= $processing ?>,
                                     name: 'Processing'
                                   }
                                 ]
                               }]
                             });
                           });
                        </script>
                     </div>
                  </div>
                  <!-- End Website Traffic -->
               </div>
               <!-- End Right side columns -->
               <div class="card">
               <div class="modal fade" id="verticalycentered" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title"><b>Fill Bank Details</b></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form class="row g-3" action="./api/update.php?type=agnt&id=<?= $userid; ?>" method="POST">
                        <div class="col-md-12">
                          <label for="inputName5" class="form-label">IFSE Code</label>
                          <input type="text" name="IFSE" class="form-control" id="inputName5" required>
                        </div>
                        <div class="col-md-6">
                          <label for="inputEmail5" class="form-label">Bank Name</label>
                          <input type="text" name="bank" class="form-control" id="inputEmail5" readonly>
                        </div>
                        <div class="col-md-6">
                          <label for="inputPassword5" class="form-label">Branch</label>
                          <input type="text" name="branch" class="form-control" id="inputPassword5" readonly>
                        </div>
                        <div class="col-12">
                          <label for="inputAddress5" class="form-label">A/C No</label>
                          <input type="text" name="ACNo" class="form-control" id="inputAddres5s" required>
                        </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                          <button type="submit" name="update" class="btn btn-dark btn-sm">Update Now</button>
                        </div>
                     </form>
                  </div>
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
      <!-- Template Main JS File -->
      <script src="assets/js/main.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
        $(document).ready(function() {
            $('input[name=IFSE]').on('change', function() {
                var ifscCode = $(this).val();
                $.ajax({
                    url: "https://ifsc.razorpay.com/" + ifscCode,
                    success: function(response) {
                        // Populate the bank and branch fields with the data received from the API
                        $('input[name=bank]').val(response.BANK.toUpperCase());
                        $('input[name=branch]').val(response.BRANCH.toUpperCase());
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('Error: ' + textStatus);
                    }
                });
            });
        });
      </script>
      <script>
         $(document).ready(function () {
             var clipboard = new ClipboardJS('.btn');
             
             clipboard.on('success', function (e) {
                 // Change the button text to "Copied!" after a successful copy
                 e.trigger.textContent = 'Copied!';
                 
                 // Optional: reset the button text after a delay
                 setTimeout(function () {
                     e.trigger.textContent = 'Copy Code';
                 }, 3000); // Reset after 3 seconds
             });
         });
      </script>
   </body>
</html>
<?php } ?>