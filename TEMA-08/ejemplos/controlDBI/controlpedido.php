<?php
include_once "datos/AccesoDatos.php";
include_once "datos/Cliente.php";
include_once "datos/Pedido.php";

$nombre = $_GET['nombre'];
$clave = $_GET['clave'];

$AC = AccesoDatos::getModelo();
$cli = $AC->getCliente($nombre, $clave);

if ($cli) {
	$tpedidos = $AC->getPedido($cli->cod_cliente);
	$AC->incrementarVeces($cli->cod_cliente);
	$msg = "Mostrando datos del cliente " . $cli->cod_cliente. "Total: " . count($tpedidos);
	include "vistas/vistapedidos.php";
} else {
	$msg  = "Error: NO se ha podido realizar la accion";
	include_once "vistas/vistaerror.php";
}
