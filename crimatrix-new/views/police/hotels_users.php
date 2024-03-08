<div id="wrap">	
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<span class="titleText">Registerd Hotels & Lodges</span>
			</div>
			<div class="col-md-2">
			    <select class="selectCity form-control"></select>
			</div>	
			<div class="col-md-2">
			    <select class="selectPs form-control" onchange="getAllHotelUser(this.value,0);"></select>
			</div>
			<div class="col-md-4">
				<input class="form-control"  type="search" id="search" placeholder="Filter by Name ">
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
		                    <th>Contact Person</th>
		                    <th>Email</th>
		                    <th>Police Station</th>
		                    <th>Mobile</th>
		                    <th>Location</th>
		                    <th>Aprove</th>
		                    <th>Reset</th>
		                    <th>Edit</th>
	                	</tr>
					</thead>
					<tbody id="hotel_users_tb">
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Modal Edit User -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header cm-modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit Hotel User</h4>
      </div>
      <div class="modal-body row">
	      <form role="form" id="edit_hotel_user_form" class="form-horizontal">
	      	<div class="col-md-6">
	      		<input id="editID" type="hidden" name="user_id"> 
			    <label class="normal_lable">Name <span id="edit_requiredNamespan" class="errorText">* required valid input</span></label>
			    <input id="editName" class="form-control" type="text" name="name" required="required">
			 	<label class="normal_lable">Contact Person</label>
	  			<input id="editContactPerson" class="form-control" type="text" name="contact_person">
			 	<label class="normal_lable">Email <span id="edit_requiredEmailspan" class="errorText">* required valid input</span></label>
		  		<input id="editEmail" class="form-control" type="email" name="email" required="required">
		  		<label class="normal_lable">Mobile <span id="edit_requiredMobilespan" class="errorText">* required valid input</span></label>
		  		<input id="editMobile" class="form-control" type="text" name="mobile" required="required" maxlength="10">
		  		<label class="normal_lable">City</label>
	  			<select id="editCity" class="selectCity form-control" name="city_id"></select>
	  			<label class="normal_lable">Police Station</label>
	  			<select id="editPs" class="selectPs form-control" name="ps_id"></select>
		  	</div>
		  	<div class="col-md-6">	
	  			<label class="normal_lable">No of Rooms</label>
	  			<input id="editNoOfRooms" class="form-control" type="number" name="no_of_rooms">
	  			<label class="normal_lable">Licence No</label>
	  			<input id="editLicenceNo" class="form-control" type="text" name="licence_no">
	  			<label class="normal_lable">Locality</label>
	  			<input id="editLocality" class="form-control" type="text" name="locality">
	  			<label class="normal_lable">Pin</label>
	  			<input id="editPin" class="form-control" type="text" name="pin">
	  			<label class="normal_lable">Address</label>
	  			<textarea id="editAddress"  rows="4" cols="" class="form-control" name="address"></textarea>
			</div>
		</form>
      </div>
      <div class="modal-footer cm-modal-footer">
      	<span class="pull-left"></span>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="updateUserDetails_btn" onclick="updateUserDetails();">Update</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
	window.onload = function() {
		$('#setting_li').addClass('active');
		get_cities();
		get_policeStations();
		getAllHotelUser(0,0);
	};
	function get_cities(){
		$.ajax({
			url: '<?php echo URL;?>user_service/get_cities/',
			type: 'GET',
			dataType: 'JSON',
			success: function(data){
				for(var i in data){
					$('.selectCity').append('<option value='+data[i].id+'>'+data[i].name+'</option>')
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
					$('.selectPs').append('<option value='+data[i].id+'>'+data[i].name+'</option>')
				}
			}		
		});
	}

	function getAllHotelUser(ps_id,search){
		$.ajax({
			url: '<?php echo URL;?>police_service/getAllHotelUser/',
			type: 'POST',
			dataType: 'JSON',
			data: {ps_id:ps_id,search:search},
			success: function(data){
				$('#hotel_users_tb').empty();
				var count = 1;
				for(var i in data){
					var resetpasswd = '<td><a class="resetpasswd label label-danger" id=reset_'+data[i].id+' href="#" title="Click to Reset Password">Reset</a></td>';
					var edit = '<td ><a class="edituser label label-info" id=edit_'+data[i].id+' href="#" title="Click to Edit">Edit</a></td>';

					var status = '<td></td>';
                    if (data[i].status == 0) {
                    	status = '<td ><a class="web_is_disable label label-default" id="web_'+data[i].id+'" href="#" title="Click to Enable" >Disabled</a></td>';
                    }
                    else {
                    	status = '<td ><a class="web_is_enable label label-success" id="web_'+data[i].id+'" href="#" title="Click to Disable" >Enabled</a></td>';
                    }
					var row = '<tr id="row_'+data[i].id+'">'
	                    +'<td>'+count+'</td>'
	                    +'<td style="display:none;" class="user_id">'+data[i].id+'</td>'
	                    +'<td class="name">'+data[i].name+'</td>'
	                    +'<td class="contact_person">'+data[i].contact_person+'</td>'
	                    +'<td class="email">'+data[i].email+'</td>'
	                    +'<td class="ps_name">'+data[i].ps_name+'</td>'
	                    +'<td class="mobile">'+data[i].mobile+'</td>'
	                    +'<td class="location">'+data[i].locality+'</td>'+status+resetpasswd+edit+'</tr>';
					$('#hotel_users_tb').append(row);
					count = count + 1; 
				}
			}		
		});
	}


	//Aprove user enable-disable
    $("#hotel_users_tb").on("click", ".web_is_disable", function() {
    	var user_id = $(this).closest("tr").find(".user_id").text();
    	var name = $(this).closest("tr").find(".name").text();
        var email = $(this).closest("tr").find(".email").text();
        var user_type = 'hotel';
        var status = 1;
        $(this).html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-spinner fa-spin fa-lg"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
        approve_web_user(user_id, name, email, user_type, status);
    });

    $("#hotel_users_tb").on("click", ".web_is_enable", function() {
    	var user_id = $(this).closest("tr").find(".user_id").text();
    	var name = $(this).closest("tr").find(".name").text();
        var email = $(this).closest("tr").find(".email").text();
        var user_type = 'hotel';
        var status = 0;
        $(this).html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-spinner fa-spin fa-lg"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
        approve_web_user(user_id, name, email, user_type, status);
    });

    function approve_web_user(user_id, name, email, user_type, status) {
        $.ajax({
            url: '<?php echo URL; ?>police_service/change_account_status/',
            type: 'POST',
            dataType: 'JSON',
            data: {'user_id': user_id, 'name': name, 'email': email, 'user_type': user_type, 'status': status},
            success: function(data) {
                if (data == 0) {
                	$('#web_'+user_id).removeClass('web_is_enable label label-success').addClass('web_is_disable label label-default').attr('title','Click to Enable').html('Disabled');
                }
                else {
                	$('#web_'+user_id).removeClass('web_is_disable label label-default').addClass('web_is_enable label label-success').attr('title','Click to Disable').html('Enabled');
                }
            }
        });
    }

    //reset 
	$("#hotel_users_tb").on("click", ".resetpasswd", function() {
		var user_id = $(this).closest("tr").find(".user_id").text();
    	var name = $(this).closest("tr").find(".name").text();
        var email = $(this).closest("tr").find(".email").text();
        var mobile = $(this).closest("tr").find(".mobile").text();
        var user_type = 'hotel';
        $(this).html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-spinner fa-spin fa-lg"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
		reset_passwd(user_id, name, email, mobile, user_type);
	});

	function reset_passwd(user_id, name, email, mobile, user_type) {
		$.ajax({
			url: '<?php echo URL; ?>police_service/reset_password/',
			type: 'POST',
			dataType: 'JSON',
			data: {user_id: user_id, name: name, email: email,  mobile: mobile, user_type: user_type},
			success: function(data) {
				$('#reset_'+user_id).html('Reset');
			}
		});
	}
	
	//edit
	$("#hotel_users_tb").on("click", ".edituser", function(){
		var user_id = $(this).closest("tr").find(".user_id").text();
		var user_type = 'hotel';
		$(this).html('&nbsp;<i class="fa fa-spinner fa-spin fa-lg"></i>&nbsp;');
		$.ajax({
			url: '<?php echo URL; ?>police_service/get_user_details/',
			type: 'POST',
			dataType: 'JSON',
			data: {user_id: user_id, user_type: user_type},
			success: function(data) {
				//console.log(data);
				$('#editID').val(user_id);
				$('#editName').val(data[0].name);
				$('#editEmail').val(data[0].email);
				$('#editMobile').val(data[0].mobile);
				$('#editPin').val(data[0].pin);
				$('#editCity').val(data[0].city_id);
				$('#editPs').val(data[0].ps_id);
				$('#editContactPerson').val(data[0].contact_person);
				$('#editLocality').val(data[0].locality);
				$('#editNoOfRooms').val(data[0].no_of_rooms);
				$('#editLicenceNo').val(data[0].licence_no);
				$('#editAddress').val(data[0].address);
				$('#edit_'+user_id).html('Edit');
				$('#editUserModal').modal('show');
			}
		});
	});

	function updateUserDetails(){
		var formData = $('form#edit_hotel_user_form').serializeArray();
		var validName = alphanumericValidate(formData[1].value);
		var validEmail = emailValidate(formData[3].value);
		var validMobile = mobileValidate(formData[4].value);
		var user_id = formData[0].value;
		
		if(validName == false){$('#edit_requiredNamespan').show();}else{$('#edit_requiredNamespan').hide();}
		if(validEmail == false){$('#edit_requiredEmailspan').show();}else{$('#edit_requiredEmailspan').hide();}
		if(validMobile == false){$('#edit_requiredMobilespan').show();}else{$('#edit_requiredMobilespan').hide();}
		if(validName == true && validEmail == true && validMobile == true){
			$('#edit_requiredNamespan,#edit_requiredEmailspan,#edit_requiredMobilespan').hide();
			$('#updateUserDetails_btn').attr('disabled',true).html('<i class="fa fa-refresh fa-spin"></i>');
			$.ajax({
				url: '<?php echo URL; ?>police_service/update_hotel_user_details/',
				type: 'POST',
				dataType: 'JSON',
				data: formData,
				success: function(data) {
					if(data == 1){
						$('#row_'+user_id).find('.name').text(formData[1].value);
						$('#row_'+user_id).find('.email').text(formData[3].value);
						$('#row_'+user_id).find('.mobile').text(formData[4].value);
						$('#row_'+user_id).find('.contact_person').text(formData[2].value);
						$('#row_'+user_id).find('.location').text(formData[10].value);
						$('#row_'+user_id).find('.ps_name').text($('#editPs').find(":selected").text());
						$('#editUserModal').modal('hide');
						$('#row_'+user_id).addClass('alert-success');
						setTimeout(function(){
							$('#row_'+user_id).removeClass('alert-success');
					    }, 2500);
						$('#updateUserDetails_btn').attr('disabled',false).html('Update');
						$('form#edit_hotel_user_form').each(function(){this.reset();});
					}
					else{
						$('#editUserModal').modal('hide');
						$('#row_'+user_id).addClass('alert-danger');
						setTimeout(function(){
							$('#row_'+user_id).removeClass('alert-danger');
					    }, 2500);
						$('#updateUserDetails_btn').attr('disabled',false).html('Update');
					}
				}
			});
		}
	}
	//Quick Table Search

	$('#search').keyup(function() {
	  var regex = new RegExp($('#search').val(), "i");
	  var rows = $('table tbody#hotel_users_tb tr:gt(0)');
	  rows.each(function (index) {
	    title = $(this).children(".name, .email").html()
	    if (title.search(regex) != -1) {
	      $(this).show();
	    } else {
	      $(this).hide();
	    }
	  });
	});

</script>