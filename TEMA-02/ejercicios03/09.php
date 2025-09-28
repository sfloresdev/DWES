<?php
$mesTemperaturas = [
    "enero" => 6,
    "febrero" => 10,
    "marzo" => 12,
    "abril" => 14,
    "mayo" => 16,
    "junio" => 20,
    "julio" => 25,
    "agosto" => 30,
    "septiembre" => 18,
    "octubre" => 15,
    "noviembre" => 14,
    "diciembre" => 8
];

echo "<table>";

foreach ($mesTemperaturas as $mes => $temperatura) {
    echo "<tr>";
    echo "<td style='border:1px solid #000; padding:8px;'>$mes</td><td style='border:1px solid #000; padding:8px;'>" . drawDiagram($temperatura) . "     " .  $temperatura . "ºC</td>";
    echo "</tr>";
}
echo "</table>";


function drawDiagram($times): string {
    $times /= 4;
    $bar = "";
    for ($i = 0; $i < $times; $i++) {
        $bar .= "<img src='green.jpg' width='45' height='20'>";
    }
    return "$bar";
}

?>
