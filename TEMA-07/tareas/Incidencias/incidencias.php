<?php
$cont_incidencias = 0;

if (isset($_COOKIE['numero_incidencias'])){
	$cont_incidencias = $_COOKIE['numero_incidencias'];
}

if ($cont_incidencias >= 3){
	echo "Error: no puede introducir mas incidencias espere unos minutos";
	exit();
}
else {
	$cont_incidencias++;
	setcookie('numero_incidencias', $cont_incidencias, time()+120);
}

$fecha = date("d/m/Y h:i");
$nombre = $_POST['nombre'];
// Evito inyeccion html
$resumen = htmlspecialchars($_POST['resumen']);
$prioridad = $_POST['prioridad'];
$ip = $_SERVER['REMOTE_ADDR'];

$linea = "$fecha, $nombre, $resumen, $prioridad, $ip \n";
$resu = @file_put_contents('incidencias.txt', $linea,FILE_APPEND);
if($resu)
	echo "Muchas gracias $nombre, se ha anotado su incidencia<br>";
else
	echo "Error al anotar la incidencia";

/*
// Fecha y Hora, nombre del usuario, resumen de la incidencias, prioridad, dirección IP 
class Incidendia {

	private $fecha;
	private $hora;
	private $nombre;
	private $resumen_incidencia;
	private $prioridad;
	private $direccion_IP;


	Y NO HACEMOS UN OBJETO??!

}
*/




?>
