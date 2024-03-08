<?php include "../header.php" ?>


<div class="">
	<div class="subNav">
		<span class="subNavtext">NON BANKING AND CHEAT FUND CASES</span>&nbsp;&nbsp;
	</div><br>
	<div class="container" style=" height: auto;">
		<div class="row-fluid ">
			<div class="col-md-12">
				<div class="col-md-4"><strong>JEEVAN SURAKSHYA: 11 cases</strong><iframe width="320" height="215" src="//www.youtube.com/embed/E2rVXdnDjK8" frameborder="0" allowfullscreen></iframe>
				<hr>
				<strong>Related News:</strong><br><a target="_blank"  href="http://www.telegraphindia.com/1130516/jsp/northeast/story_16902971.jsp#.UmkNFHASaSp">Jeevan Suraksha boss, wife held</a>
				</div>
				
				<div class="col-md-4 "><strong>UNIPAY2U: 8 cases</strong><iframe width="320" height="215" src="//www.youtube.com/embed/D4lt28qqB70" frameborder="0" allowfullscreen></iframe>
				<hr><strong>Related News:</strong><br><a target="_blank"  href="http://www.telegraphindia.com/1111012/jsp/northeast/story_14611669.jsp">Tech city arrest hope on scam</a> <br> <a target="_blank" href="http://www.sentinelassam.com/state1/story.php?sec=2&subsec=2&id=109291&dtP=2012-11-30&ppr=1">Unipay2U accused Pranab Jyoti Barman appeared in Sivasagar</a></div>
				<div class="col-md-4 "><strong>Rangdhali Financial: 5 cases</strong><iframe width="320" height="215" src="//www.youtube.com/embed/WMrhVXmqs3c?rel=0" frameborder="0" allowfullscreen></iframe>
				<hr><strong>Related News:</strong><br><a target="_blank" href="http://www.dy365.in/news/news.php?aID=22827">Absconding Rangdhali CMD arrested from Guwahati</a><br><a target="_blank" href="http://www.telegraphindia.com/1120221/jsp/northeast/story_15157825.jsp#.UmkOZnASaSp">NGO Treat to shut fraud firms</a> <br> <a target="_blank" href="http://articles.timesofindia.indiatimes.com/2013-02-23/guwahati/37257045_1_nbfcs-fake-financial-institutions-state-police">NBFC Fake finance</a></div>
			</div>
		</div>
		
		<br><br>
		<div class="row">
			<div class="col-md-12">
				<h4>NBFC CASES UPTO 1ST OCTOBER 2013</h4>
			</div>
			<div class="col-md-6 pull-left">
				<div id="chart_div_nbfc" style="width: 100%; height: 350px;"></div>
			</div>
			
			<div class="col-md-5 pull-right">
				<table class="table table-bordered table-condensed table-responsive">
					<thead>
						<tr class="active">
							<th>GROUP</th>
							<th>NO.OF CASES</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Jeevan Suraksha</td>
							<td>11</td>
						</tr>
						<tr>
							<td>Saradha</td>
							<td>7</td>
						</tr>
						<tr>
							<td>Rangdhali</td>
							<td>5</td>
						</tr>
						<tr>
							<td>Alliance Vision Marketting (P) Ltd</td>
							<td>4</td>
						</tr>
						<tr>
							<td>Unipay 2U</td>
							<td>8</td>
						</tr>
						<tr>
							<td>Mudra</td>
							<td>5</td>
						</tr>
						<tr>
							<td>Moonsoon Marketting Pvt. Ltd.</td>
							<td>3</td>
						</tr>
						<tr>
							<td>Others</td>
							<td>14</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="//www.google.com/jsapi"></script>
<script type="text/javascript">
     google.load('visualization', '1', {packages: ['corechart']});
</script>
<script type="text/javascript">
<!--
window.onload = function() {
	$('#crime_nav').addClass('active');
};

function drawVisualization() {
	  // Create and populate the data table.
	  var data = google.visualization.arrayToDataTable([
	    ['Group Name', 'No.  of Cases'],
	    ['Jeevan Suraksha', 11],
	    ['Saradha', 7],
	    ['Rangdhali', 5],
	    ['Alliance Vision Marketting (P) Ltd', 4],
	    ['Unipay 2U', 8],
	    ['Mudra', 5],
	    ['Moonsoon Marketting Pvt. Ltd.', 3],
	    ['Others', 14]
	  ]);

	  // Create and draw the visualization.
	  new google.visualization.ColumnChart(document.getElementById('chart_div_nbfc')).
	      draw(data,
	           {title:"",
	    	  	width: 550,
	    	    height: 350,
	            hAxis: {title: "Year"}}
	      );
	}
	google.setOnLoadCallback(drawVisualization);
//-->
</script>
<?php include "../footer.php" ?>