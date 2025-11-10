<?php
include_once 'util.php';
session_start();

$mensaje = "";

if (!isset($_POST['orden'])) {
	include_once 'vistas/acceso.php';
	exit();
}

if ($_POST['orden'] ==  "entrar") {
	// Campos de usuario y contraseña rellenos
	// con valores correctos
	// Actualizo variable de sesión
	// Si falla muestro acceso.php
	if (empty($_REQUEST['username']) || empty($_REQUEST['password'])) {
		$mensaje = "Usuario o contraseña vacios";
		include_once "vistas/acceso.php";
	} else {
		if (userOk($_REQUEST['username'], $_REQUEST['password'])) {
			$_SESSION['usuario'] = $_REQUEST['username'];
			include_once 'vistas/cambiarcontra.php';
		} else {
			$mensaje = "Usuario o contraseña incorrectos";
			include_once "vistas/acceso.php";
		}
	}
}

if ($_POST['orden'] ==  "cambiar") {
	// Comprobar que los campos están llenos
	// Se cambian si la contraseña antigua es correcta
	// Y las nuevas contraseñas son iguales sino volvemos
	// a mostrar cambiarcontra
	// si falla muestro cambiarcontra.php
	$error = false;
	if (
		!isset($_REQUEST['password'])
		|| !isset($_REQUEST['password1'])
		|| !isset($_REQUEST['password2'])
	) {
		$mensaje = "Alguno de los cambios esta vacio";
		$error = true;
	} elseif (!userOk($_SESSION['usuario'], $_REQUEST['password'])){
		$mensaje = "La contraseña no es correcta";
		$error = true;
	} elseif ($_REQUEST['password1'] !== $_REQUEST['password2']){
		$mensaje = "Las contraseñas no coinciden";
		$error = true;
	}

	if ($error){
		include_once "vistas/cambiarcontra.php";
	} else {
		if (updatePasswd($_SESSION['usuario'], $_REQUEST['password1'])) {
			include_once 'vistas/resultado.php';
		} else {
			$mensaje = "Error al actualizar la contraseña";
			include_once "vistas/cambiarcontra.php";
		}
	}
}
