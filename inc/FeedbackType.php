<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class FeedbackType extends DatabaseObject {
	
	protected static $table_name="feedback_types";
	public $db_fields=array('id', 'type', 'visible');
	
	public $id;
	public $type;
	public $visible;

}
?>