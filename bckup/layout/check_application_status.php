<?php 
	require_once("inc/initialize.php");

 	# Get current status on an anplication
    if ($label) {
 	$status_sql = "SELECT * FROM `applicant_status` WHERE application_no = '".$label."'  ORDER BY status_id DESC Limit 1";
	$application_status = ApplicantStatus::find_by_sql($status_sql);
	$application_status_final = array_shift($application_status);
	
	switch ($application_status_final->status_id) {
		case 1:
			$status_label = '<div class="progress progress-striped active">
                                <div class="bar" style="width: 25%; "></div>
                             </div>';
            $passentage = 25;                   
			break;
		case 2:
			$status_label = '<div class="progress progress-striped active">
                                <div class="bar" style="width: 50%; "></div>
                               </div>';
            $passentage = 50; 
			break;
		case 3:
			$status_label = '<div class="progress progress-striped active">
                                <div class="bar" style="width: 75%; "></div>
                             </div>';
            $passentage = 75; 
			break;
		case 4:
			$status_label = '<div class="progress progress-striped active">
                                <div class="bar" style="width: 100%;"></div>
                             </div>';
            $passentage=100; 
			break;
		default:
			$status_label = '<span class="label label-important">Pending</span> 
			                 <div class="progress progress-striped active">
                                <div class="bar" style="width: 0%;"></div>
                             </div>';
			$passentage=0; 
			break;
	}
?>
<table class="table table-hover table-striped table-bordered">
	<thead>
		<tr>
			<th>Approved</th>
			<th>Prepaid</th>
			<th>Verified</th>
			<th>Dispach</th>			
		</tr>
	</thead>
</table>
<table class="table table-hover table-striped table-bordered">
    <tbody data-provides="rowlink">
	    <tr class="rowlink">
			<td colspan="2"><?php if(isset($status_label)) echo $status_label; ?></td>
		</tr>
		<tr>
			<span class="label label-success"><?php  echo $passentage; ?> %</span>
	    </tr>
    </tbody>
<?php
	}	
?> 
</table>