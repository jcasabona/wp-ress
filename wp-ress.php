<?php
/*
Plugin Name: WP RESS
Plugin URI: http://rwdwp.com/wp-ress
Description: This plugin adds a simple function that allows you to use WURFL databases to do device and feature detection
Author: Joe Casabona
Version: 1.0
Author URI: http://casabona.org/
*/


define('WPR_PATH', ABSPATH . 'wp-content/plugins/wp-ress/');
define('WPR_API_KEY', '673289:CNry9beZIoP38Kn2z1WRQcAU6Fqd0TwS');

require_once(WPR_PATH.'wurfl/Client/Client.php');


function wpr_detect_mobile_device(){
	try{
		$config = new WurflCloud_Client_Config(); 
		$config->api_key = WPR_API_KEY;  
		$client = new WurflCloud_Client_Client($config); 
		$client->detectDevice(); 
		
		return $client->getDeviceCapability('is_wireless_device');
	}catch (Exception $e){
		return wp_is_mobile();
	}
}

define('WPR_IS_MOBILE', wpr_detect_mobile_device());


function wpr_is_mobile(){
	return WPR_IS_MOBILE;
	}
	
	



?>