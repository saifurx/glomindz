<!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>Resource Map of Assam</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<style type="text/css">
body {
	padding-top: 60px;
	padding-bottom: 40px;
}
</style>
<!-- Le styles -->
<link href="<?php echo URL; ?>assets/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo URL; ?>assets/css/print.css" rel="stylesheet"
	media="print">
<script src="<?php echo URL; ?>assets/js/jquery.js"></script>
<script src="<?php echo URL; ?>assets/js/bootstrap.js"></script>

</head>
<body>
	<script type="text/javascript">
var block_id =<?php echo $this->block_id;?>;

</script>

	<div class="container">
		<div class="row" id="genNinfra">

			<div class="row-fluid">
				<div class="span12">
					<div class="span1"
						style="margin-left: 20px; height: 68px; width: 50px;">
						<img src="<?php echo URL;?>assets/img/india_logo1.png" height="40"
							width="50" alt="">
					</div>
					<div class="span11" style="margin-left: 5px; height: 5px;">
						<h3 style="margin-bottom: 0px; margin-top: 0px;">Resource Mapping
							of Assam</h3>
						<em>By Industries & Commerce Department (Government of Assam)</em>
					</div>
				</div>
			</div>
			<hr>
			<div class="span8">

				<h3>
					Block Profile: &nbsp;<strong id="block_name"></strong> <input
						type="hidden" id="id" value="">
				</h3>
				<div class="row">
					<div class="span4" id="gen_info1"></div>
					<div class="span4" id="gen_info2"></div>
				</div>
				<hr>
				<div class="row">
					<div class="span4">
						<h3>General Infrastructure</h3>
						<div id="gen_infra1"></div>
					</div>
					<div class="span4">
						<h3>Growth Possibilities</h3>
						<div>
							<strong>A. Suggested Enterprises :</strong>
						</div>

						<ul id="growth_possiblities">

						</ul>
						<?php
						Session::init();
						if (Session::get('loggedIn') == true):?>
						<p>
							<strong>B. Major Impediments in the growth of enterprises:</strong>
						</p>
						<ol id="impediments"></ol>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="span4" id="map_canvas" style="height: 450px"></div>
		</div>
		<hr>
		<div id="raw_material">
			<h3>Raw Materials</h3>
			<h4>Viability</h4>
			<br />
			<table border="1" class="table table-condensed">
				<thead>
					<tr class="table-header">
					<th class="">Category</th>
						<th class="">High</th>
						<th class="">Moderate</th>
						<th class="">Low</th>
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

			<br />
			<h4>Usages</h4>
			<br />
			<table border="1" class="table table-condensed">
				<thead>
					<tr class="table-header">
						<th>Category</th>
						<th>Item</th>
						<th>Own Consumption</th>
						<th>Sales</th>
						<th>Processing</th>
					</tr>
				</thead>

				<tbody id="raw_usages">
				</tbody>
			</table>
		</div>
		<hr>
		<div id="human_resource">
			<h3>Human Resources</h3>
			<h4>Potentiality</h4>
			<br />
			<table border="1" class="table table-condensed">
				<thead>
					<tr class="table-header">
						<th class="">Category</th>
						<th class="">High</th>
						<th class="">Moderate</th>
						<th class="">Low</th>
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

			<br />
			<h4>Usages</h4>
			<br />
			<table border="1" class="table table-condensed">
				<thead>
					<tr class="table-header">
						<th>Category</th>
		                <th>Item</th>
		                <th>Own Use</th>
		                <th>Commercial Use</th>
		                <th>Unutilized/Wasted</th>
					</tr>
				</thead>

				<tbody id="hr_usages">
				</tbody>
			</table>
		</div>
	</div>
	<script type="text/javascript"
		src="http://maps.googleapis.com/maps/api/js?libraries=geometry,places,visualization&sensor=true"></script>

	<script type="text/javascript">
	
