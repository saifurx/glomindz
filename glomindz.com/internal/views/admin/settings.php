<div class="container-fluid">
  <div class="row-fluid">
	<h3 class="pull-left">Settings</h3>
  </div>
	<hr>
  <div class="row-fluid">
    <div class="span2">
    	<ul class="nav nav-pills nav-stacked">
			<!--<li id="show_deliverables_section" class="active"><a href="#">Deliverables</a></li>-->
			<li id="show_pd_section"><a href="#">Project Deliverables</a></li>
			<!--<li id="show_complexity_section"><a href="#">Complexity</a></li>-->
			<li id="show_users_section"><a href="#">Users</a></li>
		</ul>
    </div>
    <div class="span10">
    	<section id="deliverables_section" class="hide">
    		<div class="row-fluid">
				<h3 class="pull-left">Deliverables</h3>
				<button class="btn btn-success pull-right" onclick="show_new_deliverable_form()">New Deliverables</button>
			</div>
			<hr>
			<div class="row-fluid" id="new_deliverables_row">
    			<form class="form-inline" id="new_deliverable_form">
				      <input name="name" class="input-large" placeholder="Name" type="text">
				      <input name="category" class="input-large" placeholder="Category" type="text">
				      <input name="optimum_man_days" class="input-large" placeholder="Optimum Man Days" type="number">
				      <input name="optimum_duration" class="input-large" placeholder="Optimum Duration" type="number">
				  	  <button type="button" class="input-small btn btn-primary pull-right" id="save_new_deliverable_btn" onclick="save_new_deliverable();">Save</button>
				</form>
				
				<form class="form-inline" id="edit_deliverable_form">
					  <input id="deliverable_id" type="hidden" name="deliverable_id">
				      <input id="edit_deliverable_name" name="name" class="input-large" placeholder="Name" type="text">
				      <input id="edit_deliverable_category" name="category" class="input-large" placeholder="Category" type="text">
				      <input id="edit_deliverable_optimum_man_days" name="optimum_man_days" class="input-large" placeholder="Optimum Man Days" type="number">
				      <input id="edit_deliverable_optimum_duration"  name="optimum_duration" class="input-large" placeholder="Optimum Duration" type="number">
				 	  <button type="button" class="input-small btn btn-primary pull-right" id="update_deliverable_btn" onclick="update_deliverable();">Update</button>
				</form>
    		</div>
    		<div class="row-fluid" id="edit_deliverables_row">
    		
    		</div>
    		<div class="row-fluid" id="deliverables_list_row">
	    		<table class="table table-bordered table-condensed">
					<thead>
						<tr>
							<th>#</th>
							<th>Deliverable Name</th>
							<th>Company</th>
							<th>Client Type</th>
							<th>Mobile</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="deliverables_list">
						
					</tbody>
				</table>    		
    		</div>
    	</section>
    	
    	<section id="project_deliverables_section">
    		<div class="row-fluid">
				<h3 class="pull-left">Project Deliverables</h3>
				<button class="btn btn-success pull-right" onclick="show_new_project_deliverable_form()">New Project Deliverables</button>
			</div>
			<hr>
			<div class="row-fluid" id="new_project_deliverables_row">
    			<form class="form-inline" id="new_project_deliverables_form">
				      <input name="name" id="project_name" class="input-medium" placeholder="Project" type="text">
				      <input type="hidden" id="project_id" name="project_id">
				      <br><br>
				      <input id="name" name="name" class="input-medium" placeholder="Name" type="text">
				      <input id="deleverables_name" name="deleverables_name" class="input-medium" placeholder="Deliverable" type="text">
				      <input type="hidden" id="deleverables_id" name="deleverables_id">
				      <input name="estimate_man_days" class="input-medium" placeholder="Estimate Man Days" type="number">
				      <input name="actual_man_days" class="input-medium" placeholder="Actual Man Days" type="number">
				      <input class="input-medium" type="text" id="start_date" name="start_date" placeholder="Start Date">
				      <input class="input-medium" type="text" id="end_date" name="end_date" placeholder="End Date">
				  	  <button type="button" class="input-small btn btn-primary pull-right" id="save_new_project_deliverable_btn" onclick="save_new_project_deliverable();">Save</button>
				</form>
				
				<form class="form-inline" id="edit_project_deliverables_form">
					  <input id="deliverable_id" type="hidden" name="deliverable_id">
				      <input id="edit_deliverable_name" name="name" class="input-large" placeholder="Name" type="text">
				      <input id="edit_deliverable_category" name="category" class="input-large" placeholder="Category" type="text">
				      <input id="edit_deliverable_optimum_man_days" name="optimum_man_days" class="input-large" placeholder="Optimum Man Days" type="number">
				      <input id="edit_deliverable_optimum_duration"  name="optimum_duration" class="input-large" placeholder="Optimum Duration" type="number">
				 	  <button type="button" class="input-small btn btn-primary pull-right" id="update_project_deliverable_btn" onclick="update_project_deliverable();">Update</button>
				</form>
    		</div>

    		<div class="row-fluid" id="project_deliverables_list_row">
	    		<table class="table table-bordered table-condensed">
					<thead>
						<tr>
							<th>#</th>
							<th>Project</th>
							<th>Deliverable Name</th>
							<th>Estimate Man Days</th>
							<th>Start Date</th>
							<th>End Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="project_deliverables_list">
						
					</tbody>
				</table>    		
    		</div>
    	</section>
    	
    	<section id="complexity_section">
    		<div class="row-fluid">
    			<h3 class="pull-left">Complexity</h3>
    			<button class="btn btn-success pull-right" onclick="">New Complexity</button>
    		</div>
    		<hr>	
    		<div class="row-fluid" id="new_complexity_row">
    			
    		</div>
    		<div class="row-fluid" id="edit_complexity_row">
    		
    		</div>
    		<div class="row-fluid" id="complexity_list_row">
	    		<table class="table table-bordered table-condensed">
					<thead>
						<tr>
							<th>#</th>
							<th>Complexity Name</th>
							<th>Company</th>
							<th>Client Type</th>
							<th>Mobile</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="complexity_list">
						
					</tbody>
				</table>    		
    		</div>
    	</section>
    	
        <section id="users_section">
    		<div class="row-fluid">
    			<h3 class="pull-left">Users</h3>
    			<button class="btn btn-success pull-right" onclick="show_new_user_form();">New Users</button>
    		</div>
    		<hr>
    		<div class="row-fluid" id="new_user_row">
    			<form class="form-inline" id="new_user_form">
				      <input name="name" class="input-large" placeholder="Name" type="text">
				      <input name="email" class="input-large" placeholder="Email" type="text">
				      <input name="mobile" class="input-large" placeholder="Mobile" type="number">
				      <select name="role" class="input-large">
							<option value="0">--Select Role--</option>
							<option value="admin">Admin</option>
							<option value="user">User</option>				      
				      </select>
				  	  <button type="button" class="input-small btn btn-primary pull-right" id="save_new_user_btn" onclick="save_new_user();">Save</button>
				</form>
    		</div>	
    		<div class="row-fluid" id="user_list_row">
	    		<table class="table table-bordered table-condensed">
					<thead>
						<tr>
							<th class="span1">#</th>
							<th class="span2">User Name</th>
							<th class="span2">Email</th>
							<th class="span2">Mobile</th>
							<th class="span2">Role</th>
							<th class="span2">Status</th>
						</tr>
					</thead>
					<tbody id="users_list">
						
					</tbody>
				</table>
    		</div>	     			    		
    	</section>	
    </div>
  </div>
