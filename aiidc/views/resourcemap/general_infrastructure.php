<div class="container">
	<div class="subnav subnav-fixed">
		<ul class="nav nav-pills">
			<li><a href="<?php echo URL;?>resourcemap/raw_material">Raw Materials</a>
			</li>
			<li><a href="<?php echo URL;?>resourcemap/human_resource">Human
					Resource</a>
			</li>
			<li class="active"><a
				href="<?php echo URL;?>resourcemap/general_infrastructure">General
					Infrastructure</a>
			</li>
		</ul>
	</div>
	<hr>
	<div class="row">
		<div class="span12">
			<h3>General Infrastructure</h3>
			<p>This section maps the availability of the basic infrastructure in
				the rural areas, taking into account the Communication, Power,
				Marketing and Financial Institutions availability.</p>
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="span3">
			<h3>Data filter</h3>
			<form class="well"
				action="<?php echo URL;?>resourcemap/get_infra_structure_data"
				method="post" enctype="application/x-www-form-urlencoded">
				<div class="control-group">
					<label class="control-label" for="scope">Scope</label>
					<div class="controls">
						<select name="dist_id" id="dist_id">
							<option value="0">All Districts</option>
							<?php foreach($this->districtList as $key => $value) {?>
							<option value="<?php echo $value['id']; ?>">
								<?php echo utf8_decode($value['name']); ?>
							</option>
							<?php }?>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="catagory">Category</label>
					<div class="controls">
						<select id="combo_catagory" onchange="getInfraName(this)">
							<option value="0">Select Category</option>
							<?php
							foreach($this->infra_structure_type as $key => $value) {?>
							<option value="<?php echo $value['type']; ?>">
								<?php echo utf8_decode($value['type']); ?>
							</option>
							<?php }?>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="item">Item</label>
					<div class="controls">
						<select id="infra_items" name="infra_items_id">

						</select>
					</div>
				</div>
				<div class="control-group">
					<input id="rb_availibility" checked="checked" type="radio"
						name="select_option" value="select01" />Quality<br />
					<div class="controls" id="control1">
						<span class="badge badge-high"></span> <input type="checkbox"
							name="cb_availibility_max" id="cb_availibility_max"
							checked="checked" value="100"> Good <br /> <span
							class="badge badge-moderate"></span> <input type="checkbox"
							name="cb_availibility_med" id="cb_availibility_med"
							checked="checked" value="101"> Fair <br /> <span
							class="badge badge-low"></span> <input type="checkbox"
							name="cb_availibility_min" id="cb_availibility_min"
							checked="checked" value="102"> Poor <br />
							<span
							class="badge badge-na"></span><input type="checkbox"
							name="cb_availibility_na" id="cb_availibility_na"
							checked="checked" value="102"> Item not Available <br />
					</div>
				</div>

				<button disabled="disabled" type="submit" class="btn btn-primary"
					id="fil_btn" onclick="return get_infra_data(this.form);">Apply
					Filter</button>
				<div id="data_loading" class="pull-right">
					<img src="../assets/img/loading.gif" alt="Loading" height="40"
						width="40">
				</div>
			</form>
		</div>
		<div class="span9">
			<div class="tabbable">
				<!-- Only required for left/right tabs -->
				<ul class="nav nav-tabs" style="margin-bottom: 5px;">
					<li class="active"><a href="#tab1" data-toggle="tab">Quality Map</a>
					</li>
					<li><a href="#tab2" data-toggle="tab">Table View</a></li>
					<li><a href="#tab3" data-toggle="tab">Chart View</a></li>
					<p>
						<button id="print_pdf" disabled="disabled" onclick="checkCookie()"
							class="btn pull-right">download & print</button>
					</p>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="tab1">

						<div id="tab2_pgh" class="page-header">
							<div class="pull-left" id="selected_filter_availibility_map"></div>
						</div>
						<div id="map_canvas" style="height: 500px">
							<div id="loding_map"></div>
						</div>
					</div>
					<div class="tab-pane" id="tab2">
						<div id="tab2_pgh" class="page-header">
							<div class="pull-left" id="selected_filter_availibility_table"></div>
						</div>
						<div class="row" id="rm_availibility_div">
							<div id="good_infra" class="span2"></div>
							<div id="fair_infra" class="span2"></div>
							<div id="poor_infra" class="span2"></div>
							<div id="na_infra" class="span2"></div>
						</div>

					</div>
					<div class="tab-pane" id="tab3">
						<div id="tab2_pgh" class="page-header">
							<div class="pull-left" id="selected_filter_availibility_chart"></div>
						</div>
						<div id="pie_chart"></div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="modal hide" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Download & Print</h3>
		</div>
		<form action="<?php echo URL;?>printpdf/save_download_user/"
			class="form-horizontal" method="post"
			enctype="application/x-www-form-urlencoded">
			>
			<div class="modal-body">
				<div class="control-group">
					<label class="control-label" for="name">Name</label>
					<div class="controls">
						<input type="text" id="name" name="name" placeholder="Name"
							required="required">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="email">Email</label>
					<div class="controls">
						<input type="email" id="email" name="email" placeholder="Email"
							required="required">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="mobile_no">Mobile</label>
					<div class="controls">
						<input type="text" id="mobile_no" name="mobile_no"
							placeholder="mobile">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">I am </label>
					<div class="controls">
						<input type="radio" name="optionsRadios" id="optionsRadios1"
							value="Entrepreneur" checked>Entrepreneur &nbsp;<input
							type="radio" name="optionsRadios" id="optionsRadios2"
							value="Researcher">Researcher<br>
						<br> <input type="radio" name="optionsRadios" id="optionsRadios3"
							value="Other">Other &nbsp; <input type="text" id="inputOther"
							name="inputOther" class="input-small" placeholder="specify">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<button type="submit" class="btn btn-primary"
					onclick="save_download_user(this.form)" data-dismiss="modal">Save
					changes</button>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript"
	src="http://maps.googleapis.com/maps/api/js?libraries=geometry,places,visualization&sensor=true">
