<?php
    //Definimos array de 1 a N rellenado con 0
    $arr = array_fill(1, 20, 0);
    //Rellenamos el array con numero aleatorios (1, 10)
    for ($i = 1; $i <= count($arr); $i++){
        $arr[$i] = mt_rand(1, 10);
    }

    $parts[] = '<table style="width: 60%; border-collapse:collapse; text-align:center; border:1px solid #ddd;">';
    $parts[] = "<tr>";
            foreach(array_keys($arr) as $key){
                $parts[] = '<td style="color: blue">Indice: ' .  $key . "</td>";
            }
    $parts[] = "</tr>";
    $parts[] = "<tr>";
            foreach($arr as $key => $value){
                $parts[] = "<td>" . $value . "</td>";
            }
    $parts[] = "</tr>";
    $parts[] = "</table>";

    echo implode(" ", $parts);

    echo "Maximo: " . max($arr) . "<br>";
    echo "Minimo: " . min($arr) . "<br>";


    $values = array_count_values($arr);
    echo print_r(array_count_values($arr)) . "<br>";

    arsort($values, SORT_NUMERIC);

    echo print_r($values);

    echo "<br>Moda: " . print_r($arr[1]);
?>