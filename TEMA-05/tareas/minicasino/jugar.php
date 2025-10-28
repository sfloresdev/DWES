<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugar</title>
</head>
<body>

    <p><?= $msg ?? '' ?></p>

    <label>Dispone de <?= $dinero ?> para jugar</label><br>
    
    <form method="POST">
        <label for="cantidad_apostar">Cantidad a apostar: </label>
        <input type="number" name="apuesta" id="apuesta" required>

        <label>Tipo de apuesta: </label>
        <input type="radio" name="tipo" value="par" required> Par
        <input type="radio" name="tipo" value="impar" required> Impar
        <br><br>

        <input type="submit" name="accion_jugar" value="Apostar">
        <input type="submit" name="accion_jugar" value="Abandonar">
    </form>
</body>
</html>












