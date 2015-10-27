<?php
    require_once("inc/initialize.php");
    require_once("inc/vendor/autoload.php");

    use Carbon\Carbon; 
    
    // Instance of Carbon Class with the current time
    $date_now = new Carbon('now');

    if (!$session->is_logged_in()) {
    	redirect_to("index.php");
    }

    # Instance of User
    $user = User::find_by_id($session->id); 
     
    if(isset($user->programme_id)) {
        $prog= Programme::find_by_id($user->programme_id);
    }

    if(isset($prog->department_id)) {
        $dept= Department::find_by_id($prog->department_id);
    }

    if(isset($dept->faculty_id)) {
      $fac= Faculty::find_by_id($dept->faculty_id);     
    }


    if(isset($user->full_name) && !empty($user->full_name)) {
        $label = ucfirst($user->full_name);
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>University of Jos, Nigeria - Transcript System</title>
        <?php 
          	require_once(LIB_PATH.DS.'javascript.php');
          	require_once(LIB_PATH.DS.'css.php');
        ?>
        <style type="text/css">
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
            .sidebar-nav {
                padding: 9px 0;
            }
        </style>
    </head>
    <body>
        <!-- beginnning of main content-->
        <?php include_layout_template("header_home.php"); ?>

        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3">
                    <?php include_layout_template("left_menu.php"); ?>
                </div><!--/span-->
                <div class="span8">
                    <div class="hero-unit">
                        <h3><img src="passport/74.jpg" width="104px" height="100px" class="img-circle"> </h3>
                        <h4><p class="label label-info"><?php echo $label; ?> <i><span class="label label-warning"> Profile </span></i></p></h4>
                        <table class="table table-hover table-striped table-bordered">
                            <tbody>
                                <tr>   
                                    <td><i class="iconic-hash"> </i> Matriculation No : </td>
                                    <td colspan="2"><span class="label label-success"><?php if(isset($user->matriculation_no)) echo $user->matriculation_no; ?></span></td>
                                </tr>
                                <tr>                                     
                                    <td><i class="icon-book"> </i> Programme : </td>
                                    <td colspan="2"><span class="label label-success"><?php if(isset($prog->programme_name))  echo $prog->programme_name; ?> </span></td>
                                </tr>
                                <tr>                                      
                                    <td><i class="icon-home"></i> Department: </td>
                                    <td colspan="2"><span class="label label-success"><?php if(isset($dept->department_name)) echo $dept->department_name; ?></span></td>
                                </tr>
                                <tr>
                                    <td><i class="iconic-home "></i> Faculty :  </td>
                                    <td colspan="2"><span class="label label-success"><?php if(isset($fac->faculty_name)) echo $fac->faculty_name; ?></span></td>
                                </tr>
                                <tr>        
                                    <td><i class="icon-calendar"></i> Entry  Year :</td>
                                    <td colspan="2"><span class="label label-success"><?php if(isset($user->year_of_entry)) echo $user->year_of_entry; ?></span></td>
                                </tr>
                                <tr>   
                                    <td><i class="icon-calendar"></i> Graduation year :</td>
                                    <td colspan="2"><span class="label label-success"><?php if(isset($user->year_of_graduation)) echo $user->year_of_graduation; ?></span></td>
                                </tr>  
                                <tr>   
                                    <td colspan="2"> <button type="button" onClick="document.location.href='edit_profile.php';" class="btn btn-primary"><i class="iconic-pen"></i> Edit</button></span></td>
                                </tr>   
                            </tbody>
                        </table>
                        <hr>
                        <p><span class="label label-info">Last account activity</span>: <?php echo Carbon::createFromTimeStamp(strtotime($user->last_login))->diffForHumans(); ?></p>
                    </div> 
                  <!-- </div>  -->    
                </div><!--/span-->
            </div><!--/row-->
        </div><!--/.fluid-container--> 
        
        <div id="displayinfo" class="modal hide" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;">
            <div class="modal-body ajax_data"></div>
            <div class="modal-footer">
               <a href="#" class="btn" id="close">Close</a>
            </div> 
        </div>
        
        <!--The Main Content Here Please-->
        <?php include_layout_template("footer.php"); ?>

        <script src="js/jquery.js"></script>
        <script src="css/assets/js/bootstrap.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script type="text/javascript">
            jQuery.noConflict();
            jQuery(document).ready(function(){
                jQuery('.printbtn').click(function(){
                    window.print();
                });
            });
        </script>
        <script type="text/javascript">jQuery('.dropdown-toggle').dropdown();</script>
    </body>
</html>