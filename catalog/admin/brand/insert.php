<?php
if (isset($_POST) && !empty($_POST)) {
    $brand_name = $_POST['brand_name'];

    if (isset($_FILES['brand_img']['name']) && !empty($_FILES['brand_img']['name'])) {
        $extension = array("jpeg", "jpg", "png", "gif");
        $target = 'upload/brand/';
        $filename = $_FILES['brand_img']['name'];
        $filetmp = $_FILES['brand_img']['tmp_name'];
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

    if (!empty($brand_name)) {
        $sql_check = "SELECT * FROM brand WHERE brand_name = '$brand_name'";
        $query_check = mysqli_query($connection, $sql_check);
        $row_check = mysqli_num_rows($query_check);
        if ($row_check > 0) {
            $alert = '<script type="text/javascript">';
            $alert .= 'alert("ชื่อแบรนด์ซ้ำ กรุณากรอกใหม่อีกครั้ง");';
            $alert .= 'window.location.href = "?page='.$_GET['page'].'&function=add";';
            $alert .= '</script>';
            echo $alert;
            exit();
        } else {
            $brand_img = $filename;
        }
    }

    $sql = "INSERT INTO brand (brand_name, brand_img) VALUES ('$brand_name', '$brand_img')";

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
        <h1 class="app-page-title mb-0">เพิ่มข้อมูลแบรนด์</h1>
    </div>
    <div class="col-auto">
        <a href="?page=brand" class="btn app-btn-secondary">ย้อนกลับ</a>
    </div>
</div>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card app-card-settings shadow-sm p-4">

            <div class="app-card-body">

                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3 col-lg-6">
                        <label class="form-label">Logo</label>
                        <div class="mb-3">
                            <img id="preview" class="rounded" width="250" height="250">
                        </div>
                        <div class="input-group mb-3 ">
                            <input type="file" class="form-control" name="brand_img" id="image">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">ชื่อแบรนด์</label>
                        <input type="text" class="form-control" name="brand_name" placeholder="ชื่อแบรนด์"
                            value="" autocomplete="off" required>
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