<?php
// create database connectivity
require_once('db.php');
$deleteId = $_GET['deleteId'];
// Delete record from users table
$sql = "DELETE FROM employees WHERE id = {$deleteId}";
if (mysqli_query($conn, $sql)) {
echo 1;
exit;
}else{
echo 0;
exit;
}
?>