<?php 
define ('FILEUSER','dat/usuarios.txt');
/**
 * 
 * Compruba que la usuario y la contraseña son correctos consultando
 * el archivo de datos
 * @param mixed $login
 * @param mixed $passwd
 * @return bool
 */
function userOk($login, $passwd):bool {

	if(!is_readable(FILEUSER)){
		die("Error al abrir el fichero");
	}

	$file_array = file(FILEUSER);
	foreach($file_array as $linea){
		$partes = explode('|', $linea);
		if ($partes[0] == $login && password_verify($passwd, $partes[1]))
			return true;
	}
    return false;
}

/**
 *  Actualiza la password de un usuario en el archivo de datos
 * @param mixed $login
 * @param mixed $passwd
 * @return bool true si el usuario existe en el fichero
 */
function updatePasswd($login, $passwd):bool {
	if (!is_readable(FILEUSER))
		die("Error al abrir el archivo");
	$file_array = file(FILEUSER);
	$encontrado = false;
	foreach($file_array as &$linea){
		$partes = explode("|", $linea);
		if ($partes[0] == $login){
			$partes[1] = password_hash($passwd, PASSWORD_DEFAULT);
			$linea = implode("|", $partes);
			$encontrado = true;
			break;
		}
	}
	if ($encontrado) {
		file_put_contents(FILEUSER, implode("", $file_array));	
	}
    return $encontrado;
}