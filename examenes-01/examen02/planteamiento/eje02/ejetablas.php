<?php

// DATOS DE PRUEBA
$precios = [250, 10, 50, 100, 50, 25, 5, 200, 10, 300, 50];
// Definimos rangos: 'Barato' hasta 10 inclusive, 'Medio' hasta 100, 'Caro' más de 100
$categorias = ['Barato', 'Medio', 'Caro'];

// LLAMADAS A FUNCIONES
$res1 = agruparPorCategoria($precios, $categorias);
echo "<pre>";
print_r($res1);
echo "</pre>";

$preciosRandom = generarDatos(1, 500, 20);
$res2 = agruparPorCategoria($preciosRandom, $categorias);
echo "<pre>";
print_r($res2);
echo "</pre>";

/**
 * Agrupa los precios según si son menores o iguales al valor de la categoría
 * En array tiene que estar los datos ORDENADOS de mas baratos a más caros
 * @param array $precios Lista numérica
 * @param array $categorias Array asociativo con los nombre de las categorias
 * @return array Array multidimensional
 */
function agruparPorCategoria($precios, $categorias): array
{
	$resultado = [];
	sort($precios);
	foreach ($categorias as $c) {
		$resultado[$c] = [];

		foreach ($precios as $precio) {
			if ($c == "Barato" && $precio <= 10)
				$resultado[$c][] = $precio;
			else if ($c == "Medio" && $precio > 10 && $precio <= 100)
				$resultado[$c][] = $precio;
			else if ($c == "Caro" && $precio > 100)
				$resultado[$c][] = $precio;
		}
	}
	return $resultado;
}

function generarDatos($min, $max, $nunelementos): array
{
	$resultado = [];
	for ($i = 0; $i <= $nunelementos; $i++) {
		$resultado[$i] = mt_rand($min, $max);
 	}

	return $resultado;
}
