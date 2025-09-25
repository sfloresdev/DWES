<?php

    $arr = ["El mundo today" => "https://www.elmundotoday.com/",
            "El pais" => "https://www.elmundo.es/",
            "Diario publico" => "https://www.publico.es/",
            "Libertad Digital" => "https://www.libertaddigital.com/",
            "El confidencial" => "https://www.elconfidencial.com/"
        ];

    print_r($arr); 

    function randomNewspaper(&$arr): array {
        $keys = array_keys($arr);
        
        shuffle($keys);

        foreach($keys as $key){
            $new[$key] = $arr[$key];
        }
        return $new;
    }
    echo "<br><br><br><br>";
    print_r(randomNewspaper($arr));

    //$periodico = array_map(fn($key, $value) => "", $arr, array_keys($arr));
?>