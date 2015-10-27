<?php  
	require_once("../inc/initialize.php");
	require_once("../inc/vendor/autoload.php");

    use Carbon\Carbon;
    
    $dt = Carbon::now();
	$session =new Session();
    
    if (isset($_POST["btn"])) {
		$full_name                = htmlspecialchars($_POST['full_name'],ENT_QUOTES);
		$matriculation_no         = htmlspecialchars($_POST['matriculation_no'],ENT_QUOTES); 
		$programme_id             = htmlspecialchars($_POST['programme_id'],ENT_QUOTES);
		$gender_id                = htmlspecialchars($_POST['gender_id'],ENT_QUOTES); 
		$year_of_graduation       = htmlspecialchars($_POST['year_of_graduation'],ENT_QUOTES);
		$year_of_entry            = htmlspecialchars($_POST['year_of_entry'],ENT_QUOTES);
		$entry_id                 = htmlspecialchars($_POST['entry_id'],ENT_QUOTES);  
		$date_of_birth            = htmlspecialchars($_POST['date_of_birth'],ENT_QUOTES);
		$email                    = htmlspecialchars($_POST['email'],ENT_QUOTES); 
		$contact_address          = htmlspecialchars($_POST['contact_address'],ENT_QUOTES);
		$phone_number             = htmlspecialchars($_POST['phone_number'],ENT_QUOTES);
	    
		# Update user's information
		$user = new User ();
		$user->db_fields = array('id','full_name','matriculation_no', 'programme_id', 'gender_id', 'year_of_graduation', 'year_of_entry','mode_of_entry_id', 'date_of_birth', 'email', 'phone_number','contact_address','updated_at');
	
		$user->id                  = $session->id;
		$user->full_name           = $full_name;
		$user->matriculation_no    = $matriculation_no;
		$user->programme_id        = $programme_id;
		$user->gender_id           = $gender_id ;
		$user->year_of_graduation  = $year_of_graduation;
		$user->year_of_entry       = $year_of_entry;
		$user->mode_of_entry_id    = $entry_id;
		$user->date_of_birth       = $date_of_birth;
		$user->email               = $email;
		$user->phone_number        = $phone_number;
		$user->contact_address     = $contact_address;
		$user->updated_at          = $dt;
		
		if($user->save()) {
            doSleep();
			echo '<h4 class="alert alert-success">Success</h4>';
			echo '<hr>';
			echo "<p>You have Successfully updated your profile  ".$full_name." </p>";
			echo '<hr>';
		} else {
			# Error Message
			doSleep();
			echo '<h4 class="alert alert-error">Error</h4>';
			echo '<hr>';
			echo '<p>Your profile update was not successful.</p>';
	    } 
    }
?>