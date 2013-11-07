<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
$workshops = fetchAllWorkshops();
require_once("models/header.php");
include("nav.php");
echo "<h2>List of Workshops</h2>";
echo "<div class='alert' style='display:none'></div>";
echo "<h4><a href='#' class='add-catalogue'><span class='glyphicon glyphicon-plus-sign'></span> Add New Workshop</a></h4>";
echo "<table class='table table-striped table-hover add-table col-lg-6'>
		<tr>
			<th>Name</th>
			<th>limit</th>
			<th>description</th>
			<th></th>
		</tr>
		<tr>
			<td><input type='text' id='name' placeholder='Please fill the input with the name of the ticket' class='form-control'/></td>
			<td><input type='number' id='price' placeholder='Please fill the input with the price of the ticket' class='form-control'/></td>
			<td><textarea id='qty' placeholder='Please fill the input with the Quantity of tickets' class='form-control'></textarea></td>
			<td><button type='button' id='save' class='btn btn-default save'><span class='glyphicon glyphicon-save'></span></button></td>
		</tr>
	   </table>";
echo "<table class='table table-striped table-hover list'>
		<tr class='head'>
			<th>id</th>
			<th>Workshop Name</th>
			<th>Workshop Limit</th>
			<th>Workshop Description</th>
			<th></th>
			<th></th>
		</tr>";
foreach ($workshops as $v1) {
	echo "
	<tr id='".$v1['id']."'>
		<td>".$v1['id']."</td>
		<td class='name'>".$v1['name']."</td>
		<td class='price'>".$v1['lim']."</td>
		<td class='qty'>".$v1['des']."</td>
		<td><a class='edit' id='edit'><span class='glyphicon glyphicon-edit'></span></a></td>
		<td><a class='delete' id='delete'><span class='glyphicon glyphicon-remove'></span></a></td>
	</tr>
	";
}
echo "</table>";

?>

<script>
$(document).ready(function(){
	$('.add-catalogue').click(function(){
		$('.add-table').toggle("fast");
	});
	$('.save').click(function(event) {
		$(this).append("<img id='loader' width='50px' src='img/loader.gif'>");
		$(this).addClass('disabled');
		var func = "ticket-"+$(this).attr('id');
		var name = $('#name').val();
		var price = $('#price').val();
		var qty = $('#qty').val();
		var act = $('#act').val();
		$.ajax({
                type: 'POST',
                url: 'controller.php',
      			data: {func:func,name:name,price:price,qty:qty,act:act},
                success: function(response){
	                	$('#loader').remove();
	                	$('.save').removeClass('disabled');
	                	$('.alert').addClass('alert-success');
	                   	$('.alert').html(response).show();
                },
                error: function(msg){
	                	$('#loader').remove();
	                	$('.save').removeClass('disabled');
                		$('.alert').addClass('alert-danger');
                       	$('.alert').html("Error!").show();
                }
            });
	});
	$('.edit').click(function(event) {
		var button = $(this);
		button.hide();
		var name = $(this).parent('td').parent('tr').find('.name').html();
		$(this).parent('td').parent('tr').find('.name').html('<input type="text" class="form-control new" name="name" id="name-new" value="'+name+'">');
		var price = $(this).parent('td').parent('tr').find('.price').html();
		$(this).parent('td').parent('tr').find('.price').html('<input type="text" class="form-control new" name="price" id="price-new" value="'+price+'">');
		var qty = $(this).parent('td').parent('tr').find('.qty').html();
		$(this).parent('td').parent('tr').find('.qty').html('<input type="text" class="form-control new" name="qty" id="qty-new" value="'+qty+'">');
		var act = $(this).parent('td').parent('tr').find('.act').html();
		var ch="";
		if (act == 'open'){
			ch = "checked='checked'";
		}else{
			ch = "";
		}
		$(this).parent('td').parent('tr').find('.act').html('<input type="checkbox" class="form-control new" name="act" id="act-new-check" '+ch+'><input type="hidden" id="act-new">');
		$('#act-new-check').change(function() {
				if ($(this).is(':checked')) {
					$("#act-new").val(1);
				  } else {
					$("#act-new").val(0);
				  }
				});
		$('.form-control.new').blur(function(event) {
			$('.form-control.new').attr( "disabled", "disabled" );
			var name = $("#name-new").val();
			var price = $("#price-new").val();
			var qty = $("#qty-new").val();
			var act = $("#act-new").val();
			var func = "ticket-edit";
			var id = $(this).parent('td').parent('tr').attr('id');
			$.ajax({
                type: 'POST',
                url: 'controller.php',
      			data: {func:func,name:name,price:price,qty:qty,act:act,id:id},
                success: function(response){
						button.show();
						if (act == 1){
							actS = "open";
						}else{
							actS = "close";							
						}
						$("#name-new").replaceWith(name);
						$("#price-new").replaceWith(price);
						$("#qty-new").replaceWith(qty);
						$("#act-new-check").replaceWith(actS);
	                	$('.alert').addClass('alert-success');
	                   	$('.alert').html(response).show();
                },
                error: function(msg){
	                	$('.form-control.new').removeAttr('disabled');
                		$('.alert').addClass('alert-danger');
                       	$('.alert').html(response).show();
                }
            });
		});
	});
	$('.delete').click(function(event) {
		$(this).append("<img id='loader' width='50px' src='img/loader.gif'>");
		$(this).addClass('disabled');
		var func = "ticket-"+$(this).attr('id');
		var id = $(this).parent('td').parent('tr').attr('id');
		var row = $(this).parent('td').parent('tr');
		$.ajax({
                type: 'POST',
                url: 'controller.php',
      			data: {func:func,id:id},
                success: function(response){
	                	$('#loader').remove();
	                	$('.save').removeClass('disabled');
	                	$('.alert').addClass('alert-success');
	                   	$('.alert').html(response).show();
	                   	$(row).remove();
                },
                error: function(msg){
	                	$('#loader').remove();
	                	$('.save').removeClass('disabled');
                		$('.alert').addClass('alert-danger');
                       	$('.alert').html(response).show();
                }
            });
	});
});
</script>
