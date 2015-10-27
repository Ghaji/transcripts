<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class DeliveryCompany extends DatabaseObject {
	
	protected static $table_name="delivery_companies";
	public $db_fields=array('id','delivery_company_name', 'delivery_visible');
	
	public $id;
	public $delivery_company_name;
    public $delivery_visible;
}
?>