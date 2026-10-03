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
            <a href="workflow-lists.php">
              <i class="bi bi-circle"></i><span>Workflow List</span>
            </a>
          </li>
          <li>
            <a href="assigned-workflow.php">
              <i class="bi bi-circle"></i><span>Assigned Workflow</span>
            </a>
          </li>
          <li>
            <a href="process-workflow.php">
              <i class="bi bi-circle"></i><span>Processing Workflow</span>
            </a>
          </li>
          <li>
            <a href="complete-workflow.php">
              <i class="bi bi-circle"></i><span>Complete Workflow</span>
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
            <a href="add-services.php">
              <i class="bi bi-circle"></i><span>Add Services</span>
            </a>
          </li>
          <li>
            <a href="manage-services.php">
              <i class="bi bi-circle"></i><span>Manage Services</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      
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
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-command"></i><span>Chartered Accountant</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="manage-ca.php">
              <i class="bi bi-circle"></i><span>Manage CA</span>
            </a>
          </li>
          <li>
            <a href="ca-commission.php">
              <i class="bi bi-circle"></i><span>Pending Commission</span>
            </a>
          </li>
          <li>
            <a href="ca-payments-reports.php">
              <i class="bi bi-circle"></i><span>Payments Reports</span>
            </a>
          </li>
        </ul>
      </li>
      
      <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#franchise-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-shop"></i><span>Frenchise</span>
        <i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="franchise-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
            <a href="manage-frenchise.php">
                <i class="bi bi-circle"></i><span>Manage Frenchise</span>
            </a>
        </li>
        <li>
            <a href="french-commission.php">
              <i class="bi bi-circle"></i><span>Pending Commission</span>
            </a>
          </li>
          <li>
            <a href="french-payments-reports.php">
              <i class="bi bi-circle"></i><span>Payments Reports</span>
            </a>
          </li>
    </ul>
</li>
      <!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Transaction Details</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="payment.php">
              <i class="bi bi-circle"></i><span>Payment History</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

      <!--<li class="nav-item">-->
      <!--  <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">-->
      <!--    <i class="bi bi-gem"></i><span>Manage Employee</span><i class="bi bi-chevron-down ms-auto"></i>-->
      <!--  </a>-->
        <!--<ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">-->
        <!--  <li>-->
        <!--    <a href="icons-bootstrap.html">-->
        <!--      <i class="bi bi-circle"></i><span>Bootstrap Icons</span>-->
        <!--    </a>-->
        <!--  </li>-->
        <!--  <li>-->
        <!--    <a href="icons-remix.html">-->
        <!--      <i class="bi bi-circle"></i><span>Remix Icons</span>-->
        <!--    </a>-->
        <!--  </li>-->
        <!--  <li>-->
        <!--    <a href="icons-boxicons.html">-->
        <!--      <i class="bi bi-circle"></i><span>Boxicons</span>-->
        <!--    </a>-->
        <!--  </li>-->
        <!--</ul>-->
      </li><!-- End Icons Nav -->

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

      <li class="nav-item">
        <a class="nav-link collapsed" href="contact.php">
          <i class="bi bi-card-list"></i>
          <span>Contact</span>
        </a>
      </li>

      <!--<li class="nav-item">-->
      <!--  <a class="nav-link collapsed" href="pages-login.html">-->
      <!--    <i class="bi bi-box-arrow-in-right"></i>-->
      <!--    <span>Login</span>-->
      <!--  </a>-->
      <!--</li>-->

      <!--<li class="nav-item">-->
      <!--  <a class="nav-link collapsed" href="pages-error-404.html">-->
      <!--    <i class="bi bi-dash-circle"></i>-->
      <!--    <span>Error 404</span>-->
      <!--  </a>-->
      <!--</li>-->

      <!--<li class="nav-item">-->
      <!--  <a class="nav-link collapsed" href="pages-blank.html">-->
      <!--    <i class="bi bi-file-earmark"></i>-->
      <!--    <span>Blank</span>-->
      <!--  </a>-->
      <!--</li>-->

    </ul>

  </aside><!-- End Sidebar-->