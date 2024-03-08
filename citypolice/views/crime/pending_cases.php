<div class="">
	<div class="subNav">
		<span class="subNavtext">UNNATURAL DEATH CASES</span>&nbsp;&nbsp;
	</div>
	<div class="container" style=" height: auto;">
		<div class="row">
			<div class="col-md-12">
				<div id="chart_div_UD" style="width: 1200px; height: 650px;"></div>
				<hr style=" margin-bottom: 5px; ">
				<small class="pull-right">Powered by <a target="_blank" href="http://crimatrix.com">Crimatrix</a></small>
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


 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Police Station', 'Pending Cases', ],
          ['Noonmati',  82      ],
          ['Chandmari',  58      ],
          ['Satgaon',  5       ],
          ['Pragjyotishpur',  3      ],
          ['Geetanagar',  32      ],
          ['Latasil' , 25      ],
          ['Panbazar',  61       ],
          ['Paltanbazar',  360      ],
          ['All Women',  0      ],
          ['Bharalumukh',  89      ],
          ['Jalukbari',  242       ],
          ['Fatasil Ambari',  56      ],
          ['Gorchuk',  0      ],
          ['North Guwahati',  2      ],
          ['Azara',  68       ],
          ['Dispur',  69      ],
          ['Bhangagarh',  216      ],
          ['Hatigaon',  0      ],
          ['Basistha',  171      ],
          ['Sonapur',  29       ],
          ['Khetri',  23      ]
        ]);

        var options = {
          title: 'Pending Cases of Unnatural Death  upto January 2013',
          vAxis: {title: 'Police Station'},
          colors: ['#de2407']
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div_UD'));
        chart.draw(data, options);
      }
    </script>