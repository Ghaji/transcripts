<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class NewsEvent extends DatabaseObject {
  
    protected static $table_name="news_events";
    public $db_fields=array('id', 'iType', 'cat_id',  'hot_news', 'title', 'display_line', 'content', 'image', 'position', 'visible', 'archived', 'author', 'verified_by', 'created_year', 'created_time', 'last_update');

    public $id;
    public $iType;
    public $cat_id;
    public $hot_news;
    public $title;
    public $display_line;
    public $content;
    public $image;
    public $position;
    public $visible;
    public $archived;
    public $author;
    public $verified_by;
    public $created_year;
    public $created_time;
    public $last_update;
  }
?>