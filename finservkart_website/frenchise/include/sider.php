
<!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#work-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bricks"></i><span>Workflow</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="work-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="my-workflow.php">
              <i class="bi bi-circle"></i><span>My Workflow</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Services</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="services.php">
              <i class="bi bi-circle"></i><span>All Services</span>
            </a>
          </li>
          <li>
            <a href="my-services.php">
              <i class="bi bi-circle"></i><span>My Services</span>
            </a>
          </li>
        </ul>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#cus-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Customer</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="cus-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="manage-customer.php">
              <i class="bi bi-circle"></i><span>Manage Customer</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Agents</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="manage-agent.php">
              <i class="bi bi-circle"></i><span>Manage Agent</span>
            </a>
          </li>
          <li>
            <a href="agent-commission.php">
              <i class="bi bi-circle"></i><span>Pending Commission</span>
            </a>
          </li>
          <li>
            <a href="agent-payments-reports.php">
              <i class="bi bi-circle"></i><span>Payments Reports</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="support.php">
          <i class="bi bi-envelope"></i>
          <span>Support</span>
        </a>
      </li><!-- End Contact Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->