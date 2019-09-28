$(function(){


	$("#create_user_button").click(function(event){
		event.preventDefault();
	// TODO: Check if user already exists

	$.post("create_user.php", $("#create_user_form").serialize(), function(data){
		if (data.success){
			// TODO: How do I get this message to show after user has been created after loading new page?
			window.confirm(data.message);
			window.location.replace("login.php");
		} else if (!data.success){
			$("#create_user_message").text(data.message).fadeOut(4000);
		} else {
			$("#create_user_message").text("Something went wrong, please try again.").fadeOut(4000);


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
