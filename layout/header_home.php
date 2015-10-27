 <?php 
    # Instance of Session
    $session = new Session();

    # Get applicant's record from personal_details table using the session->id
    $user = User::find_by_id($session->id);

    if(isset($user->fullname) && !empty($user->fullname)) {
        $label = ucfirst($user->fullname);
    } else {
        $label = $user->email;
    }

   
    $db = new MySQLDatabase();
    // get all total notifications for the aplicant
    // $notifications_sql = "SELECT count(*) FROM `notifications` WHERE applicant_id ='".$session->id."'";
    // $total_notifications = $db->query($notifications_sql);
    // $total_notifications = $db->fetch_array($total_notifications);
    // $total_notifications = array_shift($total_notifications);

    // get  total  Read And Unread notifications for the aplicant
    //function pd_get_total_int($column, $int_value, $applicant_id)
    function pd_get_total_int($column, $int_value){
        global $db;
        global $session;
        //$query = "SELECT count(*) FROM `notifications` WHERE `".$column."` = ".$int_value;
        $query = "SELECT count(*) FROM `notifications` WHERE `".$column."` = ".$int_value." AND  applicant_id ='".$session->id."'";
        // print_r($query);
        // die();
        $total = $db->query($query);
        $total = $db->fetch_array($total);
        $total = array_shift($total);
        return $total;  
    }
              
    $Unread  = pd_get_total_int('status',1);
    $Read    = pd_get_total_int('status',2);
    $total_notifications = $Unread + $Read;

    // get all total notifications for the aplicant
    $feedback_sql = "SELECT count(*) FROM `feedbacks` WHERE applicant_id ='".$session->id."'";
    $total_feedback = $db->query($feedback_sql);
    $total_feedback = $db->fetch_array($total_feedback);
    $total_feedback = array_shift($total_feedback);
    ?>
 
<div class="navbar navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#">University of Jos ( TPS )</a>
            <div class="nav-collapse collapse">
                <p class="navbar-text pull-right">
                    Logged in as <a href="#" class="navbar-link"><?php echo $label; ?>
                    <img src="passport/74.jpg" width="26px" height="25px" class="img-circle"></a> 
                    <a href="logout.php?logoff=logoff&u=<?php echo $user->email; ?>" class="navbar-link">(Sign out)</a>
                </p>
                <ul class="nav">
                    <li class="active"><a href="home.php"><i class=" icon-home"></i>Home</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class=" icon-wrench"></i>Settings <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="nav-header">Account</li>
                            <li><a href="profile.php">Profile</a></li>
                            <li><a href="#">Upload Passport</a></li>
                            <li><a href="#">Change Password</a></li>
                            <li class="divider"></li>
                            <li class="nav-header">Logout</li>
                            <li><a href="logout.php?logoff=logoff&u=<?php echo $user->email; ?>">Sign out</a></li>
                        </ul>
                    </li>
                   <li class="dropdown">
                                <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown"><span><i class="icon-bell"></i>
                                 </span> Notifications <span class="badge badge-important"><?php if(isset($Unread)) echo $Unread; ?></span>
                                 <b class="caret"></b></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
                                    <li class="nav-header">Active</li>
                                    <li>
                                        <a tabindex="-1" href="check_notifications.php?type=1">Unread Notifications
                                         <span class="badge badge-important"><?php if(isset($Unread)) echo $Unread; ?></span></a>
                                    </li>
                                   
                                    <li class="divider"></li>
                                    <li class="nav-header">Inactive</li>
                                    <li>
                                        <a tabindex="-1" href="check_notifications.php?type=2">Read Notifications 
                                            <span class="badge badge-success"><?php if(isset($Read)) echo $Read; ?></span></a>
                                    </li>
                                   
                                    <li class="divider"></li>
                                    <li class="nav-header">Send</li>
                                    <li>
                                        <a tabindex="-1" href="check_my_feedbacks.php">Send feedback
                                            <span class="badge badge-success"><?php if(isset($total_feedback)) echo $total_feedback; ?></span></a>
                                    </li>
                                    <li class="divider"></li>
                                    <li class="nav-header">ALL</li>
                                    <li>
                                        <a tabindex="-1" href="check_notifications.php?type=3"><b>View All</b>
                                            <span><i class="icon-chevron-right"></i> </span> <span class="badge badge-info"><?php if(isset($total_notifications)) echo $total_notifications; ?></span></a>
                                    </li>
                                </ul>
                            </li>
                    <li><a href="application_faq.php">FAQs</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>