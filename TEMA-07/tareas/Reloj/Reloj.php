<?php 

class Reloj {

    private $segundos;
    private $formato24;

    public function __construct(int $hora, int $minutos, int $segundos){
        $this->segundos = "$hora:$minutos:$segundos";
        $this->formato24 = true;
    }

    public function mostrar(){
        if ($this->formato24){
            return $this->segundos;
        }
        [$h, $m, $s] = explode(":", $this->segundos);
        $h %= 12;
        if ($h == 0) $h = 12;
        return "$h:$m:$s";
    }

    public function cambiarFormato24(bool $cambiar){
        $this->formato24 = $cambiar;
    }

    public function tictac(){
        [$h, $m, $s] = explode(":", $this->segundos);
    
        $h = (int)$h;
        $m = (int)$m;
        $s = (int)$s;

        $s++;

        if ($s >= 60){
            $s = 0; // Segundos
            $m++;   // Minutos
        }

        if ($m >= 60){
            $m = 0;  // Segundos
            $h++;    // Horas
        }

        if ($h >= 24){
            $h = 0; // Hora
        }

        $this->segundos = "$h:$m:$s";
    }

    public function comparar(Reloj $otro){
        [$h, $m, $s] = explode(":", $this->segundos);
        [$h2, $m2, $s2] = explode(":", $otro->segundos);

        $tiempo1 = $h * 3600 + $m * 60 + $s;
        $tiempo2 = $h2 * 3600 + $m2 * 60 + $s2;

        $total = $tiempo1 - $tiempo2; // Diferencia
        return (($total < 0)? -$total : $total);
    }
}
?>