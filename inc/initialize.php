<?php
	error_reporting(0);
	// ini_set('display_errors', TRUE);

	// Define the core paths
	// Define them as absolute paths to make sure that require_once works as expected

	// DIRECTORY_SEPARATOR is a PHP pre-defined constant
	// (\ for Windows, / for Unix)
	defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

	defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'].DS.'mis.unijos.edu.ng'.DS.'app_transcript_template');
	defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'inc');

	//load config file first
	require_once(LIB_PATH.DS.'config.php');


	//require_once(LIB_PATH.DS.'javascript.php');
	//require_once(LIB_PATH.DS.'css.php');

	//load core objects
	require_once(LIB_PATH.DS.'Session.php');
	require_once(LIB_PATH.DS.'database.php');
	require_once(LIB_PATH.DS.'database_object.php');
	//require_once(LIB_PATH.DS.'pagination.php');
	require_once(LIB_PATH.DS."phpmailer".DS."class.phpmailer.php");
	require_once(LIB_PATH.DS."phpmailer".DS."class.smtp.php");
	require_once(LIB_PATH.DS."phpmailer".DS."class.pop3.php");
	//require_once(LIB_PATH.DS."phpmailer".DS."language".DS."phpmailer.lang-en.php");
	require_once(LIB_PATH.DS."swift".DS."swift_required.php");

	//load database-related classes	
	require_once(LIB_PATH.DS.'AcceptanceLog.php');
	require_once(LIB_PATH.DS.'AdmAccessCode.php');
	require_once(LIB_PATH.DS.'AdminUser.php');
	require_once(LIB_PATH.DS.'AppHistory.php');
	require_once(LIB_PATH.DS.'ApplicantStatus.php');
	require_once(LIB_PATH.DS.'City.php');
	require_once(LIB_PATH.DS.'DeliveryCompany.php');
	require_once(LIB_PATH.DS.'DeliveryType.php');
	require_once(LIB_PATH.DS.'DeliveryMode.php');
	require_once(LIB_PATH.DS.'Department.php');
	require_once(LIB_PATH.DS.'EntryMode.php');
	require_once(LIB_PATH.DS.'Faculty.php');	
	require_once(LIB_PATH.DS.'Faq.php');
	require_once(LIB_PATH.DS.'Feedback.php');
	require_once(LIB_PATH.DS.'FeedbackType.php');
	require_once(LIB_PATH.DS.'functions.php');
	require_once(LIB_PATH.DS.'LGA.php');	
	require_once(LIB_PATH.DS.'Mail.php');
	require_once(LIB_PATH.DS.'NewsEvent.php');
	require_once(LIB_PATH.DS.'Notification.php');
	
	require_once(LIB_PATH.DS.'Pagination.php');
	require_once(LIB_PATH.DS.'Programme.php');
	require_once(LIB_PATH.DS.'Setting.php');
	require_once(LIB_PATH.DS.'Theme.php');
	require_once(LIB_PATH.DS.'User.php');
	// require_once(LIB_PATH.DS.'secondary_school_user.php');
	// require_once(LIB_PATH.DS.'olevel.php');
	// require_once(LIB_PATH.DS.'photograph.php');
	//require_once(LIB_PATH.DS.'comment.php');
	//load basic functions next so that everything after can use them
	
?>