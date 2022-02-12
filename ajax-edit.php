<?php
include "db.php";
$editformdata = new DataBase;
$editId = $_GET["editId"];
$result = $alldatashow->connection()->query($sql);
$result->execute();
$output = $result->fetch(PDO::FETCH_ASSOC);
$myJSON = json_encode($output);
echo $myJSON;







//read code start here
/*$sql = "SELECT * FROM `employees` WHERE id = $editId";
$result = mysqli_query($conn, $sql) or die("query Unseccsussful");
$output = mysqli_fetch_assoc($result);
$jsonoutput = json_encode($output);
echo $jsonoutput;*/