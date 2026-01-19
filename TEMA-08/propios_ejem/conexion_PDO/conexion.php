<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    $dsn = 'mysql:host=localhost;dbname=pruebas';
    $user = 'root';
    $password = '';

    try {
        // Instanciamos la clase
        $pdo = new PDO($dsn, $user, $password);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

        $pdo->exec("SET CHARACTER SET utf8");

        $sql = "SELECT NOMBREARTICULO, SECCION, PRECIO, PAISDEORIGEN FROM PRODUCTOS WHERE NOMBREARTICULO = ?";

        $resultado = $pdo->prepare($sql);

    } catch (Exception $err) {
        die("Error: " . $err->getMessage());
    }

    ?>     
</body>

</html>