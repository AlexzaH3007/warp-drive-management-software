<?php
	
	include 'Manager.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Warp-Drive Management</title>
	
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
</head>
<body>
	<section>
 	<?php

		if($_POST["enviar"])
		{
			$inyectores=array();
			$inyectores[0]=$_POST['danoInyectorA'];
			$inyectores[1]=$_POST['danoInyectorB'];
			$inyectores[2]=$_POST['danoInyectorC'];
			$porcentajeVel=$_POST['porcentajeVel'];

		    $manager = new Manager($inyectores,$porcentajeVel);
			echo $manager->distribucionPlasma();
			echo $manager->visualizarResultados();
			echo "<br />";

			$infoInyector = $manager->getInyectores();
		}	

		if($manager->getDistribuirPlasma())
		{
			foreach ($infoInyector as $key => $inyector) 
			{
	?>
				<div class="inyector">
						<center>
							<?php 
								if($inyector->getdanoPorcentaje()==100)
								{
							?>
									<img src="./imagenes/dano.jpg?>"><br>
							<?php			
								}
								else
								{
							?>
									<img src="./imagenes/inyector.png?>">
							<?php
								}
							?>
							<span><?php  echo chr(65+$key).": ". ($inyector->getCapacidadPlasma() + $inyector->getPlasmaExtra()) ." mg/s"; ?></span><br>
						</center>
				</div>

	<?php 
			}
	?>
			<div class="inyector">
					<center>
						<img src="./imagenes/tiempo.png?>">
						<span><?php

							foreach ($infoInyector as $key => $inyector) 
							{
								if($inyector->getdanoPorcentaje()<100)
								{
									if($inyector->getPlasmaExtra() > 0)
									{
										echo "\nTiempo de funcionamiento: ".(manager::TIEMPO_FUNCIONAR_MAX - $inyector->getPlasmaExtra())." minutos";
									}
									else
										echo "\nTiempo de funcionamiento: Infinito";
									break;
								}
								
							}
						?></span><br>
					</center>
			</div>

	<?php
		}
		else
		{
	?>
			<div class="inyector">
						<center>
							<img src="./imagenes/alert.png?>"><br>
							<span><?php echo "Unable to comply <br>";
										echo "Tiempo de funcionamiento 0"; ?></span><br>
						</center>
				</div>
	<?php
		}
	?>
	</section>

</body>
</html>