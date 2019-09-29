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
		<p><label for="email" class="col-sm-2 col-form-label col-form-label-lg">Email:</label><input class="form-control form-control-lg" type="email" name="email" autocomplete="email"></p>
		<p><label for="password" class="col-sm-2 col-form-label col-form-label-lg">Password:</label><input class="form-control form-control-lg" type="password" name="password" autocomplete="current-password"></p>
		<p><input type="submit" class="btn btn-primary btn-lg btn-block" id="login_button" value="Log In"></p>
	</form>
</div>

<p><a href="create_user.php">Create User</a></p>

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