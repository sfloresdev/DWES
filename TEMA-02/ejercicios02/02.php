<?php

    require_once("funcionesvar.php");

    $num = mt_rand(1, 10);
    $num2 = mt_rand(1, 10); 

    echo "Numeros generados: $num <br>";
    echo "Numeros generados: $num2 <br><br>"; 

    $result = sumar($num, $num2);
    echo "$result <br>";
    $result = restar($num, $num2);
    echo "$result <br>";
    $result = division($num, $num2);
    echo "$result <br>";
    $result = multiplicar($num, $num2);
    echo "$result <br>";
    $result = modulo($num, $num2);
    echo "$result <br>";
    $result = potencia($num, $num2);
    echo "$result <br>";
?>