<?php 
	require_once("../inc/initialize.php");
	require_once("../inc/vendor/autoload.php");

    use Carbon\Carbon;
    
    # Instance of carbon
    $dt = Carbon::now();

    # Instance of Session
	$session = new Session();
    
    if (isset($_POST["btn"])) {
		$title = htmlspecialchars($_POST['title_id'],ENT_QUOTES);
		$receiving_address = htmlspecialchars($_POST['receiving_address'],ENT_QUOTES); 
	
		# Get the User details
		$user = User::find_by_id($session->id);

	    # Instance of Feedback
	    $feddback = new Feedback();
	    
	    $feddback->title             = $title;
	    $feddback->receiving_address = $receiving_address;
		$feddback->applicant_id      = $session->id;
		$feddback->programme_id      = $user->programme_id;
	    $feddback->created_at        = $dt;
	    $feddback->updated_at        = $dt;
	    $feddback->visible           = 1;
		
		# Save feedback to feedbacks table
		if( $feddback->save() ) {
			# Success Message
            doSleep();
			echo '<h4 class="alert alert-success">Success</h4>';
			echo '<hr>';
			echo "<p>You have Successfully Send a Feedback</p>";
			echo '<hr>';
		} else {
			# Error Message
			doSleep();
			echo '<h4 class="alert alert-error">Error</h4>';
			echo '<hr>';
			echo '<p>Your Feedback was not successful.</p>';
	    } 
    }
?>