<!-- Notification 3 -->
<?php if (isset($_SESSION['success'])) : ?>
  <div class="notifications" id="success">
    <script>
      $(document).ready(function() {
        <?php if (isset($_SESSION['success']) && $_SESSION['success'] != '') { ?>
          const notifications = document.querySelector(".notifications");

          const toastDetails = {
            timer: 5000,
            success: {
              icon: 'fa-circle-check',
              text: 'Success: This is a success toast.',
            }
          }

          const removeToast = (toast) => {
            toast.classList.add("hide");
            if (toast.timeoutId) clearTimeout(toast.timeoutId); // Clearing the timeout for the toast
            setTimeout(() => toast.remove(), 500); // Removing the toast after 500ms
          }

          const createToast = (id) => {
            // Getting the icon and text for the toast based on the id passed
            const {
              icon,
              text
            } = toastDetails[id];
            const toast = document.createElement("li"); // Creating a new 'li' element for the toast // Setting the classes for the toast
            toast.className = `toast ${id}`;
            // Setting the inner HTML for the toast
            toast.innerHTML = `<div class="column">
                                <i class="fa-solid ${icon}"></i>
                                <span>Success: <?php echo $_SESSION['success']; ?></span>
                              </div>
                              <i class="fa-solid fa-xmark" onclick="removeToast(this.parentElement)"></i>`;
            notifications.appendChild(toast); // Append the toast to the notification ul
            // Setting a timeout to remove the toast after the specified duration
            toast.timeoutId = setTimeout(() => removeToast(toast), toastDetails.timer);
          }

          createToast(notifications.id).innerHTML

        <?php }
        unset($_SESSION['success']);
        ?>
      });
    </script>

  </div>
<?php endif ?>


<!-- old navbar -->
<nav class="bg-navbar">
  <div class="nav-container">
    <a href="index_admin.php">
      <img src="imgs/logo.png" class="logonav">
    </a>
    <p class="nav-profile-name">Mantec Shop</p>
    <!-- sidebar search center -->

    <!-- <div class="bg-sidebar-search" id="sidebarSearchContainer"> -->
      <input name="search" type="text" class="sidebar-search-center" onkeyup="searchsomething(this)" placeholder="ค้นหาสินค้า" value="<?= (isset($_GET['search']) ? $_GET['search'] : '') ?>">
      <!-- <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i> -->
    <!-- </div> -->
    

    <!-- profile -->
    <div class="nav-profile">

      <!-- user profile -->
      <div class="profile-dropdown">
        <div onclick="toggle()" class="profile-dropdown-btn">
          <div class="profile-img">
            <i class="fa-solid fa-circle"></i>
          </div>

          <span>
            <?php echo $_SESSION['username']; ?>
            <i class="fa-solid fa-angle-down"></i>
          </span>
        </div>

        <ul class="profile-dropdown-list">
          <li class="profile-dropdown-list-item">
            <a href="admin/index.php">
              <i class="fa-solid fa-sliders"></i>
              Admin Mode
            </a>
          </li>

          <li class="profile-dropdown-list-item">
            <a href="admin/index.php?page=about">
              <i class="fa-regular fa-user"></i>
              Edit Profile
            </a>
          </li>

          <li class="profile-dropdown-list-item">
            <a href="admin/index.php?page=product&function=add">
              <i class="fa-regular fa-user"></i>
              Upload
            </a>
          </li>

          <li class="profile-dropdown-list-item">
            <a href="#">
              <i class="fa-regular fa-envelope"></i>
              Inbox
            </a>
          </li>

          <li class="profile-dropdown-list-item">
            <a href="#">
              <i class="fa-solid fa-chart-line"></i>
              Analytics
            </a>
          </li>

          <li class="profile-dropdown-list-item">
            <a href="/./././admin/index.php">
              <i class="fa-solid fa-sliders"></i>
              Settings
            </a>
          </li>

          <li class="profile-dropdown-list-item">
            <a href="#">
              <i class="fa-regular fa-circle-question"></i>
              Help & Support
            </a>
          </li>
          <hr />

          <li class="profile-dropdown-list-item">
            <a href="index.php?logout='1'">
              <i class="fa-solid fa-arrow-right-from-bracket"></i>
              Log out
            </a>
          </li>
        </ul>
      </div>

      <div onclick="openCart()" style="cursor: pointer;" class="nav-profile-cart">
        <i class="fas fa-cart-shopping"></i>
        <div id="cartcount" class="cartcount" style="display: none;">
          0
        </div>
      </div>

      <!--  logged in user information -->
      <?php if (isset($_SESSION['username'])) : ?>
      <?php endif ?>
    </div>

  </div>
  <div class="nav-menu">
    <ul class="nav-menu-container">
      <a href="index_admin.php">
        <li>หน้าแรก</li>
      </a>
      <a href="index_admin.php">
        <li>กิจกรรม</li>
      </a>
      <a href="index_admin.php">
        <li>บริการส่งซ่อม/ส่งเคลม</li>
      </a>
      <a href="index_admin.php">
        <li>ติดต่อ</li>
      </a>
    </ul>
  </div>
</nav>
<script src="profile_dropdown.js"></script>