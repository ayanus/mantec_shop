<?php include('../connection/connect.php'); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body class="app">
    <?php include('include/header.php'); ?>
    <?php include('include/menu.php'); ?>
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <?php
            $rows = null; // กำหนดค่าเริ่มต้น
            if (!isset($_GET['page']) || $_GET['page'] == 'home'){
                include('dashboard/index.php');
            } else if (isset($_GET['page']) && ($_GET['page']) == 'about') {
                include('about/index.php');
            } else if (isset($_GET['page']) && ($_GET['page']) == 'contact') {
                include('contact/index.php');
            } else if (isset($_GET['page']) && ($_GET['page']) == 'product') {
                include('product/index.php');
                if (isset($_GET['type']) && $_GET['type'] == 'All Product') {
                    $sql = "SELECT * FROM sp_product";
                } else {
                    $type = mysqli_real_escape_string($connection, $_GET['type']);
                    $sql = "SELECT * FROM sp_product WHERE type = '$type'";
                }
                $rows = mysqli_query($connection, $sql);

                // ตรวจสอบผลลัพธ์จาก mysqli_query
                if (!$rows) {
                    die('Error in query: ' . mysqli_error($connection)); // แสดงข้อความข้อผิดพลาดของ SQL
                }
            }
            ?>
        </div>
    </div>

</body>

</html>