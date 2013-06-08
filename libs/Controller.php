<?php

/******************************************************************************
* Filename    : Controller.php
* Author      : Abdul Hadi - Wired In Studio
* Date        : 08-jun-2013
* Description : Mother class for all controller in nanas framework, Controller
* 				is the class that control all the pages view and its 
*				functionality.
******************************************************************************/

class Controller {
	function __construct() {
		$this->view = new View();
	}

	public function loadModel($name){
		$path = 'models/'.$name.'_model.php';
		if (file_exists($path)) {
			require $path;
			$modelName = $name.'_model';
			$this->model = new $modelName();
		}
	}

}

/******************************************************************************
* End of Controller.php
******************************************************************************/

?>