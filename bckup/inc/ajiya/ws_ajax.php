<?php
	require_once("../initialize.php");
	require_once("../vendor/autoload.php");

	use Carbon\Carbon;
	$dt = Carbon::now(); 

	$session = new Session();

	$orderId 				 = $_POST['orderId'];
	// Obtain application_no from orderId
	$application_no 		 = $orderId;
	$amount 				 = $_POST['amt'];
	$ResponseCode 			 = $_POST['ResponseCode'];
	$ResponseDescription 	 = $_POST['ResponseDescription'];
	$payerName 				 = $_POST['payerName'];
	$serial_payment_brakdown = $_SESSION["payment_breakdown"];
	
	# Unset payment breakdown session variable
	unset($_SESSION["payment_breakdown"]);

	# Update acceptance_log
	if(  isset($_POST['action']) && $_POST['action'] == 'insertlog' ) {
		
		# Instance of Acceptance
		$acceptance = new AcceptanceLog();

		$acceptance->student_id 				= $application_no;
		$acceptance->PaymentReference 			= $orderId;
		$acceptance->ResponseCode 				= $ResponseCode;
		$acceptance->ResponseDescription 		= $ResponseDescription;
		$acceptance->Amount 					= $amount;
		$acceptance->Initiating_date 			= $dt->toDateTimeString();
		$acceptance->returned_paymentreference  = $serial_payment_brakdown;

		# Save Record into Table acceptance_log
		$acceptance->save();
	}
?>