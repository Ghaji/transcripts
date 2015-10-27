<?php
    # Instance of MySQLDatabase
    $database = new MySQLDatabase();

    # Instance of Session
    $session = new Session();

    # Instance of user with user's details
    $user = User::find_by_id($session->id);
?>
<h3 align="center">Edit Profile</h3>
<hr>
<h6 align="center">All Fields are Required</h6>           
<form action="" method="POST" class="form-horizontal edit_profile" role="form">
    <!-- Title -->
    <?php
        $sql_title = "SELECT * FROM titles WHERE title_visible = 1";
        $result = $database->query($sql_title);
    ?>
    <div class="control-group">
        <label class="control-label" for="inputTitle">Title</label>
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-chevron-down"></i></span>
                <select class="input-xlarge" name="title_id" id="title_id" >
                    <option value="">--Title--</option>
                    <?php
                        while ($row = $database->fetch_array($result)) {
                            if ($row['id'] == $user->title_id) {
                                echo '<option selected="selected" value="'. $row['id'] .'">'.$row['title_name'].'</option>'; 
                            } else {
                                echo '<option value="'. $row['id'] .'">'.$row['title_name'].'</option>'; 
                            }
                        }
                    ?>
                </select>
            </div>
        </div>
    </div>
  
    <!-- Fullname -->
    <div class="control-group">
        <label class="control-label" for="inputEmail">Full Name</label>
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-user"></i></span>
                <input type="text" class="input-xlarge" required id="full_name" name="full_name" value="<?php if(isset($user->full_name)) echo $user->full_name; ?>" placeholder="Surname, Firstname, middlename" />
            </div>
        </div>
    </div>

    <!-- Matriculation Number -->
    <div class="control-group">
        <label class="control-label" for="inputEmail">Matriculation Number</label>
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-certificate"></i></span>
                <input type="text" class="input-xlarge" required id="matriculation_no" name="matriculation_no" value="<?php if(isset($user->matriculation_no)) echo $user->matriculation_no; ?>" placeholder="Matriculation Number" />
            </div>
        </div>
    </div>

    <!-- Programme -->
    <div class="control-group">
        <label class="control-label" for="inputProgramme">Programme</label>
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-chevron-down"></i></span>
                <select class="input-xlarge" name="programme_id" id="programme_id" onClick="get_options(this.value);"  >
                    <?php
                        $sql_programme = "SELECT `id`, `programme_name` FROM programmes WHERE programme_visible = 1";
                        $my_programme = $database->query($sql_programme);
                        
                        while ($rows = $database->fetch_array($my_programme)) {
                            if ($rows['id'] == $user->programme_id) {   
                                echo '<option selected="selected" value="'. $rows['id'] .'">'.$rows['programme_name'].'</option>'; 
                            } else {
                                echo '<option value="'. $rows['id'] .'">'.$rows['programme_name'].'</option>'; 
                            }
                        }
                    ?> 
                </select>
            </div>
        </div>
    </div>

    <!-- Mode of entry -->  
    <div class="control-group">
        <label class="control-label" for="inputentry">Mode of Entry</label>
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-chevron-down"></i></span>
                <select class="input-xlarge" name="entry_id" id="entry_id" >
                    <?php
                        $sql_entry = "SELECT `entry_name`FROM `entry_modes` WHERE entry_visible = 1";
                        $result_entry = $database->query($sql_entry);
                    
                        while ($row = $database->fetch_array($result_entry)) {
                            if($row['id'] == $user->mode_of_entry_id) {   
                                echo '<option selected="selected" value="'. $row['id'] .'">'.$row['entry_name'].'</option>'; 
                            } else {
                                echo '<option value="'. $row['id'] .'">'.$row['entry_name'].'</option>'; 
                            }
                        }
                    ?>
                    
                </select>
            </div>
        </div>
    </div>

    <!-- Year of graduation -->
    <div class="control-group">
        <label class="control-label" for="inputEmail">Year of Graduation</label>
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-certificate"></i></span>
                <input type="text" class="input-xlarge datepicker" required id="year_of_graduation" name="year_of_graduation" value="<?php if(isset($user->year_of_graduation)) echo $user->year_of_graduation; ?>" placeholder="Year of Graduation" />
            </div>
        </div>
    </div>

    <!-- Year of entry -->
    <div class="control-group">
        <label class="control-label" for="inputEmail">Year of Entry</label>
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-certificate"></i></span>
                <input type="text" class="input-xlarge datepicker" required id="year_of_entry" name="year_of_entry" value="<?php if(isset($user->year_of_entry)) echo $user->year_of_entry; ?>"  placeholder="Year of Entry" />
            </div>
        </div>
    </div>

    <!-- Gender -->
    <?php
        $sql_gender = "SELECT * FROM gender WHERE gender_visible = 1";
        $result_gender = $database->query($sql_gender);
    ?>
    <div class="control-group">
        <label class="control-label" for="inputGender">Gender</label>
        <div class="controls">
            <div class="input-prepend">
            <span class="add-on"><i class="icon-chevron-down"></i></span>
                <select class="input-xlarge" name="gender_id" id="gender_id" >
                    <option value="">--Gender--</option>
                    <?php
                        while ($row = $database->fetch_array($result_gender)) {
                            if ($row['gender_id'] == $user->gender_id) {   
                                echo '<option selected="selected" value="'. $row['gender_id'] .'">'.$row['gender_name'].'</option>'; 
                            } else {
                                echo '<option value="'. $row['gender_id'] .'">'.$row['gender_name'].'</option>'; 
                            }
                        }
                    ?>
                </select>
            </div>
        </div>
    </div>

    <!-- DOB -->
    <div class="control-group">
        <label class="control-label" for="inputEmail">Date of Birth</label>
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-certificate"></i></span>
                <input type="text" class="input-xlarge datepicker" required id="date_of_birth" name="date_of_birth" value="<?php if(isset($user->date_of_birth) && $user->date_of_birth != '0000-00-00') echo $user->date_of_birth; ?>" maxlength="10"  data-date-format="yyyy-mm-dd" placeholder="YYYY-MM-DD" />
            </div>
        </div>
    </div>

    <!-- Email -->
    <div class="control-group">
        <label class="control-label" for="inputEmail">Email</label>
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-envelope"></i></span>
                <input type="text" class="input-xlarge" id="email" name="email" value="<?php if(isset($user->email)) echo $user->email; ?>" placeholder="Enter e-mail" required readonly="true"  />
            </div>
        </div>
    </div>

    <!-- Phone Number -->
    <div class="control-group">
        <label class="control-label" for="inputEmail">Phone Number</label>
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="iconic-iphone"></i></span>
                <input type="text" class="input-xlarge" id="phone_number" name="phone_number" value="<?php if(isset($user->phone_number)) echo $user->phone_number; ?>" maxlength="14" placeholder="Enter phone number" required readonly="true" />
            </div>
        </div>
    </div>

    <!-- Contact Address -->
    <div class="control-group">
        <label class="control-label" for="inputAdress">Contact Address</label> 
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-home"></i></span>
                <textarea rows="4" placeholder="Contact Address" class="input-xlarge" id="contact_address" name="contact_address"><?php echo $user->contact_address;?></textarea>
            </div>
        </div>
    </div>

    <hr>

    <!-- Button for submit -->
    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn btn-primary" id="edit_profile" name="edit_profile"><i class="iconic-pen"></i> Submit</button>   
            <button type="button" onClick="document.location.href='profile.php';" class="btn"><i class="iconic-x"></i> Cancel</button>
        </div>  
    </div>

    <hr>
</form>