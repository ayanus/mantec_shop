<?php
session_start();
include('server.php');

$errors = array();

if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // ตรวจสอบว่ากรอกข้อมูลหรือไม่
    if (empty($username)) {
        array_push($errors, "จำเป็นต้องใส่ชื่อผู้ใช้");
        $_SESSION['error'] = "จำเป็นต้องใส่ชื่อผู้ใช้";
        header("location: login.php");
        exit();
    }

    if (empty($password)) {
        array_push($errors, "จำเป็นต้องใส่รหัสผ่าน");
        $_SESSION['error'] = "จำเป็นต้องใส่รหัสผ่าน";
        header("location: login.php");
        exit();
    }

    // ตรวจสอบการเข้าสู่ระบบถ้าไม่มีข้อผิดพลาด
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM mantec_user WHERE username = '$username' AND password = '$password' ";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            // เก็บข้อมูลลงใน Session
            $_SESSION['username'] = $row['username'];
            $_SESSION['userlevel'] = $row['userlevel'];
            $_SESSION['success'] = "ล็อกอินเรียบร้อย";
            // $_SESSION['admin'] = include('header/header_admin.php');
            // $_SESSION['user'] = include('header/header_user.php');


            // ตรวจสอบระดับผู้ใช้
            if ($row['userlevel'] == 'a') {
                header("Location: admin/index.php");
                // $_SESSION['admin'] = include('header/header_admin.php');
            } elseif ($row['userlevel'] == 'm') {
                header("Location: customer/index.php");
                // $_SESSION['user'] = include('header/header_user.php');
            }
            exit();
        } else {
            // หากชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง
            array_push($errors, "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง");
            $_SESSION['error'] = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง ลองอีกครั้ง!";
            header("location: login.php");
            exit();
        }
    }
}
