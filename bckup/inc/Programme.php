<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class Programme extends DatabaseObject {
	protected static $table_name="programmes";
	public $db_fields=array('id', 'programme_name', 'department_id',  'programme_visible', 'qualificaton_type_id');

	public $id;
	public $programme_name;
	public $department_id;
	public $programme_visible;
	public $qualificaton_type_id;		
}
?>