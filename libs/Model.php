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
	protected $easydb;

	function __construct() {
		//database 
		if (DB_TECH == 1) {
			$this -> db = new mysqli(DB_DOMAIN, DB_USER, DB_PASSWORD, DB_NAME);
			$this -> db -> autocommit(FALSE);	
		} else if(DB_TECH == 2) {
			//pdo setting
			$conn = "mysql:host=".DB_DOMAIN.";dbname=".DB_NAME;
			$this -> db = new PDO($conn, DB_USER, DB_PASSWORD);	
			require 'libs/Easydb.php';
			$this -> easydb = new Easydb($this -> db);
		}

	}

	function __destruct() {
		if (DB_TECH == 1) {
			$this -> db -> close();	
		}
	}
	
}

/******************************************************************************
* End of Model.php
******************************************************************************/

?>