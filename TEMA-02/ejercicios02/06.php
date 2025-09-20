<?php
    // una almena está formada dos filas de  cuatro asterisco, 
    // y entre almena y almena hay un  espacio.
    const ALMENA = 5;

    function generateWall($almenas){
        $times = $almenas * ALMENA;
        for ($i = 1; $i <= $almenas; $i++){
            for ($j = 0; $j < $times; $j++) {
                if ($i == $almenas) {
                    for ($k = 1; $k <= $times; $k++){
                        echo "*";
                    }
                    break;
                }
                if ($j % ALMENA == 0){
                    echo "&nbsp;";
                }
                echo "*";
            }
            echo "<br>";
        }
    }
    echo "<code>";
    generateWall(5);
    echo "</code>";
?>