<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class DeliveryMode extends DatabaseObject {
    
    protected static $table_name="delivery_mode";
    public $db_fields=array('id', 'dt_id', 'dm_type', 'dm_amount', 'dm_visible');

    public $id;
    public $dt_id;
    public $dm_type;
    public $dm_amount;
    public $dm_visible;  
}
?>