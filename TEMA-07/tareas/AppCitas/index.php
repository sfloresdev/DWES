<?php
include_once 'funciones.php';
session_start();

if(isset($_SESSION['tiempo_limite'])){
	if (time() > $_SESSION['tiempo_limite'])
		session_destroy();
	else{
		$_SESSION['tiempo'] = $_SESSION['tiempo_limite'] - time();
		include "bienvenido.php";
		exit();
	}
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	include "acceso.php";
} else {
	// Proceso el formulario
	$nombre = $_POST['username'];
	$clave  = $_POST['password'];
	$tiempo = $_POST['time'];
	if (accesoValido($nombre, $clave)) {
		$_SESSION['nombre'] = $nombre;
		$_SESSION['tiempo'] = $tiempo;
		$_SESSION['tiempo_limite'] = time() + $tiempo;
		anotarNuevoAcceso($nombre);
		registra($nombre, time());
		include "bienvenido.php";
	} else {
		$msg = "Nombre y contraseña incorrectos";
		include "acceso.php";
	}
}
