<?php

class BiciElectrica {

	private $id;
	private $coord_x;
	private $coord_y;
	private $bateria;
	private $operativa;

	public function __construct(int $id, int $coord_x, int $coord_y, float $bateria, bool $operativa){
		$this->id = $id;
		$this->coord_x = $coord_x;
		$this->coord_y = $coord_y;
		$this->bateria = $bateria;
		$this->operativa = $operativa;
	}

	public function distancia($x, $y){
		
	}

	public function __get($name){
		throw new \Exception('Not implemented');
	}

	public function __set($name, $value){
		throw new \Exception('Not implemented');
	}

	public function __toString(){
		return "Identificador: ". $this->id. ", Bateria: ". $this->bateria. "%";
	}
}





?>