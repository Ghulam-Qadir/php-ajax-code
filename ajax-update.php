<?php 
include "db.php";
$formdataupde = new DataBase;
$updateId = $_POST["id"];
$name1 = $_POST["name"];
$email1 = $_POST["email"];
$address1 = $_POST["address"];
$phone1 = $_POST["phone"];
$city1 = $_POST["city"];

$sql = "UPDATE `employees` SET `name` = '$name1', `email` = '$email1', `address` = '$address1', `phone` = '$phone1', `city_name` = '$city1' WHERE `employees`.`id` = $updateId";
$statement = $formdataupde->connection()->prepare($sql);
$result = $statement->execute(array($updateId));
if ($result) {
	echo 1;
	exit;
}else{
	echo 0;
	exit;
}
?>