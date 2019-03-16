<?php
	
	/***************************
	 @Autor Alexandra Hernández
	****************************/
	class Inyector 
	{
		// Plasma máxima por Inyector (mg/s)
		const PLASMA_MAX= 100; 
		// Plasma Extra por Inyector (mg/s)
		const PLASMA_EXTRA = 99;
		// Porcentaje de Daño del Inyector (%)
		private $danoPorcentaje;
		// Plasmas del Inyector (mg/s)
		private $plasma;
		// Plasma Extra del Inyector (mg/s)
		private $plasmaExtra;

		function __construct($danoPorcentaje)
		{
			$this->plasma=0;
			$this->plasmaExtra=0;

			if($danoPorcentaje >=0  && $danoPorcentaje <=100)
				$this->danoPorcentaje = $danoPorcentaje;
			else
				throw new Exception('Porcentaje ingresado de daño no valido: '.$danoPorcentaje,100);
				
		}

		// Retorna la capacidad del Plasma 
		public function getCapacidadPlasma()
		{
			return $this->plasma;
		}

		// Retorna el plasma extra para el inyector
		public function getPlasmaExtra()
		{
			return $this->plasmaExtra;
		}

		//Retorna porcentaje de daño del inyector
		public function getdanoPorcentaje()
		{
			return $this->danoPorcentaje;
		}

		// Establece capacidad de plasma que aporta el inyector
		public function setCapacidadPlasma($capacidadPlasma)
		{
			if(($capacidadPlasma>=0 &&  $capacidadPlasma <= Inyector::PLASMA_MAX) && ($capacidadPlasma <= (Inyector::PLASMA_MAX - $this->danoPorcentaje)))
				$this->plasma = $capacidadPlasma;
			else 
				throw new Exception('Capacidad de plasma no valida: '.$capacidadPlasma,200);

		}

		// Asigna la capacidad extra de plasma al inyector calculada en el Manager.php
		public function setPlasmaExtra($plasmaExtra)
		{

			if($plasmaExtra >=0 && $plasmaExtra <=Inyector::PLASMA_EXTRA)
				$this->plasmaExtra = $plasmaExtra;
			else
			 	throw new Exception('El valor de distribución del plasma extra se excede: '.$plasmaExtra,300);

		}


	}