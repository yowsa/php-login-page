<?php


$config = [
	"db" => [
		"dbname" => "logindb",
		"dbusername" => "root",
		"dbpassword" => "",
		"dbhost" => "localhost",
	],
	"password_length_req" => 5,
	"account_fields_req" => [
		"name",
		"email",
		"password",
		"confirm_password",
	],
];




?>