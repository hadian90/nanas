<?php

class home extends Controller {

	function __construct() {
		parent::__construct();
	}

	//experimental function
	public function home() {
		$this->view->render('Home');
	}
	
	public function test() {
		print_r($this->model->test());
	}

}

?>