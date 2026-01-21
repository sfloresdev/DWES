<?php
include_once "Producto.php";

class AccesoDatos
{

    private static $modelo;
    private $dbh;

    public static function initModelo()
    {
        if (self::$modelo == null) {
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }

    private function __construct()
    {
        try {
            $DB_DATA = "mysql:host=localhost;dbname=almacendb;charset=utf8";
            $this->dbh = new PDO($DB_DATA, "root", "");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $err) {
            echo "Error al contectarse a la base de datos" . $err->getMessage();
            exit();
        }
    }

    public function getProducts()
    {
        $tproductos = [];

        $stmt = $this->dbh->prepare("SELECT * FROM Productos");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Producto');
        $stmt->execute();
        while ($producto = $stmt->fetch()) {
            $tproductos[] = $producto;
        }
        return $tproductos;
    }

    public function actualizarPrecios($tProductoNoActualizar)
    {
        /*
        La informacion nos llega de la siguiente manera
        $tProductoNoActualizar = [1, 3, 5];
        Siendo cada numero el producto marcado en el formulario
        */

        // Recorremos cada producto_no que nos pasan en el array
        foreach($tProductoNoActualizar as $producto_no) {
            $stmt = $this->dbh->prepare("SELECT stock_disponible FROM Productos WHERE producto_no = :producto_no");
            $stmt->bindValue(':producto_no', $producto_no);
            $stmt->execute();
            $producto = $stmt->fetch(PDO::FETCH_OBJ);
            if ($producto && $producto->stock_disponible > 10){
                $stmtUpdate = $this->dbh->prepare("UPDATE Productos SET precio_actual = precio_actual * 0.9 WHERE producto_no = :producto_no");
                $stmtUpdate->bindValue(':producto_no', $producto_no);
                $stmtUpdate->execute();
            }
        }
    }


    public function __clone()
    {
        trigger_error('Clonacion no permitida', E_USER_ERROR);
    }

    public function close()
    {
        $this->dbh = null;
    }
}
