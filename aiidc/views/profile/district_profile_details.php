<div class="container">

	<div class="row">
		<div class="span12">
			<div class="form-inline">
				<input class="input-xlarge" type="text" autocomplete="off"	placeholder="Search for block" id="typeahead" data-provide="typeahead">
				<button id="download_pdf" class="btn pull-right"
					onclick="printPdf()">download & print</button>
			</div>
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="span7">
			<h2 id="dist_name">
			</h2>
			<h3 id="blocks">Blocks in the district</h3>
			<div class="row">
				<div class="span8" id="block_names"></div>
			</div>
			<br/>
			<h4>
				Population(approx): <strong id="population"></strong>
			</h4>
			
		</div>
	</div>
	<hr>
	<div id="raw_material">
		<h3>Raw Materials</h3>
		<h4>
			<u>Viability</u>
		</h4>
		<br/>
		<table class="table table-bordered">
			<thead>
                <tr class="label">
						<th class="label">Category</th>
						<th class="label label-high">High</th>
						<th class="label label-moderate">Moderate</th>
						<th class="label label-low">Low</th>
					</tr>
			</thead>
			
			<tbody>
				<tr>
					<td>Cattle & Livestock Produces</td>
					<td><div class="" id="h1a"></div></td>
					<td><div class="" id="h2a"></div></td>
					<td><div class="" id="h3a"></div></td>
				</tr>
				<tr>
					<td>Field Crops Produces</td>
					<td><div class="" id="h1b"></div></td>
					<td><div class="" id="h2b"></div></td>
					<td><div class="" id="h3b"></div></td>
				</tr>
				<tr>
					<td>Fishery</td>
					<td><div class="" id="h1c"></div></td>
					<td><div class="" id="h2c"></div></td>
					<td><div class="" id="h3c"></div></td>
				</tr>
				<tr>
					<td>Floriculture Produces</td>
					<td><div class="" id="h1d"></div></td>
					<td><div class="" id="h2d"></div></td>
					<td><div class="" id="h3d"></div></td>
				</tr>
				<tr>
					<td>Forest Produces</td>
					<td><div class="" id="h1e"></div></td>
					<td><div class="" id="h2e"></div></td>
					<td><div class="" id="h3e"></div></td>
				</tr>
				<tr>
					<td>Horticulture Produces</td>
					<td><div class="" id="h1f"></div></td>
					<td><div class="" id="h2f"></div></td>
					<td><div class="" id="h3f"></div></td>
				</tr>
				<tr>
					<td>Mineral Resources</td>
					<td><div class="" id="h1g"></div></td>
					<td><div class="" id="h2g"></div></td>
					<td><div class="" id="h3g"></div></td>
				</tr>
				<tr>
					<td>Sericulture</td>
					<td><div class="" id="h1h"></div></td>
					<td><div class="" id="h2h"></div></td>
					<td><div class="" id="h3h"></div></td>
				</tr>
				<tr>
					<td>Spices</td>
					<td><div class="" id="h1i"></div></td>
					<td><div class="" id="h2i"></div></td>
					<td><div class="" id="h3i"></div></td>
				</tr>
			</tbody>
		</table>		
			
	<hr>
		<h3>Human Resources</h3>
		<h4>
			<u>Potentiality</u>
		</h4>
		<br />
		<table class="table table-bordered">
			<thead>
                <tr class="label">
						<th class="label">Category</th>
						<th class="label label-high">High</th>
						<th class="label label-moderate">Moderate</th>
						<th class="label label-low">Low</th>
					</tr>
			</thead>
			
			<tbody>
				<tr>
					<td>Cane, Bamboo & Wood work</td>
					<td><div class="" id="hr1a"></div></td>
					<td><div class="" id="hr2a"></div></td>
					<td><div class="" id="hr3a"></div></td>
				</tr>
				<tr>
					<td>Fibre</td>
					<td><div class="" id="hr1b"></div></td>
					<td><div class="" id="hr2b"></div></td>
					<td><div class="" id="hr3b"></div></td>
				</tr>
				<tr>
					<td>Food Processing</td>
					<td><div class="" id="hr1c"></div></td>
					<td><div class="" id="hr2c"></div></td>
					<td><div class="" id="hr3c"></div></td>
				</tr>
				<tr>
					<td>Live Stock</td>
					<td><div class="" id="hr1d"></div></td>
					<td><div class="" id="hr2d"></div></td>
					<td><div class="" id="hr3d"></div></td>
				</tr>	
				<tr>
					<td>Metal Handicrafts</td>
					<td><div class="" id="hr1e"></div></td>
					<td><div class="" id="hr2e"></div></td>
					<td><div class="" id="hr3e"></div></td>
				</tr>								
				<tr>
					<td>Service Sector</td>
					<td><div class="" id="hr1f"></div></td>
					<td><div class="" id="hr2f"></div></td>
					<td><div class="" id="hr3f"></div></td>
				</tr>
				<tr>
					<td>Textile</td>
					<td><div class="" id="hr1g"></div></td>
					<td><div class="" id="hr2g"></div></td>
					<td><div class="" id="hr3g"></div></td>
				</tr>
				<tr>
					<td>Others</td>
					<td><div class="" id="hr1h"></div></td>
					<td><div class="" id="hr2h"></div></td>
					<td><div class="" id="hr3h"></div></td>
				</tr>								
				</tbody>
		</table>	
	</div>
