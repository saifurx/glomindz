<div class="container-fluid">
	<div class="row-fluid">
		<h3 class="span3 pull-left">Client Payments</h3>
		<div class="input-append span5 pull-right">
			  <input id="customer_name" autocomplete="off" class="span10" id="appendedInputButton" type="text" placeholder="Search Client Name">
			  <input type="hidden" id="customer_id">
			  <button class="btn btn-info" type="button">Search</button>
		</div>
		
	</div>
	<hr>
	<section>
		<div class="row-fluid">
		
		</div>
	</section>

</div>
<script type="text/javascript">

$(document).ready(function(){
	get_all_client();
});

var clients = [];
function get_all_client(){
	$.ajax({
		  url: '<?php echo URL;?>clients/get_all_client/',
		  type:'GET',
		  dataType: 'JSON',
		  success: function(resp){
			  clients = resp;		 
		  }
	});
}

$('#customer_name').focus(function() {
    $('#customer_name').typeahead({
        source: clients,
        itemSelected: function(resp){
            $('#customer_id').val(resp);
        }
    });
});
</script>
