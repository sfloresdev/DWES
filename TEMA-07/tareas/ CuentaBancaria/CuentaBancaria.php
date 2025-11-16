<?php 

class CuentaBancaria {
    
    private static $cuentas_creadas; // N cuentas creadas
    
    private $saldo_cuenta; // Dinero disponible
    private $numero_movimientos; // N movimientos realizados

    public function __construct(int $saldo_cuenta = 0){
        $this->saldo_cuenta = $saldo_cuenta;
        $this->numero_movimientos = 0;
        self::$cuentas_creadas++;
    }

    public function ingreso(int $cantidad){
        $this->saldo_cuenta += $cantidad;
        $this->numero_movimientos++;
    }

    public function abono(int $cantidad){
        $this->saldo_cuenta -= $cantidad;
        $this->numero_movimientos++;
    }

    public function anotarGastos(){
        if (!($this->saldo_cuenta < 1000)){
            echo "Tiene mas de 1000 en la cuenta";
            return ;
        }
        $this->saldo_cuenta -= 20;
        $this->numero_movimientos++;
    }

    public function anotarIntereses(int $interes){
        if ($interes <= 0){
            echo "No puede tener un valor negativo o igual a 0";
            return ;
        }
        $this->saldo_cuenta *= (1 + $interes / 100);
        $this->numero_movimientos++;
    }

    public function transferencia(int $cantidad, CuentaBancaria $destino){
        $this->saldo_cuenta -= $cantidad;
        // Como le envio a una cuenta?!
        $destino->ingreso($cantidad); // Asi?
        $this->numero_movimientos++;
    }

    public function consultarEstado(){
        return "Saldo disponible: ". $this->saldo_cuenta. " Numero de operaciones: ". $this->numero_movimientos. " ";
    }
}










?>