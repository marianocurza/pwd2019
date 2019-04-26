<?php

namespace app\clases;

/**
 * Description of Tablero
 *
 * @author mariano
 */
class Tablero {
    private $dimensiones = [10,10];
    private $letras = ['A','B','C','D','E','F','G','H','I','J'];
    private $configuracionActual = [];
    
    public function __construct() {        
        $dimensiones = $this->dimensiones;
        for($fila = 0; $fila<$dimensiones[0]; $fila++)
        {
                for($columna = 0; $columna<$dimensiones[1]; $columna++)
                {
                    $this->configuracionActual[$fila][$columna] = null;
                }
        }        
    }

        public function getDimensiones(): array{
        return $this->dimensiones;
    }
    public function getLetrasFila(): array {
        return $this->letras;
    }
    
    public function tieneBarco(int $fila, int $columna): bool{
        if($this->configuracionActual[$fila][$columna] !== null){
            return true;
        }else{
            return false;
        }
    }
    
    public function getConfiguracion(){
        return $this->configuracionActual;
    }
    
    public function setConfiguracion(array $parametros){
        // barco 1
        $letraBarco1Input = isset($parametros['letra_barco_1'])?$parametros['letra_barco_1']:null;
        $numeroBarco1Input = isset($parametros['numero_barco_1'])?$parametros['numero_barco_1']:null;
        $filaBarco1Real = $letraBarco1Input?array_search($letraBarco1Input, $this->letras):null;
        $columnaBarco1Real = $numeroBarco1Input?($numeroBarco1Input-1):null;
        if($filaBarco1Real!==null && $columnaBarco1Real!==null){
            $this->configuracionActual[$filaBarco1Real][$columnaBarco1Real] = 1;
        }
        // barco 2
        $letraBarco2Input = isset($parametros['letra_barco_2'])?$parametros['letra_barco_2']:null;
        $numeroBarco2Input = isset($parametros['numero_barco_2'])?$parametros['numero_barco_2']:null;
        $filaBarco2Real = $letraBarco2Input?array_search($letraBarco2Input, $this->letras):null;
        $columnaBarco2Real = $numeroBarco2Input?($numeroBarco2Input-1):null;
        if($filaBarco2Real!==null && $columnaBarco2Real!==null){
            $this->configuracionActual[$filaBarco2Real][$columnaBarco2Real] = 1;
        }
        // barco 3
        $letraBarco3Input = isset($parametros['letra_barco_3'])?$parametros['letra_barco_3']:null;
        $numeroBarco3Input = isset($parametros['numero_barco_3'])?$parametros['numero_barco_3']:null;
        $filaBarco3Real = $letraBarco3Input?array_search($letraBarco3Input, $this->letras):null;
        $columnaBarco3Real = $numeroBarco3Input?($numeroBarco3Input-1):null;
        if($filaBarco3Real!==null && $columnaBarco3Real!==null){
            $this->configuracionActual[$filaBarco3Real][$columnaBarco3Real] = 1;
        }
        // barco 4
        $letraBarco4Input = isset($parametros['letra_barco_4'])?$parametros['letra_barco_4']:null;
        $numeroBarco4Input = isset($parametros['numero_barco_4'])?$parametros['numero_barco_4']:null;
        $filaBarco4Real = $letraBarco4Input?array_search($letraBarco4Input, $this->letras):null;
        $columnaBarco4Real = $numeroBarco1Input?($numeroBarco4Input-1):null;
        if($filaBarco4Real!==null && $columnaBarco4Real!==null){
            $this->configuracionActual[$filaBarco4Real][$columnaBarco4Real] = 1;
        }
        // barco 5
        $letraBarco5Input = isset($parametros['letra_barco_5'])?$parametros['letra_barco_5']:null;
        $numeroBarco5Input = isset($parametros['numero_barco_5'])?$parametros['numero_barco_5']:null;
        $filaBarco5Real = $letraBarco5Input?array_search($letraBarco5Input, $this->letras):null;
        $columnaBarco5Real = $numeroBarco5Input?($numeroBarco5Input-1):null;
        if($filaBarco5Real!==null && $columnaBarco5Real!==null){
            $this->configuracionActual[$filaBarco5Real][$columnaBarco5Real] = 1;
        }
        
    }
    
}
