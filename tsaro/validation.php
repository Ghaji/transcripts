<?php
require_once ("../inc/initialize.php");
//checks if admin user is logged in
if(!$session->is_admin_logged_in() || $_SESSION['role'] != 1)
{
	redirect_to('index.php');
}

$role = $_SESSION['role'];
switch ($role) {
	case 1:
		
		break;
	
	default:
		redirect_to('home.php');
		break;
}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>University of Jos, Nigeria</title>
		<?php
		require_once (LIB_PATH . DS . 'css.php');
		?>
	</head>

	<body>

		<!-- beginnning of main content-->
		<!-- header -->
		<?php
			include_layout_template('admin_header.php');
		?>
		<!-- //header -->
		<br>
		<br>

		<!-- Content -->
		<div class="row-fluid">

			<?php
				include_layout_template('admin_menu.php');
			?>

			<div class="span9">
				<h2>Send Email Validation</h2>
                <hr>
                <h3>Note:</h3>
                <ul>
                	<li>This functionality can be used to send validation mail provided the validation mail was not sent at the point of registration</li>
                    <li>To send to multiple people, separate each email address with a comma e.g email1@email1.com, email2@email2.com</li> 
                </ul>
                <form action="" method="POST" class="form-horizontal validationForm" id="validationForm" >
                	<div class="control-group">
                        <label class="control-label" for="inputOpeningDate">Applicant Email:</label>
                        <div class="controls">
                            <div class="input-prepend">
                            <span class="add-on"><i class="icon-envelope"></i></span>
                                <textarea type="text" style="width:300px; height:100px;" id="email" name="email" placeholder="Enter Applicant(s) Email"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="control-group">
					  <div class="controls">  
						<button type="submit" class="btn btn-primary" id="send_mail">Send Mail</button>
				      </div>
					</div>
 
                </form>
			</div>

		</div>
		<!-- //Content -->
		<?php include_layout_template("footer.php"); ?>
	</body>
</html>

<?php
require_once (LIB_PATH . DS . 'javascript.php');
?>
<script src="css/assets/js/bootstrap.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/validationmail.js"></script>
<script type="text/javascript">
</script>
<script type="text/javascript">jQuery('.dropdown-toggle').dropdown();</script>
<div id="displayinfo" class="modal hide" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;">
	<div class="modal-body ajax_data"></div>
	<div class="modal-footer">
		<a href="#" class="btn" id="close">Close</a>
	</div>
</div>