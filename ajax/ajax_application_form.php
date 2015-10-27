<?php
	require_once("../inc/initialize.php");
	require_once("../inc/vendor/autoload.php");

	use Carbon\Carbon;
 	
 	# Instance of Carbon Class with the current time
	$date_now = new Carbon('now');

	# Instance of Session
    $session = new Session();

	# Instance of User
    $user = User::find_by_id($session->id);

	$error_message = 0;
	
	# Make sure $_POST variables are database friendly
	$application_no 	= htmlspecialchars($_POST['app_no'], ENT_QUOTES);
	$title_id 			= htmlspecialchars($_POST['title_id'], ENT_QUOTES);
	$full_name 			= htmlspecialchars($_POST['full_name'], ENT_QUOTES);
	$matriculation_no 	= htmlspecialchars($_POST['matriculation_no'], ENT_QUOTES);
	$gender_id 			= htmlspecialchars($_POST['gender_id'], ENT_QUOTES);

	$date_of_birth 		= htmlspecialchars($_POST['date_of_birth'], ENT_QUOTES);
	$email 				= htmlspecialchars($_POST['email'], ENT_QUOTES);
	$phone_number 		= htmlspecialchars($_POST['phone_number'], ENT_QUOTES);
	$contact_address 	= htmlspecialchars($_POST['contact_address'], ENT_QUOTES);
	$mode_of_entry_id 	= htmlspecialchars($_POST['mode_of_entry_id'], ENT_QUOTES);

	$year_of_graduation = htmlspecialchars($_POST['year_of_graduation'], ENT_QUOTES);
	$year_of_entry 		= htmlspecialchars($_POST['year_of_entry'], ENT_QUOTES);
	$receiving_address 	= htmlspecialchars($_POST['receiving_address'], ENT_QUOTES);
	
	if (isset($_POST['applied'])) {
		$applied = htmlspecialchars($_POST['applied'], ENT_QUOTES);
	}

	#checks if an account with the email & phone number already exists
	$sql_pd  = "SELECT * FROM `personal_details` WHERE `email`='".$email."' LIMIT 1";

	$user_exists = User::find_by_sql($sql_pd);
	$user_record = array_shift($user_exists);
	
	# Check if the user's record exists
	if (isset($user_record) && !empty($user_record)) {

		# Update personal_details table
		$applicant = new User();
		$applicant->db_fields = array('matriculation_no', 'title_id', 'full_name', 'gender_id', 'date_of_birth', 'contact_address', 'mode_of_entry_id', 'year_of_graduation', 'year_of_entry', 'receiving_address', 'applied', 'updated_at');

		$applicant->id 					= $user_record->id;
		$applicant->matriculation_no 	= $matriculation_no;
		$applicant->title_id 			= $title_id;
		$applicant->full_name 			= $full_name;
		$applicant->gender_id 			= $gender_id;
		
		$applicant->date_of_birth 		= $date_of_birth;
		$applicant->contact_address 	= $contact_address;
		$applicant->mode_of_entry_id 	= $mode_of_entry_id;
		$applicant->year_of_graduation 	= $year_of_graduation;
		$applicant->year_of_entry 		= $year_of_entry;
		
		$applicant->receiving_address 	= $receiving_address;		
		$applicant->updated_at 			= $date_now;

		if (isset($applied)) {
			$applicant->applied = $applied;
		}

		if ($applicant->save()) {			
			# Get application history
			$sql_app  = "SELECT * FROM `app_histories` WHERE `application_no`='".$application_no."' LIMIT 1";
			$application_histories = AppHistory::find_by_sql($sql_app);
			$application_history = array_shift($application_histories);

			# Update app_histories table
			$app_history = new AppHistory();
			$app_history->db_fields = array('application_flag', 'receiving_address', 'created_at', 'updated_at', 'app_visible');

			$app_history->id 				= $application_history->id;
			$app_history->receiving_address = $receiving_address;			
			$app_history->application_flag 	= 1;
			$app_history->created_at 		= $date_now;
			$app_history->updated_at 		= $date_now;
			$app_history->app_visible 		= 1;

			if ($app_history->save()) {
				doSleep(2);
				echo '<h4 class="alert alert-success">Success</h4>';
				echo '<hr>';
				echo 'You have successfully submitted your transcript application.<br>';
				echo 'Please use the <span class="label label-info">Check Status</span> link in the <span class="label label-info">Transcript Activity</span> menu to see the status of your application';
				echo '<hr>';
				echo '<a href="home.php" class="btn btn-primary">Proceed</a>';
			} else {
				$error_message = 1;
			}
		} else {
			$error_message = 1;
		}
	}  else {
		$error_message = 1;
	} 

	# Error message for when something goes wrong
	if ($error_message == 1) {		
		doSleep(2);
		echo '<h4 class="alert alert-info">Information</h4>';
		echo '<hr>';
		echo 'Your information cannot be saved at this time.<br>';
		echo 'Please contact us at <span class="label label-info">support@unijos.edu.ng</span> for further enquiries';
		echo '<hr>';
		echo '<a href="home.php" class="btn btn-primary">Back to home</a>';
	}	
?>