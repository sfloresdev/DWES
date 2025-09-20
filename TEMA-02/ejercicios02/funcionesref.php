<?php
function sumar(int $valor1, int $valor2, &$resultado) {
    $resultado = $valor1 + $valor2;
}

function restar(int $valor1, int $valor2, &$resultado) {
    $resultado = $valor1 - $valor2;
}

function division(int $valor1, int $valor2, &$resultado){
    $resultado = $valor1 / $valor2;
}

function multiplicar(int $valor1, int $valor2, &$resultado){
    $resultado = $valor1 * $valor2;   
}
function modulo(int $valor1, int $valor2, &$resultado){
    $resultado = $valor1 % $valor2;
}

function potencia(int $valor1, int $valor2, &$resultado){
    $resultado = 1;
    for ($i = 1; $i <= $valor2; $i++){
        $resultado *= $valor1;
    }
}
?>