<?php

class Cliente {

	private $cod_cliente;
	private $nombre;
	private $clave;
	private $veces;
	
	public function __toString() {
		throw new \Exception('Not implemented');
	}

	public function __get($name) {
		if (property_exists($this, $name))
			return $this->$name;
	}

	public function __set($name, $value) {
		$this->$name = $value;
	}
}