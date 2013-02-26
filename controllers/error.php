<?php

class Error extends Controller {
	function __construct() {
		parent::__construct();
	}

	public function error(){
		echo "<h1>WARNING</h1> Error called in URL";
	}

	public function not_found(){
		$this->view->render('error/404');
	}

	public function not_acceptable(){
		$this->view->render('error/406');
	}
}