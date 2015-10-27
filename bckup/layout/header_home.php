 <?php $session = new Session();

  // Get applicant's record from personal_details table using the session->id
  $user = User::find_by_id($session->id);

  if(isset($user->fullname) && !empty($user->fullname)) {
    $label = ucfirst($user->fullname);
  } else {
    $label = $user->email;
  }

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
              <li class="active"><a href="home.php">Home</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <b class="caret"></b></a>
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
              <li><a href="#contact">Notification</a></li>
              <li><a href="#faq">FAQs</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
  </div>