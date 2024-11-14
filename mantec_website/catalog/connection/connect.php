<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "mantec_shop";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $db_name);

// Check connection
if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "";
?>