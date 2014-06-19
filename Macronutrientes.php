<?php
/**
 * Clase que consulta los macronutrientes diarios necesarios.
 * Recibe como valor el peso, y ella hace el resto.
 * Imprime las calorias totales generales
 * Tambien gramos de Proteinas y Calorias de Proteinas.
 * Tambien gramos de Carbohidratos y Calorias de Carbohidratos.
 * Tambien gramos de Grasas y Calorias de Grasas.
 */
class Macronutrientes {
	
	private $kg = 2.2;

	/**
	 * [getMacronutrientes Metodo utilizado para pasarle valores a los demas metodos, ]
	 * @param  [type] $peso [valor del peso en libras]
	 * @param  [type] $mode [recibe los valores AUMENTO O PERDIDA]
	 * @return [type]       [retorna un array con 7 valores, gramos, calorias y calorias totales. (Grasa, Proteinas, Carbohidratos)]
	 */
	public function getMacronutrientes($peso, $mode = NULL){

		$Proteinas 		= 	$this->getProteinas($peso, $mode);
		$Carbohidratos 	= 	$this->getCarbohidratos($Proteinas[3], $mode);
		$Grasas 		= 	$this->getGrasas($Proteinas[3], $mode);

		/**
		 * [$valores es un array que almacena todos los resultados obtenidos de los metodos llamados mas arriba]
		 * @var array
		 */
		$valores = array('grProteinas'=>$Proteinas[0], 'calProteinas'=>$Proteinas[1], 'caloriasTotales'=>$Proteinas[2],
						 'grCarbohidratos'=>$Carbohidratos[0], 'calCarbohidratos'=>$Carbohidratos[1],
						 'grGrasas'=>$Grasas[0], 'calGrasas'=>$Grasas[1]);

		return $valores;

	}
	
	
	/**
	 * [getProteinas 		 Metodo que obtiene los gramos y calorias de las proteinas]
	 * @param  [type] $peso [Peso en libra del Paciente]
	 * @param  [type] $mode [Mode: es el modo de calculo, acepta tres valores, null = Mantenimiento, AUMENTO = aumento de peso, y PERDIDA = perdida de peso]
	 * @return [type]       [retorna un array con tres valores, gramos, calorias y total de calorias general]
	 */
	private function getProteinas($peso, $mode=NULL){
		/**
		 * Aqui me devuelve el peso en kilogramo
		 */
		$pesoKilogramo = $this->convertirkg($peso);
		$gramosProteina = $pesoKilogramo * 2;

		/**
		 * Aqui obtengo las calorias provenientes de proteinas
		 */
		$caloriasProteina = $gramosProteina * 4;
		$caloriasTotales = $caloriasProteina / 0.30;

		/**
		 * total de Calorias sin que pase por el aumento.
		 */
		$Totals = $caloriasTotales;
		
			/**
			 * If que calcula si es AUMENTO O PERDIDA
			 * Hace un calculo depende si es AUMENTO o PERDIDA
			 */
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



	/**
	 * [getCarbohidratos Aqui obtengo los Carbohidratos]
	 * @param  [type] $caloriasTotales [Aqui toma como valor las calorias calculadas en getProteinas]
	 * @param  [type] $mode            [AUMENTO o PERDIDA]
	 * @return [type]                  [array de dos valores, gramo y calorias]
	 */
	private function getCarbohidratos($caloriasTotales, $mode = NULL){

		$caloriasCarbohidratos = $caloriasTotales * 0.4;
		$grCarbohidratos = $caloriasCarbohidratos/4;

		/**
		 * If que calcula si es AUMENTO O PERDIDA
		 * Hace un calculo depende si es AUMENTO o PERDIDA
		 */
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



	/**
	 * [getGrasas Calculando la insgesta de Grasas]
	 * @param  [type] $caloriasTotales [Aqui toma como valor las calorias calculadas en getProteinas]
	 * @param  [type] $mode            [AUMENTO p PERDIDA]
	 * @return [type]                  [returna un array de dos valores, gramos y calorias]
	 */
	private function getGrasas($caloriasTotales, $mode){

		$caloriasGrasas = $caloriasTotales * 0.3;

		$grGrasas = $caloriasGrasas / 9;

			/**
			 * If que calcula si es AUMENTO O PERDIDA
			 * Hace un calculo depende si es AUMENTO o PERDIDA
			 */
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

	/**
	 * [convertirkg metodo que recibe un valor y retorna el valor dividido entre el valor de $this->kg]
	 * @param  [type] $lb [peso en libras]
	 * @return [type]     [returna el peso dividido entre el valor de $this->kg]
	 */
	private function convertirkg($lb){
		$kg = $lb / $this->kg;

		return $kg;
	}


}