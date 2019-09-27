$(function(){




$("#create_user_button").click(function(event){
	event.preventDefault();

	$.post("create_user.php", $("#create_user_form").serialize(), function(data){
	
});


});














function validateEmailInput(){

}

/*
		$(function(){
			$("#email").change(function(){
				alert("hej");

			});

			$("#lekdiv").text(
				"<?php echo $_POST['email']; ?>"

				);
			
			
		});

		$("#button").onclick(() => alert("hejsan"));






*/




});
