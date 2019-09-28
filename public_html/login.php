<?php
require_once "../db_connection.php";
require_once "../base.php";


if ($_POST){
	$email = strtolower($_POST["email"]);
	$password = $_POST["password"];
	if ($accounts_table->checkIfPasswordMatches($email, $password)){
		$_SESSION['user_validated'] = True;
		json_responder(True);
	} else {
		json_responder(False, "Login failed! The email or password you entered is incorrect. Please try again.");
		
	}

	exit();	
}


require_once "../resources/templates/header.php" 
?>




<div> 
	<form id="login_form" method="post"> 
		<p>Email: <input id="email" type="email" name="email"></p>
		<p>Password: <input type="password" name="password"></p>
		<p><input type="submit" id="login_button" value="Log In"></p>
	</form>
</div>
<p><div id="login_message"></div></p>

<p><a href="create_user.php">Create User</a></p>







</body>
</html>