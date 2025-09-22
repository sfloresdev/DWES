<?php

    $length = mt_rand(1, 9);

    /*
    for ($i = 0; $i <= $length; $i++){
        for ($j = 0; $j < $i; $j++){
            if ($i % 2 == 0){
                echo '<span style= "color: red">' . $i . '</span>';
            } else {
                echo '<span style= "color: blue">' . $i . '</span>';
            }
        }
        echo "<br>";
    }
    */

    for ($i = 0; $i <= $length; $i++){
        $color = ($i % 2 == 0) ? 'red' : 'blue';
        for ($j = 0; $j < $i; $j++){
            echo '<span style= "color:' . $color . '">' . $i . '</span>';
        }
        echo "<br>";
    }
?>