      <!-- Static navbar -->
      <div class='navbar navbar-default'>
        <div class='navbar-header'>
          <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
          </button>
          <a class='navbar-brand' href='index.php'><?php echo $websiteName;?></a>
        </div>
<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

if (!securePage($_SERVER['PHP_SELF'])){die();}

//Links for logged in user
if(isUserLoggedIn()) {
	echo "
        <div class='navbar-collapse collapse'>
        	<ul class='nav navbar-nav'>
              <li><a href='register-participant.php'><span class='glyphicon glyphicon-list-alt'></span> Register</a></li>
              <li><a href='participants.php'><span class='glyphicon glyphicon-user'></span> Participants</a></li>
              <li><a href='attendance.php'><span class='glyphicon glyphicon-dashboard'></span> Attendance</a></li>
              <li><a href='tickets.php'><span class='glyphicon glyphicon-barcode'></span> Tickets</a></li>
              <li><a href='reports.php'><span class='glyphicon glyphicon-stats'></span> Reports</a></li>
	            </ul>
         ";
	
	//Links for permission level 2 (default admin)
	if ($loggedInUser->checkPermission(array(2))){
	echo "
            <ul class='nav navbar-nav navbar-right'>
            <li><a href='user_settings.php'><span class='glyphicon glyphicon-user'></span> ".$loggedInUser->displayname."</a></li>
	        <li class='dropdown'>
              <a href='#' class='dropdown-toggle' data-toggle='dropdown'><span class='glyphicon glyphicon-wrench'></span> Settings <b class='caret'></b></a>
              <ul class='dropdown-menu'>
        <li><a href='admin_tickets.php'>Admin Tickets</a></li>
        <li><a href='admin_universities.php'>Admin Universities</a></li>
        <li><a href='admin_workshops.php'>Admin Workshops</a></li>
        <li><a href='admin_configuration.php'>Admin Configuration</a></li>
				<li><a href='admin_users.php'>Admin Users</a></li>
				<li><a href='admin_permissions.php'>Admin Permissions</a></li>
				<li><a href='admin_pages.php'>Admin Pages</a></li>
              </ul>
            </li>
            	 <li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>
		</ul>";
	}
} 
//Links for users not logged in
else {
	echo " 
			<div class='navbar-collapse collapse'>
		    <ul class='nav navbar-nav'></ul>";
}
echo " 
        </div><!--/.nav-collapse -->
      </div>";

?>
