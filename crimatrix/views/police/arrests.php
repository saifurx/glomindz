<style>
	#tableView{
		display:none;
	}
</style>
<div class="visible-print">
</div>
<div class="container hidden-print">
	<div class="row-fluid">
		<div class="span2">
			<h4 class="input-large filter_h4"><strong>Arrested Criminals</strong></h4>	
		</div>
		<div class="span9 offset1">
			<div class="span4">
			</div>
			<div class="span8" id="above_bar">
				<div class="btn-group pull-right">
				  <a class="btn" title="Table View" onclick="showTableView();"><i class="icon-list"></i></a>
				  <a class="btn" title="Grid View" onclick="showGridView();"><i class="icon-th-large"></i></a>
				  <a href="#add_arrested_modal" role="button" data-toggle="modal" class="btn btn-primary" title="Add"><i class="icon-plus icon-white"></i>Add</a>
				  <button class="btn" title="print" onclick="window.print();"><i class="icon-print"></i>Print</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row-fluid">
		<div class="span2 hidden-print">
			<form id="filter_form">	
				<label>Crime Type</label>
				<select id="crime_type_id" name="crime_type_id">
					
				</select>
				<label>City</label>
				<select id="city_id" name="city_id">
					
				</select>
				<label>Police Station</label>
				<select id="ps_id" name="ps_id">
				</select>
				<label>From Date</label>
				<input class="input-large" type="text" id="from_date" name="from_date">
				<label>To Date</label>
				<input class="input-large" type="text" id="to_date" name="to_date">
			</form>
			<label></label>
			<input class="btn btn-primary " type="button" id="search_with_filter_btn" value="Search" onclick="get_arrested_criminal();">
		</div>
		
		<div class="span9 offset1">
			<table class="table table-bordered table-condensed" id="tableView">
				<thead id="data_table_head"></thead>
				<tbody id="data_table_body"></tbody>
	        </table>   
	        
	       	<div class="row-fluid" id="gridView">
	       		<div id="arrestslist_div"></div>
			</div>
		</div>
	</div>
</div>

<div id="edit_arrested_modal" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Edit Arrested Criminal Details</h3>
  </div>
  <div class="modal-body">
  	<div class="row-fluid">
  		<form id="arrested_update_form" action="">
    		<div class="span4">
	    		<input type="hidden" name="id" id="edit_arrested_modal_id">
	    		<label>Name</label>
	    		<input type="text" name="name" id="edit_arrested_modal_name">
	    		<label>Father Name</label>
	    		<input type="text" name="father_name" id="edit_arrested_modal_father_name">
	    		<label>Mobile No.</label>
	    		<input type="text" name="mobile_nos" id="edit_arrested_modal_mobile_nos">
    		</div>
			<div class="span4">
				<label>Case Reference No</label>
	    		<input type="text" name="case_ref_no" id="edit_arrested_modal_case_ref_no">
				<label>Remarks</label>
	    		<input type="text" name="remarks" id="edit_arrested_modal_remarks">
				<label>Police Station</label>
	    		<select name="ps_id" id="edit_arrested_modal_ps_id"></select>	 
			</div>
			<div class="span4">
				<label>Crime Type</label>
	    		<select class="crime_type" name=crime_type_id id="edit_arrested_modal_crime">
	    		</select>
				<label>Longitude</label>
	    		<input type="text" name="longitude" id="edit_arrested_modal_longitude">
				<label>Latitude</label>
	    		<input type="text" name="latitude" id="edit_arrested_modal_latitude">
			</div>
		</form>
	</div>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
    <button class="btn btn-primary" id="save_crime_update_form_btn" onclick="save_crime_update_form();">Update</button>
  </div>
</div>


