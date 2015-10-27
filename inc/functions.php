<?php
require_once("initialize.php");
require_once("vendor/autoload.php");

use Carbon\Carbon;

function strip_zeros_from_date( $marked_string="" ) {
	// first remove the marked zeros
	$no_zeros = str_replace('*0', '', $marked_string);
	// then remove any remaining marks
	$cleaned_string = str_replace('*', '', $no_zeros);
	return $cleaned_string;
}

function redirect_to( $location = NULL ) {
	if ($location != NULL) {
		header("Location: {$location}");
		exit;
	}
}

function output_message($message="") {
	if (!empty($message)) { 
		return "<p class=\"message\">{$message}</p>";
	} else {
		return "";
	}
}

function __autoload($class_name) {
	$class_name = strtolower($class_name);
	$path = LIB_PATH.DS."{$class_name}.php";
	if(file_exists($path)) {
		require_once($path);
	} else {
		die("The file {$class_name}.php could not be found.");
	}
}

function include_layout_template($template="") {
	include(SITE_ROOT.DS.'layout'.DS.$template);
}

function log_action($action, $message="") {
	$logfile = SITE_ROOT.DS.'logs'.DS.'log.txt';
	$new = file_exists($logfile) ? false : true;
	if($handle = fopen($logfile, 'a')) { // append
		$timestamp = strftime("%Y-%m-%d %H:%M:%S", time());
		$content = "{$timestamp} | {$action}: {$message}\n";
		fwrite($handle, $content);
		fclose($handle);
		if($new) { chmod($logfile, 0755); }
	} else {
		echo "Could not open log file for writing.";
	}
}

function datetime_to_text($datetime="") {
	$unixdatetime = strtotime($datetime);
	return strftime("%B %d, %Y at %I:%M %p", $unixdatetime);
}

function customEncrypt($string) {
	//encode the initial string sent
	$encodedString = base64_encode($string);
	//generate random 4 digit integer
	$first_int_part = rand(1000, 9999);
	
	$last_int_part = rand(1000, 9999);
	
	//concatenate the random digits with the encoded string
	return $first_int_part.$encodedString.$last_int_part;
}

function customDecrypt($string) {
	//remove the first 4 digits random integer
	$string_without_first_int = substr($string, 4);
	//remove the last 4 digit random integer
	$string_without_last_int = substr($string_without_first_int, 0, strlen($string_without_first_int)-4);
	//decode the remaining string
	return base64_decode($string_without_last_int);
}

function app_id_generator($dt_id, $applicant_id) {
	# Get the length of random number to generate
	$random_number_length = 6 - strlen($applicant_id);
	
	# Get the last delivery type code
	$database = new MySQLDatabase();
	$dtsql = $database->query("SELECT dt_code FROM delivery_type WHERE id='".$dt_id."'");
	$result = $database->fetch_array($dtsql);
	$dt_code = $result['dt_code'];
	$random_number = rand(pow(10, ($random_number_length-1)), pow(10, $random_number_length) - 1);

	$dt = Carbon::now();
	$carbon_year = $dt->format('Y');
	$year = substr($carbon_year, 2, 2);
	
	# Returns Delivery Type Code.Random Number.Year.Applicant Id
	return $dt_code.$random_number.$year.$applicant_id;
}

function greeting() {
	$time = date("H:i:s");

    if($time > '00:00:00' && $time < '12:00:00'){
        $msg = 'Good Morning';
    }
    elseif($time > '12:00:00' && $time < '18:00:00'){
        $msg = 'Good Afternoon';
    }
    else{
        $msg = 'Good Evening';
    }

		$greeting = "$msg";

	return $greeting;
} 

function randomDigits($numDigits) {
	if ($numDigits <= 0) {
		return '';
	}
	return mt_rand(1, 9) . randomDigits($numDigits - 1);
}

function doSleep($df = 0) {
	if($df) {
		sleep($df);
	} else {
		sleep(1);
	}
	return false;
}
?>