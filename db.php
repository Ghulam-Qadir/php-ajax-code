<?php
/**
 * 
 */
class DataBase
{
	private $servername;
	private $username;
	private $dbname;
	private $password;
	private $charset;

	public function connection()
	{
		try {
			$this->servername = "localhost";
			$this->username = "root";
			$this->password = "";
			$this->dbname  = "php";
			$this->charset = "utf8mb4";
			
			$dns = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
			$conn = new PDO($dns, $this->username, $this->password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $conn;
		} catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	}
}


// Create connection
//$conn = mysqli_connect($servername, $username, $password, $db)or die("Connection failed");



?>