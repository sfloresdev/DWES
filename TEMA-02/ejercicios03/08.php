<?php
        
    include "infopaises.php";

    echo "<table> <tr><th>Nombre</th><th>Capital</th><th>Poblacion</th><th>Ciudades</th></tr>";

    foreach ($paises as $pais => $info){

        $capital = $info['Capital'];
        $poblation = $info['Poblacion'];

        echo "<tr><td>$pais</td><td>$capital</td><td>$poblation</td><td>" . implode(", ", $ciudades[$pais]) . "</td></tr>";
    }
    echo "</table>";

?>