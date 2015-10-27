<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class EntryMode extends DatabaseObject {
	
	protected static $table_name="entry_modes";
	public $db_fields=array('id','entry_name', 'entry_visible','entry_created_at','entry_updated_at');
	
	public $id;
	public $entry_name;
    public $entry_visible;
    public $entry_created_at;
    public $entry_updated_at;
}
?>