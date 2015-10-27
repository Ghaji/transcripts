<?php 
    require_once("inc/initialize.php");
    require_once("inc/remita_functions.php");

    $session = new Session();

    # Get user details
    $user = User::find_by_id($session->id);
  
    if(!$session->is_logged_in()) {
       redirect_to("index.php");
    }

    if(!isset($_SESSION["transaction_id"])) {
        redirect_to("index.php");
    }
  
    # Get transaction details (for transaction stored in session) from remita
    $transctiondetails = remita_transaction_details($_SESSION["transaction_id"]);

    # Unset transaction id session variable
    if(isset($_SESSION["transaction_id"])) {
        unset($_SESSION["transaction_id"]);
    }

    # Unset type id session variable
    if(isset($_SESSION["type_id"])) {
        $type_id = $_SESSION["type_id"];
        unset($_SESSION["type_id"]);
    }

    # Unset mode id session variable
    if(isset($_SESSION["mode_id"])) {
        $mode_id = $_SESSION["mode_id"];
        unset($_SESSION["mode_id"]);
    }

    # Unset city_or_state session variable
    if(isset($_SESSION["city_or_state"])) {
        $city_or_state = $_SESSION["city_or_state"];
        unset($_SESSION["city_or_state"]);
    }

    # Unset lga id session variable
    if(isset($_SESSION["lga_id"])) {
        $lga_id = $_SESSION["lga_id"];
        unset($_SESSION["lga_id"]);
    }
    
    // print_r($transctiondetails);
    // die();

    $orderId                = $transctiondetails["orderId"];
    $tranxTime              = $transctiondetails["transactiontime"];
    $RRR                    = $transctiondetails["RRR"];
    $ResponseCode           = $transctiondetails["status"];
    $ResponseDescription    = $transctiondetails["message"];

    # Instance of Acceptance
    $acc = new AcceptanceLog();

    # Get id, Amount, student_id for acceptance_log record 
    $sql_acceptance_log = "SELECT id, Amount, student_id FROM `acceptance_log` WHERE student_id='".$orderId."'";
    $acceptance_log = $acc->find_by_sql($sql_acceptance_log);
    $log = array_shift($acceptance_log);

    $amount         = $log->Amount;
    $acc_id         = $log->id;
    $application_no = $log->student_id;
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
            @media print {
                .noprint{display:none}
                .imgg{
                    margin-top:-400px; 
                    opacity:0.1; 
                    width:200px; 
                    display:inline-block !important;
                }
            }
            /*.imgg{display:none;}*/
            .imgg{
                margin-top: -300px; 
                margin-left: 230px; 
                opacity: 0.1; 
                width: 200px; 
                display:inline-block !important;
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
                  <!-- beginnning of main content -->
                    <?php
                        # ------------- Update acceptance_log table ----------------------------  
                        # Instance of Acceptance
                        $acceptance = new AcceptanceLog();  
                        $acceptance->db_fields = array('ResponseCode', 'ResponseDescription');

                        # Assign properties to acceptance_log object in preperation for log update    
                        $acceptance->ResponseCode           = $ResponseCode;
                        $acceptance->ResponseDescription    = $ResponseDescription;
                        
                        if(!empty($acc_id)){
                            $acceptance->id                 = $acc_id;
                        }

                        # Save Record into Table acceptance_log
                        $acceptance->save(); 

                        if($transctiondetails['message'] == 'Approved' && $transctiondetails['status'] == '01' || $transctiondetails['status'] == '00') {
                            $sql = "SELECT * FROM `adm_access_code` WHERE `jamb_rem_no`='".$orderId."'";
                            $payment = AdmAccess::find_by_sql($sql);
                            $payment_record = array_shift($payment);

                            # Check payment record to avoid duplicate entry into adm_access_code table on page refresh
                            if(empty($payment_record)) {
                                # ------------- Update adm_access_code table ---------------------------- 

                                # Instance of AdmAccess
                                $adm = new AdmAccess();
                              
                                $adm->jamb_rem_no   = $application_no;
                                $adm->amount        = $amount;
                                $adm->payment_date  = $tranxTime;
                                $adm->payment_code  = $RRR;
                                $adm->reg_num       = $application_no;
                                $adm->pin           = $orderId;
                                $adm->full_name     = $user->full_name;
                                
                                # Save record into adm_access_code table
                                $adm->save();
                                
                                # ------------- Update app_histories table ----------------------------  
                                # Instance of AppHistory
                                $application_history = new AppHistory();
                                
                                $application_history->application_no = $application_no;
                                $application_history->applicant_id   = $session->id;
                                $application_history->type_id = $type_id;
                                $application_history->mode_id = $mode_id;
                                $application_history->city_or_state = $city_or_state;

                                # Save record into app_histories table
                                $application_history->save();   
                            }
                    ?>
                            <h4><p class="label label-info">Payment Confirmation for Transcript Form</p></h4>
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr class="rowlink">
                                        <td>Name</td>
                                        <td><?php echo $user->full_name; ?></td>
                                    </tr>
                                </thead>
                                <tbody data-provides="rowlink">
                                    <tr>
                                        <td>Form Number</td>
                                        <td><?php echo $application_no; ?></td>
                                    </tr>
                                    <tr class="rowlink">
                                        <td>Access Code</td>
                                        <td><?php echo $orderId; ?></td>
                                    </tr>
                                    <tr class="rowlink">
                                        <td>Transaction Time</td>
                                        <td><?php echo $tranxTime; ?></td>
                                    </tr>
                                    <tr class="rowlink">
                                        <td>Amount</td>
                                        <td><?php echo "&#8358;".$amount; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <center>
                                <a href='<?php echo "apply.php?app_no=".customEncrypt($application_no); ?>' class='btn btn-success'>CONTINUE WITH APPLICATION</a>
                                <a href='<?php echo "invoice.php?tranx_no=".customEncrypt($orderId); ?>' class='btn btn-primary'>CLICK HERE TO PRINT YOUR INVOICE</a>
                            </center>            
                            <img src='images/logo.png' class='imgg'>
                    <?php
                        } else {
                    ?>
                            <h4><p class="label label-info">Payment Failed</p></h4>
                            <table class="table table-hover table-striped table-bordered">
                                <tbody data-provides="rowlink">
                                    <tr class="rowlink">
                                        <td>The Payment with Transaction ID: </td>
                                        <td><?php $msg = $transctiondetails['orderId']; echo output_message($msg); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                    <?php
                        }
                    ?>
                  <!-- end of main content -->
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