<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class DeliveryType extends DatabaseObject {
  
    protected static $table_name="delivery_type";
    public $db_fields=array('id', 'dt_name', 'dt_code', 'dt_amount', 'dt_visible');

    public $id;
    public $dt_name;
    public $dt_code;
    public $dt_amount;
    public $dt_visible;  
}
?>