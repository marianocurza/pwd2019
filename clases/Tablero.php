<?php
namespace app\clases;

require_once 'Barco.php';

use app\clases\Barco;
/**
 * Description of Tablero
 *
 * @author mariano
 */
class Tablero 
{
    private $dimensiones = [10,10];
    private $letras = ['A','B','C','D','E','F','G','H','I','J'];
    private $configuracionActual = [];
    private $barcos = [];
    
    public function __construct() 
    {        
        $dimensiones = $this->dimensiones;
        $this->inicializarConfiguracionActual($dimensiones);
        $this->inicializarBarcos();
    }

    public function getDimensiones(): array
    {
        return $this->dimensiones;
    }
    public function getLetrasFila(): array 
    {
        return $this->letras;
    }
    
    public function getBarcos(): array 
    {
        return $this->barcos;
    }
    
    public function tieneBarco(int $fila, int $columna): bool
    {
        if($this->configuracionActual[$fila][$columna] !== null){
            return true;
        }else{
            return false;
        }
    }
    
    public function getConfiguracion()
    {
        return $this->configuracionActual;
    }
    
    public function setConfiguracion(array $parametros)
    {
        foreach($this->barcos as $barco){
            /* @var $barco Barco */
            $nuevaConfiguracion = $barco->obtenerNuevaConfiguracion($parametros, $this->configuracionActual, $this->letras);
            $this->configuracionActual = $nuevaConfiguracion;
        }
    }
    
    private function inicializarConfiguracionActual($dimenciones)
    {
        for($fila = 0; $fila<$dimensiones[0]; $fila++)
        {
                for($columna = 0; $columna<$dimensiones[1]; $columna++)
                {
                    $this->configuracionActual[$fila][$columna] = null;
                }
        }
    }
    
    private function inicializarBarcos()
    {
        // inicialización de barcos
        for($i = 1; $i <= 5; $i++)
        {
        $barco = new Barco("barco_{$i}", $i);
            $this->barcos[] = $barco;
        }
        
    }
    
}
