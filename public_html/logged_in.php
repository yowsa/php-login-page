<?php
require_once "../resources/base.php";
require_once "../resources/check_login.php";


$page_title = 'Logged In';
require_once "../resources/templates/header.php" 
?>



<h1> Welcome <?php echo $_SESSION['user_name'] ?>, you're logged in</h1> 



<a href="../resources/logout.php">Log Out</a>