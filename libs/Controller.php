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
	protected $consoleMsg = VIEW_CONSOLE_MESSAGE;
	protected $errorMessage = VIEW_TEST_MESSAGE;

	function __construct() {
		$this -> view = new View();
	}

	public function loadModel($name) {
		$path = 'models/' . $name . '_model.php';
		if (file_exists($path)) {
			require $path;
			$modelName = $name . '_model';
			$this -> model = new $modelName();
		}
	}

	/*******************************************************************************************
	 *  redirect code using javascript
	 ******************************************************************************************/
	public function redirect($link) {
		echo '<script> window.location="' . $link . '"; </script> ';
	}

	/*******************************************************************************************
	 * This function is for upload the picture and video
	 * @param
	 * $files = input file
	 * $type = vid or pic (video or picture)
	 * 			0 - all type
	 * 			1 - picture
	 * 			2 - video
	 * 			3 - audio
	 * $target = where you want to save the data .. end it with '/'
	 * $compress = currently is for image only. enable = 1
	 * $limitsize = input limit size in Bytes, if dont want just leave it null
	 *
	 * return value :
	 * 		Error:1 = wrong file
	 * 		Error:2 = problem with file
	 * 		Error:3 = filesize bigger than limit
	 * 		filename = no error, save the filename to database
	 ******************************************************************************************/
	public function uploadFile($files, $target, $type = 0, $compress = NULL, $limitsize = NULL) {
		$pic = array("GIF", "JPEG", "JPG", "PNG");
		$vid = array("AVI", "MKV", "MP4", "3GP");
		$aud = array("MP3", "OGG");

		$error = 0;

		if ($limitsize != NULL) {
			if ($files["size"] > $limitsize) {
				$error = 3;
			}
		}

		if ($error == 3) {
			return 'Error:3';
			//filesize bigger than limit
		} else {

			$temp = explode(".", $files["name"]);
			$extension = end($temp);

			if ($type == 0) {
				//all type allow
			} else if ($type == 1) {
				if (in_array(strtoupper($extension), $pic)) {
					//no problem
				} else {
					$error = 1;
				}
			} else if ($type == 2) {
				if (in_array(strtoupper($extension), $vid)) {
					//no problem
				} else {
					$error = 1;
				}
			} else if ($type == 3) {
				if (in_array(strtoupper($extension), $aud)) {
					//no problem
				} else {
					$error = 1;
				}
			}

			if ($error == 0) {
				if ($files["error"] > 0) {
					return 'Error:2';
					//problem with file
				} else {
					$name = time() . '.' . $extension;
					if ($compress == 1) {
						//echo "compress x null";
						$destination = $this -> compress($files["tmp_name"], $target . $name, 50);
					} else {
						//echo "compress null";
						move_uploaded_file($files["tmp_name"], $target . $name);
					}

					return $name;
				}
			} else if ($error == 1) {
				return 'Error:1';
				//wrong file
			}
		}
	}

	public function compress($source, $destination, $quality) {
		$info = getimagesize($source);

		if ($info['mime'] == 'image/jpeg')
			$image = imagecreatefromjpeg($source);
		elseif ($info['mime'] == 'image/gif')
			$image = imagecreatefromgif($source);
		elseif ($info['mime'] == 'image/png')
			$image = imagecreatefrompng($source);

		imagejpeg($image, $destination, $quality);
		return $destination;
	}

	public function createFolder($path) {
		if (!is_dir($path)) {
			mkdir($path);
		}
	}

	/*******************************************************************************************
	 * Send debug code to the Javascript console
	 * For Debug purpose
	 ******************************************************************************************/
	function debug_to_console($data) {
		if ($this -> consoleMsg == 1) {
			if (is_array($data) || is_object($data)) {
				echo("<script>console.log('PHP: " . json_encode($data) . "');</script>");
			} else {
				echo("<script>console.log('PHP: " . $data . "');</script>");
			}
		}
	}

	/*******************************************************************************************
	 * Send message code to view. Disable render to see message clearly
	 * For Debug purpose
	 ******************************************************************************************/
	public function testMessage($msg) {
		if ($this -> errorMessage == 1) {
			if (is_array($msg)) {
				echo '<br />msg in array : ';
				echo "<pre>";
				print_r($msg);
				echo "</pre>";
			} else {
				echo '<br />msg : ' . $msg;
			}

		}
	}

	/*******************************************************************************************
	 * Send email with html template
	 * $to = where to send
	 * $from_name = name who send the mail
	 * $from_email = email who send the mail
	 * $subject = subject for email
	 * $template = html mail; please check your template here first; http://putsmail.com/
	 * $dynamicVar = in array. key it dynamic changes and value for the value
	 ******************************************************************************************/
	public function sendMail($to, $from_name, $from_email, $subject, $template, $dynamicVar = NULL) {

		$headers = 'From: ' . $from_name . ' <' . $from_email . ">\r\n";
		$headers .= 'X-Mailer: PHP/' . phpversion();
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

		$headers .= "Reply-To: " . $from_name . " <" . $from_email . ">\r\n";
		$headers .= "Return-Path: " . $from_name . " <" . $from_email . ">\r\n";
		$headers .= "Organization: Wired In Sdn Bhd\r\n";

		$body = file_get_contents($template);

		if ($dynamicVar != NULL) {
			foreach ($dynamicVar as $key => $value) {
				$body = str_replace($key, $value, $body);
			}
		}

		if (mail($to, $subject, $body, $headers)) {
			return 'success';
		} else {
			return 'failed';
		}
	}

}

/******************************************************************************
 * End of Controller.php
 ******************************************************************************/
?>