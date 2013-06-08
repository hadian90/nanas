<?php

/******************************************************************************
* Filename    : Cookie.php
* Author      : Abdul Hadi - Wired In Studio
* Date        : 08-jun-2013
* Description : Class that invoke cookies
******************************************************************************/

class Cookie {

	//experiment
	public static function set($key,$value){
		setcookie($key,$value);
	}

	//experiment
	public static function setWithTime($key,$value,$time){
		setcookie($key,$value,time()-$time);
	}

	//experiment
	public static function get($key){
		return $_COOKIE[$key];
	}

}

/******************************************************************************
* End of Cookie.php
******************************************************************************/

?>