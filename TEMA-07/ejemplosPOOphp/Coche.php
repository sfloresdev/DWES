<?php 

class Coche {
	private $matricula;
	protected $precio;
	public $estado;


	function __construct(string $matricula, int $precio, bool $estado){
		$this->matricula = $matricula;
		$this->precio = $precio;
		$this->estado = $estado;
	}

	function __toString(){
			return "INFO: $this->precio | $this->matricula | $this->estado";
	}

	function fijarPrecio(int $precio){
		$this->precio = $precio;
	}

	function mostrarInfo():string{
		return "$this->precio | $this->matricula | $this->estado";
	}


	function __destruct()
		{
			echo "El coche ". $this->matricula. " al desguace";
		}
}

$c1 = new Coche("5744JLS", 50_000, false);
$c1->estado = false;
$c1->fijarPrecio(50_000);

echo "\n". $c1->mostrarInfo();
echo "\n". $c1->__toString();
echo $c1;
unset($c1);
//echo "\n fin de programa". $c1->__destruct();


?>