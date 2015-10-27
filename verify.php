<?php 
require_once("inc/initialize.php");
$md5mail = customDecrypt($_GET['email']);

//checks if the link is actually from the mail sent 
	if(!isset($md5mail))
	{
		redirect_to('index.php');
	}
	else
	{
		
		$decryptedmail = $md5mail;
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>University of Jos, Nigeria</title>
<?php require_once(LIB_PATH.DS.'css.php'); 
?>
</head>
<body>
<?php include_layout_template("header.php"); ?>

<!--The Main Content Here Please-->
<div class="container">
<div class="row-fluid">
    <div class="span7 create">
    <h5 align="center">Mail Account Verification</h5>
    <hr>
    <h5 align="center">To verify your account use your password</h5>
    <form class="contact-us verify" action="#" >
          <div class="control-group">
            <label class="control-label" for="inputEmail">Password</label>
            <div class="controls">
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-lock"></i></span>
                    <input type="password" class="input-xlarge" required id="epassword" name="epassword" placeholder="Enter Password" />
                    <input type="hidden" value="<?php echo $decryptedmail; ?>" name="email" id="email" />
                </div>
            </div>
          </div>
          
            <div class="control-group">
            <label class="control-label" ></label>
            <div class="controls">
            
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="button" onClick="document.location.href='index.php';" class="btn btn-warning">Cancel</button>
            </div>
          </div>
        </form>
    </div>

    <div class="span5 create">
    <h5 align="center">Quick Guide...</h5>
    <hr>

      <ul>
          <li><span class="label label-success">Steps on how to verify your account</span></li>
      </ul>

        <ol>
            <li>Use the password you entered when creating the account.</li>
            <li>If the password is correct it will provide a button for you to proceed </li>
            <br><br><br><br>
        </ol>

    </div>
</div>


    
</div>
<!--The Main Content Here Please-->
<?php include_layout_template("footer.php"); ?>
</body>
</html>
<?php require_once(LIB_PATH.DS.'javascript.php'); ?>
<script src="js/jquery.js"></script>
<script src="css/assets/js/bootstrap.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/verifymail.js"></script>
<div id="displayinfo" class="modal hide" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;">
      <div class="modal-body ajax_data"></div>
      <div class="modal-footer">
         <a href="#" class="btn" id="close">Close</a>
 </div> 
 </div>

