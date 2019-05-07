<?php
require_once '../clases/CajaAhorro.php';
require_once '../clases/CuentaCorriente.php';

interface ICuenta {
    
    public function agregarCajaAhorro(CajaAhorro $ca):bool;
    public function agregarCuentaCorriente(CuentaCorriente $cc):bool;
    
}