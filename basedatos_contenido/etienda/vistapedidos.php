<?php
include_once "Pedido.php";
include_once "Cliente.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
</head>
<body>
    <p>Bienvenido/a <?php echo $cli->nombre;?> </p>
    <p>Has entrado <?php echo $cli->veces?> veces a nuestra web</p>

    <?php
    $total = 0; 
    if (count($lista) > 0 ): ?>
        <h3>Esta la lista de pedidos para el cliente con codigo <?php echo $cli->cod_cliente; ?></h3>
        <table border="1">
        <?php foreach($lista as $p): ?>
        <tr>
            <td><?= $p->producto; ?> </td>
            <td><?= $p->precio; ?></td>
        </tr>
        <?php $total += $p->precio; ?>
        <?php endforeach; ?>
        <tr>
            <td>Total pedidos: </td><td><?= $total ?></td>
        </tr>
        </table>
    <?php else: ?>
        <p>No existen pedidos para este cliente</p>
    <?php endif; ?>
</body>
</html>