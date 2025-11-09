<?php

if (isset($_GET['directorio'])) {
	// Verificamos que el directorio existe
	$directorio = $_GET['directorio'];
	if (!is_dir($directorio)){
		die("El parametro indicado no es un directorio"); // Comprobamos que sea un dir
	}
	$puntero_dir = @opendir($directorio);
	$archivos = [];
	$entrada = readdir($puntero_dir); // Leemos la primera linea de ese dir
	while ($entrada !== false){
		if ($entrada != '.' && $entrada != '..'){
			$archivos[] = $entrada;
		}
		$entrada = readdir($puntero_dir);
	}
	closedir($puntero_dir);
	$result .= "<table border='1' cellpadding='3' cellspacing='0'>";
	foreach($archivos as $archivo){
		$ruta = "$directorio/$archivo";
		$tipo = mime_content_type($ruta);
		$bytes = filesize($ruta);
		$result .= "<tr><td>Nombre: " . $archivo . "</td><td>Tipo: " . $tipo . "<td> Tamaño: " . $bytes . "</td></tr>";
	}
	$result .= "</table>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ver informacion del directorio</title>
</head>

<body>

	<h2>Mostrar informacion de un directorio</h2>

	<?= $result ?>

	<?php if (!isset($_GET['directorio']) || empty(trim($_GET['directorio']))): ?>
		<form>
			Indica la ruta del directorio a mostrar:
			<input type="text" name="directorio">
		</form>
	<?php endif; ?>

</body>

</html>