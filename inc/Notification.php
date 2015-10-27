<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class Notification extends DatabaseObject {
	
 protected static $table_name="notifications";
 public $db_fields=array('id', 'applicant_id', 'title', 'content', 'sender_admin_id', 'created_at', 'updated_at','note_read_date', 'status','visible');
	
	public $id;
	public $applicant_id;
	public $title;
	public $content;
	public $sender_admin_id;
	public $created_at;
	public $updated_at;
	public $note_read_date;
	public $status;
	public $visible;	
}

?>