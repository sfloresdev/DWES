<?php
function sumar(int $valor1, int $valor2) {
    $resultado = $valor1 + $valor2;
    return $resultado;
}

function restar($valor1, $valor2){
    $resultado = $valor1 - $valor2;
    return $resultado;
}

function division($valor1, $valor2){
    $resultado = $valor1 / $valor2;
    return $resultado;
}

function multiplicar($valor1, $valor2){
    $resultado = $valor1 * $valor2;
    return $resultado;
}

function modulo($valor1, $valor2){
    $resultado = $valor1 % $valor2;
    return $resultado;
}

function potencia($valor1, $valor2){
    $resultado = 1;
    for ($i = 1; $i <= $valor2; $i++){
        $resultado *= $valor1;
    }
    return $resultado;
}
?>