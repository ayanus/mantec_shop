<?php
if (isset($_POST) && !empty($_POST)) {
    $product_type_id = $_POST['product_type_id'];
    $brand_id = $_POST['brand_id'];
    $product_name = $_POST['product_name'];
    $detail = $_POST['detail']; 
    $price = $_POST['price'];

    if (isset($_FILES['img']['name']) && !empty($_FILES['img']['name'])) {
        $extension = array("jpeg", "jpg", "png", "gif");
        $target = 'upload/product/';
        $filename = $_FILES['img']['name'];
        $filetmp = $_FILES['img']['tmp_name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (in_array($ext, $extension)) {
            if (!file_exists($target . $filename)) {
                if (move_uploaded_file($filetmp, $target . $filename)) {
                    $filename = $filename;
                } else {
                    $alert = '<script type="text/javascript">';
                    $alert .= 'alert("เพิ่มไฟล์เข้า folder ไม่สำเร็จ");';
                    $alert .= 'window.location.href = "?page=' . $_GET['page'] . '&function=add";';
                    $alert .= '</script>';
                    echo $alert;
                    exit();
                }
            } else {
                $newfilename = time() . $filename;
                if (move_uploaded_file($filetmp, $target . $newfilename)) {
                    $filename = $newfilename;
                } else {
                    $alert = '<script type="text/javascript">';
                    $alert .= 'alert("เพิ่มไฟล์เข้า folder ไม่สำเร็จ");';
                    $alert .= 'window.location.href = "?page=' . $_GET['page'] . '&function=add";';
                    $alert .= '</script>';
                    echo $alert;
                    exit();
                }
            }
        } else {
            $alert = '<script type="text/javascript">';
            $alert .= 'alert("ประเภทไฟล์ไม่ถูกต้อง");';
            $alert .= 'window.location.href = "?page=' . $_GET['page'] . '&function=add";';
            $alert .= '</script>';
            echo $alert;
            exit();
        }
    } else {
        $filename = '../../../image/no-image.jpg';
    }
    $sql = "INSERT INTO product(product_name, img, price, detail, product_type_id, brand_id) VALUES('$product_name','$filename','$price','$detail','$product_type_id', '$brand_id')";

    if (mysqli_query($connection, $sql)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("เพิ่มข้อมูลสินค้าสำเร็จ");';
        $alert .= 'window.location.href = "?page=' . $_GET['page'] . '";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }

    mysqli_close($connection);
}
$sql = "SELECT * FROM product";
$query = mysqli_query($connection, $sql);
?>

<head>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css">
    
    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>
</head>

<script >

</script>
<div class="row justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">เพิ่มข้อมูลสินค้า</h1>
    </div>
    <div class="col-auto">
        <a href="?page=<?= $_GET['page'] ?>" class="btn app-btn-secondary">ย้อนกลับ</a>
    </div>
</div>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card app-card-settings shadow-sm p-4">

            <div class="app-card-body">

                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3 col-lg-6">
                        <label class="form-label">รูปภาพ</label>
                        <div class="mb-3">
                            <img id="preview" class="rounded" width="250" height="250">
                        </div>
                        <div class="input-group mb-3 ">
                            <input type="file" class="form-control" name="img" id="image">
                        </div>
                    </div>
                    
                    <div class="dropdown mb-3 col-lg-6">
                        <label class="form-label">แบรนด์</label>
                        <select name="brand_id" class="form-control selectpicker" data-live-search="true" data-none-selected-text="กรุณาเลือกแบรนด์" required>
                            <option value="" disabled selected>กรุณาเลือกแบรนด์</option>
                            <?php
                                $sql = "SELECT * FROM brand";
                                $query = mysqli_query($connection, $sql);
                                while($row=mysqli_fetch_array($query)){
                            ?>
                            <option value="<?= $row['brand_id'] ?>"><?= $row['brand_name'] ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>

                    <style>
                        .dropdown-menu .inner li a {
                            color: black !important; /* บังคับให้ข้อความเป็นสีดำ */
                        }
                    </style>

                    <script>
                        $(document).ready(function() {
                            $('.selectpicker').selectpicker();
                        });
                    </script>

                    <div class="dropdown mb-3 col-lg-6">
                        <label class="form-label">ประเภทสินค้า</label>
                        <select name="product_type_id" class="form-control" style="height: unset !important;" required>
                            <?php
                                $sql = "SELECT * FROM product_type";
                                $query = mysqli_query($connection, $sql);
                                while($row=mysqli_fetch_array($query)){
                            ?>
                            <option value="<?= $row['type_id'] ?>"><?= $row['type_name'] ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3 col-lg-6">
                        <label class="form-label">ชื่อสินค้า</label>
                        <input type="text" class="form-control" name="product_name" placeholder="ชื่อสินค้า"
                            value="" autocomplete="off" required>
                    </div>
                    
                    <div class="mb-3 col-lg-6">
                        <label class="form-label">รายละเอียดสินค้า</label>
                        <textarea name="detail" class="form-control" style="height: 100px;"></textarea>
                    </div>

                    <hr class="mb-3 mt-4">

                    <div class="mb-3 col-lg-6">
                        <label class="form-label">ราคา</label>
                        <input type="text" class="form-control" name="price" placeholder="ราคา" autocomplete="off" required>
                    </div>
                    <button type="submit" class="btn app-btn-primary">บันทึก</button>
                </form>
            </div><!--//app-card-body-->

        </div><!--//app-card-->
    </div>
</div><!--//row-->

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#preview')
                    .attr('src', e.target.result)
                // .width(150)
                // .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image").change(function() {
        readURL(this);
    });
</script>