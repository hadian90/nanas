<?php

class Model {
	protected $db;

	function __construct() {
		//database 
		$this -> db = new mysqli(DB_DOMAIN, DB_USER, DB_PASSWORD, DB_NAME);
		$this -> db -> autocommit(FALSE);
	}

	function __destruct() {
		$this -> db -> close();
	}
}

?>