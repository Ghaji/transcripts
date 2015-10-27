<?php
  $database = new MySQLDatabase();
  $session = new Session();
  $user = User::find_by_id($session->id);
?>
<h5 align="center">Select Payment for Transcript Application</h5>
                <hr>
            <h6 align="center">All Fields are Required</h6>
              <form action="" method="POST" class="create_form form-horizontal" >
              <!-- Title -->
                    <?php
                        $sql_title = "SELECT * FROM title WHERE title_visible=1";
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
                                    while($row = $database->fetch_array($result))
                                    {
                                        if($row['title_id'] == $user->title_id)
                                        {
                                            echo '<option selected="selected" value="'. $row['title_id'] .'">'.$row['title_name'].'</option>'; 
                                        }
                                        else
                                        {
                                            echo '<option value="'. $row['title_id'] .'">'.$row['title_name'].'</option>'; 
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                  <div class="control-group">
                    <label class="control-label" for="inputEmail">Full Name</label>
                    <div class="controls">
                      <div class="input-prepend">
                          <span class="add-on"><i class="icon-user"></i></span>
                            <input type="text" class="input-xlarge" required id="full_name" name="full_name" value="<?php if(isset($user->full_name)) echo $user->full_name; ?>" placeholder="Surname, Firstname, middlename" />
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="inputEmail">Matriculation Number</label>
                    <div class="controls">
                      <div class="input-prepend">
                          <span class="add-on"><i class="icon-certificate"></i></span>
                            <input type="text" class="input-xlarge" required id="matriculation_no" name="matriculation_no" value="<?php if(isset($user->matriculation_no)) echo $user->matriculation_no; ?>" placeholder="Matriculation Number" />
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="inputEmail"></label>
                    <div class="controls">
                      <div class="input-prepend">
                          <span class="add-on"><i class="iconic-spin"></i></span>
                          <a href="" class="btn btn-info">Get Matriculation Number ( If Forgotten )</a>
                      </div>
                    </div>
                  </div>
                  <!-- Gender -->
                    <?php
                        $sql_gender = "SELECT * FROM gender WHERE gender_visible=1";
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
                                          while($row = $database->fetch_array($result_gender))
                                          {
                                              if($row['gender_id'] == $user->gender_id)
                                              {   
                                                  echo '<option selected="selected" value="'. $row['gender_id'] .'">'.$row['gender_name'].'</option>'; 
                                              }
                                              else
                                              {
                                                  echo '<option value="'. $row['gender_id'] .'">'.$row['gender_name'].'</option>'; 
                                              }
                                          }
                                        ?>
                                        
                                    </select>
                                </div>
                            </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label" for="inputEmail">Date of Birth</label>
                    <div class="controls">
                      <div class="input-prepend">
                          <span class="add-on"><i class="icon-certificate"></i></span>
                            <input type="text" class="input-xlarge datepicker" required id="date_of_birth" name="date_of_birth" value="" placeholder="Date of Birth" />
                      </div>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label" for="inputEmail">Email</label>
                    <div class="controls">
                      <div class="input-prepend">
                          <span class="add-on"><i class="icon-envelope"></i></span>
                            <input type="text" class="input-xlarge" id="email" name="email" value="<?php if(isset($user->email)) echo $user->email; ?>" placeholder="Enter e-mail" required readonly="true"  />
                      </div>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label" for="inputEmail">Phone Number</label>
                    <div class="controls">
                      <div class="input-prepend">
                          <span class="add-on"><i class="iconic-iphone"></i></span>
                            <input type="text" class="input-xlarge" id="phone_number" name="phone_number" value="<?php if(isset($user->phone_number)) echo $user->phone_number; ?>" maxlength="14" placeholder="Enter phone number" required readonly="true" />
                      </div>
                    </div>
                  </div>
                  
                  <!-- Address -->
                  <div class="control-group">
                    <label class="control-label" for="inputAdress">Contact Address</label> 
                      <div class="controls">
                          <div class="input-prepend">
                              <span class="add-on"><i class="icon-home"></i></span>
                              <textarea rows="4" placeholder="Contact Address" class="input-xlarge" id="contact_address" name="contact_address"><?php echo $user->contact_address;?></textarea>
                          </div>
                      </div>
                  </div>
                  
                  <!-- Gender -->
                    <?php
                        $sql_gender = "SELECT * FROM gender WHERE gender_visible=1";
                        $result_gender = $database->query($sql_gender);
                    ?>
                  <div class="control-group">
                        <label class="control-label" for="inputGender">Mode of Entry</label>
                            <div class="controls">
                                <div class="input-prepend">
                                <span class="add-on"><i class="icon-chevron-down"></i></span>
                                    <select class="input-xlarge" name="gender_id" id="gender_id" >
                                        <option value="">--Mode of Entry--</option>
                                         <?php
                                          while($row = $database->fetch_array($result_gender))
                                          {
                                              if($row['gender_id'] == $user->gender_id)
                                              {   
                                                  echo '<option selected="selected" value="'. $row['gender_id'] .'">'.$row['gender_name'].'</option>'; 
                                              }
                                              else
                                              {
                                                  echo '<option value="'. $row['gender_id'] .'">'.$row['gender_name'].'</option>'; 
                                              }
                                          }
                                        ?>
                                        
                                    </select>
                                </div>
                            </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label" for="inputEmail">Year of Graduation</label>
                    <div class="controls">
                      <div class="input-prepend">
                          <span class="add-on"><i class="icon-certificate"></i></span>
                            <input type="text" class="input-xlarge datepicker" required id="year_of_graduation" name="year_of_graduation" value="" placeholder="Year of Graduation" />
                      </div>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label" for="inputEmail">Year of Entry</label>
                    <div class="controls">
                      <div class="input-prepend">
                          <span class="add-on"><i class="icon-certificate"></i></span>
                            <input type="text" class="input-xlarge datepicker" required id="year_of_entry" name="year_of_entry" value="" placeholder="Year of Entry" />
                      </div>
                    </div>
                  </div>

                  <!-- Address -->
                  <div class="control-group">
                    <label class="control-label" for="inputAdress">Recieving Address</label> 
                      <div class="controls">
                          <div class="input-prepend">
                              <span class="add-on"><i class="icon-home"></i></span>
                              <textarea rows="4"  placeholder="Recieving Address" class="input-xlarge" id="receiving_address" name="receiving_address"><?php echo $user->receiving_address;?></textarea>
                          </div>
                      </div>
                  </div>

                  <div class="control-group">
                    <div class="controls">
                      
                        <label class="checkbox">
                          <input type="checkbox" id="applied" name="applied" value="1">Have you ever applied for transcript before.
                        </label>
                      </div>
                    
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