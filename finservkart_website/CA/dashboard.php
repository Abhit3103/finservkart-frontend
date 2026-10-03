<?php session_start();
   include_once('../include/config.php');
   if (strlen($_SESSION['id']==0)) {
    header('location:logout.php');
    }
   $userid=$_SESSION['id'];
   $query=mysqli_query($con,"select * from ca where id='$userid'");
   while($result=mysqli_fetch_array($query))
   {
       $CAID = $result['CAID'];
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
      <!-- Template Main CSS File -->
      <link href="assets/css/style.css" rel="stylesheet">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
         <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
               </ol>
            </nav>
         </div>
         <?php
        $query2 = "SELECT IFSE, bank, branch, ACNo FROM ca WHERE id='$userid'";
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
                     <!-- Revenue Card -->
                     <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                           <div class="card-body">
                              <h5 class="card-title">Workflow</span></h5>
                              <?php
                                 $query2 = mysqli_query($con, "SELECT COUNT(*) FROM workflow WHERE CAID = '$CAID'");
                                 $workflow = mysqli_fetch_row($query2)[0];
                                 ?>
                                <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-bar-chart-steps"></i>
                                 </div>
                                 <div class="ps-3">
                                    <h6><?php echo $workflow;?></h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>


                     <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                           <div class="card-body">
                              <h5 class="card-title">Pending Commission</span></h5>
                              <?php
                                 $query2 = mysqli_query($con, "SELECT SUM(services.ca_commission) AS total_commission FROM workflow JOIN services ON workflow.serviceid = services.id WHERE workflow.CAID = '$CAID'");
                                 $workflow = mysqli_fetch_row($query2)[0];
                                 ?>
                                <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-bar-chart-steps"></i>
                                 </div>
                                 <div class="ps-3">
                                    <h6><?php echo $workflow;?></h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- End Revenue Card -->
                     <!-- Customers Card -->
                     <!--<div class="col-xxl-4 col-xl-12">-->
                     <!--   <div class="card info-card customers-card">-->
                     <!--      <div class="filter">-->
                     <!--         <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>-->
                     <!--         <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">-->
                     <!--            <li class="dropdown-header text-start">-->
                     <!--               <h6>Filter</h6>-->
                     <!--            </li>-->
                     <!--            <li><a class="dropdown-item" href="#">Today</a></li>-->
                     <!--            <li><a class="dropdown-item" href="#">This Month</a></li>-->
                     <!--            <li><a class="dropdown-item" href="#">This Year</a></li>-->
                     <!--         </ul>-->
                     <!--      </div>-->
                     <!--      <div class="card-body">-->
                     <!--         <h5 class="card-title">Customers <span>| This Year</span></h5>-->
                     <!--         <div class="d-flex align-items-center">-->
                     <!--            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">-->
                     <!--               <i class="bi bi-people"></i>-->
                     <!--            </div>-->
                     <!--            <div class="ps-3">-->
                     <!--               <h6>1244</h6>-->
                                    <!--<span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>-->
                     <!--            </div>-->
                     <!--         </div>-->
                     <!--      </div>-->
                     <!--   </div>-->
                     <!--</div>-->
                     <!-- End Customers Card -->
                     <!-- Reports -->
                     <!--<div class="col-12">-->
                     <!--   <div class="card">-->
                     <!--      <div class="filter">-->
                     <!--         <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>-->
                     <!--         <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">-->
                     <!--            <li class="dropdown-header text-start">-->
                     <!--               <h6>Filter</h6>-->
                     <!--            </li>-->
                     <!--            <li><a class="dropdown-item" href="#">Today</a></li>-->
                     <!--            <li><a class="dropdown-item" href="#">This Month</a></li>-->
                     <!--            <li><a class="dropdown-item" href="#">This Year</a></li>-->
                     <!--         </ul>-->
                     <!--      </div>-->
                     <!--      <div class="card-body">-->
                     <!--         <h5 class="card-title">Reports <span>/Today</span></h5>-->
                              <!-- Line Chart -->
                     <!--         <div id="reportsChart"></div>-->
                     <!--         <script>-->
                     <!--            document.addEventListener("DOMContentLoaded", () => {-->
                     <!--              new ApexCharts(document.querySelector("#reportsChart"), {-->
                     <!--                series: [{-->
                     <!--                  name: 'Sales',-->
                     <!--                  data: [31, 40, 28, 51, 42, 82, 56],-->
                     <!--                }, {-->
                     <!--                  name: 'Revenue',-->
                     <!--                  data: [11, 32, 45, 32, 34, 52, 41]-->
                     <!--                }, {-->
                     <!--                  name: 'Customers',-->
                     <!--                  data: [15, 11, 32, 18, 9, 24, 11]-->
                     <!--                }],-->
                     <!--                chart: {-->
                     <!--                  height: 350,-->
                     <!--                  type: 'area',-->
                     <!--                  toolbar: {-->
                     <!--                    show: false-->
                     <!--                  },-->
                     <!--                },-->
                     <!--                markers: {-->
                     <!--                  size: 4-->
                     <!--                },-->
                     <!--                colors: ['#4154f1', '#2eca6a', '#ff771d'],-->
                     <!--                fill: {-->
                     <!--                  type: "gradient",-->
                     <!--                  gradient: {-->
                     <!--                    shadeIntensity: 1,-->
                     <!--                    opacityFrom: 0.3,-->
                     <!--                    opacityTo: 0.4,-->
                     <!--                    stops: [0, 90, 100]-->
                     <!--                  }-->
                     <!--                },-->
                     <!--                dataLabels: {-->
                     <!--                  enabled: false-->
                     <!--                },-->
                     <!--                stroke: {-->
                     <!--                  curve: 'smooth',-->
                     <!--                  width: 2-->
                     <!--                },-->
                     <!--                xaxis: {-->
                     <!--                  type: 'datetime',-->
                     <!--                  categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]-->
                     <!--                },-->
                     <!--                tooltip: {-->
                     <!--                  x: {-->
                     <!--                    format: 'dd/MM/yy HH:mm'-->
                     <!--                  },-->
                     <!--                }-->
                     <!--              }).render();-->
                     <!--            });-->
                     <!--         </script>-->
                              <!-- End Line Chart -->
                     <!--      </div>-->
                     <!--   </div>-->
                     <!--</div>-->
                     <!-- End Reports -->
                     <!-- Recent Sales -->
                     <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                           <div class="card-body">
                              <h5 class="card-title">My Workflow</h5>
                              <table id="datatablesSimple" class="table table-borderless datatable">
                                 <thead class="table-dark">
                                    <tr>
                                       <th>Sno.</th>
                                       <th>Service ID</th>
                                       <th>Name</th>
                                       <th>Status</th>
                                       <th>Files</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       $qry = $con->query("SELECT * FROM `workflow` WHERE CAID = '$CAID' ORDER BY id DESC");
                                       $i = 1;
                                       while($row = $qry->fetch_assoc()):
                                       ?>
                                    <tr>
                                       <td><?php echo $i++; ?></td>
                                       <td><?php echo $row['pid'];?></td>
                                       <td><?php echo $row['name'];?></td>
                                       <td>
                                          <?php
                                             switch($row['workflow']) {
                                                 case 'Pending':
                                                     echo "<span class='badge bg-secondary'>>Pending</span>";
                                                     break;
                                                 case 'Assigned':
                                                     echo "<span class='badge bg-info'></i>Assigned</span>";
                                                     break;
                                                 case 'Processing':
                                                     echo "<span class='badge bg-warning'>Processing</span>";
                                                     break;
                                                 case 'Completed':
                                                     echo "<span class='badge bg-success'>Completed</span>";
                                                     break;
                                                 default:
                                                     echo "<span class='badge bg-secondary'>Backlist</span>";
                                                     break;
                                             }
                                             ?>
                                       <td><a href="../customer/api/<?php echo $row['documents'];?>" download><img src="../icons/download_folder_file.ico" width="30" height="30" /></a></td>
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
                  $qpending = mysqli_query($con, "SELECT COUNT(*) FROM workflow WHERE workflow = 'Pending' AND CAID = '$CAID'");
                  $pending = mysqli_fetch_row($qpending)[0];
                  
                  $qassigned = mysqli_query($con, "SELECT COUNT(*) FROM workflow WHERE workflow = 'Assigned' AND CAID = '$CAID'");
                  $assigned = mysqli_fetch_row($qassigned)[0];
                  
                  $qcompleted = mysqli_query($con, "SELECT COUNT(*) FROM workflow WHERE workflow = 'Completed' AND CAID = '$CAID'");
                  $completed = mysqli_fetch_row($qcompleted)[0];
                  
                  $qprocessing = mysqli_query($con, "SELECT COUNT(*) FROM workflow WHERE workflow = 'Processing' AND CAID = '$CAID'");
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
                      <form class="row g-3" action="./api/update.php?type=CA&id=<?= $userid; ?>" method="POST">
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
   </body>
</html>
<?php } ?>