<?php
    $count = 0;
    $numberCount = 0;
    $inicio = microtime(true);

    while ($count != 3){
        $numberCount++;
        if (mt_rand(1, 10) == 6)
            $count++;
        else
            $count = 0;
    }
    $tiempo = (microtime(true) - $inicio) * 1000;

    echo "Han salido tres 6 seguidos tras generar <strong>$numberCount</strong> numeros en <strong>" . number_format($tiempo, 3) . "</strong> milisegundos";
?>