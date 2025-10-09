<?php
const MAXVALUES = 15;
const MAX_ROW_VALUES = 5;
const MAX_EMPTY_ROWS = 4;
const MAX = 90;
const MIN = 1;
const MAX_COLUMNS = 9;
const MAX_ROWS = 3;

$result1[] = "";
$result2[] = "";
$result3[] = "";

$oneValue = mt_rand(0, 1);
$valuesGenerated = array_fill(0, MAXVALUES, 0);
for ($i = 0; $i < count($valuesGenerated); $i++)
{
    $valuesGenerated[$i] = mt_rand(MIN, MAX);
}
sort($valuesGenerated);
//print_r($valuesGenerated);

echo "<table>";

    echo "<tr>";
    for ($i = 0; $i <= MAX_COLUMNS; $i++)
    {
        $result1[] = "<td>";


        $result1[] = "</td>";
    }

    echo "</tr>";

echo "</table>";


















































?>