</script>
<script
	type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
      google.load('visualization', '1', {packages: ['corechart']});

    </script>
<script type="text/javascript">
$('#resourcemap').addClass('active');
var map;
var distLayer;
var blockLayer;
var block_polygon;
var flag=false;
var center_all_district = new google.maps.LatLng(26.2006043, 92.9375739);
var center_selected_district = new google.maps.LatLng(26.2006043, 92.9375739);
var center_guwahati =  new google.maps.LatLng(26.115345,91.632787);

var tableid_block ="1SIrrvKL_dsXxX2FQGAQk2jwM9tcWY4xrX4xC0DE";
var tableid_district = '1SMrgA-idz1mp9_-p446tNh_SLLvGdzmBuJPBBi0';
var tableid_country = '1foc3xO9DyfSIF6ofvN0kp2bxSfSeKog5FbdWdQ';

google.maps.event.addDomListener(window, 'load', initialize);
google.maps.event.addDomListener(document.getElementById('dist_id'),
        'change', function() {  
	    //initialize();         	   
        blockLayer.setMap(null);
        distLayer.setMap(map);
  });
google.maps.event.addDomListener(document.getElementById('combo_catagory'),

	       'change', function() {
	   blockLayer.setMap(null);
	   distLayer.setMap(map);
  });
google.maps.event.addDomListener(document.getElementById('infra_items'),
        'change', function() {
	   blockLayer.setMap(null);
	   distLayer.setMap(map);
});
var title_availibility;
var count_good=0;
var count_fair=0;
var count_poor=0;
var count_na=0;

var count_1=0;
var count_2=0;
var count_3=0;
var resp = '';
var piechart;
var max_chart_data= new Array();
var med_chart_data= new Array();
var min_chart_data= new Array();

var max_block_id= new Array();
var med_block_id= new Array();
var min_block_id= new Array();
 
