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
		<p><label for="email">Email:</label><input id="email" type="email" name="email" autocomplete="email"></p>
		<p><label for="password">Password:</label><input type="password" name="password" autocomplete="current-password"></p>
		<p><input type="submit" id="login_button" value="Log In"></p>
	</form>
</div>
<p><div id="login_message"></div></p>

<p><a href="create_user.php">Create User</a></p>





<?php require_once "../resources/templates/footer.php" ?>