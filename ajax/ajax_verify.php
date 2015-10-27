<?php
	require_once("../inc/initialize.php");
	require_once("../inc/vendor/autoload.php");

	use Carbon\Carbon;
 	
 	// Instance of Carbon Class with the current time
	$date_now = new Carbon('now');
	
	$email = htmlspecialchars($_POST['email'], ENT_QUOTES);

	$password = htmlspecialchars(md5($_POST['epassword']), ENT_QUOTES);
	
	//Checks the table if the email is in the database and it corresponds with the password entered
	$sql  = "SELECT * FROM `personal_details` WHERE `email`='".$email."' AND `password`= '".$password."' LIMIT 1";

	$user_exists = User::find_by_sql($sql);

	foreach($user_exists as $user_exist)
	{	
	  $user_exist->email;
	  $user_exist->password;
	  $user_exist->id;
	  $user_exist->mail_validation;
	}
	
	if($user_exist->email != $email){

		#delay for few seconds for the loader
		doSleep();

		#Display error
		echo '<h4 class="alert alert-error">Error</h4>';
		echo '<hr>';
		echo 'Invalid password, Enter your password again. ';
		echo 'Password is case Sensitive';
		echo '<hr>';
	}else{
		if($user_exist->mail_validation == 1)
		{
			#delay for few seconds for the loader
			doSleep();

			#Success Class
			echo '<h4 class="alert alert-success">Success</h4>';
			echo '<hr>';
			echo 'Your account has been verified already, ';
			echo 'use the button below to continue your application';
			echo '<br><hr>';
			echo '<a href="index.php" class="btn btn-primary">Continue...</a>';
		}
		else
		{
			$user = new User();		
			$user->id 				= $user_exist->id;
			$user->mail_validation	= 1;
			$user->updated_at 		= $date_now;
			$user->db_fields 		= array('mail_validation', 'updated_at');
			$user->save();
			if($database->affected_rows() == 1)
			{
				#store login to session
				$session->login($user->id);	

				#delay for few seconds for the loader
				doSleep();

				#Sucess for verification
				echo '<h4 class="alert alert-success">Success</h4>';
				echo '<hr>';
				echo 'You have successfully verified your account, to continue your application, use the button below';
				echo '<br><hr>';
				echo '<a href="index.php" class="btn btn-primary">Click Here...</a>';
			}
			else
			{
				#delay for few seconds for the loader
				doSleep();

				#error
				echo '<h4 class="alert alert-error">Error</h4>';
				echo '<hr>';
				echo 'Your account was not verified, Please try again later...';
				echo '<hr>';
			}
		}
	}
?>
