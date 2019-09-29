<?php
require_once "config.php";

class DatabaseManager {
	
	function __construct($config){
		$this->dbname = $config["db"]["dbname"];
		$this->dbusername = $config["db"]["dbusername"];
		$this->dbpassword = $config["db"]["dbpassword"];
		$this->dbhost = $config["db"]["dbhost"];
	}

	function getConnection(){
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		try {
			$connection = new mysqli($this->dbhost, $this->dbusername, $this->dbpassword, $this->dbname);
			return $connection;
		} catch (Exception $e) {
			exit("Connection failed, please come back later.");
		}
	}
}

$database_manager = new DatabaseManager($config);

?>