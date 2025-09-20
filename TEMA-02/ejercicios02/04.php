<?php
    const COUNT = 50;
    $values = [];
    $media = 0;
    $suma = 0;

    for ($i = 0; $i < COUNT; $i++){
        $values[$i] = mt_rand(1, 100);
    }

    $maximo = $values[0];
    $minimo = $values[0];

    foreach($values as $n){
        $suma += $n;
        if ($n > $maximo) $maximo = $n;
        if ($n < $minimo) $minimo = $n;
    }

    $media = $suma / COUNT;


    echo <<<TABLE
    <table style="width:80%;margin:20px auto;border:1px solid black;border-collapse:collapse;text-align:center;font-family:Arial, sans-serif;">
        <tr style="background-color:#f2f2f2;">
            <th style="color: white; background-color:#1E1E2F; border:1px solid black;padding:8px;" colspan="2">Generación de 50 valores aleatorios</th>
        </tr>
        <tr>
            <td style="border:1px solid black;padding:8px;">Mínimo</td>
            <td style="border:1px solid black;padding:8px;">$minimo</td>
        </tr>
        <tr>
        <td style="border:1px solid black;padding:8px;">Máximo</td>
        <td style="border:1px solid black;padding:8px;">$maximo</td>
        </tr>
        <tr>    
        <td style="border:1px solid black;padding:8px;">Media</td>
        <td style="border:1px solid black;padding:8px;">$media</td>
        </tr>
        </table>
    TABLE;
?>
