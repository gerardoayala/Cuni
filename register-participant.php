<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
$universities = fetchAllUniversities();
$tickets = fetchAllTickets();
require_once("models/header.php");
?>
  <script src="js/jquery-validate.js"></script>
<?php
include("nav.php");
echo "<h2>List of delegates</h2>";
echo "<div class='alert' style='display:none'></div>";
echo "
<div class='row'><div class='col-lg-6 col-lg-offset-3'>
<form class='form-horizontal' id='form' role='form' name='delegate' method='post'>
  <div class='form-group'>
    <label for='name' class='col-lg-3 control-label'>Name</label>
    <div class='col-lg-9'>
		<input type='text' name='name'  id='name' class='form-control' value='' />
    </div>
  </div>
    <div class='form-group'>
    <label for='lastname' class='col-lg-3 control-label'>Last Name</label>
    <div class='col-lg-9'>
		<input type='text' name='lastname' id='lastname' class='form-control' value='' />
    </div>
  </div>  
  <div class='form-group'>
    <label for='email' class='col-lg-3 control-label'>Email</label>
    <div class='col-lg-9'>
    <input type='email' name='email' id='email' class='form-control' value='' />
    </div>
  </div>
  <div class='form-group'>
    <label for='phone' class='col-lg-3 control-label'>Phone</label>
    <div class='col-lg-9'>
    <input type='tel' name='phone' id='phone' class='form-control' value='' />
    </div>
  </div>
  <div class='form-group'>
    <label for='email' class='col-lg-3 control-label'>Student Number</label>
    <div class='col-lg-9'>
    <input type='text' name='mat' id='mat' class='form-control' value='' />
    </div>
  </div>
    <div class='form-group'>
    <label for='school' class='col-lg-3 control-label'>School</label>
    <div class='col-lg-9'>
		<select name='school' id='school' class='form-control'>
		<option value=''>Selecciona una opción</option>";

foreach ($universities as $v1) {
	
	echo "<option value='".$v1['id']."'>".$v1['name']."</option>";
}
	echo "
		</select>
    </div>
  </div>  
  <div class='form-group'>
    <label for='email' class='col-lg-3 control-label'>Campus</label>
    <div class='col-lg-9'>
    <input type='text' name='campus' id='campus' class='form-control' value='' />
    </div>
  </div>
  <div class='form-group'>
    <label for='settings' class='col-lg-3 control-label'>Ticket Type</label>
    <div class='col-lg-9'>
		<select id='ticket' name='ticket' class='form-control'>
		<option value=''>Selecciona una opción</option>";

foreach ($tickets as $v2) {
	
	echo "<option value='".$v2['id']."'>".$v2['name']."</option>";
}
		echo"
		</select>
    </div>
  </div>
  <div class='form-group'>
    <div class='col-lg-9 col-lg-offset-3'>
		<button type='button' id='saveStudent' class='btn btn-default save-student'><span class='glyphicon glyphicon-save'></span> Save</button>
    </div>
  </div>
</div></div>
</form>";

?>
<script>
$(document).ready(function(){
	$('.add-delegate-table').show("fast");
	$('.delete-delegate').click(function(){
		var id = $(this).parent('td').parent('tr').attr('id');
		var comm = $(this).parent('td').parent('tr').find('committee').html();
		var func = $(this).attr('id');
				$.ajax({
                type: 'POST',
                url: 'controller.php',
      			data: {func:func,id:id,comm:comm},
                success: function(response){
                   	$('.alert').html(response).show();
                },
                error: function(msg){
                       	$('.alert').html(response).show();
                	
                }
            }); 
	});
	$('.save-student').click(function(event) {
    datastring = $("#form").serializeArray();
    datastring.push({name: 'func', value: "save-participant"});
    $(this).append("<img id='loader' width='50%' src='img/loader.gif'>");
      $.ajax({
                type: 'POST',
                url: 'controller.php',
                data: datastring,
                success: function(response){
                    $('.alert').addClass('alert-success');
                     window.setTimeout(function() { 
                    location.reload();
                    }, 1000);
                        $('.alert').html(response).show();
                    },
                error: function(msg){
                      $('.alert').addClass('alert-danger');
                      $('.alert').html(response).show();
                  
                }
            }); 

	});	

});
</script>
