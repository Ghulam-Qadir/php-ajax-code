<?php 
include "db.php";
$formdataupde = new DataBase;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$updateId     	= $_POST['updateidu'];
	$Name     		= $_POST['update_name'];
	$Email    		= $_POST['update_email'];
	$Address  		= $_POST['update_address'];
	$Cityname 		= $_POST['citynamesupdateselect'];
	$Phone    		= $_POST['update_phone'];
}

$sql = "UPDATE `employees` 
				SET `name` = :name, 
					`email` = :email, 
					`address` = :address, 
					`phone` = :phone, 
					`city_name` = :city_name 
			  WHERE `employees`.`id` = :employeesid";

 $statement = $formdataupde->connection()->prepare($sql);
 $statement->bindValue(':employeesid', $updateId, PDO::PARAM_STR);
 $statement->bindValue(':name', $Name, PDO::PARAM_STR);
 $statement->bindValue(':email', $Email, PDO::PARAM_STR);
 $statement->bindValue(':address', $Address, PDO::PARAM_STR);
 $statement->bindValue(':phone', $Phone, PDO::PARAM_STR);
 $statement->bindValue(':city_name', $Cityname, PDO::PARAM_STR);
/* $exec = $statement->execute(
   	array(
   			":employeesid" =>$updateId,
			":name" => $Name,
			":email" => $Email,
			":address" => $Address,
			":phone" => $Phone,
			":city_name" => $Cityname
   	));*/
  $exec = $statement->execute();
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