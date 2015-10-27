<?php
    # Instance of MySQLDatabase
    $database = new MySQLDatabase();
    
    # Instance of Session
    $session = new Session();
    
    # Get the user details
    $user = User::find_by_id($session->id);
?>
<h3 align="center">Application Feedback/Complain</h3>
<hr>
<h6 align="center">All Fields are Required</h6>
<form action="" method="POST" class="form-horizontal feedback" role="form">
    <!-- Title  of the feedback or Complain
          for Application: goes to ICT.
          for Dispachement goes to Registra.
          for payment goes to Busary.
     -->   
    <div class="control-group">
        <label class="control-label" for="inputTitle">Type</label>
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-chevron-down"></i></span>
                <select class="input-xlarge" name="title_id" id="title_id" >
                   
                    
                  <?php  
                    $sql_ft= "SELECT * from feedback_types where visible =1";
                    $feedtype= FeedbackType:: find_by_sql($sql_ft);
                    foreach ($feedtype as $feedback_type) {
                    ?>
                      <option value=" <?php echo $feedback_type->id ;?>"> <?php echo $feedback_type->type ;?> </option> 
                 <?php
                    }
                  ?>
                </select>
            </div>
        </div>
    </div>
  
    <!-- Comment -->
    <div class="control-group">
      <label class="control-label" for="inputComment">Comment</label> 
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-comment"></i></span>
                <textarea rows="4" maxlength="200" placeholder="Comment (Max 200 characters)" class="input-xlarge" id="comment" name="comment"><?php //echo $user->comment;?></textarea>
            </div>
            <!-- display the counter -->
            <div id="textarea_feedback"></div>
        </div>
    </div>

    <!-- Button for submit -->
    <div class="control-group">
        <div class="controls">   
            <button type="submit" class="btn btn-primary" id="feedback" name="feedback"><i class="iconic-pen"></i> Submit</button>
        </div>  
    </div>
    
    <hr>
</form>