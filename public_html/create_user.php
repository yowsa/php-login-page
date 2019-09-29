<?php 
require_once "../resources/base.php";
require_once "../resources/accounts_handler.php";

if ($_POST){
	$email = strtolower($_POST["email"]);
	$password = $_POST["password"];
	$confirm_password = $_POST["confirm_password"];
	$name = $_POST["name"];

	// TODO: Should ideally be in a transaction
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

	} else if ($password != $confirm_password) {
		json_responder(False, "Your passwords didn't match. Please try again");

	} else {
		$accounts_table->addUser($email, $password, $name);
		json_responder(True);
		$_SESSION['user_creation_success_message'] = 
		"Your account has been successfully created. Please log in.";
	}

	exit();
}


$page_title = 'Create New User';
require_once "../resources/templates/header.php" 
?>

<div class="wrapper create-user-wrapper"> 
	<form class="alert-message-reciever" id="create_user_form" method="post">
		<p><h1 class="text-center">Create New User</h1></p> 
		<p><input class="form-control" type="name" name="name" autocomplete="name" placeholder="Name"></p>
		<p><input class="form-control" type="email" name="email" autocomplete="email" placeholder="Email address"></p>
		<p><input class="form-control" type="password" name="password" autocomplete="new-password" 
			placeholder="Password"></p>
		<p><input class="form-control" type="password" name="confirm_password" autocomplete="new-password" 
			placeholder="Confirm Password"></p>
		<p><input type="submit" class="btn btn-primary btn-lg btn-block" id="create_user_button" 
			value="Create User"></p>
		<a href="login.php" id="go_to_login_page" class="btn btn-outline-primary btn-lg btn-block">Go to Log In</a>
	</form>
</div>

<?php require_once "../resources/templates/footer.php" ?>

