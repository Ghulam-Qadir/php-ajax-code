<?php
include "db.php";
$alldatashow = new DataBase;
$sql = "SELECT * FROM `employees` INNER JOIN city ON employees.city_name = city.cid";
$result = $alldatashow->connection()->query($sql);
$result->execute();
$output = $result->fetchAll();
$myJSON = json_encode($output);
echo $myJSON;
?>