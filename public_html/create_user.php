<?php 
require_once "../base.php";
require_once "../db_connection.php";

if ($_POST){
	$email = strtolower($_POST["email"]);
	$password = $_POST["password"];
	$confim_password = $_POST["confirm_password"];
	if (!$accounts_table->validateEmail($email)){
		json_responder(False, "Please enter a valid email address.");
		exit();
	}
	if ($password == $confim_password) {
		$accounts_table->addUser($email, $password);
		json_responder(True, "User created. You are being redirected to the login page.");
	} else {
		json_responder(False, "Your passwords didn't match. Please try again");
	}

exit();
}


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
<a href="login.php">Login</a>





