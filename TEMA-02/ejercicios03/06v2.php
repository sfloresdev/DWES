<?php

include "infopaises.php";

$end = sizeof($paises);
sort($paises);

print_r(end($paises));


// Criterio de ordenacion propio
function shortCoutry($pais1, $pais2){
    return ($pais1['Poblacion'] - $pais1['Poblacion'] );
}


?>