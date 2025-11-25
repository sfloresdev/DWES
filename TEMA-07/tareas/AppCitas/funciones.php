<?php

/**
 * Checks if the provided username and password are valid.
 *
 * @param string $username The username to validate.
 * @param string $password The password to validate.
 * @return bool Returns true if the username and password are valid, false otherwise.
 */
function accesoValido($username, $password): bool
{
	$fichero = @fopen('usuarios.dat', 'r');
	while ($valores = fgetcsv($fichero)){
		if ($valores[0] == $username && password_verify($password, $valores[1])){
			@fclose($fichero);
			return true;
		}
	}
	@fclose($fichero);
    return false;
}

/**
 * Records a new access for the given username.
 *
 * @param string $username The username for which to record the access.
 * @return int The result of the access recording operation.
 */
function anotarNuevoAcceso($username):int{

	$fichero = @fopen('usuarios.dat', 'r');
	$resu = false;
	$tabla_usuarios = [];
	while ($valores = fgetcsv($fichero)){
		if ($valores[0] == $username){
			$valores[2] = $valores[2]+1;
			$resu = true;
		}
		$tabla_usuarios[] = $valores;
	}
	@fclose($fichero);
	if ($resu) {
		volcarDatos($tabla_usuarios);
	}
    return $resu;
}

/**
 * Registers a user with a given username and time.
 *
 * @param string $username The username of the user to register.
 * @param int $time The time associated with the registration.
 */
function registra($username,$time){
	$ip = $_SERVER['REMOTE_ADDR'];
	$nombre = $username;
	$tiempo = date('d-m-Y h:i', $time);
	$linea = "$ip, $nombre, $tiempo\n";
	$registro = @file_put_contents("registro.log", $linea, FILE_APPEND);
    return $registro;
}

function volcarDatos($tabla){
	$fichero = @fopen('usuarios2.dat', 'w');
	foreach ($tabla as $valores){
		fputcsv($fichero, $valores);
	}
	@fclose($fichero);
}
