<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class City extends DatabaseObject {
    
    protected static $table_name="cities";
    public $db_fields=array('id', 'city_name', 'amount', 'country_id', 'visible');
    
    public $id;
    public $city_name;
    public $amount;
    public $country_id;
    public $visible;  
}
?>