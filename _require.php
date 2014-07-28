<?php
require 'vendor/autoload.php';

function file_save_($file,$string,$overwrite){
	$fh=@fopen($file,$overwrite ? 'w' : 'a');
	if (!empty($fh)){
		fwrite($fh,$string);
		fclose($fh);
		return true;
	}
	else {
		return false;
	}
}

function log_file($log,$var=null,$file='logs/main.log',$overwrite=false){
	$date=date('Y-m-d H:i:s');
	$log='----Logged on '.$date.' ----'.PHP_EOL.PHP_EOL.'$'.$var.': '.(is_array($log) ? print_r($log,true) : $log).PHP_EOL.PHP_EOL;
	file_save_($file,$log,$overwrite);
	return true;
}

function redirect($url=null,$debug=false,$header=null){
	if (empty($url)){
		$url=$_SERVER['HTTP_REFERER'];
	}
	if ($debug){
		echo $url;
	}
	else {
		header('location:'.$url);
	}
	die;
}

define('DIR',__DIR__.'/');

/* Create a separate file called _config.php with the following
	If adding to public repo ensure this is in .gitignore

define('STRIPE_SECRET','');
define('STRIPE_KEY','');
 */

if (!include('_config.php')){
	die('The configuration could not be found. Pleaes create a file called "_config.php"');
}