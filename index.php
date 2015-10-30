<!DOCTYPE HTML>
<html>
	<head>
		<title>Speed test</title>
		<script src="jquery-2.1.4.min.js" type="text/javascript"></script>
	</head>
	<body>
		<input type="button" id="boton" value="Empezar">
		<div id="resultados"></div>
		<script type="text/javascript">
		$(document).ready(function(){
			$('#boton').on('click', function(){
				speedTest();	
			});
		});	
		
		function speedTest(){
			var start = (new Date).getTime();
			var stop = start;
			$.ajax({
				url: "file",
				cache: false
			}).done(function(data) {
			  	stop = (new Date).getTime();
			  	var tiempo = stop - start;
			  	$('#resultados').prepend("<p>Transferidos 10M bytes en " + tiempo + " milisegundos</p>");
			});
		}
		</script>
	</body>
</html>