$(function() {


	 var radio_availibility=document.getElementById('rb_availibility');
	 
	 var check_max=document.getElementById('cb_availibility_max');
	 var check_med=document.getElementById('cb_availibility_med');
	 var check_min=document.getElementById('cb_availibility_min');
	 var check_na=document.getElementById('cb_availibility_na');

	 function showTableDivOnRadioChanges(){
		 $('#rm_availibility_div').hide();
		 $('#rm_usages_div').hide();
		 $('#selected_filter_usages').hide();
		 $('#selected_filter_availibility').hide();
			if(radio_availibility.checked==true){
				 $('#rm_availibility_div').show();
				 $('#rm_usages_div').hide();
				 $('#control1').show();
				 $('#control2').hide();
				 $('#selected_filter_availibility').show();
				 showTableDivOnAvailibilityCheckBoxChange();
			}
			
		 }

	 function showTableDivOnAvailibilityCheckBoxChange(){
			$('#good_infra').hide();
			$('#fair_infra').hide();
			$('#poor_infra').hide();
			$('#na_infra').hide();

					if(check_max.checked==true){
						$('#good_infra').show();
					}

					if(check_med.checked==true){
						
						$('#fair_infra').show();
					}
					if(check_min.checked==true){
						
						$('#poor_infra').show();
						
					}
					if(check_min.checked==true){
						
						$('#na_infra').show();
						
					}
					 
		 }
	 var value =0;
	 function showTableDivOnUsagesCheckBoxChange(){

			$('#1_rm_usages').hide();
			$('#2_rm_usages').hide();
			$('#3_rm_usages').hide();
			$('#4_rm_usages').hide();
			$('#5_rm_usages').hide();
			$('#6_rm_usages').hide();
			$('#7_rm_usages').hide();



		 }
	//radio button 
  $("#rb_availibility").click(function() 
  		{
  			
   	 showTableDivOnRadioChanges();
  		
  		});  

	$('#combo_catagory').change(function() {
		 $('#fil_btn').attr('disabled',false);
		
	});

  	$('#infra_items').change(function() {
  		 $('#fil_btn').attr('disabled',false);

	});
	$('#fil_btn').click(function() {
		showTableDivOnRadioChanges();
		

		});
	
	
	//checkbox group 1
 $("#cb_availibility_max").click(function() {
 	showTableDivOnRadioChanges();
 });
 $("#cb_availibility_med").click(function() {
 	showTableDivOnRadioChanges();

 });
 $("#cb_availibility_min").click(function() {
 	showTableDivOnRadioChanges();
 });
 $("#cb_availibility_na").click(function() {
	 	showTableDivOnRadioChanges();
	 });
//checkbox group 2

});
function drawRawMaterialAvailibilityCharts(){

    var chartDiv=document.getElementById('pie_chart');
	var data = google.visualization.arrayToDataTable([
	                                                   ['Availibility', 'Score'],
	                                                   ['Good', count_good],
	                                                   ['Fair', count_fair],
	                                                   ['Poor', count_poor],
	                                                   ['Not Available', count_na]
	                                                   
	                                                 ]);
	 var options = {
	          
	          colors:['#58c558','#f5cd27','#f42d0a','#757575'],
	          height: 400,
	          width:870,
	          pieSliceText:'none',
	          titleTextStyle:{
    	          color: '333333',
	              fontName: 'Arial',
	              fontSize: 17, 
	          }

	        };                                        
             // Create and draw the visualization.
	 piechart = new google.visualization.PieChart(chartDiv);
 	 piechart.draw(data,options);
 	// google.visualization.events.addListener(piechart, 'onmouseover', onmouseoverHandler);

 	// drawBarCharts();
 	
	}
