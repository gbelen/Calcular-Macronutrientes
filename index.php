<html>
<head>
	<title>Consultar Macronutrientes</title>

	<link rel="stylesheet" href="style.css" />

	<meta name="viewport" content="width=device-width, user-scalable=no">
</head>
<body>

	<div class="Contenedor">

	<?php 
		error_reporting(0);

		//Incluyo la Clase
		require 'CalcularMacronutrientes.php';

		//Instancio el objeto
		$obj = new Macronutrientes;


		if(isset($_POST['btnCalcular'])){


			$PesoLb = filter_var($_POST['peso'], FILTER_SANITIZE_NUMBER_INT);

			$pobCarbohidratos = 	filter_var($_POST['pobCarbohidratos'], FILTER_SANITIZE_STRING);
			$pobProteinas 	  = 	filter_var($_POST['pobProteinas'], FILTER_SANITIZE_STRING);
			$pobGrasa 		  = 	filter_var($_POST['pobGrasa'], FILTER_SANITIZE_STRING);



			echo "<h1>Carbohidratos (CHO)</h1>";
			echo "<h3>";
				//Aqui obtengo la cantidad de Carbohidratos diario
				//Le pase el peso en libra y la actividad del individuo.
				//La actividad puueden ser |Sedentario, Activo, Moderada y Vigoroso|
				$cho = $obj->getCarbohidratos($PesoLb, $pobCarbohidratos);
				echo $cho ." gramos de CHO por dia <br/><br/>";
			
				//Aqui obtengo la cantidad de Calorias provenientes de Carbohidratos
				$calo_cho = $obj->getCaloriaCarbohidratos($cho);
				echo $calo_cho . " Calorias provenientes de CHO.";
			echo "</h3>";

			
			echo "<h1>Proteinas </h1>";
			echo "<h3>";
				$proteina = $obj->getCaloriasProteicas($PesoLb, $pobProteinas);
				echo $proteina . " gramos de Caloria Proteicas diarias";
			echo "</h3>";

			
			echo "<h1>Grasas </h1>";
			echo "<h3>";
				$grasas = $obj->getGrasas($calo_cho, $proteina, $pobGrasa);
				echo $grasas . " gramos de grasa por dia.";
			echo "</h3>";
			echo '<a href="" class="back">Re-Calcular</a>';


		}else{ ?>

			<h1>Calcular Macronutrientes</h1>
			<strong>Entre su peso (lbs)</strong>
			<form method="post" action="" autocomplete="off">
				<input type="text" name="peso" placeholder="Entre el peso en libras." class="txt" /><br/>

				<fieldset><legend>Poblacion</legend>
					<small>Carbohidratos *</small>
					<select name="pobCarbohidratos">
						<option value="">[Seleccione una]</option>
						<option value="Sedentario">Sedentario/a</option>
						<option value="Activo">Fisicamente Activo/a</option>
						<option value="Moderada">Rutina de Ejercicios Moderada</option>
						<option value="Vigoroso">Rutina de Ejercicios Vigoroso</option>
					</select><br/>

					<small>Proteinas **</small>
					<select name="pobProteinas">
						<option value="">[Seleccione una]</option>
						<option value="Sedentario">Sedentario/a</option>
						<option value="Activo">Fisicamente Activo/a</option>
						<option value="Resistencia">Atleta de Resistencia</option>
						<option value="Fisiculturismo">Fisiculturismo y Entrenamiento de Fuerza</option>
						<option value="Ninio">Ni&ntilde;o</option>
					</select><br/>

					<small>Grasas ***</small>
					<select name="pobGrasa">
						<option value="">[Seleccione una]</option>
						<option value="Sedentario">Sedentario/a</option>
						<option value="Activo">Fisicamente Activo/a</option>
						<option value="Obeso">Obeso</option>
						<option value="Enfermedad">Alto riesgo / Enfermedad</option>
					</select><br/>
				</fieldset>

				<label><input type="checkbox" name="embarazada" value="1" />Estoy Embarazada.</label><br/>
				<label><input type="checkbox" name="amamantando" value="1" />Estoy Amamantando.</label><br/>

				<input type="submit" name="btnCalcular" value="Calcular" class="btn" />
			</form>

		<?php } ?>

	</div>

</body>
</html>