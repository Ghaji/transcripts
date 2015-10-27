<?php
	require_once("../inc/initialize.php");	
	
	# Display Delivery Mode select dropdown based on the Delivery Type selected by user
	if(isset($_POST['dt_id'])) {
		$dt_id = $_POST['dt_id'];
		$sql_dm ="SELECT * FROM delivery_mode WHERE dt_id='" . $dt_id . "' AND dm_visible = 1 ORDER BY dm_type ASC";
		$result_dm = $database->query($sql_dm);

   		echo '
	    <div class="control-group">
	        <label class="control-label" for="inputDeliveryMode">Delivery Mode</label>
	        <div class="controls">
	            <div class="input-prepend">
	            <span class="add-on"><i class="icon-chevron-down"></i></span>
	                <select class="input-xlarge" name="dm_id" id="dm_id" >
	                    <option value="">--Select--</option>';
	                    while($row = $database->fetch_array($result_dm))
						{
							echo '<option value="'. $row['id'] .'">'.$row['dm_type'].'</option>'; 
						} 
		echo '
	                </select>
	            </div>
	        </div>
	    </div>';

	    # Display Nigerian state select dropdown if delivery type is national
	    if($dt_id == 1) {
		 	$sql_state = "SELECT * FROM state WHERE visible=1";
		    $result_state = $database->query($sql_state);

		    echo '
		    <div class="control-group">
		        <label class="control-label" for="inputState">State</label>
		        <div class="controls">
		            <div class="input-prepend">
		            <span class="add-on"><i class="icon-chevron-down"></i></span>
		                <select class="input-xlarge" name="state_id" id="state_id" onChange="get_lga_options(this.value);">
		                    <option value="">-State--</option>';
		                      while($row = $database->fetch_array($result_state))
		                      {
		                        echo '<option value="'. $row['state_id'] .'">'.$row['state_name'].'</option>';
		                      }
		    echo '
		                </select>
		            </div>
		        </div>
		    </div>';
		} elseif($dt_id == 2) {
			# Display Countries select dropdown if delivery type is international
			$sql_country = "SELECT * FROM countries WHERE visible=1";
		    $result_country = $database->query($sql_country);

		    echo '
		    <div class="control-group">
		        <label class="control-label" for="inputCountry">Country</label>
		        <div class="controls">
		            <div class="input-prepend">
		            <span class="add-on"><i class="icon-chevron-down"></i></span>
		                <select class="input-xlarge" name="country_id" id="country_id" onChange="get_city_options(this.value);">
		                    <option value="">-Country--</option>';
		                      while($row = $database->fetch_array($result_country))
		                      {
		                        echo '<option value="'. $row['country_id'] .'">'.$row['country_name'].'</option>';
		                      }
		    echo '
		                </select>
		            </div>
		        </div>
		    </div>';
		}
		
		# Generate Application Form Number
		$applicant_id = $session->id;
		$app_form_no = app_id_generator($dt_id, $applicant_id);
   		echo '<input type="hidden" name="app_form_no" value="'.$app_form_no.'">';
 	}
?>