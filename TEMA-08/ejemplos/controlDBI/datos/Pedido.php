<?php

class Pedido {

	private $numped; 
	private $cod_cliente;
	private $producto;
	private $precio;



	public function __get($name) {
		if (property_exists($this, $name))
			return $this->$name;
	}

	public function __set($name, $value) {
		$this->$name = $value;
	}

	public function __toString() {
		throw new \Exception('Not implemented');
	}
}