<div id="add_arrested_modal" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Add Arrested Criminal Details</h3>
  </div>
  <form id="arrested_add_form" action="" style=" margin-bottom: 0px; ">
  <div class="modal-body">
  	<div class="row-fluid">
    		<div class="span4">
				<input type="file" onchange="readURL(this);" name="afile" id="afile" accept="image/jpeg"> 
				<img id="photo"	style="" class="img-polaroid" src="http://placehold.it/250x150">
				<input type="hidden" name="id">
	    		<label>Name</label>
	    		<input type="text" name="name">
    		</div>
			<div class="span4">
	    		<label>Father Name</label>
				<input type="text" name="father_name">
	    		<label>Mobile No.</label>
	    		<input type="text" name="mobile_nos">
	    		<label>Crime Type</label>
	    		<select class="crime_type" name="crime_type_id">
	    		</select>
				<label>Case Reference No</label>	 
				<input type="text" name="case_ref_no">
			</div>
			<div class="span4">
				<label>Remarks</label>
	    		<input type="text" name="remarks">
				<label>Police Station</label>
	    		<select name="ps_id" id="add_arrested_modal_ps_id"></select>
				<label>Longitude</label>
	    		<input type="text" name="longitude">
				<label>Latitude</label>
	    		<input type="text" name="latitude">
			</div>
	</div>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal" aria-hidden="true" onclick="resetForm();">Close</a>
    <button type="button" class="btn btn-primary" id="save_crime_add_form_btn" onclick="save_crime_add_form();">Save</button>
  </div>
  </form>
