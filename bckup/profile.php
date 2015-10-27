<?php
    require_once("inc/initialize.php");
    require_once("inc/vendor/autoload.php");

    use Carbon\Carbon;
    
    // Instance of Carbon Class with the current time
    $date_now = new Carbon('now');

    if(!$session->is_logged_in())
    {
    	 header("location: index.php");
    }

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
                        <h3><img src="passport/74.jpg" width="104px" height="100px" class="img-circle"> User Profile</small></i></h3>
                        <table class="">
                            <tbody>
                                <tr>
                                    <td> <i class="icon-certificate"> </i> Matriculation No : </td>
                                    <td><?php if(isset($user->matriculation_no)) echo $user->matriculation_no; ?></td>
                                </tr>
                                <tr>
                                    <td> <i class="icon-leaf"> </i> Gender :</td>
                                    <td> 
                                        <?php 
                                            if(isset($user->gender_id)) {
                                                switch ($user->gender_id) {
                                                    case '1':
                                                        $sex= 'Female';
                                                        break;
                                                    default:
                                                        $sex=  'Male';
                                                        break;
                                                 }
                                            }  
                                            echo $sex ; 
                                        ?>
                                    </td> 
                                </tr> 
                                <tr>
                                    <td> <i class="icon-calendar"> </i> Date of Birth:</td>
                                    <td><?php if(isset($user->date_of_birth)) echo $user->date_of_birth; ?></td>
                                </tr>
                                <tr>
                                    <td> <i class="icon-book"> </i> Programme :</td>
                                    <td> <?php if(isset($prog->programme_name))  echo $prog->programme_name; ?></td> 
                                </tr>
                                <tr> 
                                    <td> <i class="icon-home"> </i> Department :</td>
                                    <td><?php if(isset($dept->department_name)) echo $dept->department_name; ?></td> 
                                </tr>
                                <tr>
                                    <td> <i class="icon-home"> </i> Faculty :</td>
                                    <td><?php if(isset($fac->faculty_name)) echo $fac->faculty_name; ?></td>
                                </tr>
                                <tr>
                                    <td> <i class="icon-new-move"> </i> Entry Mode:</td>
                                    <td><?php if(isset($user->mode_of_entry_id)) echo $user->mode_of_entry_id; ?></td>
                                </tr>
                                <tr>
                                    <td> <i class="icon-circle-arrow-right"> </i> Entry  Year :</td>
                                    <td><?php if(isset($user->year_of_entry)) echo $user->year_of_entry; ?></td>
                                </tr> 
                                <tr>
                                    <td> <i class="icon-circle-arrow-left"> </i> Graduation year :</td>
                                    <td><?php if(isset($user->year_of_graduation)) echo $user->year_of_graduation; ?></td>
                                </tr>
                                <tr>
                                    <td> <i class="icon-window"> </i> Phone :</td>
                                    <td><?php if(isset($user->phone_number)) echo $user->phone_number; ?></td>
                                </tr>
                                <tr>
                                    <td> <i class="icon-envelope"> </i> Email :</td>
                                    <td><?php if(isset($user->email)) echo $user->email; ?></td>
                                </tr>
                                <tr>
                                    <td> <i class="icon-road"> </i> Address :</td>
                                    <td><?php if(isset($user->contact_address)) echo $user->contact_address; ?></td>
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