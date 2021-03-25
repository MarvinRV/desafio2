<!--
A. Con una sintaxis basada exclusivamente en índices, y mostrar por pantalla los
alumnos que existen en cada nivel e idioma.
-->
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Ejercicio 1 - RS180397</title>
	<link rel="stylesheet" href="css/style.css" />
</head>
<body class='container'>
	<div class="row">
		<div class="duocolumn">
			<form id="select-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
				<select name="language" id="language" onchange="this.form.submit();">
					<option>Elija un idioma</option>
<?php
	$students = array();
	// 0 = Inglés, 1 = Francés, 2 = Alemán, 3 = Ruso, 4=Chino Mandarin
	// Nivel básico
	$students["Básico"][0] = 25;
	$students["Básico"][1] = 10;
	$students["Básico"][2] = 8;
	$students["Básico"][3] = 12;
	$students["Básico"][4] = 30;
	// Nivel intermedio
	$students["Intermedio"][0] = 15;
	$students["Intermedio"][1] = 5;
	$students["Intermedio"][2] = 4;
	$students["Intermedio"][3] = 8;
	$students["Intermedio"][4] = 15;
	// Nivel avanzado
	$students["Avanzado"][0] = 10;
	$students["Avanzado"][1] = 2;
	$students["Avanzado"][2] = 1;
	$students["Avanzado"][3] = 4;
	$students["Avanzado"][4] = 10;
	
	$langs = array("Inglés", "Francés", "Alemán", "Ruso", "Chino mandarín");
	for($j=0; $j<count($langs); $j++){
		echo '<option value="' . $j . '">' . $langs[$j] . '</option>';
	}
?>
				</select>
			</form>
		</div>
	</div>
<?php
	if(isset($_POST["language"])){
		$language=$_POST["language"];
		$levelId = array ("Básico"=>"Basic", "Intermedio"=>"Mid", "Avanzado"=>"Adv");
		foreach($students as $row => $row_value) {
			for($col = 0; $col < 5; $col++){
				if($language == $col) {
					echo '<div class="row">';
					echo '<div class="column" id="level' . $levelId[$row]. '">';
					echo '<p>'. $row .'</p>';
					echo '</div>';
					echo '<div class="column" id="studentnum' . $levelId[$row] . '">';
					echo "<p>".$students[$row][$col]."</p>";
					echo '</div>';
					echo '</div>';
				}
			}
		}
		echo "<br>Clases de: ".$langs[$language];
	}
?>
</body>
</html>