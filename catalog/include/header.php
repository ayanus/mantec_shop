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

        <style>
          .cart-icon {
            position: relative;
            cursor: pointer;
          }

          .cart-icon span {
            background: #FF0000;
            color: #fff;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            position: absolute;
            right: -12px;
            top: -7px;
          }
        </style>

        <div class="cart-icon"> 
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
</svg>
          <span>0</span>
        </div>
        
      </div>
    </div>
  </header>