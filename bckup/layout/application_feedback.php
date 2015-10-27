<?php
    $database = new MySQLDatabase();
    $session = new Session();
    $user = User::find_by_id($session->id);
?>
<h5 align="center"> Application Feedback/Complain</h5>
<hr>
<h6 align="center">All Fields are Required</h6>
<!--  <form action="" method="POST" class="create_form form-horizontal" > -->
<form action="" method="POST" class="form-horizontal feedback" role="form">
    <!-- Title  of the feedback or Complain
          for Application: goes to ICT.
          for Dispachement goes to Registra.
          for payment goes to Busary.
     -->   
    <div class="control-group">
        <label class="control-label" for="inputTitle">Title</label>
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-chevron-down"></i></span>
                <select class="input-xlarge" name="title_id" id="title_id" >
                    <option value="">--Title--</option>
                    <option value="1">Application</option>
                    <option value="2">Dispachement</option>
                    <option value="3">Payment</option>   
                </select>
            </div>
        </div>
    </div>

    <!-- Recieving Address -->
    <div class="control-group">
        <label class="control-label" for="inputAdress">Recieving Address</label> 
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-home"></i></span>
                <textarea rows="4"  placeholder="Recieving Address" class="input-xlarge" id="receiving_address" name="receiving_address"><?php //echo $user->receiving_address;?></textarea>
            </div>
        </div>
    </div>

    <!-- Button for submit -->
    <div class="control-group">
        <div class="controls">   
            <button type="submit" class="btn btn-primary" id="feedback" name="feedback"><i class="iconic-pen"></i> Submit</button>
            <button type="button" onClick="document.location.href='index.php';" class="btn"><i class="iconic-x"></i> Cancel</button>
        </div>  
    </div>
    <hr>
</form>