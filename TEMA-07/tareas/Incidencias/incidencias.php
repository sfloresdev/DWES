<?php 

$fecha = date("d/m/Y h:i");
$nombre = $_POST['nombre'];
$resumen = $_POST['resumen'];
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
