<?php

require_once 'Cuenta.php';

class CuentaCorriente extends Cuenta {

    protected $descubierto;
    
    public function __construct(string $nroCuenta, Cliente $cliente, int $saldo, int $descubierto){
        parent::__construct($nroCuenta, $cliente, $saldo);
        $this->descubierto = $descubierto;
    }
    
    public function agregar(ICuenta $visitorIn):bool {
        return $visitorIn->agregarCuentaCorriente($this);
    }
    
    
    // método interno para serializar la clase a un array
    public function toArray(): array{
        $arreglo = parent::toArray();
        $arreglo['descubierto'] = $this->descubierto;
        return $arreglo;
    }
    
    
    
}