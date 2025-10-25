<?php
define('SEMANA', time() + 7 * 24 * 3600);
$edad = "";
if (isset($_POST['edad'])) {
	$edad = $_POST['edad'];
	setcookie("edad", $edad, SEMANA);
} else {
	if (isset($_COOKIE['edad'])) {
		$edad = $_COOKIE['edad'];
	}
}
?>

<html>

<head>
	<meta charset="UTF-8">
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f5f5f5;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
			margin: 0;
		}

		#container {
			width: 380px;
			background-color: #fff;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
			border-radius: 10px;
			padding: 20px;
		}

		#header {
			text-align: center;
			margin-bottom: 20px;
		}

		#header h1 {
			font-size: 20px;
			color: #333;
			margin: 0;
		}

		fieldset {
			border: 1px solid #ccc;
			border-radius: 8px;
			padding: 15px;
			background-color: #fafafa;
		}

		form label {
			font-weight: bold;
			display: inline-block;
			margin-top: 10px;
		}

		input[type="number"],
		select {
			width: 100%;
			padding: 6px;
			margin-top: 5px;
			margin-bottom: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-sizing: border-box;
		}

		input[type="radio"] {
			margin-left: 10px;
			margin-right: 5px;
		}

		button {
			background-color: #007bff;
			color: white;
			border: none;
			padding: 10px 15px;
			margin: 8px 5px 0 0;
			border-radius: 5px;
			cursor: pointer;
			transition: background-color 0.3s;
		}

		button:hover {
			background-color: #0056b3;
		}
	</style>
</head>

<body>
	<div id="container">
		<div id="header">
			<h1>SUS DATOS ALMACENADOS</h1>
		</div>

		<div id="content">
			<fieldset>
				<form method="post">
					<label>Edad</label>
					<input type="number" name="edad" value="<?=$edad?>"><br>

					Género:<br>
					<label> Mujer </label>
					<input type="radio" name="genero" value="Mujer">
					<label> Hombre</label>
					<input type="radio" name="genero" value="Hombre">
					<br>

					<label>Deportes</label><br>
					<select name="deportes[]" multiple="multiple" size="3">
						<option value="Futbol">Futbol</option>
						<option value="Tenis">Tenis</option>
						<option value="Ciclismo">Ciclismo</option>
						<option value="Otro">Otro</option>
					</select>
					<br>

					<button name="orden" value="Confirmar">Almacenar valores</button>
					<button name="orden" value="Eliminar" style="background-color: #dc3545;">Eliminar valores</button>
				</form>
			</fieldset>
		</div>
	</div>
</body>

</html>