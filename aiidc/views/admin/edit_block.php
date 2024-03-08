<div class="container">
	<div class="container">
		<div class="subnav subnav-fixed">
			<ul class="nav nav-pills">
				<li class="active"><a href="<?php echo URL;?>admin/edit_block">Update
						Block</a>
				</li>
				<li><a href="<?php echo URL;?>admin/remarks">GM Comments</a></li>
				<?php if(Session::get("role")!="default"){?>
				<li><a href="<?php echo URL;?>admin/analytics">Analytics</a>
				
				<li><a href="<?php echo URL;?>admin">Users List</a></li>
				
				
			<li><a href="<?php echo URL;?>admin/approve">Modified
					Data</a>
			</li>
			<?php }else{?>
			<li><a href="<?php echo URL;?>admin/modification">Modified
					Data</a>
			</li>
			<?php }?>
				
				<li><a href="<?php echo URL;?>admin/change_password">Change Password</a></li>
			</ul>
		</div>
	</div>
	<hr>
	<div class="form-inline">
		<strong> District</strong> <select name="dist_id" id="dist_id">
			<option value="0">Select a district</option>
			<?php if(Session::get("role")!="default"){?>
			<?php foreach($this->districtList as $key => $value) {?>
			<option value="<?php echo $value['id']; ?>">
			<?php echo $value['name']; ?>
			</option>
			<?php }?>
			<?php }else{?>
			<?php foreach($this->districtList as $key => $value) { if($value['id']==Session::get("district_id")){?>
			<option value="<?php echo $value['id']; ?>">
			<?php echo $value['name']; ?>
			</option>
			<?php }}?>
			<?php }?>
		</select> <strong>Block</strong> <select name="block_id" id="block_id"></select>
		<button class="btn" id="block_search">Search</button>
	</div>
	<section id="general_info">
	<div class="page-header">
		<h3>
			General Information
			<div class="btn-group pull-right">
				<button class="btn" id="edit_gen_info">Edit</button>
				<button class="btn" id="save_gen_info">Save</button>
				<button class="btn" id="editCancel_gen_info">Cancel</button>
			</div>
		</h3>
	</div>
	<form action="#" method="POST" id="edit_gen_info_form">
		<table class="table table-striped">
			<thead>
			</thead>
			<tbody>
				<tr>
					<td>Block Name<input type="hidden" class="" id="id" name="id">
					</td>
					<td><input id="gendata01" class="genform" name="gendata01"></td>
					<td>Identification No.</td>
					<td><input id="gendata02" class="genform" name="gendata02"></td>
				</tr>
				<tr>
					<td>Subdivision</td>
					<td><input id="gendata03" class="genform" name="gendata03"></td>
					<td>District</td>
					<td><input id="gendata04" class="genform" name="gendata04"></td>
				</tr>
				<tr>
					<td>Distance from the District HQ (km)</td>
					<td><input id="gendata05" class="genform" name="gendata05"></td>
					<td><div style="display: none;" class="lab" id="data02"></div></td>
					<td></td>
				</tr>
				<tr>
					<td>Population of the Block</td>
					<td><input id="gendata06" class="genform" name="gendata06"></td>
					<td>Hindu</td>
					<td><input id="gendata07" class="genform" name="gendata07"></td>
				</tr>
				<tr>
					<td>Muslim</td>
					<td><input id="gendata08" class="genform" name="gendata08"></td>
					<td>Christian</td>
					<td><input id="gendata09" class="genform" name="gendata09"></td>
				</tr>
				<tr>
					<td>Buddhist</td>
					<td><input id="gendata010" class="genform" name="gendata010"></td>
					<td>Others</td>
					<td><input id="gendata011" class="genform" name="gendata011"></td>
				</tr>
				<tr>
					<td>SC</td>
					<td><input id="gendata012" class="genform" name="gendata012"></td>
					<td>ST(P)</td>
					<td><input id="gendata013" class="genform" name="gendata013"></td>
				</tr>
				<tr>
					<td>ST(H)</td>
					<td><input id="gendata014" class="genform" name="gendata014"></td>
					<td>OBC/MOBC</td>
					<td><input id="gendata015" class="genform" name="gendata015"></td>
				</tr>
				<tr>
					<td>Others</td>
					<td><input id="gendata016" class="genform" name="gendata016"></td>
					<td><div style="display: none;" class="lab" id="data02"></div></td>
					<td></td>
				</tr>
				<tr>
					<td>Topography</td>
					<td><select class="genform" id="topography" name="topography">

					<?php
					foreach($this->topography as $key => $value) {?>
							<option value="<?php echo $value['id']; ?>">
							<?php echo $value['id']; ?>
								-
								<?php echo $value['name']; ?>
							</option>
							<?php }?>
					</select> <input id="gendata017" class="genform" name="gendata017">
					</td>
					<td><div style="display: none;" class="lab" id="data02"></div></td>
					<td></td>
				</tr>
				<tr>
					<td>If Riverside, River Name(s)</td>
					<td><input id="gendata018a" class="genform" name="gendata018a"></td>
					<td><input id="gendata018b" class="genform" name="gendata018b"></td>
					<td><input id="gendata018c" class="genform" name="gendata018c"></td>
				</tr>
				<tr>
					<td>Is there any forest nearby</td>
					<td><select class="genform" id="gen_info_forest" name="gendata019">
							<option value="1">Yes</option>
							<option value="2">No</option>
					</select> <input id="gendata019" class="genform" name="">
					</td>
					<td><div style="display: none;" class="lab" id="data02"></div></td>
					<td><div style="display: none;" class="lab" id="data02"></div></td>
				</tr>
				<tr>
					<td>Nearby Forest Name(s)</td>
					<td><input id="gendata019a" class="genform" name="gendata019a"></td>
					<td><input id="gendata019b" class="genform" name="gendata019b"></td>
					<td><input id="gendata019c" class="genform" name="gendata019c"></td>
				</tr>
				<tr>
					<td>Distance (km)</td>
					<td><input id="gendata020a" class="genform" name="gendata020a"></td>
					<td><input id="gendata020b" class="genform" name="gendata020b"></td>
					<td><input id="gendata020c" class="genform" name="gendata020c"></td>
				</tr>
				<tr>
					<td>Area (acre)</td>
					<td><input id="gendata021a" class="genform" name="gendata021a"></td>
					<td><input id="gendata021b" class="genform" name="gendata021b"></td>
					<td><input id="gendata021c" class="genform" name="gendata021c"></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</form>
	</section>

	<section id="raw_materials">
	<div class="page-header">
		<h3>Raw Materials</h3>
		<div class="alert alert-block alert-error fade in">
			<h4>Note:</h4>
			<p>
				<span class="my_span">Occurrence:</span>&nbsp; Yes - 1, No - 2
			</p>
			<p>
				<span class="my_span">Availability:</span>&nbsp; Sufficient for
				consumption, sale/processing - 1, Sufficient for consumption, but
				not for sale/ processing - 2, Not enough for consumption - 3, Not
				Applicable - 4
			</p>
			<p>
				<span class="my_span">Present Usage:</span>&nbsp; Used for
				Consumption - 1, Used for Sale - 2, Used for Processing - 3, Wasted
				- 4, (1,2 & 3) - 5, (1 & 2) - 6, (2 & 3) - 7, Not Applicable - 8
			</p>
		</div>
	</div>

	<table class="table table-striped" id="rawTable">
		<thead>
			<tr>
				<th>Raw Material Type</th>
				<th>Raw Material</th>
				<th>Occurrence</th>
				<th>Availability</th>
				<th>Present Usage</th>

			</tr>
		</thead>
		<tbody id="raw_rows">
		</tbody>
	</table>

	</section>

	<section id="human_resource">
	<div class="page-header">
		<h3>Human Resources</h3>
		<div class="alert alert-block alert-error fade in">
			<h4>Note:</h4>
			<p>
				<span class="my_span">Occurrence:</span>&nbsp; Yes - 1, No - 2
			</p>
			<p>
				<span class="my_span">Commercial viability:</span>&nbsp; Good - 1,
				Fair - 2, Poor - 3, Not Applicable - 4
			</p>
			<p>
				<span class="my_span">Present Usage:</span>&nbsp; Used for own
				consumption - 1, Used commercially - 2, Unused/wasted - 3, (1 and 2)
				- 4, Not Applicable - 5
			</p>
		</div>
	</div>
	<table class="table table-striped" id="hrTable">
		<thead>
			<tr>
				<th>Skills & Talent</th>
				<th>Occurrence</th>
				<th>Commercial viability</th>
				<th>Present Usage</th>
			</tr>
		</thead>
		<tbody id="hr_rows">
		</tbody>
	</table>
	</section>

	<section id="gen_infra">
	<div class="page-header">
		<h3>General Infrastructure</h3>
		<div class="alert alert-block alert-error fade in">
			<h4>Note:</h4>
			<p>
				<span class="my_span">Availability:</span>&nbsp; Yes - 1, No - 2
			</p>
			<p>
				<span class="my_span">Accessibility:</span>&nbsp; Easy - 1, Moderate
				- 2, Difficult - 3, Not Applicable - 4
			</p>
			<p>
				<span class="my_span">Condition:</span>&nbsp; Good - 1, Fair - 2,
				Poor - 3, Not Applicable - 4
			</p>
		</div>
	</div>
	<table class="table table-striped" id="infraTable">
		<thead>
			<tr>
				<th>Infrastructure Type</th>
				<th>Infrastructure Name</th>
				<th>Availability</th>
				<th>Accessibility</th>
				<th>Condition</th>
			</tr>
		</thead>
		<tbody id="infra_rows">
		</tbody>
	</table>
	</section>

	<section id="#growth_possiblities">
	<div class="page-header">
		<h3>Growth Possibilities</h3>

	</div>
	<table class="table table-striped" id="growthTable">
		<thead>
			<tr>
				<th>Possible Sectors</th>
				<th>Manufacturing Service</th>
				<th>Impediments Order</th>
				<th>Remarks</th>
			</tr>
		</thead>
		<tbody id="growth_rows">
		</tbody>
	</table>
	</section>

	<div id="myModal" class="modal hide fade">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h3>Raw Materials Data - Edit</h3>
		</div>
		<div class="modal-body">
			<form class="form-horizontal" id="edit_raw_material_form"
				method="post" action="">
				<input type="hidden" id="model_input_block_id"
					name="model_input_block_id"> <input type="hidden"
					id="model_input_rm_id" name="model_input_rm_id">
				<div class="control-group">
					<label class="control-label" for="input01">Raw Material Type</label>
					<div class="controls">
						<input type="text" disabled="disabled" class="input-xlarge"
							id="model_input_type">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input01">Raw Material</label>
					<div class="controls">
						<input type="text" disabled="disabled" class="input-xlarge"
							id="model_input_name">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input01">Occurrence</label>
					<div class="controls">
						<select id="model_input_occurrence" name="model_input_occurrence">
							<option value="1">1 - Yes</option>
							<option value="2">2 - No</option>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input01">Availibility</label>
					<div class="controls">
						<select id="model_input_availibility"
							name="model_input_availibility">
							<option value="1">1 - Sufficient for consumption, sale/processing</option>
							<option value="2">2 - Sufficient for consumption, but not for
								sale/ processing</option>
							<option value="3">3 - Not enough for consumption</option>
							<option value="4">4 - Not Applicable</option>
						</select>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="input01">Present Usage</label>
					<div class="controls">
						<select id="model_input_present_usage"
							name="model_input_present_usage">
							<option value="1">1 - Used for Consumption</option>
							<option value="2">2 - Used for Sale</option>
							<option value="3">3 - Used for Processing</option>
							<option value="4">4 - Wasted</option>
							<option value="5">5 - (1,2 & 3)</option>
							<option value="6">6 - (1 & 2)</option>
							<option value="7">7 - (2 & 3)</option>
							<option value="8">8 - Not Applicable</option>
						</select>
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal">Cancel</button>
			<button id="update_raw_edit" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="myModal_hr" class="modal hide fade">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h3>Human Resource Data - Edit</h3>
		</div>
		<div class="modal-body">
			<form class="form-horizontal" id="edit_human_resource_form"
				method="post" action="">
				<input type="hidden" id="model_hr_input_block_id"
					name="model_hr_input_block_id"> <input type="hidden"
					id="model_hr_input_hr_id" name="model_hr_input_hr_id">
				<div class="control-group">
					<label class="control-label" for="input01">Skills & Talent</label>
					<div class="controls">
						<input type="text" disabled="disabled" class="input-xlarge"
							id="model_hr_input_name">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input01">Occurrence</label>
					<div class="controls">
						<select id="model_hr_input_occurrence"
							name="model_hr_input_occurrence">
							<option value="1">1 - Yes</option>
							<option value="2">2 - No</option>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input01">Commercial Viability</label>
					<div class="controls">
						<select id="model_hr_commercial_viability"
							name="model_hr_commercial_viability">
							<option value="1">1 - Good</option>
							<option value="2">2 - Fair</option>
							<option value="3">3 - Poor</option>
							<option value="4">4 - Not Applicable</option>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input01">Present Usage</label>
					<div class="controls">
						<select id="model_hr_input_present_usage"
							name="model_hr_input_present_usage">
							<option value="1">1 - Used for own consumption</option>
							<option value="2">2 - Used commercially</option>
							<option value="3">3 - Unused/wasted</option>
							<option value="4">4 - (1 and 2)</option>
							<option value="5">5 - Not Applicable</option>
						</select>
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal">Cancel</button>
			<button id="update_hr_edit" class="btn btn-primary">Save Changes</button>
		</div>
	</div>



	<div id="myModal_gen_infra" class="modal hide fade">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h3>General Infrastructure - Edit</h3>
		</div>
		<div class="modal-body">
			<form class="form-horizontal" id="edit_gen_infra_form" method="post"
				action="">
				<input type="hidden" id="model_infra_input_block_id"
					name="model_infra_input_block_id"> <input type="hidden"
					id="model_infra_input_infra_id" name="model_infra_input_infra_id">
				<div class="control-group">
					<label class="control-label" for="input01">Infrastructure Type</label>
					<div class="controls">
						<input type="text" disabled="disabled" class="input-xlarge"
							id="model_infra_input_type">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input01">Infrastructure Name</label>
					<div class="controls">
						<input type="text" disabled="disabled" class="input-xlarge"
							id="model_infra_input_name">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input01">Availability</label>
					<div class="controls">
						<select id="model_infra_input_availability"
							name="model_infra_input_availability">
							<option value="1">1-Yes</option>
							<option value="2">2-No</option>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input01">Accessibility</label>
					<div class="controls">
						<select id="model_infra_input_accessibility"
							name="model_infra_input_accessibility">
							<option value="1">1 - Easy</option>
							<option value="2">2 - Moderate</option>
							<option value="3">3 - Difficult</option>
							<option value="4">4 - Not Applicable</option>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input01">Condition</label>
					<div class="controls">
						<select id="model_infra_input_condition"
							name="model_infra_input_condition">
							<option value="1">1 - Good</option>
							<option value="2">2 - Fair</option>
							<option value="3">3 - Poor</option>
							<option value="4">4 - Not Applicable</option>
						</select>
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal">Cancel</button>
			<button id="update_gen_infra_edit" class="btn btn-primary">Save
				Changes</button>
		</div>
	</div>

	<!-- Growth Possibility -->
	<div id="myModal_growth_possibility" class="modal hide fade">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h3>Growth Possibilities - Edit</h3>
		</div>
		<div class="modal-body">
			<form class="form-horizontal" id="edit_growth_possibility_form"
				method="post" action="">

				<input type="hidden" id="model_growth_poss_input_block_id"
					name="model_growth_poss_input_block_id" value="">

				<div class="control-group">Do you think that manufacturing and
					service enterprises can grow up in your area?</div>
				<div class="controls">
					<select id="model_growth_poss_input_manufacturing_service"
						name="model_growth_poss_input_manufacturing_service">
						<option value="1">1 - Yes</option>
						<option value="2">2 - No</option>

					</select>
				</div>
				<br />

				<div class="control-group" id="growth-possiblity">
					<label class="control-label" for="input01">Possible Sectors</label>
					<div class="controls">
						<textarea rows="3" id="model_growth_poss_input_possible_sectors"
							name="model_growth_poss_input_possible_sectors"
							placeholder="Example: Food Processing, Tea Based Industry, Bamboo Handicrafts"
							required="required"></textarea>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="input01">Manufacturing Service</label>
					<div class="controls">
						<input type="number" class="input"
							id="model_growth_poss_input_impediments_order"
							name="model_growth_poss_input_impediments_order"
							placeholder="Example: 123457" required="required">
					</div>
					<div class="controls">
						<label><strong>Note:</strong> </label>
					</div>
					<div class="controls">
						1 - Lack of awareness<br /> 2 - Lack of Finance<br /> 3 - Shortage
						of raw materials<br /> 4 - Poor government support<br /> 5 - Lack
						of entrepreneurship<br /> 6 - Insufficient marketing outlets and
						facilities<br /> 7 - Poor communication facilities<br /> 8 - Lack
						of infrastructure<br /> 9 - Other reasons<br />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input01">Remarks</label>
					<div class="controls">
						<input type="text" id="model_growth_poss_input_remarks"
							name="model_growth_poss_input_remarks"
							placeholder="Example: Need to improve ..." required="required" />
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal">Cancel</button>
			<button id="update_growth_poss_edit" class="btn btn-primary">Save
				Changes</button>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
	 $('.genform').attr('disabled',true);
	 $('#save_gen_info').attr('disabled',true);
	 $('#topography').hide();
	 $('#gen_info_forest').hide(); 
});

