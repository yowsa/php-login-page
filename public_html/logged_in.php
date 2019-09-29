<?php
require_once "../resources/base.php";
require_once "../resources/check_login.php";
$page_title = 'Logged In';
require_once "../resources/templates/header.php" 
?>

<div class="wrapper logged-in-wrapper text-center">
	<div class="jumbotron logged_in_greeting">
		<h1 display-4> Hello, <?= $_SESSION['user_name'] ?>!</h1> 
		<p class="lead">You're now logged in. </p>
		<a href="../resources/logout.php" id="log_out" class="btn btn-primary btn-lg">Log Out</a>
	</div>
</div>

<?php require_once "../resources/templates/footer.php" ?>