function initialize() {
    
    var myOptions = {
      zoom: 7,
      center: center_all_district,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      zoomControlOptions: {
          style: google.maps.ZoomControlStyle.SMALL
       },
    };

    map = new google.maps.Map(document.getElementById('map_canvas'),myOptions);

    var style = [
                 {
                   featureType: 'all',
                   elementType: 'all',
                   stylers: [
                     { saturation: -90 }
                   ]
                 },
                 {
                   featureType: 'road.highway',
                   elementType: 'all',
                   stylers: [
                     { visibility: 'off' }
                   ]
                 },
                 {
                   featureType: 'road.arterial',
                   elementType: 'all',
                   stylers: [
                     { visibility: 'off' }
                   ]
                 },
                 {
                   featureType: 'road.local',
                   elementType: 'all',
                   stylers: [
                     { visibility: 'off' }
                   ]
                 },
                 {
                   featureType: 'administrative.country',
                   elementType: 'all',
                   stylers: [
                     { visibility: 'off' }
                   ]
                 },
                 {
                   featureType: 'administrative.province',
                   elementType: 'all',
                   stylers: [
                     { visibility: 'off' }
                   ]
                 },
                 {
                   featureType: 'administrative.locality',
                   elementType: 'all',
                   stylers: [
                     { visibility: 'off' }
                   ]
                 },
                 {
                   featureType: 'administrative.neighborhood',
                   elementType: 'all',
                   stylers: [
                     { visibility: 'off' }
                   ]
                 },
                 {
                   featureType: 'poi',
                   elementType: 'all',
                   stylers: [
                     { visibility: 'off' }
                   ]
                 },
                 {
                   featureType: 'transit',
                   elementType: 'all',
                   stylers: [
                     { visibility: 'off' }
                   ]
                 }
               ];
               var styledMapType = new google.maps.StyledMapType(style, {
                 map: map,
                 name: 'styledMap'
               });
               var marker = new google.maps.Marker({
         	   	  position: center_guwahati,
         	      map: map,
         	      title:"Capital Guwahati"
         	 });   
               map.mapTypes.set('map-style', styledMapType);
               map.setMapTypeId('map-style');
    			// Initialize JSONP request
	           distLayer = new google.maps.FusionTablesLayer({
         		  query: {
         		    select: "'dist_id','name'",
         		    from: tableid_district	    
         		  },
     	   		  styles: [{
   	   	  			polygonOptions: {
   	   	    			fillColor: "#1f9d29",
       	   	    		strokeColor: "#115917",
       	   	    	    strokeOpacity: 0.7,
       	   	    	    strokeWeight: 0.8,
       	   	    	    fillOpacity: 0.7,
   	   	  			}
       	   			}]
         		});
	         
               distLayer.setMap(map);
            if(!flag){
   				setmouseoverlayer();
            }         
  }
	
function getInfraName(type){
	  $('#infra_items').empty();
	  $('#fil_btn').attr('disabled',false);
		var formData = new FormData();
		formData.append("type", type.value);
		  var xhr = new XMLHttpRequest();
		  xhr.open('POST', '<?php echo URL;?>resourcemap/getInfraStructureList/', true);
		  xhr.onload = function(e) {
			  if (this.status == 200) {
			      var resp = JSON.parse(this.response);
			     
			      //console.log('Server got:', resp);
			      $.each(resp ,function(i,value) {
				     
			    	  $('#infra_items').append($("<option></option>").attr("value",value.id).text(value.name));
			      });
			    };
			    $('#combo_catagory').change(function(){
			    	 
			    	  if($(this).val() == 0){
			    	     $('#fil_btn').attr('disabled',true);
			    	  }
			    });
			    $('#dist_id').change(function(){
		    		 var s=0;
			         var selected = $('#combo_catagory').find('option:selected');
			         s=selected.val();
			         if(s==0){
			        	$('#fil_btn').attr('disabled',true);
				     }
			         else{
		    	     	$('#fil_btn').attr('disabled',false);
			         }
		    	});
			   
		 };
		  xhr.send(formData);
    }

