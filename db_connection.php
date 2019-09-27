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
		echo "Connected Successfully";
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
	// TODO: Replace with msqli
	$sql_query = "INSERT INTO accounts (id, email, password) VALUES ('$id', '$email', '$password')";
	$this->dbQuery($sql_query);


}



}










function checkIfEmailExists($connection, $email){
	$sql_input = "SELECT email FROM accounts WHERE email = '$email'";
	if ($sql_result = $connection -> query($sql_input)) {
		return True;
	}
	return False;
	
}

function createSecurePassword($password){
	return password_hash($password, PASSWORD_DEFAULT);
}


function verifyPassword($password){

}






$database_manager = new DataBaseManager();
$accounts_table = new AccountsTable($database_manager);

//$accounts_table->addUser("heeeeeeej@sveej.dej", "jagarattlosenord");




//addUser($connection, "jossssss@hej.com", "hej");
//echo checkIfEmailExists($connection, "jos@fssundin.com");
//createSecurePassword("hejsan");

/*

if (password_verify("hallaaa", createSecurePassword("hejsan"))) {
	echo "YASSSS that's the right password";
} else {
	echo "Nahhhhh bro that didn't work";
};

*/

?>