<?php
    # Instance of Session
    $session = new Session();

    # Instance of MySQLDatabase
    $db = new MySQLDatabase();

    # Count the number of submitted transcript applications for an applicant
    $query_count = "SELECT count(*) FROM `acceptance_log` WHERE applicant_id ='".$session->id."'";
    $result_count =  $db->query($query_count);
    $history_count = $db->fetch_array($result_count);
    $count = array_shift($history_count);

    // 1. the current page number ($current_page)
    $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

    // 2. records per page ($per_page)
    $per_page = 4;

    // 3. total record count ($total_count)
    $total_count = $count;

    // use pagination instead
    $pagination = new Pagination($page, $per_page, $total_count);
    
    // Instead of finding all records, just find the records 
    // for this page
    $sql = "SELECT * FROM `acceptance_log` WHERE applicant_id ='".$session->id."'  ORDER BY `student_id` DESC ";
    $sql .= "LIMIT {$per_page} ";
    $sql .= "OFFSET {$pagination->offset()}";
    $Users = AcceptanceLog::find_by_sql($sql);
    
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
  				</tr>
		</thead>
    <?php 
        if(isset( $Users)) { 
            $serial_no=1;
            foreach( $Users as $transaction_rec) {
    ?>
                <tbody data-provides="rowlink">
                    <tr class="rowlink">
                        <td><?php echo $serial_no;?></td>
                        <td><?php if(isset($transaction_rec->student_id)) echo $transaction_rec->student_id; ?></td>
                        <td><?php if(isset($transaction_rec->ResponseDescription)) echo $transaction_rec->ResponseDescription; ?></td>
                        <td><?php if(isset($transaction_rec->Amount)) echo '<span class="label label-info">&#8358;'.$transaction_rec->Amount.'</span>'; ?></td>
                        <td><?php if(isset($transaction_rec->Initiating_date)) echo $transaction_rec->Initiating_date; ?></td>
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