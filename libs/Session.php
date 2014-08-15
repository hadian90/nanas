<?php

/******************************************************************************
* Filename    : Session.php
* Author      : Abdul Hadi - Wired In Studio
* Date        : 08-jun-2013
* Description : Class that invoke session
******************************************************************************/

class Session {

	public static function init() {
		if (!$_SESSION) {
			session_start();
		}
	}

	//experiment
	public static function set($key,$value){
		$_SESSION[$key] = $value;
	}

	//experiment
	public static function get($key){
		return $_SESSION[$key];
	}

	public static function destroy() {
		session_destroy();
	}
}

/******************************************************************************
* End of Session.php
******************************************************************************/

?>