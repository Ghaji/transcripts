<?php 
	require_once("../inc/initialize.php");
	require_once("../inc/vendor/autoload.php");

	use Carbon\Carbon;
 	
 	// Instance of Carbon Class with the current time
	$date_now = new Carbon('now');
	
	$email = htmlspecialchars($_POST['email'],ENT_QUOTES);
	$epassword = htmlspecialchars($_POST['epassword'],ENT_QUOTES);
	$epassword = md5($epassword);
	
	# Create the greeting message
	$display_greeting = greeting();
	
	$sql = "SELECT * FROM `personal_details` WHERE `email`='".$email."' AND `password`='".$epassword."' LIMIT 1";
	$users = User::find_by_sql($sql);
	 //$users = User::authenticate($email, $epassword);

	if(empty($users)){
	
		# Your don't have an account yet or email and password combination wrong
		# Delay for few seconds for the loader
		doSleep();
		$msg  = '<h4 class="alert alert-error">Error</h4>';
		$msg .= '<hr>';
		$msg .= 'Your information does not exist in our database it may be due to the following reasons.';
		$msg .= '<ol>';
		$msg .= '<li>Your email and password combination is wrong.</li>';
		$msg .= '<li>You have not created an account yet.</li>';
		$msg .= '</ol>';
		$msg .= '<hr>';
		$msg .= '<span class="label label-success">Note:</span> Use the create account button below to create an account.';

		echo output_message($msg);

	} else {
		foreach($users as $user):
			if ($user->mail_validation == 0) {
				
				# Account not activated
				//create a random key
				$key = $user->email . $user->phone_number . $date_now;
				$key = sha1(md5($key));

				# Put info into an array to send to the function
				$info = array(
					'email' => $user->email,
					'phone_number' => $user->phone_number,
					'key' => $key);

				# Send mail
				$send_mail = Mail::send_email($info);

				# Delay for few seconds for the loader
				doSleep();

				$msg  = '<h4 class="alert alert-info">Information</h4>';
				$msg .= '<hr>';
				$msg .= 'Your account has not been activated. Activate your account using the link sent to your email.';
				$msg .= '<hr>';

				echo output_message($msg);

			} else {

				# store id in session
				$session->login($user->id);
				log_action('Login Successful', "{$user->email} logged in.");
				# continue with application
				#delay for few seconds for the loader
				doSleep();

				$user_login = new User();		
				$user_login->id 		= $user->id;
				$user_login->last_login = $date_now;
				$user_login->db_fields 	= array('last_login');
				$user_login->save();

				if(isset($user->full_name) && !empty($user->full_name)) {
					$label = ucfirst($user->full_name);
				} else {
					$label = 'Applicant';
				}

				$msg  = '<h4 class="alert alert-success">'.$display_greeting .', '. $label .'</h4>';
				$msg .= '<hr>';
				$msg .= 'You can continue with your application by using the button below.';
				$msg .= '<br><hr>';
				$msg .= '<a href="home.php" class="btn btn-primary">Proceed</a>';

				echo output_message($msg);
			}
		endforeach;
	}
	
?>