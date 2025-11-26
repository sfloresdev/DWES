<?php

if (isset($_GET['fichero'])) {

	$nombreFichero = $_GET['fichero'];
	if (!is_readable($nombreFichero)) {
		$result = "El fichero no se puede leer";
		return;
	}
	$tlinea = file($nombreFichero);
	$contLineas = 0;
	$result = "<code><pre>";
	foreach ($tlinea as $linea) {
		$contLineas++;
		$result .= $contLineas . ":" . htmlspecialchars($linea);
	}
	$result .= "</pre></code>";
	$result .= "Numero de lineas: ". $contLineas. "<br>";
	$result .= "Numero de caracteres: ". filesize($nombreFichero);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<h1>MOSTRANDO UN FICHERO</h1>

	<?= $result ?>

	<?php if (!isset($_GET['fichero']) || !is_readable($_GET['fichero'])): ?>
		<form>
			Fichero a mostrar: <input type="text" name="fichero">
		</form>
	<?php endif; ?>

</body>

</html>