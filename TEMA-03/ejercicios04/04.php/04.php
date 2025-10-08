<?php
$name = $_POST['username'] ?? 'NEGROS';
$password = $_POST['password'] ?? 'NEGROS';
$semaforo = $_POST['color'] ?? 'NEGROS';
$publicidad = $_POST['publicidad'] ?? 'NEGROS';
$yearEstudios = $_POST['year'] ?? 'NEGROS';
$comentarioUsuario = $_POST['comentario'] ?? 'NEGROS';

$msg[] = "Nombre: $name <br><br>";
$msg[] = "Clave: $password <br><br>";
$msg[] = "Semaforo: $semaforo <br><br>";
$msg[] = "Publicidad: $publicidad quiero publicidad <br><br>";
$msg[] = "Año de fin de estudios: $yearEstudios <br><br>";
$msg[] = "Comentarios: $comentarioUsuario <br><br>";

if (isset($_POST['ciudad']))
{
    $msg[] = "Lista de ciudades seleccionadas: ";
    $ciudadesSeleccionadas = $_POST['ciudad'];
    foreach($ciudadesSeleccionadas as $ciudad)
    {   
        $msg[] = "$ciudad ";
    }
    $msg[] = "<br><br>";
}
if (isset($_POST['idioma']))
{
    $idiomasSeleccionados = $_POST['idioma'];
    $msg[] = "Idiomas: ";
    foreach($idiomasSeleccionados as $idioma)
    {
        $msg[] = "$idioma ";
    }
}
echo implode(" ", $msg);
?>