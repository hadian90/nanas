<?php

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

?>