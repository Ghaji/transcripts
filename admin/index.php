<?php require_once("../inc/initialize.php"); ?>
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
    <link rel="stylesheet" href="dist/css/ladda-themeless.min.css">
</head>

<body>
<?php include_layout_template("admin/header_login.php"); ?>
    <div class="container">
        <div class="row">
            <?php include_layout_template("admin/login.php"); ?>
        </div>
    </div>
<?php include_layout_template("footer.php"); ?>
</body>
</html>

<?php require_once(LIB_PATH.DS.'admin_javascript.php'); ?>
<script src="bower_components/jquery/dist/jquery.min.js"></script>


    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/spin.min.js"></script>
    <script src="dist/js/ladda.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/adminlog.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function(){
            Ladda.bind( 'input[type=submit]' );
        });
    </script>
    

<!-- Modal -->
<div class="modal fade" id="displayinfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div> -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal --> 