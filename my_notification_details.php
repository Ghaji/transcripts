<?php
    require_once("inc/initialize.php");
    require_once("inc/vendor/autoload.php");

    use Carbon\Carbon;
    $dt=Carbon::now();
    if(!$session->is_logged_in()) {
        redirect_to("index.php");
    }
    
    # Instance of Carbon Class with the current time
    $date_now = new Carbon('now');
    
    $label=customDecrypt($_GET['note']);

    if($label) {
        $note_details= Notification:: find_by_id($label);
        if ($note_details->status==1) {
            $notification              = new Notification();
            $notification->db_fields   = array('id', 'applicant_id', 'title', 'content', 'sender_admin_id', 'created_at', 'updated_at', 'status','visible');
            $notification->id          = $note_id;
          //  $notification->read_date   = $dt ;
            $notification->status      = 2;
            $notification->save();
        } 
          
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
            <div class="span9">
             
                <div class="hero-unit">
                    <h4> <p class="label label-info">Notification Details </p> </h4>
                    <table class="table table-hover table-striped table-bordered">
                        <tbody>
                           <tr>
                                <td > Note <i class="iconic-hash"></i> </td> 
                                <td colspan="2"> <span class="label label-success"> <?php echo $label;?></span> </td>
                           </tr>

                            <tr>  
                              <td>  Title <i class="icon-tags"> </i> </td>
                                  <td colspan="2"><span class="label label-success"><?php echo  $note_details->title; ?> </span></td>
                            </tr>
                             
                            <tr>
                                <td colspan="3"><h3> Content  <i class="icon-comment"> </i></h3> <br>
                                    <?php echo  $note_details->content; ?>
                                </td>
                           </tr>
                             <tr>
                                   <?php $user=User::find_by_id($note_details->sender_admin_id);?>
                                   <td><i class="icon-envelope"> </i> Send by : </td>
                                   <td><i class="icon-user"> </i>   <?php echo  $user->full_name; ?> </td>       
                                   <td >  Date: <i class="icon-calendar"></i>
                                   <?php echo $note_details->updated_at; ?></td>

                            </tr> 
                                                  
                       
                        </tbody>
                    </table>
                                     <p>
                                     <button type="button" onClick="document.location.href='application_feedback.php';" class="btn btn-large btn-success">
                                        <i class="icon-arrow-left"></i> Reply
                                     </button> 
                                    
                                    </p>
              </div>
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