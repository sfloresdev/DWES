<?php
define('FICHERO_BICIS', 'Bicis.csv');
require_once "BiciElectrica.php";
// cargarbicis
function cargabicis(): array
{
	$fichero = @fopen(FICHERO_BICIS, 'r');

	if (!$fichero)
		die("Error al abrir el archivo");

	$tabla = [];
	while ($datos_bici = fgetcsv($fichero)) {
		$bici = new BiciElectrica($datos_bici[0], $datos_bici[1], $datos_bici[2], $datos_bici[3], $datos_bici[4]);
		$tabla[] = $bici;
	}
	return $tabla;
}

function mostrarTablaBicis($tabla): string
{

	$cadena = "<table><th>Id</th><th>Coord X</th><th>Coord Y</th><th>Bateria</th>";

	foreach ($tabla as $bici) {
		if ($bici->operativa) {
			$cadena .= "<tr>";
			$cadena .= "<td>" . $bici->id . "</td>";
			$cadena .= "<td>" . $bici->coord_x . "</td>";
			$cadena .= "<td>" . $bici->coord_y . "</td>";
			$cadena .= "<td>" . $bici->bateria . "%</td>";
			$cadena .= "</tr>";
		}
	}
	$cadena .= "</table>";
	return $cadena;
}

function biciMasCercana($x, $y, $tabla): mixed
{

	$bici_min = NULL;
	$distancia_minima = PHP_INT_MAX;

	foreach ($tabla as $bici) {
		if ($bici->operativa) {
			if ($bici->distancia($x, $y) < $distancia_minima) {
				$bici_min = $bici;
				$distancia_minima = $bici->distancia($x, $y);
			}
		}
	}
	return $bici_min;
}

// Programa principal
$tabla = cargabicis();
if (!empty($_GET['coordx']) && !empty($_GET['coordy'])) {
$biciRecomendada = biciMasCercana($_GET['coordx'], $_GET['coordy'], $tabla);
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>MOSTRAR BICIS OPERATIVAS</title>
	<style>
		table,
		th,
		td {
			border: 1px solid black;
		}
	</style>

</head>

<body>
	<h1> Listado de bicicletas operativas </h1>
	<?= mostrarTablaBicis($tabla); ?>
	<?php if (isset($biciRecomendada)) : ?>
		<h2> Bicicleta disponible más cercana es <?= $biciRecomendada ?> </h2>
		<button onclick="history.back()"> Volver </button>
	<?php else : ?>
		<h2> Indicar su ubicación: <h2>
				<form>
					Coordenada X: <input type="number" name="coordx"><br>
					Coordenada Y: <input type="number" name="coordy"><br>
					<input type="submit" value=" Consultar ">
				</form>
			<?php endif ?>
</body>

</html>