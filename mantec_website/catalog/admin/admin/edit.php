<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM mantec_user WHERE id = '$id'";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($query);
}
// print_r($_POST);
if (isset($_POST) && !empty($_POST)) {
    // echo '<pre>';
    // print_r($_FILES);
    // echo '</pre>';
    // exit();
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $userlevel = $_POST['userlevel'];
    $oldimage = $_POST['oldimage'];

    if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
        $extension = array("jpeg", "jpg", "png", "gif");
        $target = 'upload/admin/';
        $filename = $_FILES['image']['name'];
        $filetmp = $_FILES['image']['tmp_name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (in_array($ext, $extension)) {
            if (!file_exists($target . $filename)) {
                if (move_uploaded_file($filetmp, $target . $filename)) {
                    $filename = $filename;
                } else {
                    $alert = '<script type="text/javascript">';
                    $alert .= 'alert("เพิ่มไฟล์เข้า folder ไม่สำเร็จ");';
                    $alert .= 'window.location.href = "?page='. $_GET['page'] .'&function=update&id='.$id.'";';
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
                    $alert .= 'window.location.href = "?page='. $_GET['page'] .'&function=update&id='.$id.'";';
                    $alert .= '</script>';
                    echo $alert;
                    exit();
                }
            }
        } else {
            $alert = '<script type="text/javascript">';
            $alert .= 'alert("ประเภทไฟล์ไม่ถูกต้อง");';
            $alert .= 'window.location.href = "?page='. $_GET['page'] .'&function=update&id='.$id.'";';
            $alert .= '</script>';
            echo $alert;
            exit();
        }
    } else {
        $filename = $oldimage;
    }



    // echo $filename;
    // exit();
    $sql = "UPDATE mantec_user SET 
        firstname = '$firstname', 
        lastname = '$lastname', 
        email = '$email', 
        ph_number = '$phone', 
        image = '$filename' ,
        userlevel = '$userlevel'
    WHERE id = '$id'";

    if (mysqli_query($connection, $sql)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("แก้ไขข้อมูลสำเร็จ");';
        $alert .= 'window.location.href = "?page='. $_GET['page'] .'";';
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
        <h1 class="app-page-title mb-0">แก้ไขข้อมูลผู้ดูแลระบบ</h1>
    </div>
    <div class="col-auto">
        <a href="?page=<?=$_GET['page']?>" class="btn app-btn-secondary">ย้อนกลับ</a>
    </div>
</div>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card app-card-settings shadow-sm p-4">

            <div class="app-card-body">

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">รูปภาพ</label>
                        <div class="mb-3">
                            <img id="preview" src="upload/admin/<?= $result['image'] ?>" class="rounded" width="150" height="150">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="image">เลือกรูปภาพ</label>
                            <input type="file" class="form-control" name="image" id="image">
                            <input type="hidden" value="<?= $result['image'] ?>" name="oldimage">
                        </div>
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label class="form-label">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control" name="user" placeholder="ชื่อผู้ใช้ : admin" value="<?= $result['username'] ?>" required disabled>
                    </div>
                    <hr class="mb-3 mt-4">
                    <div class="mb-3">
                        <label class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" name="firstname" placeholder="ชื่อ" value="<?= $result['firstname'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" name="lastname" placeholder="นามสกุล" value="<?= $result['lastname'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">อีเมล</label>
                        <input type="email" class="form-control" name="email" placeholder="อีเมล" value="<?= $result['email'] ?>" autocomplete="on" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">สถานะ</label>
                        <input type="text" class="form-control" name="userlevel" placeholder="สถานะ"
                            value="<?= (isset($result['userlevel']) && !empty($result['userlevel']) ? $result['userlevel'] : '') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">เบอร์ติดต่อ</label>
                        <input type="text" class="form-control" name="phone" placeholder="เบอร์ติดต่อ" value="<?= $result['ph_number'] ?>" required>
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