<?php
    //require_once("inc/initialize.php");
    $session =new Session();
    $query_count = "SELECT * FROM app_histories where applicant_id ='".$session->id."' ";
    $user_history = AppHistory::find_by_sql($query_count);
    $history = array_shift($user_history);

    // 1. the current page number ($current_page)
    $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

    // 2. records per page ($per_page)
    $per_page = 4;

    // 3. total record count ($total_count)
    $total_count = AppHistory::count_all();

    // use pagination instead
    $pagination = new Pagination($page, $per_page, $total_count);
    
    // Instead of finding all records, just find the records 
    // for this page
    $sql = "SELECT * FROM app_histories where applicant_id='".$session->id."'  ORDER BY `application_no` DESC ";
    $sql .= "LIMIT {$per_page} ";
    $sql .= "OFFSET {$pagination->offset()}";
    $Users = AppHistory::find_by_sql($sql);
    
    // Need to add ?page=$page to all links we want to 
    // maintain the current page (or store $page in $session)  
     $counter = 1;
?>
<h4> <p class="label label-info">Transaction History</p></h4>
<table class="table table-hover table-striped table-bordered">
		<thead>
				<tr>
  					<th>SN</th>
  					<th>Application No</th>
  					<th>Response Description</th>
  					<th>Amount</th>
  					<th>Initiating Date</th>
  					<th>View</th>
				</tr>
		</thead>
    <?php 
        if(isset( $Users)) { 
            $serial_no=1;
            foreach( $Users as $user_record) {
                $sql_trans  = "SELECT * FROM `acceptance_log` WHERE `student_id` = '".$user_record->application_no."'";
                $transaction = AcceptanceLog::find_by_sql($sql_trans);
                $transaction_rec = array_shift($transaction);
    ?>
                <tbody data-provides="rowlink">
                    <tr class="rowlink">
                        <td><?php echo $serial_no;?></td>
                        <td><?php if(isset($transaction_rec->student_id)) echo $transaction_rec->student_id; ?></td>
                        <td><?php if(isset($transaction_rec->ResponseDescription)) echo $transaction_rec->ResponseDescription; ?></td>
                        <td><?php if(isset($transaction_rec->Amount)) echo $transaction_rec->Amount; ?></td>
                        <td><?php if(isset($transaction_rec->Initiating_date)) echo $transaction_rec->Initiating_date; ?></td>
                        <td class="nolink"><a href="#"> Details </a></td>
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
            if($pagination->total_pages() > 1) { 
                if($pagination->has_previous_page()) { 
                    //echo "<ul>";
                    echo "<li class='disabled'><a href=\"transaction_log.php?page=";
                    echo $pagination->previous_page();
                    echo "\">&laquo; Previous</a></li> "; 
                }

                for($i=1; $i <= $pagination->total_pages(); $i++) {
                    if($i == $page) {
                        echo " <li><span class=\"selected\">{$i}</span></li> ";
                    } else {
                        echo " <li><a href=\"transaction_log.php?page={$i}\">{$i}</a></li> "; 
                    }
                }

                if($pagination->has_next_page()) { 
                    echo "<li class='disabled'> <a href=\"transaction_log.php?page=";
                    echo $pagination->next_page();
                    echo "\">Next &raquo;</a></li> "; 
                    //echo "</ul>";
                }
            }
        ?>
    </ul>
</div>