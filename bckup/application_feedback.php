<?php
    require_once("inc/initialize.php");
    require_once("inc/vendor/autoload.php");

    use Carbon\Carbon;
    
    # Instance of Carbon Class with the current time
    $date_now = new Carbon('now');

    if(!$session->is_logged_in()) {
    	header("location: index.php");
    }

    # Get user details
    $user = User::find_by_id($session->id);
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
                      <?php include_layout_template("application_feedback.php"); ?>
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

        <script type="text/javascript" src="js/tiny_mce/tiny_mce.js"></script>
        <script type="text/javascript">
            tinyMCE.init({
                // General options
                //mode : "exact",
                mode : "textareas",
                elements : "textarea",
                theme : "advanced",
                skin : "o2k7",
                plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

                // Theme options
                theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
                theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
                theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
                theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
                theme_advanced_toolbar_location : "top",
                theme_advanced_toolbar_align : "left",
                theme_advanced_statusbar_location : "bottom",
                theme_advanced_resizing : true,

                // Example content CSS (should be your site CSS)
                content_css : "css/tiny_mce/css/word.css",

                // Drop lists for link/image/media/template dialogs
                template_external_list_url : "css/tiny_mce/css/lists/template_list.js",
                external_link_list_url : "css/tiny_mce/css/lists/link_list.js",
                external_image_list_url : "css/tiny_mce/css/lists/image_list.js",
                media_external_list_url : "css/tiny_mce/css/lists/media_list.js",

                // Style formats
                style_formats : [
                    {title : 'Bold text', inline : 'b'},
                    {title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
                    {title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
                    {title : 'Example 1', inline : 'span', classes : 'example1'},
                    {title : 'Example 2', inline : 'span', classes : 'example2'},
                    {title : 'Table styles'},
                    {title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
                ],

                // Replace values for the template plugin
                template_replace_values : {
                    username : "Some User",
                    content : "receiving_address"
                }
            });
        </script>
        <script src="js/jquery.js"></script>
        <script src="css/assets/js/bootstrap.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/application_feedback.js"></script>
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