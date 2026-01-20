<?php
include_once "AccesoDatos.php";
include_once "Cliente.php";
include_once "Pedido.php";

if (empty($_GET['nombre']) || empty($_GET['password'])) {
    // Mensaje de error indicando de debe poner usuario y contraseña
    // Mostrar vistaerror.php
    $contenido = "<h1>Debe introducir un usuario y contraseña<h1>";
    include_once "vistaerror.php";
    exit();
}

$ac = AccesoDatos::initModelo();
$nombre = $_GET['nombre'];
$clave = $_GET['password'];

$cli = $ac->checkUser($nombre, $clave);
if ($cli == null) {
    $contenido = "<h1>Los datos de inicio de sesion son incorrectos <h1>";
    include_once "vistaerror.php";
    exit();
}

// Actualizar el contador de visitas
$ac->updateVisits($cli->cod_cliente);
// Mostrar la informacion del usuario
$lista = $ac->userOrders($cli->cod_cliente);
// Cerrar la conexion a la BD
$ac->close();
include_once("vistapedidos.php");
