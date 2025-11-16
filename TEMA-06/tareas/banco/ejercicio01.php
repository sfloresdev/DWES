<?php
session_start();
define('CUENTAFICHERO', 'misaldo.txt');

// NO está definido el token
if (!isset($_SESSION['token'])) {
	header('Location: acceso.php?msg=Error+de+acceso 1');
	exit();
}

if ($_SESSION['token'] != $_POST['token']){
	$msg = "Error de acceso";
	header("Location: acceso.php?msg=" . urlencode($msg));
	exit();
}

$saldo = @file_get_contents(CUENTAFICHERO);
echo ($saldo)? "El fichero no se puede leer" . die() : "nana";


if ($_POST['Orden'] == 'Ver saldo'){
	$msg = "Su saldo actual es ". $saldo;
	header("Location: acceso.php?msg=" . urlencode($msg));
	exit();
}

if (empty($_POST['importe']) || !is_numeric($_POST['importe']) || $_POST['importe'] <= 0){
	$msg = "Importe erronero o importe menos que 0";
	header("Location: acceso.php?msg=" . urlencode($msg));
	exit();	
}

$importe = $_POST['importe'];
if ($_POST['Orden'] == "Ingreso"){
	$saldo += $importe;
	file_put_contents(CUENTAFICHERO, $saldo);
	$msg = "Operacion realizada";
	header("Location: acceso.php?msg=" . urlencode($msg));
	exit();
}


if ($_POST['Orden'] == "Reintegro"){
	if ($importe > $saldo){
		$msg = "Importe superior al saldo";
	} else {
		$saldo -= $importe;
		file_put_contents(CUENTAFICHERO, $saldo);
		$msg = "Operacion realizada";
	}
	header("Location: acceso.php?msg=" . urlencode($msg));
	exit();
}