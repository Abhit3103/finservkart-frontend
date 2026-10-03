<?php session_start();
   include_once('../include/config.php');
   if (strlen($_SESSION['adminid']==0)) {
    header('location:logout.php');
    } 
?>
<!DOCTYPE html>
<html lang="en">
   <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Agent Pending Commission / Admin</title>
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
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> 
      <?php 
          if (isset($_GET['payment']) && $_GET['payment'] == 'true') {
              echo '<script type="text/javascript">';
              echo '$(document).ready(function() {';
              echo 'toastr.success("Payments Successfully Done");';
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
      <style>
         .btn-secondary {
         color: #fff;
         background-color: #000;
         border-color: #dee2e6;
         box-shadow: none;
         }  
      </style>
   </head>
   <body>
      <?php include("include/header.php"); ?>
      <?php include("include/sider.php"); ?>
      <main id="main" class="main">
         <div class="pagetitle">
            <h1>Pending Commission</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item">CA Pending Commission</li>
                  <li class="breadcrumb-item active">CA Pending Commission</li>
               </ol>
            </nav>
         </div>
         <!-- End Page Title -->
         <div class="card">
         <div class="card-body">
            <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="profileModalLabel">CA & Project Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body" id="profileModalBody">
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-octagon me-1"></i> Close</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post">
                                <div class="form-group col">
                                    <label for="email">Select CA</label>
                                    <select class="form-control" name="agent" aria-label="Default select example" style="border-color:green">
                                        <option selected>--- Select CA ---</option>
                                        <?php
                                        $sql = "SELECT DISTINCT ca.fname, ca.lname, ca.CAID FROM workflow JOIN services ON workflow.serviceid = services.id JOIN ca";
                                        $resultAgents = mysqli_query($con, $sql);
                                        if (mysqli_num_rows($resultAgents) > 0) {
                                            while ($rowAgent = mysqli_fetch_assoc($resultAgents)) {
                                                echo '<option value="'. $rowAgent['CAID']. '">'. $rowAgent['fname'].' '.$rowAgent['lname']. '</option>';
                                            }
                                        } else {
                                            echo '<option>No Agents found</option>';
                                        }
                                    ?>
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label for="email">From Date</label>
                                    <input class="form-control" id="formdate" name="formdate" type="date" value="" style="border-color:purple"/>
                                </div>
                                <div class="form-group col">
                                    <label for="email">To Date</label>
                                    <input class="form-control" id="todate" name="todate" type="date" value="" style="border-color:tomato"/>
                                </div>
                                <br/>
                                <div class="form-group col">
                                    <input type="submit" name="filter" class="btn btn-dark btn-sm" value="Continue">
                                </div>
                            </form>
                            <?php
                            // Check if form is submitted
                            if (isset($_POST['filter'])) {
                                $agent = isset($_POST['agent']) && $_POST['agent']!== '--- Select CA ---'? $_POST['agent'] : '';
                                $formdate = $_POST['formdate'];
                                $todate = $_POST['todate'];
                                
                                // Start building the SQL query for data filtering
                                $sql = "SELECT * FROM workflow JOIN services WHERE workflow.CAID = '$agent'";
                                
                                // Dynamically add conditions
                               // $params = [];
                                // if ($agent!== '') {
                                //     $sql.= " AND agent =?";
                                //     $params[] = $agent; // Add agent parameter
                                // }
                                if (!empty($formdate) &&empty($todate)) {
                                    $sql.= " AND DATE(workflow.asgndate) BETWEEN? AND?";
                                    $params[] = $formdate; // Add formdate parameter
                                    $params[] = $todate; // Add todate parameter
                                }
                                
                                // Order by id DESC
                                $sql.= " ORDER BY workflow.id DESC"; 
                                // Prepare and bind params
                                $stmt = $con->prepare($sql);
                                // $types = str_repeat('s', count($params)); // Repeat 's' for each param
                                // $stmt->bind_param($types,...$params);
                                
                                // Execute the prepared statement
                                $stmt->execute();
                                $result = $stmt->get_result(); // Get the result set
                                
                                // Display data
                                if ($result->num_rows > 0) {
                                    echo "
                                    <h5 class='card-title'></h5>
                                    <button id='processButton' style='display:none;' class='btn btn-warning btn-sm'>Process To Pay</button>
                                    <div class='table-responsive'>
                                            <table class='table table-borderless datatable'>
                                                <thead class='table-dark'>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>P-ID</th>
                                                        <th>Service</th>
                                                        <th>Amount</th>
                                                        <th>Percentage</th>
                                                        <th>Commission</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>";
                                    $i = 1;
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                                <td><input type=\"checkbox\" name=\"selected_rows[]\" value=\"".$row['pid']."\" data-pid=\"".$row['pid']."\" data-service=\"".$row['service']."\" data-amount=\"".$row['total_amt']."\" data-percentage=\"".$row['ca_percentage']."\" data-commission=\"".$row['ca_commission']."\"></td>
                                                <td>".$row['pid']."</td>
                                                <td>".$row['service']."</td>
                                                <td>&#8377;".$row['total_amt']."</td>
                                                <td>".$row['ca_percentage']."%</td>
                                                <td>&#8377;".$row['ca_commission']."</td>
                                                <td>".date("d/m/Y", strtotime($row['asgndate']))."</td>
                                              </tr>";
                                        $i++;
                                    }
                                    echo "</tbody></table></div>";
                                } else {
                                    echo "No Pending Data Found";
                                }
                            } else {
                                // Default data fetching logic remains unchanged
                                $sql = "SELECT * FROM srv_tranaction JOIN services ON srv_tranaction.serviceid = services.id JOIN ca";
                                $result = mysqli_query($con, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // Display default data here
                                } else {
                                    echo "No Pending Data Found";
                                }
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Modal -->
       </main>
       <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            const processButton = document.getElementById('processButton');
        
            function updateProcessButtonVisibility() {
                const checkedCheckboxes = Array.from(checkboxes).filter(cb => cb.checked);
                processButton.style.display = checkedCheckboxes.length > 0? '' : 'none';

                    console.log(checkedCheckboxes.length);

            }
        
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateProcessButtonVisibility);
            });
        
            processButton.addEventListener('click', function() {
                        let queryString = getSelectedData();   
                        console.log(queryString);                     
                window.location.href = 'ca-payout.php?' + getSelectedData();
            });
        });
        
        function getSelectedData() {
        let selectedRows = Array.from(document.querySelectorAll('input[name="selected_rows[]"]:checked'));
        let data = {
            ids: [],
            pIDs: [],
            services: [],
            amounts: [],
            percentages: [],
            commissions: []
        };
    
        selectedRows.forEach(row => {
            data.ids.push(row.value);
            data.pIDs.push(row.dataset.pid);
            data.services.push(row.dataset.service);
            data.amounts.push(row.dataset.amount);
            data.percentages.push(row.dataset.percentage);
            data.commissions.push(row.dataset.commission);
        });
    
        return Object.entries(data).map(([key, value]) => `${encodeURIComponent(key)}=${encodeURIComponent(value.join(','))}`).join('&');
        }
        </script>
      </main>
      <!-- End #main -->
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
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
      function confirmViewDetails(event, id) {
          event.preventDefault();
          Swal.fire({
              title: "View Invoice",
              text: "Are you sure to view invoice?",
              icon: "question",
              showCancelButton: true,
              confirmButtonText: "Yes",
              cancelButtonText: "No",
              dangerMode: true,
          }).then((result) => {
              if (result.isConfirmed) {
                  window.location.href = "invoice.php?pid=" + id;
              }
          });
      }
   </script>
   <script>
         $(document).ready(function(){
            $('.bi-record2').on('click', function(){
                var caid = $(this).data('pid'); // Correctly extracting the pid from the clicked icon
                $.ajax({
                    url: 'api/fetch_agents.php',
                    type: 'POST',
                    data: {pid: caid}, // Using the correct variable here
                    success: function(response) {
                        $('#profileModalBody').html(response);
                        $('#profileModal').modal('show');
                    }
                });
            });
        });
      </script>
   </body>
</html>