var dist_id=0;
$(document).ready(function(){
	$('#profile').addClass('active');
	getAllBlockdata(block_id);
	
	$("#typeahead").typeahead({
		source: function(typeahead, query) {
			var get_url='<?php echo URL;?>profile/get_all_block';
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
	                $('#growth_possibilities').hide();
	                $('#human_resource').hide();
	                $('#raw_material').hide();
	                $('#genNinfra').hide();
	                $('hr').hide();
	                typeahead.process(return_list);
				}
			});
		},
	    onselect: function(obj) {
	    	 block_id = obj.id;
             $('#growth_possibilities').show();
             $('#human_resource').show();
             $('#raw_material').show();
             $('#genNinfra').show();
             $('hr').show();	    	 
	    	 getAllBlockdata(block_id);
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

function getAllBlockdata(block_id){
	
	$.ajax({ 
		url: '<?php echo URL;?>profile/get_general_info',
		context: document.body,
		type: 'POST',
		data: 'block_id=' + block_id,
		dataType: 'JSON',
		//async: false,
		beforeSend: function() {
			 $('#block_name').empty();
			 $('#gen_info1').empty();
			 $('#gen_info2').empty();
		},
		success: function(data) {
			for (var i in data){

				var len = data[i].identification_no.toString().length;
				if(len == 3){
					data[i].identification_no='0'+data[i].identification_no;
				};
				
				dist_id=data[i].dist_id;
				var forest=data[i].forest_name_1+','+data[i].forest_name_2+','+data[i].forest_name_3;
				var river=data[i].nearby_river_1+','+data[i].nearby_river_2+','+data[i].nearby_river_3;
				forest=forest.replace('null,','');
				forest=forest.replace('null,','');
				forest=forest.replace('null','');
				

				river=river.replace('null,','');
				river=river.replace('null,','');
				river=river.replace('null','');
				
			    $('#block_name').append(data[i].block_name);
			    $('#id').val(data[i].id);
				$('#gen_info1').append('<strong>Block Identification No:</strong>&nbsp;'+data[i].identification_no+'</br><strong>Subdivision:</strong>&nbsp;'+data[i].subdivision+'</br><strong>District:</strong>&nbsp;'+data[i].dist_name+'</br><strong>Distance from District HQ </strong><samll>(km)</small><strong>:</strong>&nbsp;'+data[i].distance_hq+'</br><br>');
				$('#gen_info2').append('<strong>Topography:</strong>&nbsp;'+data[i].tdef_topography_name+'</br><strong>River:</strong>&nbsp;'+river+'</br><strong>Forest:</strong>&nbsp;'+forest+'</br><strong>Population:</strong>&nbsp;'+data[i].pop_total+'</br><br>');				
		    }
		    getDistrictCenter(dist_id);
			
		}
    });
     
		
	$.ajax({
		
		url: '<?php echo URL;?>profile/raw_materials',
		type: 'POST',
		data: 'block_id=' + block_id,
		dataType: 'JSON',
		async: false,
		beforeSend: function() {
			$('#raw_usages').empty();			
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
			for(var i=1; i<=7; i++){
				$('#u'+i+'a').empty();
				$('#u'+i+'b').empty();
				$('#u'+i+'c').empty();
				$('#u'+i+'d').empty();
				$('#u'+i+'e').empty();
				$('#u'+i+'f').empty();
				$('#u'+i+'g').empty();
				$('#u'+i+'h').empty();
				$('#u'+i+'i').empty();
			}
		},
		success: function(data) {
			//var yes ='<div class="row-fluid">&nbsp;<strong style="color:green;">&#10003;</strong></div>';
			//var no ='<div class="row-fluid">&nbsp;<strong style="color:red;">&#935;</strong></div>';
		for (var i in data){
				if(data[i].score>= 112){
					if(data[i].type_id ==6){
						$('#h1a').append('<p style="margin:0;">'+data[i].name+'</p>');		
					}
					if(data[i].type_id ==1){
						$('#h1b').append('<p style="margin:0;">'+data[i].name+'</p>');	
					}
					if(data[i].type_id ==7){
						$('#h1c').append('<p style="margin:0;">'+data[i].name+'</p>');	
					}
					if(data[i].type_id ==4){
						$('#h1d').append('<p style="margin:0;">'+data[i].name+'</p>');	
					}
					if(data[i].type_id ==5){
						$('#h1e').append('<p style="margin:0;">'+data[i].name+'</p>');	
					}	
					if(data[i].type_id ==2){
						$('#h1f').append('<p style="margin:0;">'+data[i].name+'</p>');	
					}
					if(data[i].type_id ==8){
						$('#h1g').append('<p style="margin:0;">'+data[i].name+'</p>');	
					}
					if(data[i].type_id ==9){
						$('#h1h').append('<p style="margin:0;">'+data[i].name+'</p>');	
					}
					if(data[i].type_id ==3){
						$('#h1i').append('<p style="margin:0;">'+data[i].name+'</p>');	
					}	
				}
				if(data[i].score >= 85 && data[i].score <112){
					if(data[i].type_id ==6){
						$('#h2a').append('<p style="margin:0;">'+data[i].name+'</p>');	
					}
					if(data[i].type_id ==1){
						$('#h2b').append('<p style="margin:0;">'+data[i].name+'</p>');	
					}
					if(data[i].type_id ==7){
						$('#h2c').append('<p style="margin:0;">'+data[i].name+'</p>');	
					}
					if(data[i].type_id ==4){
						$('#h2d').append('<p style="margin:0;">'+data[i].name+'</p>');	
					}
					if(data[i].type_id ==5){
						$('#h2e').append('<p style="margin:0;">'+data[i].name+'</p>');	
					}	
					if(data[i].type_id ==2){
						$('#h2f').append('<p style="margin:0;">'+data[i].name+'</p>');	
					}
					if(data[i].type_id ==8){
						$('#h2g').append('<p style="margin:0;">'+data[i].name+'</p>');	
					}
					if(data[i].type_id ==9){
						$('#h2h').append('<p style="margin:0;">'+data[i].name+'</p>');	
					}
					if(data[i].type_id ==3){
						$('#h2i').append('<p style="margin:0;">'+data[i].name+'</p>');	
					}	
				}
				if(data[i].score > 0 && data[i].score < 85){
					if(data[i].type_id ==6){
						$('#h3a').append('<p style="margin:0;">'+data[i].name+'</p>');	
					}
					if(data[i].type_id ==1){
						$('#h3b').append('<p style="margin:0;">'+data[i].name+'</p>');	
					}
					if(data[i].type_id ==7){
						$('#h3c').append('<p style="margin:0;">'+data[i].name+'</p>');	
					}
					if(data[i].type_id ==4){
						$('#h3d').append('<p style="margin:0;">'+data[i].name+'</p>');	
					}
					if(data[i].type_id ==5){
						$('#h3e').append('<p style="margin:0;">'+data[i].name+'</p>');	
					}	
					if(data[i].type_id ==2){
						$('#h3f').append('<p style="margin:0;">'+data[i].name+'</p>');	
					}
					if(data[i].type_id ==8){
						$('#h3g').append('<p style="margin:0;">'+data[i].name+'</p>');	
					}
					if(data[i].type_id ==9){
						$('#h3h').append('<p style="margin:0;">'+data[i].name+'</p>');	
					}
					if(data[i].type_id ==3){
						$('#h3i').append('<p style="margin:0;">'+data[i].name+'</p>');	
					}	
				}
				//usages 	
				if(data[i].present_usage==1){
					$('#raw_usages').append('<tr><td>'+data[i].type+'</td><td>'+data[i].name+'</td><td class="span2 "><strong style="color:green;align:center;">&#10003;</strong></td><td class="span2 "><strong style="color:red;">&#935;</strong></td><td class="span2 "><strong style="color:red;">&#935;</strong></td></tr>');
				}
				if(data[i].present_usage==2){
					$('#raw_usages').append('<tr><td>'+data[i].type+'</td><td>'+data[i].name+'</td><td class=""><strong style="color:red;">&#935;</strong></td><td class=""><strong style="color:green;align:center;">&#10003;</strong></td><td class=""><strong style="color:red;">&#935;</strong></td></tr>');		
				}
				if(data[i].present_usage==3){
					$('#raw_usages').append('<tr><td>'+data[i].type+'</td><td>'+data[i].name+'</td><td class=""><strong style="color:red;">&#935;</strong></td><td class=""><strong style="color:red;">&#935;</strong></td><td class=""><strong style="color:green;align:center;">&#10003;</strong></td></tr>');
				}
				if(data[i].present_usage==4){
					//$('#raw_usages').append('<tr><td>'+data[i].type+'</td><td>'+data[i].name+'</td><td></td><td></td><td></td></tr>');
				}
				if(data[i].present_usage==5){
					$('#raw_usages').append('<tr><td>'+data[i].type+'</td><td>'+data[i].name+'</td><td class=""><strong style="color:green;align:center;">&#10003;</strong></td><td class=""><strong style="color:green;align:center;">&#10003;</strong></td><td class=""><strong style="color:green;">&#10003;</strong></td></tr>');
				}
				if(data[i].present_usage==6){
					$('#raw_usages').append('<tr><td>'+data[i].type+'</td><td>'+data[i].name+'</td><td class=""><strong style="color:green;">&#10003;</strong></td><td class=""><strong style="color:green;">&#10003;</strong></td><td class=""><strong style="color:red;">&#935;</strong></td></tr>');
				}
				if(data[i].present_usage==7){
					$('#raw_usages').append('<tr><td>'+data[i].type+'</td><td>'+data[i].name+'</td><td class=""><strong style="color:red;">&#935;</strong></td><td class=""><strong style="color:green;">&#10003;</strong></td><td class=""><strong style="color:green;">&#10003;</strong></td></tr>');	
				}
				if(data[i].present_usage==8){
					//$('#raw_usages').append('<tr><td>'+data[i].type+'</td><td>'+data[i].name+'</td><td></td><td></td><td></td></tr>');	
				}			
			}
		}
	});

	$.ajax({
		url: '<?php echo URL;?>profile/human_resource',
		type: 'POST',
		data: 'block_id=' + block_id,
		dataType: 'JSON',
		async: false,
		beforeSend: function() {
			$('#hr_usages').empty();
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
			for(var i=1; i<=4; i++){
				$('#hr_u'+i+'a').empty();
				$('#hr_u'+i+'b').empty();
				$('#hr_u'+i+'c').empty();
				$('#hr_u'+i+'d').empty();
				$('#hr_u'+i+'e').empty();
				$('#hr_u'+i+'f').empty();
				$('#hr_u'+i+'g').empty();
				$('#hr_u'+i+'h').empty();
			}
		},
		success: function(data) {
			for (var i in data){
		     		if(data[i].score >= 88){
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
  		     		if(data[i].score  >= 66 && data[i].score < 88){
						if(data[i].type_id ==1){
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
  		     		if(data[i].score  > 0 && data[i].score < 72){
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
  		     		//usages
				
		     		if(data[i].present_usage == 1){
		     			$('#hr_usages').append('<tr><td>'+data[i].type+'</td><td>'+data[i].name+'</td><td class="span2 "><strong style="color:green;">&#10003;</strong></td><td class="span2 "><strong style="color:red;">&#935;</strong></td><td class="span2 "><strong style="color:red;">&#935;</strong></td></tr>');
  		     		}
  		     		if(data[i].present_usage  == 2){
  		     			$('#hr_usages').append('<tr><td>'+data[i].type+'</td><td>'+data[i].name+'</td><td class="span2 "><strong style="color:red;">&#935;</strong></td><td class="span2 "><strong style="color:green;">&#10003;</strong></td><td class="span2 "><strong style="color:red;">&#935;</strong></td></tr>');
  		     		}
  		     		if(data[i].present_usage == 3){
  		     			$('#hr_usages').append('<tr><td>'+data[i].type+'</td><td>'+data[i].name+'</td><td class="span2 "><strong style="color:red;">&#935;</strong></td><td class="span2 "><strong style="color:red;">&#935;</strong></td><td class="span2 "><strong style="color:green;">&#10003;</strong></td></tr>');
  		     		}
					if(data[i].present_usage == 4){
						$('#hr_usages').append('<tr><td>'+data[i].type+'</td><td>'+data[i].name+'</td><td class="span2 "><strong style="color:green;">&#10003;</strong></td><td class="span2 "><strong style="color:green;">&#10003;</strong></td><td class="span2 "><strong style="color:red;">&#935;</strong></td></tr>');
  		     		}  		     		
		    }		
		}
	});

	$.ajax({
		url: '<?php echo URL;?>profile/general_infra',
		type: 'POST',
		data: 'block_id=' + block_id,
		dataType: 'JSON',
		async: false,
		beforeSend: function() {
			$('#gen_infra1').empty();
		},
		success: function(data) {
			//console.log(data);
			for (var i in data) 
		    {
				if(data[i].availability==1){data[i].availability='Available';}
				if(data[i].availability==2){data[i].availability='Unavailable';}
		    }
			$('#gen_infra1').append('<strong>'+data[4].name+':&nbsp;</strong>'+data[4].availability+'<br/><strong>'+data[5].name+':&nbsp;</strong>'+data[5].availability+'<br/><strong>'+data[6].name+':&nbsp;</strong>'+data[6].availability+'<br/><strong>'+data[11].name+':&nbsp;</strong>'+data[11].availability+'<br/><br/>');
			$('#gen_infra1').append('<strong>'+data[7].name+':&nbsp;</strong>'+data[7].availability+'<br/><strong>'+data[8].name+':&nbsp;</strong>'+data[8].availability+'<br/><strong>'+data[9].name+':&nbsp;</strong>'+data[9].availability+'<br/><strong>'+data[10].name+':&nbsp;</strong>'+data[10].availability+'<br/><br/>');
			$('#gen_infra1').append('<strong>'+data[0].name+':&nbsp;</strong>'+data[0].availability+'<br/><strong>'+data[1].name+':&nbsp;</strong>'+data[1].availability+'<br/><br/><strong>'+data[2].name+':&nbsp;</strong>'+data[2].availability+'<br/><strong>'+data[3].name+':&nbsp;</strong>'+data[3].availability+'<br/><br/>');		
		}	
	});
	
	$.ajax({
		url: '<?php echo URL?>profile/growth_possiblities',
		type: 'POST',
		data: 'block_id=' + block_id,
		dataType: 'JSON',
		//async: false,
		beforeSend: function() {$('#growth_rows').empty();$('#growth_possiblities').empty();$('#impediments').empty();},
		success: function(data) {
			//console.log(data[0].impediments_order);
				for (var i in data) {

					var imp_ord=data[i].impediments_order;
					imp_ord=imp_ord.replace('1','<li>Lack of awareness</li>');
					imp_ord=imp_ord.replace('2','<li>Lack of Finance</li>');
					imp_ord=imp_ord.replace('3','<li>Shortage of raw materials</li>');
					imp_ord=imp_ord.replace('4','<li>Poor government support</li>');
					imp_ord=imp_ord.replace('5','<li>Lack of entrepreneurship</li>');
					imp_ord=imp_ord.replace('6','<li>Insufficient marketing outlets and facilities</li>');
					imp_ord=imp_ord.replace('7','<li>Poor communication facilities</li>');
					imp_ord=imp_ord.replace('8','<li>Lack of infrastructure</li>');
					imp_ord=imp_ord.replace('9','<li>Other reasons</li>');

					$('#growth_possiblities').append('<li>'+data[i].possible_sectors+'</li>');
					$('#impediments').append(imp_ord);
					
		    	}
			}
	});
		
}
function printPdf(){
		var id = $('#id').val();
   	 	window.open('<?php echo URL;?>printpdf/block_profile_pdf/'+id);
}
	
var tableid_block ="1SIrrvKL_dsXxX2FQGAQk2jwM9tcWY4xrX4xC0DE";
var center_all_district = new google.maps.LatLng(26.2006043, 92.9375739);
var map;
var distLayer;

function getDistrictCenter(dist_id){
	$.ajax({
		url: '<?php echo URL?>profile/get_district_center/'+dist_id,
		type: 'GET',
		dataType: 'JSON',
		
		success: function(data) {
				for (var i in data) {
					center_all_district = new google.maps.LatLng(data[i].latitude,data[i].longitude);
		    	}
				setMapStyle(dist_id);
			}
	});
}

function setMapStyle(dist_id){
	var styles = new Array();
       styles.push({
 	   where: "dist_id ="+dist_id,
	  			polygonOptions: {
	    		fillColor: "#e1e1df",
  	    		strokeColor: "#0a0a09",
  	    	    strokeOpacity: 0.7,
  	    	    strokeWeight: 0.8,
  	    	    fillOpacity: 0.7,
	  			}
      });
    styles.push({
 	   where: "block_id ="+block_id,
	  			polygonOptions: {
	    			fillColor: "#cd4822",
  	    		strokeColor: "#0a0a09",
  	    	    strokeOpacity: 0.7,
  	    	    strokeWeight: 0.8,
  	    	    fillOpacity: 0.7,
	  			}
      });
    distLayer.set('styles', styles);
    map.setCenter(center_all_district);
}
function initialize() {
    var myOptions = {
      zoom: 9,
      center: center_all_district,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      draggable: true,
      zoomControlOptions: {
          style: google.maps.ZoomControlStyle.SMALL
       },
    };

    map = new google.maps.Map(document.getElementById('map_canvas'),myOptions);
 	           distLayer = new google.maps.FusionTablesLayer({
         		  query: {
         		    select: "'block_id','name','dist_id'",
         		    from: tableid_block
         		  }
         		});
                distLayer.setMap(map);
                setMapStyle(dist_id);
            //    window.print();
  }
google.maps.event.addDomListener(window, 'load', initialize);
</script>
</body>
</html>
