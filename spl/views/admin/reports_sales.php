<div class="container-fluid">
	<h3>Sales Reports</h3>
	<div class="row-fluid">
		<div class="span2">
			<ul class="nav nav-pills nav-stacked">
				<li><a href="#"
					class="label label-success">Last 30 days Sales</a>
				</li>
				
			</ul>
		</div>
		<canvas class="span10" id="chart_div" width="800" height="400">
		</canvas>
	
	</div>
</div>
<script
	src="<?php echo URL;?>assets/apps/js/Chart.js"></script>
<script type="text/javascript">

var product_list = [];
$('#reports_li').addClass('active');
window.onload = function() {
	
var product = localStorage.getItem('product_list');
if(product==null || product==''){
	 get_short_code();
	  
}else{
   
	product_list =JSON.parse(product);
}
last_30days_sales();
};
function get_short_code(){
	$.ajax({
		url: '<?php echo URL;?>product/get_short_code/',
		type: 'GET',
		dataType: 'JSON',
		success: function(data) {
			product_list=data;
			localStorage.setItem('product_list', JSON.stringify(product_list));
			
		}
	});
}
$('#product_name').focus(function() {
	//console.log(return_list);
    $('#product_name').typeahead({
        source: product_list,
        itemSelected: function(resp){
            $('#product_id').val(resp);
        }
    });
});


function show_last_30days_sales(){
   
    $('#chart_div').show();
}

function last_30days_sales() {
	   $.ajax({
			url: '<?php echo URL;?>analytics/monthly_sales_report/',
			type: 'GET',
			dataType: 'JSON',
			success: function(resp) {
				var rowsx = [];
				var rowsy = [];
				for(var key in resp){
					var sales =parseInt(resp[key].total_sale)/100000;
					rowsx.push(resp[key].order_date);  
					rowsy.push(sales);  
				}
				var barChartData = {
						labels : rowsx,
						scaleLabel : "Title",
						datasets : [
							
							{
								fillColor : "rgba(151,187,205,0.5)",
								strokeColor : "rgba(151,187,205,1)",
								data : rowsy
							}
						]
						
					}
				 new Chart(document.getElementById("chart_div").getContext("2d")).Line(barChartData);
				
			}
		});
	   $('#chart_div').show();
}
</script>
