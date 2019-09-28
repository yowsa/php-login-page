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
		return $this->connection -> query($sql_query);
	}

	function getId(){
		return uniqid();
	}

	function addUser($email, $password){
		$id = $this->getId();
		$hashed_password = password_hash($password, PASSWORD_BCRYPT);
		$statement = $this->connection->prepare("INSERT INTO accounts (id, email, password) VALUES (?, ?, ?)");
		$statement->bind_param("sss", $id, $email, $hashed_password);
		$statement->execute();
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

	function validateEmail($email){
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}

//validateEmail("josefin.com");
//validateEmail("josefin@fundin.com");

	function checkIfPasswordMatches($email, $password){
		$statement = $this->connection->prepare("SELECT password FROM ACCOUNTS WHERE email = ?");
		$statement->bind_param("s", $email);
		$statement->execute();
		$db_select_result = $statement->get_result();
		$password_details =  $db_select_result -> fetch_array();
		if ($password_details === NULL){
			return False;
		}
		$hashed_password = $password_details["password"];
		return password_verify($password, $hashed_password);

	}

}




$database_manager = new DataBaseManager();
$accounts_table = new AccountsTable($database_manager);



?>