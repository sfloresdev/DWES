<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Añadir datos a Ficheros</title>
</head>
<body>
	
	<?php

	const FICH_USUARIOS = "docs/usuarios.txt";

	if (($_SERVER['REQUEST_METHOD'] === 'GET') || empty($_POST['user'])){
		$fichero = @fopen(FICH_USUARIOS, 'r');
		if (!$fichero)
			die("Error al abrir el fichero de usuarios");

		echo "<table align='center' border='1'>\n"; //Cabecera
		echo "<tr><th>usuario</th><th>password</th></tr>\n";

		while ($linea = fgets($fichero)){
			$partes = explode('|', trim($linea));  //Limpiamos la linea
			echo "<tr><td>$partes[0]</td><td>$partes[1]</td></tr>";
		}
		fclose($fichero);
		//Mostramos el formulario de introduccion de datos
		echo "</table><br>\n";
		echo <<<TABLE
		<form name='f1' action='colocarDatos.php' method='POST'>
		Usuario: <input type='text' name='user'> &nbsp;
		Constraseña: <input type='password' name='password'><br>
		<input type='submit' value='Enviar'> 
		</form>
		TABLE;
	} else {
		$fichero = @fopen(FICH_USUARIOS, 'a'); // Abrimos el archivo con el descriptor "agregar al final";
		if (!$fichero)
			die("Error al abir el archivo");
		$cadena = $_POST['user'] . ' | ' . $_POST['password'] . "\n"; // Recibimos los datos del formulario y creamos la cadena
		$ok = fwrite($fichero, $cadena); //Escribimos los datos en el fichero
		echo ($ok)? "Datos añadidos al fichero" : "Error al añadirlos"; // Output del resultado
		fclose($fichero);
		echo "<br>Pulsa <a href='colocarDatos.php'>aqui</a> para continuar.";
	}
	?>
</body>
</html>