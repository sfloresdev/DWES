<?php

class Usuario {	
	public function __construct(private $nombre, private $clave, private $acceso) {

	}

	public function __get($name){
		if (property_exists($this, $name))
			return $this->$name;
	}

	public function __set($name, $value) {
		if (property_exists($this, $name))
			return $this->$name = $value;
	}
}
?>