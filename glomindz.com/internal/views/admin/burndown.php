<div class="container-fluid">
	<div class="row-fluid">
		<h3 class="pull-left">Burndown</h3>
	</div>
	<hr>
	<div class="row-fluid">
		<table class="table">
			<thead>
				<tr>
					<th class="span2">Project Name</th>
					<th class="span2">Task Name</th>
					<th class="span2">Estimate</th>
					<th class="span2">Time Burned</th>
					<th class="span2">Action</th>
				</tr>
			</thead>
			<tbody id="wrapper">
				
			</tbody>
		</table>
	</div>
</div>


<script type="text/javascript">
$('#burndown_li').addClass('active');
window.onload = function() {
	get_all_tasks_and_burned_time();
};

function get_all_tasks_and_burned_time(){
	$.ajax({
		url: '<?php echo URL;?>tasks/get_all_tasks_and_burned_time/',
		type: 'GET',
		dataType: 'JSON',
		async: true,
		success: function(data){
			//console.log(data);
			$('#wrapper').empty();
			if(data.length > 0){
				for(var i in data){
					var row ='';
					if(parseInt(data[i].estimate_man_hrs) < parseInt(data[i].time_took)){
						//alert(data[i].estimate_man_hrs +"<"+ data[i].time_taken);
						row = '<tr class="alert alert-error"><td class="id" style="display:none;">'+data[i].id+'</td><td>'+data[i].project_name+'</td><td>'+data[i].task+'</td><td>'+data[i].estimate_man_hrs+'</td><td>'+data[i].time_took+'</td><td><div class="input-append"><input type="number" class="time input-mini" placeholder="Time"><button class="save btn">Save</button><button class="done btn btn-info">Done</button></div></td></tr>';
					}
					else if(parseInt(data[i].estimate_man_hrs) > parseInt(data[i].time_took)){
						//alert(data[i].estimate_man_hrs +">"+ data[i].time_taken);
						row = '<tr class="alert alert-success"><td class="id" style="display:none;">'+data[i].id+'</td><td>'+data[i].project_name+'</td><td>'+data[i].task+'</td><td>'+data[i].estimate_man_hrs+'</td><td>'+data[i].time_took+'</td><td><div class="input-append"><input type="number" class="time input-mini" placeholder="Time"><button class="save btn">Save</button><button class="done btn btn-info">Done</button></div></td></tr>';
					}
					else{
						row = '<tr><td class="id" style="display:none;">'+data[i].id+'</td><td>'+data[i].project_name+'</td><td>'+data[i].task+'</td><td>'+data[i].estimate_man_hrs+'</td><td>'+data[i].time_took+'</td><td><div class="input-append"><input type="number" class="time input-mini" placeholder="Time"><button class="save btn">Save</button><button class="done btn btn-info">Done</button></div></td></tr>';
					}
					$('#wrapper').append(row);
				}
			}	
		}
	});
}

$("#wrapper").on("click", ".save", function() {
	var id = $(this).closest("tr").find(".id").text();
	var time = $(this).closest("tr").find(".time").val();
	burndown(id,time);
});

$("#wrapper").on("click", ".done", function() {
	var id = $(this).closest("tr").find(".id").text();
	$(this).closest("tr").hide();
	done(id);
});

function burndown(id,time){
	if(time <= 0){
		
	}
	else{
		$.ajax({
			  url: '<?php echo URL;?>tasks/burndown/',
			  type:'POST',
			  dataType: 'JSON',
			  data: {task_id:id,time:time},
			  success: function(resp){
				  get_all_tasks_and_burned_time();
			  }
		});
	}
}

function done(id){
	$.ajax({
		  url: '<?php echo URL;?>tasks/close_task/',
		  type:'POST',
		  dataType: 'JSON',
		  data: {task_id:id}
	});
}
</script>