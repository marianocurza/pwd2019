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
            // utilizar el criterio para devolver los valores
            $listaResultado[] = $persona;
        }
        return $listaResultado;
        
    }
    
}