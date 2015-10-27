<?php
    require_once("inc/initialize.php");
    require_once("inc/vendor/autoload.php");

    use Carbon\Carbon;
    
    // Instance of Carbon Class with the current time
    $date_now = new Carbon('now');

    if(!$session->is_logged_in()) {
        redirect_to("index.php");
    }

    $user = User::find_by_id($session->id);

    if(isset($user->full_name) && !empty($user->full_name)) {
        $label = ucfirst($user->full_name);

        $msg  = '<div class="alert alert-success">';
        $msg .= 'You have completed your application Successful, that\'s not all you can also login at any time to check ';
        $msg .= 'the status of your application, application history, payment history, send us feedback etc.';
        $msg .= '</div>';

    } else {
        $label = 'Applicant';

        $msg  = '<div class="alert alert-info">';
        $msg .= 'You have not completed your application yet, use the apply button by your left menu to apply.';
        $msg .= 'You can also get your matriculation number if you have forgotten, or use the notification link at the top menu';
        $msg .= 'to do that, you can also send a feedback to us so that we can improve.';
        $msg .= '</div>';
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
                <div class="span9">
                    <div class="hero-unit">
                        <h3><img src="passport/74.jpg" width="104px" height="100px" class="img-circle"> Welcome, <i><small><?php echo $label; ?>.</small></i></h3>

                        <p><?php echo output_message($msg); ?></p>
                        <p><a class="btn btn-primary btn-large">Learn more &raquo;</a></p>
                        <p><span class="label label-info">Last account activity</span>: <?php echo Carbon::createFromTimeStamp(strtotime($user->getLastLogin()))->diffForHumans(); ?></p>
                    </div>
                    <div class="row-fluid">
                        <div class="span6">
                            <h2>Application Status</h2>
                            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                            <p><a class="btn" href="application_status.php">View details &raquo;</a></p>
                        </div><!--/span-->
                        <div class="span6">
                            <h2>Application History</h2>
                            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                            <p><a class="btn" href="application_history.php">View details &raquo;</a></p>
                        </div><!--/span-->
                    </div><!--/row-->
                    <div class="row-fluid">
                        <div class="span6">
                            <h2>Payment Status</h2>
                            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                            <p><a class="btn" href="#">View details &raquo;</a></p>
                        </div><!--/span-->
                        <div class="span6">
                            <h2>Payment History</h2>
                            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                            <p><a class="btn" href="payment_history.php">View details &raquo;</a></p>
                        </div><!--/span--> 
                    </div><!--/row-->
                </div><!--/span-->
            </div><!--/row-->
        </div><!--/.fluid-container--> 

        <!-- <div class="offset10">
            <p><span class="label label-info">Last account activity</span>: <?php // echo Carbon::createFromTimeStamp(strtotime($user->getLastLogin()))->diffForHumans(); ?></p>
        </div> -->

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