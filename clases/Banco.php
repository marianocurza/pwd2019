<?php

require_once 'Cliente.php';
require_once 'CuentaCorriente.php';
require_once 'CajaAhorro.php';
require_once '../interfaces/IArray.php';
require_once '../interfaces/ICuenta.php';

class Banco implements IArray, ICuenta {
    
    protected $coleccionClientes;
    protected $coleccionCajasAhorro;
    protected $coleccionCuentasCorriente;
    
    public function __construct() {
        $this->coleccionClientes = [];
        $this->coleccionCajasAhorro = [];
        $this->coleccionCuentasCorriente = [];
    }
    
    public function agregarCliente(Cliente $cliente): bool {
        // verificar si existe el cliente
        if(!$this->existeCliente($cliente)){
            $this->coleccionClientes[] = $cliente;
            return true;
        } else {
            return false;
        }
    }
    

    public function realizarDeposito(string $numCuenta, int $monto): void {
        // buscar cuenta
        // $cuentaEncontrada->realizarDeposito($monto);
    }
    
    public function realizarRetiro(string $numCuenta, int $monto): void {
        // buscar cuenta
        // $cuentaEncontrada->realizarRetiro($monto);
        // ojo con los saldos y los descubiertos
    }
    
    /**
     * Recibe un nro de cliente y devuelve el objeto o null
    */
    public function buscarClientePorNumero(string $nroCliente): ?Cliente {
        foreach($this->coleccionClientes as $cliente){
            if($cliente->getNroCliente()===$nroCliente){
                return $cliente;
            }
        }
        return null;
    }
    
    public function agregar(Cuenta $cuenta): bool {
        return $cuenta->agregar($this);
    }
    

    public function agregarCajaAhorro(CajaAhorro $ca): bool {
        // verificar si existe la caja de ahorro
        if(!$this->existeCajaAhorro($ca)){
            $this->coleccionCajasAhorro[] = $ca;
            return true;
        }else {
            return false;
        }
    }

    public function agregarCuentaCorriente(CuentaCorriente $cc): bool {
        // verificar si existe la cuenta corriente
        if(!$this->existeCuentaCorriente($cc)){
            $this->coleccionCuentasCorriente[] = $cc;
            return true;
        }else{
            return false;
        }
    }
    
    private function existeCliente(Cliente $cliente):bool {
        return false;
    }

    private function existeCajaAhorro(CajaAhorro $ca):bool {
        return false;
    }

    private function existeCuentaCorriente(CuentaCorriente $cc):bool {
        return false;
    }

    
    // método interno para serializar la clase a un array
    public function toArray(): array {
        $arregloBanco = [];
        foreach($this->coleccionClientes as $cliente){
            $arregloBanco['coleccionClientes'][] = $cliente->toArray();
        }
        foreach($this->coleccionCuentasCorriente as $ca){
            $arregloBanco['coleccionCuentasCorriente'][] = $ca->toArray();
        }
        foreach($this->coleccionCajasAhorro as $cc){
            $arregloBanco['coleccionCajasAhorro'][] = $cc->toArray();
        }
        return $arregloBanco;
    }
    
    
}