<?php
// print_r($_POST);
if (isset($_POST) && !empty($_POST)) {
    // echo '<pre>';
    // print_r($_FILES);
    // echo '</pre>';
    // exit();
    $type_name = $_POST['type_name'];

    if (!empty($type_name)) {
        $sql_check = "SELECT * FROM product_type WHERE type_name = '$type_name'";
        $query_check = mysqli_query($connection, $sql_check);
        $row_check = mysqli_num_rows($query_check);
        if ($row_check > 0) {
            $alert = '<script type="text/javascript">';
            $alert .= 'alert("ชื่อประเภทสินค้าซ้ำ กรุณากรอกใหม่อีกครั้ง");';
            $alert .= 'window.location.href = "?page='.$_GET['page'].'&function=add";';
            $alert .= '</script>';
            echo $alert;
            exit();
        } else {

        }
    }

    $sql = "INSERT INTO product_type (type_name) VALUES ('$type_name')";

    if (mysqli_query($connection, $sql)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("เพิ่มข้อมูลประเภทสินค้าสำเร็จ");';
        $alert .= 'window.location.href = "?page='.$_GET['page'].'";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }

    mysqli_close($connection);
}
?>
<script type="text/javascript">

</script>
<div class="row justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">เพิ่มข้อมูลผู้ดูแลระบบ</h1>
    </div>
    <div class="col-auto">
        <a href="?page=producttype" class="btn app-btn-secondary">ย้อนกลับ</a>
    </div>
</div>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card app-card-settings shadow-sm p-4">

            <div class="app-card-body">

                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">ชื่อประเภทสินค้า</label>
                        <input type="text" class="form-control" name="type_name" placeholder="ชื่อประเภทสินค้า"
                            value="" autocomplete="off" required>
                    </div>
                    <button type="submit" class="btn app-btn-primary">บันทึก</button>
                </form>
            </div><!--//app-card-body-->

        </div><!--//app-card-->
    </div>
</div><!--//row-->