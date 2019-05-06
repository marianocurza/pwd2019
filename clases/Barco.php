<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\clases;

require_once 'AlineacionBarcos.php';


use app\clases\AlineacionBarcos;


/**
 * Description of Barco
 *
 * @author mariano
 */
class Barco {
    private $nombre;
    private $longitud;
    
    public function __construct(string $nombre, int $longitud) {
        $this->nombre = $nombre;
        $this->longitud = $longitud;
    }
    
    public function getNombre()
    {
        return $this->nombre;
    }
    
    public function getInputNumero($parametro): string
    {
        $valorInicial = isset($parametro["numero_{$this->nombre}"])?$parametro["numero_{$this->nombre}"]:'';
        return "<input name='numero_{$this->nombre}' id='numero_{$this->nombre}' size='2' type='text' value='$valorInicial'/>";        
    }

    public function getInputLetra($parametro): string
    {
        $valorInicial = isset($parametro["letra_{$this->nombre}"])?$parametro["letra_{$this->nombre}"]:'';
        return "<input name='letra_{$this->nombre}' id='letra_{$this->nombre}' size='2' type='text' value='$valorInicial'/>";        
        
    }
    
    public function getSelectOrientacion($parametro): string
    {
        $nuevaAlineacion = new AlineacionBarcos();
        $alineacionesPosibles = $nuevaAlineacion->getAlienacionesPosibles();
        
        $cabeceraSelect = "<select name='orientacion_{$this->nombre}' id='orientacion_{$this->nombre}'>";
        
        // incorporamos los options
        foreach($alineacionesPosibles as $alineacion )
        {
          $seleccionado = isset($parametro["orientacion_{$this->nombre}"])&&$parametro["orientacion_{$this->nombre}"]==$alineacion?'selected':'';
          $cabeceraSelect .=  "<option $seleccionado>$alineacion</option>";
        }
        
        $cabeceraSelect  .= "</select>";
        
        return $cabeceraSelect;
        
    }
    
    public function obtenerNuevaConfiguracion(array $parametros, array $configuracionActual, array $letras): array
    {

        $letraBarcoInput = isset($parametros["letra_{$this->nombre}"])?$parametros["letra_{$this->nombre}"]:null;
        $numeroBarcoInput = isset($parametros["numero_{$this->nombre}"])?$parametros["numero_{$this->nombre}"]:null;
        $orientacionBarcoInput = isset($parametros["orientacion_{$this->nombre}"])?$parametros["orientacion_{$this->nombre}"]:null;
        $filaBarcoReal = $letraBarcoInput?array_search($letraBarcoInput, $letras):null;
        $columnaBarcoReal = $numeroBarcoInput?($numeroBarcoInput-1):null;
        if($filaBarcoReal!==null && $columnaBarcoReal!==null){
            for($i=0; $i < $this->longitud; $i++)
            {
                if($orientacionBarcoInput=='Horizontal'){
                    $filaBarcoActual = $filaBarcoReal;
                    $columnaActual = $columnaBarcoReal + $i;
                }else{
                    $filaBarcoActual = $filaBarcoReal + $i;
                    $columnaActual = $columnaBarcoReal;
                }
                $configuracionActual[$filaBarcoActual][$columnaActual] = 1;
            }
        }
        return $configuracionActual;
    }
    
    
    
}
