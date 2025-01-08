<header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none <?php echo isset($_GET['page']) && ($_GET['page']) == 'home' ? 'active' : '' ?>" href="?page=home">
          <img class="logo-icon me-2" width="70" src="image/new-logo.png" alt="logo">
        </a>

        <form class="col-12 col-lg-8 mb-3 mb-lg-0 me-lg-6 mx-auto" role="search">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>

        <div class="text-end me-5">
          <?php if (isset($_SESSION['username'])) {?>
            <div class="dropdown">
              <a href="#" class="d-flex align-items-center d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person me-2" viewBox="0 0 16 16">
                  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                </svg>
                <span><?php echo $_SESSION['username']; ?></span>
              </a>
              <ul class="dropdown-menu text-small">
                <li><a class="dropdown-item" href="#">Profile</a></li>

                <?php if ($_SESSION['role'] == 'a') { ?>
                  <li><a class="dropdown-item" href="admin/index.php">Admin Mode</a></li>
                <?php } ?>

                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
              </ul>
            </div>
            <?php } else { ?>
              <a href="login.php" class="d-flex align-items-center link-body-emphasis text-decoration-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person me-2" viewBox="0 0 16 16">
                  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                </svg>
                <span>เข้าสู่ระบบ</span>
              </a>
            <?php } ?>
        </div>

        <div class=""> 
          <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l1.25 5h8.22l1.25-5zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
          </svg>
        </div>
      </div>
    </div>
  </header>