<?php 
	error_reporting(0);

	//Incluyo la Clase
	require 'CalcularMacronutrientes.php';

	//Instancio el objeto
	$obj = new Macronutrientes;


	$PesoLb = 200;

	echo "<h1>Carbohidratos (CHO)</h1>";

	//Aqui obtengo la cantidad de Carbohidratos diario
	//Le pase el peso en libra y la actividad del individuo.
	//La actividad puueden ser |Sedentario, Activo, Moderada y Vigoroso|
	$cho = $obj->getCarbohidratos($PesoLb, 'Activo');
	echo $cho ." gramos de CHO por dia";

	echo "<br/>";

	//Aqui obtengo la cantidad de Calorias provenientes de Carbohidratos
	$calo_cho = $obj->getCaloriaCarbohidratos($cho);
	echo $calo_cho . " Calorias provenientes de CHO.";


	echo "<h1>Proteinas </h1>";

	$proteina = $obj->getCaloriasProteicas($PesoLb, 'Activo');
	echo $proteina . " gramos de Caloria Proteicas diarias";



	echo "<h1>Grasas </h1>";
	$grasas = $obj->getGrasas($calo_cho, $proteina, 'Activo');
	echo $grasas . " gramos de grasa por dia.";