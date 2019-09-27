<?php
if (!$_SESSION['user_validated']){
	header("Location: login.php");
	
} 


//if ($require_login AND $_SESSION['user_validated']){
//	header("Location: http://www.josefin.fundin.com");
	
//} 


?>