</div>

<script type="text/javascript">
$('#settings_li').addClass('active');
window.onload = function() {
	get_deliverables();
	get_all_users();
	get_all_projects();
	$('#start_date,#end_date').datepicker({
		  dateFormat: "yy-mm-dd",
	      changeMonth: true,
	});
};

var projects = [];
function get_all_projects(){
	$.ajax({
		url: '<?php echo URL;?>projects/get_all_projects/',
		type: 'GET',
		dataType: 'JSON',
		async: true,
		success: function(data) {
			projects = data;
		}
	});
}

$('#project_name').focus(function() {
	$('#project_name').typeahead({
        source: projects,
        itemSelected: function(resp){
            $('#project_id').val(resp);
        }
    });
});



$('#show_deliverables_section').click(function(){
	$('#show_deliverables_section').addClass('active');
	$('#show_complexity_section').removeClass('active');
	$('#show_users_section').removeClass('active');
	$('#show_pd_section').removeClass('active');

	$('#deliverables_section').show();
	$('#project_deliverables_section').hide();
	$('#complexity_section').hide();
	$('#users_section').hide();
});

$('#show_pd_section').click(function(){
	$('#show_pd_section').addClass('active');
	$('#show_deliverables_section').removeClass('active');
	$('#show_complexity_section').removeClass('active');
	$('#show_users_section').removeClass('active');

	$('#project_deliverables_section').show();
	$('#deliverables_section').hide();
	$('#complexity_section').hide();
	$('#users_section').hide();

	get_project_deliverables();
});

