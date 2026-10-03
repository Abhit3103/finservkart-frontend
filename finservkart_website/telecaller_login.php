<?php   
session_start(); 
include("capture.php");
include_once('include/config.php');

$errorMessage = ""; // Initialize error message

if(isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($email) && !empty($password)) {
        $stmt = $con->prepare("SELECT id, fname, password FROM telecaller WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            if ($password === $row['password']) {
               
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['fname'];
                $_SESSION['role'] = "telecaller"; // Role defined

                header("Location: telecaller/dashboard.php");
                exit();
            } else {
                $errorMessage = "<div class='alert alert-danger'>Invalid email or password.</div>";
            }
        } else {
            $errorMessage = "<div class='alert alert-danger'>Invalid email or password.</div>";
        }
        
        $stmt->close();
    } else {
        $errorMessage = "<div class='alert alert-warning'>Please enter email and password.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8">
      <title>Telecaller Login | Finservkart | Financial Services</title>
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
      <link href="img/favcon.webp" rel="icon">
    
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php include("include/header.php"); ?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-4 animated slideInDown">Telecaller Login</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Telecaller Login</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Login Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Login</p>
                    <h1 class="display-5 mb-4">Login Now</h1>
                    <?php if (!empty($errorMessage)) echo $errorMessage; ?>
                    <form method="post">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" oninput="this.value = this.value.toLowerCase()" required>
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Your Password" required>
                                    <label for="password">Your Password</label>
                                    <input type="checkbox" onclick="togglePasswordVisibility()"> Show Password
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-success py-3 px-5" type="submit" name="login"> Login</button>
                            </div>
                        </div>
                        <br/>
                        <h5><b style="color:tomato;">Don’t have an account?</b><a href="telecaller_signup.php"> Sign Up</a> | <a href="telecaller-password-recovery.php"><b style="color:blue;">Forgot Password?</b></a></h5>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Login End -->
    
    <?php include("include/footer.php"); ?>
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            passwordInput.type = passwordInput.type === "password" ? "text" : "password";
        }
    </script>
</body>
</html>
