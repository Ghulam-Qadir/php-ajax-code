<?php
include "db.php";
$alldatainsert = new DataBase();
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$Name     = $_POST['name'];
	$Email    = $_POST['email'];
	$Address  = $_POST['address'];
	$Cityname = $_POST['citynames'];
	$Phone    = $_POST['phone'];
  $Image    = $_FILES['image'];
  $fileName = $Image['name'];
  $fileSize = $Image['size'];
  $fileTemp = $Image['tmp_name'];
  move_uploaded_file($fileTemp, "upload/". $fileName);
}
 $sql = "INSERT INTO `employees` (`id`, `name`, `email`, `address`, `phone`,`city_name`,`image`) 
 		 VALUES (NULL, :name, :email, :address,:phone, :citynames, :image)";
 $statement = $alldatainsert->connection()->prepare($sql);
 $exec = $statement->execute(
   	array(
   	":name"=> $Name,
   	":email"=> $Email,
   	":address"=> $Address,
   	":phone"=> $Phone,
   	":citynames"=> $Cityname,
    ":image"=> $fileName
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