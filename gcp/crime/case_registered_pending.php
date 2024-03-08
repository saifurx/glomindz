<?php include "../header.php" ?>


<div class="">
	<div class="subNav">
		<span class="subNavtext">CASES REGISTERED/PENDING</span>&nbsp;&nbsp;
	</div>
	<div class="container" style="height: auto;">
		<div class="row">
			<div class="col-md-12">
			<br>
				<small>Mouse over the bars for numbers.</small>
				<div id="chart_div_REG"></div>
				<div id="chart_div_UD"></div>
				<hr style="margin-bottom: 5px;">
				<small class="pull-right">visualization via <a target="_blank"
					href="http://crimatrix.com">Crimatrix</a>
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
	type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Police Station', 'Pending Cases', ],
          ['Chandmari', 1113 ],
          ['Noonmati',  779 ],
          ['Geetanagar',  276 ],
          ['Pragjyotishpur',  97  ],
          ['Satgaon',  244 ],
          ['Panbazar', 1049 ],
          ['Paltanbazar',  2541 ],
          ['All Women',  486 ],
          ['Latasil' , 812 ],
          ['Bharalumukh',  816 ],
          ['Jalukbari',  1574 ],
          ['Gorchuk',  338 ],
          ['Fatasil Ambari',  500 ],
          ['Azara',  330 ],
          ['North Guwahati', 45 ],
          ['Dispur',  7517  ],
          ['Hatigaon',  688 ],
          ['Basistha',  1271 ],
          ['Bhangagarh',  367 ],
          ['Khetri',  87 ],
          ['Sonapur',  212 ]
        ]);

        var options = {
          title: 'P.S. wise cases pending upto September 2013',
          width: 900,
    	  height: 550,
          vAxis: {title: 'Police Station'},
          colors: ['#de2407']
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div_UD'));
        chart.draw(data, options);
        var data = google.visualization.arrayToDataTable([
                                                          ['Police Station', 'Registered Cases', ],
                                                          ['Chandmari', 498 ],
                                                          ['Noonmati',  413 ],
                                                          ['Geetanagar',  24 ],
                                                          ['Pragjyotishpur',  116  ],
                                                          ['Satgaon',  201 ],
                                                          ['Panbazar', 291 ],
                                                          ['Paltanbazar',  882 ],
                                                          ['All Women',  177 ],
                                                          ['Latasil' , 270 ],
                                                          ['Bharalumukh',  400 ],
                                                          ['Jalukbari',  746 ],
                                                          ['Gorchuk',  356 ],
                                                          ['Fatasil Ambari',  656 ],
                                                          ['Azara',  317 ],
                                                          ['North Guwahati', 92 ],
                                                          ['Dispur',  2043  ],
                                                          ['Hatigaon',  362 ],
                                                          ['Basistha',  726 ],
                                                          ['Bhangagarh',  219 ],
                                                          ['Khetri',  146 ],
                                                          ['Sonapur',  305 ]
                                                        ]);
        
        var options = {
                title: 'P.S. wise cases registered between January and September 2013',
                width: 900,
          	  height: 550,
                vAxis: {title: 'Police Station'},
                colors: ['#3d74ff']
              };
        var chart = new google.visualization.BarChart(document.getElementById('chart_div_REG'));
        chart.draw(data, options);
      }
    </script>
<?php include "../footer.php" ?>