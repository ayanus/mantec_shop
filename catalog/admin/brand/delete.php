<?php
if (isset($_GET['brand_id']) && !empty($_GET['brand_id'])) {
    $brand_id = $_GET['brand_id'];
    $sql = "DELETE FROM brand WHERE brand_id = '$brand_id'";

    if (mysqli_query($connection, $sql)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("ลบข้อมูลสำเร็จ");';
        $alert .= 'window.location.href = "?page='.$_GET['page'].'";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }

    mysqli_close($connection);
}
