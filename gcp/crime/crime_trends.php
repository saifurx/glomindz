<?php include "../header.php" ?>


<div class="">
    <div class="subNav">
        <span class="subNavtext">CRIME TRENDS</span>&nbsp;&nbsp;
    </div>
    <hr style="border-top: transparent;">
    <div class="container" style=" height: auto;">
        <div class="row">
            <div class="col-md-12">
                <div class="btn-group btn-group-xs btn-group-justified">
                    <a onclick="show_chart_div(12);" href="#" class="btn btn-default" id="y12">2012</a>
                    <a onclick="show_chart_div(11);" href="#" class="btn btn-default" id="y11">2011</a>
                    <a onclick="show_chart_div(10);" href="#" class="btn btn-default" id="y10">2010</a>
                    <a onclick="show_chart_div(09);" href="#" class="btn btn-default" id="y09">2009</a>
                    <a onclick="show_chart_div(08);" href="#" class="btn btn-default" id="y08">2008</a>
                </div>
            </div>

            <div class="col-md-12" id="div_12"><br>
                <small>Mouse over the bars for Figures</small>
                <h3>CRIME FIGURES UNDER IPC IN THE YEAR 2012</h3>
                <div id="chart_div_12_total_crime" style="width: 900px; height: 450px; margin-top: 20px;"></div>
                <h3>CRIME FIGURES UNDER VARIOUS OTHER ACTS IN 2012</h3>
                <div id="chart_div_12_total_act" style="width: 900px; height: 550px; margin-top: 20px;"></div>
                <hr style=" margin-bottom: 5px; ">
                <small class="pull-right">visualization via <a target="_blank" href="http://crimatrix.com">crimatrix</a></small>
            </div>



            <div class="col-md-12" id="div_11"><br>
                <small>Mouse over the bars for Figures</small>
                <h3>CRIME FIGURES UNDER IPC IN THE YEAR 2011</h3>
                <div id="chart_div_11_total_crime" style="width: 900px; height: 450px; margin-top: 20px;"></div>
                <h3>CRIME FIGURES UNDER VARIOUS OTHER ACTS IN 2011</h3>
                <div id="chart_div_11_total_act" style="width: 900px; height: 550px; margin-top: 20px;"></div>
                <hr style=" margin-bottom: 5px; ">
                <small class="pull-right">visualization via <a target="_blank" href="http://crimatrix.com">crimatrix</a></small>
            </div>


            <div class="col-md-12" id="div_10"><br>
                <small>Mouse over the bars for Figures</small>
                <h3>CRIME FIGURES UNDER IPC IN THE YEAR 2010</h3>
                <div id="chart_div_10_total_crime" style="width: 900px; height: 450px; margin-top: 20px;"></div>
                <h3>CRIME FIGURES UNDER VARIOUS OTHER ACTS IN 2010</h3>
                <div id="chart_div_10_total_act" style="width: 900px; height: 550px; margin-top: 20px;"></div>
                <hr style=" margin-bottom: 5px; ">
                <small class="pull-right">visualization via <a target="_blank" href="http://crimatrix.com">crimatrix</a></small>
            </div>


            <div class="col-md-12" id="div_09"><br>
                <small>Mouse over the bars for Figures</small>
                <h3>CRIME FIGURES UNDER IPC IN THE YEAR 2009</h3>
                <div id="chart_div_09_total_crime" style="width: 900px; height: 450px; margin-top: 20px;"></div>
                <h3>CRIME FIGURES UNDER VARIOUS OTHER ACTS IN 2009</h3>
                <div id="chart_div_09_total_act" style="width: 900px; height: 550px; margin-top: 20px;"></div>
                <hr style=" margin-bottom: 5px; ">
                <small class="pull-right">visualization via <a target="_blank" href="http://crimatrix.com">crimatrix</a></small>
            </div>


            <div class="col-md-12" id="div_08"><br>
                <small>Mouse over the bars for Figures</small>
                <h3>CRIME FIGURES UNDER IPC IN THE YEAR 2008</h3>
                <div id="chart_div_08_total_crime" style="width: 900px; height: 450px; margin-top: 20px;"></div>
                <h3>CRIME FIGURES UNDER VARIOUS OTHER ACTS IN 2008</h3>
                <div id="chart_div_08_total_act" style="width: 900px; height: 550px; margin-top: 20px;"></div>
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
        //drawChart_05();
        $('#div_11,#div_10,#div_09,#div_08').hide();
        show_chart_div(12)
    };

    function show_chart_div(div) {

        if (div == 12) {
            $('#y12').removeClass('btn btn-default').addClass('btn btn-primary');
            $('#a5y,#y11,#y10,#y09,#y08').removeClass('btn btn-primary').addClass('btn btn-default');

            $('#div_last5year,#div_11,#div_10,#div_09,#div_08').hide();
            $('#div_12').show();
            drawChart_12();
        }
        if (div == 11) {
            $('#y11').removeClass('btn btn-default').addClass('btn btn-primary');
            $('#a5y,#y12,#y10,#y09,#y08').removeClass('btn btn-primary').addClass('btn btn-default');

            $('#div_last5year,#div_12,#div_10,#div_09,#div_08').hide();
            $('#div_11').show();
            drawChart_11();
        }
        if (div == 10) {
            $('#y10').removeClass('btn btn-default').addClass('btn btn-primary');
            $('#a5y,#y12,#y11,#y09,#y08').removeClass('btn btn-primary').addClass('btn btn-default');

            $('#div_last5year,#div_12,#div_11,#div_09,#div_08').hide();
            $('#div_10').show();
            drawChart_10()
        }
        if (div == 09) {
            $('#y09').removeClass('btn btn-default').addClass('btn btn-primary');
            $('#a5y,#y12,#y11,#y10,#y08').removeClass('btn btn-primary').addClass('btn btn-default');

            $('#div_last5year,#div_12,#div_11,#div_10,#div_08').hide();
            $('#div_09').show();
            drawChart_09()
        }
        if (div == 08) {
            $('#y08').removeClass('btn btn-default').addClass('btn btn-primary');
            $('#a5y,#y12,#y11,#y10,#y09').removeClass('btn btn-primary').addClass('btn btn-default');

            $('#div_last5year,#div_12,#div_11,#div_10,#div_09').hide();
            $('#div_08').show();
            drawChart_08();
        }
    }
