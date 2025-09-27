<?php 
    $arr = range(1, 49); // Crea un array del rango indicado
    shuffle($arr); // Mezclamos 
    $tirada = array_slice($arr, 1, 6); // Cortamos del 1 al 6
    //Garantizamos que ese numero solo sale una vez


    sort($tirada);
    echo '<table> <tr>';
    foreach($tirada as $key => $value){
        echo "<td>$value<td>";
    }
    echo '</tr></table>';
?>