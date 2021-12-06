<?php
include "db.php";
$sql = "SELECT * FROM `employees` INNER JOIN city ON employees.city_name = city.cid";
$result = mysqli_query($conn, $sql) or die("query Unseccsussful");
$output = mysqli_fetch_all($result, MYSQLI_ASSOC);
/*$newoutput = mysqli_fetch_assoc($result);*/

$myJSON = json_encode($output);
echo $myJSON;
?>