</div>
<script type="text/javascript">
	$('#arrests_li').addClass('active');
	window.onload = function() {
		var d = new Date();
		var month = d.getMonth()+1;
		var day = d.getDate();
		var today =  d.getFullYear() + '-' +((''+month).length<2 ? '0' : '') + month + '-' + ((''+day).length<2 ? '0' : '') + day;

		var bmonth = month-1;
		var year = d.getFullYear();
		if(month == 1){
			bmonth = 12;
			year=year-1
		}	
		var backdays =   year+ '-' +((''+bmonth).length<2 ? '0' : '') + bmonth + '-' + ((''+day).length<2 ? '0' : '') + day;
			
		$('#from_date,#to_date,#edit_crime_modal_date_of_occurence').datepicker({ dateFormat: "yy-mm-dd" });
		$("#to_date").val(today);
		$('#from_date').val(backdays);
		get_all_ps();
        get_crime_types();
        get_all_city();
		
	};

	function get_all_ps(){
		$.ajax({
			url: '<?php echo URL;?>user_service/get_all_ps/',
			type: 'POST',
			dataType: 'JSON',
			success: function(data){
				$('#ps_id').empty();
				$('#ps_id').append('<option value="0">All</option>');
				$('#edit_arrested_modal_ps_id,#add_arrested_modal_ps_id').append('<option value="0">All</option>');
				for(var i in data){
					  $('#ps_id').append($('<option value="'+data[i].id+'">'+data[i].name+'</option>'));
					  $('#edit_arrested_modal_ps_id,#add_arrested_modal_ps_id').append($('<option value="'+data[i].id+'">'+data[i].name+'</option>'));
				}
			}		
		});
	}
        
    function get_crime_types(){
		$.ajax({
			url: '<?php echo URL;?>police_service/get_crime_types/',
			type: 'POST',
			dataType: 'JSON',
			success: function(data){
				$('#crime_type_id').empty();
				$('#crime_type_id').append('<option value="0">All</option>');
				for(var i in data){
					  $('.crime_type,#crime_type_id').append($('<option value="'+data[i].id+'">'+data[i].name+'</option>'));
				}
			}		
		});
	}

    function get_all_city(){
    $('#city_id').append($('<option value="1">Guwahati</option>'));
    	$.ajax({
    		url: '<?php echo URL;?>user_service/get_all_city/',
    		type: 'POST',
    		dataType: 'JSON',
    		success: function(data){
    			$('#city_id').empty();
    			for(var i in data){
    				$('#city_id').append($('<option value="'+data[i].id+'">'+data[i].name+'</option>'));
    			}
    		}		
    	});
    }
	
	function get_arrested_criminal(){
		var formData = $('#filter_form').serialize();
		var from_date = $('#from_date').val();
		var to_date = $('#to_date').val();
		$('.visible-print').html('<lable>From Date : '+from_date+'</lable> &nbsp;&nbsp; <lable>To Date : '+to_date+'</lable>');
		$('#data_table_body').html('<p class="loading_img"><img alt="loading" src="../assets/apps/img/loading.gif"/></p>');
		$('#search_with_filter_btn').attr('disabled',true).val('Searching...');
		$.ajax({
			type: 'POST',
			url: '<?php echo URL;?>crime_service/get_arrested_criminal/',
			dataType: 'JSON',
			data: formData,
			success: function(resp){
				$('#arrestslist_div,#data_table_head,#data_table_body').empty();
				$('#search_with_filter_btn').attr('disabled',false).val('Search');
				if(resp.length != 0){
					 $('#data_table_head').append('<tr><th>#</th><th>Name</th><th>Case Reference</th><th>Father Name</th><th>Mobile No.</th><th>Address</th><th>Remarks</th><th>Crime</th><th class="hidden-print">Edit</th></tr>');
					 var count = 0;
					 for(var i in resp){
						count = count + 1;
						$('#data_table_body').append('<tr><td>'+count+'</td><td>'+resp[i].name+'</td><td>'+resp[i].case_ref_no+'</td><td>'+resp[i].father_name+'</td><td>'+resp[i].mobile_nos+'</td><td>'+resp[i].address+'</td><td>'+resp[i].remarks+'</td><td>'+resp[i].crime_type+'</td><td class="hidden-print"><button class="btn btn-mini" type="button" onclick="edit_crime('+resp[i].id+');"><i class="icon-pencil"></i></button></td></tr>');
					 	$('#arrestslist_div').append('<div class="card"><div class="inerCard">'
								+'<img src='+resp[i].image_url+' width="200" height="220">'
								+'<div class="cardinfo"><h5>Name: '+resp[i].name+'</h5>'
								+'<p><strong>Father Name: '+resp[i].father_name+'<strong></p>'
								+'<p><strong>Crime: '+resp[i].crime_type+'<strong></p>'
								+'</div></div></div>');
					 }
				 }
				else{
					$('#data_table_head').append('<tr class="alert alert-error hidden-print"><td>No Record Found</td></tr>');
				}
			}
		});
	}
	
	function edit_crime(id){
		$('#edit_arrested_modal').modal('show');
		$('#arrested_update_form').each(function(){
		    this.reset();
		});
		$.ajax({
			type: 'POST',
			url: '<?php echo URL;?>crime_service/get_arrested_criminal_details/',
			dataType: 'JSON',
			data: {id:id},
			success: function(resp){
				for(var i in resp){
					console.log(resp);
					$('#edit_arrested_modal_id').val(resp[i].id);
					$('#edit_arrested_modal_name').val(resp[i].name);
					$('#edit_arrested_modal_father_name').val(resp[i].father_name);
					$('#edit_arrested_modal_mobile_nos').val(resp[i].mobile_nos);
					$('#edit_arrested_modal_case_ref_no').val(resp[i].case_ref_no);
					$('#edit_arrested_modal_remarks').val(resp[i].remarks);
					$('#edit_arrested_modal_crime').val(resp[i].crime_type_id);
					$('#edit_arrested_modal_ps_id').val(resp[i].ps_id);
					$('#edit_arrested_modal_longitude').val(resp[i].longitude);
					$('#edit_arrested_modal_latitude').val(resp[i].latitude);
				}
			}
		});
	}
	
	var data_url = 0;

	function save_crime_update_form(){
		var formData = $('#arrested_update_form').serializeArray();
		$.ajax({
			url: '<?php echo URL;?>crime_service/update_arrested_criminal_details/',
			type: 'POST',
			dataType: 'JSON',
			data: formData,
			success: function(data){
				$('#edit_arrested_modal').modal('hide');
				get_arrested_criminal();
			}		
		});
	}

	function readURL(input){
	    if (input.files && input.files[0]){
	        var reader = new FileReader();
	        reader.onload = function (e) {
	            $('#photo').attr('src', e.target.result);
	            data_url = $('#photo').attr('src');
	        };
	        reader.readAsDataURL(input.files[0]);
	    }
	}
	
	function save_crime_add_form(){
		var formData = $('#arrested_add_form').serializeArray();
		if(data_url != 0){
			formData.push({name: 'data_url', value: data_url});
		}
		$.ajax({
			url: '<?php echo URL;?>crime_service/save_arrested_crimianl_data/',
			type: 'POST',
			dataType: 'JSON',
			data: formData,
			success: function(data){
				$('#add_arrested_modal').modal('hide');
				data_url = 0;
				$('#photo').attr('src', 'http://placehold.it/200x150');
				get_arrested_criminal();
			}		
		});
	}

	function resetForm(){
		 $('#photo').attr('src', '');
	}
	function showTableView(){
		$('#tableView').show();
		$('#gridView').hide();
	}

	function showGridView(){
		$('#tableView').hide();
		$('#gridView').show();
	}
</script>