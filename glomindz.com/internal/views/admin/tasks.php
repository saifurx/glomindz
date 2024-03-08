<div class="container-fluid">
	<div class="row-fluid">
		<h3 class="pull-left">Tasks</h3>
		<button class="btn btn-success pull-right" id="new_task" onclick="show_new_task_section();">New Task</button>
	</div>
	<hr>
	<section id="new_task_section">
		<div class="row-fluid" >
		<h4 class="alert">Create New Task</h4>
			<form class="form-horizontal" id="new_task_form">
				<div class="span6">
					<div class="control-group">
					  <label class="control-label">Project Name</label>
					  <div class="controls">
					    	<input type="text" id="project_name" name="project_name" placeholder="Project"/>
					    	<input type="hidden" id="project_id" name="project_id"/> 
					  </div>
					</div>
					<div class="control-group">
					  <label class="control-label">Deleverables</label>
					  <div class="controls">
					    <select	id="project_deliverable_id" name="project_deliverable_id" disabled="disabled">
						</select>
					  </div>
					</div>
					<div class="control-group">
					  <label class="control-label">Task</label>
					  <div class="controls">
					    	<input type="text" name="task" placeholder="Task"/>
					  </div>
					</div>
					<div class="control-group">
					  <label class="control-label">Priority</label>
					  <div class="controls">
					    <select	name="priority">
							<option value="H">H</option>
							<option value="M">M</option>
							<option value="L">L</option>
						</select>
					  </div>
					</div>		
					<div class="control-group hide">
					  <label class="control-label">Complexity</label>
					  <div class="controls">
		 				 <select name="complexity">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
						</select>
					  </div>
					</div>								
				</div>
				<div class="span6">
					<div class="control-group hide">
					  <label class="control-label">Optimum Man hours</label>
					  <div class="controls">
					    	<input type="number" name="optimum_man_hrs" placeholder="Optimum Man hours"/>
					  </div>
					</div>
					<div class="control-group" style="display: none;">
					  <label class="control-label">Demand Man hours</label>
					  <div class="controls">
					    	<input type="number" name="demand_man_hrs" placeholder="Demand Man hours" />
					  </div>
					</div>										
					<div class="control-group">
					  <label class="control-label">Estimate man hours</label>
					  <div class="controls">
					    	<input type="number" name="estimate_man_hrs" placeholder="Estimate man hours" />
					  </div>
					</div>
					<div class="control-group" style="display: none;">
					  <label class="control-label">Actual man hours</label>
					  <div class="controls">
					    	<input type="number" name="actual_man_hrs" placeholder="Actual man hours" />
					  </div>
					</div>	
					<div class="control-group">
					  <label class="control-label">Assign To</label>
					  <div class="controls">
		 				 <select name="assign_to">
							<option value="0">--Select--</option>
							<?php
							foreach($this->get_all_user as $key => $value) {?>
							<option value="<?php echo $value['id']; ?>">
								<?php echo $value['name']; ?>
							</option>
							<?php }?>
						</select>
					  </div>
					</div>					
					<div class="control-group">
					  <label class="control-label"></label>
					  <div class="controls">
					    	<button type="button" class="btn btn-primary" id="btn_save_new_task" onclick="create_task();">Create</button>
					  </div>
					</div>
				</div>
			</form>
		</div>		
	</section>
	

	<section id="task_list_section">
	<div class="row-fluid">
		<table class="table table-condensed table-bordered">
			<thead>
				<tr>
					<th class="span1">#</th>
					<th class="span2">Project</th>
					<th class="span2">Project Deliverable</th>
					<th class="span2">Task Name</th>
					<th class="span1">Priority</th>
					<th class="span1">Complexity</th>
					<th class="span1">Assign To</th>
					<th class="span1">Assign By</th>
					<th class="span1">Status</th>
					<th class="span1">Edit</th>
				</tr>
			</thead>
			<tbody id="task_list">
				
			</tbody>
		</table>
	</div>
