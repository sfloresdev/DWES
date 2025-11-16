<?php

session_start();


if (!isset($_SESSION['nombre'])) {
	$_SESSION['nombre'] = "";
}

if (isset($_POST['nombre'])) {
	$_SESSION['nombre'] = $_POST['nombre'];
}

if (isset($_POST['lenguajes'])) {
	$_SESSION['lenguajes'] = $_POST['lenguajes'];
}

$nombre = $_SESSION['nombre'];


function opcionMarcada($lenguaje): bool{
	return in_array($lenguaje, $_SESSION['lenguajes']);
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Selección de personal</title>
</head>

<body>
	<h2> Datos de candidato: Paso 2º </h2>
	<form action="seleccion.php" method="POST">
		<fieldset>
			<legend>Datos Profesionales </legend>
			Nombre : <input type="text" name="nombre" value="<?= $nombre ?>"></br>
			Lenguajes de programación:<br>
			<select name="lenguajes[]" multiple="multiple" size=6>
				<option value="Java" <?= opcionMarcada("Java")?"selected='selected'" : "" ?> >Java</option>
				<option value="Javascript">Javascript</option>
				<option value="Php">Php</option>
				<option value="Python">Python</option>
				<option value="Perl">Perl</option>
				<option value="C#">C#</option>
			</select><br>
			<input type="submit" value="Enviar">
		</fieldset>
	</form>
</body>

</html>