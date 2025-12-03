<?php
session_start();
include_once 'funciones.php';

if (isset($_COOKIE['valido'])){
	echo "No se puede acceder hasta dentro de 10 minutos";
	return ;
}


if (isset($_SESSION['dni'])) {

    if (isset($_GET['orden'])) {
        if ($_GET['orden'] == 'salir') {
            // ALMACENAR LOS PUNTOS EN FICHERO Y CERRAR LA SESION
			anotarPuntos($_SESSION['dni'], $_SESSION['puntos']);
			setcookie('valido', 'Validat acceso', time() + 600);
			session_destroy();
            //include_once 'login.php';
            exit();
        }
        if ($_GET['orden'] == 'continuar' && $_SESSION['puntos'] > 0) {
            // CAMBIAR LOS  PUNTOS DE LA SESION CON VALORES ALEATORIOS
			$total = floor(mt_rand(1, 50));  
			$val = mt_rand(-5,5);

			if ($val > 0)
				$_SESSION['puntos'] += $total;
			else  
				$_SESSION['puntos'] -= $total;

            if ($_SESSION['puntos'] <= 0) {
                $_SESSION['puntos'] = 0;
            }
        }
    } 
    include_once 'vistas/puntos.php';
}


if ($_SERVER['REQUEST_METHOD'] == "GET" && !isset($_SESSION['dni'])) {
        include_once 'vistas/login.php';
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // PROCESAR FORMULARIO LOGIN
    // COMPROBAR QUE LOS PUNTOS SON NUMERICOS
    // COMPROBAR QUE DNI Y LA CLAVE SON CORRECTOS
    // SI NO ES CORRECTO MOSTRAR EL LOGIN CON UN 
    // MENSAJE DE ACCESO
    // ANOTAR PUNTOS Y DNI EN LA SESSION Y MOSTRAR LA VISTA DE PUNTOS
	if (!is_numeric($_POST['puntos']) || $_POST['puntos'] <= 0){
		$msg = "Tiene que introducir un valor numerico";
		include_once 'vistas/login.php';
	}

	if (isset($_POST['dni']) && isset($_POST['clave'])){
		if (!validarCliente($_POST['dni'], $_POST['clave'])){
			$msg = "DNI o Contraseña incorrecta";
			include_once 'vistas/login.php';
		}
		$_SESSION['dni'] = $_POST['dni'];
		$_SESSION['puntos'] = $_POST['puntos'];
	} else 
		include_once 'vistas/login.php';

    include 'vistas/puntos.php';
}



