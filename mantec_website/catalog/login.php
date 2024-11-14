<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="massage.css" defer>
    <!-- javascript -->
    <script src="massage.js"></script>
</head>

<body>
    <div class="container">
        <div class="top-section">
            <h1>LOGIN</h1>
        </div>

        <div class="white-box">
            <div class="login-ui">
                <form action="login_db.php" method="post">
                    <?php include('errors.php'); ?>
                    <!-- notification message -->
                    <?php if (isset($_SESSION['error'])) : ?>
                        <div class="error">
                            <h3>
                                <?php
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                                ?>
                            </h3>
                        </div>
                    <?php endif ?>

                    <!-- login -->
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="login_user">Login</button>
                    </div>
                    <p>ยังไม่มีสมาชิก? <a href="register.php">Sign up</a></p>
                </form>
                <div class="forget">ลืมรหัสผ่าน ?</div>
            </div>
        </div>
        <footer id="footer">
            Login UI - Phichayut
        </footer>
    </div>
</body>

</html>