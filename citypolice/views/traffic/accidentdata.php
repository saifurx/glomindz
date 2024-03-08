<div class="">
	<div class="subNav">
		<span class="subNavtext">ACCIDENT DATA</span>&nbsp;&nbsp;
	</div>
	<hr style="border-top: transparent;">
	<div class="container" style=" height: auto;">
		<div class="row">
			<div class="col-md-12">
				<div class="btn-group btn-group-xs btn-group-justified">
			        <a onclick="show_chart_div(5);" href="#" class="btn btn-primary" id="a5y">Last 5 Years Data</a>
			        <a onclick="show_chart_div(13);" href="#" class="btn btn-default" id="y13">2013</a>
			        <a onclick="show_chart_div(12);" href="#" class="btn btn-default" id="y12">2012</a>
			        <a onclick="show_chart_div(11);" href="#" class="btn btn-default" id="y11">2011</a>
			        <a onclick="show_chart_div(10);" href="#" class="btn btn-default" id="y10">2010</a>
			        <a onclick="show_chart_div(09);" href="#" class="btn btn-default" id="y09">2009</a>
			    </div>
			</div>
			<div class="col-md-12" id="div_last5year">
				<div id="chart_div_last5year_total_accident" style="width: 1000px; height: 450px; margin-top: 20px;"></div>
				<hr style=" margin-bottom: 5px; ">
				<small class="pull-right">Powered by <a target="_blank" href="http://crimatrix.com">Crimatrix</a></small>
				
				<div id="chart_div_last5year_total_killed" style="width: 1000px; height: 450px; margin-top: 20px;"></div>
				<hr style=" margin-bottom: 5px; ">
				<small class="pull-right">Powered by <a target="_blank" href="http://crimatrix.com">Crimatrix</a></small>
				
			</div>
			 
			<div class="col-md-12" id="div_13">
				<div id="chart_div_13_total_accident" style="width: 1000px; height: 450px; margin-top: 20px;"></div>
				<hr style=" margin-bottom: 5px; ">
				<small class="pull-right">Powered by <a target="_blank" href="http://crimatrix.com">Crimatrix</a></small>
				
				<div id="chart_div_13_total_killed" style="width: 1000px; height: 450px; margin-top: 20px;"></div>
				<hr style=" margin-bottom: 5px; ">
				<small class="pull-right">Powered by <a target="_blank" href="http://crimatrix.com">Crimatrix</a></small>
			</div>
			
			
			
			<div class="col-md-12" id="div_12">
				<div id="chart_div_12_total_accident" style="width: 1000px; height: 450px; margin-top: 20px;"></div>
				<hr style=" margin-bottom: 5px; ">
				<small class="pull-right">Powered by <a target="_blank" href="http://crimatrix.com">Crimatrix</a></small>
				
				<div id="chart_div_12_total_killed" style="width: 1000px; height: 450px; margin-top: 20px;"></div>
				<hr style=" margin-bottom: 5px; ">
				<small class="pull-right">Powered by <a target="_blank" href="http://crimatrix.com">Crimatrix</a></small>
			</div>
			
			
			<div class="col-md-12" id="div_11">
				<div id="chart_div_11_total_accident" style="width: 1000px; height: 450px; margin-top: 20px;"></div>
				<hr style=" margin-bottom: 5px; ">
				<small class="pull-right">Powered by <a target="_blank" href="http://crimatrix.com">Crimatrix</a></small>
				
				<div id="chart_div_11_total_killed" style="width: 1000px; height: 450px; margin-top: 20px;"></div>
				<hr style=" margin-bottom: 5px; ">
				<small class="pull-right">Powered by <a target="_blank" href="http://crimatrix.com">Crimatrix</a></small>
			</div>
			
			
			<div class="col-md-12" id="div_10">
				<div id="chart_div_10_total_accident" style="width: 1000px; height: 450px; margin-top: 20px;"></div>
				<hr style=" margin-bottom: 5px; ">
				<small class="pull-right">Powered by <a target="_blank" href="http://crimatrix.com">Crimatrix</a></small>
				
				<div id="chart_div_10_total_killed" style="width: 1000px; height: 450px; margin-top: 20px;"></div>
				<hr style=" margin-bottom: 5px; ">
				<small class="pull-right">Powered by <a target="_blank" href="http://crimatrix.com">Crimatrix</a></small>
			</div>
			
			
			<div class="col-md-12" id="div_09">
				<div id="chart_div_09_total_accident" style="width: 1000px; height: 450px; margin-top: 20px;"></div>
				<hr style=" margin-bottom: 5px; ">
				<small class="pull-right">Powered by <a target="_blank" href="http://crimatrix.com">Crimatrix</a></small>
				
				<div id="chart_div_09_total_killed" style="width: 1000px; height: 450px; margin-top: 20px;"></div>
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
		$('#crime_nav').addClass('active');
		drawVisualization_total_accident();
		drawVisualization_total_killed();
	};

	function show_chart_div(div){
		if(div == 5){
			$('#a5y').removeClass('btn btn-default').addClass('btn btn-primary');
			$('#y13,#y12,#y11,#y10,#y09').removeClass('btn btn-primary').addClass('btn btn-default');
			
			$('#div_13,#div_12,#div_11,#div_10,#div_09').hide();
			$('#div_last5year').show();
			drawVisualization_total_accident_in_13();
			drawVisualization_total_killed_in_13();
		}
		if(div == 13){
			$('#y13').removeClass('btn btn-default').addClass('btn btn-primary');
			$('#a5y,#y12,#y11,#y10,#y09').removeClass('btn btn-primary').addClass('btn btn-default');
			
			$('#div_last5year,#div_12,#div_11,#div_10,#div_09').hide();
			$('#div_13').show();
			drawVisualization_total_accident_in_13();
			drawVisualization_total_killed_in_13();
		}
		if(div == 12){
			$('#y12').removeClass('btn btn-default').addClass('btn btn-primary');
			$('#a5y,#y13,#y11,#y10,#y09').removeClass('btn btn-primary').addClass('btn btn-default');

			$('#div_last5year,#div_13,#div_11,#div_10,#div_09').hide();
			$('#div_12').show();
			drawVisualization_total_accident_in_12();
			drawVisualization_total_killed_in_12();
		}
		if(div == 11){
			$('#y11').removeClass('btn btn-default').addClass('btn btn-primary');
			$('#a5y,#y13,#y12,#y10,#y09').removeClass('btn btn-primary').addClass('btn btn-default');
			
			$('#div_last5year,#div_13,#div_12,#div_10,#div_09').hide();
			$('#div_11').show();
			drawVisualization_total_accident_in_11();
			drawVisualization_total_killed_in_11();
		}
		if(div == 10){
			$('#y10').removeClass('btn btn-default').addClass('btn btn-primary');
			$('#a5y,#y13,#y12,#y11,#y09').removeClass('btn btn-primary').addClass('btn btn-default');
			
			$('#div_last5year,#div_13,#div_12,#div_11,#div_09').hide();
			$('#div_10').show();
			drawVisualization_total_accident_in_10();
			drawVisualization_total_killed_in_10();
		}
		if(div == 09){
			$('#y09').removeClass('btn btn-default').addClass('btn btn-primary');
			$('#a5y,#y13,#y12,#y11,#y10').removeClass('btn btn-primary').addClass('btn btn-default');
			
			$('#div_last5year,#div_13,#div_12,#div_11,#div_10').hide();
			$('#div_09').show();
			drawVisualization_total_accident_in_09();
			drawVisualization_total_killed_in_09();
		}
	}
	
    function drawVisualization_total_accident() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Non Fatal',  'Fatal', 'Total Cases'], //Fatal red Non Fatal yellow Total Blue
          ['2009', 475,  201, 676],
          ['2010', 665, 244, 909],
          ['2011', 806, 279, 1085],
          ['2012', 844, 234, 1078],
          ['2013', 522, 157, 679]
        ]);

        var options = {
          title : 'Road Accidents in Guwahati City from 2009 to 2013',
          vAxis: {title: "Number of Accident"},
          hAxis: {title: "Year"},
          seriesType: "bars",
          series: {2: {type: "line"}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div_last5year_total_accident'));
        chart.draw(data, options);
      }


    function drawVisualization_total_killed() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Person Injured', 'Person Killed'],
          ['2009', 675, 228],
          ['2010', 1103, 271],
          ['2011', 886, 296],
          ['2012', 1062, 246],
          ['2013', 666, 167]
        ]);

        var options = {
          title : 'Person Killed/Injured in Road Accidents in Guwahati City from 2009 to 2013',
          vAxis: {title: "Number of Person Killed/Injured"},
          hAxis: {title: "Year"},
          seriesType: "bars"
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div_last5year_total_killed'));
        chart.draw(data, options);
      }

    /*** new ***/
    
        function drawVisualization_total_accident_in_13() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Non Fatal', 'Fatal', 'Total Cases'], //Fatal red Non Fatal yellow Total Blue
          ['January', 83, 17, 100],
          ['February', 85, 16, 101],
          ['March', 69, 29, 98],
          ['April', 91, 24, 115],
          ['May', 69, 25, 94],
          ['June', 68,17, 85 ],
          ['July', 57, 29, 86]
         
        ]);

        var options = {
          title : 'Road Accidents in Guwahati City in the year 2013 (upto July)',
          vAxis: {title: "Number of Accident"},
          hAxis: {title: "Month"},
          seriesType: "bars",
          series: {2: {type: "line"}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div_13_total_accident'));
        chart.draw(data, options);
      }
    

        function drawVisualization_total_killed_in_13() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
              ['month', 'Person Injured', 'Person Killed'],
              ['January', 79, 19],
              ['February', 99, 16],
              ['March',  110, 30],
              ['April', 151, 24],
              ['May', 91, 29],
              ['June', 76, 18],
              ['July', 60, 31]
            ]);

            var options = {
              title : 'Person Killed/Injured in Road Accidents in Guwahati City in the year 2013 (upto July)',
              vAxis: {title: "Number of Person Killed/Injured"},
              hAxis: {title: "Month"},
              seriesType: "bars"
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_div_13_total_killed'));
            chart.draw(data, options);
          }



        function drawVisualization_total_accident_in_12() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
              ['Month','Non Fatal',  'Fatal', 'Total Cases'], //Fatal red Non Fatal yellow Total Blue
              ['Jan', 53, 18, 71],
              ['Feb', 73, 20, 93],
              ['Mar', 78, 27, 105],
              ['Apr', 75, 18, 93],
              ['May', 79, 13, 92],
              ['Jun', 65, 21, 86 ],
              ['Jul', 69, 12, 81],
              ['Aug', 58, 20, 78],
              ['Sep', 52, 24, 82],
              ['Oct', 71, 18, 89],
              ['Nov', 75, 18, 93 ],
              ['Dec', 90, 25, 115]
            ]);

            var options = {
              title : 'Road Accidents in Guwahati City  in the year 2012',
              vAxis: {title: "Number of Accident"},
              hAxis: {title: "Month"},
              seriesType: "bars",
              series: {2: {type: "line"}}
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_div_12_total_accident'));
            chart.draw(data, options);
          }
        

            function drawVisualization_total_killed_in_12() {
                // Some raw data (not necessarily accurate)
                var data = google.visualization.arrayToDataTable([
                  ['month', 'Person Injured', 'Person Killed'],
                  ['Jan', 86,  19],
                  ['Feb', 133, 22],
                  ['Mar', 79, 27],
                  ['Apr', 114, 20],
                  ['May', 100, 13],
                  ['Jun', 105, 13],
                  ['Jul', 64, 20],
                  ['Aug', 57, 26],
                  ['Sep', 64, 20],
                  ['Oct', 151, 24],
                  ['Nov', 77, 18],
                  ['Dec', 87, 25]
                ]);

                var options = {
                  title : 'Person Killed/Injured in Road Accidents in Guwahati City in the year 2012',
                  vAxis: {title: "Number of Person Killed/Injured"},
                  hAxis: {title: "Month"},
                  seriesType: "bars"
                };

                var chart = new google.visualization.ComboChart(document.getElementById('chart_div_12_total_killed'));
                chart.draw(data, options);
              }

          
            function drawVisualization_total_accident_in_11() {
                // Some raw data (not necessarily accurate)
                var data = google.visualization.arrayToDataTable([
                  ['Month', 'Non Fatal', 'Fatal', 'Total Cases'], //Fatal red Non Fatal yellow Total Blue
                  ['Jan', 55, 18, 73],
                  ['Feb', 70, 28, 98],
                  ['Mar', 68, 15, 83],
                  ['Apr', 62, 14, 76],
                  ['May', 57, 31, 88],
                  ['Jun', 61, 24, 85 ],
                  ['Jul', 69, 12, 81],
                  ['Aug', 73, 21, 94],
                  ['Sep', 62, 33, 95],
                  ['Oct', 68, 22, 90],
                  ['Nov', 80, 28, 108 ],
                  ['Dec', 88, 29, 106]
                 
                ]);

                var options = {
                  title : 'Road Accidents in Guwahati City  in the year 2011',
                  vAxis: {title: "Number of Accident"},
                  hAxis: {title: "Month"},
                  seriesType: "bars",
                  series: {2: {type: "line"}}
                };

                var chart = new google.visualization.ComboChart(document.getElementById('chart_div_11_total_accident'));
                chart.draw(data, options);
              }
            

                function drawVisualization_total_killed_in_11() {
                    // Some raw data (not necessarily accurate)
                    var data = google.visualization.arrayToDataTable([
                      ['month', 'Person Injured', 'Person Killed'],
                      ['Jan', 62, 20],
                      ['Feb', 76, 28],
                      ['Mar', 73, 16],
                      ['Apr', 71, 18],
                      ['May', 57, 31],
                      ['Jun', 55, 26],
                      ['Jul', 100, 22],
                      ['Aug', 69, 29],
                      ['Sep', 49, 35],
                      ['Oct', 69, 23],
                      ['Nov', 94, 29],
                      ['Dec', 111, 91]
                    ]);

                    var options = {
                      title : 'Person Killed/Injured in Road Accidents in Guwahati City in the year 2011',
                      vAxis: {title: "Number of Person Killed/Injured"},
                      hAxis: {title: "Month"},
                      seriesType: "bars"
                    };

                    var chart = new google.visualization.ComboChart(document.getElementById('chart_div_11_total_killed'));
                    chart.draw(data, options);
                  }
    	


                function drawVisualization_total_accident_in_10() {
                    // Some raw data (not necessarily accurate)
                    var data = google.visualization.arrayToDataTable([
                      ['Month', 'Non Fatal', 'Fatal', 'Total Cases'], //Fatal red Non Fatal yellow Total Blue
                      ['Jan', 46, 23, 69],
                      ['Feb', 53, 10, 63],
                      ['Mar', 58, 24, 82],
                      ['Apr', 40, 15, 55],
                      ['May', 67, 19, 86],
                      ['Jun', 61, 16, 77 ],
                      ['Jul', 46, 23, 69],
                      ['Aug', 70, 17, 87],
                      ['Sep', 53, 16, 69],
                      ['Oct', 62, 25, 87],
                      ['Nov', 49, 24, 73 ],
                      ['Dec', 64, 32, 96]
                    ]);

                    var options = {
                      title : 'Road Accidents in Guwahati City  in the year 2010',
                      vAxis: {title: "Number of Accident"},
                      hAxis: {title: "Month"},
                      seriesType: "bars",
                      series: {2: {type: "line"}}
                    };

                    var chart = new google.visualization.ComboChart(document.getElementById('chart_div_10_total_accident'));
                    chart.draw(data, options);
                  }
                

                    function drawVisualization_total_killed_in_10() {
                        // Some raw data (not necessarily accurate)
                        var data = google.visualization.arrayToDataTable([
                          ['month', 'Person Injured', 'Person Killed'],
                          ['Jan', 94, 28],
                          ['Feb', 87, 14],
                          ['Mar', 82, 27],
                          ['Apr', 48, 16],
                          ['May', 67, 19],
                          ['Jun', 115, 18],
                          ['Jul', 167, 25],
                          ['Aug', 76, 17],
                          ['Sep', 93, 19],
                          ['Oct', 92, 28],
                          ['Nov', 59, 25],
                          ['Dec', 108, 35]
                        ]);

                        var options = {
                          title : 'Person Killed/Injured in Road Accidents in Guwahati City in the year 2010',
                          vAxis: {title: "Number of Person Killed/Injured"},
                          hAxis: {title: "Month"},
                          seriesType: "bars"
                        };

                        var chart = new google.visualization.ComboChart(document.getElementById('chart_div_10_total_killed'));
                        chart.draw(data, options);
                      }



                    function drawVisualization_total_accident_in_09() {
                        // Some raw data (not necessarily accurate)
                        var data = google.visualization.arrayToDataTable([
                          ['Month', 'Non Fatal', 'Fatal', 'Total Cases'], //Fatal red Non Fatal yellow Total Blue
                          ['Jan', 42, 10, 52],
                          ['Feb', 31, 22, 53],
                          ['Mar', 48, 11, 59],
                          ['Apr', 34, 14, 48],
                          ['May', 42, 22, 64],
                          ['Jun', 36, 20, 56 ],
                          ['Jul', 37, 11, 48],
                          ['Aug', 48, 17, 65],
                          ['Sep', 39, 23, 62],
                          ['Oct', 47, 18, 65],
                          ['Nov', 34, 18, 52 ],
                          ['Dec', 37, 15, 52]
                        ]);

                        var options = {
                          title : 'Road Accidents in Guwahati City  in the year 2009',
                          vAxis: {title: "Number of Accident"},
                          hAxis: {title: "Month"},
                          seriesType: "bars",
                          series: {2: {type: "line"}}
                        };

                        var chart = new google.visualization.ComboChart(document.getElementById('chart_div_09_total_accident'));
                        chart.draw(data, options);
                      }
                    

                        function drawVisualization_total_killed_in_09() {
                            // Some raw data (not necessarily accurate)
                            var data = google.visualization.arrayToDataTable([
                              ['month', 'Person Injured', 'Person Killed'],
                              ['Jan', 42, 11],
                              ['Feb', 86, 26],
                              ['Mar', 43, 11],
                              ['Apr', 37, 15],
                              ['May', 48, 26],
                              ['Jun', 81, 20],
                              ['Jul', 45, 11],
                              ['Aug', 65, 17],
                              ['Sep', 39, 24],
                              ['Oct', 73, 32],
                              ['Nov', 79, 19],
                              ['Dec', 37, 16]
                            ]);

                            var options = {
                              title : 'Person Killed/Injured in Road Accidents in Guwahati City in the year 2009',
                              vAxis: {title: "Number of Person Killed/Injured"},
                              hAxis: {title: "Month"},
                              seriesType: "bars"
                            };

                            var chart = new google.visualization.ComboChart(document.getElementById('chart_div_09_total_killed'));
                            chart.draw(data, options);
                          }
                
      google.setOnLoadCallback(drawVisualization);
</script>