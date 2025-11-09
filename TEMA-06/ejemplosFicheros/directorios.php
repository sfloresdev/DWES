<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Directorios</title>
</head>
<body>

	<?php

	const DIRECTORIO = "docs";
	//Comprobamos que es un directorio
	if (!is_dir(DIRECTORIO))
		die("El directorio indicado no existe");
	// Verificamos que se pueda abrir
	$puntero_dir = @opendir(DIRECTORIO);
	if (!$puntero_dir)
		die("El directorio no se puede abrir");

	// Mostramos cada entrada de directorio
	echo "<pre>\n";
	$entrada = readdir($puntero_dir);
	while ($entrada !== false){
		echo "$entrada\n";
		$entrada = readdir($puntero_dir);
	}
	echo "</pre>\n";
	closedir($puntero_dir);
	?>
	
</body>
</html>