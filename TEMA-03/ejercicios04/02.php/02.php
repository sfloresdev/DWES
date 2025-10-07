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
        $result = $num1 + $num2;
        $result = base($base, $result);
        break;

    case '-':
        $result = $num1 - $num2;
        $result = base($base, $result);
        break;

    case '*':
        $result = $num1 * $num2;
        $result = base($base, $result);
        break;

    case '/':
        $result = $num1 / $num2;
        $result = base($base, $result);
        break;
        
    default:
        $result = "Operacion no definida";
}

echo "<p>El resultado es $result</p>";

function base($base, $total)
{
    if ($base == 10)
        return $total;
    if ($base == 16) {
        return dechex($total);
    } else {
        return decbin($total);
    }
}
