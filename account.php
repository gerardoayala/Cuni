<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("models/header.php");

include("nav.php");

echo "
<div class='row'>
<div class='col-lg-12'>
<h2>Welcome, $loggedInUser->displayname. </h2>
<h5>".date("F j, Y")."</h5>
</div>
</div>";

require_once("models/footer.php");

?>
