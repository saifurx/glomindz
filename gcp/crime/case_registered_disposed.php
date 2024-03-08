<?php include "../header.php" ?>


<div class="">
	<div class="subNav">
		<span class="subNavtext">CASES REGISTERED/DISPOSED</span>&nbsp;&nbsp;
	</div>

	<div class="container" style="height: auto;">

		<div class="row">
			<div class="col-md-12">
			<br>
				<small>Mouse over the bars for numbers.</small>
				<h3 class="alert">MONTH WISE CASE REGISTERED AND DISPOSED IN 2013</h3>
				<div id="chart_div_reg_dis_current"></div>
				<h3 class="alert">YEAR WISE CASE REGISTERED AND DISPOSED FROM 2004 TO
					2012</h3>
				<div id="chart_div_reg_dis"></div>
				<hr style="margin-bottom: 5px;">
				<small class="pull-right">visualization via <a target="_blank"
					href="http://crimatrix.com">crimatrix</a>
				</small>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
<!--
window.onload = function() {
	$('#crime_nav').addClass('active');
	
};
//-->
</script>


<script
	type="text/javascript" src="//www.google.com/jsapi"></script>
<script type="text/javascript">
      google.load('visualization', '1', {packages: ['corechart']});
      function drawVisualization() {
              // Some raw data (not necessarily accurate)
              var data = google.visualization.arrayToDataTable([
                ['Month', 'REGISTERED','DISPOSED'],
                ['Jan',  939,815],
                ['Feb',  886,699],
                ['Mar',  1101,1160],
                ['Apr',  1067,954],
                ['May',  1010,947],
                ['Jun',  1058,955],
                ['July',  1124,808],
                ['Aug',  1118,987],
                ['Sep', 1122,968]
              ]);
              
              var options = {
                title : '',
                width: 800,
          	  	height: 350,
                vAxis: {title: "Number of Case"},
                hAxis: {title: "Month"},
                seriesType: "bars",
                colors: ['#e0440e','#3d74ff']
              };
      
              var chart = new google.visualization.ComboChart(document.getElementById('chart_div_reg_dis_current'));
              chart.draw(data, options);
              var data = google.visualization.arrayToDataTable([
                                                                ['Year', 'REGISTERED','DISPOSED'],
                                                                ['2004',  4830,2287],
                                                                ['2005',  5599,5233],
                                                                ['2006',  5896,4585],
                                                                ['2007',  6337,5475],
                                                                ['2008',  7444,5593],
                                                                ['2009',  7254,6026],
                                                                ['2010',  9371,7240],
                                                                ['2011',  10946,7996],
                                                                ['2012', 11490,10833]
                                                              ]);
                                                              
                                                              var options = {
                                                                title : '',
                                                                width: 800,
                                                          	  	height: 350,
                                                                vAxis: {title: "Number of Case"},
                                                                hAxis: {title: "Year"},
                                                                seriesType: "bars",
                                                                colors: ['#e0440e','#3d74ff']
                                                              };
                                                      
                                                              var chart = new google.visualization.ComboChart(document.getElementById('chart_div_reg_dis'));
                                                              chart.draw(data, options);
      }
      
      google.setOnLoadCallback(drawVisualization);
    </script>
<?php include "../footer.php" ?>