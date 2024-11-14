<?php include('../connection/connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include('include/head.php'); ?>

<body class="app">
    <?php include('include/header.php'); ?>
    <?php include('include/script.php'); ?>
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <?php
                // dashboard
                if (!isset($_GET['page']) && empty($_GET['page'])){
                    include('dashboard/index.php');
                    // about
                } else if (isset($_GET['page']) && ($_GET['page']) == 'about') {
                    include('about/index.php');
                    // product
                } else if (isset($_GET['page']) && ($_GET['page']) == 'product') {
                    if (isset($_GET['function']) && $_GET['function'] == 'add') {
                        include('product/insert.php');
                    } elseif (isset($_GET['function']) && $_GET['function'] == 'update') {
                        include('product/edit.php');
                    } elseif (isset($_GET['function']) && $_GET['function'] == 'delete') {
                        include('product/delete.php');
                    } else {
                        include('product/index.php');
                    }
                    // producttype
                } else if (isset($_GET['page']) && ($_GET['page']) == 'producttype') {
                    if (isset($_GET['function']) && $_GET['function'] == 'add') {
                        include('producttype/insert.php');
                    } elseif (isset($_GET['function']) && $_GET['function'] == 'update') {
                        include('producttype/edit.php');
                    } elseif (isset($_GET['function']) && $_GET['function'] == 'delete') {
                        include('producttype/delete.php');
                    } else {
                        include('producttype/index.php');
                    }
                    // admin
                } else if (isset($_GET['page']) && ($_GET['page']) == 'admin') {
                    if (isset($_GET['function']) && $_GET['function'] == 'add') {
                        include('admin/insert.php');
                    } elseif (isset($_GET['function']) && $_GET['function'] == 'update') {
                        include('admin/edit.php');
                    } elseif (isset($_GET['function']) && $_GET['function'] == 'delete') {
                        include('admin/delete.php');
                    } else {
                        include('admin/index.php');
                    }
                } ?>
            </div><!--//container-fluid-->
        </div><!--//app-content-->
        <?php include('include/footer.php'); ?>
    </div><!--//app-wrapper-->

</body>

</html>