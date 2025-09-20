<?php
function generateTable(){
    $rows = 10;
    $columns = 10;
    $colors = ["red", "green", "blue", "black", "white"];

    $parts = ['<table style="border-collapse: collapse; margin: 20px auto;">'];
    for ($i = 0; $i < $rows; $i++){
        $parts[]= "<tr>";
        for ($j = 0; $j < $columns; $j++){
            $color = $colors[array_rand($colors)];
            $parts[] = '<td style="background-color: ' . $color . '; width: 30px; height: 30px; border: 1px solid black;"></td>';
        }
        $parts[] = "</tr>";
    }
    $parts[] = "</table>";

    echo implode('', $parts);
}

$start = hrtime(true);

generateTable();

$finish = hrtime(true);
$time_miliseconds = ($finish - $start) / 1_000_000;

echo "Tabla generada en $time_miliseconds milisegundos";
?>