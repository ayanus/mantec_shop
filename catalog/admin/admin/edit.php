<?php
if (isset($_GET['user_id']) && !empty($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $sql = "SELECT * FROM user WHERE user_id = '$user_id'";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($query);
}
if (isset($_POST) && !empty($_POST)) {
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $role = $_POST['role'];

    $sql = "UPDATE user SET 
        username = '$username', 
        fullname = '$fullname', 
        email = '$email', 
        tel = '$tel', 
        role = '$role'
    WHERE user_id = '$user_id'";

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
                    <div class="mb-3 col-lg-6">
                        <label class="form-label">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control" name="username" placeholder="ชื่อผู้ใช้ : admin" value="<?= $result['username'] ?>" required>
                    </div>
                    <hr class="mb-3 mt-4">
                    <div class="mb-3">
                        <label class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" name="fullname" placeholder="ชื่อ" value="<?= $result['fullname'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">อีเมล</label>
                        <input type="email" class="form-control" name="email" placeholder="อีเมล" value="<?= $result['email'] ?>" autocomplete="on" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">สถานะ</label>
                        <input type="text" class="form-control" name="role" placeholder="สถานะ"
                            value="<?= (isset($result['role']) && !empty($result['role']) ? $result['role'] : '') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">เบอร์ติดต่อ</label>
                        <input type="text" class="form-control" name="tel" placeholder="เบอร์ติดต่อ" value="<?= $result['tel'] ?>" required>
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