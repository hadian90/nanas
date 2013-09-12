<?php
/******************************************************************************
* Filename    : Configure.php
* Author      : Abdul Hadi - Wired In Studio
* Date        : 08-jun-2013
* Description : Configuration for Nanas Framework
******************************************************************************/

//choose 1 for mysqli and 2 for PDO with easydb
define('DB_TECH',					'2');

// configuration for database setting
define('DB_DOMAIN', 				'localhost');
define('DB_USER', 					'root');
define('DB_PASSWORD', 				'root');
define('DB_NAME', 					'MyMuseumTest');

// configuration for view
define('VIEW_FIXHEADER',			"http://192.168.0.119/MyMuseum/views/");

// configuration for facebook
define('FB_APP_ID',					'319106231524707');
define('FB_APP_SECRET',				'19dc213ea1d88a5adfe6ebf97fb2bbbd');
define('FB_SITE_URL',				'http://192.168.0.121/scholarlist/home/facebook');

// configuration for mobile redirect
define('MOBILE_REDIRECT',			'http://detectmobilebrowser.com/mobile');

/******************************************************************************
* End of Configure.php
******************************************************************************/

?>