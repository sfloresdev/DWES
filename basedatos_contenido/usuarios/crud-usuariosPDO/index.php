<?php
session_start();

include_once 'app/funciones.php';
include_once 'app/acciones.php';

define('TIEMPO_EXPIRACION', 20);

function sesionExpirada()
{
	if (isset($_SESSION['ultimo_acceso'])) {
		$tiempoInactivo = time() - $_SESSION['ultimo_acceso'];
		if ($tiempoInactivo > TIEMPO_EXPIRACION)
			return true;
	}
	return false;
}

if (sesionExpirada()) {
	session_unset();
	session_destroy();
	session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['clave'])) {
	if ($_POST['clave'] == '12345') {
		$_SESSION['usuario'] = true;
		$_SESSION['ultimo_acceso'] = time();
	} else {
		echo "Pin incorrecto";
		$_SESSION['usuario'] = false;
	}
}


if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== true) {
	include_once 'app/layout/formulariopin.php';
} else if ($_SESSION['usuario'] == true) {
	// Actualizar tiemp de ultimo acceso
	$_SESSION['ultimo_acceso'] = time();
	// Div con contenido
	$contenido = "";
	if ($_SERVER['REQUEST_METHOD'] == "GET") {

		if (isset($_GET['orden'])) {
			switch ($_GET['orden']) {
				case "Nuevo":
					accionAlta();
					break;
				case "Borrar":
					accionBorrar($_GET['id']);
					break;
				case "Modificar":
					accionModificar($_GET['id']);
					break;
				case "Detalles":
					accionDetalles($_GET['id']);
					break;
				case "Terminar":
					accionTerminar();
					break;
			}
		}
	}
	// POST Formulario de alta o de modificación
	else {
		if (isset($_POST['orden'])) {
			switch ($_POST['orden']) {
				case "Nuevo":
					accionPostAlta();
					break;
				case "Modificar":
					accionPostModificar();
					break;
				case "Incrementar Saldo":
					if (isset($_POST['tuser']))
						accionPostIncSaldo($_POST['tuser']);
					break;
				case "Cambiar bloqueos":
					if (isset($_POST['tuser']))
						accionPostBloqueos($_POST['tuser']);
					break;
				case "Detalles":; // No hago nada
			}
		}
	}
	$contenido .= mostrarDatos();
	// Muestro la página principal
	include_once "app/layout/principal.php";
}
