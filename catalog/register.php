<!-- แสดงผล sesstion จาก php -->
<?php
session_start();
include('server.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comtech IT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=K2D:wght@100;200;300;400&family=Sarabun:wght@100;200;300;400&display=swap');
    * {
        font-family: 'Sarabun' , 'K2D';
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body {
        background-color: #A9DCF4;
        height: auto;
        display: flex;
        /* align-items: center; */
        justify-content: center;
        /* min-height: 100vh; */
        overflow: auto;
        margin-top: 30px;
        margin-bottom: 30px;
    }

    .wrapper {
        width: 500px;
        padding: 30px;
        margin: auto;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
</style>

<body> 
    <form class="form-signin" action="login_db.php" method="post">
        <?php if(!empty($_SESSION['error'])): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['error']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
    
        <div class="wrapper">
            <div class="d-flex justify-content-center align-items-center">
                <img class="mb-3 position-relative" src="image/new-logo.png" alt="Logo" width="90" height="90">
            </div>

            <h4 class="form-signin-heading text-center fw-bold">ลงทะเบียนสมาชิกใหม่</h4>
        
            
            <!-- login -->
                <div class="form-floating mb-3 mt-3">
                    <input type="text" name="firstname" class="form-control" id="floatingInputGroup1" placeholder="ชื่อ">
                    <label for="floatingInputGroup1">ชื่อ</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="lastname" class="form-control" id="floatingInputGroup1" placeholder="นามสกุล">
                    <label for="floatingInputGroup1">นามสกุล</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingInputGroup1" placeholder="email">
                    <label for="floatingInputGroup1">Email</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="tel" name="ph_number" class="form-control" id="floatingInputGroup1" placeholder="เบอร์โทร">
                    <label for="floatingInputGroup1">เบอร์โทร</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control" id="floatingInputGroup1" placeholder="username">
                    <label for="floatingInputGroup1">Username</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="floatingInputGroup1" placeholder="password">
                    <label for="floatingInputGroup1">Password</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="floatingInputGroup1" placeholder="password">
                    <label for="floatingInputGroup1">Confirm Password</label>
                </div>

            <button class="btn btn-primary w-100 mb-3" type="submit" name="reg_user">ลงทะเบียน</button>
            
            <p class="mt-3 text-body-secondary text-center">มีบัญชีอยู่แล้วใช่หรือไม่ ? <a href="login.php">เข้าสู่ระบบ</a></p>
        </div>
    </form>
</body>

</html>