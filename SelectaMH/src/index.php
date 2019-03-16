<!DOCTYPE html>

<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Warp-Drive Management</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
</head>

<body>
	<section>
	<form id="formulario" method="post" action="process.php">
	  Da&ntilde;o Inyector A:   
	  <input type="number" name="danoInyectorA" value="0" min="0" max="100"><br><br>
	  Da&ntilde;o Inyector B: 
	  <input type="number" name="danoInyectorB" value="0" min="0" max="100"><br><br>
	  Da&ntilde;o Inyector C: 
	  <input type="number" name="danoInyectorC" value="0" min="0" max="100"> <br><br>
	   Velocidad  (  %  ): 
	  <input type="number" name="porcentajeVel" value="100"><br><br><br>	
	  <center><input type="submit" name="enviar" value="CALCULAR PLASMA" class="aceptar"></center>
	</form>
	</section>
</body>
</html>