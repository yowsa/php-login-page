<?php
if (!$_SESSION['user_validated']){
	header("Location: login.php");
	
} 
?>