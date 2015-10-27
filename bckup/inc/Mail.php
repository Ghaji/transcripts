<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
// require_once(LIB_PATH.DS.'database.php');
require_once("initialize.php");

class Mail {
	public static function format_email($info, $format) {
		//set the root
		$root = $_SERVER['DOCUMENT_ROOT'].'/mis.unijos.edu.ng/app_transcript_template';

		//grab the template content
		$template = file_get_contents($root.'/mail_templates/signup_template.'.$format);
		
		//replace all the tags
		$template = ereg_replace('{APPLICANT}', "Applicant", $template);
		$template = ereg_replace('{EMAIL}', customEncrypt($info['email']), $template);
		$template = ereg_replace('{KEY}', $info['key'], $template);
		$template = ereg_replace('{SITEPATH}','http://localhost/mis.unijos.edu.ng/app_transcript_template', $template);
			
		//return the html of the template
		return $template;
	}

	//send the welcome letter
	public static function send_email($info) {	
		//format each email
		$body = self::format_email($info,'html');
		$body_plain_txt = self::format_email($info,'txt');

		//setup the mailer
		$transport = Swift_MailTransport::newInstance();
		$mailer = Swift_Mailer::newInstance($transport);
		$message = Swift_Message::newInstance();
		$message ->setSubject('Welcome to University of Jos');
		$message ->setFrom(array('noreply@unijos.edu.ng' => 'University of Jos'));
		$message ->setTo(array($info['email'] => 'Applicant'));
		
		$message ->setBody($body_plain_txt);
		$message ->addPart($body, 'text/html');
				
		$result = $mailer->send($message);
		
		return $result;
	}
}
?>