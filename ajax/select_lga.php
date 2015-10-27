<?php
	require_once("../inc/initialize.php");	
	
	# Display City select dropdown based on the City selected by user
	if(isset($_POST['state_id'])) {	
		$sql_lga ="SELECT * FROM lga WHERE state_id='" . $_POST['state_id'] . "' AND visible = 1 ORDER BY lga_name ASC";
		$result_lga = $database->query($sql_lga);
   
   		echo '
	    <div class="control-group">
	        <label class="control-label" for="inputLGA">LGA</label>
	        <div class="controls">
	            <div class="input-prepend">
	            <span class="add-on"><i class="icon-chevron-down"></i></span>
	                <select class="input-xlarge" name="lga_id" id="lga_id" >
	                    <option value="">--Select--</option>';
	                    while($row = $database->fetch_array($result_lga))
						{
							echo '<option value="'. $row['id'] .'">'.$row['lga_name'].'</option>'; 
						} 
		echo '
	                </select>
	            </div>
	        </div>
	    </div>';
 	}
?>