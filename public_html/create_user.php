<?php 
require_once "../resources/base.php";
require_once "../resources/accounts_handler.php";

if ($_POST){
	global $config;
	$email = strtolower($_POST["email"]);
	$password = $_POST["password"];
	$confim_password = $_POST["confirm_password"];
	if ($accounts_table->checkIfEmailExists($email)){
		json_responder(False, "This email is already associated with an existing account.");

	} else if (!$accounts_utilities->validateEmail($email)){
		json_responder(False, "Please enter a valid email address.");

	} else if (!$accounts_utilities->validatePasswordLength($password)){
		json_responder(False, "Your password needs to be at least ${config["password_length_req"]} characters long");

	} else if ($password != $confim_password) {
		json_responder(False, "Your passwords didn't match. Please try again");

	} else {
		$accounts_table->addUser($email, $password);
		json_responder(True, "User created. You are being redirected to the login page.");
	}

	// TODO: Should ideally be in a transaction

	exit();
}


$page_title = 'Create New User';
require_once "../resources/templates/header.php" 
?>




<div> 
	<form id="create_user_form" method="post"> 
		Email: <input type="name" name="email"><p>
			Password: <input type="password" name="password"><p>
				Confirm Password: <input type="password" name="confirm_password"><p>
					<input type="submit" id="create_user_button" value="Create User">
				</form>
			</div>
			<div id="create_user_message"></div>
			<a href="login.php">Go to Login</a>





