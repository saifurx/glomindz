<div class="">
	<div class="subNav">
		<span class="subNavtext">FINE COLLECTION DATA</span>&nbsp;&nbsp;
	</div>
	
	<hr style="border-top: transparent;">
	<div class="container" style=" height: auto;">
		<div class="row">
			
			
			<div class="col-md-12" id="div_5years_data">
				<div id="chart_div_last5year_total_case" style="width: 1000px; height: 450px; margin-top: 20px;"></div>
				<hr style=" margin-bottom: 5px; ">
				<small class="pull-right">Powered by <a target="_blank" href="http://crimatrix.com">Crimatrix</a></small>	
				
				<div id="chart_div_last5year_total_finecollection" style="width: 1000px; height: 450px; margin-top: 20px;"></div>
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
window.onload = function() {
	$('#traffic_nav').addClass('active');
	drawVisualization_total_case();
	drawVisualization_total_finecollection();
	drawVisualization_total_case_13();
	drawVisualization_total_finecollection_13();

};



function drawVisualization_total_case() {
    // Some raw data (not necessarily accurate)
    var data = google.visualization.arrayToDataTable([
      ['Year', 'No. of M.V Act cases detected',], //No of M.V Act cases detected red Total Fine Realized yellow 
      ['2009', 41338],
      ['2010', 97005],
      ['2011', 127660],
      ['2012', 171314],
      ['2013', 161636]
    ]);

    var options = {
      title : 'Number of M.V case detected in Guwahati City from 2009 to 2013',
      vAxis: {title: "Number of case detected"},
      hAxis: {title: "Year"},
      seriesType: "bars",
      colors: ['#de2407']
    };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_div_last5year_total_case'));
    chart.draw(data, options);
  }

function drawVisualization_total_finecollection() {
    // Some raw data (not necessarily accurate)
    var data = google.visualization.arrayToDataTable([
      ['Year', 'Total Fine Collection',], //No of M.V Act cases detected red Total Fine Realized yellow 
      ['2009', 10780850],
      ['2010', 22689100],
      ['2011', 25986200],
      ['2012', 31814900],
      ['2013', 28792400]
    ]);

    var options = {
      title : 'Amount of fine collected in Guwahati City from 2009 to 2013',
      vAxis: {title: "Amount of fine collected"},
      hAxis: {title: "Year"},
      seriesType: "bars",
     
    };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_div_last5year_total_finecollection'));
    chart.draw(data, options);
  }




	google.setOnLoadCallback(drawVisualization);

</script>