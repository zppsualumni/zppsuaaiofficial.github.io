<nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light" id="sidenavAccordion" style="background-color: #800000;">
  <button class="btn btn-icon btn-transparent-light order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i data-feather="menu"></i></button>

  <img height="50px" style="filter: brightness(150%);" src="./assets/uploads/zppsu_favicon.png" alt="" srcset="">
  <a class="navbar-brand text-white ml-3">ZPPSU - Alumni Management Information System</a>


  <!-- Navbar Items-->
  <?php if (isset($_SESSION["login_type"]) && $_SESSION["login_type"] == 1): ?>

  <ul class="navbar-nav align-items-center ms-auto">
      <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
          <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="assets/uploads/avatar.jpg" /></a>
          <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage" style="background-color: #800000">
              <h6 class="dropdown-header d-flex align-items-center">
                  <img class="dropdown-user-img" src="./assets/uploads/avatar.jpg" />
                  <div class="dropdown-user-details">
                      <div class="dropdown-user-details-name text-white"><?php echo $_SESSION['login_name'] ?></div>
                      <!-- <div class="dropdown-user-details-email text-white">zernalandrei@email.com</div> -->
                  </div>
              </h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-white" href="javascript:void(0)" id="manage_my_account">
                  <div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                  Account
              </a>
              <a class="dropdown-item text-white" href="ajax.php?action=logout">
                  <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                  Logout
              </a>
          </div>
      </li>
  </ul>
  <?php endif; ?>
</nav>

<script>
  $('#manage_my_account').click(function(){
    uni_modal("Manage Account","manage_user.php?id=<?php echo $_SESSION['login_id'] ?>&mtype=own")
  })
</script>