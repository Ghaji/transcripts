<?php
    require_once("inc/initialize.php"); 
    $database = new MySQLDatabase();
    $session = new Session();
    $user = User::find_by_id($session->id);
?>
<h5 align="center">Select Payment for Transcript Application</h5>
<hr> 
<h6 align="center">All Fields are Required</h6>
<form action="pay.php" method="POST" class="create_form form-horizontal" >
    <!-- Fullname -->
    <div class="control-group">
        <label class="control-label" for="inputEmail">Full Name</label>
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-user"></i></span>
                <input type="text" class="input-xlarge" required id="full_name" name="full_name" value="<?php if(isset($user->full_name)) echo $user->full_name; ?>" placeholder="Surname, Firstname, middlename" readonly="" />
            </div>
        </div>
    </div>
    <!-- Delivery type -->
    <?php
        $sql_type = "SELECT * FROM delivery_type WHERE dt_visible = 1";
        $result = $database->query($sql_type);
    ?>
    <div class="control-group">
        <label class="control-label" for="inputDeliveryType">Delivery Type</label>
        <div class="controls">
            <div class="input-prepend">
            <span class="add-on"><i class="icon-chevron-down"></i></span>
                <select class="input-xlarge" name="dt_id" id="dt_id" onChange="get_dm_options(this.value);">
                    <option value="">--Select--</option>
                    <?php
                        while($row = $database->fetch_array($result))
                        {
                            echo '<option value="'. $row['id'] .'">'.$row['dt_name'].'</option>';    
                        }
                    ?>
                </select>
            </div>
        </div>
    </div>
                  
    <div id="more_fields">
    </div>

    <div id="city_field">
    </div>

    <div id="lga_field">     
    </div>

    <hr>      
    <div class="control-group">
        <div class="controls">   
            <button type="submit" class="btn btn-primary" id="submit"><i class="iconic-pen"></i> Submit</button>
            <button type="button" onClick="document.location.href='index.php';" class="btn"><i class="iconic-x"></i> Cancel</button>
        </div>  
    </div>   
    <hr>
</form>