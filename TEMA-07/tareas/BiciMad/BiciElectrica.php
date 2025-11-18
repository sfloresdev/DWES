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

	/* Si se hace de la siguiente manera no es necesario indicar los atributos antes
	public function __construct(private $id, private $coord_x, private $coord_y, private $bateria, private $operativa;){

	}
	*/

	public function distancia($x, $y){
		$distancia_x = $x - $this->coord_x;
		$distancia_y =  $y - $this->coord_y;
		return round(sqrt($distancia_x * $distancia_x) - ($distancia_y * $distancia_y));
	}

	public function __get($name){	
		if (property_exists($this, $name))
			return $this->$name;
	}

	public function __set($name, $value){
		if (property_exists($this, $name))
			$this->$name = $value;
	}

	public function __toString(){
		return "Identificador: ". $this->id. ", Bateria: ". $this->bateria. "%\n<br>";
	}
}
?>