<?php

class AccesoDatos
{

    private static $modelo = null;
    private $dbh = null;
    public $stmt = null;

    private static $select0 = "SELECT CLIENTE_NO, NOMBRE FROM CLIENTES";
    private static $select1 = "SELECT * from PRODUCTOS where PRECIO_ACTUAL >= ? ORDER BY DESCRIPCION";
    private static $select2 = "";
    private static $select3 = "";
    private static $select4 = "";
    private static $select5 = "";

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
            $DB_DATA = "mysql:host=localhost;dbname=empresa;charset=utf8";
            $this->dbh = new PDO($DB_DATA, "root", "");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $err) {
            echo "Error al realizar la conexion " . $err->getMessage();
            exit();
        }
    }

    public function consulta0(): array
    {
        $resultado = [];
        $stmt = $this->dbh->prepare(self::$select0);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if ($stmt->execute()) {
            while ($fila = $stmt->fetch()) {
                $resultado[] = $fila;
            }
        }
        return $resultado;
    }

    public function consulta1(int $precio): array
    {
        $resu = [];
        $stmt = $this->dbh->prepare(self::$select1);
        $stmt->bindValue(1, $precio);
        // Devuelvo una tabla asociativa
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if ($stmt->execute()) {
            while ($fila = $stmt->fetch()) {
                $resu[] = $fila;
            }
        }
        return $resu;
    }

    public function __clone()
    {
        trigger_error('Clonacion no permitida', E_USER_ERROR);
    }
}
