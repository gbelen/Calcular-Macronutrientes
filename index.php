<html>
<head>
	<title>Consultar Macronutrientes</title>

	<link rel="stylesheet" href="style.css" />

	<meta name="viewport" content="width=device-width, user-scalable=no">
</head>
<body>

	<div class="Contenedor">

	<?php 
		//Incluyo la Clase
		require 'Macronutrientes.php';


		if(isset($_POST['btnCalcular'])){

			$PesoLb = filter_var($_POST['peso'], FILTER_SANITIZE_NUMBER_INT);


			//Instanciarla
			$Obj = new Macronutrientes();
			$Macro = $Obj->getMacronutrientes($PesoLb);


			echo "<h1>Carbohidratos</h1>";
			echo "<h3>";
				
				echo number_format($Macro['grCarbohidratos'])." Gramos.<br/><br/>";
				
				echo number_format($Macro['calCarbohidratos']). " Calorias.";
			echo "</h3>";


				echo "<h1>Proteinas </h1>";
				echo "<h3>";
					echo number_format($Macro['grProteinas']) . " Gramos.<br/><br/>";
					echo number_format($Macro['calProteinas']) . " Calorias.";
				echo "</h3>";


				echo "<h1>Grasas </h1>";
				echo "<h3>";
					echo number_format($Macro['grGrasas']) . " Gramos.<br/><br/>";
					echo number_format($Macro['calGrasas']) . " Calorias.";
				echo "</h3>";

				echo "<br/><br/><h1>Total de Calorias -> ".number_format($Macro['calProteinas'])."</h1>";


			echo '<a href="" class="back">Re-Calcular</a>';


		}else{ ?>

			<h1>Calcular Macronutrientes</h1>
			<strong>Entre su peso (lbs)</strong>
			<form method="post" action="" autocomplete="off">
				<input type="number" name="peso" placeholder="Entre el peso en libras." class="txt" /><br/>


				<input type="submit" name="btnCalcular" value="Calcular" class="btn" />
			</form>

		<?php } ?>

	</div>

</body>
</html>