$(function(){
	function alertMessage($message){
		$("<div class='alert alert-danger fade show'>"+ 
			"<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" +
			"<span aria-hidden='true'>&times;</span></button>"+
			"<div class='error_message'></div></div>").appendTo("body");
		$(".error_message").text($message);

	}

	$("#create_user_button").click(function(event){
		event.preventDefault();
	// TODO: Check if user already exists

	$.post("create_user.php", $("#create_user_form").serialize(), function(data){
		if (data.success){
			// TODO: How do I get this message to show after user has been created after loading new page?
			window.confirm(data.message);
			window.location.replace("login.php");
		} else if (!data.success){
			$("#create_user_message").text(data.message);
		} else {
			$("#create_user_message").text("Something went wrong, please try again.");


		}

	});

});




	$("#login_button").click(function(event){
		event.preventDefault();

		$.post("login.php", $("#login_form").serialize(), function(data){
			if (data.success){
				window.location.href = 'logged_in.php';
			} else if (!data.success){
				alertMessage(data.message);
			} else {
				alertMessage("Something went wrong, please try again.");
			}
		});


	});














});
