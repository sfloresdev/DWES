<?php
const BLANCO = 255;
const ROWS = 10;
const COLUMNS = 10;
const CELLS = ROWS * COLUMNS;
const CELLS_MINUS_ONE = CELLS - 1;

function generateGradient($colorInicial, $porcentaje): array{
    /*
    $red = $colorInicial[0] + (BLANCO - $colorInicial[0]) * $porcentaje;
    $green = $colorInicial[1] + (BLANCO - $colorInicial[1]) * $porcentaje;
    $blue = $colorInicial[2] + (BLANCO - $colorInicial[2]) * $porcentaje;

    return [
        round($red),
        round($green),
        round($blue),
    ];
    */
    return [
        round($colorInicial[0] + (BLANCO - $colorInicial[0]) * $porcentaje),
        round($colorInicial[1] + (BLANCO - $colorInicial[1]) * $porcentaje),
        round($colorInicial[2] + (BLANCO - $colorInicial[2]) * $porcentaje),
    ]; 
}

function generateColor(): array{
    
    /*
    $color = array_fill(0, 3, 0);
    for ($i = 0; $i < 3; $i++){
        $color[$i] = mt_rand(1, 255);
    }
    return $color;
    */

    return [
        mt_rand(1, 255),
        mt_rand(1, 255),
        mt_rand(1, 255)
    ];
}

function generateTable(){
    $color = generateColor();
    $parts = ['<table style="border-collapse: collapse; margin: 20px auto;">'];
    for ($i = 0; $i < ROWS; $i++){
        $parts[] = "<tr>";
        for ($j = 0; $j < COLUMNS; $j++){
            $position = $i * COLUMNS + $j;
            $percentage = $position/CELLS_MINUS_ONE;
            $parts[] = '<td style="background-color: rgb(' . implode(", ", generateGradient($color, $percentage)) . '); width: 30px; height: 30px; border: 1px solid black;"></td>';
        }
        $parts[] = "</tr>";
    }
    $parts[] = "</table>";
    echo implode("", $parts);
}

$start = hrtime(true);
generateTable();

$finish = hrtime(true);
$time_miliseconds = ($finish - $start) / 1_000_000;
echo "Se ha generado la tabla en <strong>$time_miliseconds</strong>, milisegundos";
?>