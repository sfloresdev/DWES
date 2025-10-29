
<?php

function elegirPalabra()
{
	static $tpalabras = ["Madrid", "Sevilla", "Murcia", "Málaga", "Mallorca", "Menorca"];
	return array_rand($tpalabras);    
}

function comprobarLetra($letra, $cadena){
	return strpos($cadena, $letra);
}

function generaPalabraconHuecos($letra_usuario, $cadena)
{
	for ($i = 0; $i < strlen($cadena); $i++) {
		$resu[$i] = '-';
	}
	return $resu;
}


?>