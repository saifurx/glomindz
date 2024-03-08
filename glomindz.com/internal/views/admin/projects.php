<div class="container-fluid">
  <div class="row-fluid">
  	<h3 class="pull-left">Projects</h3>
  	<button class="btn btn-success pull-right" id="new_projects" onclick="show_new_projects_section()"><i class="icon-white icon-folder-close"></i> New Projects</button>
  </div>
  <hr>
  <section id="new_projects_section">
		<div class="row-fluid">
		<h4 class="alert">Projects Details</h4>
		<form class="form-horizontal" action="" id="new_projects_form">
			<div class="span6 ">
					<div class="control-group">
				  		<label class="control-label">Project Name</label>
				  		<div class="controls">
				    		<input class="input-xlarge" type="text" name="name" placeholder="Project Name" required="required"/>
				  		</div>
					</div>
					<div class="control-group">
				  		<label class="control-label">Client Name</label>
				  		<div class="controls">
				    		<input class="input-xlarge" id="customer_name" type="text" placeholder="Client Name" required="required"/>
				    		<input type="hidden" id="customer_id" name="customer_id"/>
				  		</div>
					</div>
					<div class="control-group">
				  		<label class="control-label">Agerage Daily Traffic</label>
				  		<div class="controls">
				    		<input class="input-xlarge" type="text" name="traffic_daily" placeholder="Agerage Daily Traffic" />
				  		</div>
					</div>	
					<div class="control-group">
				  		<label class="control-label">Start Date</label>
				  		<div class="controls">
				    		<input class="input-xlarge" type="text" id="start_date" name="start_date" placeholder="Start Date" />
				  		</div>
					</div>
					<div class="control-group">
				  		<label class="control-label">End Date</label>
				  		<div class="controls">
				    		<input class="input-xlarge" type="text" id="end_date" name="end_date" placeholder="End Date" />
				  		</div>
					</div>
					<div class="control-group">
				  		<label class="control-label">Support Start Date</label>
				  		<div class="controls">
				    		<input class="input-xlarge" type="text" id="support_start" name="support_start" placeholder="Support Start Date" />
				  		</div>
					</div>					
					<div class="control-group">
				  		<label class="control-label">Support End Date</label>
				  		<div class="controls">
				    		<input class="input-xlarge" type="text" id="support_end" name="support_end" placeholder="Support End Date" />
				  		</div>
					</div>					
					<div class="control-group">
				  		<label class="control-label">Estimate Man Days</label>
				  		<div class="controls">
				    		<input class="input-xlarge" type="text" name="estimate_man_days" placeholder="Estimate Man Days" />
				  		</div>
					</div>	
					<div class="control-group">
				  		<label class="control-label">Actual Man Days</label>
				  		<div class="controls">
				    		<input class="input-xlarge" type="text" name="actual_man_days" placeholder="Estimate Man Days" />
				  		</div>
					</div>		
					<div class="control-group">
				  		<label class="control-label">Reference</label>
				  		<div class="controls">
				    		<input class="input-xlarge" type="text" name="reference" placeholder="Reference" />
				  		</div>
					</div>																			
					<div class="control-group">
				  		<label class="control-label">Estimated Duration</label>
				  		<div class="controls">
				    		<input class="input-xlarge" type="text" name="duration" placeholder="Estimated Duration"/>
				  		</div>
					</div>
					<div class="control-group">
				  		<label class="control-label">Estimated Budget</label>
				  		<div class="controls">
				    		<input class="input-xlarge" type="number" name="approx_budget"	placeholder="Estimated Budget"/>
				  		</div>
					</div>
			</div>
			
			<div class="span6">	
				<label class="control-label" style="text-align: left;">Requirments</label><br>
				<textarea id="requirment" name="requirment" class="span10" rows="24" placeholder="Requirments for the project"></textarea>
				<p id="error_requirment"></p>
				<br/><br/>
				<button class="btn btn-primary" type="button" id="new_project_btn" onclick="new_project();">Create</button>									
			</div>
			</form>
		</div>
	</section>
	
	<!-- edit project -->
	
	  <section id="edit_project_section">
		<div class="row-fluid">
		<h4 class="alert">Edit Projects Details</h4>
		<form class="form-horizontal" action="" id="edit_project_form">
			<div class="span6 ">
					<div class="control-group">
				  		<label class="control-label">Project Name</label>
				  		<div class="controls">
				  			<input type="hidden" id="edit_pid" name="edit_pid" >
				    		<input class="input-xlarge" type="text" id="edit_name" name="name" placeholder="Project Name" required="required"/>
				  		</div>
					</div>
					<div class="control-group">
				  		<label class="control-label">Client Name</label>
				  		<div class="controls">
				    		<input class="input-xlarge" id="edit_customer_name" type="text" placeholder="Client Name" required="required"/>
				    		<input type="hidden" id="edit_customer_id" name="edit_customer_id"/>
				  		</div>
					</div>
					<div class="control-group">
				  		<label class="control-label">Agerage Daily Traffic</label>
				  		<div class="controls">
				    		<input class="input-xlarge" type="text" id="edit_traffic_daily" name="traffic_daily" placeholder="Agerage Daily Traffic" />
				  		</div>
					</div>
					<div class="control-group">
				  		<label class="control-label">Start Date</label>
				  		<div class="controls">
				    		<input class="input-xlarge" type="text" id="edit_start_date" name="start_date" placeholder="Start Date" />
				  		</div>
					</div>
					<div class="control-group">
				  		<label class="control-label">End Date</label>
				  		<div class="controls">
				    		<input class="input-xlarge" type="text" id="edit_end_date" name="end_date" placeholder="End Date" />
				  		</div>
					</div>					
					<div class="control-group">
				  		<label class="control-label">Support Start Date</label>
				  		<div class="controls">
				    		<input class="input-xlarge" type="text" id="edit_support_start" name="support_start" placeholder="Support Start Date" />
				  		</div>
					</div>					
					<div class="control-group">
				  		<label class="control-label">Support End Date</label>
				  		<div class="controls">
				    		<input class="input-xlarge" type="text" id="edit_support_end" name="support_end" placeholder="Support End Date" />
				  		</div>
					</div>
					<div class="control-group">
				  		<label class="control-label">Estimate Man Days</label>
				  		<div class="controls">
				    		<input class="input-xlarge" type="text" id="edit_estimate_man_days" name="estimate_man_days" placeholder="Estimate Man Days" />
				  		</div>
					</div>						
					<div class="control-group">
				  		<label class="control-label">Actual Man Days</label>
				  		<div class="controls">
				    		<input class="input-xlarge" type="text" id="edit_actual_man_days" name="actual_man_days" placeholder="Estimate Man Days" />
				  		</div>
					</div>		
					<div class="control-group">
				  		<label class="control-label">Reference</label>
				  		<div class="controls">
				    		<input class="input-xlarge" type="text" id="edit_reference" name="reference" placeholder="Reference" />
				  		</div>
					</div>						
					<div class="control-group">
				  		<label class="control-label">Estimated Duration</label>
				  		<div class="controls">
				    		<input class="input-xlarge" type="text" id="edit_duration" name="duration" placeholder="Estimated Duration"/>
				  		</div>
					</div>
					<div class="control-group">
				  		<label class="control-label">Estimated Budget</label>
				  		<div class="controls">
				    		<input class="input-xlarge" type="number" id="edit_approx_budget" name="approx_budget"	placeholder="Estimated Budget"/>
				  		</div>
					</div>

			</div>
			
			<div class="span6">		
				<label class="control-label" style="text-align: left;">Requirments</label><br>
				<textarea id="edit_requirment" name="requirment" class="span10" rows="24" placeholder="Requirments for the project"></textarea>
				<p id="edit_error_requirment"></p>
				<br/><br/>
				<button class="btn btn-primary" type="button" id="edit_project_btn" onclick="update_project();">Update</button>					
			</div>
			</form>
		</div>
	</section>
	
	<!-- projects list -->
	<section id="project_list_section">
		<div class="row-fluid">
			<table class="table table-striped table-condensed">
				<thead>
					<tr>
						<th>#</th>
						<th>Project Name</th>
						<th>Client Name</th>
						<th>Client Type</th>
						<th>Estimated Duration</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody id="project_list">
					
				</tbody>
			</table>
		</div>
	</section>
