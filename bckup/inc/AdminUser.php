<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class AdminUsers extends DatabaseObject {
	
    protected static $table_name="admin_users";
    public $db_fields=array('id', 'staff_number', 'admin_name', 'username', 'password', 'email', 'created_at', 'updated_at', 'last_logged_in', 'activated', 'edit_status', 'role_id', 'faculty_id', 'cat_id', 'visible');
	
	public $id;
    public $staff_number;
	public $admin_name;
    public $username;
    public $password;
    public $email;
    public $created_at;
    public $updated_at;
    public $last_logged_in;
    public $activated;
    public $edit_status;
    public $role_id;
    public $faculty_id;
    public $cat_id;
    public $visible;


    # Get last login
    public function getLastLogin() {
        if(isset($this->last_logged_in)) {
            return $this->last_logged_in;
        }
    }   
}
?>