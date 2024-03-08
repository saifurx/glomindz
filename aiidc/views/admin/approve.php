<div class="container">
	<div class="subnav subnav-fixed">
		<ul class="nav nav-pills">
			<li><a href="<?php echo URL;?>admin/edit_block">Update Block</a>
			</li>
			<li><a href="<?php echo URL;?>admin/remarks">GM Comments</a>
			</li>
			<?php if(Session::get("role")!="default"){?>
			<li><a href="<?php echo URL;?>admin/analytics">Analytics</a>
			
			<li><a href="<?php echo URL;?>admin">Users List</a>
			</li>
		
			<li class="active"><a href="<?php echo URL;?>admin/approve">Modified
					Data</a>
			</li>
			<?php }else{?>
			<li><a href="<?php echo URL;?>admin/modification">Modified
					Data</a>
			</li>
			<?php }?>


			<li><a href="<?php echo URL;?>admin/change_password">Change Password</a>
			</li>
		</ul>
	</div>

	<hr>
	<div class="row">
		<div class="span12">
			<h4 class="alert-info">Modified Raw Materials Data</h4>
			<table class="table table-bordered responsive-utilities">
				<thead>
					<tr class="label">
						<th rowspan="2" class="">District Name</th>
						<th rowspan="2" class="">Block Name</th>
						<th rowspan="2" class="">Raw Material</th>
						<th colspan="2" class="">Occurence</th>
						<th colspan="2" class="">Availability</th>
						<th colspan="2" class="">Usage</th>
						<th colspan="2" class="">Score</th>
						<th rowspan="2" class="">Modified by</th>
						<th rowspan="2" class="">Modified on</th>
						<th rowspan="2" class="">Action</th>
					</tr>
					<tr class="label">
						<th class="">Old</th>
						<th class="">New</th>
						<th class="">Old</th>
						<th class="">New</th>
						<th class="">Old</th>
						<th class="">New</th>
						<th class="">Old</th>
						<th class="">New</th>
					</tr>
				</thead>
				<tbody id="rm_approve">

				</tbody>
			</table>
			<h4 class="alert-info">Modified Human Resources Data</h4>
			<table class="table table-bordered responsive-utilities">
				<thead>
					<tr class="label">
						<th rowspan="2" class="">District Name</th>
						<th rowspan="2" class="">Block Name</th>
						<th rowspan="2" class="">Human Resource</th>
						<th colspan="2" class="">Occurence</th>
						<th colspan="2" class="">Commercial Viability</th>
						<th colspan="2" class="">Usage</th>
						<th colspan="2" class="">Score</th>
						<th rowspan="2" class="">Modified by</th>
						<th rowspan="2" class="">Modified on</th>
						<th rowspan="2" class="">Action</th>
					</tr>
					<tr class="label">
						<th class="">Old</th>
						<th class="">New</th>
						<th class="">Old</th>
						<th class="">New</th>
						<th class="">Old</th>
						<th class="">New</th>
						<th class="">Old</th>
						<th class="">New</th>
					</tr>
				</thead>
				<tbody id="hr_approve">

				</tbody>
			</table>
			<h4 class="alert-info">Modified General Infrastructure Data</h4>
			<table class="table table-bordered responsive-utilities">
				<thead>
					<tr class="label">
						<th rowspan="2" class="">District Name</th>
						<th rowspan="2" class="">Block Name</th>
						<th rowspan="2" class="">General Infrastructure</th>
						<th colspan="2" class="">Availability</th>
						<th colspan="2" class="">Accessibility</th>
						<th colspan="2" class="">Condition</th>
						<th colspan="2" class="">Score</th>
						<th rowspan="2" class="">Modified by</th>
						<th rowspan="2" class="">Modified on</th>
						<th rowspan="2" class="">Action</th>
					</tr>
					<tr class="label">
						<th class="">Old</th>
						<th class="">New</th>
						<th class="">Old</th>
						<th class="">New</th>
						<th class="">Old</th>
						<th class="">New</th>
						<th class="">Old</th>
						<th class="">New</th>
					</tr>
				</thead>
				<tbody id="infra_approve">

				</tbody>
			</table>
			<h4 class="alert-info">Modified Growth Possibilities Data</h4>
			<table class="table table-bordered responsive-utilities">
				<thead>
					<tr class="label">
						<th rowspan="2" class="">District Name</th>
						<th rowspan="2" class="">Block Name</th>
						<th colspan="2" class="">Possible Sectors</th>
						<th colspan="2" class="">Manufacturing Service</th>
						<th colspan="2" class="">Impediments Order</th>
						<th colspan="2" class="">Remarks</th>
						<th rowspan="2" class="">Modified by</th>
						<th rowspan="2" class="">Modified on</th>
						<th rowspan="2" class="">Action</th>
					</tr>
					<tr class="label">
						<th class="">Old</th>
						<th class="">New</th>
						<th class="">Old</th>
						<th class="">New</th>
						<th class="">Old</th>
						<th class="">New</th>
						<th class="">Old</th>
						<th class="">New</th>
					</tr>
				</thead>
				<tbody id="growth_poss_approve">

				</tbody>
			</table>
		</div>

	</div>
