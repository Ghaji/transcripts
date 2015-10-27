<?php
	require_once("../inc/initialize.php");
	require_once("../inc/vendor/autoload.php");

    use Carbon\Carbon;
    
    # Instance of Carbon with current time
    $dt = Carbon::now();

    # Instance of Session
	$session =new Session();
    
    if (isset($_POST["btn"])) {
		$title_id = htmlspecialchars($_POST['title_id'],ENT_QUOTES);
		$comment = htmlspecialchars($_POST['comment'],ENT_QUOTES); 
	   
		# Get the user details
		$user = User::find_by_id($session->id);

	    # Insert a new record into feedback table
	    $feedback 					 = new Feedback();
	    $feedback->title_id          = $title_id;
	    $feedback->comment           = $comment;
		$feedback->applicant_id      = $session->id;
		$feedback->programme_id      = $user->programme_id;
	    $feedback->created_at        = $dt;
	    $feedback->updated_at        = $dt;
	    $feedback->visible           = 1;
		
		if($feedback->save()) {
            doSleep();
			echo '<h4 class="alert alert-success">Success</h4>';
			echo '<hr>';
			echo "<p>Thank you for your Feedback.</p>";
			echo '<hr>';
		} else {
			# Error Message
			doSleep();
			echo '<h4 class="alert alert-error">Error</h4>';
			echo '<hr>';
			echo '<p>An Error occured while sending your feedback. Please try again later or visit ICT Help desk.</p>';
			echo '<hr>';
	    } 
    }
?>