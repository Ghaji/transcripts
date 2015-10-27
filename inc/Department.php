<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class Department extends DatabaseObject {

    protected static $table_name="departments";
    public $db_fields=array('id', 'faculty_id', 'department_name',  'visible');
		
	public $id;
	public $faculty_id;
	public $department_name;
	public $visible;
}
?>