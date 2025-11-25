<?php 
class Coche {

    private $modelo;
    private $distancia_total;
    private $distancia_parcial;
    private $motor;
    private $velocidad;
    private $velocidad_maxima;

    public function __construct(string $modelo, int $velocidad_maxima) {
        $this->modelo = $modelo;
        $this->distancia_total = 0;
        $this->distancia_parcial = 0;
        $this->motor = false;
        $this->velocidad = 0;
        $this->velocidad_maxima = $velocidad_maxima;
    }

    public function arrancar(){
        if ($this->motor){
            $this->infoError("El motor ya esta arrancado<br>");
            return false;
        }
        $this->motor = true;
        echo "Brmm Brmm, Motor arrancado<br>";
    }

    public function parar(){
        if (!$this->motor){
            $this->infoError("El coche ya esta parado<br>");
            return false;
        }
        $this->motor = false;
        $this->distancia_parcial = 0;
        $this->velocidad = 0;
    }

    public function acelera(int $cantidad){
        if ($cantidad < 0){
            $this->infoError("Si quieres frenar utiliza el metodo correcto<br>");
            return false;
        }
        if (!$this->motor){
            $this->infoError("El coche esta parado, no puedes acelerar<br>");
            return false;
        }
        $nuevaVelocidad = $this->velocidad + $cantidad;
        
        if ($nuevaVelocidad > $this->velocidad_maxima){
            $this->infoError("Se esta superando la velocidad maxima<br>"); 
            return false;
        }

        $this->velocidad = $nuevaVelocidad;
    }

    public function frena(int $cantidad){
        if ($this->velocidad <= 0 || !$this->motor){
            $this->infoError("El coche ya va a 0kmh<br>");
            return false;
        }
        $this->velocidad -= $cantidad;
        if ($this->velocidad < 0) $this->velocidad = 0;
    }

    public function recorre(){
        if (!$this->motor){
            $this->infoError("El coche esta parado, no puedes avanzar<br>");
            return false;
        }
        $this->distancia_parcial += $this->velocidad;
        $this->distancia_total += $this->velocidad;
    }

    public function info(): string{
        return "Modelo: ". $this->modelo. " Velocidad Actual: ". $this->velocidad . " Estado Motor: ". $this->motor . " Kilometros parciales: ". $this->distancia_parcial . " Kilometros totales: ". $this->distancia_total. "<br>";
    }

    public function getKilometros(): int{
        return $this->distancia_parcial;
    }

    private function infoError(String $mensaje): void{
        echo "$mensaje";
    }
}
?>