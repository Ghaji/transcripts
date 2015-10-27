<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class Title extends DatabaseObject {
	
	protected static $table_name="titles";
	public $db_fields=array('id','title_name', 'title_visible','title_created_at','title_updated_at');
	
	public $id;
	public $title_name;
    public $title_visible;
    public $title_created_at;
    public $title_updated_at;
}
?>