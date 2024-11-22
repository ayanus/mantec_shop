<?php
session_start();
include('server.php');

$errors = array();

if (isset($_POST['reg_user'])) {
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
    $ph_number = mysqli_real_escape_string($conn, $_POST['ph_number']);

    if (empty($firstname)) {
        array_push($errors, "กรุณากรอกชื่อ");
        $_SESSION['error'] = "กรุณากรอกชื่อ";
        header("location: register.php");
    } else if (empty($lastname)) {
        array_push($errors, "กรุณากรอกนามสกุล");
        $_SESSION['error'] = "กรุณากรอกนามสกุล";
        header("location: register.php");
    } else if (empty($email)) {
        array_push($errors, "กรุณากรอก Email");
        $_SESSION['error'] = "กรุณากรอก Email";
        header("location: register.php");
    } else if (empty($ph_number)) {
        array_push($errors, "กรุณากรอกเบอร์โทร");
        $_SESSION['error'] = "กรุณากรอกเบอร์โทร";
        header("location: register.php");
    } else if (empty($username)) {
        array_push($errors, "กรุณากรอกชื่อผู้ใช้");
        $_SESSION['error'] = "กรุณากรอกชื่อผู้ใช้";
        header("location: register.php");
    } else if (empty($password_1)) {
        array_push($errors, "กรุณากรอกรหัสผ่าน");
        $_SESSION['error'] = "กรุณากรอกรหัสผ่าน";
        header("location: register.php");
    } else if (empty($password_2)) {
        array_push($errors, "กรุณายืนยันรหัสผ่าน");
        $_SESSION['error'] = "กรุณายืนยันรหัสผ่าน";
        header("location: register.php");
    } else if ($password_1 != $password_2) {
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

        $sql = "INSERT INTO mantec_user (firstname, lastname, username, email, password, ph_number, userlevel, address, image) VALUES ('firstname', 'lastname', '$username', '$email', '$password','$ph_number', 'm' , ' ', ' ')";
        mysqli_query($conn, $sql);

        $_SESSION['username'] = $username;
        $_SESSION['success'] = "ลงทะเบียนสำเร็จ";
        header('location: login.php');
    }
}

