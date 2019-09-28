<?php
function json_responder($bool, $response_message){
	$response = [
			"success" => $bool,
			"message" => $response_message,
		];

	header('Content-Type: application/json');
	return json_encode($response);

}





?>