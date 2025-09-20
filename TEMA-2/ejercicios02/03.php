<?php

    require_once("funcionesref.php");

    $num = mt_rand(1, 10);
    $num2 = mt_rand(1, 10); 
    $value = 0;

    echo "Numeros generados: $num <br>";
    echo "Numeros generados: $num2 <br><br>";


    sumar($num, $num2, $value);
    echo "$value <br>";

    restar($num, $num2, $value);
    echo "$value <br>";

    division($num, $num2, $value);
    echo "$value <br>";

    multiplicar($num, $num2, $value);
    echo "$value <br>";

    modulo($num, $num2, $value);
    echo "$value <br>";

    potencia($num, $num2, $value);
    echo "$value <br>";



?>