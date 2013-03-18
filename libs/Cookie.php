<?php

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

?>