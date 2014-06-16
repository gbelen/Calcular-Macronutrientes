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

				//Mantenimiento
				$Obj = new Macronutrientes();
				$Macro = $Obj->getMacronutrientes($PesoLb);

				//Aumento
				$ObjAumento 	= new Macronutrientes();
				$MacroAumento	= $ObjAumento->getMacronutrientes($PesoLb, 'AUMENTO');

				//Perdida
				$ObjPerdida 	= new Macronutrientes();
				$MacroPerdida	= $ObjPerdida->getMacronutrientes($PesoLb, 'PERDIDA');


			?>

			<h1>MACRONUTRIENTES</h1>
			<fieldset><legend>Mantenimiento de Peso</legend>

				<h1>Carbohidratos</h1>
				<h3>
					<?php echo number_format($Macro['grCarbohidratos'],1)." Gramos.<br/><br/>"; ?>
					<?php echo number_format($Macro['calCarbohidratos'],1). " Calorias."; ?>
				</h3>


				<h1>Proteinas </h1>
				<h3>
					<?php echo number_format($Macro['grProteinas'],1) . " Gramos.<br/><br/>"; ?>
					<?php echo number_format($Macro['calProteinas'],1) . " Calorias."; ?>
				</h3>


				<h1>Grasas </h1>
				<h3>
					<?php echo number_format($Macro['grGrasas'],1) . " Gramos.<br/><br/>"; ?>
					<?php echo number_format($Macro['calGrasas'],1) . " Calorias."; ?>
				</h3>

				<br/><h1>Total de Calorias -> <?php echo number_format($Macro['caloriasTotales']) ?></h1>


			</fieldset>

			<fieldset><legend>Aumento de Peso</legend>

				<h1>Carbohidratos</h1>
				<h3>
					<?php echo number_format($MacroAumento['grCarbohidratos'],1)." Gramos.<br/><br/>"; ?>
					<?php echo number_format($MacroAumento['calCarbohidratos'],1). " Calorias."; ?>
				</h3>


				<h1>Proteinas </h1>
				<h3>
					<?php echo number_format($MacroAumento['grProteinas'],1) . " Gramos.<br/><br/>"; ?>
					<?php echo number_format($MacroAumento['calProteinas'],1) . " Calorias."; ?>
				</h3>


				<h1>Grasas </h1>
				<h3>
					<?php echo number_format($MacroAumento['grGrasas'],1) . " Gramos.<br/><br/>"; ?>
					<?php echo number_format($MacroAumento['calGrasas'],1) . " Calorias."; ?>
				</h3>

				<br/><h1>Total de Calorias -> <?php echo number_format($MacroAumento['caloriasTotales']) ?></h1>


			</fieldset>

			<fieldset><legend>Disminucion de Peso</legend>

				<h1>Carbohidratos</h1>
				<h3>
					<?php echo number_format($MacroPerdida['grCarbohidratos'],1)." Gramos.<br/><br/>"; ?>
					<?php echo number_format($MacroPerdida['calCarbohidratos'],1). " Calorias."; ?>
				</h3>


				<h1>Proteinas </h1>
				<h3>
					<?php echo number_format($MacroPerdida['grProteinas'],1) . " Gramos.<br/><br/>"; ?>
					<?php echo number_format($MacroPerdida['calProteinas'],1) . " Calorias."; ?>
				</h3>


				<h1>Grasas </h1>
				<h3>
					<?php echo number_format($MacroPerdida['grGrasas'],1) . " Gramos.<br/><br/>"; ?>
					<?php echo number_format($MacroPerdida['calGrasas'],1) . " Calorias."; ?>
				</h3>

				<br/><h1>Total de Calorias -> <?php echo number_format($MacroPerdida['caloriasTotales']) ?></h1>


			</fieldset>			


			<a href="" class="back">Re-Calcular</a>


		<?php }else{ ?>

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