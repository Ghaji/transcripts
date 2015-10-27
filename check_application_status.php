<?php
    require_once("inc/initialize.php");
    require_once("inc/vendor/autoload.php");

    use Carbon\Carbon;

    if(!$session->is_logged_in()) {
        redirect_to("index.php");
    }
    
    # Instance of Carbon Class with the current time
    $date_now = new Carbon('now');
    
    $label = customDecrypt($_GET['app']);
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
                        <h4><p class="label label-info">Application Processing Status of <?php echo $label?></p></h4>
                        <?php 
                            # Get current status on an anplication
                            if($label) {
                                $status_sql = "SELECT * FROM `applicant_status` WHERE application_no =
                                 '".$label."'  ORDER BY status_id DESC Limit 1";
                                $application_status = ApplicantStatus::find_by_sql($status_sql);
                                $application_status_final = array_shift($application_status);
                                
                                switch ($application_status_final->status_id) {
                                    case 1:
                                        $status_label = '  <div class="progress">
                                                              <div class="bar bar-danger" style="width: 25%;"></div>
                                                             
                                                           </div>';
                                        $passentage=25;                   
                                        break;
                                    case 2:
                                        $status_label = ' <div class="progress">
                                                              <div class="bar bar-success" style="width: 25%;"></div>
                                                              <div class="bar bar-infor" style="width: 25%;"></div>
                                                             
                                                           </div>';
                                        $passentage=50; 
                                        break;
                                    case 3:
                                        $status_label = ' <div class="progress">
                                                              <div class="bar bar-success" style="width: 25%;"></div>
                                                              <div class="bar bar-infor" style="width: 25%;"></div>
                                                              <div class="bar bar-warning" style="width: 25%;"></div>
                                                           </div>';
                                        $passentage=75; 
                                        break;
                                    case 4:
                                        $status_label = ' <div class="progress">
                                                              <div class="bar bar-success" style="width: 25%;"></div>
                                                              <div class="bar bar-infor" style="width: 25%;"></div>
                                                              <div class="bar bar-warning" style="width: 25%;"></div>
                                                              <div class="bar bar-danger" style="width: 25%;"></div>
                                                           </div>';
                                        $passentage=100; 
                                        break;
                                    default:
                                        $status_label = '<span class="label label-important">Pending</span> 
                                                         <div class="progress progress-striped active">
                                                             <div class="bar" style="width: 0%;"></div>
                                                          </div>';
                                        $passentage=0; 
                                        break;
                                }
                        ?>        
                                <table class="table table-hover table-striped table-bordered">
                                    <thead>
                                            <tr>
                                              <th>Approved</th>
                                              <th>Prepaid</th>
                                              <th>Verified</th>
                                              <th>Dispach</th>
                                            </tr>
                                    </thead>
                                    <tbody data-provides="rowlink">
                                            <tr class="rowlink">
                                                <td colspan="4" ><?php if(isset($status_label)) echo $status_label; ?></td>
                                            </tr>
                                            <tr>
                                               <span class="label label-success"><?php  echo $passentage; ?> %</span>
                                            </tr>  
                                    </tbody>                            
                                </table>
                                     
                                <!-- get the staff name from approval to dispache -->
                                <table width="100%">
                                    <tr>
                                        <td width="25%"></td>
                                        <td width="25%"></td>
                                        <td width="50%"colspan="2"></td>   
                                    </tr>
                                   
                                   <tbody>
                                        </tr> 
                                            <?php 
                                                $sql_staff = "SELECT * FROM `applicant_status`
                                                WHERE `application_no` = '".$label."'
                                                ORDER BY status_id ASC Limit 4";
                                                $process = ApplicantStatus::find_by_sql($sql_staff); 
                                                     
                                                foreach ($process as $app_status) {
                                                    if(isset($app_status->status_id) && !empty($app_status->status_id)) {
                                                        $staff=AdminUsers::find_by_id($app_status->admin_id);
                                                
                                                        $msg= ' <td style=""><i class="icon-user"> </i> by '.$staff->admin_name.'</td>';
                                                        echo output_message($msg);
                                                    }
                                                }
                                            ?>  
                                       </tr> 
                                   </tbody>
                                </table>
                        <?php
                            }  
                        ?>
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