<div class="container">
	<div class="row">
		<div class="span12">
			<div class="span4">
				<form class="form-inline" style="margin-bottom: 0px;">
					<input class="span3" autocomplete="off" type="text"
						placeholder="Search for Block" id="typeahead"
						data-provide="typeahead">
				</form>
			</div>
		</div>
	</div>
	<hr>
	<div class="row">
		<!-- 1st column -->
		<div class="span4">
			<div class="span3">
				<table class="table table-striped img-polaroid">
					<tr class="success">
						<td><a href="district_profile_details/1"><strong class="black">Baska</strong>
						</a>
						</td>
					</tr>
					<?php
					foreach($this->dist_and_blocks as $key => $value) {
						if($value['dist_id']==1){
							echo '<tr>';
							echo '<td><a href="block_profile_details/'. $value['id'] .'" tabindex="-1">'. $value['block_name'] . '</a></td>';
							echo '</tr>';
							}
						}
						?>
				</table>
			</div>
			<div class="span3">
				<table class="table table-striped img-polaroid">
					<tr class="success">
						<td><a href="district_profile_details/2"><strong class="black">Barpeta</strong>
						</a>
						</td>
					</tr>
					<?php
					foreach($this->dist_and_blocks as $key => $value) {
						if($value['dist_id']==2){
							echo '<tr>';
							echo '<td><a href="block_profile_details/'. $value['id'] .'" tabindex="-1">'. $value['block_name'] . '</a></td>';
							echo '</tr>';
							}
						}
						?>
				</table>
			</div>
			<div class="span3">
				<table class="table table-striped img-polaroid">
					<tr class="success">
						<td><a href="district_profile_details/3"><strong class="black">Bongaigaon</strong>
						</a>
						</td>
					</tr>
					<?php
					foreach($this->dist_and_blocks as $key => $value) {
						if($value['dist_id']==3){
							echo '<tr>';
							echo '<td><a href="block_profile_details/'. $value['id'] .'" tabindex="-1">'. $value['block_name'] . '</a></td>';
							echo '</tr>';
							}
						}
						?>
				</table>
			</div>
			<div class="span3">
				<table class="table table-striped img-polaroid">
					<tr class="success">
						<td><a href="district_profile_details/4"><strong class="black">Cachar</strong>
						</a>
						</td>
					</tr>
					<?php
					foreach($this->dist_and_blocks as $key => $value) {
						if($value['dist_id']==4){
							echo '<tr>';
							echo '<td><a href="block_profile_details/'. $value['id'] .'" tabindex="-1">'. $value['block_name'] . '</a></td>';
							echo '</tr>';
							}
						}
						?>
				</table>
			</div>
			<div class="span3">
				<table class="table table-striped img-polaroid">
					<tr class="success">
						<td><a href="district_profile_details/5"><strong class="black">Chirang</strong>
						</a>
						</td>
					</tr>
					<?php
					foreach($this->dist_and_blocks as $key => $value) {
						if($value['dist_id']==5){
							echo '<tr>';
							echo '<td><a href="block_profile_details/'. $value['id'] .'" tabindex="-1">'. $value['block_name'] . '</a></td>';
							echo '</tr>';
							}
						}
						?>
				</table>
			</div>
			<div class="span3">
				<table class="table table-striped img-polaroid">
					<tr class="success">
						<td><a href="district_profile_details/6"><strong class="black">Darrang</strong>
						</a>
						</td>
					</tr>
					<?php
					foreach($this->dist_and_blocks as $key => $value) {
						if($value['dist_id']==6){
							echo '<tr>';
							echo '<td><a href="block_profile_details/'. $value['id'] .'" tabindex="-1">'. $value['block_name'] . '</a></td>';
							echo '</tr>';
							}
						}
						?>
				</table>
			</div>
			<div class="span3">
				<table class="table table-striped img-polaroid">
					<tr class="success">
						<td><a href="district_profile_details/7"><strong class="black">Dhemaji</strong>
						</a>
						</td>
					</tr>
					<?php
					foreach($this->dist_and_blocks as $key => $value) {
						if($value['dist_id']==7){
							echo '<tr>';
							echo '<td><a href="block_profile_details/'. $value['id'] .'" tabindex="-1">'. $value['block_name'] . '</a></td>';
							echo '</tr>';
							}
						}
						?>
				</table>
			</div>
			<div class="span3">
				<table class="table table-striped img-polaroid">
					<tr class="success">
						<td><a href="district_profile_details/8"><strong class="black">Dhubri</strong>
						</a>
						</td>
					</tr>
					<?php
					foreach($this->dist_and_blocks as $key => $value) {
						if($value['dist_id']==8){
							echo '<tr>';
							echo '<td><a href="block_profile_details/'. $value['id'] .'" tabindex="-1">'. $value['block_name'] . '</a></td>';
							echo '</tr>';
							}
						}
						?>
				</table>
			</div>
			<div class="span3">
				<table class="table table-striped img-polaroid">
					<tr class="success">
						<td><a href="district_profile_details/10"><strong class="black">Goalpara</strong>
						</a>
						</td>
					</tr>
					<?php
					foreach($this->dist_and_blocks as $key => $value) {
						if($value['dist_id']==10){
							echo '<tr>';
							echo '<td><a href="block_profile_details/'. $value['id'] .'" tabindex="-1">'. $value['block_name'] . '</a></td>';
							echo '</tr>';
							}
						}
						?>
				</table>
			</div>
		</div>
		<!-- 2nd column -->
		<div class="span4">
			<div class="span3">
				<table class="table table-striped img-polaroid">
					<tr class="success">
						<td><a href="district_profile_details/9"><strong class="black">Dibrugarh</strong>
						</a>
						</td>
					</tr>
					<?php
					foreach($this->dist_and_blocks as $key => $value) {
						if($value['dist_id']==9){
							echo '<tr>';
							echo '<td><a href="block_profile_details/'. $value['id'] .'" tabindex="-1">'. $value['block_name'] . '</a></td>';
							echo '</tr>';
							}
						}
						?>
				</table>
			</div>
			<div class="span3">
				<table class="table table-striped img-polaroid">
					<tr class="success">
						<td><a href="district_profile_details/11"><strong class="black">Golaghat</strong>
						</a>
						</td>
					</tr>
					<?php
					foreach($this->dist_and_blocks as $key => $value) {
						if($value['dist_id']==11){
							echo '<tr>';
							echo '<td><a href="block_profile_details/'. $value['id'] .'" tabindex="-1">'. $value['block_name'] . '</a></td>';
							echo '</tr>';
							}
						}
						?>
				</table>
			</div>
			<div class="span3">
				<table class="table table-striped img-polaroid">
					<tr class="success">
						<td><a href="district_profile_details/12"><strong class="black">Hailakandi</strong>
						</a>
						</td>
					</tr>
					<?php
					foreach($this->dist_and_blocks as $key => $value) {
						if($value['dist_id']==12){
							echo '<tr>';
							echo '<td><a href="block_profile_details/'. $value['id'] .'" tabindex="-1">'. $value['block_name'] . '</a></td>';
							echo '</tr>';
							}
						}
						?>
				</table>
			</div>
			<div class="span3">
				<table class="table table-striped img-polaroid">
					<tr class="success">
						<td><a href="district_profile_details/13"><strong class="black">Jorhat</strong>
						</a>
						</td>
					</tr>
					<?php
					foreach($this->dist_and_blocks as $key => $value) {
						if($value['dist_id']==13){
							echo '<tr>';
							echo '<td><a href="block_profile_details/'. $value['id'] .'" tabindex="-1">'. $value['block_name'] . '</a></td>';
							echo '</tr>';
							}
						}
						?>
				</table>
			</div>
			<div class="span3">
				<table class="table table-striped img-polaroid">
					<tr class="success">
						<td><a href="district_profile_details/14"><strong class="black">Kamrup</strong>
						</a>
						</td>
					</tr>
					<?php
					foreach($this->dist_and_blocks as $key => $value) {
						if($value['dist_id']==14){
							echo '<tr>';
							echo '<td><a href="block_profile_details/'. $value['id'] .'" tabindex="-1">'. $value['block_name'] . '</a></td>';
							echo '</tr>';
							}
						}
						?>
				</table>
			</div>
			<div class="span3">
				<table class="table table-striped img-polaroid">
					<tr class="success">
						<td><a href="district_profile_details/15"><strong class="black">Kamrup(M)</strong>
						</a>
						</td>
					</tr>
					<?php
					foreach($this->dist_and_blocks as $key => $value) {
						if($value['dist_id']==15){
							echo '<tr>';
							echo '<td><a href="block_profile_details/'. $value['id'] .'" tabindex="-1">'. $value['block_name'] . '</a></td>';
							echo '</tr>';
							}
						}
						?>
				</table>
			</div>
			<div class="span3">
				<table class="table table-striped img-polaroid">
					<tr class="success">
						<td><a href="district_profile_details/16"><strong class="black">Karbi
									Anglong</strong>
						</a>
						</td>
					</tr>
					<?php
					foreach($this->dist_and_blocks as $key => $value) {
						if($value['dist_id']==16){
							echo '<tr>';
							echo '<td><a href="block_profile_details/'. $value['id'] .'" tabindex="-1">'. $value['block_name'] . '</a></td>';
							echo '</tr>';
							}
						}
						?>
				</table>
			</div>
			<div class="span3">
				<table class="table table-striped img-polaroid">
					<tr class="success">
						<td><a href="district_profile_details/17"><strong class="black">Karimganj</strong>
						</a>
						</td>
					</tr>
					<?php
					foreach($this->dist_and_blocks as $key => $value) {
						if($value['dist_id']==17){
							echo '<tr>';
							echo '<td><a href="block_profile_details/'. $value['id'] .'" tabindex="-1">'. $value['block_name'] . '</a></td>';
							echo '</tr>';
							}
						}
						?>
				</table>
			</div>
				<div class="span3">
				<table class="table table-striped img-polaroid">
				<tr class="success"><td><a href="district_profile_details/19"><strong class="black">Lakhimpur</strong></a></td></tr>
					<?php
						foreach($this->dist_and_blocks as $key => $value) {
						if($value['dist_id']==19){
							echo '<tr>';					
							echo '<td><a href="block_profile_details/'. $value['id'] .'" tabindex="-1">'. $value['block_name'] . '</a></td>';
							echo '</tr>';
							}
						}
					?>
				</table>
			</div>
			
			<div class="span3">
				<table class="table table-striped img-polaroid">
					<tr class="success">
						<td><a href="district_profile_details/20"><strong class="black">Marigaon</strong>
						</a>
						</td>
					</tr>
					<?php
					foreach($this->dist_and_blocks as $key => $value) {
						if($value['dist_id']==20){
							echo '<tr>';
							echo '<td><a href="block_profile_details/'. $value['id'] .'" tabindex="-1">'. $value['block_name'] . '</a></td>';
							echo '</tr>';
							}
						}
						?>
				</table>
			</div>
		</div>
		<!-- 3rd column -->
		<div class="span4">

			<div class="span3">
				<table class="table table-striped img-polaroid">
					<tr class="success">
						<td><a href="district_profile_details/23"><strong class="black">Dima
									Hasao</strong>
						</a>
						</td>
					</tr>
					<?php
					foreach($this->dist_and_blocks as $key => $value) {
						if($value['dist_id']==23){
							echo '<tr>';
							echo '<td><a href="block_profile_details/'. $value['id'] .'" tabindex="-1">'. $value['block_name'] . '</a></td>';
							echo '</tr>';
							}
						}
						?>
				</table>
			</div>
			<div class="span3">
				<table class="table table-striped img-polaroid">
					<tr class="success">
						<td><a href="district_profile_details/18"><strong class="black">Kokrajhar</strong>
						</a>
						</td>
					</tr>
					<?php
					foreach($this->dist_and_blocks as $key => $value) {
						if($value['dist_id']==18){
							echo '<tr>';
							echo '<td><a href="block_profile_details/'. $value['id'] .'" tabindex="-1">'. $value['block_name'] . '</a></td>';
							echo '</tr>';
							}
						}
						?>
				</table>
			</div>
			<div class="span3">
				<table class="table table-striped img-polaroid">
					<tr class="success">
						<td><a href="district_profile_details/21"><strong class="black">Nagaon</strong>
						</a>
						</td>
					</tr>
					<?php
					foreach($this->dist_and_blocks as $key => $value) {
						if($value['dist_id']==21){
							echo '<tr>';
							echo '<td><a href="block_profile_details/'. $value['id'] .'" tabindex="-1">'. $value['block_name'] . '</a></td>';
							echo '</tr>';
							}
						}
						?>
				</table>
			</div>
			<div class="span3">
				<table class="table table-striped img-polaroid">
					<tr class="success">
						<td><a href="district_profile_details/22"><strong class="black">Nalbari</strong>
						</a>
						</td>
					</tr>
					<?php
					foreach($this->dist_and_blocks as $key => $value) {
						if($value['dist_id']==22){
							echo '<tr>';
							echo '<td><a href="block_profile_details/'. $value['id'] .'" tabindex="-1">'. $value['block_name'] . '</a></td>';
							echo '</tr>';
							}
						}
						?>
				</table>
			</div>

			<div class="span3">
				<table class="table table-striped img-polaroid">
					<tr class="success">
						<td><a href="district_profile_details/24"><strong class="black">Sivasagar</strong>
						</a>
						</td>
					</tr>
					<?php
					foreach($this->dist_and_blocks as $key => $value) {
						if($value['dist_id']==24){
							echo '<tr>';
							echo '<td><a href="block_profile_details/'. $value['id'] .'" tabindex="-1">'. $value['block_name'] . '</a></td>';
							echo '</tr>';
							}
						}
						?>
				</table>
			</div>
			<div class="span3">
				<table class="table table-striped img-polaroid">
					<tr class="success">
						<td><a href="district_profile_details/25"><strong class="black">Sonitpur</strong>
						</a>
						</td>
					</tr>
					<?php
					foreach($this->dist_and_blocks as $key => $value) {
						if($value['dist_id']==25){
							echo '<tr>';
							echo '<td><a href="block_profile_details/'. $value['id'] .'" tabindex="-1">'. $value['block_name'] . '</a></td>';
							echo '</tr>';
							}
						}
						?>
				</table>
			</div>
			<div class="span3">
				<table class="table table-striped img-polaroid">
					<tr class="success">
						<td><a href="district_profile_details/26"><strong class="black">Tinsukia</strong>
						</a>
						</td>
					</tr>
					<?php
					foreach($this->dist_and_blocks as $key => $value) {
						if($value['dist_id']==26){
							echo '<tr>';
							echo '<td><a href="block_profile_details/'. $value['id'] .'" tabindex="-1">'. $value['block_name'] . '</a></td>';
							echo '</tr>';
							}
						}
						?>
				</table>
			</div>
			<div class="span3">
				<table class="table table-striped img-polaroid">
					<tr class="success">
						<td><a href="district_profile_details/27"><strong class="black">Udalguri</strong>
						</a>
						</td>
					</tr>
					<?php
					foreach($this->dist_and_blocks as $key => $value) {
						if($value['dist_id']==27){
							echo '<tr>';
							echo '<td><a href="block_profile_details/'. $value['id'] .'" tabindex="-1">'. $value['block_name'] . '</a></td>';
							echo '</tr>';
							}
						}
						?>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$('#profile').addClass('active');
 
$(document).ready(function(){
	$("#typeahead").typeahead({
			items:16,
			source: function(typeahead, query) {
			var get_url='<?php echo URL;?>profile/get_all_block/';
			$.ajax({
				url: get_url,
				type: 'GET',
				data: 'query=' + query,
				dataType: 'JSON',
				async: true,
				success: function(data) {
					var return_list = [], i = data.length;
	                while (i--) {
	                	return_list[i] = {id: data[i].id, value: removenull(data[i].block_name+'('+data[i].name+')')};
	                }  
	                typeahead.process(return_list);
				}
			});
		},
	    onselect: function(obj) { 
			 window.location = "<?php echo URL;?>profile/block_profile_details/"+obj.id;
		}
	});
	
		function removenull(str) {
	    var new_str = str;
	    if (str == '') {
	        new_str = str.replace('', "N/A");
	    }
	    else if (str == null) {
	        new_str = "N/A";
	    }
	    return new_str;
	}
});

</script>
