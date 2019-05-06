<?php
session_start();

require_once '../clases/Banco.php';

class FakeDB 
{
    public static $banco;
    
    public static function iniciarDesdeSesion() {
        // si existe la sesion, la usamos
        if(isset($_SESSION['banco'])){
            $banco = new Banco();
            foreach ($_SESSION['banco']['coleccionClientes'] as $cl)
            {
                $cliente = new Cliente($cl['dni'], $cl['nombre'], $cl['apellido'], $cl['nroCliente']);
                $banco->agregarCliente($cliente);
            }
            foreach ($_SESSION['banco']['coleccionCajasAhorro'] as $ca)
            {
                $cliente = new Cliente($ca['cliente']['dni'], $ca['cliente']['nombre'], $ca['cliente']['apellido'], $ca['cliente']['nroCliente']);
                $cajaAhorro = new CajaAhorro($ca['nroCuenta'], $cliente, $ca['saldo']);
                $banco->agregarCuenta($cajaAhorro);
            }
            foreach ($_SESSION['banco']['coleccionCuentasCorriente'] as $cc)
            {
                $cliente = new Cliente($cc['cliente']['dni'], $cc['cliente']['nombre'], $cc['cliente']['apellido'], $cc['cliente']['nroCliente']);
                $cuentaCorriente = new CuentaCorriente($cc['nroCuenta'], $cliente, $cc['saldo'], $cc['descubierto']);
                $banco->agregarCuenta($cuentaCorriente);
            }
            self::$banco = $banco;
            
        }else{ // si es la primera vez, iniciamos el banco con valores de ejemplo
            $banco = new Banco();
            $cliente1 = new Cliente('123456', 'NOMBRE 1', 'APELLIDO 1', '1');
            $cliente2 = new Cliente('789012', 'NOMBRE 2', 'APELLIDO 2', '2');
            $cliente3 = new Cliente('345678', 'NOMBRE 3', 'APELLIDO 3', '3');
            $banco->agregarCliente($cliente1);
            $banco->agregarCliente($cliente2);
            $banco->agregarCliente($cliente3);
            
            $cajaAhorro1 = new CajaAhorro('1', $cliente1, 100);
            $cajaAhorro2 = new CajaAhorro('2', $cliente2, 200);
            $banco->agregarCuenta($cajaAhorro1);
            $banco->agregarCuenta($cajaAhorro2);

            $cuentaCorriente3 = new CuentaCorriente('3', $cliente3, 300, 1000);
            $banco->agregarCuenta($cuentaCorriente3);
            
            self::$banco = $banco;
        }
    }
    
    public static function guardarEnSesion()
    {
        $_SESSION['banco']=self::$banco->toArray();
    }

}

FakeDB::iniciarDesdeSesion();