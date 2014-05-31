<?php
class Macronutrientes {
	
	private $kg = 2.2;
	private $poblacion;
	private $embarazada;
	private $amamantando;


	//Aqui obtengo los Carbohidratos (CHO)
	public function getCarbohidratos($lb, $poblacion){
		//79.55 * 3.5 = 278.43 g/kg

		switch ($poblacion) {
			case 'Activo':
				$poblacion = 4.5;
				break;
			case 'Moderada':
				$poblacion = 5.5;
				break;
			case 'Vigoroso':
				$poblacion = 6.5;
				break;
			case 'Sedentario':
				$poblacion = 3.5;
				break;
		}

		$cho = $this->convertirkg($lb) * $poblacion; 

		$cho = number_format($cho);

		return $cho;

	}


	//Calcular Calorias provenientes de Carbohidratos
	public function getCaloriaCarbohidratos($cho){

		$caloria_cho = $cho * 4;
		
		return $caloria_cho;
	}




	//Calcular Proteina Diaria
	public function getCaloriasProteicas($lb, $poblacion, $embarazada, $amamantando){

		switch ($poblacion) {
			case 'Activo':
				$poblacion = 1.2;
				break;
			case 'Resistencia':
				$poblacion = 1.4;
				break;
			case 'Fisicoculturismo':
				$poblacion = 1.8;
				break;
			case 'Ninio':
				$poblacion = 2.0;
				break;			
			case 'Sedentario':
				$poblacion = 0.95;
				break;
		}


		$prote = $this->convertirkg($lb) * $poblacion; 
		$prote = number_format($prote);

		if($embarazada){ $prote += 20; }
		if($amamantando){ $prote += 10; }

		$prote *= 4;


		return $prote;
	}



	//Calculando la insgesta de Grasas
	public function getGrasas($cho, $prote, $poblacion){


		switch ($poblacion) {
			case 'Sedentario':
				$poblacion = 0.25;
				break;
			case 'Activo':
				$poblacion = 0.25;
				break;
			case 'Obeso':
				$poblacion = 0.20;
				break;
			case 'Enfermedad':
				$poblacion = 0.20;
				break;
		}


		$chopr = $cho + $prote;
		$calorias_totales = $chopr / (1 - $poblacion);
		$calorias_totales -= $chopr;
		$calorias_totales /= 9;

		$calorias_totales = number_format($calorias_totales,2);

		return $calorias_totales;
	}


	private function convertirkg($lb){
		$kg = $lb / $this->kg;
		$kg = number_format($kg);

		return $kg;
	}




	private function poblacion(){
		//Aqui pondre todos los switch anidados.



		
	}


}