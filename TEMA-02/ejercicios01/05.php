<?php

    echo "1º Numero: " . $numero1 = mt_rand(1, 10);
    echo " | 2º Numero: " . $numero2 = mt_rand(1, 10). "<br>";

    $suma = $numero1 + $numero2;
    $resta = $numero1 - $numero2;
    $multi = $numero1 * $numero2;
    $division = $numero1 / $numero2;
    $modulo = $numero1 % $numero2;
    $potencia = pow($numero1, $numero2);

    echo '<table border="1" cellpading="5" cellspacing = "0">';
    echo <<<FFO
    <tr>
        <th>Operacion</th>
        <th>Resultado</th>
    </tr>
    <tr>
        <td>$numero1 + $numero2</td>
        <td>$suma</td>
    </tr>
    <tr>
        <td>$numero1 - $numero2</td>
        <td>$resta</td>
    </tr>
    <tr>
        <td>$numero1 * $numero2</td>
        <td>$multi</td>
    </tr>
    <tr>
        <td>$numero1 / $numero2</td>
        <td>$division</td>
    </tr>
    <tr>
        <td>$numero1 % $numero2</td>
        <td>$modulo</td>
    </tr>
    <tr>
        <td>$numero1 ** $numero2</td>
        <td>$potencia</td>
    </tr>
    FFO;
    echo "</table> <br>";

    $operaciones = [
        "$numero1 + $numero2" => $numero1 + $numero2, 
        "$numero1 - $numero2" => $numero1 - $numero2,
        "$numero1 * $numero2" => $numero1 * $numero2,
        "$numero1 / $numero2" => $numero1 / $numero2,
        "$numero1 % $numero2" => $numero1 % $numero2,
        "$numero1 ** $numero2"=> pow($numero1, $numero2)
    ];


    echo <<<TABLE
    <table border="1" cellpading="5" cellspacing = "0">
        <tr>
            <th>Operacion</th>
            <th>Resultado</th>
        </tr>
    TABLE;

    foreach($operaciones as $op => $resultado){
        echo "<tr><td>$op</td><td>$resultado</td></tr>";
    }

    echo "</table>";
?>