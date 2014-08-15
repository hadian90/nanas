<?php /******************************************************************************
 * Filename    : Url.php
 * Author      : Abdul Hadi - Wired In Studio
 * Date        : 08-jun-2013
 * Description : Make the url cleaner and rules the controller
 ******************************************************************************/

class url {

	function __construct() {

		if (isset($_GET['url'])) {
			$url = $_GET['url'];
		} else {
			//header('Location: home');
			$url = 'home';
			//
		}

		$url = rtrim($url, '/');
		$url = explode('/', $url);

		//print_r($url);

		$file = 'controllers/' . $url[0] . '.php';
		if (file_exists($file)) {
			require $file;
		} else {
			require 'controllers/error.php';
			$controller = new Error();
			$controller -> not_found();
			echo "Error Controller";
		}

		$controller = new $url[0];
		$controller -> loadModel($url[0]);

		if (sizeof($url) > 2) {
			if (method_exists($controller, $url[1])) {
				$controller -> {$url[1]}($url[2]);
			} else {
				require 'controllers/error.php';
				$controller = new Error();
				$controller -> not_found();
				echo "Error 1";
			}
		} else if (sizeof($url) == 2) {
			if (method_exists($controller, $url[1])) {
				$controller -> {$url[1]}();
			} else {
				if (method_exists($controller, $url[0])) {
					$controller -> {$url[0]}($url[1]);
				} else {
					require 'controllers/error.php';
					$controller = new Error();
					$controller -> not_found();
					echo "Error 2";
				}
			}
		} else {
			if (method_exists($controller, $url[0])) {
				$controller -> {$url[0]}();
			} else {
				require 'controllers/error.php';
				$controller = new Error();
				$controller -> not_found();
				echo "Error 3";
			}
		}
	}

}

/******************************************************************************
 * End of Url.php
 ******************************************************************************/
?>