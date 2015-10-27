<h4><p class="label label-info">Payment History</p></h4>
<?php
    # Instance of session class
    $session =new Session();

    // 1. the current page number ($current_page)
    $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

    // 2. records per page ($per_page)
    $per_page = 4;

    // 3. total record count ($total_count)
    $total_count = AppHistory::count_all();
    
    // use pagination instead
    $pagination = new Pagination($page, $per_page, $total_count);
    
    // Instead of finding all records, just find the records for this page
    $sql = "SELECT * FROM app_histories where applicant_id='".$session->id."'  ORDER BY `application_no` DESC ";
    $sql .= "LIMIT {$per_page} ";
    $sql .= "OFFSET {$pagination->offset()}";
    $histories = AppHistory::find_by_sql($sql);
    
    // Need to add ?page=$page to all links we want to 
    // maintain the current page (or store $page in $session)  

     $counter = 1;
?>
<table class="table table-hover table-striped table-bordered">
	<thead>
		<tr>
			<th>SN</th>
			<th>Application No</th>
			<th>Amount</th>
			<th>Payment Date</th>
			<th>Application Status</th>
		</tr>
	</thead>
    <?php 
        if ( isset($histories) && !empty($histories) ) { 
            $serial_no = 1;

            # Loop through applicantion history for an applicant
            foreach ($histories as $history) {
                $sql_trans = "SELECT * FROM `adm_access_code` WHERE `jamb_rem_no` = '".$history->application_no."'";
                $transaction = AdmAccess::find_by_sql($sql_trans);
                $tranx_record = array_shift($transaction);
        ?>
                <tbody>
        	        <tr>
        		        <td><?php echo $serial_no; ?></td>
                        <td><?php if (isset($tranx_record->jamb_rem_no)) echo $tranx_record->jamb_rem_no; ?></td>
                        <td><?php if (isset($tranx_record->amount)) echo '<span class="label label-info">&#8358;'.$tranx_record->amount.'</span>'; ?></td>
                        <td><?php if (isset($tranx_record->payment_date)) echo $tranx_record->payment_date; ?></td>
                        <?php
                            # Check completion of a transcript application
                            if ($history->application_flag == 0) {
                        ?>
                                <td><span class="label label-important">Incompleted</span></td>
                                <td><a class="btn btn-info" href="<?php echo "invoice.php?tranx_no=".customEncrypt($tranx_record->jamb_rem_no); ?>"> Invoice </a></td>                        
                                <td><a class="btn btn-success" href="confirm.php">Complete</a></td>
                        <?php
                            } else {
                        ?>
                                <td><span class="label label-success">Completed</span></td>
                                <td colspan="2"><a class="btn btn-info" href="<?php echo "invoice.php?tranx_no=".customEncrypt($tranx_record->jamb_rem_no); ?>"> Invoice </a></td>                        
                        <?php
                            }
                        ?>
                    </tr> 
                </tbody>
    <?php
                $serial_no++;
            }
        }
	?> 
</table>
<div class="pagination " style="clear: both;">
    <ul>
        <?php
            if ($pagination->total_pages() > 1) {
                if ($pagination->has_previous_page()) {
                    echo "<li class='disabled'><a href=\"payment_history.php?page=";
                    echo $pagination->previous_page();
                    echo "\">&laquo; Previous</a></li> "; 
                }

                for ($i=1; $i <= $pagination->total_pages(); $i++) {
                    if($i == $page) {
                        echo "<li><span class=\"selected\">{$i}</span></li>";
                    } else {
                        echo "<li><a href=\"payment_history.php?page={$i}\">{$i}</a></li>"; 
                    }
                }

                if ($pagination->has_next_page()) { 
                    echo "<li class='disabled'> <a href=\"payment_history.php?page=";
                    echo $pagination->next_page();
                    echo "\">Next &raquo;</a></li> ";
                }       
            }
        ?> 
    </ul>
</div>