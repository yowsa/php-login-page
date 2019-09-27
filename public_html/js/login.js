$(function(){


$("#create_user_button").click(function(event){
	event.preventDefault();
	// TODO: Disable form so you can't clikc multiple times and create multiple users
	// TODO: Check if user already exists

	$.post("create_user.php", $("#create_user_form").serialize(), function(data){
	
});

});




$("#login_button").click(function(event){
	event.preventDefault();

	$.post("login.php", $("#login_form").serialize(), function(data){
		if (data.success){
			window.location.href = 'logged_in.php';
		}
		
	
});


});














});
