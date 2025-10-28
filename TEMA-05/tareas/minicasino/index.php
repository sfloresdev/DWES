<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
    include_once "inicio.html";
    exit();
}

if (isset($_POST['accion'])){

    switch($_POST['accion']){

        case "Jugar":
            // Si no hay dinero en la sesion, lo obtenemos del formulario
            if (!isset($_SESSION['dinero'])){ 
                if (empty($_POST['dinero']) || $_POST['dinero'] <= 0){
                    echo "Para jugar es necesario ingresar dinero";
                    session_destroy();
                    exit();
                }
                $_SESSION['dinero'] = (int) $_POST['dinero'];
            }
            $dinero = $_SESSION['dinero'];
            include_once "jugar.php";
            break;

        case "Salir":
            $dinero = $_SESSION['dinero'] ?? 0;
            include_once "despedida.php";
            session_destroy();
            exit();
    }
}

if (isset($_POST['accion_jugar'])){

    $dinero = $_SESSION['dinero'] ?? 0;

    if ($_POST['accion_jugar'] === "Apostar" && $dinero > 0){
        $cantidad = (int) $_POST['apuesta'];
        $tipo = $_POST['tipo'];

        if ($cantidad > $dinero)
            $msg = "Error, no dispone de $cantidad para jugar";    
        else {
            $msg = calcularGanador($dinero, $tipo, $cantidad);
            $_SESSION['dinero'] = $dinero;
        }
        include_once "jugar.php";
    } else {
        include_once "despedida.php";
        session_destroy();
    }
    exit();
}

function    realizarTirada(): int{
    return mt_rand(0, 36); 
}

function    calcularGanador(int &$dinero, string $apuesta, int $cantidad){
    //No estan vacios o son null
    if (!isset($apuesta) || !isset($cantidad)){
        echo "No se ha puesto una cantidad o no se ha indicado tipo";
        return ;
    }
    //No nos han cambiado los values de los tipos de apuesta
    if ($apuesta !== "par" && $apuesta !== "impar"){
        echo "Tipo de apuesta no valido";
        return ;
    }

    $numero = realizarTirada();
    $resultado = ($numero % 2 === 0) ? "par" : "impar";
    if ($apuesta === $resultado){
        $dinero += $cantidad;
        return "Resultado de la tirada: $resultado" . "<br>Ganaste: $cantidad";
    }
    else {
        $dinero -= $cantidad;
        return "Resultado de la tirada: $resultado" . "<br>Perdiste: $cantidad";
    }
}
?>