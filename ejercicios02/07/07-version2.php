<?php
const ROWS = 10;
const COLUMNS = 10;

function generateColor(): array{
    return [
        mt_rand(1, 255),
        mt_rand(1, 255), 
        mt_rand(1, 255)
    ];
}

function generateTable(){
    echo '<table style="border-collapse: collapse; margin: 20px auto;">';
    for ($i = 0; $i < ROWS; $i++){
        echo "<tr>";
        for ($j = 0; $j < COLUMNS; $j++){
            echo '<td style="background-color: rgb(' . implode(", ", generateColor()) . '); width: 30px; height: 30px; border: 1px solid black;"></td>';
        }
        echo "</tr>";
    }
    echo "</table>";
}

$start = hrtime(true);

generateTable();

$finish = hrtime(true);
$time_miliseconds = ($finish - $start) / 1_000_000;
echo "Tabla generada en $time_miliseconds milisegundos";
?>