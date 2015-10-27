<?php
 	require_once("inc/initialize.php");
 	
 	# Instance of Session
    $session =new Session();
    
    // 1. the current page number ($current_page)
    $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

    // 2. records per page ($per_page)
    $per_page = 2;

    // 3. total record count ($total_count)
 	$total_count = Faq::count_all();

    // use pagination instead
    $pagination = new Pagination($page, $per_page, $total_count);
    
    // Instead of finding all records, just find the records 
    // for this page
    $sql = "SELECT * FROM faqs";
    $sql .= " LIMIT {$per_page}";
    $sql .= " OFFSET {$pagination->offset()}";
    $answer_question = Faq::find_by_sql($sql);
    
    // Need to add ?page=$page to all links we want to 
    // maintain the current page (or store $page in $session)  
?>
<h4><p class="label label-info">Frequently Asked Questions (FAQ)</p></h4>  
<?php 
    if(isset($answer_question)) { 
        $serial_no = 1;
        echo '<div class="accordion" id="accordion2">';
        foreach($answer_question as $user_answer) {        	
?>
			<div class="layer1">
				<p class="heading"><?php echo $serial_no;?>  <i class="icon-user"> </i>
			 		<?php if(isset($user_answer->question)) echo $user_answer->question; ?>  
			 		<i class="iconic-comment-alt2"> </i> 
				</p>
				<div class="content"><i class="iconic-key"> </i>
				 	<?php if(isset($user_answer->answer)) echo $user_answer->answer; ?>
				</div>
			</div>	
<?php
          	$serial_no++;
        }
        echo '</div>';
 	}
?> 
<div class="pagination " style="clear: both;">
	<ul>
		<?php
		    if($pagination->total_pages() > 1) {
		        
		        if($pagination->has_previous_page()) {
			        echo "<li class='disabled'><a href=\"application_faq.php?page=";
			        echo $pagination->previous_page();
			        echo "\">&laquo; Previous</a></li> "; 
		        }

		        for($i=1; $i <= $pagination->total_pages(); $i++) {
		            if($i == $page) {
		                echo " <li><span class=\"selected\">{$i}</span></li> ";
		            } else {
		                echo " <li><a href=\"application_faq.php?page={$i}\">{$i}</a></li> "; 
		            }
		        }

		        if($pagination->has_next_page()) { 
		            echo "<li class='disabled'> <a href=\"application_faq.php?page=";
		            echo $pagination->next_page();
		            echo "\">Next &raquo;</a></li> ";
		        }		          
		    }
		?>
	</ul>
</div>
<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery(".content").hide();
	  	//toggle the componenet with class msg_body
	  	jQuery(".heading").click(function() {
	    	jQuery(this).next(".content").slideToggle(10);
	  	});
	});
</script>