$('#dist_id').change(function() {
	var dist_id=$(this).val();
	$.ajax({
		url: '<?php echo URL;?>resourcemap/getBlockList',
		type: 'POST',
		data: 'dist=' + dist_id,
		dataType: 'JSON',
		async: false,
		beforeSend: function() {
			$('#block_id').empty();
			$('#block_id').append("<option>Select Block</option>");
		},
		success: function(data) {
			$.each(data ,function(i,value) {
			  //   console.log(value)
			  	  
		    	  $('#block_id').append($("<option></option>").attr("value",value.id).text(value.block_name));
		      });
		}
	});
});	

$('#block_id').change(function() {
	var block_id=$(this).val();
	//alert(block_id);
	main(block_id);
});
function main(block_id){
	$("#block_search").click(function() {
		
		load_general_info(block_id);
		load_raw_material(block_id);
		load_human_resource(block_id);
		load_general_infra(block_id)
		load_growth_possiblities(block_id);
	});	
}

	function load_general_info(block_id){
		$.ajax({
			url: '<?php echo URL;?>profile/get_general_info',
			type: 'POST',
			data: 'block_id=' + block_id,
			dataType: 'JSON',
			async: false,
			success: function(data) {
				//console.log(data);
				for (var i in data){
					 $('#id').val(data[i].id);
					 $('#gendata01').val(data[i].block_name);
					 $('#gendata02').val(data[i].identification_no);
					 $('#gendata03').val(data[i].subdivision);
					 $('#gendata04').val(data[i].dist_name);
					 $('#gendata05').val(data[i].distance_hq);
					 $('#gendata06').val(data[i].pop_total);
					 $('#gendata07').val(data[i].pop_hindu);
					 $('#gendata08').val(data[i].pop_muslim);
					 $('#gendata09').val(data[i].pop_christian);
					 $('#gendata010').val(data[i].pop_budhist);
					 $('#gendata011').val(data[i].pop_others);
					 $('#gendata012').val(data[i].cast_sc);
					 $('#gendata013').val(data[i].cast_stp);
					 $('#gendata014').val(data[i].cast_sth);
					 $('#gendata015').val(data[i].cast_obc_mobc);
					 $('#gendata016').val(data[i].cast_others);
					 $('#gendata017').val(data[i].tdef_topography_name);
					 $('#gendata018a').val(data[i].nearby_river_1);
					 $('#gendata018b').val(data[i].nearby_river_2);
					 $('#gendata018c').val(data[i].nearby_river_3);
					 $('#gendata019').val(data[i].forest_nearby_yn);
					 $('#gendata019a').val(data[i].forest_name_1);
					 $('#gendata019b').val(data[i].forest_name_2);
					 $('#gendata019c').val(data[i].forest_name_3);
					 $('#gendata020a').val(data[i].forest_distance_1);
					 $('#gendata020b').val(data[i].forest_distance_2);
					 $('#gendata020c').val(data[i].forest_distance_3);
					 $('#gendata021a').val(data[i].forest_area_1);
					 $('#gendata021b').val(data[i].forest_area_2);
					 $('#gendata021c').val(data[i].forest_area_3);
					 $('#topography').val(data[i].topography);
				 }
			}
			
		});
	}
	function load_raw_material(block_id){	
		$.ajax({
			url: '<?php echo URL?>profile/raw_materials',
			type: 'POST',
			data: 'block_id=' + block_id,
			dataType: 'JSON',
			async: false,
			beforeSend: function() {$('#raw_rows').empty();},
			success: function(data) {
				for (var i in data){
					$('#raw_rows').append('<tr class="raw_tr"><td style="display:none" class="block_id">'+data[i].block_id+'</td><td style="display:none" class="rm_id">'+data[i].rm_id+'</td><td class="type">'+data[i].type+'</td><td class="name">'+data[i].name+'</td><td class="occurrence">'+data[i].occurrence+'</td><td class="availibility">'+data[i].availibility+'</td><td class="present_usage">'+data[i].present_usage+'</td><td><button class="btn" href="#myModal" data-toggle="modal">Edit</button></td></tr>');
			    }
				
				 $(".raw_tr ").live("click", function(){
						var edit_block_id = $(this).find(".block_id").text();
						var edit_rm_id = $(this).find(".rm_id").text();
						var edit_type= $(this).find(".type").text();
						var edit_name= $(this).find(".name").text();
						var edit_occurrence = $(this).find(".occurrence").text();
						var edit_availibility = $(this).find(".availibility").text();
						var edit_present_usage = $(this).find(".present_usage").text();
						//alert(row1+','+row2); 
						$('#model_input_block_id').val(edit_block_id);
						$('#model_input_rm_id').val(edit_rm_id);
						$('#model_input_type').val(edit_type);
						$('#model_input_name').val(edit_name);
						$('#model_input_occurrence').val(edit_occurrence);
						$('#model_input_availibility').val(edit_availibility);
						$('#model_input_present_usage').val(edit_present_usage);
				 });
				
			}			
		});
	  }

	  function load_human_resource(block_id){
			$.ajax({
				url: '<?php echo URL?>profile/human_resource',
				type: 'POST',
				data: 'block_id=' + block_id,
				dataType: 'JSON',
				async: false,
				beforeSend: function() {$('#hr_rows').empty();},
				success: function(data) {
					for (var i in data){
						$('#hrTable').append('<tr class="hr_tr"><td style="display:none" class="block_id">'+data[i].block_id+'</td><td style="display:none" class="hr_id">'+data[i].hr_id+'</td><td class="hr_name">'+data[i].name+'</td><td class="hr_occurrence">'+data[i].occurrence+'</td><td class="hr_commercial_viability">'+data[i].commercial_viability+'</td><td class="hr_present_usage">'+data[i].present_usage+'</td><td><button class="btn" href="#myModal_hr" data-toggle="modal">Edit</button></td></tr>');
				    }
					$(".hr_tr ").live("click", function(){
							var edit_hr_block_id = $(this).find(".block_id").text();
							var edit_hr_id = $(this).find(".hr_id").text();
							var edit_hr_name= $(this).find(".hr_name").text();
							var edit_hr_occurrence = $(this).find(".hr_occurrence").text();
							var edit_hr_commercial_viability = $(this).find(".hr_commercial_viability").text();
							var edit_hr_present_usage = $(this).find(".hr_present_usage").text(); 
							$('#model_hr_input_block_id').val(edit_hr_block_id);
							$('#model_hr_input_hr_id').val(edit_hr_id);
							$('#model_hr_input_name').val(edit_hr_name);
							$('#model_hr_input_occurrence').val(edit_hr_occurrence);
							$('#model_hr_commercial_viability').val(edit_hr_commercial_viability);
							$('#model_hr_input_present_usage').val(edit_hr_present_usage);
							
					 });
				}
			});
	  }
		function load_general_infra(block_id){
			$.ajax({
				url: '<?php echo URL?>profile/general_infra',
				type: 'POST',
				data: 'block_id=' + block_id,
				dataType: 'JSON',
				async: false,
				beforeSend: function() {$('#infra_rows').empty();},
				success: function(data) {			
					for (var i in data){
						$('#infraTable').append('<tr class="infra_tr"><td style="display:none" class="block_id">'+data[i].block_id+'</td><td style="display:none" class="infra_id">'+data[i].infra_id+'</td><td class="infra_type">'+data[i].type+'</td><td class="infra_name">'+data[i].name+'</td><td class="infra_availability">'+data[i].availability+'</td><td class="infra_accessibility">'+data[i].accessibility+'</td><td class="infra_condition">'+data[i].infra_condition+'</td><td><button class="btn" href="#myModal_gen_infra" data-toggle="modal">Edit</button></td></tr>');			
				    }
					$(".infra_tr ").live("click", function(){
						var edit_infra_block_id = $(this).find(".block_id").text();
						var edit_infra_id = $(this).find(".infra_id").text();
						var edit_infra_type= $(this).find(".infra_type").text();
						var edit_infra_name= $(this).find(".infra_name").text();
						var edit_infra_availability = $(this).find(".infra_availability").text();
						var edit_infra_accessibility = $(this).find(".infra_accessibility").text();
						var edit_infra_condition = $(this).find(".infra_condition").text(); 
						$('#model_infra_input_block_id').val(edit_infra_block_id);
						$('#model_infra_input_infra_id').val(edit_infra_id);
						$('#model_infra_input_type').val(edit_infra_type);
						$('#model_infra_input_name').val(edit_infra_name);
						$('#model_infra_input_availability').val(edit_infra_availability);
						$('#model_infra_input_accessibility').val(edit_infra_accessibility);
						$('#model_infra_input_condition').val(edit_infra_condition);
						
				 });
				}			
			});
	}	
	function load_growth_possiblities(block_id){

		$.ajax({
			url: '<?php echo URL?>profile/growth_possiblities',
			type: 'POST',
			data: 'block_id=' + block_id,
			dataType: 'JSON',
			async: false,
			beforeSend: function() {$('#growth_rows').empty();},
			success: function(data) {
				//console.log(data);
				for (var i in data){
					
					$('#growthTable').append('<tr class="growth_possi"><td style="display:none" class="block_id">'+data[i].block_id+'</td><td class="possible_sec">'+data[i].possible_sectors+'</td><td class="manuf_service">'+data[i].manufacturing_service+'</td><td class="impediment_ord">'+data[i].impediments_order+'</td><td class="remarks">'+data[i].remarks+'</td><td><a class="btn" href="#myModal_growth_possibility" data-toggle="modal">Edit</a></td></tr>');
			    }
				$(".growth_possi").live("click", function(){
					var edit_growth_possi_block_id = $(this).find(".block_id").text();
					var edit_growth_possi_possible_sectors = $(this).find(".possible_sec").text();	
					var edit_growth_manufacturing_service = $(this).find(".manuf_service").text();
					var edit_growth_impediments_order = $(this).find(".impediment_ord").text();
					var edit_growth_remarks = $(this).find(".remarks").text();

	
					$('#model_growth_poss_input_block_id').val(edit_growth_possi_block_id);
					$('#model_growth_poss_input_manufacturing_service').val(edit_growth_manufacturing_service);
					$('#model_growth_poss_input_possible_sectors').val(edit_growth_possi_possible_sectors);
					$('#model_growth_poss_input_impediments_order').val(edit_growth_impediments_order);
					$('#model_growth_poss_input_remarks').val(edit_growth_remarks);
					


	
					if(edit_growth_manufacturing_service==1){
						$('#growth-possiblity').show();
					}
					if(edit_growth_manufacturing_service==2){
						$('#growth-possiblity').hide();
					}
					
			 });
			}
		});
	}

