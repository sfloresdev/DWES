<?php
session_start();

if (isset($_SESSION['tarjeta']) || isset($_COOKIE['tarjeta'])){
    header("Location:pago.php");
    exit();
}
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Forma de pago</title>
</head>

<body>
    <center>
        <H2>NO TIENE FORMA DE PAGO ASIGNADA</H2></br>
        <a></a>
        <h2>SELECCIONE UNA NUEVA TARJETA DE CREDITO </h2><br>
            <a href='pago.php?nuevatarjeta=cashu'><img src='imagenes/cashu.gif' /></a>&ensp;
            <a href='pago.php?nuevatarjeta=cirrus1'><img src='imagenes/cirrus1.gif' /></a>&ensp;
            <a href='pago.php?nuevatarjeta=dinersclub'><img src='imagenes/dinersclub.gif' /></a>&ensp;
            <a href='pago.php?nuevatarjeta=mastercard1'><img src='imagenes/mastercard1.gif' /></a>&ensp;
            <a href='pago.php?nuevatarjeta=paypal'><img src='imagenes/paypal.gif' /></a>&ensp;
            <a href='pago.php?nuevatarjeta=visa1'><img src='imagenes/visa1.gif' /></a>&ensp;
            <a href='pago.php?nuevatarjeta=visa_electron'><img src='imagenes/visa_electron.gif' /></a>  
    </center>
</body>
</html>