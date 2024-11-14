<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ฟอร์มกรอกข้อมูล</title>
<link href="css/bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="container-fluid"></div>
<?php include"connection.php";?>
<div class="row">
  <div class="col-lg-4"></div>
  <div class="col-lg-4">
    <form action="save_mem.php" method="post" target="_blank">
      <div class="header">ฟอร์มกรอกข้อมูล</div>
      <div class="form-group">
        <label>ชื่อ-สกุล</label>
        <input name="name"type="text" autofocus="autofocus" class="form-control" placeholder="กรุณากรอกชื่อ-นามสกุล">
        <small class="form-text-muted">กรุณากรอกเป็นข้อมูลภาษาไทย</small></div>
      <div class="form-group">
        <label>ที่อยู่</label>
        <textarea name="address" autofocus="autofocus" class="form-control" id="address" placeholder="กรุณากรอกที่อยู่"></textarea>
      </div>
      <center>
      <button type="submit" class="btn btn-primary">ส่งข้อมูล</button>
      <a href="fetchData.php" class="btn btn-secondary">ดูข้อมูล</a>
    </form>
  </div>
  <div class="col-lg-4"></div>
</div>
</body>
</html>