<?php
require_once "../db_connection.php";
require_once "../base.php";

//function validateEmail($email){
//	var_dump(filter_var($email, FILTER_VALIDATE_EMAIL));
//};

//validateEmail("josefin.com");
//validateEmail("josefin@fundin.com");

if ($_POST){
	if ($accounts_table->checkIfPasswordMatches("josefin@fundin.com", "mypassword")){
		$_SESSION['user_validated'] = True;
		$login_sussessful = [
			"success" => True
		];
		header('Content-Type: application/json');
		echo json_encode($login_sussessful);
		exit();
	} 
}



?>




<?php 
require_once "../resources/templates/header.php" 

?>


<div> 
	<form id="login_form" method="post"> 
		Email: <input id="email" type="email" name="email"><p>
		Password: <input type="password" name="password">
		<input type="submit" id="login_button" name="log in">
	</form>
</div>

<a href="create_user.php">Create User</a>







</body>
</html>