</div>

<script type="text/javascript">
$('#projects_li').addClass('active');
$(document).ready(function(){
	get_all_clients();
	get_all_projects();
	$('#start_date,#end_date,#support_start,#support_end,#edit_start_date,#edit_end_date,#edit_support_start,#edit_support_end').datepicker({
		  dateFormat: "yy-mm-dd",
	      changeMonth: true,
	});
});


function show_new_projects_section(){
	$('#new_projects_section').toggle();
	$('#edit_project_section').hide();
}


var customer_list = [];
function get_all_clients(){
	$.ajax({
		url: '<?php echo URL;?>clients/get_all_client/',
		type: 'GET',
		dataType: 'JSON',
		async: true,
		success: function(data) {
			customer_list = data;
		}
	});
}

$('#customer_name').focus(function() {
	console.log(customer_list);
    $('#customer_name').typeahead({
        source: customer_list,
        itemSelected: function(resp){
            console.log(resp);
            $('#customer_id').val(resp);
        }
    });
});


$('#edit_customer_name').focus(function() {
	console.log(customer_list);
    $('#edit_customer_name').typeahead({
        source: customer_list,
        itemSelected: function(resp){
            console.log(resp);
            $('#edit_customer_id').val(resp);
        }
    });
});

function new_project(){
	$('#new_project_btn').attr('disabled',true).html('Creating...');		
	var formData = $('#new_projects_form').serialize();
	$.ajax({
		  url: '<?php echo URL;?>projects/create_project/',
		  type:'POST',
		  data:formData,
		  dataType: 'JSON',
		  success: function(resp){
			   if(resp > 0){
				  	$('#new_project_btn').attr('disabled',false).html('Create');
				  	show_new_projects_section();
				  	get_all_projects();
				  	$('#new_projects_form').each(function(){this.reset();});
				}
		  }
	});
}

