<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="?page=dashboard" class="logo d-flex align-items-center">
      <img src="assets/img/logo.png" alt="">
      <span class="d-none d-lg-block">Warid</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  <div class="search-bar">
    <div class="search-form d-flex align-items-center">
      <input type="text" name="query" placeholder="Web Warid" title="Web Warid" value="Web Warid" disabled>
      <button><i class="bi bi-search"></i></button>
    </div>
  </div><!-- End Name Bar -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item d-block d-lg-none">
        <a class="nav-link nav-icon search-bar-toggle " href="#">
          <i class="bi bi-search"></i>
        </a>
      </li><!-- End Search Icon-->


      <!-- PROFILE GUEST -->
      <?php if (!isset($_SESSION['user'])) {
      ?>
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-user.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Anonymous</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Anonymous</h6>
              <span>Tamu</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="?page=login">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign In</span>
              </a>
            </li>

          </ul>
        </li>
      <?php } ?>
      <!-- PROFILE GUEST -->

      <!-- PROFILE SIGNIN -->
      <?php if (isset($_SESSION['user'])) {
        if (in_array($_SESSION['role'], ['admin', 'petugas', 'wakasek', 'walikelas', 'siswa'])) {
      ?>
          <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
              <img src="assets/img/profile-user.png" alt="Profile" class="rounded-circle">
              <span class="d-none d-md-block dropdown-toggle ps-2">
                <?php echo htmlspecialchars($userDisplayName, ENT_QUOTES, 'UTF-8'); ?>
              </span>
            </a>

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li class="dropdown-header">
                <h6><?php echo $_SESSION['user'] ?></h6>
                <span><?php echo $_SESSION['role'] ?></span>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <span class="dropdown-item d-flex align-items-center" href="#">
                  <i class="bi bi-threads"></i>
                  <span><?php echo $_SESSION['user'] ?></span>
                </span>
              </li>

              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <a class="dropdown-item d-flex align-items-center" href="?page=logout">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Log Out</span>
                </a>
              </li>

            </ul>
          </li>
          <!-- PROFILE SIGNIN -->
      <?php }
      } ?>
    </ul>

  </nav><!-- End Icons Navigation -->

</header>