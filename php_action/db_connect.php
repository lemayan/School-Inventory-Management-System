<?php 	

$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "store";
$store_url = "http://localhost/Full-Stack-School-Inventory-Management-System/";
$currency = "KSh"; // Kenyan Shillings currency symbol
// db connection
$connect = new mysqli($localhost, $username, $password, $dbname);
// check connection
if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  // echo "Successfully connected";
}

?>