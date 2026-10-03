
<?php
session_start(); 

?>


<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Master Franchise | Finservkart | Financial Services</title>
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
      <script src="js/country-states.js"></script>
   </head>
   <body>
      <!-- Spinner Start -->
      <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
         <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
      </div>
      <!-- Spinner End -->
      <?php include("include/header.php"); ?>
      <!-- Page Header Start -->
      <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
         <div class="container">
            <h1 class="display-3 mb-4 animated slideInDown">Master Franchise</h1>
            <nav aria-label="breadcrumb animated slideInDown">
               <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Master Franchise</li>
               </ol>
            </nav>
         </div>
      </div>
      <!-- Page Header End -->
      <?php
require_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Check if the email already exists in the database
    $checkEmailQuery = "SELECT email FROM master_franchise WHERE email = '$email'";
    $result = mysqli_query($conn, $checkEmailQuery);

    if (mysqli_num_rows($result) > 0) {
        // If email exists, show error message
        echo "<script>alert('The email address is already registered. Please use a different email.');</script>";
    } else {
        // Insert data into the database if email doesn't exist
        $sql = "INSERT INTO master_franchise (country, state, name, phone, email, subject, message) 
                VALUES ('$country', '$state', '$name', '$phone', '$email', '$subject', '$message')";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['master_franchise_id'] = mysqli_insert_id($conn);
            echo "<script>alert('Form submitted successfully!');</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
}
?>


      <!-- Franchise Start -->
      <div class="container-xxl py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center">
                    <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Get in Touch</p>
                    <h1 class="display-5 mb-4">Become a Master Franchise Partner</h1>
                    <p class="mb-4">Join Finservkart and expand your business opportunities in financial services.</p>
                </div>
                <div class="bg-light p-4 rounded shadow">
                    <form id="franchiseForm" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select id="country" class="form-select" name="country" required>
                                        <option hidden="" disabled="disabled" selected="selected" value="">Select Country</option>
                                    </select>
                                    <label for="country">Your Country</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select id="state" name="state" class="form-select" required>
                                        <option>_</option>
                                    </select>
                                    <label for="state">Your State</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Your Phone" required>
                                    <label for="phone">Your Phone</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" name="message" style="height: 100px" required></textarea>


<label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary py-3 px-5" type="submit">Submit Franchise Request</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

      <!-- Franchise End -->
      <?php include("include/footer.php"); ?>
      <!-- Back to Top -->
      <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>
      <!-- JavaScript Libraries -->
      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
      <script src="lib/wow/wow.min.js"></script>
      <script src="lib/easing/easing.min.js"></script>
      <script src="lib/waypoints/waypoints.min.js"></script>
      <script src="lib/owlcarousel/owl.carousel.min.js"></script>
      <script src="lib/counterup/counterup.min.js"></script>
      <!-- Template Javascript -->
      <script src="js/main.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      
      <script>
    document.addEventListener("DOMContentLoaded", function () {
        var countrySelect = document.getElementById("country");
        var stateSelect = document.getElementById("state");

        var countries = {
            "India": ["Uttar Pradesh", "Maharashtra", "Delhi", "Gujarat"],
            "USA": ["California", "Texas", "Florida", "New York"],
            "UK": ["London", "Manchester", "Birmingham", "Liverpool"]
        };

        // Populate countries
        for (var country in countries) {
            var option = document.createElement("option");
            option.value = country;
            option.textContent = country;
            countrySelect.appendChild(option);
        }

        // Populate states based on selected country
        countrySelect.addEventListener("change", function () {
            stateSelect.innerHTML = '<option hidden disabled selected value="">Select State</option>';
            var selectedCountry = this.value;
            if (selectedCountry in countries) {
                countries[selectedCountry].forEach(function (state) {
                    var option = document.createElement("option");
                    option.value = state;
                    option.textContent = state;
                    stateSelect.appendChild(option);
                });
            }
        });
    });
</script>

   </body>
</html>