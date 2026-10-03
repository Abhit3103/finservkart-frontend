<?php include_once('init.php'); ?>
<!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Our Office</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i><?= $address ?></p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+91 <?= $phone ?></p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i><?= $email ?></p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href="<?= $fb ?>"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href="<?= $insta ?>"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href="<?= $twitter ?>"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href="<?= $linkedin ?>"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="about.php">About Us</a>
                    <a class="btn btn-link" href="contact.php">Contact Us</a>
                    <a class="btn btn-link" href="service.php">Our Services</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Login</h4>
                    <a class="btn btn-link" href="ca-login.php">CA Login</a>
                    <a class="btn btn-link" href="user-login.php">User Login</a>
                    <a class="btn btn-link" href="agent-login.php">Agent Login</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Support</h4>
                    <a class="btn btn-link" href="privacy-policy.php">Privacy Policy</a>
                    <a class="btn btn-link" href="terms-and-conditions.php">Terms & Condition</a>
                    <a class="btn btn-link" href="refund-policy.php">Refund & Cancellation</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="https://finservkart.com"><?= $company ?></a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    Developed By <a class="border-bottom" href="index.php">Finservkart</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->