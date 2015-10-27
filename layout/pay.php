<?php
    require_once("inc/initialize.php"); 
    # Require Remita Constants
    require_once("inc/remita_functions.php");

    $database = new MySQLDatabase();
    $session = new Session();

    # Get User details
    $user = User::find_by_id($session->id);
?>
<form action="<?php echo GATEWAYURL; ?>" method="POST" class="payment_form form-horizontal" >
    <h4><p class="label label-info">Payment Breakdown for Transcript Application</p></h4>
    <table class="table table-hover table-striped table-bordered">
        <thead>
            <tr>
              <th>Full Name</th>
              <th><?php if(isset($user->full_name)) echo $user->full_name; ?></th>
            </tr>
            <tr>
              <th>Item Description</th>
              <th>Cost ( &#8358; )</th>
            </tr>
        </thead>
        <tbody>
            <?php
                # Transcript Form Charges
                $charge1 = "Processing Fee";
                $charge2 = "Postage Charge";
                $charge3 = "Transaction Charge";
                
                $payment_breakdown = array();
                $total_amount = 0;
                
                # Display Delivery Type And Charge
                if(isset($_POST['dt_id'])) {
                    $deliveryType = DeliveryType::find_by_id($_POST['dt_id']);

                    if(isset($deliveryType->dt_name)) {
                        echo '
                          <tr>
                            <td>'.$charge1.'</td>
                            <td>&#8358;'.$deliveryType->dt_amount.'</td>
                          </tr>
                        ';
                        $total_amount += $deliveryType->dt_amount;
                        $payment_breakdown[$charge1] = $deliveryType->dt_amount;
                    }
                }

                # Display Delivery Mode And Charge
                if(isset($_POST['dm_id'])) {
                    $deliveryMode = DeliveryMode::find_by_id($_POST['dm_id']);
                    $post_amount;
                    if(isset($deliveryMode->dm_type)) {
                        if($deliveryMode->dm_amount == 0) {
                            
                            # Display LGA And Charge
                            if(isset($_POST['lga_id'])) {
                                $lga = LGA::find_by_id($_POST['lga_id']);
                                $post_amount = $lga->lga_amount;
                            } 
                            if(isset($_POST['city_id'])) {
                                # Display City And Charge
                                $city = City::find_by_id($_POST['city_id']);
                                $post_amount = $city->amount;
                            }
                        } else {
                            $post_amount = $deliveryMode->dm_amount;
                        }
                        echo '
                          <tr>
                            <td>'.$charge2.'</td>
                            <td>&#8358;'.$post_amount.'</td>
                          </tr>
                        ';
                        $total_amount += $post_amount;
                        $payment_breakdown[$charge2] = $post_amount;
                    }
                }

                if($total_amount != 0) {
                    $transaction_charge = 100;
                    echo '
                      <tr>
                        <td>'.$charge3.'</td>
                        <td>&#8358;'.$transaction_charge.'</td>
                      </tr>
                    ';

                    $total_amount += $transaction_charge;
                    $payment_breakdown[$charge3] = $transaction_charge;

                    echo '
                        <tr>
                          <td>Total</td>
                          <td>&#8358;'.$total_amount.'</td>
                        </tr>
                    ';

                    # Store payment breakdown into a session variable
                    $serial_payment_breakdown = serialize($payment_breakdown);
                    $_SESSION["payment_breakdown"] = $serial_payment_breakdown;

                    if (isset($_POST["dt_id"]) && !empty($_POST["dt_id"])) {
                        $_SESSION["type_id"] = $_POST["dt_id"];
                    }

                    if (isset($_POST["dm_id"]) && !empty($_POST["dm_id"])) {
                        $_SESSION["mode_id"] = $_POST["dm_id"];
                    }

                    if (isset($_POST["city_id"]) && !empty($_POST["city_id"])) {
                        $_SESSION["city_or_state"] = $_POST["city_id"];
                    } elseif (isset($_POST["state_id"]) && !empty($_POST["state_id"])) {
                        $_SESSION["city_or_state"] = $_POST["state_id"];
                    }

                    if (isset($_POST["lga_id"]) && !empty($_POST["lga_id"])) {
                        $_SESSION["lga_id"] = $_POST["lga_id"];
                    }
                }
            ?>
        </tbody>
    </table>
    <?php
        if(isset($_POST['app_form_no']) && !empty($_POST['app_form_no'])) {
            $return_url = 'http://'.$_SERVER['HTTP_HOST'].'/mis.unijos.edu.ng/transcripts/processpayment.php'; 
            $total_kobo = $total_amount;
            $fullname = $user->full_name;
            $transaction_id = $_POST['app_form_no'];
            $_SESSION["transaction_id"] = $transaction_id;

            $hash_value = MERCHANTID . SERVICETYPEID . $transaction_id . $total_kobo . $return_url . APIKEY;
            $ourhash =  hash("sha512", $hash_value);
            $paymenttype = 'VERVE';

            # Payment variables for Remita 
            echo '
                <input id="amt" name="amt" value="'.$total_kobo.'" type="hidden"/>
                <input id="merchantId" name="merchantId" value="'.MERCHANTID.'" type="hidden"/>
                <input id="serviceTypeId" name="serviceTypeId" value="'.SERVICETYPEID.'" type="hidden"/>
                <input id="responseurl" name="responseurl" value="'.$return_url.'" type="hidden"/>
                <input id="orderId" name="orderId" value="'.$transaction_id.'" type="hidden"/>
                <input id="payerName" name="payerName" value="'.$fullname.'" type="hidden"/>
                <input id="hash" name="hash" value="'.$ourhash.'" type="hidden"/>
                <input id="paymenttype" name="paymenttype" value="'.$paymenttype.'" type="hidden"/>
            ';
        }
        $msg = '<div class="label label-warning">Note: Make sure you confirm all information before proceeding. Payments made after proceeding from here is non-refundable.</div>';
        echo output_message($msg);
    ?>
    <hr>
    <center>      
        <img src="images/remita-payment-logo-horizonal.png" alt="remita-payment-logo-horizontal">
        <br>
        <button type="button" class="btn btn-primary" id="submit_payment"><i class="iconic-pen"></i> Make Payment</button>
        <button type="button" onClick="document.location.href='home.php';" class="btn"><i class="iconic-x"></i> Cancel</button>
    </center>
    <hr>
</form>