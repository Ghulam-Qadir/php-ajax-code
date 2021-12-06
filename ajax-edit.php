<?php
include "db.php";
$editId = $_GET["editId"];
//read code start here
$sql = "SELECT * FROM `employees` WHERE id = $editId";
$result = mysqli_query($conn, $sql) or die("query Unseccsussful");
$output = mysqli_fetch_assoc($result);
$jsonoutput = json_encode($output);
echo $jsonoutput;