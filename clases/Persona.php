<?php

abstract class Persona {
    protected $dni;
    protected $nombre;
    protected $apellido;
    
    public function __construct(string $dni, string $nombre, string $apellido){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
    }
    
}