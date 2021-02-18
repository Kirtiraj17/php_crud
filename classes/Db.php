<?php

class Db
{
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $dbname = "secure_crud";
	protected $db;

	function __construct() {
		try {
			// Create database connection
			$this->db = new PDO("mysql:host=".$this->host."; dbname=".$this->dbname, $this->user, $this->password);
			// echo "Connection Successful!";

		} catch(PDOException $e) {
			echo "Connection Failed: ". $e->getMessage();
		}
	}

	function __destructor() {
		$this->db = null;
	}
}

?>