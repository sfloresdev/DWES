<?php
if (isset($_GET['num1']) && isset($_GET['num2'])) {
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
}
if (isset($_GET['operador']))
    $operador = $_GET['operador'];

$base = $_GET['format'];
$result = 0;


switch ($operador) {
    case '+':
        $result = sumar($num1, $num2, $base);
        break;

    case '-':
        $result = restar($num1, $num2, $base);
        break;

    case '*':
        $result = multiplicar($num1, $num2, $base);
        break;

    case '/':
        $result =  dividir($num1, $num2, $base);
        break;
    default:
        echo "Operacion no definida";
}

function sumar($num1, $num2, $base)
{
    if ($base == 10)
        return $num1 + $num2;

    if ($base == 16) {
        $num1 = hexdec($num1);
        $num2 = hexdec($num2);
        return dechex($num1 + $num2);
    } else {
        $num1 = bindec($num1);
        $num2 = bindec($num2);
        return decbin($num1 + $num2);
    }
}

function restar($num1, $num2, $base)
{
    if ($base == 10)
        return $num1 - $num2;

    if ($base == 16) {
        $num1 = hexdec($num1);
        $num2 = hexdec($num2);
        return dechex($num1 - $num2);
    } else {
        $num1 = bindec($num1);
        $num2 = bindec($num2);
        return decbin($num1 - $num2);
    }
}

function multiplicar($num1, $num2, $base)
{
    if ($base == 10)
        return $num1 * $num2;

    if ($base == 16) {
        $num1 = hexdec($num1);
        $num2 = hexdec($num2);
        return dechex($num1 * $num2);
    } else {
        $num1 = bindec($num1);
        $num2 = bindec($num2);
        return decbin($num1 * $num2);
    }
}

function dividir($num1, $num2, $base)
{
    if ($base == 10)
        return $num1 / $num2;

    if ($base == 16) {
        $num1 = hexdec($num1);
        $num2 = hexdec($num2);
        return dechex($num1 / $num2);
    } else {
        $num1 = bindec($num1);
        $num2 = bindec($num2);
        return decbin($num1 / $num2);
    }
}
