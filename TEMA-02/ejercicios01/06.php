<?php
    $number = mt_rand(1, 10);
    $filas = '';
    const BASE = 10;

    for ($i = 1; $i <= BASE; $i++){
        $filas .= "<tr><td>$number x $i</td><td>" . ($number * $i) . "</td></tr>";
    }

    echo <<<FFO
    <div style="font-family: Arial, sans-serif; text-align: center; margin-top: 20px;">
        <h2>TABLA DE MULTIPLICAR</h2>
        <table border="1" cellpadding="5" cellspacing="0" style="margin: 0 auto; border-collapse: collapse; background-color: #f9f9f9;">
            <caption style="font-weight: bold; margin-bottom: 10px;">Tabla del $number</caption>
            <tbody>
            $filas
            </tbody>
        </table>
    </div>
    FFO;
?>