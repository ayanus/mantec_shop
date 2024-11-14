<?php
session_start();

if (!isset($_SESSION['username'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <!-- CSS -->
  <link rel="stylesheet" href="about.css">
  <link rel="stylesheet" href="profile_dropdown.css">
  <link rel="stylesheet" href="slickjs.css">
  <link rel="stylesheet" href="contact.css">

  <!-- jquery -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Sweet alert -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Javascript -->
  <script src="index.js"></script>

</head>

<body>

  <!-- navbar -->
  <header>
    <nav class="navbar">
      <div class="nav-container">
        <a href="index.php">
          <img src="imgs/logo.png" class="logonav">
        </a>
        <p class="nav-profile-name">Mantec Shop</p>
        
        <!-- profile -->
        <div class="nav-profile">
          <div class="nav-profile-cart">
            <i class="fas fa-cart-shopping"></i>
          </div>

          <!-- user profile -->
          <div class="profile-dropdown">
            <div onclick="toggle()" class="profile-dropdown-btn">
              <div class="profile-img">
                <i class="fa-solid fa-circle"></i>
              </div>
              <span><?php echo $_SESSION['username']; ?> <i class="fa-solid fa-angle-down"></i></span>
            </div>
            <ul class="profile-dropdown-list">
              <li class="profile-dropdown-list-item">
                <a href="index_user.php?logout='1'">
                  <i class="fa-solid fa-arrow-right-from-bracket"></i>
                  Log out
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <div class="container">
    <h1>Contact Us</h1>
    <div class="contact-info">
      <p><strong>Email:</strong> support@mantecshop.com</p>
      <p><strong>Phone:</strong> +123-456-7890</p>
      <p><strong>Address:</strong> 123 Mantec Street, City, Country</p>
    </div>
    
    <form class="contact-form">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="message">Message:</label>
      <textarea id="message" name="message" required></textarea>

      <button type="submit">Send Message</button>
    </form>
  </div>

</body>

</html>