$('#show_complexity_section').click(function(){
	$('#show_complexity_section').addClass('active');
	$('#show_deliverables_section').removeClass('active');
	$('#show_users_section').removeClass('active');
	$('#show_pd_section').removeClass('active');
	
	$('#complexity_section').show();
	$('#project_deliverables_section').hide();
	$('#deliverables_section').hide();
	$('#users_section').hide();
});

$('#show_users_section').click(function(){
	$('#show_users_section').addClass('active');
	$('#show_deliverables_section').removeClass('active');
	$('#show_complexity_section').removeClass('active');
	$('#show_pd_section').removeClass('active');
	
	$('#users_section').show();
	$('#deliverables_section').hide();
	$('#project_deliverables_section').hide();
	$('#complexity_section').hide();
});

function show_new_deliverable_form(){
	  $('#new_deliverable_form').toggle();
	  $('#edit_deliverable_form').hide();
}

function show_new_user_form(){
	  $('#new_user_form').toggle();
	  $('#edit_user_form').hide();
}

function show_new_project_deliverable_form(){
	  $('#new_project_deliverables_form').toggle();
	  $('#edit_project_deliverables_form').hide();
}
function save_new_deliverable(){
	var formData = $('#new_deliverable_form').serialize();
	$('#save_new_deliverable_btn').attr('disabled', true).html('Saving...');
	$.ajax({
		  url: '<?php echo URL;?>settings/save_new_deliverable/',
		  type:'POST',
		  dataType: 'JSON',
		  data: formData,
		  success: function(resp){
			  $('#save_new_deliverable_btn').attr('disabled', false).html('Save');
			  if(resp['error'] != 0){
				$('#new_deliverable_form').append('<p>'+resp['error']+'</p>');
			  }
			  else{
				  $('#new_deliverable_form').hide();
				  get_deliverables();
				  $('#new_deliverable_form').each(function(){this.reset();});
			  }
		  }
	});
}


function save_new_project_deliverable(){
	var formData = $('#new_project_deliverables_form').serialize();
	$('#save_new_project_deliverable_btn').attr('disabled', true).html('Saving...');
	$.ajax({
		  url: '<?php echo URL;?>settings/save_new_project_deliverable/',
		  type:'POST',
		  dataType: 'JSON',
		  data: formData,
		  success: function(resp){
			  $('#save_new_project_deliverable_btn').attr('disabled', false).html('Save');
			  if(resp['id'] == 0){
				$('#new_project_deliverables_form').append('<p>Error! Try Again.</p>');
			  }
			  else{
				  $('#new_project_deliverables_form').hide();
				  get_project_deliverables();
				  $('#new_project_deliverables_form').each(function(){this.reset();});
			  }
		  }
	});
}

function get_project_deliverables(){
	$.ajax({
		  url: '<?php echo URL;?>settings/get_project_deliverables/',
		  type:'GET',
		  dataType: 'JSON',
		  success: function(resp){
			  $('#project_deliverables_list').empty();
			  var count = 0;
			  for(var i in resp){
				  if(resp.length > 0 ){
					  count = count + 1;
					  console.log(resp);
					  var row='<tr><td>'+count+'</td><td>'+resp[i].project_name+'</td><td>'+resp[i].name+'</td><td>'+resp[i].estimate_man_days+'</td><td>'+resp[i].start_date+'</td><td>'+resp[i].end_date+'</td><td><button class="btn btn-mini" onclick="edit_project_deliverables('+resp[i].id+')"><i class="icon-pencil"></i></button></td></tr>';
					  $('#project_deliverables_list').append(row);
				  }
				  else{
					  $('#project_deliverables_list').append('<p>No Project Deliverables</p>');
				  }
			  }
		  }
	});
}

function edit_project_deliverables(id){
	
}

