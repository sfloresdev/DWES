<?php
require_once "funciones.php";
session_start();

if (! isset($_SESSION['palabrasecreta'])) {
	$_SESSION['palabrasecreta'] = elegirPalabra();
	$_SESSION['letrasusuario'] = ""; // Inicialmente no tiene ninguna letra
	$_SESSION['fallos'] = 0; // Inicialmente no hay ningún fallo
}



if (isset($_GET['letra'])) {
	$letra = $_GET['letra'];

	if (comprobarLetra($letra, $_SESSION['palabrasecreta']))
		$_SESSION['letrausuario'] .= $letra;
	else
		$_SESSION['fallos']++;

	if ($_SESSION['fallos'] > 5) {
		$msg .= "Numero maximo de intentos superados";
		session_destroy();
		exit();
	}
}
$palabra_oculta = generaPalabraconHuecos($_SESSION['letrasusuario'], $_SESSION['palabrasecreta']);
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<?= $mg ?>
	PALABRA: <?= $palabra_oculta ?> <br>
	<p>Has cometido <?= $_SESSION['fallos'] ?> fallos</p>
	<form action="">
		Intoduzca una letra:
		<input type="text" name="letra" size="1" required>
	</form>

</body>

</html>