function get_infra_data(form) {
	  $('#data_loading').show();
	  $('#chartDiv').empty();
	  $('#fil_btn').attr('disabled',true);
	  $('#print_pdf').attr('disabled',false);

      $('#good_infra').empty().append('<tr class=""><th style="min-width: 160px;" class="label label-high">Good</th></tr>');
	  $('#fair_infra').empty().append('<tr class=""><th style="min-width: 160px;" class="label label-moderate">Fair</th></tr>');
	  $('#poor_infra').empty().append('<tr class=""><th style="min-width: 160px;" class="label label-low">Poor</th></tr>');
	  $('#na_infra').empty().append('<tr class=""><th style="min-width: 160px;" class="label label-nil">Item not Available</th></tr>');


	  var formData = new FormData(form);

	 
	  var dist_name=$("#dist_id option:selected").text();
	  var item=$("#infra_items option:selected").text();

	  var xhr = new XMLHttpRequest();
	  xhr.open('POST', form.action, true);
	  var progressBar = document.querySelector('progress');
	  xhr.upload.onprogress = function(e) {
	    if (e.lengthComputable) {
	      progressBar.value = (e.loaded / e.total) * 100;
	      progressBar.textContent = progressBar.value;
	    }
	  };

	  title_availibility="Chart for "+dist_name+", Item: "+item;
	  $('#selected_filter_availibility_map').empty().append('Quality Map for<b>&nbsp;'+dist_name+'</b>, &nbsp; Item:&nbsp;<b>'+item+'</b>.');
	  $('#selected_filter_availibility_table').empty().append('Report for<b>&nbsp;'+dist_name+'</b>, &nbsp; Item:&nbsp;<b>'+item+'</b>.&nbsp;&nbsp;Report shows [Block (District)] name on descending order of Score');
	  $('#selected_filter_availibility_chart').empty().append('Chart for<b>&nbsp;'+dist_name+'</b>, &nbsp; Item:&nbsp;<b>'+item+'</b>.');
	  $('#selected_filter_usages').empty().append('Report for<b>&nbsp;'+dist_name+'</b>, &nbsp;Item:&nbsp;<b>'+item+'</b>.&nbsp;&nbsp; Report shows [Block (District)] name.');


	  xhr.onload = function(e) {
		  if (this.status == 200) {
		      resp = JSON.parse(this.response);
		      count_good=0;
		      count_fair=0;
		      count_poor=0;
		      count_na=0;

   	  	  max_block_id=[];
  	  	  med_block_id=[];	     	  	  
   	  	  min_block_id=[];	     		  
   		 	  
   		  max_chart_data=[];
   		  med_chart_data=[];
   		  min_chart_data=[];
   		 
		       $.each(resp ,function(i,value) {
		    	   center_selected_district = new google.maps.LatLng(value.latitude,value.longitude);
		    	 //  console.log(value.latitude+"--"+value.longitude);
		    	   if(value.binf_score >= 70){

     		     		var block_id=parseInt(value.block_id);
      		     		max_block_id[count_good]=[block_id];
      
         		     	var score=parseInt(value.binf_score);
     		     		max_chart_data[count_good] = [value.block_name,score];
     		     		count_good=count_good+1;
   		    	  		$('#good_infra').append('<tr><td>'+count_good+'.&nbsp;<a style="color: black;" target="_blank" href=<?php echo URL;?>profile/block_profile_details/'+value.block_id+'>'+value.block_name+'</a>&nbsp;(&nbsp;'+value.district_name+'&nbsp;)</td></tr>');

      		        }   
		    	   if(value.binf_score >= 60 && value.binf_score < 70){
		    		   var block_id=parseInt(value.block_id);
      		     		med_block_id[count_fair]=[block_id];

    		        	var score=parseInt(value.binf_score);
    		        	med_chart_data[count_fair]=[value.block_name,score];
        		     	count_fair=count_fair+1;
  		    	  		$('#fair_infra').append('<tr><td>'+count_fair+'.&nbsp;<a style="color: black;" target="_blank" href=<?php echo URL;?>profile/block_profile_details/'+value.block_id+'>'+value.block_name+'</a>&nbsp;(&nbsp;'+value.district_name+'&nbsp;)</td></tr>');

     		        }
		    	   if(value.binf_score <= 60 && value.binf_score >0){
	   		        	var block_id=parseInt(value.block_id);
   		     			min_block_id[count_poor]=[block_id];
   		     		
 	   		        	var score=parseInt(value.binf_score);
 	 	   		        
 	   		        	min_chart_data[count_poor]=[value.block_name,score];
		    		    count_poor=count_poor+1;
  		    	  		$('#poor_infra').append('<tr><td>'+count_poor+'.&nbsp;<a style="color: black;" target="_blank" href=<?php echo URL;?>profile/block_profile_details/'+value.block_id+'>'+value.block_name+'</a>&nbsp;(&nbsp;'+value.district_name+'&nbsp;)</td></tr>');

     		        }
		    	   if(value.binf_score==0){
	   		        	var block_id=parseInt(value.block_id);
  		     			min_block_id[count_na]=[block_id];
  		     		
	   		        	var score=parseInt(value.binf_score);
	 	   		        
	   		        	min_chart_data[count_na]=[value.block_name,score];
		    		    count_na=count_na+1;
 		    	  		$('#na_infra').append('<tr><td>'+count_na+'.&nbsp;<a style="color: black;" target="_blank" href=<?php echo URL;?>profile/block_profile_details/'+value.block_id+'>'+value.block_name+'</a>&nbsp;(&nbsp;'+value.district_name+'&nbsp;)</td></tr>');

    		        }
   	   });	

	 };
	  		//console.log(max_block_id);
	       drawRawMaterialAvailibilityCharts();  
	       drawRawMaterialDistributionMap();    
	       $('#data_loading').hide();   
	         if(dist_name!='All Districts'){
		     	 map.setOptions({
						center:center_selected_district,
						zoom:9,
						draggable:false					
			      	 });
		       }
	       else {
		   	   map.setOptions({
						center:center_all_district,
						zoom:7,
						draggable:true
			      	 });
		  }
	 };
	  xhr.send(formData);
	  return false;
}
var styles = new Array();
function styleLayerByAvailibility(block_id,color) {
      styles.push({
        where: "block_id IN ("+block_id+")",
        polygonOptions: {
          fillColor: color,
          fillOpacity: 1
        }
      });
    
    
  }
