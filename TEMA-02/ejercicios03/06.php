<?php

include "infopaises.php";

$maxPoblacion = 0;
$paisMasHabitantes = "";

foreach($paises as $pais => $info){
    $poblacion = $info['Poblacion'];

    if ($poblacion > $maxPoblacion){
        $maxPoblacion = $poblacion;
        $paisMasHabitantes = $pais;
    }

    /*
    if ($info['Poblacion'] > $maxPoblacion){
        $maxPoblacion = $pais;
        $paisMasHabitantes = $pais;
    }
    */
}

echo "El pais con mas habitantes es $paisMasHabitantes con: $maxPoblacion <br><br><br>";

echo "Ciudades: " . implode(", ", $ciudades[$paisMasHabitantes]). "<br><br><br>";
?>