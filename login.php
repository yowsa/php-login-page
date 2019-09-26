<head>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="login.js"></script>
	<script type="text/javascript">
		$(function(){
			$("#email").change(function(){
				alert("hej");

			});

			$("#lekdiv").text(
				"<?php echo $_POST['email']; ?>"

				);
			
			
		});

		$("#button").onclick(() => alert("hejsan"));







	</script>

</head>

<div> 
	<form method="post"> 
		Email: <input id="email" type="email" name="email"><p>
		Password: <input type="password" name="password">
		<input type="submit" id="button" name="log in">
	</form>
	<div id="lekdiv">: </div>
</div>

<a href="create_user.php">Create User</a>



<?php
function validateEmail($email){
	var_dump(filter_var($email, FILTER_VALIDATE_EMAIL));
};

validateEmail("josefin.com");
validateEmail("josefin@fundin.com");




