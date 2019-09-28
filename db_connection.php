<?php
require "resources/config.php";

class DataBaseManager {

	function __construct(){
		global $config;
		$this->dbname = $config["db"]["dbname"];
		$this->dbusername = $config["db"]["dbusername"];
		$this->dbpassword = $config["db"]["dbpassword"];
		$this->dbhost = $config["db"]["dbhost"];
	}

	function getConnection(){
		$connection = new mysqli($this->dbhost, $this->dbusername, $this->dbpassword, $this->dbname) or die ("Connection failed \n". $connection -> error);
		return $connection;
	}


	//function closeConnection($connection){
	//$connection -> close();
//}

}


class AccountsTable {


	function __construct($database_manager){
		$this->database_manager = $database_manager;
		$this->connection = $this->database_manager->getConnection();

	}



	function dbQuery($sql_query){
		$this->connection -> query($sql_query);
	}


	function dbSelect($sql_query){


	}


	function getId(){
		return uniqid();
	}


	function addUser($email, $password){
		$id = $this->getId();
		$hashed_password = password_hash($password, PASSWORD_BCRYPT);
	// TODO: Replace with msqli
		$sql_query = "INSERT INTO accounts (id, email, password) VALUES ('$id', '$email', '$hashed_password')";
		$this->dbQuery($sql_query);
	}

/*
	function checkIfEmailExists($email){
	// TODO: Replace with msqli
		$sql_query = "SELECT email FROM accounts WHERE email = '$email'";
		$sql_result = $this->connection -> query($sql_query);
		if ($sql_result->num_rows){
			return True;
		}
		return False;
	}

*/

	function checkIfPasswordMatches($email, $password){
		//$sql_query = "SELECT * FROM accounts WHERE email = '$email' AND password = '$password'";
		//$sql_result = $this->connection -> query($sql_query);

		// TODO: please mysqli with safe version BOBBY TABLES

		$sql_query2 = "SELECT * FROM ACCOUNTS";
		$sql_result2 = $this->connection -> query($sql_query2);
		$row =  $sql_result2 -> fetch_array();
		$hashed_password = $row["password"];
		if (password_verify($password, $hashed_password)) {
			return True;
		} else {
			return False;
		};


		//error_log(print_r($row["password"], True));
		
	}



}



$database_manager = new DataBaseManager();
$accounts_table = new AccountsTable($database_manager);







?>