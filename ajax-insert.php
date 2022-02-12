<?php
include "db.php";
$alldatainsert = new DataBase();
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$Name     = $_POST['name'];
	$Email    = $_POST['email'];
	$Address  = $_POST['address'];
	$Cityname = $_POST['citynames'];
	$Phone    = $_POST['phone'];
}
 $sql = "INSERT INTO `employees` (`id`, `name`, `email`, `address`, `phone`,`city_name`) 
 		 VALUES (NULL, :name, :email, :address,:phone, :citynames)";
 $statement = $alldatainsert->connection()->prepare($sql);;
 $exec = $statement->execute(
   	array(
   	":name"=>$Name ,
   	":email"=>$Email,
   	":address"=>$Address,
   	":phone"=>$Phone,
   	":citynames"=>$Cityname
   ));

   if($exec){
    $output = [
    	"status"=>"200",
    	"massage"=>"Data Insertted",
    ];
	$myJSON = json_encode($output);
	echo $myJSON;
  }else{
    $output = [
    	"status"=>"400",
    	"massage"=>"ERROR!",
    ];
	$myJSON = json_encode($output);
	echo $myJSON;
  }

   ?>