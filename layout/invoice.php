<?php
    require_once("inc/initialize.php"); 

    if( isset($_GET["tranx_no"]) && !empty($_GET["tranx_no"]) ) {
        $orderId = customDecrypt($_GET["tranx_no"]);
    } else {
        redirect_to('home.php');
    }

    # Instance of MySQL Database
    $database = new MySQLDatabase();

    # Instance of Session
    $session = new Session();

    # User details
    $user = User::find_by_id($session->id);

    # Set QR Code to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = 'inc/qrcode/temp/';

    # HTML PNG location prefix
    $PNG_WEB_DIR = 'inc/qrcode/temp/';

    # QR Code Library
    include "inc/qrcode/qrlib.php";    

    # ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);

    # QR Code properties
    $errorCorrectionLevel = 'H';
    $matrixPointSize = 4;

    # Get payment record for an application form
    // $sql = "SELECT * FROM `adm_access_code` WHERE `jamb_rem_no`='".$orderId."' AND `reg_num`='".$orderId."'";
    $sql = "SELECT * FROM `adm_access_code` WHERE `jamb_rem_no`='".$orderId."'";
    $payment = AdmAccess::find_by_sql($sql);
    $payment_record = array_shift($payment);

    # Redirect applicant to make payment if no user is found
    if(empty($payment_record)) {
        redirect_to('payment.php');
    }

    # Get log record for payment
    $sql_log = "SELECT * FROM `acceptance_log` WHERE `student_id` = '".$orderId."'";
    $log_payment = AcceptanceLog::find_by_sql($sql_log);
    $log = array_shift($log_payment);
    $payment_breakdown = unserialize($log->returned_paymentreference);
            
    // $naira = &#8358; 
    # Data to be inserted into QR Code
    $data = $user->full_name;
    $data .= ' '. $orderId .' '. $payment_record->amount;

    # QR Code image path on server
    $filename = $PNG_TEMP_DIR.$orderId.md5($errorCorrectionLevel.'|'.$matrixPointSize.'|'.$orderId).'.png';
    
    # Create QR Code
    QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
    $imgqrcode = '<img src="'.$PNG_WEB_DIR.basename($filename).'" />';
?>
<section class="slice">
    <!-- Invoice wrapper -->
    <div id="invoice" class="paid">
        <div class="this-is" style="margin-bottom: 10px;">
            <strong>TRANSCRIPT FORM INVOICE FOR TRANSACTION <?php echo $orderId; ?></strong>
        </div>

        <header id="header">
            <table width="100%">
                <tr>
                    <td>
                        <div class="invoice-intro">
                            <h1>
                                <img style="height:110px;" src="images/logo.png">
                            </h1>
                        </div>
                    </td>
                    <td width="70%">
                        <dl class="invoice-meta">
                            <dt class="invoice-number">Transaction #</dt>
                            <dd><?php echo $orderId; ?></dd>
                            <dt class="invoice-date">Date</dt>
                            <dd><?php echo date('m-d-Y', strtotime($payment_record->payment_date)); ?></dd>
                        </dl>
                    </td>
                </tr>
            </table>
        </header>

        <table width="100%">
            <tr>
                <th align="left"><h2>Invoice To:</h2></th>
                <th align="left"><h2>Invoice From:</h2></th>
                <th align="left"><h3>Invoice Status</h3></th>
            </tr>
            <tr>
                <td>
                    <div>
                        <div id="hcard-Hiram-Roth" class="vcard">
                            <a class="url fn">
                                <?php echo $user->full_name; ?>
                            </a>
                            <div class="org"><?php //echo $programmedetails['form_id']; ?></div>
                            <div><?php echo $payment_record->pin; ?></div>
                            <div class="adr">
                                <div><?php echo $payment_record->payment_code; ?></div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div>                        
                        <div id="hcard-Admiral-Valdore" class="vcard">
                            <div class="org">University of Jos </div>
                            <a class="email">PMB 2084 Jos, Jos.</a>
                            <div class="adr">
                                <div>Plateau State</div>
                                <div>Nigeria</div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div style="background: #008000; background: rgba(122,185,0,0.7); float:left;width:40%;padding-left: 5%; color: #fff;">
                        <strong>Invoice is <em>Paid</em></strong>
                    </div>
                </td>
            </tr>
        </table>

        <section class="invoice-financials" style="margin-top: 10px;">
            <div class="invoice-items">
                <table class="table table-striped">
                    <caption>Your Invoice</caption>
                    <thead>
                        <tr>
                            <th>Item Description</th>
                            <th>Price (&#8358;)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Processing Fee</th>
                            <td>&#8358;<?php echo $payment_breakdown['Processing Fee'].'.00'; ?></td>
                        </tr>
                    <?php
                        if(isset($payment_breakdown['Postage Charge']) && !empty($payment_breakdown['Postage Charge'])) {
                    ?>
                        <tr>
                            <th>Postal Charge</th>
                            <td>&#8358;<?php echo $payment_breakdown['Postage Charge'].'.00'; ?></td>
                        </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="invoice-totals">
                <table>
                    <caption>Totals:</caption>
                    <tbody>
                        <tr>
                            <th>Subtotal:</th>
                            <td>&#8358;<?php echo ($payment_record->amount - $payment_breakdown['Transaction Charge']).'.00'; ?></td>
                        </tr>
                        <tr>
                            <th>Transaction Charge</th>
                            <td>&#8358;<?php echo $payment_breakdown['Transaction Charge'].'.00';?></td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td>&#8358;<?php echo $payment_record->amount.'.00'; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <table width="100%">
                <tr>
                    <td>
                        <div class="invoice-notes">
                            <h6>Notes &amp; Information:</h6>
                            <p>Transcript form payments are not refundable.</p>
                            <p>Make sure the payment details on the receipt matches your details.</p>
                        </div>
                    </td>
                    <td>
                        <div class="invoice-notes">
                            <p><?php echo $imgqrcode; ?></p>
                        </div>
                    </td>
                </tr>
            </table>

            <div class="noprint">
                <button class="btn btn-primary" onClick="window.print();" ><i class="icon-print"></i> PRINT</button>
            </div>
            <img src="images/logo.png" class="imgg">
        </section>
    </div>
</section>