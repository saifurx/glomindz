<style type="text/css">
    .errorText {
    	color: #cc0000;
    }
</style>
<div id="wrap">	
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				<span class="titleText">SMS User</span>
			</div>
			<div class="col-md-2">
			    <select class="selectCity form-control">
				</select>
			</div>	
			<div class="col-md-2">
			    <select class="selectPs form-control" onchange="getAllSMSUser(this.value,0);">
				</select>
			</div>
			
			<div class="col-md-4">
				<input class="form-control"  type="search" id="search" placeholder="Filter by Name ">
			</div>
			<div class="col-md-2">
			  	<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#createSMSUserModal">
				  Create SMS User
				</button>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered table-condensed">
					<thead>
						<tr class="cm-modal-header">
		                    <th>Sl. no</th>
		                    <th>Name</th>
		                    <th>Designation</th>
		                    <th>City</th>
		                    <th>Police Station</th>
		                    <th>Mobile</th>
		                    <th>Status</th>
		                    <th>Edit</th>
	                	</tr>
					</thead>
					<tbody id="sms_users_tb">
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="createSMSUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header cm-modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Create SMS User</h4>
      </div>
      <div class="modal-body row">
      	<form action="" id="create_sms_user_form">
	      <div class="col-md-6">	
	      	<label class="normal_lable">Name <span id="requiredNamespan" class="errorText">* required valid input</span></label>
			<input class="form-control" type="text" name="name" required="required">
			<label class="normal_lable">Mobile <span id="requiredMobilespan" class="errorText">* required valid input</span></label>
			<input class="form-control" type="text" name="mobile" required="required" maxlength="10">
			<label class="normal_lable">Designation</label>
		  	<input class="form-control" type="text" name="designation">
		  </div>	
		  <div class="col-md-6">
		  	<label class="normal_lable">City</label>
		  	<select class="selectCity form-control" name="city_id">
		  	</select>
		  	<label class="normal_lable">Police Station</label>
		  	<select class="selectPs form-control" name="ps_id"></select>
		  </div>
		</form> 
      </div>
      <div class="modal-footer cm-modal-footer">
      	<span id="result" class="pull-left"></span>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="createSMSPoliceUser_btn" onclick="save_sms_user();">Create</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	window.onload = function() {
		$('#setting_li').addClass('active');
		get_cities();
		get_policeStations();
		getAllSMSUser(0);
	};
	function get_cities(){
		$.ajax({
			url: '<?php echo URL;?>user_service/get_cities/',
			type: 'GET',
			dataType: 'JSON',
			success: function(data){
				for(var i in data){
					$('.selectCity').append('<option value='+data[i].id+'>'+data[i].name+'</option>');
				}
			}		
		});
	}
	
	function get_policeStations(){
		$.ajax({
			url: '<?php echo URL;?>user_service/get_policeStations/',
			type: 'GET',
			dataType: 'JSON',
			success: function(data){
				for(var i in data){
					$('.selectPs').append('<option value='+data[i].id+'>'+data[i].name+'</option>');
				}
			}		
		});
	}

	function save_sms_user(){
		var formData = $('form#create_sms_user_form').serializeArray();
		console.log(formData);
		
		var validName = alphanumericValidate(formData[0].value);
		var validMobile = mobileValidate(formData[1].value);

		if(validName == false){$('#requiredNamespan').show();}else{$('#requiredNamespan').hide();}
		if(validMobile == false){$('#requiredMobilespan').show();}else{$('#requiredMobilespan').hide();}
		if(validName == true && validMobile == true){
			$('#createSMSPoliceUser_btn').attr('disabled',true).html('<i class="fa fa-refresh fa-spin"></i>');
			$('#requiredNamespan,#requiredMobilespan').hide();

			$.ajax({
				url: '<?php echo URL;?>police_service/createSMSUser/',
				type: 'POST',
				dataType: 'JSON',
				data: formData,
				success: function(resp){
					$('form#create_sms_user_form').each(function(){this.reset();});
					$('#createSMSPoliceUser_btn').attr('disabled',false).html('Create');
					getAllSMSUser(0);
					if(resp == 1){
						$('#result').html('<h4 class="successText">Successfully Created</h4>'); 
					}
					if(resp == 0){
						$('#result').html('<h4 class="errorText">Already Registered!</h4>');
					}
					setTimeout(function(){
						$('#createSMSUserModal').modal('hide');
						$('#result').html('');
					},2000);
				}		
			});
		}
	}

	function getAllSMSUser(ps_id){
		$.ajax({
			url: '<?php echo URL;?>police_service/getAllSMSUser/',
			type: 'POST',
			dataType: 'JSON',
			data: {ps_id: ps_id},
			success: function(data){
				$('#sms_users_tb').empty();
				console.log(data);
				var count = 1;
				for(var i in data){
					var edit = '<td ><a class="edituser label label-info" id=edit_'+data[i].id+' href="#" title="Click to Edit">Edit</a></td>';

					var status = '<td></td>';
                    if (data[i].status == 0) {
                    	status = '<td ><a class="sms_is_disable label label-default" id="sms_'+data[i].id+'" href="#" title="Click to Enable" >Disabled</a></td>';
                    }
                    else {
                    	status = '<td ><a class="sms_is_enable label label-success" id="sms_'+data[i].id+'" href="#" title="Click to Disable" >Enabled</a></td>';
                    }
					var row = '<tr id="row_'+data[i].id+'">'
                    +'<td>'+count+'</td>'
                    +'<td style="display:none;" class="user_id">'+data[i].id+'</td>'
                    +'<td class="name">'+data[i].name+'</td>'
                    +'<td class="designation">'+data[i].designation+'</td>'
                    +'<td class="ps_name">'+data[i].city_name+'</td>'
                    +'<td class="ps_name">'+data[i].ps_name+'</td>'
                    +'<td class="mobile">'+data[i].mobile+'</td>'+status+edit+'</tr>';

					$('#sms_users_tb').append(row);
					count = count + 1; 
				}
			}		
		});
	}


	//web-user enable-disable
    $("#sms_users_tb").on("click", ".sms_is_disable", function() {
    	var user_id = $(this).closest("tr").find(".user_id").text();
    	var name = $(this).closest("tr").find(".name").text();
        var mobile = $(this).closest("tr").find(".mobile").text();
        var user_type = 'police';
        var status = 1;
        $(this).html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-spinner fa-spin fa-lg"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
        approve_sms_user(user_id, name, mobile, user_type, status);
    });

    $("#sms_users_tb").on("click", ".sms_is_enable", function() {
    	var user_id = $(this).closest("tr").find(".user_id").text();
    	var name = $(this).closest("tr").find(".name").text();
    	var mobile = $(this).closest("tr").find(".mobile").text();
        var user_type = 'police';
        var status = 0;
        $(this).html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-spinner fa-spin fa-lg"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
        approve_sms_user(user_id, name, mobile, user_type, status);
    });

    function approve_sms_user(user_id, name, mobile, user_type, status) {
        $.ajax({
            url: '<?php echo URL; ?>police_service/approve_sms_user/',
            type: 'POST',
            dataType: 'JSON',
            data: {'user_id': user_id, 'name': name, 'mobile': mobile, 'user_type': user_type, 'status': status},
            success: function(data) {
                if (data == 0) {
                	$('#sms_'+user_id).removeClass('sms_is_enable label label-success').addClass('sms_is_disable label label-default').attr('title','Click to Enable').html('Disabled');
                }
                else {
                	$('#sms_'+user_id).removeClass('sms_is_disable label label-default').addClass('sms_is_enable label label-success').attr('title','Click to Disable').html('Enabled');
                }
            }
        });
    }

    
	$('#search').keyup(function() {
		  var regex = new RegExp($('#search').val(), "i");
		  var rows = $('table tbody#sms_users_tb tr:gt(0)');
		  rows.each(function (index) {
		    title = $(this).children(".name").html()
		    if (title.search(regex) != -1) {
		      $(this).show();
		    } else {
		      $(this).hide();
		    }
		  });
		});
		
</script>	