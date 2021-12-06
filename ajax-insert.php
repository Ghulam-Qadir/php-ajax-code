<?php
include "db.php";

   $Name     = $_POST["name1"];
   $Email    = $_POST["email1"];
   $Address  = $_POST["address1"];
   $Cityname = $_POST["citynames1"];
   $Phone    = $_POST["phone1"];

   $sql = "INSERT INTO `employees` (`id`, `name`, `email`, `address`, `phone`,`city_name`) VALUES (NULL, '{$Name}', '{$Email}', '{$Address}', '{$Phone}','{$Cityname}')";
   if (mysqli_query($conn, $sql)) {
    echo "1";
   }else{
   echo "0";
   }

?>