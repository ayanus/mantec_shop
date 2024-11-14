<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>เชื่อมฐานข้อมูล</title>
</head>
<body>
	<?php
	$host = "localhost";
	$user = "root";
	$passwd = "";
	$db = "db_data";
	
	$conn = new MySQLi($host,$user,$passwd,$db);
	if ($conn->connect_error){
		die("การเชื่อมต่อฐานข้อมูลล้มเหลว: ".$conn->connect_error);
	}
	
	$conn->set_charset("utf8");
	
	$sql = "SELECT * FROM tb_member";
	$result = $conn->query($sql);
?>
</body>
</html>