</section>
</div>

<div id="edit_task_modal" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Edit Task</h3>
  </div>
  <div class="modal-body">
  	<div class="row-fluid">
  		<form class="" id="update_task_form">
			<div class="span6">
				<input type="hidden" name="id" id="edit_task_id">
				<label>Project Name</label>
				<select name="project_id" id="edit_project_id" onchange="get_project_deliverables();"></select>
				<label>Project Deliverable</label>
	    		<select name="project_deliverable_id" id="edit_project_deliverable_id"></select>
	    		<label>Task</label>
	    		<input type="text" name="task" id="edit_task">
	    		<label>Priority</label>
	    		<select name="priority" id="edit_priority">
					<option value="H">H</option>
					<option value="M">M</option>
					<option value="L">L</option>
				</select>
			</div>
			<div class="span6">
				<label>estimate_man_hrs</label>
	    		<input type="text" name="estimate_man_hrs" id="edit_estimate_man_hrs">
	    		<label>Status</label>
	    		<select name="status" id="edit_status">
					<option value="Open">Open</option>
					<option value="Closed">Closed</option>
				</select>
	    		<label>Assign To</label>
	    		<select name="assign_to" id="edit_assign_to">
					<option value="0">--Select--</option>
					<?php
						foreach($this->get_all_user as $key => $value) {?>
						<option value="<?php echo $value['id']; ?>">
						<?php echo $value['name']; ?>
						</option>
					<?php }?>
				</select>
			</div>
		</form>
	</div>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
    <button class="btn btn-primary" id="save_crime_update_form_btn" onclick="update_task();">Update</button>
  </div>
</div>
<script type="text/javascript">
$('#tasks_li').addClass('active');
$(document).ready(function(){
	get_all_tasks();
	get_all_projects();
	//get_all_deliverables();
	
});


function show_new_task_section(){
	$("#new_task_section").toggle();
	$('#edit_task_section').hide();
}
var projects = [];
function get_all_projects(){
	$.ajax({
		url: '<?php echo URL;?>projects/get_all_projects/',
		type: 'GET',
		dataType: 'JSON',
		async: true,
		success: function(data) {
			projects = data;
			$('#edit_project_id').empty();
			for(var i in data){
				$('#edit_project_id').append('<option value='+data[i].id+'>'+data[i].name+'</option>');
			}
		}
	});
}

$('#project_name,#edit_project_name').focus(function() {
	$('#project_name,#edit_project_name').typeahead({
        source: projects,
        itemSelected: function(resp){
            $('#project_id').val(resp);
            $('#edit_project_id').val(resp);
            get_project_deliverables();
        }
    });
});


var deliverable = [];
function get_project_deliverables(){
	var project_id = $('#project_id').val();
	if($('#project_id').val()== 0 || $('#project_id').val() == null){
		project_id = $('#edit_project_id').val();
	}
	
	$.ajax({
		url: '<?php echo URL;?>tasks/get_project_deliverables/',
		type: 'POST',
		data: {project_id:project_id},
		dataType: 'JSON',
		async: true,
		success: function(data){
			deliverable = data;
			$('#project_deliverable_id,#edit_project_deliverable_id').empty();
			$('#project_deliverable_id').attr('disabled', false);
			for(var i in data){
				$('#project_deliverable_id,#edit_project_deliverable_id').append('<option value="0">-Select-</option><option value='+data[i].id+'>'+data[i].name+'</option>');
			}
			
		}
	});
}


function create_task(){
	$('#project_deliverable_name').attr('disabled', true);
	$('#btn_save_new_task').attr('disabled',true).html('Creating...');
	var formData = $('#new_task_form').serialize();
	$.ajax({
		  url: '<?php echo URL;?>tasks/create_task/',
		  type:'POST',
		  data:formData,
		  dataType: 'JSON',
		  success: function(resp){
			   if(resp > 0){
				  	$('#btn_save_new_task').attr('disabled',false).html('Create');
				  	get_all_tasks();
				  	show_new_task_section();
				  	deliverable = [];
				  	console.log(deliverable);
				  	$('#new_task_form').each(function(){
					    this.reset();
					});
				}
		  }
	});
}

