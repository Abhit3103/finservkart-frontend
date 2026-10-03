<?php session_start();
   include_once('../include/config.php');
   if (strlen($_SESSION['adminid']==0)) {
    header('location:logout.php');
    } else{
   $query=mysqli_query($con,"select * from admin");
   while($result=mysqli_fetch_array($query))
   {
       $fees = $result['fees'];
   }
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Dashboard / Admin Portal</title>
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
   </head>
   <body>
      <?php include("include/header.php"); ?>
      <?php include("include/sider.php"); ?>
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
                              <h5 class="card-title">Total Customer</h5>
                              <?php
                                 $query2=mysqli_query($con,"select id from customer");
                                 $customer=mysqli_num_rows($query2);?>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people-fill"></i>
                                 </div>
                                 <div class="ps-3">
                                    <h6><?php echo $customer;?></h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- End Revenue Card -->
                     <!-- Customers Card -->
                     <div class="col-xxl-4 col-xl-12">
                        <div class="card info-card customers-card">
                           <div class="card-body">
                              <h5 class="card-title">Total Agent</h5>
                              <?php
                                 $query3=mysqli_query($con,"select id from agent");
                                 $agent=mysqli_num_rows($query3);?>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person-lines-fill"></i>
                                 </div>
                                 <div class="ps-3">
                                    <h6><?php echo $agent;?></h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- End Customers Card -->
                     <!-- Customers Card -->
                     <div class="col-xxl-4 col-xl-12">
                        <div class="card info-card agent-card">
                           <div class="card-body">
                              <h5 class="card-title">Total CA</h5>
                              <?php
                                 $query4=mysqli_query($con,"select id from ca");
                                 $ca=mysqli_num_rows($query4);?>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person-bounding-box"></i>
                                 </div>
                                 <div class="ps-3">
                                    <h6><?php echo $ca;?></h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- End Customers Card -->
                     <!-- Customers Card -->
                     <div class="col-xxl-4 col-xl-12">
                        <div class="card info-card" style="color: #f00d0d;">
                           <div class="card-body">
                              <h5 class="card-title">Total Contact</h5>
                              <?php
                                 $query5=mysqli_query($con,"select id from contact");
                                 $contact=mysqli_num_rows($query5);?>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background: #ffdfdf;">
                                    <i class="bi bi-outlet"></i>
                                 </div>
                                 <div class="ps-3">
                                    <h6><?php echo $contact;?></h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- End Customers Card -->
                     <!-- Customers Card -->
                     <div class="col-xxl-4 col-xl-12">
                        <div class="card info-card" style="color: #1dd3ff;">
                           <div class="card-body">
                              <h5 class="card-title">Total Amount</h5>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background: #dffffb;">
                                    <i class="bi bi-credit-card-fill"></i>
                                 </div>
                                 <div class="ps-3">
                                    <h6>₹<?php echo $con->query("SELECT SUM(amt) FROM srv_tranaction WHERE payment_status = 'Paid'")->fetch_row()[0]; ?></h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xxl-4 col-xl-12">
                        <div class="card info-card" style="color: #B03A2E;">
                           <div class="card-body">
                              <h5 class="card-title">Commission Deu</h5>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background: #dffffb;">
                                    <i class="bi bi-wallet-fill"></i>
                                 </div>
                                 <div class="ps-3">
                                    <h6>₹<?php echo $con->query("SELECT SUM(services.commission) AS total_commission FROM srv_tranaction JOIN services ON srv_tranaction.serviceid = services.id JOIN agent ON srv_tranaction.referral = agent.referral WHERE srv_tranaction.isCommission = 'No'")->fetch_row()[0]; ?></h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xxl-4 col-xl-12">
                        <div class="card info-card" style="color: #1ABC9C;">
                           <div class="card-body">
                              <h5 class="card-title">Payout Commission</h5>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background: #dffffb;">
                                    <i class="bi bi-wallet2"></i>
                                 </div>
                                 <div class="ps-3">
                                    <h6>₹<?php echo $con->query("SELECT COALESCE(SUM(totalCommission), 0) AS total_sum FROM `agent_commision`")->fetch_row()[0]; ?></h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- End Customers Card -->
                     <!-- Reports -->
                     <div class="col-12">
                        <div class="card">
                           <div class="card-body">
                              <h5 class="card-title">Workflow Reports <span>/ <?php echo $currentMonth = date('F');?> <?php echo $currentYear = date("Y"); ?> </span></h5>
                              <!-- Line Chart -->
                              <div id="reportsChart"></div>
                              <script>
                                 document.addEventListener("DOMContentLoaded", () => {
                                     fetch('api/workflow_data.php')
                                         .then(response => response.json())
                                         .then(data => {
                                             new ApexCharts(document.querySelector("#reportsChart"), {
                                                 series: [
                                                     { name: 'Assigned', data: data.Assigned },
                                                     { name: 'Completed', data: data.Completed },
                                                     { name: 'Processing', data: data.Processing }
                                                 ],
                                                 chart: {
                                                     height: 350,
                                                     type: 'area',
                                                     toolbar: { show: false },
                                                 },
                                                 markers: { size: 4 },
                                                 colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                                 fill: {
                                                     type: "gradient",
                                                     gradient: {
                                                         shadeIntensity: 1,
                                                         opacityFrom: 0.3,
                                                         opacityTo: 0.4,
                                                         stops: [0, 90, 100]
                                                     }
                                                 },
                                                 dataLabels: { enabled: false },
                                                 stroke: { curve: 'smooth', width: 2 },
                                                 xaxis: {
                                                     type: 'month',
                                                     categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
                                                 },
                                                 tooltip: {
                                                     x: { format: 'MM' },
                                                 }
                                             }).render();
                                         });
                                 });
                              </script>
                              <!-- End Line Chart -->
                           </div>
                        </div>
                     </div>
                     <!-- End Reports -->
                     <!--<script type="text/javascript" src="https://www.google.com/jsapi"></script>-->
                     <!--<div class="col-12">-->
                     <!--   <div class="card">-->
                     <!--      <div class="card-body">-->
                     <!--         <div id="fife_chart"></div>-->
                     <!--      </div>-->
                     <!--   </div>-->
                     <!--</div>-->
                     <!-- Recent Sales -->
                     <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                           <div class="card-body">
                              <h5 class="card-title">Workflow Progress</h5>
                              <table id="datatablesSimple" class="table table-borderless datatable">
                                 <thead class="table-dark">
                                    <tr>
                                       <th>Sno.</th>
                                       <th>SID</th>
                                       <th>Name</th>
                                       <th>Status</th>
                                       <th>Files</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       $qry = $con->query("SELECT * FROM `srv_tranaction` ORDER BY id DESC");
                                       $i = 1;
                                       while($row = $qry->fetch_assoc()):
                                       ?>
                                    <tr>
                                       <td><?php echo $i++; ?></td>
                                       <td><?php echo $row['pID'];?></td> 
                                       <td><?php echo $row['name'];?></td>
                                       <td>
                                           <?php
                                             switch($row['workflow']) {
                                                 case 'Pending':
                                                     echo "<span class='badge bg-secondary'>Pending</span>";
                                                     break;
                                                 case 'Assigned':
                                                     echo "<span class='badge bg-info'>Assigned</span>";
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
                                       </td>
                                       <td><a href="../customer/api/<?php echo $row['documents'];?>" download><img src="../icons/download_folder_file.ico" width="30" height="30" /></a></td>
                                    </tr>
                                    <?php endwhile; ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                     <!-- End Recent Sales -->
                     <!-- Top Selling -->
                     <div class="col-12">
                        <div class="card top-selling overflow-auto">
                           <div class="filter">
                              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                 <li class="dropdown-header text-start">
                                    <h6>Export</h6>
                                 </li>
                                 <li><a class="dropdown-item" href="api/export.php?type=ca"><i class="ri-file-excel-2-fill"></i>Excel</a></li>
                              </ul>
                           </div>
                           <div class="card-body pb-0">
                              <h5 class="card-title">Registered CA</h5>
                              <table id="datatablesSimple" class="table table-borderless datatable">
                                 <thead class="table-dark">
                                    <tr>
                                       <th>ID</th>
                                       <th>Profile</th>
                                       <th>Name</th>
                                       <th>Phone</th>
                                       <th>Email</th>
                                       <th>Files</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       $qry = $con->query("SELECT * FROM ca ORDER BY id DESC");
                                       $i = 1;
                                       while($row = $qry->fetch_assoc()):
                                       $profileImage = empty($row['CAProfile']) ? '../CA/assets/profile/avatar.png' : '../CA/assets/profile/' . $row['CAProfile'];
                                       ?>
                                    <tr>
                                       <td><?php echo $row['CAID'];?></td>
                                       <td>
                                          <center><a href="<?php echo $profileImage; ?>" target="_blank"><img src="<?php echo $profileImage; ?>" alt="Profile" class="rounded-circle" height="30" width="30"></a></center>
                                       </td>
                                       <td><?php echo $row['fname'];?> <?php echo $row['lname'];?></td>
                                       <td><a href="tel:<?php echo $row['phone'];?>"><?php echo $row['phone'];?></a></td>
                                       <td><a href="mailto:<?php echo $row['email'];?>"><?php echo $row['email'];?></a></td>
                                       <td>
                                          <center><a href="../api.function/<?php echo $row['doc'];?>" download><img src="../icons/download_folder_file.ico" width="30" height="30" /></a></center>
                                       </td>
                                    </tr>
                                    <?php endwhile; ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                     <!-- End Top Selling -->
                  </div>
               </div>
               <!-- End Left side columns -->
               <!-- Right side columns -->
               <div class="col-lg-4">
                  <?php 
                  $qpending = mysqli_query($con, "SELECT COUNT(*) FROM srv_tranaction WHERE workflow = 'Pending'");
                  $pending = mysqli_fetch_row($qpending)[0];
                  
                  $qassigned = mysqli_query($con, "SELECT COUNT(*) FROM srv_tranaction WHERE workflow = 'Assigned'");
                  $assigned = mysqli_fetch_row($qassigned)[0];
                  
                  $qcompleted = mysqli_query($con, "SELECT COUNT(*) FROM srv_tranaction WHERE workflow = 'Completed'");
                  $completed = mysqli_fetch_row($qcompleted)[0];
                  
                  $qprocessing = mysqli_query($con, "SELECT COUNT(*) FROM srv_tranaction WHERE workflow = 'Processing'");
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
                  <div class="card">
                     <div class="card-body pb-0">
                         <h5 class="card-title">Visitor Trafic <span><?php echo $currentYear = date("Y"); ?></span></h5>
                         <div id="lineChart"></div>
                           <script>
                              document.addEventListener("DOMContentLoaded", () => {
                                  fetch('api/api_capture.php')
                                      .then(response => response.json())
                                      .then(data => {
                                          new ApexCharts(document.querySelector("#lineChart"), {
                                              series: [{
                                                  name: "Web Trafic",
                                                  data: data
                                              }],
                                              chart: {
                                                  height: 350,
                                                  type: 'line',
                                                  zoom: {
                                                      enabled: false
                                                  }
                                              },
                                              dataLabels: {
                                                  enabled: false
                                              },
                                              stroke: {
                                                  curve: 'straight'
                                              },
                                              grid: {
                                                  row: {
                                                      colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                                                      opacity: 0.5
                                                  },
                                              },
                                              xaxis: {
                                                  categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                                              }
                                          }).render();
                                      });
                              });
                           </script>
                      <!-- End Line Chart -->
                     </div>
                  </div>
                   <div class="card">
                     <div class="card-body pb-0">
                        <h5 class="card-title"> <i class="bi bi-gear"></i> Settings</span></h5>
                        <form id="hero-form" method="POST">
                        <input type="number" name="fees" class="form-control" aria-label="Small" placeholder="Agent Fees" value="<?= $fees ?>" aria-describedby="inputGroup-sizing-sm">
                        <br/>
                        <button type="submit" name="submit" class="btn btn-dark btn-sm">Update</button>
                        </form><br/>
                        <h6 id="success-message" style="color:#008000; display: none"><b>Fees Updated Successfully</b></h6>
                        <h6 id="error-message" style="color:#f00; display: none"></h6>
                        <br/>
                     </div>
                  </div>
                  <!-- End Website Traffic -->
               </div>
               <!-- End Right side columns -->
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
      <script src="assets/vendor/tinymce/tinymce.min.js"></script>
      <script src="assets/vendor/php-email-form/validate.js"></script>
      <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
      <!-- Template Main JS File -->
      <script src="assets/js/main.js"></script>
      <script>
         // Load the Visualization API and the piechart package.
         google.load('visualization', '1.0', {'packages':['corechart']});
         
         // Set a callback to run when the Google Visualization API is loaded.
         google.setOnLoadCallback(drawChart);
         
         
         function drawChart() {
         
         // ******************
         // FIFE CHART
         // ******************
         
         // Create the data table.        
         var fdata = google.visualization.arrayToDataTable([
         ['FSE', 'Registration Details', { role: 'style' }],
         ['Live FSE', 70, 'rgb(66, 133, 244)'],   
         ['Inactive FSE', 90, 'rgb(219, 68, 55)'],     
         ['Total FSE', 200, 'rgb(244, 180, 0)'],
         ]);
         // Set chart options
         var foptions = {legend: {position: 'none'}};
         // Instantiate and draw our chart, passing in some options.
         var fchart = new google.visualization.BarChart(document.getElementById('fife_chart'));
         fchart.draw(fdata, foptions);
         
         // ******************
         // TOWN 1 CHART
         // ******************
         
         // Create the Town data table.        
         var t1data = google.visualization.arrayToDataTable([
         ['Retails', 'Retails Leads', { role: 'style' }],
         ['Approved', 78  , 'rgb(66, 133, 244)'], 
         ['Rejected', 69, 'rgb(219, 68, 55)'],    
         ['Pending', 35, 'rgb(244, 180, 0)'],
         ]);
         // Set chart options
         var t1options = {'legend.position': 'none'};
         // Instantiate and draw our chart, passing in some options.
         var t1chart = new google.visualization.PieChart(document.getElementById('town1_chart'));
         t1chart.draw(t1data, t1options);
         
         // ******************
         // TOWN 2 CHART
         // ******************
          
         // Create the Town data table.        
         var t2data = google.visualization.arrayToDataTable([
         ['Leads', 'FSE Leads', { role: 'style' }],
         ['Approved', 70  , 'rgb(66, 133, 244)'], 
         ['Rejected', 30, 'rgb(219, 68, 55)'],    
         ['Pending', 10, 'rgb(244, 180, 0)'],
         ]);
         // Set chart options
         var t2options = {'legend.position': 'none'};
         // Instantiate and draw our chart, passing in some options.
         var t2chart = new google.visualization.PieChart(document.getElementById('town2_chart'));
         t2chart.draw(t2data, t2options);
         
         // ******************
         // TOWN 3 CHART
         // ******************
         
         // Create the Town data table.        
         var t3data = google.visualization.arrayToDataTable([
         ['Leads', 'Retailer Leads', { role: 'style' }],
         ['Approved', 80  , 'rgb(66, 133, 244)'], 
         ['Rejected', 50, 'rgb(219, 68, 55)'],    
         ['Pending', 20, 'rgb(244, 180, 0)'],
         ]);
         // Set chart options
         var t3options = {'legend.position': 'none'};
         // Instantiate and draw our chart, passing in some options.
         var t3chart = new google.visualization.PieChart(document.getElementById('town3_chart'));
         t3chart.draw(t3data, t3options);
         
         // ******************
         // DIFF CHART
         // ******************
         //         var oldData = google.visualization.arrayToDataTable([
         //          ['Contact', 'Customer Contact'],
         //            ['Email', 250],   
         //            ['Face 2 Face', 130],   
         //            ['Live Chat', 10],
         //         ]);
         
         //         var newData = google.visualization.arrayToDataTable([
         //            ['Contact', 'Customer Contact'],
         //            ['Email', 168], 
         //            ['Face 2 Face', 101],    
         //            ['Live Chat', 34],
         //         ]);
         
         //         var barChartDiff = new google.visualization.BarChart(document.getElementById('barchart_diff'));
         
         //         var diffOptions = { legend: { position: 'none' }, diff: { newData: { widthFactor: 0.8 } } };
         //         var diffData = colChartDiff.computeDiff(oldData, newData);
         //         barChartDiff.draw(diffData, diffOptions);
         
         var oldData = google.visualization.arrayToDataTable([
         ['Name', 'Popularity'],
         ['Cesar', 250],
         ['Rachel', 4200],
         ['Patrick', 2900],
         ['Eric', 8200]
         ]);
         
         var newData = google.visualization.arrayToDataTable([
         ['Name', 'Popularity'],
         ['Cesar', 370],
         ['Rachel', 600],
         ['Patrick', 700],
         ['Eric', 1500]
         ]);
         
         var barChartDiff = new google.visualization.BarChart(document.getElementById('barchart_diff'));
         
         var options = { legend: { position: 'top' } };
         
         var Data = colChartDiff.computeDiff( oldData, newData );
         barChartDiff.draw( Data, options );
         }
      </script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
      <script>
        $(document).ready(function () {
            $("#hero-form").submit(function (e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "api/admin_api.php",
                    data: formData,
                    success: function (response) {
                        if (response.trim() == "Success") {
                            $("#success-message").show();
                            setTimeout(function() {
                                $("#success-message").hide();
                            }, 5000);
                        } else {
                            $("#error-message").text("Please try again.").show();
                        }
                    },
                    error: function () {
                        $("#error-message").text("Please try again.").show();
                    },
                });
            });
        });
    </script>
   </body>
</html>
<?php } ?>