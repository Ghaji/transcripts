<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class Feedback extends DatabaseObject {
	
	protected static $table_name="feedbacks";
	public $db_fields=array('id', 'applicant_id','programme_id', 'title_id','comment','created_at','updated_at', 'visible','read_by','feedback_read_date');
	
	public $id;
	public $applicant_id;
	public $programme_id;
	public $title_id;
	public $comment;
	public $created_at;
	public $updated_at;
	public $visible;
	public $read_by;
	public $feedback_read_date;
	
	
}
?>