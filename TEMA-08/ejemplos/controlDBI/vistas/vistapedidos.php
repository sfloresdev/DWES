<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pedido</title>
</head>
<body>
	
	Bienvenido usuario <?= $cli->nombre ?> <br>
	Ha entrado <?= $cli->veces ?> veces nuestra web <br>

	Esta lista de pedidos del cliente 

<table>

<?php

foreach($tpedidos as $pedido) {
	echo "<tr><td>" . $pedido->producto . "</td><td>" . $pedido->precio . "</td></tr>";
	$total += $pedido->precio;
}

echo "<tr><td>Total pedidos</td><td>" . $total . "</td></tr>";

?>
</table>



</body>
</html>