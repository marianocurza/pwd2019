<?php
require_once '../interfaces/IArray.php';
require_once 'Cliente.php';

abstract class Cuenta implements IArray {
    protected $nroCuenta;
    protected $cliente;
    protected $saldo;
    
    public function __construct(string $nroCuenta, Cliente $cliente, int $saldo){
        $this->nroCuenta = $nroCuenta;
        $this->cliente = $cliente;
        $this->saldo = $saldo;
        
    }
    
    public function realizarDeposito(int $monto): bool {
        return false;
    }

    public function realizarRetiro(int $monto): bool {
        return false;
    }
    
    public function saldoCuenta(): int {
        return $this->saldo;
    }
    
    // método interno para serializar la clase a un array
    public function toArray(): array{
        return [
                 'nroCuenta'=>$this->nroCuenta,
                 'cliente'=>$this->cliente->toArray(),
                 'saldo'=>$this->saldo
               ];
    }
    
}

    