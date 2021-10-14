<?php

class DB {

	public $conn;

	function __construct() {
		$this->connect();
	}

	public function connect() {
		$conn = new mysqli(MYSQLI_HOST.( MYSQLI_PORT == "" ? "" : ":".MYSQLI_PORT ), MYSQLI_USER, MYSQLI_PASS, MYSQLI_DB);
		$conn->set_charset("UTF8");
		$this->conn = $conn;
	}

}
