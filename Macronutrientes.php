<?php
class Macronutrientes {
	
	private $kg = 2.2;

	public function getMacronutrientes($peso, $mode = NULL){

		$Proteinas 		= 	$this->getProteinas($peso, $mode);
		$Carbohidratos 	= 	$this->getCarbohidratos($Proteinas[3], $mode);
		$Grasas 		= 	$this->getGrasas($Proteinas[3], $mode);


		$valores = array('grProteinas'=>$Proteinas[0], 'calProteinas'=>$Proteinas[1], 'caloriasTotales'=>$Proteinas[2],
						 'grCarbohidratos'=>$Carbohidratos[0], 'calCarbohidratos'=>$Carbohidratos[1],
						 'grGrasas'=>$Grasas[0], 'calGrasas'=>$Grasas[1]);

		return $valores;

	}


	//Calcular Proteinas
	public function getProteinas($peso, $mode=NULL){

		//Aqui me devuelve el peso en kilogramo
		$pesoKilogramo = $this->convertirkg($peso);

		$gramosProteina = $pesoKilogramo * 2;

		//Aqui obtengo las calorias provenientes de proteinas
		$caloriasProteina = $gramosProteina * 4;
		$caloriasTotales = $caloriasProteina / 0.30;

		//total de Calorias sin que pase por el aumento.
		$Totals = $caloriasTotales;
		
		
			//Si Modo sera Aumento de Peso
			if($mode == 'AUMENTO'){
				$caloriasTotales  += 500;
				$caloriasProteina =  $caloriasTotales * 0.30;
				$gramosProteina	  =  $caloriasProteina/4;

			}else if($mode == 'PERDIDA'){

				$caloriasTotales  -= 500;
				$caloriasProteina =  $caloriasTotales * 0.30;
				$gramosProteina	  =  $caloriasProteina/4;			
			}
		
		
		$valores = array($gramosProteina, $caloriasProteina, $caloriasTotales, $Totals);


		return $valores; 

	}



	//Aqui obtengo los Carbohidratos
	private function getCarbohidratos($caloriasTotales, $mode = NULL){

		$caloriasCarbohidratos = $caloriasTotales * 0.4;

		$grCarbohidratos = $caloriasCarbohidratos/4;


		//Si Modo sera Aumento de Peso
		if($mode == 'AUMENTO'){
			$caloriasTotales  		+= 500;
			$caloriasCarbohidratos  =  $caloriasTotales * 0.4;
			$grCarbohidratos  		=  $caloriasCarbohidratos/4;

		}else if($mode == 'PERDIDA'){

			$caloriasTotales  -= 500;
			$caloriasCarbohidratos  =  $caloriasTotales * 0.4;
			$grCarbohidratos  		=  $caloriasCarbohidratos/4;
		}		

		$valores = array($grCarbohidratos, $caloriasCarbohidratos);

		return $valores;
	}




	//Calculando la insgesta de Grasas
	private function getGrasas($caloriasTotales, $mode){

		$caloriasGrasas = $caloriasTotales * 0.3;

		$grGrasas = $caloriasGrasas / 9;

			//Si Modo sera Aumento de Peso
			if($mode == 'AUMENTO'){
				$caloriasTotales  += 500;
				$caloriasGrasas	  =  $caloriasTotales * 0.30;
				$grGrasas  		  =  $caloriasGrasas/9;

			}else if($mode == 'PERDIDA'){

				$caloriasTotales  -= 500;
				$caloriasGrasas	  =  $caloriasTotales * 0.30;
				$grGrasas  		  =  $caloriasGrasas/9;
			}	


		$valores = array($grGrasas, $caloriasGrasas);

		return $valores;
	}


	private function convertirkg($lb){
		$kg = $lb / $this->kg;

		return $kg;
	}


}//Fin Clase
