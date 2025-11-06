<?php
require_once('dat/datos.php');
/**
 *  Devuelve true si el código del usuario y contraseña se 
 *  encuentra en la tabla de usuarios
 *  @param $login : Código de usuario
 *  @param $clave : Clave del usuario
 *  @return true o false
 */
function userOk($login, $clave): bool
{
	global $usuarios;
	foreach ($usuarios as $key => $value) {
		if ((int) $login === (int) $key && $clave == $value[1]) {
			return true;
		}
	}
	return false;
}

/**
 *  Devuelve el rol asociado al usuario
 *  @param $login: código de usuario
 *  @return ROL_ALUMNO o ROL_PROFESOR
 */
function getUserRol($login)
{
	global $usuarios;
	foreach ($usuarios as $key => $value) {
			if ((int) $login === (int) $key && $value[2] == ROL_PROFESOR) {
			return ROL_PROFESOR;
		}
	}
	return ROL_ALUMNO;
}

/**
 *  Muestra las notas del alumno indicado.
 *  @param $codigo: Código del usuario
 *  @return $devuelve una cadena con una tabla html con los resultados 
 */
function verNotasAlumno($codigo): String
{
	$msg = "";
	global $nombreModulos;
	global $notas;
	global $usuarios;

	$msg .= " Bienvenido/a alumno/a: " . $usuarios[$codigo][0];
	$msg .= "<table>";
	$msg .= "<tr><td>Modulo</td><td>Nota</td></tr>";
	for ($i = 0; $i < count($nombreModulos); $i++) {
		$msg .= "<tr>";
		$msg .= "<td>" . $nombreModulos[$i] . "</td>";
		$msg .= "<td>" . $notas[$codigo][$i] . "</td>";
		$msg .= "</tr>";
	}
	$msg .= "</table>";
	return $msg;
}

/**
 *  Muestra las notas de todos alumnos. 
 *  @param $codigo: Código del profesor
 *  @return $devuelve una cadena con una tabla html con los resultados 
 */
function verNotaTodas($codigo): String
{
	$msg = "";
	global $nombreModulos;
	global $notas;
	global $usuarios;
	$msg .= " Bienvenido Profesor: " . $usuarios[$codigo][0];
	$msg .= "<table>";

	$msg .= "<tr><td>Nombre</td>";
	foreach ($nombreModulos as $nombre) {
		$msg .= "<td>$nombre</td>";
	}
	$msg .= "</tr>";

	foreach ($notas as $codigo => $notasAlumno) {
		$msg .= "<tr>" .  $usuarios[$codigo][0] . "</td>";

		foreach($notasAlumno as $nota){
			$msg .= "<td>" . $codigo[] . "</td>";
		}


		$msg .= "</tr>";
	}
	$msg .= "</tr>";


	$msg .= "</table>";
	return $msg;
}
