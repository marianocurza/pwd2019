<?php
namespace app\clases;

/**
 * Description of Traductor
 *
 * @author mariano
 */
class Traductor {
    
    public static function t(string $lang, string $mensaje): string
    {
        $arreglo = static::obtenerContenidoLenguaje($lang);        
        return $arreglo[$mensaje]??$mensaje;
    }
    
    private static function obtenerContenidoLenguaje(string $lang): array
    {
        $archivo =  dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'lenguajes'.DIRECTORY_SEPARATOR."$lang.php";
        if(!file_exists($archivo)=== true){
            error_log('el archivo:'.$archivo.' no existe');
            return [];
        }
        $arreglo = require $archivo;
        return $arreglo;
    }
    
}
