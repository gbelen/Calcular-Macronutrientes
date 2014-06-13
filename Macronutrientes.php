<?php
class Macronutrientes {
	
	private $kg = 2.2;

	public function getMacronutrientes($peso){

		$Proteinas 		= 	$this->getProteinas($peso);
		$Carbohidratos 	= 	$this->getCarbohidratos($Proteinas[1]);
		$Grasas 		= 	$this->getGrasas($Proteinas[1]);


		$valores = array('grProteinas'=>$Proteinas[0], 'calProteinas'=>$Proteinas[1],
						 'grCarbohidratos'=>$Carbohidratos[0], 'calCarbohidratos'=>$Carbohidratos[1],
						 'grGrasas'=>$Grasas[0], 'calGrasas'=>$Grasas[1]);

		return $valores;
	}


	//Calcular Proteinas
	private function getProteinas($peso){

		//Aqui me devuelve el peso en kilogramo
		$pesoKilogramo = $this->convertirkg($peso);

		$gramosProteina = $pesoKilogramo * 2;

		//Aqui obtengo las calorias provenientes de proteinas
		$caloriasProteina = $gramosProteina * 4;
		$caloriasProteina /= 0.30;

		$valores = array($gramosProteina, $caloriasProteina);

		return $valores;

	}



	//Aqui obtengo los Carbohidratos
	private function getCarbohidratos($caloriasProteina){

		$caloriasCarbohidratos = $caloriasProteina * 0.4;

		$grCarbohidratos = $caloriasCarbohidratos/4;

		$valores = array($grCarbohidratos, $caloriasCarbohidratos);

		return $valores;
	}




	//Calculando la insgesta de Grasas
	private function getGrasas($caloriasProteina){

		$caloriasGrasas = $caloriasProteina * 0.3;

		$grGrasas = $caloriasGrasas / 9;

		$valores = array($grGrasas, $caloriasGrasas);

		return $valores;
	}


	private function convertirkg($lb){
		$kg = $lb / $this->kg;

		return $kg;
	}


}//Fin Clase
