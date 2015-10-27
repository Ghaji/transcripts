<?php
	require_once("../inc/initialize.php");
	require_once("../inc/vendor/autoload.php");

    use Carbon\Carbon;
    
    # Instance of Carbon with current time
    $dt = Carbon::now();

    # Instance of Session
	$session =new Session();
    
    if (isset($_POST["btn"])) {
    	
		$note_id      = htmlspecialchars($_POST['note_id'],ENT_QUOTES);
		$note_status  = htmlspecialchars($_POST['note_status'],ENT_QUOTES); 
	    		//print_r($note_status);
    	//die();
			if ($note_status == 1) 
					
			

			    # Insert a new updateinto notification table
			   $notification = new Notification();
			   $notification->db_fields = array('id', 'applicant_id', 'title', 'content', 'sender_admin_id', 'created_at', 'updated_at', 'status','visible');
			    
			   $notification->id      = $note_id;
			   //  $notification->applicant_id     = $session->id;
			   // $notification->title  = 'Aliyu';
			   //  $notification->content     = 'content';
			   // $notification->sender_admin_id  = 9;
			   //  $notification->created_at      = '0000-00-00 00:00:00' ;
			   // $notification->updated_at  = '0000-00-00 00:00:0)' ;
			   $notification->status  = 2;
			    //$notification->visible  = 1;
				
			if($notification->save()) {
            doSleep();
			echo '<h4 class="alert alert-success">Success</h4>';
			echo '<hr>';
			echo "<p>You have Successfully updated your profile  ".$note_id." </p>";
			echo '<hr>';
		} else {
			# Error Message
			doSleep();
			echo '<h4 class="alert alert-error">Error</h4>';
			echo '<hr>';
			echo '<p>Your profile update was not successful.</p>';
	    } 
	}
    //}
?>