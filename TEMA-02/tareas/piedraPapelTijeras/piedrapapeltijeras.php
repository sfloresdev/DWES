<?php

const PIEDRA1 = "&#x1F91C;";
const PIEDRA2 = "&#x1F91B;";
const TIJERAS = "&#x1F596;";
const PAPEL = "&#x1F91A;";

$jugador1 = mt_rand(1, 3);
$jugador2 = mt_rand(1, 3);

echo "$jugador1";
echo "  $jugador2<br>";

function piedraPapelTijeras($opcion, $jugador)
{
    switch($opcion)
    {
        case 1: return ($jugador === 1) ? PIEDRA1 : PIEDRA2;

        case 2: return TIJERAS;
            
        case 3: return PAPEL;

        default: "Otra opcion";
                break; 
    }
}

echo "Jugador 1: " . piedraPapelTijeras($jugador1, 1);

echo "Jugador 2: " . piedraPapelTijeras($jugador2, 2);
?>