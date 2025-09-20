<?php
function generateColor(): string{
    
    $color = "";

    switch (mt_rand(1, 5)){
        case 1:
            $color = "red";
            break;
        case 2:
            $color = "blue";
            break;
        case 3:
            $color = "green";
            break;
        case 4:
            $color = "black";
            break;
        default:
            $color = "white";
            break;
    }
    return $color;
}

generateColor();

function generateTable(){
    $rows = 10;
    $columns = 10;

    echo '<table style="border-collapse: collapse; margin: 20px auto;">';
    for ($i = 0; $i < $rows; $i++){
        echo "<tr>";
        for ($j = 0; $j < $columns; $j++){
            echo '<td style="background-color: ' . generateColor() . '; width: 30px; height: 30px; border: 1px solid black;"></td>';
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