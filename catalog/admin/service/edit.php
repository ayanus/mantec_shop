<?php
if (isset($_GET['service_id']) && !empty($_GET['service_id'])) {
    $service_id = $_GET['service_id'];
    $stmt = $connection->prepare("SELECT * FROM service WHERE service_id = ?");
    $stmt->bind_param("i", $service_id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
    $service_name = $_POST['service_name'];
    $detail = $_POST['detail']; 
    $img = $result['img'];

    // ตรวจสอบการอัปโหลดไฟล์
    if (isset($_FILES['img']['name']) && !empty($_FILES['img']['name'])) {
        $extension = array("jpeg", "jpg", "png", "gif");
        $target = 'upload/service/';
        $filename = $_FILES['img']['name'];
        $filetmp = $_FILES['img']['tmp_name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if (in_array($ext, $extension)) {
            // ตรวจสอบชื่อไฟล์ว่าใช้งานได้หรือไม่
            if (!file_exists($target . $filename)) {
                move_uploaded_file($filetmp, $target . $filename);
            } else {
                $filename = time() . $filename;
                move_uploaded_file($filetmp, $target . $filename);
            }
        } else {
            echo "<script>alert('ประเภทไฟล์ไม่ถูกต้อง');</script>";
            exit();
        }
    } else {
        $filename = $result['img']; // ใช้รูปเดิมหากไม่ได้อัปโหลดใหม่
    }

    // ตรวจสอบชื่อบริการซ้ำ
    if (!empty($service_name)) {
        $stmt = $connection->prepare("SELECT * FROM service WHERE service_name = ? AND service_id != ?");
        $stmt->bind_param("si", $service_name, $service_id);
        $stmt->execute();
        $row_check = $stmt->get_result()->num_rows;

        if ($row_check > 0) {
            echo "<script>alert('ชื่อประเภทสินค้าซ้ำ กรุณากรอกใหม่อีกครั้ง');</script>";
            exit();
        } else {
            $stmt = $connection->prepare("UPDATE service SET service_name = ?, img = ?, detail = ? WHERE service_id = ?");
            $stmt->bind_param("sssi", $service_name, $filename, $detail, $service_id);

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
                        <label class="form-label">รูปการบริการ</label>
                        <div class="mb-3">
                            <?php if(!empty($result['img'])): ?>
                                <img id="preview" src="upload/service/<?= $result['img'] ?>" class="rounded" width="250" height="250">
                            <?php else: ?>
                                <img id="preview" src="https://static.vecteezy.com/system/resources/thumbnails/022/059/000/small_2x/no-image-available-icon-vector.jpg" class="rounded" width="250" height="250">
                            <?php endif; ?>
                        </div>
                        <div class="input-group mb-3">
                            <input type="hidden" name="existing_img" value="<?= $result['img'] ?>">
                            <input type="file" class="form-control" name="img" id="img">
                        </div>
                    </div>
                    <div class="mb-3 col-lg-6">
                    <label class="form-label">ชื่อการบริการ</label>
                        <input type="text" class="form-control" name="service_name" placeholder="ชื่อการบริการ"
                            value="<?= $result['service_name'] ?>" autocomplete="off" required>                    
                    </div>
                    <div class="mb-3 col-lg-6">
                    <label class="form-label">รายละเอียดงาน</label>
                        <textarea class="form-control" name="detail" style="height: 100px;"><?= $result['detail'] ?></textarea>                
                    </div>
                    
                    <button type="submit" class="btn app-btn-primary">บันทึก</button>
                </form>
            </div><!--//app-card-body-->

        </div><!--//app-card-->
    </div>
</div><!--//row-->