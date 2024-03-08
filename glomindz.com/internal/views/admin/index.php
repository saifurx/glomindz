<script	type="text/javascript" src="<?php echo URL;?>assets/apps/js/Chart.js"></script>
<div class="container-fluid">
	<div class="row-fluid">
		<h3>Dashboard</h3>
	</div>
	<hr>
	<div class="row-fluid">
		<div class="span2"></div>
		<canvas class="span10" id="chart_div" width="800" height="400">
		
		</canvas>
	</div>
	
</div>

<script type="text/javascript">
window.onload = function() {
	//$('#chart_div').show();
	//burntdown_chart();
};	

function burntdown_chart() {
	   $.ajax({
			url: '<?php echo URL;?>analytics/burntdown_chart/',
			type: 'GET',
			dataType: 'JSON',
			success: function(resp) {
				var rowsx = [];
				var rowsy = [];
				for(var key in resp){
					rowsx.push(resp[key].task);  
					rowsy.push(resp[key].time_took);  
				}
				var barChartData = {
						labels : rowsx,
						scaleLabel : "BurntdownChart",
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
