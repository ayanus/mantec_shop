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
  <title>Home page</title>
  <!-- CSS -->
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="profile_dropdown.css">
  <link rel="stylesheet" href="slickjs.css">
  <link rel="stylesheet" href="massage.css">

  <!-- jquery -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Sweet alert -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Javascript -->
  <script src="index.js"></script>
  <!-- unicons -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
  <!-- slick js -->
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

</head>

<body>

  <!-- navbar -->
  <header>
    <?php include('header/header_user.php'); ?>
  </header>


  <main>
    <div class="container">
      <!-- <div class="sidebar"> -->
        <!-- <a onclick="searchproduct('all')" class="sidebar-items">สินค้าทั้งหมด</a> -->
        <!-- <a onclick="searchproduct('cpu')" class="sidebar-items">cpu</a>
        <a onclick="searchproduct('printer')" class="sidebar-items">printer</a> -->
      <!-- </div> -->

      <div id="productlist" class="product"></div>

    </div>
    <div id="pagination" class="pagination">
      <button onclick="prevPage()">
        <<< </button>
          <span id="pageInfo">Page 1</span>
          <button onclick="nextPage()"> >>> </button>
    </div>
  </main>

  <div id="modalDesc" class="modal" style="display: none;">
    <div onclick="closeModal()" class="modal-bg"></div>
    <div class="modal-page">
      <h2>Detail</h2>
      <br>
      <div class="modaldesc-content">
        <img id="mdd-img" class="modaldesc-img"
          src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80"
          alt="">
        <div class="modaldesc-detail">
          <p id="mdd-name" style="font-size: 1.5vw;"></p>
          <p id="mdd-price" style="font-size: 1.2vw;"></p>
          <br>
          <p id="mdd-desc" style="color: #adadad;"></p>
          <br>
          <div class="btn-control">
            <button onclick="closeModal()" class="btn">
              Close
            </button>
            <button onclick="addtocart()" class="btn btn-buy">
              Add to cart
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="modalCart" class="modal" style="display: none;">
    <div onclick="closeModal()" class="modal-bg"></div>
    <div class="modal-page">
      <h2>My cart</h2>
      <br>
      <div id="mycart" class="cartlist">

      </div>

      <div class="btn-control">
        <button onclick="closeModal()" class="btn">
          Cancel
        </button>
        <button onclick="buynow()" class="btn btn-buy">
          Buy
        </button>
      </div>
    </div>
  </div>

</body>

</html>