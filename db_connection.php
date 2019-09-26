<?php
require "resources/config.php";

echo $config["db"]["dbname"];

class DataBaseManager {

	function __construct(){

	}








}


class CreateUser {



}


class Login {


}





function getId(){
	return uniqid();
}


function getConnection(){

	$dbname = "logindb";
	$dbuser = "root";
	$dbpassword = "";
	$dbhost = "localhost";

	$connection = new mysqli($dbhost, $dbuser, $dbpassword, $dbname) or die ("Connection failed \n". $connection -> error);

	echo "Connected Successfully";
	return $connection;
}


function closeConnection($connection){
	$connection -> close();

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



function addUser($connection, $email, $password){
	$id = getId();
	echo $id;
	// TODO: Replace with msqli
	$sql_input = "INSERT INTO accounts (id, email, password) VALUES ('$id', '$email', '$password')";
	$connection -> query($sql_input);

}

$connection = getConnection();

addUser($connection, "jossssss@hej.com", "hej");
echo checkIfEmailExists($connection, "jos@fssundin.com");
createSecurePassword("hejsan");



if (password_verify("hallaaa", createSecurePassword("hejsan"))) {
	echo "YASSSS that's the right password";
} else {
	echo "Nahhhhh bro that didn't work";
};



?>