<?php
session_start();
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
        width: 450px;
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

            <h4 class="form-signin-heading text-center fw-bold">เข้าสู่ระบบ</h4>
        
            
            <!-- login -->
            <div class="input-group mb-3 mt-4">
                <span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg>
                </span>
                <div class="form-floating">
                    <input type="text" name="username" class="form-control" id="floatingInputGroup1" placeholder="Username">
                    <label for="floatingInputGroup1">Username</label>
                </div>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
                    </svg>
                </span>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingInputGroup1" placeholder="Username">
                    <label for="floatingInputGroup1">Password</label>
                </div>
            </div>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>

            <button class="btn btn-primary w-100 mb-3" type="submit" name="login_user">เข้าสู่ระบบ</button>
                
            <div class="d-flex align-items-center">
                <hr class="flex-grow-1">
                    <span class="mx-2 text-muted">หรือ</span>
                <hr class="flex-grow-1">
            </div>

            <div class="mb-3">
                <a href="login_facebook.php" class="btn btn-outline-dark w-100">
                <img src="image/facebook-icon.png" alt="facebook-icon" width="20" height="20">
                    เข้าสู่ระบบด้วย Facebook
                </a>
            </div>

            <div class="mt-3">
                <a href="login_facebook.php" class="btn btn-outline-dark w-100">
                <img src="image/google-icon.png" alt="google-icon" width="25" height="25">
                    เข้าสู่ระบบด้วย Google
                </a>
            </div>
            <p class="mt-3 text-body-secondary text-center">ยังไม่มีบัญชีใช่หรือไม่ ? <a href="register.php">ลงทะเบียน</a></p>
        </div>
    </form>
</body>

</html>