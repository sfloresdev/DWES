<?php

class Producto {
    private $producto_no;
    private $descripcion;
    private $precio_actual;
    private $stock_disponible;

    public function __set($atributo, $value) {
        $class = get_class($this);
        if (property_exists($class, $atributo))
            $this->$atributo = $value;
    }

    public function __get($atributo) {
        $class = get_class($this);
        if (property_exists($class, $atributo))
            return $this->$atributo;
    }
}
?>