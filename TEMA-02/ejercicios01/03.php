<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $length = 5;  //mt_rand(1, 9);
        
        echo "<code>";
        for ($i = 0; $i <= $length ; $i++) {
            
            for ($k = 0; $k <= $length - $i; $k++){
                   
            }
            for ($j = 0; $j < $i; $j++){
                echo "*";
            }
            echo "<br>";
        }
        echo "</code>";

    ?>
</body>
</html>