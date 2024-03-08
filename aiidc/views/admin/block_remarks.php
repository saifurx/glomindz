<div class="container">
	<div class="container">
		<div class="subnav subnav-fixed">
			<ul class="nav nav-pills">
				<li><a href="<?php echo URL;?>admin/edit_block">Update Block</a></li>
				<li class="active"><a href="<?php echo URL;?>admin/remarks">GM
						Comments</a>
				</li>
				<?php if(Session::get("role")!="default"){?>
			<li><a href="<?php echo URL;?>admin/analytics">Analytics</a>
			<li><a href="<?php echo URL;?>admin">Users List</a></li>
		
			<li><a href="<?php echo URL;?>admin/approve">Modified
					Data</a>
			</li>
			<?php }else{?>
			<li ><a href="<?php echo URL;?>admin/modification">Modified
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
	</div>
	<hr>
	<div class="span12">
		<h3 id="block_name"></h3>
		<hr>
		<div id="land_availavle"></div>
		<br>
		<div id="land_list"></div>
		<br>
		<div id="mdsd_viable"></div>
		<br>
		<div id="mdsd_list"></div>
		<br>
		<div id="pref_pos"></div>
	</div>
</div>

<script>


$('#dist_id').change(function() {
	clear_all_field();
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
	clear_all_field();
	var block_id=$(this).val();
	console.log(block_id);
	var block_name=$("#block_id option:selected").text();
	$('#block_name').append(block_name);
	get_block_gm_comments(block_id);
	
});

function clear_all_field(){

	$('#block_name').empty();
	$('#land_availavle').empty();
	$('#land_list').empty();
	$('#mdsd_viable').empty();
	$('#mdsd_list').empty();
	$('#pref_pos').empty();
	
}
function get_block_gm_comments(block_id){
		$.ajax({
			url: '<?php echo URL;?>profile/get_block_gm_comments',
			type: 'POST',
			data: 'block_id=' + block_id,
			dataType: 'JSON',
			async: false,
			success: function(data) {
				console.log(data);
				if(data[0].land_available==1){
					$('#land_availavle').append("Any land available in the Block area for setting up an MDSD Centre/Mini Industrial Area:<strong> Yes</strong>");
					get_block_gm_comments_available_loc(block_id);
				}else{
					$('#land_availavle').append("Any land available in the Block area for setting up an MDSD Centre/Mini Industrial Area:<strong> No</strong>");
					
				}
				if(data[0].mdsd_viable==1){
						$('#mdsd_viable').append("Whether setting up of an MDSD Centre in this Block area is viable:<strong>Yes</strong>");
						get_block_gm_comments_viable_mdsd(block_id);
					}else{
						$('#mdsd_viable').append("Whether setting up of an MDSD Centre in this Block area is viable:<strong>Yes</strong>");
						
					}
				
					$('#pref_pos').append("Block preferencial position for setting up of such a Centre:&nbsp;<strong>"+data[0].block_pref_position+"</strong>&nbsp;(&nbsp;in order of 1 to 20)");
				
				
			}
			
		});
	}
	function get_block_gm_comments_available_loc(block_id){	
		$.ajax({
			url: '<?php echo URL?>profile/get_block_gm_comments_available_loc',
			type: 'POST',
			data: 'block_id=' + block_id,
			dataType: 'JSON',
			async: false,
			success: function(data) {
				//console.log(data);
				$('#land_list').append("<h3>Available Location</h3><br>");
				 $.each(data ,function(i,value) {
					 $('#land_list').append("<b>"+value.location_name+"</b>&nbsp;&nbsp;"+value.area_in_acre+"&nbsp;acre approx.<br>");
				 });
				
			}			
		});
	  }

	  function get_block_gm_comments_viable_mdsd(block_id){
			$.ajax({
				url: '<?php echo URL?>profile/get_block_gm_comments_viable_mdsd',
				type: 'POST',
				data: 'block_id=' + block_id,
				dataType: 'JSON',
				async: false,
				success: function(data) {
					$('#mdsd_list').append("<h4>List of Trades to be covered in the proposed MDSD Centre:</h4>");
					 $.each(data ,function(i,value) {
						 $('#mdsd_list').append("<b>"+value.name+"<b><br>");
					 });
				}
			});
	  }
		

</script>
<script type="text/javascript">
	$('#admin').addClass('active');
</script>
