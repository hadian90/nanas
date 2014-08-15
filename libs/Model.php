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
	protected $consoleMsg = VIEW_CONSOLE_MESSAGE;
	protected $errorMessage = VIEW_TEST_MESSAGE;

	function __construct() {
		//database
		if (DB_TECH == 1) {
			$this -> db = new mysqli(DB_DOMAIN, DB_USER, DB_PASSWORD, DB_NAME);
			$this -> db -> autocommit(FALSE);
		} else if (DB_TECH == 2) {
			//pdo setting
			$conn = "mysql:host=" . DB_DOMAIN . ";dbname=" . DB_NAME;
			$this -> db = new PDO($conn, DB_USER, DB_PASSWORD);
			require 'libs/Easydb.php';
			$this -> easydb = new Easydb($this -> db);
		} else if (DB_TECH == 3) {

		}

	}

	function __destruct() {
		if (DB_TECH == 1) {
			$this -> db -> close();
		}
	}

	/*******************************************************************************************
	 * Send debug code to the Javascript console
	 * For Debug purpose
	 ******************************************************************************************/
	function debug_to_console($data) {
		if ($this -> consoleMsg == 1) {
			if (is_array($data) || is_object($data)) {
				echo("<script>console.log('PHP: " . json_encode($data) . "');</script>");
			} else {
				echo("<script>console.log('PHP: " . $data . "');</script>");
			}
		}
	}

	/*******************************************************************************************
	 * Send message code to view. Disable render to see message clearly
	 * For Debug purpose
	 ******************************************************************************************/
	public function testMessage($msg) {
		if ($this -> errorMessage == 1) {
			if (is_array($msg)) {
				echo '<br />msg in array : ';
				echo "<pre>";
				print_r($msg);
				echo "</pre>";
			} else {
				echo '<br />msg : ' . $msg;
			}

		}
	}

}

/******************************************************************************
 * End of Model.php
 ******************************************************************************/
?>