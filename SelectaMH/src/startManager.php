<?php

include 'Manager.php';

if (isset ( $argv )) 
{
	if (count ( $argv ) == 5) 
	{

		echo "\n\n****************RESULTADOS****************\n\n";
		
		echo "Resultado de plasma requerido por cada inyector:\n\n";
		
		$manager = new manager ( array (
				$argv [1],
				$argv [2],
				$argv [3] 
		), $argv [4] );

		echo $manager->distribucionPlasma();
		echo $manager->visualizarResultados();


		echo "\n**********************FIN**********************\n";
		
	} 
	else 
	{
		if(count($argv) < 5)
			echo "Faltan argumentos!! \n\nUse: php startManager.php [dano A %] [dano B %] [dano C %] [velocidad %]\n";
		else
			echo "Sobran argumentos!! \n\nUse: php startManager.php [dano A %] [dano B %] [dano C %] [velocidad %]\n";
	}	
}