</div>

<script type="text/javascript">
	var role=<?php Session::get("role");?>
	$('#admin').addClass('active');
	$(document).ready(function () {		
		get_rm_data();
		get_hr_data();
		get_gen_infra_data();
		get_growth_poss_data();
	});
	function get_rm_data(){
		$.ajax({
			url: '<?php echo URL?>admin/get_rm',
			type: 'GET',
			dataType: 'JSON',
			async: false,
			success: function(data) {
				for (var i in data){
					
					$('#rm_approve').append('<tr class="rm_mod_row"><td style="display:none" class="id">'+data[i].id+'</td><td style="display:none" class="block_id">'+data[i].block_id+'</td><td style="display:none" class="rm_id">'+data[i].rm_id+'</td><td>'+data[i].dist_name+'</td><td>'+data[i].block_name+'</td><td>'+data[i].rm_name+'</td><td>'+data[i].current_occurrence+'</td><td class="new_occurrence">'+data[i].new_occurrence+'</td><td>'+data[i].current_availibility+'</td><td class="new_availibility">'+data[i].new_availibility+'</td><td>'+data[i].current_present_usage+'</td><td class="new_present_usage">'+data[i].new_present_usage+'</td><td>'+data[i].current_score+'</td><td class="new_score">'+data[i].new_score+'</td><td>'+data[i].user_name+'</td><td>'+data[i].last_update_date+'</td><td class="app_reg"><div class="btn-group"><button class="approve btn btn-mini">Approve</button><button class="regect btn btn-mini btn-danger">Reject</button></div></td></tr>');
				}
				
				$("#rm_approve").on("click", ".approve", function() {
					var id = $(this).closest("tr").find(".id").text();
					var block_id = $(this).closest("tr").find(".block_id").text();
					var rm_id = $(this).closest("tr").find(".rm_id").text();
					var new_occurrence = $(this).closest("tr").find(".new_occurrence").text();
					var new_availibility = $(this).closest("tr").find(".new_availibility").text();
					var new_present_usage = $(this).closest("tr").find(".new_present_usage").text();
					var new_score=$(this).closest("tr").find(".new_score").text();
					$(this).closest("tr").addClass("alert-success").find(".app_reg").append("Approved");
					$(this).closest("tr").find(".btn-group").remove();
					approved_rm(id,block_id,rm_id,new_occurrence,new_availibility,new_present_usage,new_score);
				});
			}
		});
	}
	$("#rm_approve").on("click", ".regect", function() {
		var id = $(this).closest("tr").find(".id").text();
		$(this).closest("tr").addClass("alert-error").find(".app_reg").append("Rejected");
		$(this).closest("tr").find(".btn-group").remove();
		reject_rm(id); 
	});
	function get_hr_data(){
		$.ajax({
			url: '<?php echo URL?>admin/get_hr',
			type: 'GET',
			dataType: 'JSON',
			async: false,
			success: function(data) {
				for (var i in data){
						$('#hr_approve').append('<tr class="hr_mod_row"><td style="display:none" class="id">'+data[i].id+'</td><td style="display:none" class="block_id">'+data[i].block_id+'</td><td style="display:none" class="hr_id">'+data[i].hr_id+'</td><td>'+data[i].dist_name+'</td><td>'+data[i].block_name+'</td><td>'+data[i].hr_name+'</td><td>'+data[i].current_occurrence+'</td><td class="new_occurrence">'+data[i].new_occurrence+'</td><td>'+data[i].current_commercial_viability+'</td><td class="new_commercial_viability">'+data[i].new_commercial_viability+'</td><td>'+data[i].current_present_usage+'</td><td class="new_present_usage">'+data[i].new_present_usage+'</td><td>'+data[i].current_score+'</td><td class="new_score">'+data[i].new_score+'</td><td>'+data[i].user_name+'</td><td>'+data[i].last_update_date+'</td><td class="app_reg"><div class="btn-group"><button class="approve btn btn-mini">Approve</button><button class="regect btn btn-mini btn-danger">Reject</button></div></td></tr>');
			    }
				$("#hr_approve").on("click", ".approve", function() {
					var id = $(this).closest("tr").find(".id").text();
					var block_id = $(this).closest("tr").find(".block_id").text();
					var hr_id = $(this).closest("tr").find(".hr_id").text();
					var new_occurrence = $(this).closest("tr").find(".new_occurrence").text();
					var new_commercial_viability = $(this).closest("tr").find(".new_commercial_viability").text();
					var new_present_usage = $(this).closest("tr").find(".new_present_usage").text();
					var new_score=$(this).closest("tr").find(".new_score").text();
					$(this).closest("tr").addClass("alert-success").find(".app_reg").append("Approved");
					$(this).closest("tr").find(".btn-group").remove();
					approved_hr(id,block_id,hr_id,new_occurrence,new_commercial_viability,new_present_usage,new_score);					
				});
				$("#hr_approve").on("click", ".regect", function() {
					var id = $(this).closest("tr").find(".id").text();
					$(this).closest("tr").addClass("alert-error").find(".app_reg").append("Rejected");
					$(this).closest("tr").find(".btn-group").remove();
					reject_hr(id); 
				});
			}
		});
	}
	
	function get_gen_infra_data(){
		$.ajax({
			url: '<?php echo URL?>admin/get_gen_infra',
			type: 'GET',
			dataType: 'JSON',
			async: false,
			success: function(data) {
				for (var i in data){
						$('#infra_approve').append('<tr class="infra_mod_row"><td style="display:none" class="id">'+data[i].id+'</td><td style="display:none" class="block_id">'+data[i].block_id+'</td><td style="display:none" class="infra_id">'+data[i].infra_id+'</td><td>'+data[i].dist_name+'</td><td>'+data[i].block_name+'</td><td>'+data[i].im_name+'</td><td>'+data[i].current_availability+'</td><td class="new_availability">'+data[i].new_availability+'</td><td>'+data[i].current_accessibility+'</td><td class="new_accessibility">'+data[i].new_accessibility+'</td><td>'+data[i].current_infra_condition+'</td><td class="new_infra_condition">'+data[i].new_infra_condition+'</td><td>'+data[i].current_score+'</td><td class="new_score">'+data[i].new_score+'</td><td>'+data[i].user_name+'</td><td>'+data[i].last_update_date+'</td><td class="app_reg"><div class="btn-group"><button class="approve btn btn-mini">Approved</button><button class="regect btn btn-mini btn-danger">Reject</button></div></td></tr>');
			    }
				$("#infra_approve").on("click", ".approve", function() {
					var id = $(this).closest("tr").find(".id").text();
					var block_id = $(this).closest("tr").find(".block_id").text();
					var infra_id = $(this).closest("tr").find(".infra_id").text();
					var new_availability = $(this).closest("tr").find(".new_availability").text();
					var new_accessibility = $(this).closest("tr").find(".new_accessibility").text();
					var new_infra_condition = $(this).closest("tr").find(".new_infra_condition").text();
					var new_score=$(this).closest("tr").find(".new_score").text();
					$(this).closest("tr").addClass("alert-success").find(".app_reg").append("Approved");
					$(this).closest("tr").find(".btn-group").remove();
					approved_infra(id,block_id,infra_id,new_accessibility,new_availability,new_infra_condition,new_score);					
				});
				$("#infra_approve").on("click", ".regect", function() {
					var id = $(this).closest("tr").find(".id").text();
					$(this).closest("tr").addClass("alert-success").find(".app_reg").append("Rejected");
					$(this).closest("tr").find(".btn-group").remove();
					reject_infra(id); 
				});
			}
		});
	}
	function get_growth_poss_data(){
		$.ajax({
			url: '<?php echo URL?>admin/get_growth_poss',
			type: 'GET',
			dataType: 'JSON',
			async: false,
			success: function(data) {
				for (var i in data){
						$('#growth_poss_approve').append('<tr class="grwoth_possi"><td style="display:none" class="id">'+data[i].id+'</td><td style="display:none" class="block_id">'+data[i].block_id+'</td><td>'+data[i].dist_name+'</td><td>'+data[i].block_name+'</td><td>'+data[i].current_possible_sectors+'</td><td class="new_possible_sectors">'+data[i].new_possible_sectors+'</td><td>'+data[i].current_manufacturing_service+'</td><td class="new_manufacturing_service">'+data[i].new_manufacturing_service+'</td><td>'+data[i].current_impediments_order+'</td><td class="new_impediments_order">'+data[i].new_impediments_order+'</td><td>'+data[i].current_remarks+'</td><td class="new_remarks">'+data[i].new_remarks+'</td><td>'+data[i].user_name+'</td><td>'+data[i].last_update_date+'</td><td class="app_reg"><div class="btn-group"><button class="approve btn btn-mini">Approve</button><button class="regect btn btn-mini btn-danger">Reject</button></div></td></tr>');
			    }
				$("#growth_poss_approve").on("click", ".approve", function() {
					var id = $(this).closest("tr").find(".id").text();
					var block_id = $(this).closest("tr").find(".block_id").text();
					var new_possible_sectors = $(this).closest("tr").find(".new_possible_sectors").text();
					var new_manufacturing_service = $(this).closest("tr").find(".new_manufacturing_service").text();
					var new_impediments_order = $(this).closest("tr").find(".new_impediments_order").text();
					var new_remarks = $(this).closest("tr").find(".new_remarks").text();
					$(this).closest("tr").addClass("alert-success").find(".app_reg").append("Approved");
					$(this).closest("tr").find(".btn-group").remove();
					approved_growth_poss(id,block_id,new_possible_sectors,new_manufacturing_service,new_impediments_order,new_remarks);				
				});
				
				$("#growth_poss_approve").on("click", ".regect", function() {
					var id = $(this).closest("tr").find(".id").text();
					$(this).closest("tr").addClass("alert-error").find(".app_reg").append("Rejected");
					$(this).closest("tr").find(".btn-group").remove();
					reject_growth_poss(id); 
				});
			}
		});
	}
	
	function approved_rm(id,block_id,rm_id,new_occurrence,new_availibility,new_present_usage,new_score){
		 $.ajax({
			  type:'POST',
	          url: '<?php echo URL;?>update_block/block_rm_update',
	          data: {id:id,block_id:block_id,rm_id:rm_id,new_occurrence:new_occurrence,new_availibility:new_availibility,new_present_usage:new_present_usage,new_score:new_score},
			  dataType: 'JSON',
			  async: false,
	          success: function(){        	  
	          }
	     }); 
	}
	function reject_rm(id){
		 $.ajax({
			  type:'POST',
	          url: '<?php echo URL;?>update_block/temp_block_rm_update_regect',
	          data: {id:id},
			  dataType: 'JSON',
			  async: false,
	          success: function(){	        	  
	          }
	     }); 
	}
	function approved_hr(id,block_id,hr_id,new_occurrence,new_commercial_viability,new_present_usage,new_score){
		 $.ajax({
			  type:'POST',
	          url: '<?php echo URL;?>update_block/block_hr_update',
	          data: {id:id,block_id:block_id,hr_id:hr_id,new_occurrence:new_occurrence,new_commercial_viability:new_commercial_viability,new_present_usage:new_present_usage,new_score:new_score},
			  dataType: 'JSON',
			  async: false,
	          success: function(){        	  
	          }
	     }); 
	}
	function reject_hr(id){
		 $.ajax({
			  type:'POST',
	          url: '<?php echo URL;?>update_block/temp_block_hr_update_regect',
	          data: {id:id},
			  dataType: 'JSON',
			  async: false,
	          success: function(){	        	  
	          }
	     }); 
	}	

	function approved_infra(id,block_id,infra_id,new_accessibility,new_availability,new_infra_condition,new_score){
		 $.ajax({
			  type:'POST',
	          url: '<?php echo URL;?>update_block/block_infra_update',
	          data: {id:id,block_id:block_id,infra_id:infra_id,new_accessibility:new_accessibility,new_availability:new_availability,new_infra_condition:new_infra_condition,new_score:new_score},
			  dataType: 'JSON',
			  async: false,
	          success: function(){        	  
	          }
	     }); 
	}
	function reject_infra(id){
		 $.ajax({
			  type:'POST',
	          url: '<?php echo URL;?>update_block/temp_block_infra_update_regect',
	          data: {id:id},
			  dataType: 'JSON',
			  async: false,
	          success: function(){	        	  
	          }
	     }); 
	}
	function approved_growth_poss(id,block_id,new_possible_sectors,new_manufacturing_service,new_impediments_order,new_remarks){
		 $.ajax({
			  type:'POST',
	          url: '<?php echo URL;?>update_block/block_growth_possibilites_update',
	          data: {id:id,block_id:block_id,new_possible_sectors:new_possible_sectors,new_manufacturing_service:new_manufacturing_service,new_impediments_order:new_impediments_order,new_remarks:new_remarks},
			  dataType: 'JSON',
			  async: false,
	          success: function(){        	  
	          }
	     }); 
	}
	function reject_growth_poss(id){
		 $.ajax({
			  type:'POST',
	          url: '<?php echo URL;?>update_block/temp_block_growth_possibilites_update_regect',
	          data: {id:id},
			  dataType: 'JSON',
			  async: false,
	          success: function(){	        	  
	          }
	     }); 
	}
	
</script>
