<?php
require_once "../resources/accounts_handler.php";
require_once "../resources/base.php";

if ($_POST){
	$email = strtolower($_POST["email"]);
	$password = $_POST["password"];
	if ($accounts_table->checkIfPasswordMatches($email, $password)){
		$_SESSION['user_name'] = $accounts_table->getName($email);
		$_SESSION['user_validated'] = True;
		json_responder(True);
	} else {
		json_responder(False, "Login failed! The email or password you entered is incorrect. Please try again.");
	}

	exit();	
}

$page_title = 'Login';
require_once "../resources/templates/header.php" 
?>




<div> 
	<form id="login_form" method="post"> 
		<p><input class="form-control form-control-lg" type="email" name="email" autocomplete="email" placeholder="Email address"></p>
		<p><input class="form-control form-control-lg" type="password" name="password" autocomplete="current-password" placeholder="Password"></p>
		<p><button type="submit" name="Log In" class="btn btn-primary btn-lg btn-block" id="login_button" value="Log In">Log In</button></p>
		<p><a href="create_user.php" id="go_to_create_user_page" class="btn btn-outline-primary btn-lg btn-block">Create New User</a></p>

	</form>
</div>


<?php
if (!empty($_SESSION['user_creation_success_message'])) {
	echo "<div class='alert alert-success fade show'>
	<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	<span aria-hidden='true'>&times;</span></button>
	<div class='error_message'>";
	echo $_SESSION['user_creation_success_message'];
	echo "</div></div>";
	unset($_SESSION['user_creation_success_message']);
}

?>







<?php require_once "../resources/templates/footer.php" ?>