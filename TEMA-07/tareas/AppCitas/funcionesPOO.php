<?php

function cargarTabla(): array{
	$tuser = [];
	$fichero = fopen("usuarios.dat", "r");

	while ($valores = fgetcsv($fichero)){
		$usr = new Usuario($valores[0], $valores[1], $valores[2]);
		$tuser[] = $usr;
	}
	@fclose($fichero);
	return $tuser;
}


function accesoValido($username, $password){
	$tablaUser = cargarTabla();
	foreach ($tablaUser as $usr) {
		if ($usr->nombre == $username && password_verify($password, $usr->clave)){
			return true;
		}
	}
	return false;
}

function anotarNuevoAcceso($username):int{
	$tablaUser = cargarTabla();
	$salvar = true;
	foreach ($tablaUser as $usr) {
		if ($usr->nombre == $username){
			$usr->acesso = $usr->acesso+ 1;
			$salvar = true;
		}
	}
	if ($salvar) {
		volcarDatos($tablaUser);
	}
    return $salvar;
}

function volcarDatos($tabla){
	$fichero = @fopen("usuarios.dat", "w");
	foreach($tabla as $usr){
		$valores = [$usr->nombre, $usr->clave, $usr->acceso];
		fputcsv($fichero, $valores);
	}
	@fclose($fichero);
}



?>