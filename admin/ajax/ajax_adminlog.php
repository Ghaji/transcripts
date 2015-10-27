<?php 
	require_once("../../inc/initialize.php");
	require_once("../../inc/vendor/autoload.php");

	use Carbon\Carbon;
 	
 	// Instance of Carbon Class with the current time
	$date_now = new Carbon('now');
	
	$staff_number 	= htmlspecialchars($_POST['staff_number'], ENT_QUOTES);
	$password 		= htmlspecialchars($_POST['password'], ENT_QUOTES);
	$epassword = sha1($password);
	
	//Create the greeting message
	$display_greeting = greeting();
	
	//check if an admin account with the staff_number & password already exists
	$sql  = "SELECT * FROM `admin_users` WHERE `admin_users`.`staff_number`='".$staff_number."' AND `admin_users`.`password`= '".$epassword."' LIMIT 1";

	$users = AdminUsers::find_by_sql($sql);
	$user = array_shift($users);

	if(empty($user)){
	
		# Your don't have an account yet or email and password combination wrong
		# Delay for few seconds for the loader
		doSleep();                                    
		$msg  = '<h4 class="alert alert-danger">Oopsy - something went wrong.</h4>';
		$msg .= '<hr>';
		$msg .= 'Your information does not exist in our database it may be due to the following reasons.';
		$msg .= '<ol>';
		$msg .= '<li>Your Staff Number and Password Combination is Wrong.</li>';
		$msg .= '<li>You do not have an account.</li>';
		$msg .= '</ol>';

		echo output_message($msg);
	} else {

		// store applicant_id in session
		$session->admin_login($user->id);
		log_action('Login Successful', "{$user->email} logged in.");

		$adminLog = new AdminUsers();
		$adminLog->id = $user->id;

		if($user->activated == 1) {
			
			# Delay for few seconds for the loader
			doSleep();  

					// modal information
					$msg  = '<h4 class="alert alert-success">'.$display_greeting .', '. ucfirst($user->admin_name).'</h4>';
				// for admin to change his password
				if($user->edit_status == 0)
				{
					$msg .= '<hr>';
					$msg .= 'You must edit your details and also change your password before you can continue<br>';
					$msg .= '<hr>';
					$msg .= '<a href="editprofile.php" class="btn btn-info">Proceed</a>';

					echo output_message($msg);
				}
				else{
						
					//die();
					$msg .= '<hr>';
					$msg .= 'Welcome, your last account activity is <span class="label label-info">'.Carbon::createFromTimeStamp(strtotime($user->getLastLogin()))->diffForHumans().'</span>, ';
					$msg .= 'you can contiune.';
					$msg .= '<hr>';
					$msg .= '<a href="gida.php" class="btn btn-info">Proceed</a> | ';
					$msg .= '<a href="index.php" class="btn btn-warning">Exit</a>';

						$adminLog->db_fields = array('last_logged_in');
						$adminLog->last_logged_in = $date_now;
						$adminLog->save();

						$_SESSION["role_id"] = $user->role_id;

						// if($user->role_id == 4){
						// 	$_SESSION["department_id"] = $user->department_id;
						// }

					echo output_message($msg);
				}
				// end of if for edit status for the admin to change his password.
		} else {

			$msg  = '<h4 class="alert alert-warning">Oopsy! - something went wrong</h4>';
			$msg .= '<hr>';
			$msg .= 'You cannot login because your account is currently deactivated. ';
			$msg .= 'Contact the system administrator, for further explanation.';
			$msg .= '<hr>';
			//$msg .= '';

			echo output_message($msg);
		}
	}

?>