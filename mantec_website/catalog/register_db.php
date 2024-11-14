<?php
session_start();
include('server.php');

$errors = array();

if (isset($_POST['reg_user'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
    $Phone_number = mysqli_real_escape_string($conn, $_POST['Phone_number']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $userlevel = mysqli_real_escape_string($conn, $_POST['userlevel']);

    if (empty($username)) {
        array_push($errors, "จำเป็นต้องใส่ชื่อผู้ใช้");
        $_SESSION['error'] = "จำเป็นต้องใส่ชื่อผู้ใช้";
        header("location: register.php");
    }
    if (empty($email)) {
        array_push($errors, "จำเป็นต้องใส่ Email");
        $_SESSION['error'] = "จำเป็นต้องใส่ Email";
        header("location: register.php");
    }
    if (empty($password_1)) {
        array_push($errors, "จำเป็นต้องใส่ รหัสผ่าน");
        $_SESSION['error'] = "จำเป็นต้องใส่ รหัสผ่าน";
        header("location: register.php");
    }
    if (empty($password_2)) {
        array_push($errors, "จำเป็นต้องใส่ รหัสผ่าน");
        $_SESSION['error'] = "จำเป็นต้องใส่ รหัสผ่าน";
        header("location: register.php");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "รหัสผ่านไม่ตรงกัน");
        $_SESSION['error'] = "รหัสผ่านไม่ตรงกัน";
        header("location: register.php");
    }
    // if (empty($address)) {
    //     array_push($errors, "จำเป็นต้องใส่ที่อยู่ผู้ใช้");
    //     $_SESSION['error'] = "จำเป็นต้องใส่ที่อยู่ผู้ใช้";
    //     header("location: register.php");
    // }

    $user_check_query = "SELECT * FROM mantec_user WHERE username = '$username' OR email ='$email'";
    $query = mysqli_query($conn, $user_check_query);
    $result = mysqli_fetch_assoc($query);

    if ($result) {  //user exists
        if ($result['username'] === $username) {
            array_push($errors, "ชื่อผู้ใช้มีอยู่แล้ว");
            $_SESSION['error'] = "ชื่อผู้ใช้มีอยู่แล้ว";
            header("location: register.php");
        }
        if ($result['email'] === $email) {
            array_push($errors, "อีเมลผู้ใช้มีอยู่แล้ว");
            $_SESSION['error'] = "อีเมลผู้ใช้มีอยู่แล้ว";
            header("location: register.php");
        }
    }

    if (count($errors) == 0) {
        $password = md5($password_1);

        $sql = "INSERT INTO mantec_user (username, email, password, ph_number, address, userlevel) VALUES ('$username', '$email', '$password','$Phone_number','$address','m')";
        mysqli_query($conn, $sql);

        $_SESSION['username'] = $username;
        $_SESSION['success'] = "ตอนนี้คุณได้เข้าสู่ระบบแล้ว";
        header('location: login.php');
    }
}