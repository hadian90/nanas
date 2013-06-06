<?php

class View {

	//setting for fix css and js and image, easy for bootsrapper.
	protected $fixheader = VIEW_FIXHEADER;

	function __construct() {
	}

	public function render($file_name, $data = null) {
		$ajax = $this->callAjax($file_name);
		$fixheader = '<base href="'.$this->fixheader.'" target="_self"';
		$url = 'views/'.$file_name.'.php';
		
		require $url;
	}

	public function content($file_name) {
		return $file_name.'.php';
	}

	public function renderContent($file_name, $content_file, $data = null) {

		$content1 = $this->content($content_file);
		$ajax = $this->callAjaxContent($file_name,$content_file);
		$fixheader = '<base href="'.$this->fixheader.'" target="_self"';
		$url = 'views/'.$file_name.'.php';
		
		require $url;
	}
	
	public function renderContentDouble($file_name, $content_file1, $content_file2, $data = null) {

		$content1 = $this->content($content_file1);
		$content2 = $this->content($content_file2);
		$ajax = $this->callAjaxContent($file_name,$content_file1);
		$fixheader = '<base href="'.$this->fixheader.'" target="_self"';
		$url = 'views/'.$file_name.'.php';
		
		require $url;
	}

	protected function callAjax($name){
		$file = 'ajaxs/'.strtolower($name).'_ajax.js';
		if (file_exists($file)) {
			return '<script src="http://code.jquery.com/jquery-latest.js"></script><script src="../'.$file.'"></script>';
		}
	}

	protected function callAjaxContent($name,$name1){
		$file = 'ajaxs/'.strtolower($name).'_ajax.js';
		$file1 = 'ajaxs/'.strtolower($name1).'_ajax.js';
		if (file_exists($file)&&file_exists($file1)) {
			return '<script src="http://code.jquery.com/jquery-latest.js">
				</script><script src="../'.$file.'"></script></script><script src="../'.$file1.'"></script>';
		} else if (file_exists($file1)) {
			return '<script src="http://code.jquery.com/jquery-latest.js">
				</script><script src="../'.$file1.'"></script>';
		} else if (file_exists($file) ) {
			return '<script src="http://code.jquery.com/jquery-latest.js">
				</script><script src="../'.$file.'">';
		}
	}
}

?>