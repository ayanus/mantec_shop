<!doctype html>
<html>
<link href="css/bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ดึงข้อมูลจากฐานข้อมูลมาแสดง</title>
<link rel="stylesheet" href="css/bootstrap-4.3.1.css" type="text/css">
<link rel="stylesheet" href="css/style2.css">
</head>

<body>
<div class="container">
<h1>ข้อมูลส่วนตัว</h1>
	<table>
		<thead>
			<tr>
				<td width="50%">ชื่อ-สกุล</td>
				<td width="50%">ที่อยู่</td>
			</tr>
		</thead>
		<tbody>
			<?php include "connection.php";?>
			<?php while($row=$result->fetch_assoc()):?>
    	<tr>
    	  <td class="name">
			  <?php echo $row['name'];?>
		  </td>
    	  <td class='address'>
			<?php echo $row['address'];?>
		  </td>
    	</tr>
			<?php endwhile;?>
  		</tbody>
	</table>
	</div>
</body>
</html>