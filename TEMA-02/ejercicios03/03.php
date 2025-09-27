<?php

    $arr = ["El mundo today" => "https://www.elmundotoday.com/",
            "El pais" => "https://www.elmundo.es/",
            "Diario publico" => "https://www.publico.es/",
            "Libertad Digital" => "https://www.libertaddigital.com/",
            "El confidencial" => "https://www.elconfidencial.com/"
        ];

    $key = array_rand($arr);

    echo '<ul> <li><a href="' . $arr[$key] . '" target="_blank">';
    echo " $key </li> </ul>";
?>