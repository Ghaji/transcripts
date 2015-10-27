<?php
 	# Instance of Session
 	$session = new Session();

 	# Instance of MySQLDatabase
    $db = new MySQLDatabase();
    
          // print_r( $type);
          // die();
     
    # Count the number of submitted transcript applications for an applicant
    $query_count = "SELECT count(*) FROM feedbacks WHERE applicant_id ='".$session->id."' ";
    $result_count =  $db->query($query_count);
    $feedbacks_count = $db->fetch_array($result_count);
    $count = array_shift($feedbacks_count);
    
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
    $sql = "SELECT * FROM feedbacks WHERE applicant_id ='".$session->id."' ORDER BY `id` DESC ";
    $sql .= "LIMIT {$per_page} ";
    $sql .= "OFFSET {$pagination->offset()}";
    $active_feedbacks = Feedback::find_by_sql($sql);
    
    // Need to add ?page=$page to all links we want to 
    // maintain the current page (or store $page in $session)  

    $counter = 1;
?>
<h4> <p class="label label-info"> My Feedbacks</p></h4>
<table class="table table-hover table-striped table-bordered">
	<thead>
		<tr>
			<th> <i class="iconic-hash">           </i>  SN          </th>
			<th> <i class="icon-tags">             </i>  Type       </th>
			<th> Content <i class="icon-comment">  </i>              </th>
			<th> <i class="icon-calendar">         </i>  Date        </th>
			<th> <i class="icon-eye-open">         </i>  View        </th>
		</tr>
	</thead>
      	<?php 
      		# Make sure user has made application before
	        if ( isset($active_feedbacks) && !empty($active_feedbacks) ) { 
	            
	            $serial_no = 1;
	            foreach ($active_feedbacks as $feed) {
	            
	          if(strlen($feed->comment) >= 20){ 

	         $comment = substr($feed->comment, 0, 20).'...';

	          }else{ 
	           $comment = $feed->comment; 
	          }
	    ?>			
		            <tbody data-provides="rowlink">
					    <tr class="rowlink">
		    			    <td><?php echo $serial_no;?></td>
		    			        
		    				<td>

		    					 
                                  <?php $feedbackt=FeedbackType::find_by_id($feed->title_id);
                                   echo  $feedbackt->type; 
                                   ?> 

		    				</td>
		    				
							<td><?php if (isset( $comment)) echo $comment; ?></td>
							<td><?php if (isset($feed->updated_at)) echo $feed->updated_at; ?></td>
							<td class="nolink"><a href="my_feedbacks_details.php?feed=<?php echo customEncrypt($feed->id); ?>"> Details </a></td>
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
			        echo "<li class='disabled'><a href=\"cheack_my_feedbacks.php?page=";
			        echo $pagination->previous_page();
			        echo "\">&laquo; Previous</a></li> "; 
		        }

		        for ($i=1; $i <= $pagination->total_pages(); $i++) {
		            if ($i == $page) {
		                echo "<li><span class=\"selected\">{$i}</span></li>";
		            } else {
		                echo "<li><a href=\"cheack_my_feedbacks.php?page={$i}\">{$i}</a></li>"; 
		            }
		        }

		        if ($pagination->has_next_page()) { 
		            echo "<li class='disabled'> <a href=\"cheack_my_feedbacks.php?page=";
		            echo $pagination->next_page();
		            echo "\">Next &raquo;</a></li> "; 
		        }		          
		    }
		?>
	</ul>
</div>