<?php

$tnums = [1=> "uno", "dos", "tres", "cuatro", "cinco", "seis", "siete", "ocho", "nueve", "diez"];

$tablafinal = [];

foreach($tnums as $k => $v){
	$resultados = [];
	for ($i = 0; $i <= 10; $i++){
		$resultados[$i] = $k * $i; 
	}
	$tablafinal[$v] = $resultados;
}

echo "<pre><code>";
var_dump($tablafinal);
echo "</pre></code>";
?>