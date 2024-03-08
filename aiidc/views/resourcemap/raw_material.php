
<div class="container">
	<div class="subnav subnav-fixed">
		<ul class="nav nav-pills">
			<li class="active"><a
				href="<?php echo URL;?>resourcemap/raw_material">Raw Materials</a>
			</li>
			<li><a href="<?php echo URL;?>resourcemap/human_resource">Human
					Resource</a>
			</li>
			<li><a href="<?php echo URL;?>resourcemap/general_infrastructure">General
					Infrastructure</a>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="span12">
			<h3>Raw Materials</h3>
			<p class="raw_p">So far as Raw Materials are concerned, Assam is a
				land of plenty. Raw materials occurred in the state range widely.
				The survey grouped the whole spectrum of Raw Materials in the
				categories of Field Crops, Horticulture, Spices & Orchids, Forest,
				Cattle & Livestock, Fishery, Mineral and Sericulture Produces.</p>
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="span3">
			<h3>Data filter</h3>
			<form class="well"
				action="<?php echo URL;?>resourcemap/get_raw_material_data"
				method="post" enctype="application/x-www-form-urlencoded">
				<div class="control-group">
					<label class="control-label" for="scope">Scope</label>
					<div class="controls">
						<select name="dist_id" id="dist_id">
							<option value="0">All Districts</option>
							<?php
							foreach($this->districtList as $key => $value) {?>
							<option value="<?php echo $value['id']; ?>">
								<?php echo $value['name']; ?>
							</option>
							<?php }?>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="catagory">Category</label>
					<div class="controls">
						<select id="combo_catagory" onchange="getRawMaterialsName(this)">
							<option value="0">Select Category</option>
							<?php
							foreach($this->rm_type as $key => $value) {?>
							<option value="<?php echo $value['type']; ?>">
								<?php echo $value['type']; ?>
							</option>
							<?php }?>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="item">Item</label>
					<div class="controls">
						<select id="rm_items" name="rm_items_id">

						</select>
					</div>
				</div>
				<div class="control-group">
					<input id="rb_availibility" checked="checked" type="radio"
						name="select_option" value="select01" />Viability<br />
					<div class="controls" id="control1">
						<span class="badge badge-high"></span> <input type="checkbox"
							name="cb_availibility_max" id="cb_availibility_max"
							checked="checked" value="100"> High </br> <span
							class="badge badge-moderate"></span> <input type="checkbox"
							name="cb_availibility_med" id="cb_availibility_med"
							checked="checked" value="101"> Moderate </br> <span
							class="badge badge-low"></span> <input type="checkbox"
							name="cb_availibility_min" id="cb_availibility_min"
							checked="checked" value="102"> Low </br> <span
							class="badge badge-nil"></span> <input type="checkbox"
							name="cb_availibility_nil" id="cb_availibility_nil"
							checked="checked" value="107"> Nil </br>
					</div>
				</div>
				<div class="control-group">
					<input id="rb_usages" type="radio" name="select_option"
						value="select02" />Usages<br />
					<div class="controls" id="control2">
						<span class="badge badge-success"></span> <input type="checkbox"
							name="cb_usages_1" id="cb_usages_1" value="103"> Consumption <br />
						<span class="badge badge-info"></span> <input type="checkbox"
							name="cb_usages_2" id="cb_usages_2" value="104"> Sales <br /> <span
							class="badge badge-warning"></span> <input type="checkbox"
							name="cb_usages_3" id="cb_usages_3" value="105"> Processing <br />
						<span class="badge badge-inverse"></span> <input type="checkbox"
							name="cb_usages_4" id="cb_usages_4" value="106">Underutilized/
						Wasted <br />
					</div>
				</div>

				<button type="submit" disabled="disabled" class="btn btn-primary"
					id="btn_apply" onclick="return get_rm_data(this.form);">Apply
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
					<li class="active"><a href="#tab1" data-toggle="tab">Viability Map</a>
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
							<div id="max_rm_summ" class="span2"></div>
							<div id="med_rm_summ" class="span2"></div>
							<div id="min_rm_summ" class="span2"></div>
							<div id="nil_rm_avail" class="span2"></div>
						</div>
						<div class="row" id="rm_usages_div">
							<div id="1_rm_usages" class="span2"></div>
							<div id="2_rm_usages" class="span2"></div>
							<div id="3_rm_usages" class="span2"></div>
							<div id="4_rm_usages" class="span2"></div>
							<div id="6_rm_usages" class="span2"></div>
							<div id="7_rm_usages" class="span2"></div>
							<div id="5_rm_usages" class="span2"></div>
						</div>
					</div>
					<div class="tab-pane" id="tab3">
						<div id="tab2_pgh" class="page-header">
							<div class="pull-left" id="selected_filter_availibility_chart"></div>
						</div>
						<div id="pie_chart"></div>
						<div id="pie_chart_usages" style="display: none;">
							<div id="pie_chart_usages_1" style="display: none;">
								<h3 class="well">Charts are under construction1</h3>
							</div>
							<div id="pie_chart_usages_2" style="display: none;">
								<h3 class="well">Charts are under construction2</h3>
							</div>
							<div id="pie_chart_usages_3" style="display: none;">
								<h3 class="well">Charts are under construction3</h3>
							</div>
							<div id="pie_chart_usages_4" style="display: none;">
								<h3 class="well">Charts are under construction4</h3>
							</div>
							<div id="pie_chart_usages_5" style="display: none;">5</div>
							<div id="pie_chart_usages_6" style="display: none;">6</div>
						</div>
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
							value="Researcher">Researcher<br> <br> <input type="radio"
							name="optionsRadios" id="optionsRadios3" value="Other">Other
						&nbsp; <input type="text" id="inputOther" name="inputOther"
							class="input-small" placeholder="specify">
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
<script
	type="text/javascript"
	src="http://gmaps-utility-gis.googlecode.com/svn/trunk/fusiontips/src/fusiontips_compiled.js"></script>
