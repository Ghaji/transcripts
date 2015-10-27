<?php
    require_once("inc/initialize.php");
    require_once("inc/vendor/autoload.php");

    use Carbon\Carbon;
    
    # Instance of Carbon Class with the current time
    $date_now = new Carbon('now');

    if(!$session->is_logged_in()) {
    	redirect_to("index.php");
    }

    # Instance of user
    $user = User::find_by_id($session->id);
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
                        <?php include_layout_template("application_feedback.php"); ?>
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
        <script src="js/application_feedback.js"></script>
        <script type="text/javascript">
            jQuery.noConflict();
            jQuery(document).ready(function(){
                jQuery('.printbtn').click(function(){
                    window.print();
                });
            });
        </script>
        <script type="text/javascript">jQuery('.dropdown-toggle').dropdown();</script>
        <script type="text/javascript">
            $(document).ready(function() {
                var text_max = 200;
                $('#textarea_feedback').html(text_max + ' characters remaining');

                $('#comment').keyup(function() {
                    var text_length = $('#comment').val().length;
                    var text_remaining = text_max - text_length;
                    $('#textarea_feedback').html(text_remaining + ' <i class="iconic-bars"> </i>    characters remaining' );
                });
            });
        </script>
    </body>
</html>