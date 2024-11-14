<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ตรวจสอบการส่งข้อมูลเข้าฐานข้อมูล</title>
<link href="css/bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/style.css">
</head>

<body>
	
<?php 
	include('connection.php');
	
	$name = $_POST['name'];
	$address = $_POST['address'];
	
	$sql = "INSERT INTO tb_member (name, address) VALUES ('$name', '$address')";
	
	if ($conn->query($sql) === TRUE){
		echo "<script>alert('ส่งข้อมูลเรียบร้อยแล้ว');</script>";
	}else{
		echo "ข้อผิดพลาด: " . $sql."<br>".$conn->error;
	}
	
	$conn->close();
?>
	<?php include"formTest.php";?>
</body>
</html>