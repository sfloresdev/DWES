<?php
session_start();

if (!isset($_SESSION['numero'])){
    $_SESSION['numero'] = mt_rand(1, 20);
}

if (!isset($_SESSION['intentos']))
    $_SESSION['intentos'] = 5;

if (isset($_GET['jugador'])){
    $numJugador = $_GET['jugador'];
}

switch ($_GET['opcion'] ?? ''){

    case "Adivinar": 

        if ((int) $numJugador === (int) $_SESSION['numero']){
            $msg = "Acertaste, el numero era ". $_SESSION['numero'];
            reloadGame();
        } else {
            if ((int) $_SESSION['intentos'] == 0){
                $msg = "Te has quedado sin intentos";
                reloadGame();
            }
            $_SESSION['intentos']--;
            $msg = "Te quedan ". $_SESSION['intentos']. " intentos";
            $msg .= "<br>". giveClue($numJugador, (int) $_SESSION['numero']);
        }
        break;

    case "Nuevo numero":
        reloadGame();
        break;
        
    default:
        $msg = "NO SE HA SELECCIONADO NINGUNA OPCION";
        break;
}

function giveClue($usuario, $numero){
    return ($usuario > $numero)? "El numero es mas bajo" : "El numero es mas alto";
}

function reloadGame(){
    session_destroy();
    header("Location: adivina.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivina el numero</title>
</head>
<body>

    <h2>Adivina el numero</h2>

    <form action="adivina.php" method="get">
        <input type="number" name="jugador" id="jugador" required><br><br>
        <input type="submit" name="opcion" value="Adivinar">
        <input type="submit" name="opcion" value="Nuevo numero">
    </form>
    <br><br>
    <?=  $msg  ?>
</body>
</html>