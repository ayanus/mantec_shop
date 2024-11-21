<?php include('server.php'); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>

<body>
    
    <h1>เพิ่มสินค้า</h1>
    <div class="white-box">
        <div class="login-ui">
            <form action="make_db_new.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="product_name">ชื่อสินค้า</label>
                    <input type="text" name="product_name" required>
                </div>
                <div class="form-group">
                    <label for="product_type">ประเภทสินค้า</label>
                    <input type="text" name="product_type" required>
                </div>
                <div class="form-group">
                    <label for="product_price">ราคา</label>
                    <input type="number" name="product_price" required step="0.01">
                </div>
                <div class="form-group">
                    <label for="product_detail">รายละเอียดสินค้า</label>
                    <textarea name="product_detail" required></textarea>
                </div>
                <div class="form-group">
                    <input type="file" name="image" accept="image/*" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="make_product" class="btn">เพิ่มสินค้า</button>
                </div>
                <div class="d-grid gap-2 col-sm-6">
                    <a href="formAddProduct.php" class="btn btn-warning">ยกเลิก</a>
                </div>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12"> <br>
                <?php
                //ถ้ามีการส่งพารามิเตอร์ method get และ  method get ชือ act = add จะแสดงฟอร์มเพิ่มข้อมูล
                if (isset($_GET['act']) && $_GET['act'] == 'add') { ?>
                    <h3>PHP PDO ฟอร์มเพิ่มข้อมูลสินค้า </h3>
                    <form method="post" enctype="multipart/form-data">
                        ชื่อสินค้า
                        <input type="text" name="product_name" required class="form-control" placeholder="ชื่อสินค้า ขั้นต่ำ 4 ตัว" minlength="4"> <br>
                        รายละเอียดสินค้า
                        <textarea name="product_detail" required class="form-control" placeholder="รายละเอียด"></textarea> <br>
                        ราคา
                        <input type="number" name="product_price" required class="form-control" min="0"> <br>
                        <font color="red">*อัพโหลดได้เฉพาะ .jpeg , .jpg , .png </font>
                        <input type="file" name="product_img" required class="form-control" accept="image/jpeg, image/png, image/jpg"> <br>
                        <div class="row">
                            <div class="d-grid gap-2 col-sm-6">
                                <button type="submit" class="btn btn-primary">เพิ่มสินค้า</button>
                            </div>
                            <div class="d-grid gap-2 col-sm-6">
                                <a href="formAddProduct.php" class="btn btn-warning">ยกเลิก</a>
                            </div>
                        </div>
                        <br>
                    </form>
                <?php } ?>
                <h3>รายการสินค้า
                    <a href="formAddProduct.php?act=add" class="btn btn-info btn-sm">+สินค้า</a>
                </h3>
                <table class="table table-striped  table-hover table-responsive table-bordered">
                    <thead>
                        <tr>
                            <th width="5%">ลำดับ</th>
                            <th width="10%">ภาพ</th>
                            <th width="25%">ชื่อสินค้า</th>
                            <th width="40%">รายละเอียด</th>
                            <th width="20%" class="text-center">ราคา</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //เรียกไฟล์เชื่อมต่อฐานข้อมูล
                        require_once 'server.php';
                        //คิวรี่ข้อมูลมาแสดงในตาราง
                        $stmt = $conn->prepare("SELECT* FROM tbl_product");
                        $stmt->execute();
                        $result = $stmt->fetchAll();
                        foreach ($result as $row) {
                        ?>
                            <tr>
                                <td><?= $row['no']; ?></td>
                                <td><img src="upload/<?= $row['product_img']; ?>" width="70%"></td>
                                <td><?= $row['product_name']; ?></td>
                                <td><?= $row['product_detail']; ?></td>
                                <td align="right"><?= number_format($row['product_price'], 2); ?></td>

                            <?php } ?>
                    </tbody>
                </table>
                <br>
                <center>Basic PHP PDO Form add product by devbanban.com 2021</center>
            </div>
        </div>
    </div>
</body>

</html>