<?php
require_once "../db_connection.php";
require_once "../base.php";

//function validateEmail($email){
//	var_dump(filter_var($email, FILTER_VALIDATE_EMAIL));
//};

//validateEmail("josefin.com");
//validateEmail("josefin@fundin.com");

if ($_POST){
	if ($accounts_table->checkIfPasswordMatches($_POST["email"], $_POST["password"])){
		$_SESSION['user_validated'] = True;
		$login_sussessful = [
			"success" => True
		];
		header('Content-Type: application/json');
		echo json_encode($login_sussessful);
		exit();
	} 
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