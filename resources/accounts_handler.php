<?php
require_once "db_connection.php";
require_once "config.php";

class AccountsTable {

	function __construct($database_manager){
		$this->database_manager = $database_manager;
		$this->connection = $this->database_manager->getConnection();
	}

	function dbQuery($sql_query){
		return $this->connection -> query($sql_query);
	}

	function addUser($email, $password, $name){
		$id = uniqid();
		$hashed_password = password_hash($password, PASSWORD_BCRYPT);
		$name = htmlspecialchars($name);
		$statement = $this->connection->prepare(
			"INSERT INTO accounts (id, email, password, name) VALUES (?, ?, ?, ?)");
		$statement->bind_param("ssss", $id, $email, $hashed_password, $name);
		$statement->execute();
	}

	function checkIfEmailExists($email){
		$statement = $this->connection->prepare("SELECT email FROM accounts WHERE email = ?");
		$statement->bind_param("s", $email);
		$statement->execute();
		$db_select_result = $statement->get_result();
		$email_details =  $db_select_result -> fetch_array();
		if ($email_details === NULL){
			return False;
		}
		return $email_details["email"] == $email;
	}

	function checkIfPasswordMatches($email, $password){
		$statement = $this->connection->prepare("SELECT password FROM ACCOUNTS WHERE email = ?");
		$statement->bind_param("s", $email);
		$statement->execute();
		$db_select_result = $statement->get_result();
		$password_details = $db_select_result -> fetch_array();
		if ($password_details === NULL){
			return False;
		}
		$hashed_password = $password_details["password"];
		return password_verify($password, $hashed_password);
	}

	function getName($email){
		$statement = $this->connection->prepare("SELECT name FROM accounts WHERE email = ?");
		$statement->bind_param("s", $email);
		$statement->execute();
		$db_select_result = $statement->get_result();
		$account_details =  $db_select_result -> fetch_array();
		if ($account_details === NULL){
			return "";
		}
		return $account_details["name"];
	}
}

class AccountUtilities {

	function __construct($config){
		$this->config = $config;
	}

	function validateEmail($email){
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}

	function validatePasswordLength($password){
		return strlen($password) >= $this->config["password_length_req"];
	}

	function checkForEmptyField($form_data){
		$required_fields = $this->config["account_fields_req"];
		foreach($required_fields as $answer){
			if (empty($form_data[$answer])){
				return False;
			}
		}
		return True;
	}
}

$accounts_table = new AccountsTable($database_manager);
$accounts_utilities = new AccountUtilities($config);

?>