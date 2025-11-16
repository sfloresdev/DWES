<?php

$tnums = [1=> "uno", "dos", "tres", "cuatro", "cinco", "seis", "siete", "ocho", "nueve", "diez"];

$resultados = [];
foreach($tnums as $k => $v){
	$tablafinal = [];
	for ($i = 0; $i <= 10; $i++){
		$resultados[$i] = $k * $i; 
	}
	$resultados[$v] = $resultados;
}

echo "<pre><code>";
var_dump($tablafinal);
echo "</pre></code>";
?>