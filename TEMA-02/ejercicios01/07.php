<?php
    $table = '';

    function drawBar($length){
        //Generar un color aleatorio usando "sprintf" para darle formato hexadecimal
        $tableColor = sprintf("#%02X%02X%02X", mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
        $times = '';
        for ($i = 0; $i <= $length; $i++){
            $times .= "<td></td>";
        }
        $length = $length * 4;
        //Imprimimos la tabla, todas con el mismo formato
        //Lo hacemos las N veces que nos pasen como argumento 
        echo <<<TABLE
        <table cellpadding="5" cellspacing="0" style="background-color: $tableColor; display: inline-block; vertical-align: bottom; margin-right: 5px; border-collapse: collapse;">
            <tr>
                <td>($length)</td>
                $times
            </tr>
        </table><br>
        TABLE;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="5">
    <title>Barras aleatorias</title>
</head>
<body>
    <div id="contenedor">
<?php
drawBar(mt_rand(10, 100));
drawBar(mt_rand(10, 100));
drawBar(mt_rand(10, 100));
?>
</body>
</html>