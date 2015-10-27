<?php
	require_once("../inc/initialize.php");
	require_once("../inc/vendor/autoload.php");

	use Carbon\Carbon;
 	
 	# Instance of Carbon Class with the current time
	$date_now = new Carbon('now');
	
	$full_name = htmlspecialchars($_POST['full_name'], ENT_QUOTES);
	$email = htmlspecialchars($_POST['email'], ENT_QUOTES);
	$phone_number = htmlspecialchars($_POST['phone'], ENT_QUOTES);
	$captcha = htmlspecialchars($_POST['captcha'], ENT_QUOTES);
	
	#checks if an account with the email & phone number already exists
	$sql  = "SELECT * FROM `personal_details` WHERE `email`='".$email."' OR `phone_number`= '".$phone_number."' LIMIT 1";

	$user_exists = User::find_by_sql($sql);

	foreach ($user_exists as $user_exist) {	
		$user_exist->email;
		$user_exist->phone_number;
		$user_exist->password;
	}
	
	if (isset($user_exist->email) && $user_exist->email == $email) {
		
		sleep(2);
		echo '<h4 class="alert alert-error">Error</h4>';
		echo '<hr>';
		echo "The E-mail:<font color='#FF0000'>'" . $user_exist->email  . "'</font> already exist in our database";
		echo '<br>';
		echo 'Use the Close Button to Continue';
		echo '<hr>';
	
	} elseif(isset($user_exist->phone_number) && $user_exist->phone_number == $phone_number) {
		
		sleep(2);
		echo '<h4 class="alert alert-error">Error</h4>';
		echo '<hr>';
		echo "The Phone Number:<font color='#FF0000'> '" . $user_exist->phone_number . "'</font> already exist in our database";
		echo '<br>';
		echo 'Use the Close Button to Continue';
		echo '<hr>';	  
	
	} elseif(isset($user_exist->captcha) && $user_exist->captcha == $captcha) {
		
		sleep(2);
		echo '<h4 class="alert alert-error">Error</h4>';
		echo '<hr>';
		echo "The Captcha:<font color='#FF0000'> '" . $user_exist->captcha . "'</font> already exist in our database";
		echo '<br>';
		echo 'Use the Close Button to Continue';
		echo '<hr>';	  
	
	} else {
	
		$user = new User();
		$user->full_name 	= htmlspecialchars($_POST['full_name'],ENT_QUOTES);
		$user->email 		= htmlspecialchars($_POST['email'],ENT_QUOTES);
		$user->password 	= htmlspecialchars(md5($_POST['epassword']),ENT_QUOTES);
		$user->phone_number	= htmlspecialchars($_POST['phone'],ENT_QUOTES);
		$user->captcha		= htmlspecialchars($_POST['captcha'],ENT_QUOTES);
		$user->created_at 	= $date_now;
		
		if ($user->password == md5('pass') || $user->password == md5('password')) {
			sleep(2);
			echo '<h4 class="alert alert-info">Information</h4>';
			echo '<hr>';
			echo 'The password you entered is too predictable. ';
			echo 'Please use the close button to close the window and change your password before you can continue. ';
			echo '<hr>';
		} else {
			//create a random key
			$key = $user->email . $user->phone_number . $date_now;
			$key = sha1(md5($key));

			//put info into an array to send to the function
			$info = array(
				'email' => $user->email,
				'phone_number' => $user->phone_number,
				'key' => $key);

			$user->save();
		  
			if ($database->affected_rows() == 1) {
				
				$send_mail = Mail::send_email($info);
				
				if ($send_mail) {
					sleep(2);
					echo '<h4 class="alert alert-success">Success</h4>';
					echo '<hr>';
					echo "The information for user with email address <font color=#0000FF>" . $user->email . "</font> has been successfully saved.<br>";
					echo "Check your email for a verification link, if you do not find it in inbox, check your spam.<br>";
					echo "Use the close botton to go back and continue.";
					echo '<br>';
					echo '<hr>';
					echo '<a href="select_form.php" class="btn btn-primary">Proceed</a>';
					
				} else {
					sleep(2);
					echo '<h4 class="alert alert-info">Information</h4>';
					echo '<hr>';
					echo 'Your information has been successfully saved but activation mail was not sent.<br>';

					echo 'Please contact us at <span class="label label-success">support@unijos.edu.ng</span> for further enquiries';
					echo '<br>';
					echo '<a href="register.php" class="btn btn-primary">Proceed</a>';
				}
			 
			} else {
				  
				  sleep(2);
				  echo '<h4 class="alert alert-info">Information</h4>';
				  echo '<hr>';
				  echo 'Your information cannot be saved at this time.<br>';
				  echo 'Please contact us at <span class="label label-info">support@unijos.edu.ng</span> for further enquiries';
				  
				  echo '<a href="register.php" class="btn btn-primary">Proceed</a>';
			}
		}
	}	
?>