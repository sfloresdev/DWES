<?php
    $arr = ["El mundo today" => "https://www.elmundotoday.com/",
            "El pais" => "https://www.elmundo.es/",
            "Diario publico" => "https://www.publico.es/",
            "Libertad Digital" => "https://www.libertaddigital.com/",
            "El confidencial" => "https://www.elconfidencial.com/"
        ];

    foreach($arr as $key => $value){
        $periodicos .= '<li><a href="' . $value . '" target="_blank">' . $key . "</a></li>";    
    }

    echo <<<TABLE
    <ul>
        $periodicos
    </ul>
    TABLE;
    
    /*
     - Toda la funcionalidad del foreach, pero en una linea.
     - Parametros: array_map($funcionAplicar, $array1, array ...$arrays): array;
     - Puedes hacer con funcion anonima o llamar a una funcion externa
    $periodicos = array_map(fn($key, $value) => "<li><a href='$key' target='_blank'>$value</a></li>", $arr, array_keys($arr));

    echo "<ul>";
        echo implode("", $periodicos);
    echo "</ul>";
    */
?>