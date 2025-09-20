<?php

function elMayor(int $a, int $b, int &$c): int{
    
    if ($a == $b) {
        $c = 0;
        return $c;
    } else if ($a > $b) {
        $c = $a;
        return $c;
    } else  {
        $c = $b;
        return $c;
    }
}
$num1 = 12;
$num2 = 8;
$num3 = 27;

echo "a: $num1,  b: $num2,  c: $num3 <br><br>";


elMayor($num1, $num2, $num3);


echo "a: $num1,  b: $num2,  c: $num3";

// Se debe de pasar como valor las variables $a y $b, $c por referecia
// ya que es donde queremos guardar el valor tras las comparaciones
// en caso de no ser asi, no almacenaria ese valor dentro de la direccion 
// y al imprimirlo de nuevo, no veriamos los cambios realizados.
?>
