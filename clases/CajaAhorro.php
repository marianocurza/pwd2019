<?php

require_once 'Cuenta.php';

class CajaAhorro extends Cuenta {

    public function __construct(string $nroCuenta, Cliente $cliente, int $saldo){
        parent::__construct($nroCuenta, $cliente, $saldo);
    }
    
}