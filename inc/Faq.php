<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class Faq extends DatabaseObject {
	
    protected static $table_name="faqs";
    public $db_fields=array('id', 'question', 'answer', 'admin_id', 'created_at', 'updated_at', 'visible');
	
	public $id;
	public $question;
    public $answer;
    public $admin_id;
    public $created_at;
    public $updated_at;
    public $visible;
}
?>