<?php

include_once "Cliente.php";
include_once "Pedido.php";

class AccesoDatos
{
    private static $modelo;
    private $dbh;
    private $stmt;
    private $stmt2;
    private $stmt3;

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
            $DB_DATA = "mysql:host=localhost;dbname=etienda;charset=utf8";
            $this->dbh = new PDO($DB_DATA, "root", "");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $err) {
            echo "Error al realizar la conexion " . $err->getMessage();
            exit();
        }

        $this->dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);

        try {
            $this->stmt = $this->dbh->prepare("SELECT * FROM clientes WHERE nombre = ? and clave = ?");
            $this->stmt2 = $this->dbh->prepare("SELECT * FROM pedidos WHERE cod_cliente = ?");
            $this->stmt3 = $this->dbh->prepare("UPDATE clientes SET veces=veces+1 WHERE cod_cliente = ?");
        } catch (PDOException $ex) {
            echo "Erro al crear las sentencias " . $ex->getMessage();
            exit();
        }
    }

    // Comprobacion de usuario y contraseña
    public function checkUser(string $usuario, string $password)
    {
        $objcli = null;

        $this->stmt->bindValue(1, $usuario);
        $this->stmt->bindValue(2, $password);
        $this->stmt->setFetchMode(PDO::FETCH_CLASS, 'Cliente');
        $this->stmt->execute();
        if ($objcli = $this->stmt->fetch()) {
            return $objcli;
        }
        return null;
    }

    // Pedidos del usuario
    public function userOrders(string $cod_usuario)
    {
        $listaResu = [];

        $this->stmt2->bindValue(1, $cod_usuario);
        $this->stmt2->setFetchMode(PDO::FETCH_CLASS, 'Pedido');
        $this->stmt2->execute();
        while ($objcli = $this->stmt2->fetch()) {
            $listaResu[] = $objcli;
        }
        return $listaResu;
    }

    // Actualizar contador de visitas
    public function updateVisits(string $usuario) {
        $this->stmt3->bindValue(1, $usuario);
        $this->stmt3->execute();
    }

    public function __clone()
    {
        trigger_error('Clonacion no permitida', E_USER_ERROR);
    }

    public function close() {
        $this->dbh = null;
    }
}
