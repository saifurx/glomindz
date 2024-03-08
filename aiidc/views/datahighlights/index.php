<div class="container">
	<h4 class="img-polaroid alert-success">Zone and District wise Data
		Highlights</h4>

	<div>
		<div class="form-inline">
			<strong> Raw Materials Catagory</strong> <select name="dist_id" id="dist_id">
			
				<?php foreach($this->rm_catagory as $key => $value) {?>
				<option value="<?php echo $value['id']; ?>">
				<?php echo $value['name']; ?>
				</option>
				<?php }?>
			
			</select><strong> Human Resource Catagory</strong> <select name="dist_id" id="dist_id">
			
				<?php foreach($this->hr_catagory as $key => $value) {?>
				<option value="<?php echo $value['id']; ?>">
				<?php echo $value['name']; ?>
				</option>
				<?php }?>
			
			</select>
			<button class="btn" id="block_search">Display</button>
			<hr>
		</div>
	</div>
	<table class="table table-bordered table-striped">
		<thead>
			<tr class="label">
				<th class="span1">Sl No.</th>
				<th class="span1">Zone</th>
				<th class="span2">District</th>
				<th class="span2">Blocks</th>
				<th class="span2">Raw Materials <small>(Top 5)</small></th>
				<th class="span4">Human Resources <small>(Top 5)</small></th>
			</tr>
		</thead>
		<tbody id="data_dist_wise">

		</tbody>
	</table>
	<div id="try"></div>
</div>


<script type="text/javascript">
$('#datahighlights').addClass('active');
window.onload = function() {

	$.ajax({
		url: '<?php echo URL?>datahighlights/get_data_highlight_array',
		type: 'GET',
		dataType: 'JSON',
		async: false,
		beforeSend: function() {		
		},
		success: function(data) {
			for (var i in data){
				var blocks = data[i][3];
				blocks=blocks.replace(/!!/g,'<br/>');
				var rm_data=data[i][4];
				rm_data=rm_data.replace(/!!/g,'<br/>');
				var hr_data=data[i][5];
				hr_data=hr_data.replace(/!!/g,'<br/>');				
				var slno=parseInt(i)+1;
				var zone='';
				if(data[i][2]!=null){
					zone=data[i][2];	
				}
				
				$('#data_dist_wise').append('<tr><td>'+slno+'</td><td>'+zone+'</td><td>'+data[i][1]+'</td><td>'+blocks+'</td><td>'+rm_data+'</td><td>'+hr_data+'</td></tr>');
			}
		}
	});
};

</script>
