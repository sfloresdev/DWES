<?php
    $arr = [
        "Formula 1" => "img/f1.jpg",
        "WEC" => "img/wec.jpg",
        "IMSA" => "img/imsa.png",
        "Indycar" => "img/indycar.jpg",
        "WRC" => "img/wrc.png"
    ];
    
    echo '<table style= text-align:center; border:1px solid #000;>';
    foreach($arr as $key => $value){
        echo "<tr>
            <td style='border:1px solid #000; padding:8px;'>$key</td>
            <td style='border:1px solid #000; padding:8px;'>
                <img src='$value' width='200' height='100'>
            </td>
          </tr>";
    }
    echo "</table>";
?>