<?php
define("MES", time() + (3600 * 24 * 30));
const FICH_VISITAS = "../docs/accesos.txt";
$visitas = 1;

$fichero = @fopen(FICH_VISITAS, 'w'); // Truncamos el valor que ya exista
if (!$fichero)
	die("Error al abrir el fichero de visitas");
if (isset($_COOKIE['visitas'])){
	$visitas = $_COOKIE['visitas'] + 1;
	$ok = fwrite($fichero, $visitas);
	echo ($ok)? "Datos añadidos" : "Error al añadir datos";
}
fclose($fichero);
setcookie("visitas", $visitas, MES);
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contador de visitas</title>
</head>
<body>

	Usted a visitado esta pagina <strong> <?= $visitas ?></strong>
	
</body>
</html>