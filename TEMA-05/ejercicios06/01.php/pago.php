<?php
session_start();

$metodo_pago = "No hay tarjeta cargada";

if (isset($_GET['nuevatarjeta'])){
    $metodo_pago = $_GET['nuevatarjeta'];
    
    $_SESSION['tarjeta'] = $metodo_pago;
    setcookie("tarjeta", $metodo_pago, time()+60* 60);
} else {
    if (isset($_SESSION['tarjeta'])){
        $metodo_pago = $_SESSION['tarjeta'];
    } else if (isset($_COOKIE['tarjeta'])){
        $metodo_pago = $_COOKIE['tarjeta'];
    }
}
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Forma de pago</title>
    </head>

<body>
    <center>
        <H2>SU FORMA DE PAGO ACTUAL ES</H2></br>
        <a><img src="imagenes/<?= $metodo_pago ?>.gif" alt="<?= $metodo_pago ?>"></a>
        <h2>SELECCIONE UNA NUEVA TARJETA DE CREDITO </h2><br>
        <form action="pagocookie.php" method="get">
            <a href='pago.php?nuevatarjeta=cashu'><img src='imagenes/cashu.gif' /></a>&ensp;
            <a href='pago.php?nuevatarjeta=cirrus1'><img src='imagenes/cirrus1.gif' /></a>&ensp;
            <a href='pago.php?nuevatarjeta=dinersclub'><img src='imagenes/dinersclub.gif' /></a>&ensp;
            <a href='pago.php?nuevatarjeta=mastercard1'><img src='imagenes/mastercard1.gif' /></a>&ensp;
            <a href='pago.php?nuevatarjeta=paypal'><img src='imagenes/paypal.gif' /></a>&ensp;
            <a href='pago.php?nuevatarjeta=visa1'><img src='imagenes/visa1.gif' /></a>&ensp;
            <a href='pago.php?nuevatarjeta=visa_electron'><img src='imagenes/visa_electron.gif' /></a>
        </form>  
    </center>
</body>
</html>