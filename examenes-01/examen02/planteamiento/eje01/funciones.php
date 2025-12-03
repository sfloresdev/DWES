<?php

include "dat/Cliente.php";

/**
 *  Lee el fichero de clientes y lo carga en un Array de objetos clientes
 *  @return array - tabla asociativa con clave dni.
 */
function cargarTablaClientes (): array {

    $tclientes = [];
	$fichero = fopen('dat/clientes.csv', 'r');
    while ($valores = fgetcsv($fichero)){
		$cliente = new Cliente($valores[0], $valores[1], $valores[2], $valores[3]);
		$tclientes[] = $cliente;
	}
	@fclose($fichero);
    return $tclientes;
}

/**
 * Escribe la tabla de objectos clientes en el fichero csv
 * @param  $tabla - array de objectos
 */

function salvarTablaClientes(array $tabla){

    $fich = fopen('dat/clientes.csv','w');
	foreach($tabla as $cliente) {
		$valores = [$cliente->dni, $cliente->nombre, $cliente->clavehash, $cliente->puntos];
		fputcsv($fich, $valores);
	}
    fclose($fich);
}

/**
 * Valida usuario y contraseña contra clientes.csv
 * @param string $dni DNI del cliente
 * @param string $clave Contraseña en texto plano
 * @return true Si el usuario y la contraseña son correctas
 */
function validarCliente($dni, $clave) :bool{
    
    $tablacli = cargarTablaClientes();
	foreach($tablacli as $cliente){
		if ($cliente->dni == $dni && password_verify($clave, $cliente->clavehash))
			return true;
	}
    return false;
}

/**
 * Anota los puntos logrados en la última partida 
 * @param string $dni DNI del cliente a modificar
 * @param int $puntos Puntos a almacenar
 * @return true si han anotado los datos
*/
function anotarPuntos($dni,$puntos): bool {
    $tablaCli = cargarTablaClientes();
	foreach($tablaCli as $cliente) {
		if ($cliente->dni == $dni){
			$cliente->puntos = $puntos;
			salvarTablaClientes($tablaCli);
			return true;
		}
	}
    return false;
}




