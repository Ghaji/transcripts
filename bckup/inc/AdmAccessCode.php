<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class AdmAccess extends DatabaseObject {
	
	protected static $table_name="adm_access_code";
	public $db_fields=array('id','jamb_rem_no', 'pin','amount','payment_date', 'ip_addr', 'payment_code', 'branch_code', 'bank_code', 'reg_num', 'full_name', 'status');
	
	public $id;
	public $jamb_rem_no;
    public $pin;
    public $amount;
    public $payment_date;

    public $ip_addr;
    public $payment_code;
    public $branch_code;
    public $bank_code;
    public $reg_num;

    public $full_name;
    public $status;
}
?>