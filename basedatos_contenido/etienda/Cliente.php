<?php
class Cliente {
    private $cod_cliente;
    private $nombre;
    private $clave;
    private $veces;

    public function __get($atributo) {
        $class = get_class($this);
        if (property_exists($class, $atributo))
            return $this->$atributo;
    }

    public function __set($atributo, $value) {
        $class = get_class($this);
        if (property_exists($class, $atributo))
            $this->$atributo = $value;
    }
}
?>