<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class LGA extends DatabaseObject {
  
    protected static $table_name="lga";
    public $db_fields=array('id', 'state_id', 'lga_name', 'lga_amount', 'visible');
    
    public $id;
    public $state_id;
    public $lga_name;
    public $lga_amount;
    public $visible;  
}
?>