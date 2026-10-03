<?php
session_start();
include_once('../include/config.php');
include_once('../smtp/PHPMailerAutoload.php'); // Load PHPMailer

// Check admin login
if (!isset($_SESSION['adminid']) || strlen($_SESSION['adminid']) == 0) {
    header('location:logout.php');
    exit();
}

// Approve franchise
if (isset($_GET['approve_id'])) {
    $approve_id = intval($_GET['approve_id']);

    $res = mysqli_query($con, "SELECT * FROM franchise WHERE id = $approve_id");
    if ($res && mysqli_num_rows($res) > 0) {
        $data = mysqli_fetch_assoc($res);

        $update_sql = "UPDATE franchise SET is_approved = 'yes' WHERE id = $approve_id";
        if (mysqli_query($con, $update_sql)) {
            // Send approval email
            $to = $data['email'];
            $subject = "Franchise Approved – Finservkart";
            $msg = "
            <!DOCTYPE html>
            <html><body>
            <h2>Hello {$data['fname']},</h2>
            <p>Your franchise registration has been approved by our admin team.</p>
            <p>You can now log in and start managing your franchise dashboard.</p>
            <p><a href='https://finservkart.com'>Login to Finservkart</a></p>
            <p><br>Thanks,<br>Team Finservkart</p>
            </body></html>";

            smtp_mailer($to, $subject, $msg);
            header("Location: manage-frenchise.php?approved=true");
            exit;
        } else {
            echo "Error approving: " . mysqli_error($con);
        }
    }
}

// Reject franchise
if (isset($_GET['reject_id'])) {
    $reject_id = intval($_GET['reject_id']);

    $res = mysqli_query($con, "SELECT * FROM franchise WHERE id = $reject_id");
    if ($res && mysqli_num_rows($res) > 0) {
        $data = mysqli_fetch_assoc($res);

        $update_sql = "UPDATE franchise SET is_approved = 'rejected' WHERE id = $reject_id";
        if (mysqli_query($con, $update_sql)) {
            // Send rejection email
            $to = $data['email'];
            $subject = "Frenchise Rejected – Finservkart";
            $msg = "
            <!DOCTYPE html>
            <html><body>
            <h2>Hello {$data['fname']},</h2>
            <p>We regret to inform you that your franchise registration has been rejected after review.</p>
            <p>If you believe this is a mistake or have questions, please contact our support team.</p>
            <p><br>Thanks,<br>Team Finservkart</p>
            </body></html>";

            smtp_mailer($to, $subject, $msg);
            header("Location: manage-frenchise.php?rejected=true");
            exit;
        } else {
            echo "Error rejecting: " . mysqli_error($con);
        }
    }
}

// PHPMailer email sending function
function smtp_mailer($to, $subject, $msg) {
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.hostinger.com";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Username = "info@finservkart.com";
    $mail->Password = "Finservkart@2024#&";
    $mail->SetFrom("info@finservkart.com", "Finservkart");
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions = [
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true,
        ]
    ];
    return $mail->Send();
}
?>



