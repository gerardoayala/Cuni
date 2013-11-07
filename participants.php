<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
$participants = fetchAllParticipants();
require_once("models/header.php");
include("nav.php");
echo "<h2>List of Participants</h2>";
echo "<div class='alert' style='display:none'></div>";
echo "<table class='table table-striped table-hover add-table col-lg-6'>
		<tr>
			<th>Name</th>
			<th></th>
		</tr>
		<tr>
			<td><input type='text' id='name' placeholder='Please fill the input with the name of the university' class='form-control'/></td>
			<td><button type='button' id='save' class='btn btn-default save'><span class='glyphicon glyphicon-save'></span></button></td>
		</tr>
	   </table>";
echo "<table class='table table-striped table-hover list'>
		<tr class='head'>
			<th>id</th>
			<th>Name</th>
			<th>Last name</th>
			<th>University</th>
			<th>Campus</th>
			<th>Student number</th>
			<th>E-mail</th>
			<th>Phone</th>
			<th>Ticket</th>
			<th>Paymeny</th>
			<th></th>
			<th></th>
		</tr>";
foreach ($participants as $v1) {
	if($v1['pay'] == $v1['price']){
		$class = "success";
		$disabled = "disabled='disabled'";
	}else{
		$class="";
		$disabled ="";
	}
	echo "
	<tr id='".$v1['id']."' class='".$class."'>
		<td>".$v1['id']."</td>
		<td>".$v1['name']."</td>
		<td>".$v1['lastname']."</td>
		<td>".$v1['uni']."</td>
		<td>".$v1['campus']."</td>
		<td>".$v1['mat']."</td>
		<td>".$v1['email']."</td>
		<td>".$v1['phone']."</td>
		<td><a class='ticket' data-container='body' data-toggle='popover' data-placement='top' data-content='Type:".$v1['ticketName']." - Price: ".$v1['price']."' data-original-title='' title='Ticket: ".$v1['ticket']."'>".$v1['ticket']."</a></td>
		<td><input type='text' id='".$v1['ticketid']."' price='".$v1['price']."' class='payed form-control' $disabled  style='width:60px' value='".$v1['pay']."'></td>
		<td><a class='edit' id='edit'><span class='glyphicon glyphicon-edit'></span></a></td>
		<td><a class='delete' id='delete'><span class='glyphicon glyphicon-remove'></span></a></td>
	</tr>
	";
}
echo "</table>";

?>
<script>
$(document).ready(function(){
	$('.ticket').popover();
	$('.payed').blur(function(event) {
		$(this).attr( "disabled", "disabled" );
		var id = $(this).attr('id');
		var price = $(this).attr('price');
		var pay = $(this).val();
		var func = "update-pay-ticket"
		var inp = $(this);
		if (parseInt(pay) > parseInt(price)){
	                	$('.alert').addClass('alert-danger');
	                   	$('.alert').html("Error: Limit Price exceeded").show();
	                	$(inp).removeAttr('disabled');
		}else{
		$.ajax({
                type: 'POST',
                url: 'controller.php',
      			data: {func:func,pay:pay,idticket:id},
                success: function(response){
	                	$(inp).replaceWith(pay);
	                	$('.alert').addClass('alert-success');
	                   	$('.alert').html(response).show();
                },
                error: function(msg){
	                	$(inp).removeAttr('disabled');
                		$('.alert').addClass('alert-danger');
                       	$('.alert').html(response).show();
                }
        });
			}
	});
});
</script>