var all_user ='<select class="users input-medium" name="assign_to"><option value="0">--Select--</option><?php foreach($this->get_all_user as $key => $value) {?> <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option><?php }?></select>';


function get_all_tasks(){
	$.ajax({
		url: '<?php echo URL;?>tasks/get_all_tasks/',
		type: 'POST',
		dataType: 'JSON',
		async: false,
		success: function(data){
			 $('#task_list').empty();
			// console.log(data);
			 if(data.length > 0){
				  var count = 0;
				  for(var i in data){
					  count = count + 1;
					  if(data[i].status=='Open'){
						  var priority = '<td class="">'+data[i].priority+'</td>';
						  if(data[i].priority == 'H'){
						  	priority = '<td class="alert alert-error">'+data[i].priority+'</td>';
						  }
						  else if(data[i].priority == 'M'){
							priority = '<td class="alert">'+data[i].priority+'</td>';
						  }
						  var row = '<tr><td class="id" style="display:none;">'+data[i].id+'</td><td>'+count+'</td><td>'+data[i].project_name+'</td><td>'+data[i].project_deleverable+'</td><td>'+data[i].task+'</td>'+priority+'<td>'+data[i].complexity+'</td><td class="assigned_user">'+data[i].assign_to+'</td><td>'+data[i].assign_by+'</td><td>'+data[i].status+'</td><td class="span1"><button class="btn btn-mini" onclick="show_update_modal('+data[i].id+');"><i class="icon-pencil"></i></button></td></tr>';
					  }
					  else if(data[i].status=='Closed'){
						  var row = '<tr class="alert alert-success"><td class="id" style="display:none;">'+data[i].id+'</td><td>'+count+'</td><td>'+data[i].project_name+'</td><td>'+data[i].project_deleverable+'</td><td>'+data[i].task+'</td>'+priority+'<td>'+data[i].complexity+'</td><td class="assigned_user">'+data[i].assign_to+'</td><td>'+data[i].assign_by+'</td><td>'+data[i].status+'</td><td class="span1"><button class="btn btn-mini" onclick="show_update_modal('+data[i].id+');"><i class="icon-pencil"></i></button></td></tr>';
					  }	  	  
					  $('#task_list').append(row);
				  }
			}
		}
	});
}

$("#task_list").on("change", "select", function() {
	var id = $(this).closest("tr").find(".id").text();
	var user_name = $(this).closest("tr").find("select option:selected").text();
	var user = $(this).closest("tr").find("select option:selected").val();
	update_task(id,user);
	$(this).closest("tr").find(".assigned_user").text(user_name);
});


function show_update_modal(id){
	$.ajax({
		  url: '<?php echo URL;?>tasks/get_task_details/',
		  type:'POST',
		  data:{id:id},
		  dataType: 'JSON',
		  success: function(resp){
				console.log(resp);
				$('#edit_task_id').val(resp[0].id);
				$('#edit_project_id').val(resp[0].project_id);
				$('#edit_project_deliverable_id').val(resp[0].project_deliverable_id);
				$('#edit_task').val(resp[0].task);
				$('#edit_priority').val(resp[0].priority);
				$('#edit_estimate_man_hrs').val(resp[0].estimate_man_hrs);
				$('#edit_status').val(resp[0].status);
				$('#edit_assign_to').val(resp[0].assign_to);
				$('#edit_task_modal').modal('show');
		  }
	});
}

function update_task(id,user){
	var formData = $('#update_task_form').serialize();
	$.ajax({
		  url: '<?php echo URL;?>tasks/update_task/',
		  type:'POST',
		  data:formData,
		  dataType: 'JSON',
		  success: function(resp){
			  $('#edit_task_modal').modal('hide');
			  get_all_tasks();
		  }
	});
}
</script>