<?php
if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $sql = "SELECT * FROM product WHERE product_id = '$product_id'";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($query);
}
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
                move_uploaded_file($filetmp, $target . $filename);
            } else {
                $filename = time() . $filename;
                move_uploaded_file($filetmp, $target . $filename);
            }
        } else {
            die("Invalid file type");
        }
    } else {
        $filename = $_POST['existing_img'];
    }

    $sql = "UPDATE product 
            SET product_name = '$product_name', 
                img = '$filename', 
                price = '$price', 
                detail = '$detail', 
                product_type_id = '$product_type_id', 
                brand_id = '$brand_id' 
            WHERE product_id = '$product_id'";

    if (mysqli_query($connection, $sql)) {
        echo '<script>alert("แก้ไขข้อมูลสำเร็จ"); window.location.href="?page=' . $_GET['page'] . '";</script>';
        exit();
    } else {
        die("Error: " . mysqli_error($connection));
    }
}

$sql1 = "SELECT * FROM product_type";
$query1 = mysqli_query($connection, $sql1);

$sql2 = "SELECT * FROM brand";
$query2 = mysqli_query($connection, $sql2);
?>
<script type="text/javascript">

</script>
<div class="row justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">แก้ไขข้อมูลสินค้า</h1>
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
                            <img id="preview" src="upload/product/<?= $result['img'] ?>" class="rounded" width="250" height="250">
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="img" id="image">
                            <input type="hidden" name="existing_img" value="<?= $result['img'] ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-lg-3">
                            <label class="form-label">แบรนด์</label>
                            <select name="brand_id" class="form-control" style="height: unset !important;" required>
                                <option value="" disabled>แบรนด์</option>
                                <?php foreach ($query2 as $data): ?>
                                    <option value="<?=$data['brand_id']?>"<?= $result['brand_id'] == $data['brand_id'] ? 'selected' : '' ?>><?=$data['brand_name']?></option>                        
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3 col-lg-3">
                            <label class="form-label">ประเภทสินค้า</label>
                            <select name="product_type_id" class="form-control" style="height: unset !important;" required>
                                <option value="" disabled>ประเภทสินค้า</option>
                                <?php foreach ($query1 as $data): ?>
                                    <option value="<?=$data['type_id']?>"<?= $result['product_type_id'] == $data['type_id'] ? 'selected' : '' ?>><?=$data['type_name']?></option>                        
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 col-lg-6">
                        <label class="form-label">ชื่อสินค้า</label>
                        <textarea name="product_name" class="form-control" style="height: 100px;"><?= $result['product_name'] ?></textarea>
                    </div>

                    <div class="mb-3 col-lg-6">
                        <label class="form-label">รายละเอียดสินค้า</label>
                        <textarea name="detail" class="form-control" style="height: 100px;"><?= $result['detail'] ?></textarea>
                    </div>

                    <hr class="mb-3 mt-4">
                    <div class="mb-3 col-lg-6">
                        <label class="form-label">ราคา</label>
                        <input type="text" class="form-control" name="price"
                            placeholder="ราคา" value="<?= $result['price'] ?>" autocomplete="off" required>
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