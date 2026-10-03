<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Contact Us | Finservkart | Financial Services</title>
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
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
      <!-- Icon Font Stylesheet -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
      <!-- Libraries Stylesheet -->
      <link href="lib/animate/animate.min.css" rel="stylesheet">
      <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
      <!-- Customized Bootstrap Stylesheet -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <!-- Modern Premium CSS -->
      <link href="css/modern-premium.css" rel="stylesheet">
      <!-- Template Stylesheet -->
      <link href="css/style.css" rel="stylesheet">
      <script src="js/country-states.js"></script>
   </head>
   <body style="font-family: 'Poppins', sans-serif;">
      <!-- Spinner Start -->
      <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
         <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
      </div>
      <!-- Spinner End -->
      <?php include("include/header.php"); ?>
      <!-- Page Header Start -->
      <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
         <div class="container position-relative z-1">
            <h1 class="display-3 mb-4 animated slideInDown">Contact Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
               <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Contact</li>
               </ol>
            </nav>
         </div>
      </div>
      <!-- Page Header End -->
      <!-- Contact Start -->
      <div class="container-xxl py-5">
         <div class="container">
            <div class="row g-5">
               <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                  <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Get in Touch</p>
                  <h1 class="display-5 mb-4">If You Have Any Query, Please Contact Us</h1>
                  <p class="mb-4">Thank you for considering Finservkart as your partner in financial services. We value your interest and are here to assist you.</p>
                  <form id="myForm" method="POST">
                     <div class="row g-3">
                        <div class="col-md-6">
                           <div class="form-floating">
                              <select id="country" class="form-select" name="country" required>
                                 <option hidden="" disabled="disabled" selected="selected" value="">Select Country</option>
                              </select>
                              <label for="name">Your Country</label>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-floating">
                              <select id="state" name="state" class="form-select" required>
                                 <option>_</option>
                              </select>
                              <label for="email">Your State</label>
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
                              <input type="number" class="form-control" id="phone" name="phone" placeholder="Your Phone">
                              <label for="email">Your Phone</label>
                           </div>
                        </div>
                        <div class="col-12">
                           <div class="form-floating">
                              <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
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
                        <div class="col-12">
                           <button class="btn btn-primary py-3 px-5" type="submit">Send To Us</button>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 450px;">
                  <div class="position-relative rounded overflow-hidden h-100">
                     <iframe class="position-relative w-100 h-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7114.536523637259!2d80.95776159273686!3d26.926708772270473!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399957a1a4d5f6e3%3A0xdc4f658729c7b67b!2sJankipuram%20Garden%2C%20Jankipuram%2C%20Lucknow%2C%20Uttar%20Pradesh%20226021!5e0!3m2!1sen!2sin!4v1710649185981!5m2!1sen!2sin" frameborder="0" style="min-height: 450px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Contact End -->
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
         // user country code for selected option
         var user_country_code = "";
         var user_state_code = "";
         
         (() => {
         // Get the country name and state name from the imported script.
         const country_array = country_and_states.country;
         const states_array = country_and_states.states;
         
         const id_state_option = document.getElementById("state");
         const id_country_option = document.getElementById("country");
         
         const createCountryNamesDropdown = () => {
         let option = '';
         option += '<option value="">Select Country</option>';
         
         for(let country_code in country_array){
            option += '<option value="'+country_code+'">'+country_array[country_code]+'</option>';
         }
         id_country_option.innerHTML = option;
         };
         
         const createStatesNamesDropdown = () => {
         let selected_country_code = id_country_option.value;
         let state_names = states_array[selected_country_code];
         
         if(!state_names){
            id_state_option.innerHTML = '<option hidden="" disabled="disabled" selected="selected" value="">Select State</option>';
            return;
         }
         let option = '';
         option += '<select id="state">';
         option += '<option hidden="" disabled="disabled" selected="selected" value="">Select State</option>';
         for (let i = 0; i < state_names.length; i++) {
            option += '<option value="'+state_names[i].code+'">'+state_names[i].name+'</option>';
         }
         option += '</select>';
         id_state_option.innerHTML = option;
         };
         
         // country select change event
         id_country_option.addEventListener('change', createStatesNamesDropdown);
         
         createCountryNamesDropdown();
         })();
         
      </script>
      <script>
         document.getElementById('myForm').addEventListener('submit', function(event) {
             event.preventDefault(); // Prevent the default form submission
         
             var formData = new FormData(this); // Create a new FormData instance
         
             // Use AJAX to submit the form data
             var xhr = new XMLHttpRequest();
             xhr.open('POST', 'api.function/contact_api.php', true);
             
             xhr.onload = function() {
                 if (this.status >=  200 && this.status <  400) {
                     // Success!
                     var response = JSON.parse(this.response);
                     Swal.fire({
                         title: response.message,
                         icon: response.status === 'success' ? 'success' : 'error',
                         confirmButtonText: 'Ok',
                         allowOutsideClick: false
                     }).then((result) => {
                         if (result.isConfirmed) {
                             document.getElementById('myForm').reset();
                         }
                     });
                 } else {
                     // We reached our target server, but it returned an error
                     Swal.fire({
                         title: 'Error',
                         text: 'There was an error with the request',
                         icon: 'error'
                     });
                 }
             };
         
             xhr.onerror = function() {
                 // There was a connection error of some sort
                 Swal.fire({
                     title: 'Error',
                     text: 'There was an error with the request',
                     icon: 'error'
                 });
             };
         
             xhr.send(formData); // Send the form data
         });
      </script>
   </body>
</html>