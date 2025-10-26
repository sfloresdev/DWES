<div>
<b> Detalles:</b><br>
<table>
<tr><td>Longitud:          </td><td><?= strlen($_REQUEST['comentario']) ?></td></tr>
<tr><td>Nº de palabras:    </td><td><?= str_word_count($_REQUEST['comentario']) ?></td></tr>
<tr><td>Letra + repetida:  </td><td><?= mostRepeatedLetter($_REQUEST['comentario'] ?? '') ?></td></tr>
<tr><td>Palabra + repetida:</td><td><?= mostRepeatedWord($_REQUEST['comentario'] ?? '') ?></td></tr>
</table>
</div>


<?php

function    mostRepeatedWord($string): string{
    $palabras = str_word_count($string, 1);
    $frecuencia = array_count_values($palabras);
    if(!$frecuencia)
        return "";
    arsort($frecuencia);
    return array_key_first($frecuencia);
}


function     mostRepeatedLetter($string): string {

    strtolower($string);
    $frecuencia = [];

    for ($i = 0; $i < strlen($string); $i++){
        $letra = $string[$i];

        if (ctype_alpha($letra)){
            if (!isset($frecuencia[$letra]))
                $frecuencia[$letra] = 1;
            else
                $frecuencia[$letra]++;
        }
    }
    if (empty($frecuencia))
        return ""; 
    arsort($frecuencia);
    return array_key_first($frecuencia);
    //Otra forma
    /*
      for ($i = 0; $i < strlen($string); $i++){
        $letra = $string[$i];
        if (ctype_alpha($letra)){
            if (!isset($frecuencia[$letra]))
                $frecuencia[$letra] = ($frecuencia[$letra] ?? 0) + 1;
        }
    }*/
}
?>