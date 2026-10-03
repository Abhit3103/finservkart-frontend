<?php 
session_start();
include_once('../include/config.php');

$errorMessage = "";
$successMessage = "";

if (isset($_POST['login'])) {
    $coordinatorusername = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($coordinatorusername) && !empty($password)) {
        $stmt = $con->prepare("SELECT id, password FROM coordinator WHERE username = ?");
        $stmt->bind_param("s", $coordinatorusername);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            // Plain text password comparison
            if ($password === $row['password']) {
                $_SESSION['login'] = $coordinatorusername;
                $_SESSION['coordinatorid'] = $row['id'];

                // Success message
                $successMessage = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    Login Successful! Redirecting to Dashboard...
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";

                // Redirect after 2 seconds
                echo "<script>
                    setTimeout(function(){
                        window.location.href='dashboard.php';
                    }, 2000);
                </script>";
            } else {
                $errorMessage = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    Invalid username or password.
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
            }
        } else {
            $errorMessage = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                Invalid username or password.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
        }

        $stmt->close();
    } else {
        $errorMessage = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
            Please enter both username and password.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Coordinator Login | Finservkart | Financial Services</title>
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
  <link href="../img/favcon.webp" rel="icon">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<main>
  <div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
            <div class="card mb-3">
              <div class="card-body">
                <div class="pt-4 pb-2">
                  <!-- Logo -->
                  <h5 class="card-title text-center pb-0 fs-4">Login to Your Coordinator Account</h5>
                  <p class="text-center small">Enter Your Username & Password To Login</p>
                </div>
              <?php echo $successMessage; ?>

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
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</main>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
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
          $('#show_hide_password i').addClass("fa-eye-slash");
          $('#show_hide_password i').removeClass("fa-eye");
      } else if($('#show_hide_password input').attr("type") == "password"){
          $('#show_hide_password input').attr('type', 'text');
          $('#show_hide_password i').removeClass("fa-eye-slash");
          $('#show_hide_password i').addClass("fa-eye");
      }
  });
});
</script>
</body>
</html>
