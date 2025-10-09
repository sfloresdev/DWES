<?php
const MAX_FILE_SIZE = 10_000;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = htmlspecialchars($_POST['nombre'] ?? '');
    $alias = htmlspecialchars($_POST['alias'] ?? '');
    $edad = htmlspecialchars($_POST['edad'] ?? '');
    $errors = [];
    $output[] = "";
    //Añadimos los elementos al output final
    $output[] = "<strong>Nombre: </strong> $username";
    $output[] = "<strong>Alias: </strong> $alias";
    $output[] = "<strong>Edad: </strong> $edad";
    $output[] = "<strong>Armas seleccionadas: </strong>";

    if (isset($_POST['arma'])) {
        $armasSeleccionadas = $_POST['arma'];
        foreach ($armasSeleccionadas as $arma) {
            $output[] = " $arma";
        }
    }

    $output[] = "<strong>¿Practica artes magicas?</strong>";
    if (isset($_POST['magia'])) {
        $practicaMagia = $_POST['magia'];
        $output[] = "$practicaMagia ";
    }

    if (!(isset($_FILES['avatar'])) || $_FILES['avatar']['error'] === UPLOAD_ERR_NO_FILE) {
        $output[] = "<strong>No se subió ninguna imagen: </strong>";
        $output[] = "<br><br><img src='img/calavera.png' alt='imagen_de_calavera'>";
    } else {
        $output[] = "<strong>Imagen subida: </strong>";

        if (($_FILES['avatar']['size'] <= MAX_FILE_SIZE) && $_FILES['avatar']['error'] == UPLOAD_ERR_OK) {
            $rutaTemporal = $_FILES['avatar']['tmp_name'];
            $nombreArchivo = "uploads/" . basename($_FILES['avatar']['name']);
            if (move_uploaded_file($rutaTemporal, $nombreArchivo))
                $output[] = "<br><br><img src='$nombreArchivo' alt='$nombreArchivo'>";   
        } else {
            $output[] = "Error al subir el archivo";
        }
    }
    echo implode(" ", $output);
} else {
    include "captura.html";
}
