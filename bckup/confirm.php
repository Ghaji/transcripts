<?php
    require_once("inc/initialize.php");

    if (!$session->is_logged_in()) {
    	 redirect_to("index.php");
    }

    # Instance of user class
    $user = User::find_by_id($session->id);

    # Get application history form app_histories table
    $sql_history = "SELECT * FROM app_histories WHERE applicant_id =".$user->id." and application_flag = 0";
    $history_details = AppHistory::find_by_sql($sql_history);
    $app_history_details = array_shift($history_details);
    $application_no = $app_history_details->application_no;
    
    # Check if the application history exist
    if (empty($app_history_details)) {
        redirect_to("payment.php");
    } else {
        # Get adm payment details from adm_access_code table
        $sql_adm = "SELECT * FROM adm_access_code WHERE jamb_rem_no ='".$app_history_details->application_no."'";
        $adm_details = AdmAccess::find_by_sql($sql_adm);

        # Check if payment details exist
        if (empty($adm_details)) {
            redirect_to("payment.php");
        }
    }    
?> 
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>University of Jos, Nigeria - Transcript System</title>
<?php 
	require_once(LIB_PATH.DS.'javascript.php');
	require_once(LIB_PATH.DS.'css.php');
?>
<style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
</style>
</head>
<body>
    <!-- beginnning of main content-->
    <?php include_layout_template("header_home.php"); ?>

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span3">
                <?php include_layout_template("left_menu.php"); ?>
            </div><!--/span-->
            <div class="span8">
                <div class="hero-unit">
                    <h4 align="center">Where do you want to go?</h4>
                    <hr class="line">
                    <center>
                        <a class="btn btn-danger" href="payment.php">Pay for New Form</a>
                        <a class="btn btn-success" href="<?php echo "apply.php?app_no=".customEncrypt($application_no); ?>">Continue Transcript Application</a>
                    </center>
                    <hr class="line">
                </div>    
            </div><!--/span-->
        </div><!--/row-->
    </div><!--/.fluid-container--> 
    <div id="displayinfo" class="modal hide" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;">
        <div class="modal-body ajax_data"></div>
        <div class="modal-footer">
            <a href="#" class="btn" id="close">Close</a>
        </div> 
    </div>
    <!--The Main Content Here Please-->
    <?php include_layout_template("footer.php"); ?>

    <script src="js/jquery.js"></script>
    <script src="css/assets/js/bootstrap.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script type="text/javascript">
        jQuery.noConflict();
        jQuery(document).ready(function(){
            jQuery('.printbtn').click(function(){
                window.print();
            });
        });
    </script>
    <script type="text/javascript">jQuery('.dropdown-toggle').dropdown();</script>
</body>
</html>