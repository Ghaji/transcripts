<?php require_once("inc/initialize.php");
	//checks if user is logged in 
	$session->logout();
	
	$settings = new Settings();
	
	if($session->is_logged_in())
	{
		redirect_to('home.php');
	}

	$header_bg_color = "#069";
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>University of Jos, Nigeria</title>
<?php require_once(LIB_PATH.DS.'css.php'); ?>
</head>
<body>
<?php include_layout_template("header.php"); ?>
<!-- beginnning of main content-->
<div class="container">
	<div class="row-fluid">
		<div class="span7" >
		<h4>University of Jos Online Transcript Portal</h4>
        <hr>

      	<h3><i class="icon-bullhorn"></i> NEWS</h3>
        <!-- # New Content Here -->

          <?php include_layout_template('news_details.php'); ?>

        <!-- # End of News Content -->
      
        	<h3><i class="icon-certificate"></i> Important Notice</h3>
           <?php //include_layout_template("requrement_details.php"); ?>
		</div>
		<div class="span5">

		<?php
			if($settings->isApplicationOpen())
				$status = true;
			else 
				$status=false;
		?>
		<?php

			if(!$status){
				
				echo '<h5 align="center"><p><span style="color: #F00; font-weight: bold;"><i class="iconic-o-x"></i> Application Under Maintenance Please Bear with us.</span></p></h5>';
				echo '<hr>';
				
			}else{
				//echo '<h5 align="center"><p><span style="color: green; font-weight: bold; text-shadow: 1px 1px 4px #F89406"><i class="iconic-o-check"></i> Application Currently on</span></p></h5>';
				//echo $settings->getApplicationCloseDate();

		?>

		<div class="create">
				
                <h5 align="center">Start Application</h5>
                <hr>
				<p class="pad">If you are a new applicant, you need to first create an account to obtain an 
				<span style="color: #090; font-weight: bold; ">
				<i class="iconic-o-check" style="color: #51A351"></i> Account  </span> 
				which you will use to apply and pay for your transcript application online.</p>
                
                    <form class="form-horizontal" action="register.php" >
                      
                        <div class="control-group">
                        <label class="control-label" ></label>
                        <div class="controls">
                        <button type="submit" class="btn btn-primary"> <i class="iconic-plus"></i> Create Account</button>
                          
                        </div>
                      </div>
                    </form>
				
                
               <br>
		</div>
        
        <div class="create">
			<?php
				include_layout_template("login.php");
			?>
		</div>

		<?php
			}
		?>	
		</div>
	</div>
</div>
<?php include_layout_template("footer.php"); ?>

</body>
</html>

<?php require_once(LIB_PATH.DS.'javascript.php'); ?>
<script src="js/jquery.js"></script>
<script src="css/assets/js/bootstrap.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/log.js"></script>




 