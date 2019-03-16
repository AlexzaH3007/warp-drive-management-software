
<?php

require_once "test/TestPHP.php";
require_once "../src/Manager.php";

class TestCaseMyClass extends TestCase {
	
	function test_inyector_class() {
		$my_class = new Inyector (40);
		$this->assert_true ( $my_class instanceof Inyector );
	}
	
	function test_inyector_class_dano_negativo() {
		try {
			$my_class = new Inyector ( - 50 );
		} catch ( Exception $exception ) {
			if ($exception->getCode () == 100)
				$this->pass ();
		}
	}
	
	function test_inyector_class_dano_mayor() {
		try {
			$my_class = new Inyector ( 120 );
		} catch ( Exception $exception ) {
			if ($exception->getCode () == 100)
				$this->pass ();
		}
	}
	
	function test_inyector_set_capacidad_plasma_valor_no_posible() {
		$my_class = new Inyector ( 70 );
		try{
			$my_class->setCapacidadPlasma(45);
		} catch ( Exception $exception ) {
			if ($exception->getCode () == 200)
				$this->pass ();
		}
	}
	
	function test_injector_set__capacidad_plasma_valor_negativo() {
		$my_class = new Inyector ( 30 );
		try{
			$my_class->setCapacidadPlasma(-10);
		} catch ( Exception $exception ) {
			if ($exception->getCode () == 200)
				$this->pass ();
		}
	}
	
	function test_inyector_set_plasma_extra_valor_no_posible() {
		$my_class = new Inyector ( 30 );
		try{
			$my_class->setPlasmaExtra(120);
		} catch ( Exception $exception ) {
			if ($exception->getCode () == 300)
				$this->pass ();
		}
	}
	
	function test_inyector_set_plasma_extra_valor_negativo() {
		$my_class = new Inyector ( 15 );
		try{
			$my_class->setPlasmaExtra(-14);
		} catch ( Exception $exception ) {
			if ($exception->getCode () == 300)
				$this->pass ();
		}
	}
		
	function test_Manager_class() {
		$my_class = new Manager ( array (
				0,
				0,
				0 
		), 100 );
		$this->assert_true ( $my_class instanceof Manager );
	}
	
	function test_Manager_class_con_velocidad_negativa() {
		try {
			$my_class = new Manager ( array (
					0,
					0,
					0
			), -1 );
		} catch (Exception $exception){
			if ($exception->getCode () == 400)
				$this->pass ();
		}
	}
	
	function test_Manager_class_con_velocidad_extra() {
		try {
			$my_class = new Manager ( array (
					0,
					0,
					0
			), 201 );
		} catch (Exception $exception){
			if ($exception->getCode () == 400)
				$this->pass ();
		}
	}

	function test_Manager_inyectors_plasma_resulatado_distribucion() {
		$my_class = new Manager ( array (
				20,
				30,
				100 
		), 100 );
		$my_class->distribucionPlasma();
		$inyectores = $my_class->getInyectores();			
		$this->assert_true ( $inyectores [0]->getCapacidadPlasma() + $inyectores [0]->getPlasmaExtra() == 155 && $inyectores [1]->getCapacidadPlasma() + $inyectores [1]->getPlasmaExtra() == 145 && $inyectores [2]->getCapacidadPlasma() + $inyectores [2]->getPlasmaExtra() == 0 );
	}
	
}

$ejecutar = new TestRunnerCLI();
$ejecutar->add_test_case ( new TestCaseMyClass () );

$ejecutar->print_results ();

?>