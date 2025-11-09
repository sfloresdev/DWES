<?php

if (isset($_GET['directorio'])){

	$directorio = $_GET['directorio'];

	if (!is_dir($directorio))
		die("El parametro indicado no es un directorio");

	$puntero_dir = @opendir($directorio);
	$info = "";
	while (($entrada = readdir($puntero_dir))!== false) {
		if (pathinfo($entrada, PATHINFO_EXTENSION) == 'php') {
			$ruta = "$directorio/$entrada"; // Ruta completa
			$info .= 
			"Nombre: " . pathinfo($entrada, PATHINFO_BASENAME). 
			"<br>Lineas: " . n_lines($ruta). "<hr>";
		}
	}
	closedir($puntero_dir);
}

function n_lines($archivo)
{
	$puntero_file = file($archivo);
	$lineas = 0;
	foreach ($puntero_file as $linea)
		$lineas++;
	return $lineas;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contar programas</title>
</head>

<body>

	<h2>Contar programas</h2>

	<?= $info ?>

	<?php if (!isset($_GET['directorio'])): ?>
		<form>
			Indica la ruta del directorio a mostrar:
			<input type="text" name="directorio">
		</form>
	<?php endif; ?>

</body>
</html>