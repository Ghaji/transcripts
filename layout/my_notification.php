<?php
 	# Instance of Session
 	$session = new Session();

 	# Instance of MySQLDatabase
    $db = new MySQLDatabase();
     if(isset($_GET['type']) && is_numeric($_GET['type'])) {

	$type_status = $_GET['type'];

	switch ($type_status ) {

		case 1: 
			$caption='Active Notifications';
			$type=1;
			break;

		case 2:
			$caption='Read Notifications';
			$type=2;
			break;

		case 3:
		    $caption='All Notifications';
			$type = '>=1';
			break;

		default:
			
			break;
	}
          // print_r( $type);
          // die();
      }
    # Count the number of submitted transcript applications for an applicant
    $query_count = "SELECT count(*) FROM notifications WHERE applicant_id ='".$session->id."' AND status = '".$type."'";
    $result_count =  $db->query($query_count);
    $notifications_count = $db->fetch_array($result_count);
    $count = array_shift($notifications_count);
    
    // 1. the current page number ($current_page)
    $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

    // 2. records per page ($per_page)
    $per_page = 3;

    // 3. total record count ($total_count)
 	$total_count = $count;

    // use pagination instead
    $pagination = new Pagination($page, $per_page, $total_count);
    
    // Instead of finding all records, just find the records 
    // for this page
    $sql = "SELECT * FROM notifications WHERE applicant_id ='".$session->id."' AND status = '".$type."' ORDER BY `id` DESC ";
    $sql .= "LIMIT {$per_page} ";
    $sql .= "OFFSET {$pagination->offset()}";
    $active_notifications = Notification::find_by_sql($sql);
    
    // Need to add ?page=$page to all links we want to 
    // maintain the current page (or store $page in $session)  

    $counter = 1;
?>
<h4> <p class="label label-info"><?php echo $caption; ?></p></h4>
<table class="table table-hover table-striped table-bordered">
	<thead>
		<tr>
			<th><i class="iconic-hash"> </i> SN  </th>
			<th><i class="icon-tags"> </i>Title</th>
			<th>Content <i class="icon-comment"> </i> </th>
			<th> <i class="icon-calendar"> </i>Date</th>
			<th> <i class="icon-eye-open"> </i>View </th>
		</tr>
	</thead>
      	<?php 
      		# Make sure user has made application before
	        if ( isset($active_notifications) && !empty($active_notifications) ) { 
	            
	            $serial_no = 1;
	            foreach ($active_notifications as $note) {
	            	
	            	# Get city details
	             	//$my_city = City::find_by_id($note->city_or_state);
	          if(strlen($note->content) >= 20){ 

	         $content = substr($note->content, 0, 20).'...';

	          }else{ 
	           $content = $note->content; 
	          }
	    ?>			
		            <tbody data-provides="rowlink">
					    <tr class="rowlink">
		    			    <td><?php echo $serial_no;?></td>
		    				<td><?php if (isset($note->title)) echo $note->title; ?></td>
		    				
							<td><?php if (isset( $content)) echo $content; ?></td>
							<td><?php if (isset($note->updated_at)) echo $note->updated_at; ?></td>
							<td class="nolink"><a href="my_notification_details.php?note=<?php echo customEncrypt($note->id); ?>"> Details </a></td>
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
			        echo "<li class='disabled'><a href=\"application_history.php?page=";
			        echo $pagination->previous_page();
			        echo "\">&laquo; Previous</a></li> "; 
		        }

		        for ($i=1; $i <= $pagination->total_pages(); $i++) {
		            if ($i == $page) {
		                echo "<li><span class=\"selected\">{$i}</span></li>";
		            } else {
		                echo "<li><a href=\"application_history.php?page={$i}\">{$i}</a></li>"; 
		            }
		        }

		        if ($pagination->has_next_page()) { 
		            echo "<li class='disabled'> <a href=\"application_history.php?page=";
		            echo $pagination->next_page();
		            echo "\">Next &raquo;</a></li> "; 
		        }		          
		    }
		?>
	</ul>
</div>