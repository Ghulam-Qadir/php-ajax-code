<?php 
include "db.php";

$updateId = $_POST["id"];
$name1 = $_POST["name"];
$email1 = $_POST["email"];
$address1 = $_POST["address"];
$phone1 = $_POST["phone"];
$city1 = $_POST["city"];

$sql = "UPDATE `employees` SET `name` = '$name1', `email` = '$email1', `address` = '$address1', `phone` = '$phone1', `city_name` = '$city1' WHERE `employees`.`id` = $updateId";
//$result = mysqli_query($conn, $sql) or die("query Unseccsussful");
if(mysqli_query($conn, $sql)){
  echo 1;
}else{
  echo 0;
}
?>