$(".genform").change(function(){
  $(this).css("background-color","#e37689");
});

$('#editCancel_gen_info').click(function() {
	$('.genform').attr('disabled',true);
	$('#typeahead').attr('disabled',false);
	$('#save_gen_info').attr('disabled',true);
	$('.genform').css("background-color","");
	 $('#topography').hide();
	 $('#gen_info_forest').hide();
	 $('#gendata019').show();
	 $('#gendata017').show();
});

$('#edit_gen_info').click(function() {
	 $('#typeahead').attr('disabled',true);
	 $('.genform').attr('disabled',false);
	 $('#save_gen_info').attr('disabled',false);
	 $('#topography').show();
	 $('#gen_info_forest').show();
	 $('#gendata017').hide();
	 $('#gendata019').hide();
	 
});

$('#update_raw_edit').click(function() {
	var rawformData = $('form#edit_raw_material_form').serialize();
	//var block_id = $('#model_input_block_id').val();
	  $.ajax({
		  type:'POST',
          url: '<?php echo URL;?>update_block/update_raw_material',
          data: rawformData,
          success: function(){
        	  //main(block_id);
        	  //$("#block_search").click();
        	  $('#myModal').modal('hide');
          }
     }); 
	
});
$('#update_hr_edit').click(function() {
	var hrformData = $('form#edit_human_resource_form').serialize();
	  $.ajax({
		  type:'POST',
          url: '<?php echo URL;?>update_block/update_human_resource',
          data: hrformData,
          success: function(){
        	 // $("#block_search").click();
        	  $('#myModal_hr').modal('hide');
          }
     }); 
	
});

