<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class AppHistory extends DatabaseObject {
	
	protected static $table_name="app_histories";
	public $db_fields=array('id', 'application_no', 'applicant_id', 'type_id', 'mode_id', 'city_or_state', 'receiving_address', 'application_flag', 'reason', 'created_at', 'updated_at', 'app_visible');
	
	public $id;
	public $application_no;
    public $applicant_id;
	public $type_id;
	public $mode_id;
	public $city_or_state;
	public $receiving_address;
	public $application_flag;
	public $reason;	
	public $created_at;
	public $updated_at;
	public $app_visible;
}
?>