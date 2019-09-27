
<head>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/login.js"></script>


</head>

<?php 
require_once "../base.php";

echo "lets create a user shall we" ?>

<div> 
	<form id="create_user_form" method="post"> 
		Email: <input type="name" name="email"><p>
		Password: <input type="password" name="password"><p>
		Confirm Password: <input type="password" name="confirm_password"><p>
		<input type="submit" id="create_user_button" name="log in">
	</form>
</div>

<a href="login.php">Login</a>



<?php
require "../db_connection.php";
// TODO: check so that the passwords provided are the same

if ($_POST){
	$accounts_table->addUser($_POST["email"], $_POST["password"]);
}


?>