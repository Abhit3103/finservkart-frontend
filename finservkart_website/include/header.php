<?php include_once('init.php'); ?>
<!-- Navbar Start -->
<div class="container-fluid" style="padding: 0;">
   <nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(248, 250, 252, 1) 100%); backdrop-filter: blur(10px); box-shadow: 0 4px 20px rgba(0, 102, 204, 0.08);">
      <div class="container-fluid px-3 px-lg-5">
         <!-- Brand/Logo -->
         <a href="index.php" class="navbar-brand me-4" style="font-size: 20px; font-weight: 700; background: linear-gradient(135deg, #0066cc 0%, #0052a3 100%); background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
            <i class="fas fa-chart-line me-2"></i>FinservKart
         </a>

         <!-- Toggler -->
         <button type="button" class="navbar-toggler border-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" style="box-shadow: none;">
            <span class="navbar-toggler-icon"></span>
         </button>

         <!-- Navbar Items -->
         <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
               <a href="index.php" class="nav-item nav-link" style="font-weight: 500; color: #1a1a1a; position: relative; margin: 0 12px; transition: all 0.3s ease;">Home</a>
               <a href="about.php" class="nav-item nav-link" style="font-weight: 500; color: #1a1a1a; position: relative; margin: 0 12px; transition: all 0.3s ease;">About</a>
               <a href="service.php" class="nav-item nav-link" style="font-weight: 500; color: #1a1a1a; position: relative; margin: 0 12px; transition: all 0.3s ease;">Services</a>
               
               <!-- Login Dropdown -->
               <div class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle" style="font-weight: 500; color: #1a1a1a; position: relative; margin: 0 12px; display: flex; align-items: center; gap: 6px;" data-bs-toggle="dropdown">
                     <i class="fas fa-sign-in-alt"></i>Login
                  </a>
                  <div class="dropdown-menu border-0 shadow-lg" style="border-radius: 12px; margin-top: 12px; background: white; box-shadow: 0 10px 30px rgba(37, 99, 235, 0.15); overflow: hidden; min-width: 200px;">
                     <a href="ca-login.php" class="dropdown-item" style="padding: 14px 20px; color: #0f172a; font-weight: 500; transition: all 0.3s ease; display: flex; align-items: center; gap: 10px; border-bottom: 1px solid #f1f5f9;">
                        <i class="fas fa-briefcase" style="color: #2563eb; font-size: 16px;"></i>
                        <span>CA Login</span>
                        <i class="fas fa-arrow-right ms-auto" style="font-size: 12px; opacity: 0; transition: all 0.3s ease;"></i>
                     </a>
                     <a href="agent.php" class="dropdown-item" style="padding: 14px 20px; color: #0f172a; font-weight: 500; transition: all 0.3s ease; display: flex; align-items: center; gap: 10px; border-bottom: 1px solid #f1f5f9;">
                        <i class="fas fa-user" style="color: #2563eb; font-size: 16px;"></i>
                        <span>Agent Login</span>
                        <i class="fas fa-arrow-right ms-auto" style="font-size: 12px; opacity: 0; transition: all 0.3s ease;"></i>
                     </a>
                     <a href="customer.php" class="dropdown-item" style="padding: 14px 20px; color: #0f172a; font-weight: 500; transition: all 0.3s ease; display: flex; align-items: center; gap: 10px;">
                        <i class="fas fa-user-circle" style="color: #2563eb; font-size: 16px;"></i>
                        <span>Customer Login</span>
                        <i class="fas fa-arrow-right ms-auto" style="font-size: 12px; opacity: 0; transition: all 0.3s ease;"></i>
                     </a>
                  </div>
               </div>

               <style>
                  .dropdown-item {
                     transition: all 0.3s ease !important;
                  }
                  .dropdown-item:hover {
                     background: linear-gradient(135deg, rgba(37, 99, 235, 0.05) 0%, rgba(16, 185, 129, 0.05) 100%) !important;
                     color: #2563eb !important;
                     padding-left: 22px !important;
                  }
                  .dropdown-item:hover i:last-child {
                     opacity: 1 !important;
                     transform: translateX(4px);
                  }
               </style>

               <a href="contact.php" class="nav-item nav-link" style="font-weight: 500; color: #1a1a1a; position: relative; margin: 0 12px; transition: all 0.3s ease;">Contact</a>
            </div>

            <!-- Social Icons -->
            <div class="d-flex gap-2 ms-lg-3 mt-3 mt-lg-0">
               <a class="btn btn-sm rounded" href="<?= $fb ?>" style="background: linear-gradient(135deg, rgba(37, 99, 235, 0.1) 0%, rgba(16, 185, 129, 0.08) 100%); width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; border: 1px solid rgba(37, 99, 235, 0.2);">
                  <small class="fab fa-facebook-f" style="color: #2563eb; font-size: 14px;"></small>
               </a>
               <a class="btn btn-sm rounded" href="<?= $insta ?>" style="background: linear-gradient(135deg, rgba(37, 99, 235, 0.1) 0%, rgba(16, 185, 129, 0.08) 100%); width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; border: 1px solid rgba(37, 99, 235, 0.2);">
                  <small class="fab fa-instagram" style="color: #2563eb; font-size: 14px;"></small>
               </a>
               <a class="btn btn-sm rounded" href="https://wa.me/+91<?= $whatsapp ?>" style="background: linear-gradient(135deg, rgba(37, 99, 235, 0.1) 0%, rgba(16, 185, 129, 0.08) 100%); width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; border: 1px solid rgba(37, 99, 235, 0.2);">
                  <small class="fab fa-whatsapp" style="color: #2563eb; font-size: 14px;"></small>
               </a>
            </div>

            <!-- CTA Button -->
            <a href="user-signup.php" class="btn btn-primary btn-sm ms-lg-3 mt-3 mt-lg-0" style="border-radius: 8px; padding: 10px 24px; font-weight: 600; font-size: 14px; background: linear-gradient(135deg, #2563eb 0%, #10b981 100%); box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3); transition: all 0.3s ease;">
               <i class="fas fa-rocket me-2"></i>Sign Up
            </a>

            <style>
               .btn.rounded:hover {
                  transform: translateY(-3px);
                  box-shadow: 0 6px 20px rgba(37, 99, 235, 0.2) !important;
                  background: linear-gradient(135deg, rgba(37, 99, 235, 0.2) 0%, rgba(16, 185, 129, 0.15) 100%) !important;
               }
            </style>
         </div>
      </div>
   </nav>
</div>
<!-- Navbar End -->