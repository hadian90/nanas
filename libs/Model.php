<?php

/******************************************************************************
* Filename    : Model.php
* Author      : Abdul Hadi - Wired In Studio
* Date        : 08-jun-2013
* Description : Mother class for all model in nanas framework, Model
* 				is the class that connect the controller to the database
******************************************************************************/

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

/******************************************************************************
* End of Model.php
******************************************************************************/

?>