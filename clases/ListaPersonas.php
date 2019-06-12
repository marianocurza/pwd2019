<?php

namespace app\clases;

class ListaPersonas 
{
    private static $lista = [
        [
            'correo'=>'correo1@gmail.com',
            'apellido'=>'Gimenez',
            'estudiante'=>'N',
        ],
        [
            'correo'=>'correo2@gmail.com',
            'apellido'=>'Boisselier',
            'estudiante'=>'N',
        ],
        [
            'correo'=>'correo3@gmail.com',
            'apellido'=>'Herrero',
            'estudiante'=>'S',
        ],
        [
            'correo'=>'correo4@gmail.com',
            'apellido'=>'Herrero',
            'estudiante'=>'N',
        ]
    ];
    public static function obtenerListaPersonas(): array
    {
      return self::$lista;
    }
    
    public static function obtenerListaPersonasFiltrada(array $parametros): array 
    {
        $listaResultado = [];
        foreach(self::$lista as $persona)
        {
							if(
								!(count($parametros)) ||
								(
								    (empty($parametros['correo']) || $parametros['correo']==$persona['correo']) &&
									(empty($parametros['apellido']) || $parametros['apellido']==$persona['apellido']) &&
									(empty($parametros['estudiante']) || $parametros['estudiante']==$persona['estudiante'])
								)
							  ){
							      $listaResultado[] = $persona;
							  }        
        }
        return $listaResultado;
        
    }
    
}