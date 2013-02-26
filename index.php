<?php
//production mode
ini_set('display_errors',1);

//detect a mobile
//require 'libs/mobiledetect.php';

//call configuration holder
require 'libs/Configure.php';

//call all Library
require 'libs/Url.php';
require 'libs/Controller.php';
require 'libs/View.php';
require 'libs/Model.php';
require 'libs/Session.php';

$app = new url();

?>