<script
	type="text/javascript"
	src="http://maps.googleapis.com/maps/api/js?libraries=geometry,places,visualization&sensor=true"></script>
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
	   $('#btn_apply').attr('disabled',false);
});
google.maps.event.addDomListener(document.getElementById('rm_items'),
        'change', function() {
	   blockLayer.setMap(null);
	   distLayer.setMap(map);
	   $('#btn_apply').attr('disabled',false);
});
var title_availibility;
var count_max=0;
var count_med=0;
var count_min=0;
var count_nil=0;

var count_1=0;
var count_2=0;
var count_3=0;
var count_4=0;
var count_5=0;
var count_6=0;
var count_7=0;
var all_block_count=0;
var rest=0;
var resp = '';
var piechart;
var max_chart_data= new Array();
var med_chart_data= new Array();
var min_chart_data= new Array();
var nil_chart_data= new Array();


var max_block_id= new Array();
var med_block_id= new Array();
var min_block_id= new Array();
var nil_block_id= new Array();

$(function() {
	

	 var radio_availibility=document.getElementById('rb_availibility');
	 
	 var check_max=document.getElementById('cb_availibility_max');
	 var check_med=document.getElementById('cb_availibility_med');
	 var check_min=document.getElementById('cb_availibility_min');
	 var check_nil=document.getElementById('cb_availibility_nil');


	 var radio_usages=document.getElementById('rb_usages');
	 
	 var check_con=document.getElementById('cb_usages_1');
	 var check_sale=document.getElementById('cb_usages_2');
	 var check_pro=document.getElementById('cb_usages_3');
	 var check_wast=document.getElementById('cb_usages_4');


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
				 $('#pie_chart_usages').hide(); 
				 $('#pie_chart').show();
				 $('#selected_filter_availibility').show();
				 showTableDivOnAvailibilityCheckBoxChange();
			}

			if(radio_usages.checked==true){
				 $('#selected_filter_usages').show();
				 $('#rm_availibility_div').hide();
				 $('#rm_usages_div').show();
				 $('#control1').hide();
				 $('#control2').show();
				 $('#pie_chart').hide();
				 $('#pie_chart_usages').show(); 
				 showTableDivOnUsagesCheckBoxChange();
			}
			
		 }

	 function showTableDivOnAvailibilityCheckBoxChange(){
			$('#max_rm_summ').hide();
			$('#med_rm_summ').hide();
			$('#min_rm_summ').hide();
			$('#nil_rm_avail').hide();

					if(check_max.checked==true){
						$('#max_rm_summ').show();
					}

					if(check_med.checked==true){
						
						$('#med_rm_summ').show();
					}
					if(check_min.checked==true){
						
						$('#min_rm_summ').show();
						
					}
					if(check_nil.checked==true){
						
						$('#nil_rm_avail').show();
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

			 $('#pie_chart_usages_1').hide();
			 $('#pie_chart_usages_2').hide();
			 $('#pie_chart_usages_3').hide();
			 $('#pie_chart_usages_4').hide();
			 $('#pie_chart_usages_5').hide();
			 $('#pie_chart_usages_6').hide();
			  if(check_con.checked==true && check_sale.checked==false && check_pro.checked==false && check_wast.checked==false){
    			  value =1;
    			  $('#1_rm_usages').show();
    			 
    			  $('#6_rm_usages').show();
    			  
    			  $('#5_rm_usages').show();

    			  $('#pie_chart_usages_1').show();
    			  
			  }else if(check_con.checked==false && check_sale.checked==true && check_pro.checked==false && check_wast.checked==false){
    			  value =2;
    			  $('#2_rm_usages').show();
    			  
    			  $('#6_rm_usages').show();
    			  $('#5_rm_usages').show();
    			  $('#7_rm_usages').show();

    			  $('#pie_chart_usages_2').show();
			  }else  if(check_con.checked==false && check_sale.checked==false && check_pro.checked==true && check_wast.checked==false){
    			  value =3;
    			  $('#3_rm_usages').show();
    			  $('#5_rm_usages').show();
    			  $('#7_rm_usages').show();
    			  $('#pie_chart_usages_3').show();
			  }else if(check_con.checked==false && check_sale.checked==false && check_pro.checked==false && check_wast.checked==true){
    			  value =4;
    			  $('#4_rm_usages').show();
    			  $('#pie_chart_usages_4').show();
			  }


			  else if(check_con.checked==true && check_sale.checked==true && check_pro.checked==true && check_wast.checked==false){
				  value =5;
				  $('#5_rm_usages').show();
				  $('#pie_chart_usages_5').show();
		      }else if(check_con.checked==true && check_sale.checked==true && check_pro.checked==false && check_wast.checked==false){
				  value =6;
				  $('#6_rm_usages').show();
				  $('#pie_chart_usages_6').show();
		      }else if(check_con.checked==false && check_sale.checked==true && check_pro.checked==true && check_wast.checked==false){
				  value =7;
				  $('#7_rm_usages').show();
		      }  

		 }

	 
	//radio button 
   $("#rb_availibility").click(function() 
   		{
   			
    	 showTableDivOnRadioChanges();
   		
   		});  
 
   $("#rb_usages").click(function() 
   		{
	   showTableDivOnRadioChanges();
   	
  	});
	
	$('#btn_apply').click(function() {
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
  $("#cb_availibility_nil").click(function() {
  	showTableDivOnRadioChanges();
  });
 
    $("#cb_usages_1").click(function() {
  	  $('#cb_usages_4').attr('checked', false);
  	  showTableDivOnRadioChanges();
  	 
  });
    $("#cb_usages_2").click(function() {
  	  $('#cb_usages_4').attr('checked', false);
  	  showTableDivOnRadioChanges();
  	  
  	  
    });
    $("#cb_usages_3").click(function() {
  	   $('#cb_usages_4').attr('checked', false);
  		 
      showTableDivOnRadioChanges();
    });
    $("#cb_usages_4").click(function() {
    	  $('#cb_usages_1').attr('checked', false);
    	  $('#cb_usages_2').attr('checked', false);
    	  $('#cb_usages_3').attr('checked', false);
  	 	  showTableDivOnRadioChanges();
    });
    
    
});
	
      function drawRawMaterialAvailibilityCharts(){

        var chartDiv=document.getElementById('pie_chart');
    	var data = google.visualization.arrayToDataTable([
    	                                                   ['Availibility', 'Score'],
    	                                                   ['High', count_max],
    	                                                   ['Moderate', count_med],
    	                                                   ['Low', count_min],
    	                                                   ['Nil', count_nil]
    	                                                   
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
		             
                   map.mapTypes.set('map-style', styledMapType);
                   map.setMapTypeId('map-style');

                    var marker = new google.maps.Marker({
                	   	  position: center_guwahati,
                	      map: map,
                	      title:"Capital Guwahati"
                	 });
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
      function getRawMaterialsName(type_rm){
    	  $('#rm_items').empty();
    	  $('#btn_apply').attr('disabled',false);
    		$.ajax({
    			url: '<?php echo URL;?>resourcemap/getRawMaterialList',
    			type: 'POST',
    			data: {type: type_rm.value},
    			dataType: 'JSON',
    			success:function (resp){
    				$.each(resp ,function(i,value) {
				    	  $('#rm_items').append($("<option></option>").attr("value",value.id).text(value.name));
				    	  flag=true;
				      });
    				$('#combo_catagory').change(function(){
   			    	 
  			    	  if($(this).val() == 0){
  			    	     $('#btn_apply').attr('disabled',true);
  			    	  }
  			    });
  			    
  			    $('#dist_id').change(function(){
  				     $('#btn_apply').attr('disabled',false);
  				     var a=$('#combo_catagory').val();
  					 if(a == 0){
  						 $('#btn_apply').attr('disabled',true);
  					 }
  				});
				      
    			}
    		});

    		
    			 
				
		
    		return false;
    	}
     
      function get_rm_data(form) {
    	  $('#data_loading').show();
    	  $('#chartDiv').empty();
    	  $('#btn_apply').attr('disabled',true);
    	  $('#print_pdf').attr('disabled',false);

          $('#max_rm_summ').empty().append('<tr class="" ><th style="min-width: 160px;" class="label label-high">High</th></tr>');
    	  $('#med_rm_summ').empty().append('<tr class=""><th style="min-width: 160px;" class="label label-moderate">Moderate</th></tr>');
    	  $('#min_rm_summ').empty().append('<tr class=""><th style="min-width: 160px;" class="label label-low">Low</th></tr>');
    	  $('#nil_rm_avail').empty().append('<tr class=""><th style="min-width: 160px;" class="label label-nil">Nil</th></tr>');

    	  $('#1_rm_usages').empty().append('<tr class=""><th style="min-width: 160px;" class="label label-success">Consumption</th></tr>');
    	  $('#2_rm_usages').empty().append('<tr class=""><th style="min-width: 160px;" class="label label-info">Sales</th></tr>');
    	  $('#3_rm_usages').empty().append('<tr class=""><th style="min-width: 160px;" class="label label-warning">Processing</th></tr>');
    	  $('#4_rm_usages').empty().append('<tr class=""><th style="min-width: 160px;" class="label label-inverse">Underutilized/ Wasted</th></tr>');

    	  $('#5_rm_usages').empty().append('<tr class=""><th style="min-width: 160px;" class="label">Consumption, Sale and Processing</th></tr>');
    	  $('#6_rm_usages').empty().append('<tr class=""><th style="min-width: 160px;" class="label">Consumption and Sale</th></tr>');
    	  $('#7_rm_usages').empty().append('<tr class=""><th style="min-width: 160px;" class="label">Sale and Processing</th></tr>');

    	  
    	  var formData = new FormData(form);

    	 
    	  var dist_name=$("#dist_id option:selected").text();
		  var item=$("#rm_items option:selected").text();

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
    	  $('#selected_filter_availibility_map').empty().append('Viability Map for<b>&nbsp;'+dist_name+'</b>, &nbsp; Item:&nbsp;<b>'+item+'</b>.');
    	  $('#selected_filter_availibility_table').empty().append('Report for<b>&nbsp;'+dist_name+'</b>, &nbsp; Item:&nbsp;<b>'+item+'</b>.&nbsp;&nbsp;Report shows [Block (District)] name on descending order of Score');
    	  $('#selected_filter_availibility_chart').empty().append('Chart for<b>&nbsp;'+dist_name+'</b>, &nbsp; Item:&nbsp;<b>'+item+'</b>.');
    	  $('#selected_filter_usages').empty().append('Report for<b>&nbsp;'+dist_name+'</b>, &nbsp;Item:&nbsp;<b>'+item+'</b>.&nbsp;&nbsp; Report shows [Block (District)] name.');


      	  xhr.onload = function(e) {
    		  if (this.status == 200) {
    		      resp = JSON.parse(this.response);
    		      count_max=0;
    		      count_med=0;
    		      count_min=0;
    		      count_nil=0;

    		      count_1=0;
    		      count_2=0;
    		      count_3=0;
    		      count_4=0;
    		      count_5=0;
    		      count_6=0;
    		      count_7=0;
    		      all_block_count=0;
    		      rest=0;
         	  	  max_block_id=[];
        	  	  med_block_id=[];	     	  	  
	     	  	  min_block_id=[];	     		  
	     		  nil_block_id=[];
	     		  
	     		  max_chart_data=[];
	     		  med_chart_data=[];
	     		  min_chart_data=[];
	     		  nil_chart_data=[];
    		     
    		       $.each(resp ,function(i,value) {    
    		    	   all_block_count=all_block_count+1;
    		    	//console.log(value.latitude,value.longitude);
    		    	center_selected_district = new google.maps.LatLng(value.latitude,value.longitude);

      		     	if(value.rm_score >= 112){
          		     	
      		     		var block_id=parseInt(value.block_id);
       		     		max_block_id[count_max]=[block_id];
       
          		     	var score=parseInt(value.rm_score);
      		     		max_chart_data[count_max] = [value.block_name,score];
      		     		count_max=count_max+1;
    		    	  //$('#max_rm_summ').append('<tr><td>'+count_max+'.&nbsp;'+value.block_name+'&nbsp;(&nbsp;'+value.district_name+'&nbsp;)</td></tr>');
    		    	  $('#max_rm_summ').append('<tr><td>'+count_max+'.&nbsp;<a style="color: black;" target="_blank" href=<?php echo URL;?>profile/block_profile_details/'+value.block_id+'>'+value.block_name+'</a>&nbsp;(&nbsp;'+value.district_name+'&nbsp;)</td></tr>');

       		         }
      		     	
      		     	 

     		        if(value.rm_score  >= 85 && value.rm_score <112){


     		        	var block_id=parseInt(value.block_id);
       		     		med_block_id[count_med]=[block_id];

     		        	var score=parseInt(value.rm_score);
     		        	med_chart_data[count_med]=[value.block_name,score];
     		        	count_med=count_med+1;
     		        	$('#med_rm_summ').append('<tr><td>'+count_med+'.&nbsp;<a style="color: black;" target="_blank" href=<?php echo URL;?>profile/block_profile_details/'+value.block_id+'>'+value.block_name+'</a>&nbsp;(&nbsp;'+value.district_name+'&nbsp;)</td></tr>');
      	     		  }
     		      

 	   		        if(value.rm_score  > 0 && value.rm_score < 85){

 	   		        	var block_id=parseInt(value.block_id);
   		     			min_block_id[count_min]=[block_id];
   		     		
 	   		        	var score=parseInt(value.rm_score);
 	 	   		        
 	   		        	min_chart_data[count_min]=[value.block_name,score];
 	   		        	count_min=count_min+1;
 	   		        $('#min_rm_summ').append('<tr><td>'+count_min+'.&nbsp;<a style="color: black;" target="_blank" href=<?php echo URL;?>profile/block_profile_details/'+value.block_id+'>'+value.block_name+'</a>&nbsp;(&nbsp;'+value.district_name+'&nbsp;)</td></tr>');
     		        	
          		       }
	   		        if(value.rm_score == 0 ){

	   		        	var block_id=parseInt(value.block_id);
       		     		nil_block_id[count_nil]=[block_id];
       		     		
	   		        	var score=parseInt(value.rm_score);
	   		        	
	   		        	nil_chart_data[count_nil]=[value.block_name,score];
	   		        	count_nil=count_nil+1;
	   		        	$('#nil_rm_avail').append('<tr><td>'+count_nil+'.&nbsp;<a style="color: black;" target="_blank" href=<?php echo URL;?>profile/block_profile_details/'+value.block_id+'>'+value.block_name+'</a>&nbsp;(&nbsp;'+value.district_name+'&nbsp;)</td></tr>');

 		        	 }
					/* usages*/
					
    		         //Used for Consumption
    		         if(value.present_usage_id == 1)
    		         {
    		        	 count_1=count_1+1;
        		        
    		        	 $('#1_rm_usages').append('<tr><td>'+count_1+'.&nbsp;<a style="color: black;" target="_blank" href=<?php echo URL;?>profile/block_profile_details/'+value.block_id+'>'+value.block_name+' </a>&nbsp;(&nbsp;'+value.district_name+'&nbsp;)</td></tr>');
    		         }
					//Used for sales
					
    		       if(value.present_usage_id == 2)
    		         { 
    		    	   count_2=count_2+1;
    		        	 $('#2_rm_usages').append('<tr><td>'+count_2+'.&nbsp;<a style="color: black;" target="_blank" href=<?php echo URL;?>profile/block_profile_details/'+value.block_id+'>'+value.block_name+' </a>&nbsp;(&nbsp;'+value.district_name+'&nbsp;)</td></tr>');
    		         }

    		         //used for processing
    		       if(value.present_usage_id == 3)
    		         {
    		    	   count_3=count_3+1;
    		        	 $('#3_rm_usages').append('<tr><td>'+count_3+'.&nbsp;<a style="color: black;" target="_blank" href=<?php echo URL;?>profile/block_profile_details/'+value.block_id+'>'+value.block_name+' </a>&nbsp;(&nbsp;'+value.district_name+'&nbsp;)</td></tr>');
    		         }
    		     //wasted
  		         if(value.present_usage_id ==4)
  		         {
  		        	count_4=count_4+1;
  		        	 $('#4_rm_usages').append('<tr><td>'+count_4+'.&nbsp;<a style="color: black;" target="_blank" href=<?php echo URL;?>profile/block_profile_details/'+value.block_id+'>'+value.block_name+' </a>&nbsp;(&nbsp;'+value.district_name+'&nbsp;)</td></tr>');
  		         }
				//Used for Consumption, Sale and Processing
      		     if(value.present_usage_id == 5)
  		         {
      		    	count_5=count_5+1;
  		        	 $('#5_rm_usages').append('<tr><td>'+count_5+'.&nbsp;<a style="color: black;" target="_blank" href=<?php echo URL;?>profile/block_profile_details/'+value.block_id+'>'+value.block_name+' </a>&nbsp;(&nbsp;'+value.district_name+'&nbsp;)</td></tr>');
  		         }
    		       if(value.present_usage_id == 6)
  		         {
    		    	   count_6=count_6+1;
  		        	 $('#6_rm_usages').append('<tr><td>'+count_6+'.&nbsp;<a style="color: black;" target="_blank" href=<?php echo URL;?>profile/block_profile_details/'+value.block_id+'>'+value.block_name+' </a>&nbsp;(&nbsp;'+value.district_name+'&nbsp;)</td></tr>');
  		         }
    		       if(value.present_usage_id == 7)
  		         {
    		    	   count_7=count_7+1;
  		        	 $('#7_rm_usages').append('<tr><td>'+count_7+'.&nbsp;<a style="color: black;" target="_blank" href=<?php echo URL;?>profile/block_profile_details/'+value.block_id+'>'+value.block_name+' </a>&nbsp;(&nbsp;'+value.district_name+'&nbsp;)</td></tr>');
		
  		         }
    		       
	     	  });	
  
  		    }; 
  		    
		       drawRawMaterialAvailibilityCharts();  
		       drawRawMaterialUsagesChartsCons();
		       drawRawMaterialUsagesChartsSale();
		       drawRawMaterialUsagesChartsProce();
		       drawRawMaterialUsagesChartsWasted();
		       drawRawMaterialUsagesChartsSP();
		       drawRawMaterialUsagesChartsCSP();
		       drawRawMaterialDistributionMap();
		       $('#data_loading').hide();
		       if(dist_name!='All Districts'){
		      	 map.setOptions({
						center:center_selected_district,
						zoom:9,
						draggable:false
					
			      	 });
		       }else{
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
    			if(nil_block_id.length!=0){

    				styleLayerByAvailibility(nil_block_id,'#757575');

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
	        //console.log(url);
	        var body = document.getElementsByTagName('body')[0];
	        body.appendChild(script);
		}
		function drawMap(data) {
			flag=true;
	        var rows = data['rows'];
	        var infowindow = new google.maps.InfoWindow();
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

	              	//infowindow.close();
	              	
	            });
	            google.maps.event.addListener(block_polygon, 'click', function(e) {
		            var url="<?php echo URL;?>profile/block_profile_details/"+this.block_id;
		            var infoHtml="<div><strong>Block :</strong>"+this.name+"</br><strong>District :</strong>"+this.district+"</br><a target='_blank' class='btn btn-mini' href="+url+" >View block profile</a></div>";
	                 infowindow.setContent(infoHtml); 
		       	     infowindow.setPosition(e.latLng); 
		             infowindow.open(map); 
	            	
			     //     var block_id =this.block_id;
			     //   window.open('<?php echo URL;?>profile/block_profile_details/'+block_id,"_self");
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
	  		var item_sel_div = document.getElementById('rm_items');
	   	   	var dist_id=dist_sel_div.options[dist_sel_div.selectedIndex].value;
	   	   	var item=item_sel_div.options[item_sel_div.selectedIndex].value;
	   	   	var filter=dist_id+','+item;
	   	   	if(dist_id==0){
		   	   	//alert("Hello");
		   	 	window.open('<?php echo URL;?>printpdf/raw_materialall/'+filter);
		   	}
	   	   	else{
	    		window.open('<?php echo URL;?>printpdf/raw_material/'+filter);
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
/*********************************************/
    function drawRawMaterialUsagesChartsCons(){
    	rest=0;
        rest=all_block_count-(count_1+count_5+count_6);
        var chartDiv=document.getElementById('pie_chart_usages_1');
    	var data = google.visualization.arrayToDataTable([
	    	                                ['Usages', 'Blocks'],
	    	                                ['Consumption ', count_1],
	    	                                ['Consumption, Sale and Processing ', count_5],
	    	                                ['Consumption and Sale ', count_6],
	    	                                ['Others',rest ]    
    	                               ]);
    	 var options = {
    	          
    	          colors:['#58c558','#f42d0a','#f5cd27','#757575'],
    	          height: 400,
    	          width:870,
    	          pieSliceText:'none',
    	          titleTextStyle:{
        	          color: '333333',
    	              fontName: 'Arial',
    	              fontSize: 15, 
    	          }
   	        };                                        
                 // Create and draw the visualization.
    	 piechart = new google.visualization.PieChart(chartDiv);
	 	 piechart.draw(data,options);
	}

    function drawRawMaterialUsagesChartsSale(){
    	rest=0;
        rest=all_block_count-(count_2+count_5+count_6+count_7);
        var chartDiv=document.getElementById('pie_chart_usages_2');
    	var data = google.visualization.arrayToDataTable([
	    	                                ['Usages', 'Blocks'],
	    	                                ['Sale', count_2],
	    	                                ['Consumption, Sale and Processing ', count_5],
	    	                                ['Consumption and Sale ', count_6],
	    	                                ['Sale and Processing ', count_7],
	    	                                ['Others',rest ]    
    	                               ]);
    	 var options = {
    	          
    	          colors:['#58c558','#f5cd27','#f42d0a','#403ddb','#757575'],
    	          height: 400,
    	          width:870,
    	          pieSliceText:'none',
    	          titleTextStyle:{
        	          color: '333333',
    	              fontName: 'Arial',
    	              fontSize: 15, 
    	          }
   	        };                                        
                 // Create and draw the visualization.
    	 piechart = new google.visualization.PieChart(chartDiv);
	 	 piechart.draw(data,options);
	}

    function drawRawMaterialUsagesChartsProce(){
    	rest=0;
        rest=all_block_count-(count_3+count_5+count_7);
        var chartDiv=document.getElementById('pie_chart_usages_3');
    	var data = google.visualization.arrayToDataTable([
	    	                                ['Usages', 'Blocks'],
	    	                                ['Processing', count_3],
	    	                                ['Consumption, Sale and Processing ', count_5],
	    	                                ['Sale and Processing ', count_7],
	    	                                ['Others',rest ]    
    	                               ]);
    	 var options = {
    	          
    	          colors:['#58c558','#f5cd27','#f42d0a','#757575'],
    	          height: 400,
    	          width:870,
    	          pieSliceText:'none',
    	          titleTextStyle:{
        	          color: '333333',
    	              fontName: 'Arial',
    	              fontSize: 15, 
    	          }
   	        };                                        
                 // Create and draw the visualization.
    	 piechart = new google.visualization.PieChart(chartDiv);
	 	 piechart.draw(data,options);
	}
    function drawRawMaterialUsagesChartsWasted(){
    	rest=0;
        rest=all_block_count-count_4;
        var chartDiv=document.getElementById('pie_chart_usages_4');
    	var data = google.visualization.arrayToDataTable([
	    	                                ['Usages', 'Blocks'],	    	             
	    	                                ['Wasted ', count_4],
	    	                                ['Others',rest ]    
    	                               ]);
    	 var options = {
    	          
    	          colors:['#58c558','#757575'],
    	          height: 400,
    	          width:870,
    	          pieSliceText:'none',
    	          titleTextStyle:{
        	          color: '333333',
    	              fontName: 'Arial',
    	              fontSize: 15, 
    	          }
   	        };                                        
                 // Create and draw the visualization.
    	 piechart = new google.visualization.PieChart(chartDiv);
	 	 piechart.draw(data,options);
	}
    function drawRawMaterialUsagesChartsCSP(){
    	rest=0;
        rest=all_block_count-count_5;
        var chartDiv=document.getElementById('pie_chart_usages_5');
    	var data = google.visualization.arrayToDataTable([
	    	                                ['Usages', 'Blocks'],
	    	                                ['Consumption, Sale and Processing ', count_5],
	    	                                ['Others',rest ]    
    	                               ]);
    	 var options = {
    	          
    	          colors:['#58c558','#757575',''],
    	          height: 400,
    	          width:870,
    	          pieSliceText:'none',
    	          titleTextStyle:{
        	          color: '333333',
    	              fontName: 'Arial',
    	              fontSize: 15, 
    	          }
   	        };                                        
                 // Create and draw the visualization.
    	 piechart = new google.visualization.PieChart(chartDiv);
	 	 piechart.draw(data,options);
	}
    function drawRawMaterialUsagesChartsSP(){
    	rest=0;
        rest=all_block_count-count_6;
        var chartDiv=document.getElementById('pie_chart_usages_6');
    	var data = google.visualization.arrayToDataTable([
	    	                                ['Usages', 'Blocks'],	    	             
	    	                                ['Sale and Processing ', count_6],
	    	                                ['Others',rest ]    
    	                               ]);
    	 var options = {
    	          
    	          colors:['#58c558','#757575'],
    	          height: 400,
    	          width:870,
    	          pieSliceText:'none',
    	          titleTextStyle:{
        	          color: '333333',
    	              fontName: 'Arial',
    	              fontSize: 15, 
    	          }
   	        };                                        
                 // Create and draw the visualization.
    	 piechart = new google.visualization.PieChart(chartDiv);
	 	 piechart.draw(data,options);
	 	
	}
    </script>
