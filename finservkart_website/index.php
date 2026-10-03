<?php
include("capture.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Finservkart | Premium Financial Services</title>
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

    <!-- Google Web Fonts - Poppins -->
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

    <!-- Modern Premium Stylesheet -->
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

    <!-- Modern Hero Section Start -->
    <section class="hero-section position-relative overflow-hidden" style="background: linear-gradient(135deg, #0066cc 0%, #0052a3 100%); min-height: 700px; display: flex; align-items: center; padding: 60px 0; margin-top: -20px;">
        <!-- Animated Background Elements -->
        <div class="position-absolute top-0 start-0 w-100 h-100" style="opacity: 0.1;">
            <div class="animated-blob" style="position: absolute; width: 300px; height: 300px; border-radius: 50%; background: rgba(255,255,255,0.2); top: -100px; right: -50px; animation: float 6s ease-in-out infinite;"></div>
            <div class="animated-blob" style="position: absolute; width: 250px; height: 250px; border-radius: 50%; background: rgba(255,255,255,0.1); bottom: -80px; left: -50px; animation: float 8s ease-in-out infinite 2s;"></div>
        </div>

        <div class="container position-relative z-1">
            <div class="row align-items-center g-4">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div style="animation: slideInLeft 0.8s ease-out;">
                        <span class="badge mb-3" style="font-size: 14px; padding: 10px 18px; background: rgba(255, 255, 255, 0.2); color: #ffffff; backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.3); font-weight: 600; letter-spacing: 0.5px;">
                            <i class="fas fa-star me-2"></i>Trusted Financial Partner
                        </span>
                        <h1 class="display-3 fw-bold text-white mb-4" style="line-height: 1.2;">
                            Your Financial Future <span style="background: linear-gradient(120deg, #ffed4e, #ffd700); background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Starts Here</span>
                        </h1>
                        <p class="fs-5 text-white-50 mb-4" style="max-width: 500px; line-height: 1.8;">
                            Navigate your financial journey with confidence. We provide comprehensive solutions, expert guidance, and 24/7 support tailored to your unique needs.
                        </p>
                        <div class="d-flex gap-3 flex-wrap">
                            <a href="#explore" class="btn btn-light btn-lg fw-semi-bold" style="border-radius: 50px; padding: 12px 40px;">
                                <i class="fas fa-arrow-right me-2"></i>Explore Solutions
                            </a>
                            <a href="contact.php" class="btn btn-outline-light btn-lg fw-semi-bold" style="border-radius: 50px; padding: 12px 40px; border-width: 2px;">
                                <i class="fas fa-phone me-2"></i>Get in Touch
                            </a>
                        </div>
                        <div class="d-flex gap-5 mt-5 flex-wrap">
                            <div>
                                <h3 class="text-white fw-bold">10000+</h3>
                                <p class="text-white-50 mb-0">Active Clients</p>
                            </div>
                            <div>
                                <h3 class="text-white fw-bold">99%</h3>
                                <p class="text-white-50 mb-0">Satisfaction Rate</p>
                            </div>
                            <div>
                                <h3 class="text-white fw-bold">24/7</h3>
                                <p class="text-white-50 mb-0">Customer Support</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInRight;">
                    <div class="position-relative">
                        <!-- Floating Card 1 -->
                        <div class="bg-white rounded-3 p-4 shadow-lg" style="position: absolute; width: 280px; top: 40px; right: 20px; animation: float 3s ease-in-out infinite; border: 1px solid rgba(0,102,204,0.1);">
                            <div class="d-flex align-items-center mb-3">
                                <div class="rounded-circle bg-primary bg-opacity-10 p-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-chart-line text-primary fs-5"></i>
                                </div>
                                <h5 class="ms-3 mb-0">Smart Investments</h5>
                            </div>
                            <p class="text-muted small mb-2">Grow your wealth with our curated investment solutions.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-primary fw-bold">+28% Returns</span>
                                <i class="fas fa-arrow-up text-success"></i>
                            </div>
                        </div>

                        <!-- Floating Card 2 -->
                        <div class="bg-white rounded-3 p-4 shadow-lg" style="position: absolute; width: 280px; bottom: 60px; left: 20px; animation: float 3s ease-in-out infinite 1s; border: 1px solid rgba(0,102,204,0.1);">
                            <div class="d-flex align-items-center mb-3">
                                <div class="rounded-circle bg-success bg-opacity-10 p-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-shield-alt text-success fs-5"></i>
                                </div>
                                <h5 class="ms-3 mb-0">Secure & Safe</h5>
                            </div>
                            <p class="text-muted small mb-2">Bank-level security for your peace of mind.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-success fw-bold">ISO Certified</span>
                                <i class="fas fa-check text-success"></i>
                            </div>
                        </div>

                        <!-- Main Illustration Placeholder -->
                        <div style="width: 100%; height: 400px; background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.05) 100%); border-radius: 20px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-chart-pie text-white" style="font-size: 120px; opacity: 0.3;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modern Hero Section End -->

    <style>
        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .hero-section {
            position: relative;
        }

        .text-white-50 {
            color: rgba(255,255,255,0.7);
        }

        .btn-light:hover {
            background-color: #f8f9fa;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .btn-outline-light:hover {
            background-color: rgba(255,255,255,0.1);
            transform: translateY(-2px);
        }
    </style>
            </button>
        </div>
    </div>
    <!-- Carousel End -->
    <!-- About Start -->
    <div class="container-xxl py-5 features-section" id="explore" style="background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);">
        <div class="container">
            <!-- Section Header -->
            <div class="row mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="display-5 fw-bold mb-3" style="color: #1a202c;">Why Choose FinservKart?</h2>
                    <p class="fs-5" style="color: #475569;">We're committed to delivering comprehensive financial solutions with transparency, expertise, and innovation.</p>
                </div>
            </div>

            <!-- Features Grid -->
            <div class="row g-4">
                <!-- Feature 1 -->
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="feature-item" style="background: white; padding: 30px; border-radius: 16px; box-shadow: 0 8px 32px rgba(37, 99, 235, 0.1); border: 1px solid rgba(37, 99, 235, 0.1); transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 20px 50px rgba(37, 99, 235, 0.15)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 32px rgba(37, 99, 235, 0.1)';">
                        <div class="icon" style="width: 60px; height: 60px; background: linear-gradient(135deg, #2563eb, #1e40af); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                            <i class="fas fa-bolt" style="color: white; font-size: 1.5rem;"></i>
                        </div>
                        <h4 class="mb-3" style="color: #1a202c; font-weight: 600;">Lightning Fast</h4>
                        <p style="color: #475569; font-size: 0.95rem;">Quick processing and instant approvals for your financial needs. Get results in minutes, not days.</p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="feature-item" style="background: white; padding: 30px; border-radius: 16px; box-shadow: 0 8px 32px rgba(37, 99, 235, 0.1); border: 1px solid rgba(37, 99, 235, 0.1); transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 20px 50px rgba(37, 99, 235, 0.15)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 32px rgba(37, 99, 235, 0.1)';">
                        <div class="icon" style="width: 60px; height: 60px; background: linear-gradient(135deg, #10b981, #059669); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                            <i class="fas fa-shield-alt" style="color: white; font-size: 1.5rem;"></i>
                        </div>
                        <h4 class="mb-3" style="color: #1a202c; font-weight: 600;">Bank-Level Security</h4>
                        <p style="color: #475569; font-size: 0.95rem;">Your data is protected with military-grade encryption. ISO certified and fully compliant with regulations.</p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="feature-item" style="background: white; padding: 30px; border-radius: 16px; box-shadow: 0 8px 32px rgba(37, 99, 235, 0.1); border: 1px solid rgba(37, 99, 235, 0.1); transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 20px 50px rgba(37, 99, 235, 0.15)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 32px rgba(37, 99, 235, 0.1)';">
                        <div class="icon" style="width: 60px; height: 60px; background: linear-gradient(135deg, #f59e0b, #d97706); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                            <i class="fas fa-users" style="color: white; font-size: 1.5rem;"></i>
                        </div>
                        <h4 class="mb-3" style="color: #1a202c; font-weight: 600;">Expert Team</h4>
                        <p style="color: #475569; font-size: 0.95rem;">Our dedicated financial experts are ready to guide you with personalized solutions tailored to your goals.</p>
                    </div>
                </div>

                <!-- Feature 4 -->
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="feature-item" style="background: white; padding: 30px; border-radius: 16px; box-shadow: 0 8px 32px rgba(37, 99, 235, 0.1); border: 1px solid rgba(37, 99, 235, 0.1); transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 20px 50px rgba(37, 99, 235, 0.15)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 32px rgba(37, 99, 235, 0.1)';">
                        <div class="icon" style="width: 60px; height: 60px; background: linear-gradient(135deg, #ec4899, #be185d); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                            <i class="fas fa-clock" style="color: white; font-size: 1.5rem;"></i>
                        </div>
                        <h4 class="mb-3" style="color: #1a202c; font-weight: 600;">24/7 Support</h4>
                        <p style="color: #475569; font-size: 0.95rem;">Round-the-clock customer support available on call, email, and chat for your convenience.</p>
                    </div>
                </div>

                <!-- Feature 5 -->
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="feature-item" style="background: white; padding: 30px; border-radius: 16px; box-shadow: 0 8px 32px rgba(37, 99, 235, 0.1); border: 1px solid rgba(37, 99, 235, 0.1); transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 20px 50px rgba(37, 99, 235, 0.15)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 32px rgba(37, 99, 235, 0.1)';">
                        <div class="icon" style="width: 60px; height: 60px; background: linear-gradient(135deg, #8b5cf6, #6d28d9); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                            <i class="fas fa-eye" style="color: white; font-size: 1.5rem;"></i>
                        </div>
                        <h4 class="mb-3" style="color: #1a202c; font-weight: 600;">Full Transparency</h4>
                        <p style="color: #475569; font-size: 0.95rem;">No hidden charges, no surprises. Clear pricing and complete visibility into all your transactions.</p>
                    </div>
                </div>

                <!-- Feature 6 -->
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="feature-item" style="background: white; padding: 30px; border-radius: 16px; box-shadow: 0 8px 32px rgba(37, 99, 235, 0.1); border: 1px solid rgba(37, 99, 235, 0.1); transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 20px 50px rgba(37, 99, 235, 0.15)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 32px rgba(37, 99, 235, 0.1)';">
                        <div class="icon" style="width: 60px; height: 60px; background: linear-gradient(135deg, #06b6d4, #0891b2); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                            <i class="fas fa-chart-line" style="color: white; font-size: 1.5rem;"></i>
                        </div>
                        <h4 class="mb-3" style="color: #1a202c; font-weight: 600;">Proven Results</h4>
                        <p style="color: #475569; font-size: 0.95rem;">Join thousands of satisfied customers who've achieved their financial goals with our expert guidance.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Facts Start -->
    <section class="stats-section position-relative overflow-hidden" style="background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); padding: 60px 0;">
        <div class="container position-relative z-1">
            <div class="row g-5">
                <!-- Stat 1 -->
                <div class="col-sm-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="stat-item" style="text-align: center; background: rgba(255, 255, 255, 0.1); padding: 30px; border-radius: 16px; border: 1px solid rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px);">
                        <i class="fas fa-smile fa-3x mb-3" style="color: #fbbf24;"></i>
                        <h3 class="display-5" style="color: white; font-weight: 700; margin: 15px 0;"><span data-toggle="counter-up">10000</span><span style="font-size: 0.8em;">+</span></h3>
                        <p style="color: rgba(255, 255, 255, 0.8); font-weight: 500;">Happy Clients</p>
                    </div>
                </div>
                <!-- Stat 2 -->
                <div class="col-sm-6 col-lg-3 wow fadeIn" data-wow-delay="0.2s">
                    <div class="stat-item" style="text-align: center; background: rgba(255, 255, 255, 0.1); padding: 30px; border-radius: 16px; border: 1px solid rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px);">
                        <i class="fas fa-check-circle fa-3x mb-3" style="color: #10b981;"></i>
                        <h3 class="display-5" style="color: white; font-weight: 700; margin: 15px 0;"><span data-toggle="counter-up">50000</span><span style="font-size: 0.8em;">+</span></h3>
                        <p style="color: rgba(255, 255, 255, 0.8); font-weight: 500;">Services Completed</p>
                    </div>
                </div>
                <!-- Stat 3 -->
                <div class="col-sm-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                    <div class="stat-item" style="text-align: center; background: rgba(255, 255, 255, 0.1); padding: 30px; border-radius: 16px; border: 1px solid rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px);">
                        <i class="fas fa-users-cog fa-3x mb-3" style="color: #06b6d4;"></i>
                        <h3 class="display-5" style="color: white; font-weight: 700; margin: 15px 0;"><span data-toggle="counter-up">250</span><span style="font-size: 0.8em;">+</span></h3>
                        <p style="color: rgba(255, 255, 255, 0.8); font-weight: 500;">Expert Professionals</p>
                    </div>
                </div>
                <!-- Stat 4 -->
                <div class="col-sm-6 col-lg-3 wow fadeIn" data-wow-delay="0.4s">
                    <div class="stat-item" style="text-align: center; background: rgba(255, 255, 255, 0.1); padding: 30px; border-radius: 16px; border: 1px solid rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px);">
                        <i class="fas fa-award fa-3x mb-3" style="color: #fbbf24;"></i>
                        <h3 class="display-5" style="color: white; font-weight: 700; margin: 15px 0;"><span data-toggle="counter-up">15</span><span style="font-size: 0.8em;">+</span></h3>
                        <p style="color: rgba(255, 255, 255, 0.8); font-weight: 500;">Industry Awards</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Facts End -->


    <!-- Features Start -->
    <section class="py-5">
        <div class="container">
            <!-- Section Header -->
            <div class="row mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="display-5 fw-bold mb-3">Our Core Services</h2>
                    <p class="fs-5 text-muted">Comprehensive financial solutions designed to meet your unique needs</p>
                </div>
            </div>

            <!-- Services Grid -->
            <div class="row g-4" id="services-grid">
                <?php
                    // Database connection
                    $servername = "localhost";
                    $username = "root";
                    $password = "WindRed@12345";
                    $dbname = "finservkart";
                    
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    
                    // Fetch services
                    $sql = "SELECT * FROM services ORDER BY RAND() LIMIT 6";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        $delay = 0.1;
                        while($row = $result->fetch_assoc()) {
                            $service_name = $row["service_name"];
                            $service_image = $row["service_image"];
                            $id = $row["id"];
                            ?>
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="<?php echo $delay; ?>s">
                                <div class="service-card">
                                    <div class="icon-wrapper">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                    <h4 class="mb-3"><?php echo $service_name; ?></h4>
                                    <p class="text-muted">Professional <?php echo strtolower($service_name); ?> services tailored to your needs with expert guidance.</p>
                                    <a href="service.php">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                            <?php
                            $delay += 0.1;
                        }
                    }
                    $conn->close();
                ?>
            </div>

            <!-- Explore All Services Button -->
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <a href="service.php" class="btn btn-primary btn-lg">
                        <i class="fas fa-arrow-right me-2"></i>Explore All Services
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Features End -->


    <!-- Service Start -->
    <?php
         // Database connection details
         $servername = "localhost";
         $username = "root";
         $password = "WindRed@12345";
         $dbname = "finservkart";
         
         // Create connection
         $conn = new mysqli($servername, $username, $password, $dbname);
         
         // Check connection
         if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
         }
         
         // Fetch data from the database
         $sql = "SELECT * FROM services ORDER BY RAND() LIMIT  8";
         $result = $conn->query($sql);
         
         // Store the results in an array
         $services = [];
         if ($result->num_rows >  0) {
             while($row = $result->fetch_assoc()) {
                 $services[] = $row;
             }
         }
         ?>
      <!-- Service Start -->
      <div class="container-xxl service py-5">
         <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width:   600px;">
               <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Our Services</p>
               <h1 class="display-5 mb-5">Awesome Financial Services For Business</h1>
            </div>
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
               <div class="col-lg-4">
                  <div class="nav nav-pills d-flex justify-content-between w-100 me-4">
                     <?php
                        $activeClass = 'active';
                        $activeTabPane = 'show active';
                        $i =  1;
                        foreach($services as $service) {
                            $service_name = $service["service_name"];
                            ?>
                     <!-- Service Button -->
                     <button class="nav-link w-100 d-flex align-items-center text-start border p-4 mb-4 <?php echo $activeClass; ?>" data-bs-toggle="pill" data-bs-target="#tab-pane-<?php echo $i; ?>" type="button">
                        <h5 class="m-0"><i class="fa fa-bars text-primary me-3"></i><?php echo $service_name; ?></h5>
                     </button>
                     <?php
                        $activeClass = '';
                        $activeTabPane = '';
                        $i++;
                        }
                        ?>
                  </div>
               </div>
               <div class="col-lg-8">
                  <div class="tab-content w-100">
                     <?php
                        $activeClass = 'active';
                        $activeTabPane = 'show active';
                        $i =  1;
                        foreach($services as $service) {
                            $service_name = $service["service_name"];
                            $service_image = $service["service_image"];
                            $required_documents = explode("\n", $service["required_documents"]);
                            ?>
                     <!-- Tab Pane -->
                     <div class="tab-pane fade <?php echo $activeTabPane; ?>" id="tab-pane-<?php echo $i; ?>">
                        <div class="row g-4">
                           <div class="col-md-6" style="min-height:   350px;">
                              <div class="position-relative h-100">
                                 <img class="position-absolute rounded w-100 h-100" src="./admin/assets/services/<?php echo $service_image; ?>" style="object-fit: cover;" alt="">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <h3 class="mb-4">Required Documents</h3>
                              <?php foreach($required_documents as $document): ?>
                              <p><i class="fa fa-check text-primary me-3"></i><?php echo $document; ?></p>
                              <?php endforeach; ?>
                              <a href="user-signup.php" class="btn btn-primary py-3 px-5 mt-3">Apply</a>
                           </div>
                        </div>
                     </div>
                     <?php
                        $activeClass = '';
                        $activeTabPane = '';
                        $i++;
                        }
                        ?>
                  </div>
               </div>
            </div>
         </div>
         <br/>
         <center><a href="service.php" class="btn btn-primary py-3 px-5 animated slideInDown">Explore Our All Services</a></center>
      </div>
      <!-- Service End -->
      <?php
         $conn->close();
      ?>
    <!-- Service End -->


    <!-- Callback Start -->
    <div class="container-fluid callback my-5 pt-5">
        <div class="container pt-5">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="bg-white border rounded p-4 p-sm-5 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                            <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Get In Touch</p>
                            <h1 class="display-5 mb-5">Request A Call-Back</h1>
                        </div>
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
                </div>
            </div>
        </div>
    </div>
    <!-- Callback End -->


    <!-- Projects Start 
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Our Projects</p>
                <h1 class="display-5 mb-5">We Have Completed Latest Projects</h1>
            </div>
            <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.3s">
                <div class="project-item pe-5 pb-5">
                    <div class="project-img mb-3">
                        <img class="img-fluid rounded" src="img/service-1.jpg" alt="">
                        <a href=""><i class="fa fa-link fa-3x text-primary"></i></a>
                    </div>
                    <div class="project-title">
                        <h4 class="mb-0">Financial Planning</h4>
                    </div>
                </div>
                <div class="project-item pe-5 pb-5">
                    <div class="project-img mb-3">
                        <img class="img-fluid rounded" src="img/service-2.jpg" alt="">
                        <a href=""><i class="fa fa-link fa-3x text-primary"></i></a>
                    </div>
                    <div class="project-title">
                        <h4 class="mb-0">Cash Investment</h4>
                    </div>
                </div>
                <div class="project-item pe-5 pb-5">
                    <div class="project-img mb-3">
                        <img class="img-fluid rounded" src="img/service-3.jpg" alt="">
                        <a href=""><i class="fa fa-link fa-3x text-primary"></i></a>
                    </div>
                    <div class="project-title">
                        <h4 class="mb-0">Financial Consultancy</h4>
                    </div>
                </div>
                <div class="project-item pe-5 pb-5">
                    <div class="project-img mb-3">
                        <img class="img-fluid rounded" src="img/service-4.jpg" alt="">
                        <a href=""><i class="fa fa-link fa-3x text-primary"></i></a>
                    </div>
                    <div class="project-title">
                        <h4 class="mb-0">Business Loans</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    Projects End -->


    <!-- Team Start 
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Our Team</p>
                <h1 class="display-5 mb-5">Exclusive Team</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <img class="img-fluid rounded" src="img/team-1.jpg" alt="">
                        <div class="team-text">
                            <h4 class="mb-0">Kate Winslet</h4>
                            <div class="team-social d-flex">
                                <a class="btn btn-square rounded-circle mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square rounded-circle mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square rounded-circle mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <img class="img-fluid rounded" src="img/team-2.jpg" alt="">
                        <div class="team-text">
                            <h4 class="mb-0">Jac Jacson</h4>
                            <div class="team-social d-flex">
                                <a class="btn btn-square rounded-circle mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square rounded-circle mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square rounded-circle mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item">
                        <img class="img-fluid rounded" src="img/team-3.jpg" alt="">
                        <div class="team-text">
                            <h4 class="mb-0">Doris Jordan</h4>
                            <div class="team-social d-flex">
                                <a class="btn btn-square rounded-circle mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square rounded-circle mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square rounded-circle mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    Team End -->


    <!-- Testimonial Start 
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Testimonial</p>
                <h1 class="display-5 mb-5">What Our Clients Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.3s">
                <div class="testimonial-item">
                    <div class="testimonial-text border rounded p-4 pt-5 mb-5">
                        <div class="btn-square bg-white border rounded-circle">
                            <i class="fa fa-quote-right fa-2x text-primary"></i>
                        </div>
                        Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat.
                    </div>
                    <img class="rounded-circle mb-3" src="img/testimonial-1.jpg" alt="">
                    <h4>Client Name</h4>
                    <span>Profession</span>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-text border rounded p-4 pt-5 mb-5">
                        <div class="btn-square bg-white border rounded-circle">
                            <i class="fa fa-quote-right fa-2x text-primary"></i>
                        </div>
                        Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat.
                    </div>
                    <img class="rounded-circle mb-3" src="img/testimonial-2.jpg" alt="">
                    <h4>Client Name</h4>
                    <span>Profession</span>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-text border rounded p-4 pt-5 mb-5">
                        <div class="btn-square bg-white border rounded-circle">
                            <i class="fa fa-quote-right fa-2x text-primary"></i>
                        </div>
                        Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat.
                    </div>
                    <img class="rounded-circle mb-3" src="img/testimonial-3.jpg" alt="">
                    <h4>Client Name</h4>
                    <span>Profession</span>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-text border rounded p-4 pt-5 mb-5">
                        <div class="btn-square bg-white border rounded-circle">
                            <i class="fa fa-quote-right fa-2x text-primary"></i>
                        </div>
                        Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat.
                    </div>
                    <img class="rounded-circle mb-3" src="img/testimonial-4.jpg" alt="">
                    <h4>Client Name</h4>
                    <span>Profession</span>
                </div>
            </div>
        </div>
    </div>
    Testimonial End -->

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