<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    $valor1 = mt_rand(1,10);
    $valor2 = mt_rand(1,10);
    $total = 1;
    for ($i = 1; $i <= $valor2; $i++){
        $total *= $valor1;
    }

    echo "$valor1 - $valor2 = " . $valor1 - $valor2 . "<br>";
    echo "$valor1 + $valor2 = " . $valor1 + $valor2 . "<br>";
    echo "$valor1 / $valor2 = " . $valor1 / $valor2 . "<br>";
    echo "$valor1 % $valor2 = " . $valor1 % $valor2 . "<br>";
    echo "$valor1 ** $valor2 = " . $total;
?>
</body>
</html>