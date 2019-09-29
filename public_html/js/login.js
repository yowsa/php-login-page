$(function(){
	function alertMessage(message){
		$("<div class='alert alert-danger fade show'>"+ 
			"<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" +
			"<span aria-hidden='true'>&times;</span></button>"+
			"<div class='error_message'></div></div>").appendTo("form.alert-message-reciever").delay(3000).fadeOut(1000, () => $(this).remove());
		$(".error_message").text(message);
	}

	function handleAjaxResponse(json_response, success_url){
		if (json_response.success === true){
			window.location.replace(success_url);
		} else if (json_response.success === false){
			alertMessage(json_response.message);
		} else {
			alertMessage("Something went wrong, please try again.");
		}
	}

	$("#create_user_button").click(function(event){
		event.preventDefault();

		$.post("create_user.php", $("#create_user_form").serialize(), function(json_response){
			handleAjaxResponse(json_response, "login.php");
		});
	});


	$("#login_button").click(function(event){
		event.preventDefault();

		$.post("login.php", $("#login_form").serialize(), function(json_response){
			handleAjaxResponse(json_response, "logged_in.php");
		});
	});






});
