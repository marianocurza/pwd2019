<?php


namespace app\clases;

/**
 * Description of AlineacionBarcos
 *
 * @author mariano
 */
class AlineacionBarcos {    
    //put your code here
    private $alineacionesPosibles = ['Horizontal', 'Vertical'];
    
    public function getAlienacionesPosibles(): array{
        return $this->alineacionesPosibles;
    }
}