<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Manage Franchise / Admin Table</title>
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
      if (isset($_GET['isDeleted']) && $_GET['isDeleted'] == 'true') {
          echo '<script type="text/javascript">';
          echo '$(document).ready(function() {';
          echo 'toastr.success("Records Deleted Successfully");';
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
            <h1>Frenchise</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item">Franchise</li>
                  <li class="breadcrumb-item active">Frenchise List</li>
               </ol>
            </nav>
         </div>
         <!-- End Page Title -->
<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"></h5>
          <p text align="right">
            <a href="api/export.php?type=franchise">
              <button type="button" class="btn btn-success"><i class="ri-file-excel-2-fill"></i> Export</button>
            </a>
          </p>
          <div class="table-responsive">
            <table class="table table-borderless datatable">
              <thead class="table-dark">
                <tr>
                  <th>Sno.</th>
                  <th>Fran ID</th>
                  <th>Profile</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Referral Code</th> <!-- Referral column header -->
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $qry = $con->query("SELECT * FROM franchise ORDER BY id DESC");
                $i = 1;
                while ($row = $qry->fetch_assoc()):
                  // Default profile image if no profile exists
                  $profileImage = empty($row['profile_image']) ? '../CA/assets/profile/avatar.png' : '../CA/assets/profile/' . $row['profile_image'];
                ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $row['FranID']; ?></td>
                  <td>
                    <center><img src="<?php echo $profileImage; ?>" alt="Profile" class="rounded-circle" height="30" width="30"></center>
                  </td>
                  <td><?php echo $row['fname']; ?></td>
                  <td><?php echo $row['lname']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['phone']; ?></td>
                  <td><?php echo $row['address']; ?></td>
                  <td><?php echo $row['referral_code']; ?></td> <!-- Referral code value -->
                  
             <td>
  <!-- View Profile -->
  <a href="view-profile.php?role=franchise&id=<?php echo $row['id']; ?>"
     onClick="return confirmViewDetails(event, '<?php echo $row['id']; ?>');">
    <img src="../icons/business.ico" width="25" height="25" />
  </a>

  <!-- Delete Franchise -->
  <a href="api/delete.php?type=franchise&id=<?php echo $row['id']; ?>"
     onClick="return confirmDeleteDetails(event, '<?php echo $row['id']; ?>');">
    <img src="../icons/delete_user.ico" width="25" height="25" />
  </a>

  <!-- Approval / Rejection Logic -->
  <?php if ($row['is_approved'] == 'no'): ?>
    <a href="manage-frenchise.php?approve_id=<?php echo $row['id']; ?>"
       onclick="return confirmApprove(event, '<?php echo $row['id']; ?>');"
       style="color: blue; text-decoration: underline; margin-left:10px;">
       Approve
    </a>

    <a href="manage-frenchise.php?reject_id=<?php echo $row['id']; ?>"
       onclick="return confirmReject(event, '<?php echo $row['id']; ?>');"
       style="color: red; text-decoration: underline; margin-left:10px;">
       Reject
    </a>

  <?php elseif ($row['is_approved'] == 'yes'): ?>
    <span style="color: green; font-weight: bold; margin-left:10px;">Approved</span>

    <a href="manage-frenchise.php?reject_id=<?php echo $row['id']; ?>"
       onclick="return confirmReject(event, '<?php echo $row['id']; ?>');"
       style="color: red; text-decoration: underline; margin-left:10px;">
       Reject
    </a>

  <?php elseif ($row['is_approved'] == 'rejected'): ?>
    <span style="color: red; font-weight: bold; margin-left:10px;">Rejected</span>

    <a href="manage-frenchise.php?approve_id=<?php echo $row['id']; ?>"
       onclick="return confirmApprove(event, '<?php echo $row['id']; ?>');"
       style="color: blue; text-decoration: underline; margin-left:10px;">
       Approve
    </a>
  <?php endif; ?>
</td>

                </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
function confirmApprove(event, id) {
  return confirm('Are you sure you want to approve franchise ID: ' + id + '?');
}
function confirmReject(event, id) {
  return confirm('Are you sure you want to reject franchise ID: ' + id + '?');
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
        title: "View Profile",
        text: "Are you sure you want to view this profile?",
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        dangerMode: true,
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "view-profile.php?role=franchise&id=" + id;
        }
    });
}
   </script>
   <script>
function confirmDeleteDetails(event, id) {
    event.preventDefault();
    Swal.fire({
        title: "Delete Records",
        text: "Are you sure you want to delete this record?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        dangerMode: true,
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "api/delete.php?type=franchise&id=" + id;
        }
    });
}
   </script>
   <script>
function confirmUpdatePSW(event, id) {
    event.preventDefault();
    Swal.fire({
        title: "Change Password",
        text: "Are you sure you want to update the password?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        dangerMode: true,
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "#update-psw.php?id=" + id;
        }
    });
}
   </script>
   <script>
  function confirmSendMail(event, id) {
    event.preventDefault();
    Swal.fire({
        title: "Send Mail",
        text: "Are you sure you want to send an email?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        dangerMode: true,
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "api/fse-send-mail.php?id=" + id;
        }
    });
}
   </script>
   <script>
function confirmApprove(event, id) {
    event.preventDefault();
    Swal.fire({
        title: "Approve Franchise",
        text: "Are you sure you want to approve this franchise?",
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Yes, Approve",
        cancelButtonText: "No",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "manage-frenchise.php?approve_id=" + id;
        }
    });
}
</script>

   </body>
</html>
