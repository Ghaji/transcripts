<?php
	require_once("../inc/initialize.php");	
	
	# Display City select dropdown based on the City selected by user
	if(isset($_POST['country_id'])) {	
		$sql_city ="SELECT * FROM cities WHERE country_id='" . $_POST['country_id'] . "' AND visible = 1 ORDER BY city_name ASC";
		$result_city = $database->query($sql_city);
   
   		echo '
	    <div class="control-group">
	        <label class="control-label" for="inputCity">City</label>
	        <div class="controls">
	            <div class="input-prepend">
	            <span class="add-on"><i class="icon-chevron-down"></i></span>
	                <select class="input-xlarge" name="city_id" id="city_id" >
	                    <option value="">--Select--</option>';
	                    while($row = $database->fetch_array($result_city))
						{
							echo '<option value="'. $row['id'] .'">'.$row['city_name'].'</option>'; 
						} 
		echo '
	                </select>
	            </div>
	        </div>
	    </div>';
 	}
?>