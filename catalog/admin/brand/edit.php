<?php
if (isset($_GET['brand_id']) && !empty($_GET['brand_id'])) {
    $brand_id = $_GET['brand_id']; // แปลงเป็นตัวเลขเพื่อความปลอดภัย
    $stmt = $connection->prepare("SELECT * FROM brand WHERE brand_id = ?");
    $stmt->bind_param("i", $brand_id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $brand_name = $_POST['brand_name'];
    $brand_img = $result['brand_img'];

        if (!empty($_FILES['img']['name'])) {
            $extension = ["jpeg", "jpg", "png", "gif"];
            $target = 'upload/brand/';
            $file_extension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
            $filename = uniqid() . '.' . $file_extension;

            if (in_array($file_extension, $extension)) {
                if (move_uploaded_file($_FILES['img']['tmp_name'], $target . $filename)) {
                } else {
                    echo "<script>alert('ไม่สามารถอัปโหลดไฟล์ได้');</script>";
                    exit();
                }
            } else {
                echo "<script>alert('ประเภทไฟล์ไม่ถูกต้อง');</script>";
                exit();
            }
        }

    if (!empty($brand_name)) {
        $stmt = $connection->prepare("SELECT * FROM brand WHERE brand_name = ? AND brand_id != ?");
        $stmt->bind_param("si", $brand_name, $brand_id);
        $stmt->execute();
        $row_check = $stmt->get_result()->num_rows;

        if ($row_check > 0) {
            echo "<script>alert('ชื่อประเภทสินค้าซ้ำ กรุณากรอกใหม่อีกครั้ง');</script>";
            exit();
        } else {
            $stmt = $connection->prepare("UPDATE brand SET brand_name = ?, brand_img = ? WHERE brand_id = ?");
            $stmt->bind_param("ssi", $brand_name, $filename, $brand_id);

            if ($stmt->execute()) {
                echo "<script>alert('แก้ไขข้อมูลประเภทสินค้าสำเร็จ'); window.location.href = '?page={$_GET['page']}';</script>";
            } else {
                echo "Error: " . $stmt->error;
            }
        }
    }
}
?>

<script type="text/javascript">

</script>
<div class="row justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">แก้ไขประเภทสินค้า</h1>
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
                    <div class="mb-3">
                        <label class="form-label">รูปแบรนด์</label>
                        <div class="mb-3">
                            <?php if(!empty($result['img'])): ?>
                                <img id="preview" src="upload/brand/<?= $result['img'] ?>" class="rounded" width="250" height="250">
                                <?php else: ?>
                                <img id="preview" src="https://static.vecteezy.com/system/resources/thumbnails/022/059/000/small_2x/no-image-available-icon-vector.jpg" class="rounded" width="250" height="250">
                            <?php endif; ?>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="img">เลือกรูปภาพ</label>
                            <input type="file" class="form-control" name="img" id="img">
                            
                        </div>
                    </div>
                    <div class="mb-3 col-lg-6">
                    <label class="form-label">ชื่อแบรนด์</label>
                        <input type="text" class="form-control" name="brand_name" placeholder="ชื่อแบรนด์"
                            value="<?= $result['brand_name'] ?>" autocomplete="off" required>                    
                    </div>
                    
                    <button type="submit" class="btn app-btn-primary">บันทึก</button>
                </form>
            </div><!--//app-card-body-->

        </div><!--//app-card-->
    </div>
</div><!--//row-->