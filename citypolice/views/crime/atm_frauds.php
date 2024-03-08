<div class="">
	<div class="subNav">
		<span class="subNavtext">ATM & BANK FRAUD</span>
	</div>
	<div class="container" style=" height: auto;">
		<div class="row">
			<br><br>
			<div class="col-md-6">
				<div id="chart_div_total_fraud" style="width: 600px; height: 350px; margin-top: 20px;"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<hr style=" margin-bottom: 5px; ">
				<small class="pull-right">Powered by <a target="_blank" href="http://crimatrix.com">Crimatrix</a></small>
				
			</div>	
		</div>
	</div>
</div>
<script type="text/javascript" src="//www.google.com/jsapi"></script>
<script type="text/javascript">
     google.load('visualization', '1', {packages: ['corechart']});
</script>
<script type="text/javascript">
	function drawVisualization() {
	  // Create and populate the data table.
	  var data = google.visualization.arrayToDataTable([
	    ['Year', 'Totals No. of frauds'],
	    ['2009', 47],
	    ['2010', 59],
	    ['2011', 58],
	    ['2012', 92]
	  ]);

	  // Create and draw the visualization.
	  new google.visualization.ColumnChart(document.getElementById('chart_div_total_fraud')).
	      draw(data,
	           {title:"TOTAL ATM & BANK FRAUD FROM 2009 TO 2012",
	    	  	width: 600,
	    	    height: 350,
	            hAxis: {title: "Year"}}
	      );
	}
	google.setOnLoadCallback(drawVisualization);
</script>