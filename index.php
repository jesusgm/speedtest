<!DOCTYPE HTML>
<html>
	<head>
		<title>Speed test</title>
		<script src="jquery-2.1.4.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="chart.js"></script>
		<style type="text/css">
			body{
				max-width: 980px;
				margin:auto;
			}
		</style>
	</head>
	<body>
		<div>
			<input type="button" id="boton" value="Empezar">
		</div>
		<!--<div id="resultados"></div>-->
		<canvas id="myChart" width="980" height="350"></canvas>
		<script type="text/javascript">
		$(document).ready(function(){
			$('#boton').on('click', function(){
				$(this).attr('disabled','disabled');
				speedTest();	
			});
		});
		var intentos = 0;
		var datos = new Array();
		var labels = new Array();
		
		function speedTest(){
			var start = (new Date).getTime();
			var stop = start;
			$.ajax({
				url: "file",
				cache: false
			}).done(function(data) {
			  	stop = (new Date).getTime();
			  	var tiempo = stop - start;
				var segundos = tiempo / 1000;
				var velocidad = 1 / segundos;
				var wWidth = $(window).width();
			  	//$('#resultados').prepend("<div style='background:red;width:" + ((velocidad * 100)/wWidth) + "%;text-align:center;'>1Mb en " + segundos + "segundos -> " + velocidad + "Mb/s</div>");
				intentos++;
				datos.push(velocidad+'');
				labels.push(intentos+'');
				drawChart();
				$('#boton').removeAttr('disabled');
			});
		}

		function drawChart(){
			// Get the context of the canvas element we want to select
			var ctx = document.getElementById("myChart").getContext("2d");
			var options = null;
			var data = {
			    labels: labels,
			    datasets: [
				{
				    label: "My First dataset",
				    fillColor: "rgba(220,220,220,0.2)",
				    strokeColor: "rgba(220,220,220,1)",
				    pointColor: "rgba(220,220,220,1)",
				    pointStrokeColor: "#fff",
				    pointHighlightFill: "#fff",
				    pointHighlightStroke: "rgba(220,220,220,1)",
				    data: datos
				}
			    ]
			};
			var myLineChart = new Chart(ctx).Line(data, options);
			
		}
		</script>
	</body>
</html>
