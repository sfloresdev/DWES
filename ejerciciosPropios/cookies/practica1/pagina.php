<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar idioma</title>
</head>

<body>

    <?php

    if (isset($_COOKIE['idioma_seleccionado'])) {
        if ($_COOKIE['idioma_seleccionado'] == 'es')
            header("Location:espagnol.php");
        else if ($_COOKIE['idioma_seleccionado'] == 'in')
            header("Location:ingles.php");
    }
    ?>
    <table>
        <tr>
            <td align="center">
                <h1>Elige idioma</h1>
            </td>
        </tr>
        <tr>
            <td align="center"><a href="creaCookie.php?idioma=in"><img src="img/inglesa.svg" width="90" height="60"></a></td>
            <td align="center"><a href="creaCookie.php?idioma=es"><img src="img/espagnola.svg" width="90" height="60"></a></td>
        </tr>
    </table>
</body>

</html>