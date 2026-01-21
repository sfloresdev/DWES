<?php
include_once "AccesoDatos.php";
include_once "Producto.php";

$db = AccesoDatos::initModelo();

$tproductos = $db->getProducts();

// -- PROCESAR EL FORMULARIO
// Obtengo una tabla con los números de productos.
if (!isset($_COOKIE['actualizarValido'])) {
    $zonaHoraria = new DateTimeZone("Europe/Madrid");
    $tiempo = new DateTime("now", $zonaHoraria);
    setcookie("actualizarValido",$tiempo->format("Y-m-d H:i:s"),time() + 60 * 60 * 24);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $db->actualizarPrecios($_POST['tproductos']);
        // Actualizo lo productos.
        $tproductos = $db->getProducts();
    }
} else {
    echo "No estan permitidas mas actualizaciones en 24 horas";
    exit();
}

?>

<h1>Bajar precios</h1>

<form method="post">
    <table border="1">
    <?php foreach ($tproductos as $pro): ?>
        <tr>
            <td><input type="checkbox" name="tproductos[]" value="<?= $pro->producto_no ?>"></td>
            <td><?= $pro->producto_no ?></td>
            <td><?= $pro->descripcion  ?></td>
            <td><?= $pro->stock_disponible ?></td>
            <td><?= $pro->precio_actual ?></td>
        <tr>
    <?php endforeach; ?>
    </table>
    <input type="submit" value="Actualizar">
</form>