function get_all_projects(){
	$.ajax({
		  url: '<?php echo URL;?>projects/get_all_projects/',
		  type:'GET',
		  dataType: 'JSON',
		  success: function(data){
			  $('#project_list').empty();
			   if(data.length > 0){
				  console.log(data);
				  var count = 0;
				  for(var i in data){
					  count = count + 1;
					  var row = '<tr><td>'+count+'</td><td>'+data[i].name+'</td><td>'+data[i].customer_name+'</td><td>'+data[i].customer_type+'</td><td>'+data[i].duration+'days</td><td><button class="btn btn-mini" onclick="edit_project('+data[i].id+');"><i class="icon-pencil"></i></button></td></tr>';
					 
					  $('#project_list').append(row);					  
				  }
				}
		  }
	});
}

function edit_project(id){
	$.ajax({
		  url: '<?php echo URL;?>projects/get_project_details/',
		  type:'POST',
		  data:{id:id},
		  dataType: 'JSON',
		  success: function(resp){
			   if(resp.length > 0){
				  	console.log(resp);
				  	$('#new_projects_section').hide();
				  	$('#edit_project_section').show();
					$('#edit_pid').val(resp[0]['id']);
					$('#edit_name').val(resp[0]['name']);
					$('#edit_customer_name').val(resp[0]['customer_name']);
                                        $('#edit_customer_id').val(resp[0]['customer_id']);
					$('#edit_traffic_daily').val(resp[0]['traffic_daily']);
					$('#edit_start_date').val(resp[0]['start_date']);
					$('#edit_end_date').val(resp[0]['end_date']);
					$('#edit_support_start').val(resp[0]['support_start']);
					$('#edit_support_end').val(resp[0]['support_end']);
					$('#edit_duration').val(resp[0]['duration']);
					$('#edit_approx_budget').val(resp[0]['approx_budget']);
					$('#edit_actual_man_days').val(resp[0]['actual_man_days']);
					$('#edit_reference').val(resp[0]['reference']);
					$('#edit_estimate_man_days').val(resp[0]['estimate_man_days']);
					$('#edit_requirment').val(resp[0]['requirment']);
				}
		  }
	});
}

function update_project(){
	$('#edit_project_btn').attr('disabled',true).html('Updating...');		
	var formData = $('#edit_project_form').serialize();
	$.ajax({
		  url: '<?php echo URL;?>projects/update_project/',
		  type:'POST',
		  data:formData,
		  dataType: 'JSON',
		  success: function(resp){
			   if(resp > 0){
				  	$('#edit_project_btn').attr('disabled',false).html('Update');
				  	$('#new_projects_section').hide();
					$('#edit_project_section').hide();
				  	get_all_projects();
				}
		  }
	});
}
</script>