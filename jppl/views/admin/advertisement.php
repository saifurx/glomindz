<div class="container">
	<div class="row-fluid">
		<div class="span2">
			<h4 class="input-large filter_h4"><strong>Advertisement</strong></h4>	
		</div>
		<div class="span9 offset1">
			<div class="span4">
			
			</div>
			<div class="span8" id="above_bar">
				<div class="btn-group pull-right">
				  <button type="button" data-toggle="modal" data-target="#add_ad_modal" class="btn btn-primary" title="Add"><i class="icon-plus icon-white"></i>Add</button>
				  <button class="btn" title="print"><i class="icon-print"></i>Print</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row-fluid">
		<div class="span2">
			<form id="filter_form">	
				<label>Source</label>
				<select name="source">
					<option value="0">All</option>
					<option value="DIPR">DIPR</option>
                    <option value="DAVP">DAVP</option>
                    <option value="MES">MES</option>
                    <option value="NRHM">NRHM</option>
                    <option value="Other Govt">Other Govt</option>
                    <option value="Commercial">Commercial</option>
                    <option value="Classified">Classified</option>
				</select>
				<label>Edition</label>
				<select name="edition">
					<option value="0">All</option>
                    <option value="Guwahati">Guwahati</option>
                    <option value="Dibrugarh">Dibrugarh</option>
				</select>
			</form>
			<label></label>
			<input class="btn btn-primary " type="button" id="search_with_filter_btn" value="Search" onclick="get_filter_data();">
		</div>
		<div class="span9 offset1">
			<table class="table table-bordered table-condensed">
				<thead id="data_table_head">
				</thead>
				<tbody id="data_table_body">
				</tbody>
	         </table>   
		</div>
	</div>
</div>

<div id="add_ad_modal" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Add Advertisement</h3>
  </div>
  <div class="modal-body">
  	<div class="row-fluid">
  		<form class="" id="add_ad_form">
    		<div class="span6">
	    		 <label>Name</label>
	    		 <input type="text" name="name">
	    		 <label>Source</label>
				 <select name="source">
					<option value="0">All</option>
					<option value="DIPR">DIPR</option>
                    <option value="DAVP">DAVP</option>
                    <option value="MES">MES</option>
                    <option value="NRHM">NRHM</option>
                    <option value="Other Govt">Other Govt</option>
                    <option value="Commercial">Commercial</option>
                    <option value="Classified">Classified</option>
				 </select>
				<label>Edition</label>
				<select name="edition">
					<option value="0">All</option>
                    <option value="Guwahati">Guwahati</option>
                    <option value="Dibrugarh">Dibrugarh</option>
				</select>
				 <label>Size</label>
	    		 <input type="number" name="size">
	    		 <label>Released Order</label>
	    		 <input type="text" name="ro_no">
    		</div>
			<div class="span6">
	    		 <label>Page No</label>
	    		 <input type="number" name="page_no">
	    		 <label>Type</label>
	    		 <input type="text" name="type">
	    		 <label>Amount</label>
	    		 <input type="text" name="amount">
	    		 <label>Referance</label>
	    		 <input type="text" name="ref">
			</div>
		</form>
	</div>
  </div>
  <div class="modal-footer">
  	<strong id="result"></strong>
    <a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
    <button class="btn btn-primary" id="save_ad_btn" onclick="save_ad();">Save</button>
  </div>
</div>

<script type="text/javascript">
window.onload = function() {
	$('#advertisement_li').addClass('active');
	get_filter_data();
};

function get_filter_data(){
	var formData = $('#filter_form').serializeArray();
	/*var source = formData[0]['value'];
	var location = formData[1]['value'];

	if(source == 0){
		alert('Select Source');
	}
	else if(location == 0){
		alert('Select Edition');
	}
	else{*/
		$('#data_table_head,#data_table_body').empty();
		$('#search_with_filter_btn').attr('disabled',true);
		$.ajax({
			type: 'POST',
			url: '<?php echo URL;?>employee_service/get_advertisement/',
			dataType: 'JSON',
			data: formData,
			success: function(resp){
				 $('#search_with_filter_btn').attr('disabled',false);
				 if(resp.length != 0){
					 $('#data_table_head').append('<tr><th>Name</th><th>Source</th><th>Edition</th><th>Page No</th><th>Size</th><th>Amount</th></tr>');
					 for(var i in resp){
					 	$('#data_table_body').append('<tr><td>'+resp[i].name+'</td><td>'+resp[i].source+'</td><td>'+resp[i].edition+'</td><td>'+resp[i].page_no+'</td><td>'+resp[i].size+'</td><td>'+resp[i].amount+'</td></tr>');
					 }
				 }
				 else{
					 $('#data_table_body').append('<tr class="alert alert-error"><td colspan="6">No Record Found</td></tr>');
				 }
			}
		});
	//}
}



function save_ad(){
	var formData = $('#add_ad_form').serialize();
	$('#save_ad_btn').attr('disabled', true);
	$.ajax({
		url: '<?php echo URL;?>employee_service/add_advertisement/',
		type: 'POST',
		dataType: 'JSON',
		data: formData,
		success: function(data){
			$('#result').addClass('alert-success pull-left').html('Saved Successfully');
			$('#add_ad_form').each(function(){this.reset();});
			 setTimeout(function(){
				 $('#add_ad_modal').modal('hide');
				 $('#save_ad_btn').attr('disabled', false);
				 get_filter_data();
            }, 2000);
		}
	});
}
</script>