</script>

<script type="text/javascript">
    google.load("visualization", "1", {packages: ["corechart"]});
    google.setOnLoadCallback(drawChart);



    function drawChart_12() {
        var data = google.visualization.arrayToDataTable([
            ['CRIME HEAD', 'Number of cases', ],
            ['Murder', 86],
            ['Arson', 43],
            ['Kidnapping', 307],
            ['Dacoity', 17],
            ['Robbery', 282],
            ['Extortion', 216],
            ['Burglary', 735],
            ['Theft', 1314],
            ['Auto Theft', 1017],
            ['Attempt To Murder', 77],
            ['Rape', 74],
            ['Dowry Death', 09],
            ['Torture', 413],
            ['Rioting', 48],
            ['Criminal Beach of Trust', 173],
            ['Cheating', 358],
            ['Counterfeiting', 22],
                    //['Other IPC',  3401 ]

        ]);

        var options = {
            title: '',
            width: 900,
            height: 550,
            colors: ['#de2407']
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div_12_total_crime'));
        chart.draw(data, options);
        var data = google.visualization.arrayToDataTable([
            ['CRIME HEAD', 'Number of cases', ],
            ['Arms Act', 51],
            ['ES Act', 13],
            ['NDPS Act', 17],
            ['Informal Traffic Act', 07],
            ['Information & Technology Act', 119],
            ['Other act', 140]


        ]);

        var options = {
            title: '',
            width: 900,
            height: 550,
            colors: ['#3d74ff']
        };
        var chart = new google.visualization.BarChart(document.getElementById('chart_div_12_total_act'));
        chart.draw(data, options);
    }

    function drawChart_11() {
        var data = google.visualization.arrayToDataTable([
            ['CRIME HEAD', 'Number of cases', ],
            ['Murder', 70],
            ['Arson', 34],
            ['Kidnapping', 355],
            ['Dacoity', 24],
            ['Robbery', 223],
            ['Extortion', 150],
            ['Burglary', 823],
            ['Theft', 1658],
            ['Auto Theft', 838],
            ['Attempt To Murder', 28],
            ['Rape', 66],
            ['Dowry Death', 09],
            ['Torture', 315],
            ['Rioting', 112],
            ['Criminal Beach of Trust', 205],
            ['Cheating', 513],
            ['Counterfeiting', 08],
                    //['Other IPC',  5098 ]

        ]);

        var options = {
            title: '',
            width: 900,
            height: 550,
            colors: ['#de2407']
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div_11_total_crime'));
        chart.draw(data, options);
        var data = google.visualization.arrayToDataTable([
            ['CRIME HEAD', 'Number of cases', ],
            ['Arms Act', 22],
            ['ES Act', 10],
            ['NDPS Act', 11],
            ['Informal Traffic Act', 11],
            ['Information & Technology Act', 28],
            ['Other act', 20]


        ]);

        var options = {
            title: '',
            width: 900,
            height: 550,
            colors: ['#3d74ff']
        };
        var chart = new google.visualization.BarChart(document.getElementById('chart_div_11_total_act'));
        chart.draw(data, options);
    }

    function drawChart_10() {
        var data = google.visualization.arrayToDataTable([
            ['CRIME HEAD', 'Number of cases', ],
            ['Murder', 58],
            ['Arson', 25],
            ['Kidnapping', 357],
            ['Dacoity', 13],
            ['Robbery', 119],
            ['Extortion', 110],
            ['Burglary', 761],
            ['Theft', 1320],
            ['Auto Theft', 838],
            ['Attempt To Murder', 18],
            ['Rape', 62],
            ['Dowry Death', 10],
            ['Torture', 273],
            ['Rioting', 174],
            ['Criminal Beach of Trust', 187],
            ['Cheating', 417],
            ['Counterfeiting', 05],
                    // ['Other IPC',  4150 ]

        ]);

        var options = {
            title: '',
            width: 900,
            height: 550,
            colors: ['#de2407']
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div_10_total_crime'));
        chart.draw(data, options);
        var data = google.visualization.arrayToDataTable([
            ['CRIME HEAD', 'Number of cases', ],
            ['Arms Act', 18],
            ['ES Act', 10],
            ['NDPS Act', 11],
            ['Informal Traffic Act', 21],
            ['Information & Technology Act', 10],
            ['Other act', 36]


        ]);

        var options = {
            title: '',
            width: 900,
            height: 550,
            colors: ['#3d74ff']
        };
        var chart = new google.visualization.BarChart(document.getElementById('chart_div_10_total_act'));
        chart.draw(data, options);
    }

    function drawChart_09() {
        var data = google.visualization.arrayToDataTable([
            ['CRIME HEAD', 'Number of cases', ],
            ['Murder', 80],
            ['Arson', 27],
            ['Kidnapping', 272],
            ['Dacoity', 31],
            ['Robbery', 128],
            ['Extortion', 97],
            ['Burglary', 632],
            ['Theft', 1207],
            ['Auto Theft', 576],
            ['Attempt To Murder', 11],
            ['Rape', 60],
            ['Dowry Death', 08],
            ['Torture', 225],
            ['Rioting', 79],
            ['Criminal Beach of Trust', 145],
            ['Cheating', 361],
            ['Counterfeiting', 05],
                    //['Other IPC',  3078 ]

        ]);

        var options = {
            title: '',
            width: 900,
            height: 550,
            colors: ['#de2407']
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div_09_total_crime'));
        chart.draw(data, options);
        var data = google.visualization.arrayToDataTable([
            ['CRIME HEAD', 'Number of cases', ],
            ['Arms Act', 31],
            ['ES Act', 17],
            ['NDPS Act', 11],
            ['Informal Traffic Act', 10],
            ['Information & Technology Act', 03],
            ['Other act', 43]


        ]);

        var options = {
            title: '',
            width: 900,
            height: 550,
            colors: ['#3d74ff']
        };
        var chart = new google.visualization.BarChart(document.getElementById('chart_div_09_total_act'));
        chart.draw(data, options);
    }

    function drawChart_08() {
        var data = google.visualization.arrayToDataTable([
            ['CRIME HEAD', 'Number of cases', ],
            ['Murder', 60],
            ['Arson', 21],
            ['Kidnapping', 245],
            ['Dacoity', 17],
            ['Robbery', 131],
            ['Extortion', 107],
            ['Burglary', 613],
            ['Theft', 1217],
            ['Auto Theft', 901],
            ['Attempt To Murder', 16],
            ['Rape', 64],
            ['Dowry Death', 18],
            ['Torture', 167],
            ['Rioting', 81],
            ['Criminal Beach of Trust', 112],
            ['Cheating', 200],
            ['Counterfeiting', 07],
                    //['Other IPC',  3066 ]

        ]);

        var options = {
            title: '',
            width: 900,
            height: 550,
            colors: ['#de2407']
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div_08_total_crime'));
        chart.draw(data, options);
        var data = google.visualization.arrayToDataTable([
            ['CRIME HEAD', 'Number of cases', ],
            ['Arms Act', 21],
            ['ES Act', 18],
            ['NDPS Act', 12],
            ['Informal Traffic Act', 07],
            ['Information & Technology Act', 04],
            ['Other act', 50]


        ]);

        var options = {
            title: '',
            width: 900,
            height: 550,
            colors: ['#3d74ff']
        };
        var chart = new google.visualization.BarChart(document.getElementById('chart_div_08_total_act'));
        chart.draw(data, options);
    }
</script>
<?php include "../footer.php" ?>
