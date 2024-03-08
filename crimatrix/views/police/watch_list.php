<div class="container hidden-print">
	<div class="row-fluid">
		<div class="span2">
			<h4 class="input-large filter_h4"><strong>Watch List</strong></h4>	
		</div>
		<div class="span9 offset1">
			<div class="span4">
				<div class="input-append span10">
				  <input class="span12" id="appendedInputButton" type="text" id="search_textbox">
				  <button class="btn" type="button" title="seatch" id="search_btn"><i class="icon-search"></i>Search</button>
				</div>
			</div>
			<div class="span8" id="above_bar">
				<div class="btn-group pull-right">
				  <a href="#myModal" role="button" data-toggle="modal" class="btn btn-primary" title="Add"><i class="icon-plus icon-white"></i>Add</a>
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
					<option value="0">All</option>
					<option value="1">Vehcile Theft</option>
				</select>
				
				<label>City</label>
				<select id="city_id" name="city_id">
					<option value="0">All</option>
					<option value="1">Guwahati</option>
				</select>
				</form>
				<label></label>
				<input class="btn btn-primary " type="button" id="search_with_filter_btn" value="Search" onclick="get_watchlist_filter_data();">
		</div>
		<div class="span9 offset1">
			<div class="row-fluid" id="watchlist_div">
			</div>
		</div>
	</div>
</div>

<div class="modal hide fade" id="myModal">
	<form id="new_watchlist_form" action="<?php echo URL;?>police_service/new_watchlist" method="post"	enctype="application/x-www-form-urlencoded">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3>New Watchlist</h3>
		</div>
		<div class="modal-body">
			<div class="row-fluid">
				<div class="span12">
					<div class="span6">
						<div class="control">
							<input type="file" onchange="readURL(this);" name="afile" id="afile" accept="image/jpeg"> 
							<img id="photo"	style="margin-bottom: 50px;" class="img-polaroid" src="http://placehold.it/200x150">
						</div>
						<div class="control">
							<input type="text" name="name" placeholder="Name">
						</div>
						<div class="control">
							<input type="text" name="alias" placeholder="Alias name">
						</div>
					</div>
					<div class="span6">
						<div class="control">
							<input type="text" name="wanted_for" placeholder="Wanted For">
						</div>
						<div class="control">
							<input type="text" name="location" placeholder="Location">
						</div>
						<div class="control">
							<input type="text" name="mobile" placeholder="Mobile">
						</div>
						<div class="control">
							<input type="text" name="district" placeholder="District">
						</div>
						<div class="control">
							<input type="text" name="state" placeholder="State">
						</div>
						<div class="control">
							<input type="text" name="email" placeholder="Email">
						</div>
						<div class="control">
							<input type="text" name="id_type" placeholder="Id type">
						</div>
						<div class="control">
							<input type="text" name="id_no" placeholder="Id no">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn btn-danger" data-dismiss="modal" onclick="">Cancel</a>
			<input type="submit" class="btn btn-success" value="Save" data-dismiss="modal" onclick="return savewanted(this.form);">
		</div>
	</form>
</div>

<script type="text/javascript">
$('#watchlist_li').addClass('active');
window.onload = function() {
	var myDate = new Date();
	var currentDate = myDate.getFullYear() + '-' + (myDate.getMonth()+1) + '-' + myDate.getDate();
	$('#from_date,#to_date,#edit_crime_modal_date_of_occurence').datepicker({ dateFormat: "yy-mm-dd" });
	$("#to_date").val(currentDate);
	//get_watchlist_filter_data();
};

function get_watchlist_filter_data(){
	$('#watchlist_div').empty().html('<p class="loading_img"><img alt="loading" src="../assets/apps/img/loading.gif"/></p>');;
	var formDate = $('#filter_form').serialize();
	$.ajax({
		url: '<?php echo URL;?>crime_service/get_watchlist_data/',
		type: 'POST',
		dataType: 'JSON',
		success: function(data){
			$('#watchlist_div').empty();
			for(var i in data){
			$('#watchlist_div').append('<div class="card"><div class="inerCard">'
					+'<img src='+data[i].image_url+' width="200" height="220">'
					+'<div class="cardinfo"><h5>Name: '+data[i].name+'</h5>'
					+'<p><strong>Father Name: '+data[i].father_name+'<strong></p>'
					+'<a href="#" class="btn btn-danger btn-mini">details</a>'
					+'</div></div></div>');
			}
		}		
	});
}
/*
function savewanted(form){
	var formData = new FormData(form);
	console.log(formData);
	var xhr = new XMLHttpRequest();
	xhr.open('POST', form.action, true);
	var progressBar = document.querySelector('progress');
	xhr.upload.onprogress = function(e) {
		if (e.lengthComputable) {
			progressBar.value = (e.loaded / e.total) * 100;
			progressBar.textContent = progressBar.value; // Fallback for unsupported browsers.
		}
	};
	xhr.onload = function(e) {
		if (this.status == 200) {
			var resp = JSON.parse(this.response);
			console.log('Server got:', resp);
		};
	};
	xhr.send(formData);
	reset_form();
	return false; // Prevent page from submitting.
}

function readURL(input){
    if (input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#photo').attr('src', e.target.result).width(200).height(150);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function reset_form(){
	$('#new_watchlist_form').each(function(){this.reset();});
	$('#photo').attr('src','http://placehold.it/200x150');
}
*/
</script>