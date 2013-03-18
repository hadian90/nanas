<?php

class View {

	//setting for fix css and js and image, easy for bootsrapper.
	protected $fixheader = VIEW_FIXHEADER;

	function __construct() {
	}

	public function render($file_name, $data = null) {
		$ajax = $this->callAjax($file_name);
		$fixheader = $this->fixheader;
		$url = 'views/'.$file_name.'.php';

		//auto add fixheader and ajax
		$url_contents = file_get_contents($url);
		$dom = new DOMDocument();
		libxml_use_internal_errors(true);
		$dom->loadHTML($url_contents);
		libxml_use_internal_errors(false);

		// Find the parent node 
		$xpath = new DomXPath($dom); 
		// Find parent node 
		$parent = $xpath->query('//head');
		// new node will be inserted before this node 
		$next = $xpath->query('//title'); 

		//create fixheader
		$fheader = $dom->createElement('base');
		$fheader->setAttribute('href',$fixheader);
		$fheader->setAttribute('target','_self');
		$parent->item(0)->insertBefore($fheader,$next->item(0));

		if ($ajax) {
			$head = $dom->getElementsByTagName('head')->item(0);
			$fajax = $dom->createElement('script');
			$fajax->setAttribute('src',$ajax);
			$head->appendChild($fajax);
		}

		//$dom->saveHTML();

		echo $dom->saveHTML();
	}

	public function content($file_name) {
		require 'views/'.$file_name.'.php';
	}

	public function renderContent($file_name, $content_file, $data = null) {

		$content = $this->content($content_file);
		$this->render($file_name,$data);
	}

	protected function callAjax($name){
		$file = 'ajaxs/'.strtolower($name).'_ajax.js';
		if (file_exists($file)) {
			return '../'.$file;
		}
	}
}

?>