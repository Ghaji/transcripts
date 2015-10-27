<?php
    # Instance of MySQLDatabase
    $database = new MySQLDatabase();

    # Instance of Session
    $session = new Session();

    # Instance of User
    $user = User::find_by_id($session->id);

    $application_no = customDecrypt($_GET["app_no"]);
?>
<h5 align="center">Transcript Application</h5>
<hr>
<h6 align="center">All Fields are Required</h6>
<form action="" method="POST" class="application_form form-horizontal" >
    <!-- Fullname -->
    <div class="control-group">
        <label class="control-label" for="inputApplicationFormNumber">Application Number</label>
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="iconic-hash"></i></span>
                <input type="text" class="input-xlarge" required id="app_no" name="app_no" value="<?php if(isset($application_no)) echo $application_no; ?>" readonly="readonly" />
            </div>
        </div>
    </div>

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
        <label class="control-label" for="inputFullName">Full Name</label>
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-user"></i></span>
                <input type="text" class="input-xlarge" required id="full_name" name="full_name" value="<?php if(isset($user->full_name)) echo $user->full_name; ?>" placeholder="Surname, Firstname, middlename" />
            </div>
        </div>
    </div>

    <!-- matriculation Number -->
    <div class="control-group">
        <label class="control-label" for="inputMatriculationNumber">Matriculation Number</label>
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-certificate"></i></span>
                <input type="text" class="input-xlarge" required id="matriculation_no" name="matriculation_no" value="<?php if(isset($user->matriculation_no)) echo $user->matriculation_no; ?>" placeholder="Matriculation Number" />
            </div>
        </div>
    </div>

    <!-- Get matriculation Number -->
    <div class="control-group">
        <label class="control-label" for="inputMatriculationNumber"></label>
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="iconic-spin"></i></span>
                <a href="" class="btn btn-info">Get Matriculation Number ( If Forgotten ) </a>
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
                            if($row['gender_id'] == $user->gender_id) {   
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

    <!-- dob -->
    <div class="control-group">
        <label class="control-label" for="inputDOB">Date of Birth</label>
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-certificate"></i></span>
                  <input type="text" class="input-xlarge datepicker" required id="date_of_birth" name="date_of_birth" value="<?php if(isset($user->date_of_birth) && $user->date_of_birth != '0000-00-00') echo $user->date_of_birth; ?>" maxlength="10"  data-date-format="yyyy-mm-dd" placeholder="YYYY-MM-DD" />
            </div>
        </div>
    </div>

    <!-- email -->
    <div class="control-group">
        <label class="control-label" for="inputEmail">Email</label>
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-envelope"></i></span>
                <input type="text" class="input-xlarge" id="email" name="email" value="<?php if(isset($user->email)) echo $user->email; ?>" placeholder="Enter e-mail" required readonly="true"  />
            </div>
        </div>
    </div>

    <!-- phone number -->
    <div class="control-group">
        <label class="control-label" for="inputPhoneNumber">Phone Number</label>
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
    
    <!-- mode of entry -->
      <?php
          $sql_entry = "SELECT * FROM entry_modes WHERE entry_visible = 1";
          $result = EntryMode::find_by_sql($sql_entry);
      ?>
    <div class="control-group">
        <label class="control-label" for="inputModeOfEntry">Mode of Entry</label>
        <div class="controls">
            <div class="input-prepend">
            <span class="add-on"><i class="icon-chevron-down"></i></span>
                <select class="input-xlarge" name="mode_of_entry_id" id="mode_of_entry_id" >
                    <option value="">--Mode of Entry--</option>
                     <?php
                      foreach($result as $row) {
                          if($row->id == $user->mode_of_entry_id) {   
                              echo '<option selected="selected" value="'. $row->id .'">'.$row->entry_name.'</option>'; 
                          } else {
                              echo '<option value="'. $row->id .'">'.$row->entry_name.'</option>'; 
                          }
                      }
                    ?>
                    
                </select>
            </div>
        </div>
    </div>

    <!-- Year of graduation -->
    <div class="control-group">
      <label class="control-label" for="inputYearOfGraduation">Year of Graduation</label>
      <div class="controls">
        <div class="input-prepend">
            <span class="add-on"><i class="icon-certificate"></i></span>
              <input type="text" class="input-xlarge" required id="year_of_graduation" name="year_of_graduation" value="<?php if(isset($user->year_of_graduation) && $user->year_of_graduation != '0000') echo $user->year_of_graduation; ?>" maxlength="4" placeholder="YYYY" />
        </div>
      </div>
    </div>

    <!-- Year of entry -->
    <div class="control-group">
      <label class="control-label" for="inputYearOfEntry">Year of Entry</label>
      <div class="controls">
        <div class="input-prepend">
            <span class="add-on"><i class="icon-certificate"></i></span>
              <input type="text" class="input-xlarge" required id="year_of_entry" name="year_of_entry"  value="<?php if(isset($user->year_of_entry) && $user->year_of_entry != '0000') echo $user->year_of_entry; ?>" maxlength="4" placeholder="YYYY" />
        </div>
      </div>
    </div>

    <!-- Recieving Address -->
    <div class="control-group">
      <label class="control-label" for="inputAdress">Recieving Address</label> 
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-home"></i></span>
                <textarea rows="4"  placeholder="Recieving Address" class="input-xlarge" id="receiving_address" name="receiving_address"><?php echo $user->receiving_address;?></textarea>
            </div>
        </div>
    </div>

    <!-- Have you applied before -->
    <div class="control-group">
      <div class="controls">
        
          <label class="checkbox">
            <input type="checkbox" id="applied" name="applied" value="1">Have you ever applied for transcript before.
          </label>
        </div>
      
    </div>
    <hr>
    
    <!-- Button for submit -->
    <div class="control-group">
        <div class="controls">   
          <button type="submit" class="btn btn-primary" id="submit"><i class="iconic-pen"></i> Submit</button>
          <button type="button" onClick="document.location.href='index.php';" class="btn"><i class="iconic-x"></i> Cancel</button>
        </div>  
    </div>
 
    <hr>
</form>