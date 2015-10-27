<?php require_once("../inc/initialize.php"); 
      require_once("../inc/vendor/autoload.php");

        use Carbon\Carbon;
        
        // Instance of Carbon Class with the current time
        $date_now = new Carbon('now');

        if(!$session->is_admin_logged_in()){
            redirect_to('index.php');
        }
        $role = $_SESSION["role_id"];
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Admin Page</title>
    <?php require_once(LIB_PATH.DS.'admin_css.php'); ?>
     <!-- Timeline CSS -->
    <link href="dist/css/timeline.css" rel="stylesheet">

</head>

<body>
 <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php include_layout_template("admin/header_home.php"); ?>
            <?php include_layout_template("admin/menu_home.php"); ?>
        </nav>

        <div id="page-wrapper">
            <?php include_layout_template("admin/main_content.php"); ?>
        </div> 

        <?php include_layout_template("footer.php"); ?>
</div>

</body>
</html>

    <?php require_once(LIB_PATH.DS.'admin_javascript.php'); ?>


    <!-- Morris Charts JavaScript -->
    <script src="bower_components/raphael/raphael-min.js"></script>
    <script src="bower_components/morrisjs/morris.min.js"></script>
    <script src="js/morris-data.js"></script>

<!-- Modal -->
<div class="modal fade" id="displayinfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal --> 