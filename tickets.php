<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
$tickets = fetchAllTicket();
require_once("models/header.php");
include("nav.php");
echo "<h2>Tickets</h2>";
echo "<div class='alert' style='display:none'></div>";
echo "<h4></h4>";
echo "<table class='table table-striped table-hover list'>
		<tr class='head'>
			<th>Ticket Number</th>
			<th>Tickey Type</th>
		</tr>";
foreach ($tickets as $v1) {
	if($v1['active'] != 0){
		$class = "success";
	}else{
		$class = "";
	}
	echo "
	<tr id='".$v1['id']."' class='".$class."'>
		<td class='number'>".$v1['ticket']."</td>
		<td class='type'>".$v1['type']."</td>
	</tr>
	";
}
echo "</table>";