function get_deliverables(){
	$.ajax({
		  url: '<?php echo URL;?>settings/get_deliverables/',
		  type:'GET',
		  dataType: 'JSON',
		  success: function(resp){
			  deliverable = resp;
			  $('#deliverables_list').empty();
			  var count = 0;
			  for(var i in resp){
				  if(resp.length > 0 ){
					  count = count + 1;
					  var row='<tr><td>'+count+'</td><td>'+resp[i].name+'</td><td>'+resp[i].category+'</td><td>'+resp[i].optimum_man_days+'</td><td>'+resp[i].optimum_duration+'</td><td><button class="btn btn-mini" onclick="edit_deliverables('+resp[i].id+')"><i class="icon-pencil"></i></button></td></tr>';
					  $('#deliverables_list').append(row);
				  }
				  else{
					  $('#deliverables_list').append('<p>No Deliverables</p>');
				  }
			  }
		  }
	});
}

var deliverable = [];

$('#deleverables_name').focus(function() {
	$('#deleverables_name').typeahead({
        source: deliverable,
        itemSelected: function(resp){
            $('#deleverables_id').val(resp);
        }
    });
});

function edit_deliverables(id){
	$('#new_deliverable_form').hide();
	$('#edit_deliverable_form').show();
	$.ajax({
		  url: '<?php echo URL;?>settings/edit_deliverables/',
		  type:'POST',
		  dataType: 'JSON',
		  data: {id:id},
		  success: function(resp){
			if(resp.length > 0){
				for(var i in resp){
					$('#deliverable_id').val(resp[0].id);
					$('#edit_deliverable_name').val(resp[0].name);
					$('#edit_deliverable_category').val(resp[0].category);
					$('#edit_deliverable_optimum_man_days').val(resp[0].optimum_man_days);
					$('#edit_deliverable_optimum_duration').val(resp[0].optimum_duration);
				}
			}
		  }
	});
}

function update_deliverable(){
	var formData = $('#edit_deliverable_form').serialize();
	$.ajax({
		  url: '<?php echo URL;?>settings/update_deliverable/',
		  type:'POST',
		  dataType: 'JSON',
		  data: formData,
		  success: function(resp){
			  if(resp > 0){
				  $('#new_deliverable_form').show();
				  $('#edit_deliverable_form').hide();
				  get_deliverables();
			  }
		  }
	});
}

function get_all_users(){
	$.ajax({
		  url: '<?php echo URL;?>settings/get_all_users/',
		  type:'GET',
		  dataType: 'JSON',
		  success: function(resp){
		  	$('#users_list').empty();
			 if(resp.length > 0){
				 var count = 0; 
				 for(var i in resp){
					 count = count +1;
					 if(resp[i].status == 0){
						 $('#users_list').append('<tr><td style="display:none;" class="id">'+resp[i].id+'</td><td>'+count+'</td><td class="span12">'+resp[i].name+'</td><td class="span12">'+resp[i].email+'</td><td class="span12">'+resp[i].mobile+'</td><td>'+resp[i].role+'</td><td><button title="Click To Enable" class="disable label">Disabled</button></td></tr>');
					 }
					 if(resp[i].status == 1){
						 $('#users_list').append('<tr><td style="display:none;" class="id">'+resp[i].id+'</td><td>'+count+'</td><td class="span12">'+resp[i].name+'</td><td class="span12">'+resp[i].email+'</td><td class="span12">'+resp[i].mobile+'</td><td>'+resp[i].role+'</td><td><button title="Click To Disable" class="enable label label-success">Enabled</button></td></tr>');
					 }
				 }
			  }
		  }
	});
}

$("#users_list").on("click", ".enable", function() {
	var id = $(this).closest("tr").find(".id").text();
	$(this).closest("tr").find(".enable").removeClass('enable label label-success').addClass('disable label').html("Disabled");
	update_status(id,0);
});

$("#users_list").on("click", ".disable", function() {
	var id = $(this).closest("tr").find(".id").text();
	$(this).closest("tr").find(".disable").removeClass('disable label').addClass('enable label label-success').html("Enabled");
	update_status(id,1);
});

function update_status(id,status){
	$.ajax({
		url:'<?php echo URL;?>settings/change_status',
		type:'POST',
		data: {id:id, status:status},
		dataType:'json'
	});
}

function save_new_user(){
	$('#save_new_user_btn').attr('disabled',true).html('Saving...');
	var formData = $('#new_user_form').serialize();
	$.ajax({
		  url: '<?php echo URL;?>settings/save_new_user/',
		  type:'POST',
		  dataType: 'JSON',
		  data: formData,
		  success: function(resp){
			  $('#save_new_user_btn').attr('disabled',false).html('Save');
			  if(resp['id'] > 0){
				  $('#new_user_form').hide();
				  get_all_users();
				  $('#save_new_user_btn').each(function(){this.reset();});
			  }
		  }
	});
}
</script>
