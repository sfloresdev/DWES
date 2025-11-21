<?php 
function ordenar($x, $y): int{
	return intval($x[3]) - intval($y[3]);
}

$tabla_inicial = file("incidencias.txt");

$tabla_aux = [];

foreach( $tabla_aux as $linea){
	$tabla_aux[] = explode(',', $linea);
}

/*
$fichero = fopen("incidencias.txt", 'r');
while ($valores = fgetcsv($fichero)){
	$tabla_aux[] = explode(',', $linea);	
}
*/

echo $tabla_aux[2][1];
usort($tabla_aux, "ordenar");

$tabla_ordenada = [];
foreach($tabla_aux as  $valores){
	$linea = implode(',', $linea);
	$tabla_ordenada[] = $linea;
}

$resu = @file_put_contents("incidencias_ordenadas.txt", $tabla_ordenada, FILE_APPEND);
echo "Se ha generado el fichero ordenado.";
?>