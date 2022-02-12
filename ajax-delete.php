<?php
// create database connectivity
require_once('db.php');
$deletdatafromtable = new DataBase;
$deleteId = $_GET['deleteId'];
// Delete record from users table
$sql = "DELETE FROM `employees` WHERE id = ?";
$statement = $deletdatafromtable->connection()->prepare($sql);
$result = $statement->execute(array($deleteId));
if ($result) {
	echo 1;
	exit;
}else{
	echo 0;
	exit;
}
?>