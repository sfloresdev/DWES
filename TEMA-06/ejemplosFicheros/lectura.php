<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejemplo 1</title>
</head>
<body>

	<?php
	const FICH_LOCAL = "docs/datos.txt";
	//Abrimos el archio y almacenamos su retorno en una variable
	$fichero_local = @fopen(FICH_LOCAL, 'r');
	$nbytes = 0;
	if (!$fichero_local) // Verificamos si ha fallado la apertura
		die("Error al abrir el fichero");
	//Procesamos cada linea del recurso hasta llegar al EOF
	while ($linea = fgets($fichero_local)){
		echo htmlspecialchars($linea) . "<br>";
		$nbytes += strlen($linea);
	}
	fclose($fichero_local); // Cerramos el fichero
	echo "Total de bytes leidos del archivo $nbytes <br>";
	
	echo "<br><hr> Otra manera de leerlo, haciendolo directamente y almacenarlo en un array de strings";

	$fichero_lineas = @file(FICH_LOCAL);

	foreach ($fichero_lineas as $linea){
		echo $linea . "<br>";
	}
	echo " Total de bytes leidos del archivo $nbytes <br>";
	?>
</body>
</html>




