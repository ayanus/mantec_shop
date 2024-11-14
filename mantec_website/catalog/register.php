<!-- แสดงผล sesstion จาก php -->
<?php
session_start();
include('server.php');
?>

<!-- โค้ด -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
</head>

<body>
    <div class="container">
        <div class="top-section">
            <h1>Register</h1>
        </div>

        <div class="white-box">
            <div class="login-ui">
                <form action="register_db.php" method="post">
                    <?php include('errors.php'); ?>
                    <!-- noficaition -->
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
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password_1">Password</label>
                        <input type="password" name="password_1">
                    </div>
                    <div class="form-group">
                        <label for="password_2">Confirm Password</label>
                        <input type="password" name="password_2">
                    </div>
                    <div class="form-group">
                        <label for="phdon_number">Phone number</label>
                        <input type="text" name="Phone_number">
                    </div> 
                    <div class="form-group">
                        <label for="address">ที่อยู่</label>
                        <input type="text" name="address">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="reg_user" class="btn">Register</button>
                    </div>
                    <p>Alerady a member?<a href="login.php"> Sign in</a></p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>