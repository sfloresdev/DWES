<?php

 include "infopaises.php";

 $claves = array_rand($paises, 2);

 $dosPaises = [
    $claves[0] => $paises[$claves[0]],
    $claves[1] => $paises[$claves[1]]
 ];


 foreach($dosPaises as $pais => $info){
    echo 'Pais: ' . $pais . ' - Enlace a maps: <a href="https://www.google.es/maps/place/' . strtolower($pais) . '">PINCHA AQUI</a><br>';
    echo 'Y sus ciudades son ' . implode(", ", $ciudades[$pais]) . "<br><br>";
 }
?>