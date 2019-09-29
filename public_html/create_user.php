<?php 
require_once "../resources/base.php";
require_once "../resources/accounts_handler.php";

if ($_POST){
	global $config;
	$email = strtolower($_POST["email"]);
	$password = $_POST["password"];
	$confim_password = $_POST["confirm_password"];
	$name = $_POST["name"];
	if (!$accounts_utilities->checkForEmptyField($_POST)){
		json_responder(False, "Please fill out all required fields");

	} else if ($accounts_table->checkIfEmailExists($email)){
		json_responder(False, "This email is already associated with an existing account.");

	} else if (!$accounts_utilities->validateEmail($email)){
		json_responder(False, "Please enter a valid email address.");

	} else if (!$accounts_utilities->validatePasswordLength($password)){
		json_responder(
			False, 
			"Your password needs to be at least ${config["password_length_req"]} characters long");

	} else if ($password != $confim_password) {
		json_responder(False, "Your passwords didn't match. Please try again");

	} else {
		$accounts_table->addUser($email, $password, $name);
		json_responder(True);
		$_SESSION['user_creation_success_message'] = "Your account has been successfully created. Please log in.";
	}
	

	// TODO: Should ideally be in a transaction

	exit();
}


$page_title = 'Create New User';
require_once "../resources/templates/header.php" 
?>




<div> 
	<form id="create_user_form" method="post"> 
		<p><label for="name" class="col-sm-2 col-form-label col-form-label-lg">Name:</label><input class="form-control form-control-lg" type="name" name="name" autocomplete="name"></p>
		<p><label for="email" class="col-sm-2 col-form-label col-form-label-lg">Email:</label> <input class="form-control form-control-lg" type="email" name="email" autocomplete="email"></p>
		<p><label for="password" class="col-sm-2 col-form-label col-form-label-lg">Password:</label><input class="form-control form-control-lg" type="password" name="password" autocomplete="new-password"></p>
		<p><label for="confirm_password" class="col-sm-2 col-form-label col-form-label-lg">Confirm Password:</label><input class="form-control form-control-lg" type="password" name="confirm_password" autocomplete="new-password"></p>
		<p><input type="submit" class="btn btn-primary btn-lg btn-block" id="create_user_button" value="Create User"></p>
	</form>
</div>
<a href="login.php">Go to Login</a>


<?php require_once "../resources/templates/footer.php" ?>