function drawRawMaterialDistributionMap(){
	  styles =[];
		distLayer.setMap(null);
		blockLayer = new google.maps.FusionTablesLayer({
	 	   		  query: {
	 	   		    select: "'block_id','name'",
	 	   		    from: tableid_block
	 	   		  }
	    	});
		
		 //colors:['#39b44a','#772953','#de4815','#333333'],
			blockLayer.setMap(map);
			if(max_block_id.length!=0){

				styleLayerByAvailibility(max_block_id,'#58c558');

  			}
			if(med_block_id.length!=0){

				styleLayerByAvailibility(med_block_id,'#f5cd27');

  			}
			if(min_block_id.length!=0){

				styleLayerByAvailibility(min_block_id,'#f42d0a');

  			}
			blockLayer.set('styles', styles);
			if(!flag){
				setmouseoverlayer();
			}
		
	}

function setmouseoverlayer() {
	var script = document.createElement('script');
    var url = ['https://www.googleapis.com/fusiontables/v1/query?'];
    url.push('sql=');
    var query = 'SELECT name, geometry,block_id,district FROM ' +tableid_block;
    var encodedQuery = encodeURIComponent(query);
    url.push(encodedQuery);
    url.push('&callback=drawMap');
    url.push('&key=AIzaSyAm9yWCV7JPCTHCJut8whOjARd7pwROFDQ');
    script.src = url.join('');
    var body = document.getElementsByTagName('body')[0];
    body.appendChild(script);
}
function drawMap(data) {
	flag=true;
	var infowindow = new google.maps.InfoWindow(); 
    var rows = data['rows'];
    for (var i in rows) {
        var newCoordinates = [];
        var geometries = rows[i][1]['geometries'];
        
        if (geometries) {
          for (var j in geometries) {
            newCoordinates.push(constructNewCoordinates(geometries[j]));
          }
        } else {
          newCoordinates = constructNewCoordinates(rows[i][1]['geometry']);
        }

        block_polygon = new google.maps.Polygon({
          paths: newCoordinates,
          fillColor: "#ffffff",
	    		strokeColor: "#ffffff",
	    	    strokeOpacity: 0,
	    	    strokeWeight: 0,
	    	    fillOpacity: 0,
  	    		suppressInfoWindows: true,
  	    		
  	    		
        });
        block_polygon.name=rows[i][0];
        block_polygon.block_id=rows[i][2];
        block_polygon.district=rows[i][3];
        
        google.maps.event.addListener(block_polygon, 'mouseover', function(e) {
          this.setOptions({
        	  fillColor: "#ffffff",
	   	    		strokeColor: "#115917",
	   	    	    strokeOpacity: 1,
	   	    	    strokeWeight: 1,
	   	    	    fillOpacity: 1
   	   	    	
              });
        });
        google.maps.event.addListener(block_polygon, 'mouseout', function(e) {
          this.setOptions({ 
        		fillColor: "#ffffff",
	   	    		strokeColor: "#ffffff",
	   	    	    strokeOpacity: 0,
	   	    	    strokeWeight: 0,
	   	    	    fillOpacity: 0
	   	    	    });          	
        });
        google.maps.event.addListener(block_polygon, 'click', function(e) {
            var url="<?php echo URL;?>profile/block_profile_details/"+this.block_id;
            var infoHtml="<div><strong>Block :</strong>"+this.name+"</br><strong>District :</strong>"+this.district+"</br><a target='_blank' class='btn btn-mini' href="+url+" >View block profile</a></div>";
             infowindow.setContent(infoHtml); 
       	     infowindow.setPosition(e.latLng); 
             infowindow.open(map); 	            	
        });
        block_polygon.setMap(map);
        
    }
   
  }

  function constructNewCoordinates(polygon) {
    var newCoordinates = [];
    var coordinates = polygon['coordinates'][0];
    for (var i in coordinates) {
      newCoordinates.push(
          new google.maps.LatLng(coordinates[i][1], coordinates[i][0]));
    }
    return newCoordinates;
  }
      
	 function printPdf(){
	  		var dist_sel_div = document.getElementById('dist_id');
	  		var item_sel_div = document.getElementById('infra_items');
	   	   	var dist_id=dist_sel_div.options[dist_sel_div.selectedIndex].value;
	   	   	var item=item_sel_div.options[item_sel_div.selectedIndex].value;
	   	   	var filter=dist_id+','+item;
			if(dist_id==0){
				window.open('<?php echo URL;?>printpdf/gen_infra_all/'+filter);
			}
			else{
	    		window.open('<?php echo URL;?>printpdf/gen_infra/'+filter);
			}
	}
    function save_download_user(form){
  		var value=form.email.value;
  		setCookie("username",value,1);
  		var formData = new FormData(form);
  		var xhr = new XMLHttpRequest();
  		xhr.open('POST', '<?php echo URL;?>printpdf/save_download_user/', true);
  		xhr.send(formData);
  		printPdf();
    	}
  	function getCookie(c_name){
  		var i,x,y,ARRcookies=document.cookie.split(";");
  		for (i=0;i<ARRcookies.length;i++){
  	  		x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
  	  		y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
  	  		x=x.replace(/^\s+|\s+$/g,"");
  	  		if (x==c_name){
  	    		return unescape(y);
  	    	}
  	  	}
  	}
  	
  	function setCookie(c_name,value,exdays){
  	  	var exdate=new Date();
  	  	exdate.setDate(exdate.getDate() + exdays);
  	  	var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
  	  	document.cookie=c_name + "=" + c_value;
  	}
  	
  	function checkCookie()
  	{
  	var username=getCookie("username");
  	//var loggedin =<?php Session::get('loggedIn');?>;
  	if ((username!=null && username!=""))
  	  {
  	  	alert("Thanks for downloading reports  " + username);
  		printPdf();
  	  }
  	else 
    {
  	$('#myModal').modal('show');
  	username=$('#email').text();
    }
  }   
</script>
