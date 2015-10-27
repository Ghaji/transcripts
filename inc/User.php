<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class User extends DatabaseObject {
	
	protected static $table_name="personal_details";
	public $db_fields=array('id', 'programme_id', 'matriculation_no', 'title_id', 'full_name', 'gender_id','date_of_birth','email', 'password' ,'phone_number','contact_address','mode_of_entry_id','year_of_graduation','year_of_entry','city_id','state_id','receiving_address','applied','created_at','updated_at', 'last_login','flag','visible', 'mail_validation', 'captcha');
	
	public $id;
	public $programme_id;
	public $matriculation_no;
	public $title_id;
	public $full_name;
	public $gender_id;
	public $date_of_birth;
	public $email;
	public $password;
	public $phone_number;
	public $contact_address;
	public $mode_of_entry_id;
	public $year_of_graduation;
	public $year_of_entry;
	public $city_id;
	public $state_id;
	public $receiving_address;
	public $applied;
	public $created_at;
	public $updated_at;
	public $last_login;
	public $flag;
	public $visible;
	public $mail_validation;
	public $captcha;
	
    /*returns applicant's fullname*/
	public static function fullname($id) {
		$applicant_details = self::find_by_id($id);
		return $applicant_details->full_name;
	}
	
 	/**
   * This is to authentic User from the database
   * Mohammed Ahmed Ghaji
   */
	public static function authenticate($email="", $password="") {
    global $database;
    $email = $database->escape_value($email);
    $password = $database->escape_value($password);

    $sql  = "SELECT * FROM ".self::$table_name;
    $sql .= " WHERE email = '{$email}' ";
    $sql .= "AND password = '{$password}' ";
    $sql .= "LIMIT 1";
    $result_array = self::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
	}

	/**
   * This is to get User Email and Username from the database
   * Mohammed Ahmed Ghaji
   */	
	public function sendVerificationMail()
	{
		//$pop = new POP3();
		
		//$pop->Authorise('mail.unijos.edu.ng', 25, false, 'applicationform@unijos.edu.ng', 'application1234form', 1);
		
		$mail = new PHPMailer();				
		$mail->IsSMTP();
		//$mail->SMTPDebug  = 1;
		$mail->SMTPAuth   = true;                  		// enable SMTP authentication
		$mail->SMTPSecure = "tls";                 		// sets the prefix to the servier
		$mail->Host       = "mail.unijos.edu.ng";       // sets GMAIL as the SMTP server
		$mail->Port       = 25; 
		$mail->Username='applicationform@unijos.edu.ng';
		$mail->Password='application1234form';
		$mail->SetFrom('applicationform@unijos.edu.ng', 'University Of Jos');
		
		$mail->AddReplyTo('applicationform@unijos.edu.ng', 'University of Jos');
		
		$mail->Subject='Verify Mail Address';
		
		
		$verification_link = 'http://'.$_SERVER['HTTP_HOST'].'/app_form_template/verify.php?'.md5('email').'='.customEncrypt($this->email);
			  
$MSG =  '
<style type="text/css">
.codrops-top{
	line-height: 55px;
	font-size: 30px;
	/*background: rgba(255, 255, 255, 0.4);*/
	background:#069;
	/*text-transform: uppercase;*/
	z-index: 9999;
	position: relative;
	box-shadow: 1px 0px 2px rgba(0,0,0,0.2);
}
.codrops-top span.left{
	float: left;
	margin-top:10px;
	margin-left: 20px;
}
.codrops-top span.nxt{
	float: center;
	margin-top:10px;
	/*margin-left: 20px;*/
}
.codrops-top span.right{
	float: center;
}
.message
{
	width:600px;
	min-height:500px;
	padding:10px;
	margin-top:10px;
	margin:auto;
	text-align:justify;
	font-size:16px;
}
.verify_link{
	margin:auto;
	text-align:center;
}
.verify_link a
{
	margin:auto;
	text-decoration:none;
	color:blue;
	font-weight:bold;
	font-size:24px;
}
.verify_link a:hover
{
	color:#f00;
	border-bottom:1px solid #f00;
}

</style>
<div class="codrops-top">
   <span class="left"><img src="http://mis.unijos.edu.ng/images/logo.png" width="80" height="90" alt="University of Jos Logo"></span>
    <span class="right"><center><font color="#FFFFFF">UNIVERSITY OF JOS - NIGERIA</font></center></span>
    <div class="nxt"><center><font color="#FFFFFF">Corporate Information System (CIS)</font></center></div>
    <div class="clr"></div>	
</div>
<div class="message">
	Hi, '.$this->surname.' '.$this->first_name.' '.$this->middle_name.'<br/>
	<p>Thank you for creating an account on University of Jos, Nigeria for application</p>
	<p>Before you can continue your registration you must verify your email address. This is to ensure that the email you provided during your registration was correct</p>
	<p>Use the link below to verify your mail and continue your registration</p>
	<p>Note that if you do not verify your mail after two weeks your account will be deleted</p>
	<div class="verify_link"><a href="'.$verification_link.'">Verify</a></div>
</div>';
		
		$mail->MsgHTML($MSG);
		$mail->AddAddress($this->email, $this->surname.' '.$this->first_name.' '.$this->middle_name);
		
		if(!$mail->Send())
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	public function sendPasswordReset()
	{
		//$pop = new POP3();
		
		//$pop->Authorise('mail.unijos.edu.ng', 25, false, 'applicationform@unijos.edu.ng', 'application1234form', 1);
		
		$mail = new PHPMailer();				
		$mail->IsSMTP();
		//$mail->SMTPDebug  = 1;
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
		$mail->Host       = "mail.unijos.edu.ng";      // sets GMAIL as the SMTP server
		$mail->Port       = 25; 
		$mail->Username='applicationform@unijos.edu.ng';
		$mail->Password='application1234form';
		$mail->SetFrom('applicationform@unijos.edu.ng', 'University Of Jos');
		
		$mail->AddReplyTo('applicationform@unijos.edu.ng', 'University of Jos');
		
		
		$mail->Subject='Password Reset';
		
		$pwdreset_link = 'http://'.$_SERVER['HTTP_HOST'].'/app_form_template/passwordreset.php?'.md5('email').'='.customEncrypt($this->email);
			  
$MSG =  '
<style type="text/css">
.codrops-top{
	line-height: 55px;
	font-size: 30px;
	/*background: rgba(255, 255, 255, 0.4);*/
	background:#069;
	/*text-transform: uppercase;*/
	z-index: 9999;
	position: relative;
	box-shadow: 1px 0px 2px rgba(0,0,0,0.2);
}
.codrops-top span.left{
	float: left;
	margin-top:10px;
	margin-left: 20px;
}
.codrops-top span.nxt{
	float: center;
	margin-top:10px;
	/*margin-left: 20px;*/
}
.codrops-top span.right{
	float: center;
}
.message
{
	width:600px;
	min-height:500px;
	padding:10px;
	margin-top:10px;
	margin:auto;
	text-align:justify;
	font-size:16px;
}
.verify_link{
	margin:auto;
	text-align:center;
}
.verify_link a
{
	margin:auto;
	text-decoration:none;
	color:blue;
	font-weight:bold;
	font-size:24px;
}
.verify_link a:hover
{
	color:#f00;
	border-bottom:1px solid #f00;
}

</style>
<div class="codrops-top">
   <span class="left"><img src="http://mis.unijos.edu.ng/images/logo.png" width="80" height="90" alt="University of Jos Logo"></span>
    <span class="right"><center><font color="#FFFFFF">UNIVERSITY OF JOS - NIGERIA</font></center></span>
    <div class="nxt"><center><font color="#FFFFFF">Corporate Information System (CIS)</font></center></div>
    <div class="clr"></div>	
</div>
<div class="message">
	Hi, '.$this->full_name().'<br/>
	<p>To reset your password, follow the link below</p>
	<p>Note: This link will expire after 48 hours</p>
	<div class="verify_link"><a href="'.$pwdreset_link.'" >Reset Password</a></div>
</div>';

		$mail->MsgHTML($MSG);
		$mail->AddAddress($this->email, $this->full_name());
		//print_r($mail);
		if(!$mail->Send())
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	
	public function registrationConfirmationMail()
	{
		//$pop = new POP3();
		
		//$pop->Authorise('mail.unijos.edu.ng', 25, false, 'applicationform@unijos.edu.ng', 'application1234form', 1);
		
		$mail = new PHPMailer();				
		$mail->IsSMTP();
		//$mail->SMTPDebug  = 1;
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
		$mail->Host       = "mail.unijos.edu.ng";      // sets GMAIL as the SMTP server
		$mail->Port       = 25; 
		$mail->Username='applicationform@unijos.edu.ng';
		$mail->Password='application1234form';
		$mail->SetFrom('applicationform@unijos.edu.ng', 'University Of Jos');
		
		$mail->AddReplyTo('applicationform@unijos.edu.ng', 'University of Jos');
		
		$mail->Subject='Registration Confirmation';
		
		$verification_link = 'http://'.$_SERVER['HTTP_HOST'].'/app_form_template/verify.php?'.md5('email').'='.customEncrypt($this->email);
			  
$MSG =  '
<style type="text/css">
.codrops-top{
	line-height: 55px;
	font-size: 30px;
	/*background: rgba(255, 255, 255, 0.4);*/
	background:#069;
	/*text-transform: uppercase;*/
	z-index: 9999;
	position: relative;
	box-shadow: 1px 0px 2px rgba(0,0,0,0.2);
}
.codrops-top span.left{
	float: left;
	margin-top:10px;
	margin-left: 20px;
}
.codrops-top span.nxt{
	float: center;
	margin-top:10px;
	/*margin-left: 20px;*/
}
.codrops-top span.right{
	float: center;
}
.message
{
	width:600px;
	min-height:500px;
	padding:10px;
	margin-top:10px;
	margin:auto;
	text-align:justify;
	font-size:16px;
}
.verify_link{
	margin:auto;
	text-align:center;
}
.verify_link a
{
	margin:auto;
	text-decoration:none;
	color:blue;
	font-weight:bold;
	font-size:24px;
}
.verify_link a:hover
{
	color:#f00;
	border-bottom:1px solid #f00;
}

</style>
<div class="codrops-top">
   <span class="left"><img src="http://mis.unijos.edu.ng/images/logo.png" width="80" height="90" alt="University of Jos Logo"></span>
    <span class="right"><center><font color="#FFFFFF">UNIVERSITY OF JOS - NIGERIA</font></center></span>
    <div class="nxt"><center><font color="#FFFFFF">Corporate Information System (CIS)</font></center></div>
    <div class="clr"></div>	
</div>
<div class="message">
	Hi, '.$this->surname.' '.$this->first_name.' '.$this->middle_name.'<br/>
	<p>Thank you for completing your registration for admission into University of Jos, Jos Nigeria.</p>
	<p>This is a confirmation email that your application into University of Jos has been received, you can always login to track your admission status.</p>
	<p>Thank you once more for applying into University of Jos, Jos Nigeria</p>
</div>';

		$mail->MsgHTML($MSG);
		$mail->AddAddress($this->email, $this->surname.' '.$this->first_name.' '.$this->middle_name);
		
		if(!$mail->Send())
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	# Get last login
	public function getLastLogin() {
		if(isset($this->last_login)) {
			return $this->last_login;
		}
	}	
}
?>