<?php include "../header.php" ?>


<div class="">
	<div class="subNav">
		<span class="subNavtext">VEHICLE THEFT</span>&nbsp;&nbsp;
	</div>
	<div class="container" style=" height: auto;">
		<div class="row">
		
			<small>Mouse over the bars for numbers.</small>
			<h3 class="alert">VEHICLES STOLEN FROM 2005 TO MARCH 2013</h3>
			<div class="col-md-9" id="chart_div_theft"></div>
			<div class="col-md-3">
				<br><br>
				<div class="panel panel-primary">
			        <div class="panel-heading">
			          <h3 class="panel-title">Most Stolen Vehicles</h3>
			        </div>
			        <div class="panel-body">
			          <p>2-wheeler<br><strong> Bajaj Pulsar</strong></p>
			          <p>4 wheeler<br><strong> Mahindra Bolero</strong></label>
			        </div>
			    </div>
			</div>
		</div>
		<div class="row">
			<h3 class="alert">VEHICLES RECOVERED FROM 2005 TO MARCH 2013</h3>
			<div class="col-md-9" id="chart_div_recover"></div>
			<div class="col-md-3">
			</div>		
		</div>
		<div class="row">
			<div class="col-md-12">
				<hr style=" margin-bottom: 5px; ">
				<small class="pull-right">visualization via <a target="_blank" href="http://crimatrix.com">crimatrix</a></small>
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
		$('#crime_nav').addClass('active');
		drawVisualization_theft();
		drawVisualization_recover();
	};
    
    function drawVisualization_theft() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Year', 'HMV', 'LMV', 'TWO WHEELER', 'TOTAL STOLEN'],
          ['2005',  5,   207,  364, 576],
          ['2006',  33,	 372,  833,	1238],
          ['2007',  35,	 388,  908	,1331],
          ['2008',  54,	 335,  698,	1087],
          ['2009',  29,  265,  492,	786],
          ['2010',  31,	247,   677,	955],
          ['2011',  44,	252,   636,	932],
          ['2012',  41,	237,   739,	1017],
          ['2013 (UP TO OCT)', 57, 182, 566, 805]
        ]);

        var options = {
          title : '',
          width: 800,
    	  height: 350,
          vAxis: {title: "Number of Vehicle"},
          hAxis: {title: "Year"},
          seriesType: "bars",
          series: {3: {type: "line"}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div_theft'));
        chart.draw(data, options);
      }
      google.setOnLoadCallback(drawVisualization);

      function drawVisualization_recover() {
          // Some raw data (not necessarily accurate)
          var data = google.visualization.arrayToDataTable([
            ['Year', 'HMV', 'LMV', 'TWO WHEELER', 'TOTAL RECOVERED'],
            ['2005',  4,   19,  22, 45],
            ['2006',  3,	 39,	45,	 87],
            ['2007',  12,	36,    43, 91],
            ['2008',  15,	 45,  51,	111],
            ['2009',  11,  18,	  59,	88],
            ['2010',  10,	34,	45,	89],
            ['2011',  0,	30,	26,	56],
            ['2012',  18,	51,	78,	147],
            ['2013 (UP TO OCT) ',  20,	30,	54,	104]
          ]);

          var options = {
            title : '',
          	width: 800,
    	    height: 350,
            vAxis: {title: "Number of Vehicle"},
            hAxis: {title: "Year"},
            seriesType: "bars",
            series: {3: {type: "line"}}
          };

          var chart = new google.visualization.ComboChart(document.getElementById('chart_div_recover'));
          chart.draw(data, options);
        }
        google.setOnLoadCallback(drawVisualization);
</script>
<?php include "../footer.php" ?>