$('#update_gen_infra_edit').click(function() {
	var hrformData = $('form#edit_gen_infra_form').serialize();
	  $.ajax({
		  type:'POST',
          url: '<?php echo URL;?>update_block/update_gen_infra',
          data: hrformData,
          success: function(){
        	 // $("#block_search").click();
        	  $('#myModal_gen_infra').modal('hide');
          }
     }); 
	
});

$('#save_gen_info').click(function() {
	var formData = $('form#edit_gen_info_form').serialize();
	  $.ajax({
		    type:'POST',
            url: '<?php echo URL;?>update_block/update_gen_info',
            data: formData,
            success: function(){
        		$('.genform').attr('disabled',true);
        		$('#typeahead').attr('disabled',false);
        		$('#save_gen_info').attr('disabled',true);
        		$('.genform').css("background-color","");
        		$('#topography').hide();
        		$('#gen_info_forest').hide();
        		$('#gendata017').show();
        		$('#gendata019').show();
            }
       });   
});

//growth_possibility
$('#update_growth_poss_edit').click(function() {
	var formData = $('form#edit_growth_possibility_form').serialize();
	//console.log(formData);
	 $.ajax({
		  type:'POST',
          url: '<?php echo URL;?>update_block/update_growth_possibilities',
          data: formData,
          success: function(){
        	  //$("#block_search").click();
        	  $('#myModal_growth_possibility').modal('hide');
          }
     }); 
	
});

//growth possiblity
$('#model_growth_poss_input_manufacturing_service').change(function() {	
	var selected=$('#model_growth_poss_input_manufacturing_service').val();
	if(selected==1){
		$('#growth-possiblity').show();
	}
	if(selected==2){
		$('#growth-possiblity').hide();
	}
});


</script>
<script type="text/javascript">
	$('#admin').addClass('active');
</script>