</div>
<script type="text/javascript">
var dist_id =<?php echo $this->district_id;?>;
$(document).ready(function(){
	
	block_names(dist_id);
	total_pop(dist_id);

	$('#profile').removeClass('dropdown').addClass('active');

	$("#typeahead").typeahead({
		source: function(typeahead, query) {
			var get_url='<?php echo URL;?>profile/get_all_district/';
			$.ajax({
				url: get_url,
				type: 'GET',
				data: 'query=' + query,
				dataType: 'JSON',
				async: true,
				success: function(data) {
					var return_list = [], i = data.length;
	                while (i--) {
	                    return_list[i] = {id: data[i].dist_id, value: removenull(data[i].dist_name)};
	                }  
	                typeahead.process(return_list);
				}
			});
		},
	    onselect: function(obj) { 
	    	dist_id = obj.id;
	    	
	    	block_names(dist_id);
	    	total_pop(dist_id);
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
function printPdf(){
 	window.open('<?php echo URL;?>profile/district_profile_print/'+dist_id);
}
function total_pop(dist_id){
	$.ajax({
		url: '<?php echo URL;?>profile/getDictpopulition',
		type: 'POST',
		data: 'dist_id=' + dist_id,
		dataType: 'JSON',
		async: false,
		beforeSend: function() {
			
		},
		success: function(data) {
			for (var i in data){
				//console.log(data[i].totalPop);
				$('#population').text(data[i].totalPop);
				$('#dist_name').text(data[i].dist_name);
			}
		}
	});
}

function block_names(dist_id){
	var total_block_no=1;
	$.ajax({
		url: '<?php echo URL;?>resourcemap/getBlockList',
		type: 'POST',
		data: 'dist=' + dist_id,
		dataType: 'JSON',
		//async: false,
		beforeSend: function() {
			$('#block_names').empty();
			total_block_no=0;
		},
		success: function(data) {
			var count=1;
			//console.log(data);
			for ( var i in data){
				total_block_no=total_block_no+1;
				//$('#no_of_blocks').val(total_block_no);
				$('#block_names').append('<div style="margin-left: 0px;" class="span3">'+count+'.&nbsp;'+'<a style="color: blue;" href=<?php echo URL;?>profile/block_profile_details/'+data[i].id+'>'+data[i].block_name+'</a></div>');
				count=count+1;
    		}
    		//console.log(total_block_no);
	    	dist_raw_material(dist_id,total_block_no);
	    	dist_human_resource(dist_id,total_block_no);
		}
	});
}
function dist_raw_material(dist_id,total_block_no){
	
	$.ajax({
		url: '<?php echo URL;?>profile/getDict_raw_material',
		type: 'POST',
		data: 'dist_id=' + dist_id,
		dataType: 'JSON',
		async: false,
		beforeSend: function() {
			for(var i=1; i<=3; i++){
				$('#h'+i+'a').empty();
				$('#h'+i+'b').empty();
				$('#h'+i+'c').empty();
				$('#h'+i+'d').empty();
				$('#h'+i+'e').empty();
				$('#h'+i+'f').empty();
				$('#h'+i+'g').empty();
				$('#h'+i+'h').empty();
				$('#h'+i+'i').empty();
			}
		},
		success: function(data) {
			for (var i in data){
				var dist_con_score=data[i].dist_consolodated_score;
				var block_count=data[i].block_count;
				var dict_score = Math.ceil(dist_con_score/block_count);
				if(dict_score >= 65){
					if(data[i].type_id ==6){
						$('#h1a').append(''+data[i].name+'</br>');		
					}
					if(data[i].type_id ==1){
						$('#h1b').append(''+data[i].name+'</br>');		
					}
					if(data[i].type_id ==7){
						$('#h1c').append(''+data[i].name+'</br>');		
					}
					if(data[i].type_id ==4){
						$('#h1d').append(''+data[i].name+'</br>');		
					}
					if(data[i].type_id ==5){
						$('#h1e').append(''+data[i].name+'</br>');		
					}	
					if(data[i].type_id ==2){
						$('#h1f').append(''+data[i].name+'</br>');		
					}
					if(data[i].type_id ==8){
						$('#h1g').append(''+data[i].name+'</br>');		
					}
					if(data[i].type_id ==9){
						$('#h1h').append(''+data[i].name+'</br>');		
					}
					if(data[i].type_id ==3){
						$('#h1i').append(''+data[i].name+'</br>');		
					}	
				}		
				if(dict_score >= 40 && dict_score <65){
					if(data[i].type_id ==6){
						$('#h2a').append(''+data[i].name+'</br>');		
					}
					if(data[i].type_id ==1){
						$('#h2b').append(''+data[i].name+'</br>');		
					}
					if(data[i].type_id ==7){
						$('#h2c').append(''+data[i].name+'</br>');		
					}
					if(data[i].type ==4){
						$('#h2d').append(''+data[i].name+'</br>');		
					}
					if(data[i].type_id ==5){
						$('#h2e').append(''+data[i].name+'</br>');		
					}	
					if(data[i].type_id ==2){
						$('#h2f').append(''+data[i].name+'</br>');		
					}
					if(data[i].type_id ==8){
						$('#h2g').append(''+data[i].name+'</br>');		
					}
					if(data[i].type_id ==9){
						$('#h2h').append(''+data[i].name+'</br>');		
					}
					if(data[i].type_id ==3){
						$('#h2i').append(''+data[i].name+'</br>');		
					}	
				}		
				if(dict_score > 0 && dict_score < 40){
					if(data[i].type_id ==6){
						$('#h3a').append(''+data[i].name+'</br>');		
					}
					if(data[i].type_id ==1){
						$('#h3b').append(''+data[i].name+'</br>');		
					}
					if(data[i].type_id ==7){
						$('#h3c').append(''+data[i].name+'</br>');		
					}
					if(data[i].type_id ==4){
						$('#h3d').append(''+data[i].name+'</br>');		
					}
					if(data[i].type_id ==5){
						$('#h3e').append(''+data[i].name+'</br>');		
					}	
					if(data[i].type_id ==2){
						$('#h3f').append(''+data[i].name+'</br>');		
					}
					if(data[i].type_id ==8){
						$('#h3g').append(''+data[i].name+'</br>');		
					}
					if(data[i].type_id ==9){
						$('#h3h').append(''+data[i].name+'</br>');		
					}
					if(data[i].type_id ==3){
						$('#h3i').append(''+data[i].name+'</br>');		
					}	
				}
			}
		}
	});
}

function dist_human_resource(dist_id,total_block_no){
	
	$.ajax({
		url: '<?php echo URL;?>profile/getDict_human_resource',
		type: 'POST',
		data: 'dist_id=' + dist_id,
		dataType: 'JSON',
		async: false,
		beforeSend: function() {
			for(var i=1; i<=3; i++){
				$('#hr'+i+'a').empty();
				$('#hr'+i+'b').empty();
				$('#hr'+i+'c').empty();
				$('#hr'+i+'d').empty();
				$('#hr'+i+'e').empty();
				$('#hr'+i+'f').empty();
				$('#hr'+i+'g').empty();
				$('#hr'+i+'h').empty();
			}
		},
		success: function(data) {
			for (var i in data){
				var dist_con_score=data[i].dist_consolodated_score;
				var block_count=data[i].block_count;
			
				var dict_score = Math.ceil(dist_con_score/block_count);
				if(dict_score >= 65){
						if(data[i].type_id ==1){
							$('#hr1a').append(''+data[i].name+'</br>');		
						}
						if(data[i].type_id ==7){
							$('#hr1b').append(''+data[i].name+'</br>');		
						}
						if(data[i].type_id ==5){
							$('#hr1c').append(''+data[i].name+'</br>');		
						}
						if(data[i].type_id ==6){
							$('#hr1d').append(''+data[i].name+'</br>');		
						}
						if(data[i].type_id ==3){
							$('#hr1e').append(''+data[i].name+'</br>');		
						}	
						if(data[i].type_id ==8){
							$('#hr1f').append(''+data[i].name+'</br>');		
						}
						if(data[i].type_id ==4){
							$('#hr1g').append(''+data[i].name+'</br>');		
						}
						if(data[i].type_id ==2){
							$('#hr1h').append(''+data[i].name+'</br>');		
						}
					}
				
				if(dict_score >= 40 && dict_score <65){
					if(data[i].type ==1){
						$('#hr2a').append(''+data[i].name+'</br>');		
					}
					if(data[i].type_id ==7){
						$('#hr2b').append(''+data[i].name+'</br>');		
					}
					if(data[i].type_id ==5){
						$('#hr2c').append(''+data[i].name+'</br>');		
					}
					if(data[i].type_id ==6){
						$('#hr2d').append(''+data[i].name+'</br>');		
					}
					if(data[i].type_id ==3){
						$('#hr2e').append(''+data[i].name+'</br>');		
					}	
					if(data[i].type_id ==8){
						$('#hr2f').append(''+data[i].name+'</br>');		
					}
					if(data[i].type_id ==4){
						$('#hr2g').append(''+data[i].name+'</br>');		
					}
					if(data[i].type_id ==2){
						$('#hr2h').append(''+data[i].name+'</br>');		
					}
				}
				if(dict_score > 0 && dict_score < 40){
					if(data[i].type_id ==1){
						$('#hr3a').append(''+data[i].name+'</br>');		
					}
					if(data[i].type_id ==7){
						$('#hr3b').append(''+data[i].name+'</br>');		
					}
					if(data[i].type_id ==5){
						$('#hr3c').append(''+data[i].name+'</br>');		
					}
					if(data[i].type_id ==6){
						$('#hr3d').append(''+data[i].name+'</br>');		
					}
					if(data[i].type_id ==3){
						$('#hr3e').append(''+data[i].name+'</br>');		
					}	
					if(data[i].type_id ==8){
						$('#hr3f').append(''+data[i].name+'</br>');		
					}
					if(data[i].type_id ==4){
						$('#hr3g').append(''+data[i].name+'</br>');		
					}
					if(data[i].type_id ==2){
						$('#hr3h').append(''+data[i].name+'</br>');		
					}
				}
			}
		}
	});
}
$("#profile").click(function (){
	$('#profile').removeClass('active').addClass('dropdown');
});


</script>
