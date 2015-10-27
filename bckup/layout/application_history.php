<?php
 	//require_once("inc/initialize.php");
    $session =new Session();
    $query_count = "SELECT * FROM app_histories where applicant_id ='".$session->id."' ";
    $user_history =  AppHistory::find_by_sql($query_count);
    $history = array_shift($user_history);
    
    // 1. the current page number ($current_page)
    $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

    // 2. records per page ($per_page)
    $per_page = 3;

    // 3. total record count ($total_count)
 	$total_count = AppHistory::count_all();

    // use pagination instead
    $pagination = new Pagination($page, $per_page, $total_count);
    
    // Instead of finding all records, just find the records 
    // for this page
    $sql = "SELECT * FROM app_histories where applicant_id ='".$session->id."'  ORDER BY `application_no` DESC ";
    $sql .= "LIMIT {$per_page} ";
    $sql .= "OFFSET {$pagination->offset()}";
    $user_application_histories = AppHistory::find_by_sql($sql);
    
    // Need to add ?page=$page to all links we want to 
    // maintain the current page (or store $page in $session)  

    $counter = 1;
?>
<h4> <p class="label label-info">Application History</p></h4>
<table class="table table-hover table-striped table-bordered">
	<thead>
		<tr>
			<th>SN</th>
			<th>Application Number</th>
			<th>City</th>
			<th>Status</th>
			<th>Date</th>
			<th>View</th>
		</tr>
	</thead>
      	<?php 
	        if(isset($user_application_histories)) { 
	            $serial_no=1;
	            foreach($user_application_histories as $user_application_history) {
	            	# Get city details
	             	$my_city = City::find_by_id($user_application_history->city_or_state);

	             	# Get current status on an anplication
	             	$status_sql = "SELECT * FROM `applicant_status` WHERE application_no = '".$user_application_history->application_no."' ORDER BY id DESC Limit 1";
	    			$application_status = ApplicantStatus::find_by_sql($status_sql);
	    			$application_status_final = array_shift($application_status);
	    			$track_status = $application_status_final->status_id;

	    			
	    			switch ($track_status) {
	    				case 1:
	    					$status_label = '<span class="label label-warning">Pending</span>';
	    					break;
						case 2:
							$status_label = '<span class="label label-info">Pending</span>';
							break;
						case 3:
							$status_label = '<span class="label label-success">Pending</span>';
							break;
						case 4:
							$status_label = '<span class="label label-success">Dispach by</span>';
							break;
						default:
							$status_label = '<span class="label label-important">Pending</span>';
							break;
	    			}
	    ?>			
		            <tbody data-provides="rowlink">
					    <tr class="rowlink">
		    			    <td><?php echo $serial_no;?></td>
		    				<td><?php if(isset($user_application_history->application_no)) echo $user_application_history->application_no; ?></td>
		    				<!-- <td><?php if(isset($user_application_history->city_or_state)) echo $user_application_history->city_or_state; ?></td> -->
		    				<td><?php if(isset($my_city->city_name)) echo $my_city->city_name; ?></td> 
							<td><?php if(isset($status_label)) echo $status_label; ?></td>
							<td><?php if(isset($user_application_history->updated_at)) echo $user_application_history->updated_at; ?></td>
							<td class="nolink"><a href="application_details.php?app=<?php echo customEncrypt($user_application_history->application_no);?>"> Details </a></td>
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
			        echo "<li class='disabled'><a href=\"application_history.php?page=";
			        echo $pagination->previous_page();
			        echo "\">&laquo; Previous</a></li> "; 
		        }

		        for($i=1; $i <= $pagination->total_pages(); $i++) {
		            if($i == $page) {
		                echo " <li><span class=\"selected\">{$i}</span></li> ";
		            } else {
		                echo " <li><a href=\"application_history.php?page={$i}\">{$i}</a></li> "; 
		            }
		        }

		        if($pagination->has_next_page()) { 
		            echo "<li class='disabled'> <a href=\"application_history.php?page=";
		            echo $pagination->next_page();
		            echo "\">Next &raquo;</a></li> "; 
		            //echo "</ul>";
		        }		          
		    }
		?>
	</ul>
</div>