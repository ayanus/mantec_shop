<?php
if (isset($_GET['type_id']) && !empty($_GET['type_id'])) {
    $type_id = $_GET['type_id'];
    $sql = "SELECT * FROM product_type WHERE type_id = '$type_id'";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($query);
}
if (isset($_POST) && !empty($_POST)) {
    $type_name = $_POST['type_name'];
    if (!empty($type_name)) {
        $sql_check = "SELECT * FROM product_type WHERE type_name = '$type_name' AND type_id != '$type_id'";
        $query_check = mysqli_query($connection, $sql_check);
        $row_check = mysqli_num_rows($query_check);
        if ($row_check > 0) {
            $alert = '<script type="text/javascript">';
            $alert .= 'alert("ชื่อประเภทสินค้าซ้ำ กรุณากรอกใหม่อีกครั้ง");';
            $alert .= 'window.location.href = "?page=' . $_GET['page'] . '&function=update&type_id=' . $type_id . '";';
            $alert .= '</script>';
            echo $alert;
            exit();
        } else {
            $sql = "UPDATE product_type SET 
            type_name = '$type_name'
            WHERE type_id = '$type_id'";

            if (mysqli_query($connection, $sql)) {
                $alert = '<script type="text/javascript">';
                $alert .= 'alert("แก้ไขข้อมูลประเภทสินค้าสำเร็จ");';
                $alert .= 'window.location.href = "?page=' . $_GET['page'] . '";';
                $alert .= '</script>';
                echo $alert;
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($connection);
            }

            mysqli_close($connection);
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

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">ชื่อประเภทสินค้า</label>
                        <input type="text" class="form-control" name="type_name"
                            value="<?= $result['type_name'] ?>" autocomplete="off" required>
                    </div>
                    <button type="submit" class="btn app-btn-primary">บันทึก</button>
                </form>
            </div><!--//app-card-body-->

        </div><!--//app-card-->
    </div>
</div><!--//row-->