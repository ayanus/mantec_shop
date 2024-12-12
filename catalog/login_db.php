<?php
session_start();
include('server.php');

$errors = array();

if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // ตรวจสอบว่ากรอกข้อมูลหรือไม่
    if (empty($username)) {
        array_push($errors);
        $_SESSION['error'] = "กรุณากรอก Username";
        header("location: login.php");
        exit();
    }

    if (empty($password)) {
        
        array_push($errors);
        $_SESSION['error'] = "กรุณากรอก Password";
        header("location: login.php");
        exit();
    }

    // ตรวจสอบการเข้าสู่ระบบถ้าไม่มีข้อผิดพลาด
    if (!empty($username) && !empty($password)) {
        $password = md5($password);
        $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // เก็บข้อมูลลงใน Session
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['login_attempts'] = 0;

            // ตรวจสอบระดับผู้ใช้
            if ($row['role'] == 'a') {
                header("Location: admin/index.php");
                // $_SESSION['admin'] = include('header/header_admin.php');
            } elseif ($row['role'] == 'c') {
                header("Location: index.php");
                // $_SESSION['user'] = include('header/header_user.php');
            }
            exit();
        } else {
            // ตรวจสอบว่ามีผู้ใช้ในฐานข้อมูลหรือไม่
            $check_user_query = "SELECT * FROM user WHERE username = '$username'";
            $check_user_result = mysqli_query($conn, $check_user_query);

            if (mysqli_num_rows($check_user_result) == 0) {
                $_SESSION['error'] = "ยังไม่มีบัญชีใช่หรือไม่? โปรดลงทะเบียนก่อนเข้าสู่ระบบ";
            } else {
                $_SESSION['error'] = "Username หรือ Password ไม่ถูกต้อง";
            }
            header("location: login.php");
            exit();
        }
    }
}
