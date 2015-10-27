<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class AcceptanceLog extends DatabaseObject {
	
 	protected static $table_name="acceptance_log";
 	public $db_fields=array('id', 'student_id', 'ResponseCode', 'ResponseDescription', 'Amount', 'returned_amount', 'CardNumber', 'MerchantReference', 'PaymentReference', 'returned_paymentreference', 'RetrievalReferenceNumber', 'Initiating_date', 'Interswitch_date', 'status');
	
	public $id;
	public $student_id;
	public $ResponseCode;
	public $ResponseDescription;
	public $Amount;
	public $returned_amount;
	public $CardNumber;
	public $MerchantReference;
	public $PaymentReference;
	public $returned_paymentreference;
	public $RetrievalReferenceNumber;
	public $Initiating_date;
	public $Interswitch_date;
	public $status;
}
?>