<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
$universities = fetchAllUniversities();
require_once("models/header.php");
include("nav.php");
echo "<h2>List of universities</h2>";
echo "<div class='alert' style='display:none'></div>";
echo "<h4><a href='#' class='add-catalogue'><span class='glyphicon glyphicon-plus-sign'></span> Add New University</a></h4>";
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
			<th>Name University</th>
			<th></th>
			<th></th>
		</tr>";
foreach ($universities as $v1) {
	echo "
	<tr id='".$v1['id']."'>
		<td>".$v1['id']."</td>
		<td class='name'>".$v1['name']."</td>
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
		var func = "university-"+$(this).attr('id');
		var name = $('#name').val();
		$.ajax({
                type: 'POST',
                url: 'controller.php',
      			data: {func:func,name:name},
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
		$(this).parent('td').parent('tr').find('.name').html('<input type="text" class="form-control" name="name" value="'+name+'">');

		$('.form-control').blur(function(event) {
			$(this).attr( "disabled", "disabled" );
			var name = $(this).val();
			var func = "university-edit";
			var inp = $(this);
			var id = $(this).parent('td').parent('tr').attr('id');
			$.ajax({
                type: 'POST',
                url: 'controller.php',
      			data: {func:func,name:name,id:id},
                success: function(response){
	                	$(inp).replaceWith(name);
						button.show();
	                	$('.alert').addClass('alert-success');
	                   	$('.alert').html(response).show();
                },
                error: function(msg){
	                	$(inp).removeAttr('disabled');
                		$('.alert').addClass('alert-danger');
                       	$('.alert').html(response).show();
                }
            });
		});
	});
	$('.delete').click(function(event) {
		$(this).append("<img id='loader' width='50px' src='img/loader.gif'>");
		$(this).addClass('disabled');
		var func = "university-"+$(this).attr('id');
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
