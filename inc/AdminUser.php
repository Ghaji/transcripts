<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class AdminUsers extends DatabaseObject {
	
    protected static $table_name="admin_users";
    public $db_fields=array('id','admin_name', 'username','password','surname','othernames','rank','last_logged_in','edit_status','role','department_id','faculty_id','phone','visible');
	
	public $id;
	public $admin_name;
    public $username;
    public $password;
    public $surname;
    public $othernames;
    public $rank;
    public $last_logged_in;
    public $edit_status;
    public $activated_status;
    public $role;
    public $department_id;
    public $faculty_id;
    public $phone;
    public $visible;
}
?>