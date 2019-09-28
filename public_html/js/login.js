$(function(){


	$("#create_user_button").click(function(event){
		event.preventDefault();
	// TODO: Disable form so you can't clikc multiple times and create multiple users
	// TODO: Check if user already exists

	$.post("create_user.php", $("#create_user_form").serialize(), function(data){
		if (data.success){
			window.location.href = 'login.php';
			// TODO: How do I get this message to show after user has been created after loading new page?
			$("#login_message").text("User created. Please log in.");
		} else {
			$("#create_user_message").text("Your passwords didn't match. Please try again");


		}

	});

});




	$("#login_button").click(function(event){
		event.preventDefault();

		$.post("login.php", $("#login_form").serialize(), function(data){
			if (data.success){
				window.location.href = 'logged_in.php';
			} else {
				$("#login_message").text("Login failed! The email or password you entered is incorrect. Please try again.");
			}
		});


	});














});
