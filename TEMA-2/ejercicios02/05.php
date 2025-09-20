<?php

function generateHTMLTable($rows, $columns, string $content) {
    echo '<table style="border:1px solid black; width:65%; margin:auto; border-collapse:collapse;">';
    for ($i = 0; $i < $rows; $i++){
        echo "<tr>";
        for ($j = 0; $j < $columns; $j++){
            echo '<td style="border:1px solid black;">' . $content . '</td>';
        }
        echo "</tr>";
    }
    echo "</table>";
}

generateHTMLTable(mt_rand(1, 10), mt_rand(1, 10), "ESPAÑA");

?>