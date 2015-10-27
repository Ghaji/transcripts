<?php
    require_once("inc/initialize.php");
    require_once("inc/vendor/autoload.php");

    use Carbon\Carbon;

    if(!$session->is_logged_in()) {
        redirect_to("index.php");
    }
    
    # Instance of Carbon Class with the current time
    $date_now = new Carbon('now');
    
    $label=customDecrypt($_GET['app']);
    if($label) {
        // $database = new MySQLDatabase();
        // $sql_user_details="SELECT * from app_histories aph Join adm_access_code adm, applicant_status aps WHERE aph.application_no = '".$label."' AND  adm.application_no=aph.application_no  AND aps.application_no= aph.application_no";
        // $user_history=$database->query($sql_user_details);
        // $myhistory = $database->fetch_array($user_history);

        $sql_app  = "SELECT * FROM `app_histories` WHERE `application_no` = '".$label."'";
        $application= AppHistory::find_by_sql($sql_app);
        $myapp= array_shift($application);

        $sql_amount  = "SELECT * FROM `adm_access_code` WHERE `jamb_rem_no` = '".$label."'";
        $transaction=AdmAccess::find_by_sql($sql_amount);
        $amount= array_shift($transaction);


        $sql = "SELECT * FROM `applicant_status` WHERE `application_no` = '".$label."'";

        $process = ApplicantStatus::find_by_sql($sql);   
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
                    <h4> <p class="label label-info">Application Details </p> </h4>
                    <table class="table table-hover table-striped table-bordered">
                        <tbody>
                            <tr>   
                                  <td><i class="iconic-hash"> </i> Application Number : </td>
                                  <td colspan="2"><span class="label label-success"><?php echo $label; ?></span></td>
                            </tr>
                            <tr>   
                                  <?php $type=DeliveryType::find_by_id($myapp->type_id) ;?>
                                  <td><i class="icon-tasks"> </i> Service Type : </td>
                                  <td colspan="2"><span class="label label-success"><?php echo $type->dt_name; ?> </span></td>
                            </tr>
                            <tr>
                                  <?php $mode=DeliveryMode::find_by_id($myapp->mode_id) ;?>
                                  <td><i class="icon-road"></i> Delivery Mode : </td>
                                  <td colspan="2"><span class="label label-success"><?php echo $mode->dm_type; ?></span></td>
                            </tr>
                            <tr>
                                  <td><i class="">&#8358</i> Amount :  </td>
                                  <td colspan="2"><span class="label label-success">&#8358 <?php echo $amount->amount; ?></span></td>
                            </tr>
                            <tr>        
                                  <td><i class="icon-calendar"></i> Payment Date:</td>
                                  <td colspan="2"><?php echo $amount->payment_date; ?></td>
                            </tr>
                            <tr>   
                                  <td><i class="icon-home"></i> Receiving Address:</td>
                                  <td colspan="2"><?php echo $myapp->receiving_address; ?></td>
                            </tr>                            
                        <?php
                        if(!empty($process)) {
                            echo '
                                <tr>
                                    <td colspan="3"><h3>Processing Details</h3></td>
                                </tr>
                            ';
                            foreach ($process as $app_status) {
                                if(isset($app_status->status_id) && !empty($app_status->status_id)) {
                                    $staff=AdminUsers::find_by_id($app_status->admin_id);
                                    $company=DeliveryCompany::find_by_id($app_status->delivery_company_id);
                                    
                                    switch ($app_status->status_id) {
                                        case 1:
                                            echo '<tr>
                                                      <td><i class="icon-filter"></i>  Approved by:</td>
                                                      <td><i class="icon-user"></i>  '.$staff->admin_name.'</td>
                                                      <td>Date :  <i class="icon-calendar"></i> '.$app_status->updated_at.'</td>
                                                  </tr>
                                                  ';
                                            break;
                                        case 2:
                                            echo '<tr>
                                                      <td><i class="icon-thumbs-up"></i>  Prepaid by:</td>
                                                      <td><i class="icon-user"></i>  '.$staff->admin_name.'</td>
                                                      <td>Date :  <i class="icon-calendar"></i> '.$app_status->updated_at.'</td>
                                                  </tr>
                                                  ';
                                            break;
                                        case 3:
                                            echo '<tr>
                                                      <td><i class="icon-certificate"></i> Verified by:</td>
                                                      <td><i class="icon-user"></i>  '.$staff->admin_name.'</td>
                                                      <td>Date :  <i class="icon-calendar"></i> '.$app_status->updated_at.'</td>
                                                  </tr>
                                                  ';
                                            break;
                                        case 4:
                                            echo '<tr>
                                                      <td><i class="icon-envelope"></i>  Dispach by:</td>
                                                      <td><i class="icon-user"></i>  '.$staff->admin_name.'</td>
                                                      <td>Date :  <i class="icon-calendar"></i> '.$app_status->updated_at.'</td>
                                                  </tr>
                                                  <tr>
                                                      <td><i class="icon-plane"></i>  Company</td>
                                                      <td colspan="2"><span class="label label-success">'.$company->delivery_company_name.'</span></td>
                                                  </tr>
                                                  <tr>
                                                      <td><i class="icon-qrcode"></i> Tracking Id</td>
                                                      <td colspan="2"><span class="label label-success">'.$app_status->tracking_id.'</span></td>
                                                  </tr>';
                                            break;
                                   }
                                }
                        ?>
                        <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
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