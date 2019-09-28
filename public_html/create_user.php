<?php 
require_once "../base.php";
require_once "../db_connection.php";

// TODO: check so that the passwords provided are the same
if ($_POST){
	if ($_POST["password"] == $_POST["confirm_password"]) {
		//$secure_password = $password_security->createSecurePassword($_POST["password"]);
		$accounts_table->addUser($_POST["email"], $_POST["password"]);
		//TODO: Create json response function that creates an array and takes a message
		json_responder(True, "User created. You are being redirected to the login page.");

		//$user_creation_sussessful = [
		//	"success" => True
		//];
		//header('Content-Type: application/json');
		//echo json_encode($user_creation_sussessful);
		
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





