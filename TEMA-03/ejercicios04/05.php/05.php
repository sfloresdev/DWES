<?php

$nombre = $_POST['nombre'] ?? 'Anonimo';
$apellidos = $_POST['apellidos'] ?? '';
//$sexo = $_POST[];


$msg[] = "Bienvenido $nombre";

if (isset($_POST['edad']))
    $edad = $_POST['edad'];

if (isset($_POST['hobbies']))
{
    $hobbiesSeleccionados = $_POST['hobbies']; 
    foreach($hobbiesSeleccionados as $h)
    {
        
    }
}
else
    $hobbies = "no tiene aficiones";
?>