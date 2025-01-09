<?php
if (isset($_GET['service_id']) && !empty($_GET['service_id'])) {
    $service_id = $_GET['service_id'];
    $sql = "DELETE FROM service WHERE service_id = '$service_id'";

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
