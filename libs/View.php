<?php

/******************************************************************************
* Filename    : View.php
* Author      : Abdul Hadi - Wired In Studio
* Date        : 08-jun-2013
* Description : Mother class for all views in nanas framework, View
* 				is the class that display the view to the screen. The views
*				file was basically HTML added with php function. 
******************************************************************************/

class View {

	//setting for fix css and js and image, easy for bootsrapper.
	protected $fixheader = VIEW_FIXHEADER;

	function __construct() {
	}
	
	/**************************************************************************
	* function			: render        	
	* Description		: display a single view 
	* Input Parameters	: filename - name of views file without .php
	*					  data - array of data that need to be show in views
	**************************************************************************/
	public function render($file_name, $data = null) {
		$ajax = $this->callAjax($file_name);
		$fixheader = '<base href="'.$this->fixheader.'" target="_self"';
		$url = 'views/'.$file_name.'.php';
		
		require $url;
	}
	
	/**************************************************************************
	* function			: render        	
	* Description		: display a content inside a view 
	* Input Parameters	: filename - name of views file without .php
	**************************************************************************/
	public function content($file_name) {
		return $file_name.'.php';
	}
	
	/**************************************************************************
	* function			: renderContent       	
	* Description		: display a view with a content inside
	* Input Parameters	: filename - name of views file without .php
	*					  contentfile - name of content in view file 
	*					  data - array of data that need to be show in views 
	**************************************************************************/
	public function renderContent($file_name, $content_file, $data = null) {

		$content1 = $this->content($content_file);
		$ajax = $this->callAjaxContent($file_name,$content_file);
		$fixheader = '<base href="'.$this->fixheader.'" target="_self"';
		$url = 'views/'.$file_name.'.php';
		
		require $url;
	}
	
	/**************************************************************************
	* function			: renderContentDouble    	
	* Description		: display a view with two content inside
	* Input Parameters	: filename - name of views file without .php
	*					  contentfile1 - name of content in view file 
	*					  contentfile2 - name of content in view file 
	*					  data - array of data that need to be show in views 
	**************************************************************************/
	public function renderContentDouble($file_name, $content_file1, $content_file2, $data = null) {

		$content1 = $this->content($content_file1);
		$content2 = $this->content($content_file2);
		$ajax = $this->callAjaxContent($file_name,$content_file1);
		$fixheader = '<base href="'.$this->fixheader.'" target="_self"';
		$url = 'views/'.$file_name.'.php';
		
		require $url;
	}
	
	/**************************************************************************
	* function			: callAjax        	
	* Description		: call the ajax file that bind to the views
	* Input Parameters	: name - name of ajax file
	**************************************************************************/
	protected function callAjax($name){
		$file = 'ajaxs/'.strtolower($name).'_ajax.js';
		if (file_exists($file)) {
			return '<script src="http://code.jquery.com/jquery-latest.js"></script><script src="../'.$file.'"></script>';
		}
	}

	/**************************************************************************
	* function			: callAjaxContent      	
	* Description		: call the ajax files that bind to the views
	* Input Parameters	: name - name of ajax file
	*					  name1 - name of ajax file 
	**************************************************************************/
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

/******************************************************************************
* End of View.php
******************************************************************************/

?>